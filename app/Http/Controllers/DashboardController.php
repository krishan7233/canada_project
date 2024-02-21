<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function dashboard(){
        $data['title'] = "Dashboard";
        $data['total_company'] =  DB::table('tbl_companies')->count();
        $data['total_package'] =DB::table('rate_with_detectible_amt')->count();
        return view('backend.index',$data);
    }
    public function companyList(){
        $query = DB::table('tbl_companies')->orderByDesc('id')->where('status',1)->get();
        $data['company_list'] = $query;
        return view('backend.company-list',$data);
    }
    public function packageList($c_id){
        $query = DB::table('rate_with_detectible_amt')->where('c_id',$c_id)->orderByDesc('id')->get();
        $data['package_list'] = $query;
        return view('backend.package-list',$data);
    }
    public function addCompany(){
        return view("backend.add-company");
    }
    public function addCompanyPost(Request $req){
        $validation['company_name']="required";
        $validation['per_plicy_claim']="required";
        $validation['per_month']="required";
        $validation['visa_type']="required";
        if($req->file('photo')){
            $validation['photo']="required|image|mimes:jpeg,png,jpg";
        }
        $req->validate($validation);
        if($req->file('photo')){
            $rand = rand(11111,99999);
            $uploadedFile = $req->file('photo');
            $newFileName = $rand."company".time().'.'.$uploadedFile->getClientOriginalExtension();
            $uploadedFile->move(public_path('images'), $newFileName);
            $data['photo']= asset("images/".$newFileName);       
        }
        $data['company_name'] = $req->company_name;
        $data['per_plicy_claim'] = $req->per_plicy_claim;
        $data['per_month'] = $req->per_month;
        $data['visa_type'] = $req->visa_type;
        if($req->id){
            DB::table('tbl_companies')->where('id',$req->id)->update($data);
            return redirect("admin-company-list")->with('success','New record updated successfully.');
        }
        DB::table('tbl_companies')->insert($data);
        return redirect("admin-company-list")->with('success','New record added successfully.');
    }
    public function editCompany($id){
        $query = DB::table('tbl_companies')->where('id',$id)->first();
        $data['company']=$query;
        return view('backend.edit-company',$data);  
    }
    public function addPackage($id){
        return view("backend.add-package");
    }
    public function editPackage(){
        $package_id = request('package_id');
        $query = DB::table('rate_with_detectible_amt')->where('id',$package_id)->first();
        $data['package'] = $query;
        return view("backend.edit-package",$data);
    }
    public function addPackagePost(Request $req){
        $validation['c_id'] = "required";
        $validation['start_age'] = "required";
        $validation['end_age'] = "required";
        $validation['rate'] = "required";
        $validation['detectible'] = "required";
        $validation['coverage'] = "required";
        $validation['medical'] = "required";
        $validation['multiplecation_factor'] = "required";
        $req->validate($validation);
        $data['c_id'] = $req->c_id;
        $data['start_age'] = $req->start_age;
        $data['end_age'] = $req->end_age;
        $data['rate'] = $req->rate;
        $data['detectible'] = $req->detectible;
        $data['coverage'] = $req->coverage;
        $data['medical'] = $req->medical;
        $data['multiplecation_factor'] = $req->multiplecation_factor;
        if($req->package_id){
            DB::table('rate_with_detectible_amt')->where('id',$req->package_id)->update($data);
            return redirect("admin-package-list/".$req->c_id)->with('success','New record updated successfully.');    
        }
        DB::table('rate_with_detectible_amt')->insert($data);
        return redirect("admin-package-list/".$req->c_id)->with('success','New record added successfully.');
    }
    public function updateCompanyDetail(){
        $company_id = request('company_id');
        return view('backend.update-company-detail');
    }
    public function updateCompanyDetailPost(request $req){
        $c_id = $req->c_id;
        $data['covid_19'] = $req->covid_19;
        $data['ambulance'] = $req->ambulance;
        $data['deductible_per_claim_or_per_policy'] = $req->deductible_per_claim_or_per_policy;
        $data['2500_disappearing_deductible'] = $req->twentty_five_hundred_disappearing_deductible;
        $data['hospitalization_related_to_emergency'] = $req->hospitalization_related_to_emergency;
        $data['services_of_a_physician_a_surgeon'] = $req->services_of_a_physician_a_surgeon;
        $data['medical_care_related_to_emergencies'] = $req->medical_care_related_to_emergencies;
        $data['walk_in_clinic_visits'] = $req->walk_in_clinic_visits;
        $data['follow_up_treatment'] = $req->follow_up_treatment;
        $data['coverage_forlab_diagnostics_x_ray'] = $req->coverage_forlab_diagnostics_x_ray;
        $data['prescriptions_related_to_emergencies'] = $req->prescriptions_related_to_emergencies;
        $data['dental_pain_relief'] = $req->dental_pain_relief;
        $data['dental_repair_related_to_emergencies'] = $req->dental_repair_related_to_emergencies;
        $data['assistance_center24_hour'] = $req->assistance_center24_hour;
        $data['ambulance_transportation'] = $req->ambulance_transportation;
        $data['home_return_related_to_medical_emergencies'] = $req->home_return_related_to_medical_emergencies;
        $data['repatriation_of_remains'] = $req->repatriation_of_remains;
        $data['expenses_forcremation_burial'] = $req->expenses_forcremation_burial;
        $data['pre_existing_medical_conditions_stability_required'] = $req->pre_existing_medical_conditions_stability_required;
        $data['expenses_forprivate_duty_nurse_medical_attendant'] = $req->expenses_forprivate_duty_nurse_medical_attendant;
        $data['medical_appliancesrental_purchase'] = $req->medical_appliancesrental_purchase;
        $data['side_trips_benefit_with_in_canada_and_outside_of_canada'] = $req->side_trips_benefit_with_in_canada_and_outside_of_canada;
        $data['enhanced_benefits'] = $req->enhanced_benefits;
        $data['emergency_serviceschiropractor_chiropodist_physiotherapist_osteo'] = $req->emergency_serviceschiropractor_chiropodist_physiotherapist_osteo;
        $data['accidental_death'] = $req->accidental_death;
        $data['double_dismemberment'] = $req->double_dismemberment;
        $data['single_dismemberment'] = $req->single_dismemberment;
        $data['bedside_companionaccommodation_transportation'] = $req->bedside_companionaccommodation_transportation;
        $data['hospital_expensesmeals_accommodation_accommodation_out_of_pocket'] = $req->hospital_expensesmeals_accommodation_accommodation_out_of_pocket;
        $data['maternity_benefits_delivery_coverage'] = $req->maternity_benefits_delivery_coverage;
        $data['pregnancy_coverage_related_to_complications'] = $req->pregnancy_coverage_related_to_complications;
        $data['physical_examination_non_emergency'] = $req->physical_examination_non_emergency;
        $data['eye_examination_non_emergency'] = $req->eye_examination_non_emergency;
        $data['vaccines_non_emergency'] = $req->vaccines_non_emergency;
        $data['coverage_forchild_care_exp_escort_expenses'] = $req->coverage_forchild_care_exp_escort_expenses;
        $data['coverage_forpsychiatric_psychological'] = $req->coverage_forpsychiatric_psychological;
        $data['return_of_a_vehicle'] = $req->return_of_a_vehicle;
        $data['sports_injuries'] = $req->sports_injuries;
        $data['accidentsflight_travel'] = $req->accidentsflight_travel;
        $data['trip_break_benefit'] = $req->trip_break_benefit;
        $data['underwritten_by'] = $req->underwritten_by;
        $updateData['company_detail'] = arrayToEncode($data);
        DB::table('tbl_companies')->where('id',$c_id)->update($updateData);
        return redirect()->back()->with('success','New record updated successfully.');

    }
    public function deletePackage(){
        $package_id = request('package_id');
        $query = DB::table('rate_with_detectible_amt')->where('id',$package_id)->delete();
        return redirect()->back()->with('success','New record delete successfully.');
    }
    public function logout()
    {
        // exit("hello");
        Auth::logout();
        return redirect('admin-login');
    }
}

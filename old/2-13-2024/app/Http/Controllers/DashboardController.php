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
        $data['all_registration'] =  0;//DB::table('registration')->count();
        $data['pending_registration'] =0; //  DB::table('registration')->where('approval',1)->count();
        $data['approval_registration'] = 0;// DB::table('registration')->where('approval',2)->count();
        $data['not_approval_registration'] = 0;// DB::table('registration')->where('approval',3)->count();



        return view('backend.index',$data);
    }
    public function registrationList(){
        $company_id = request('company_id');
        $type = request('type');
        $exit = request('exit');

        $data['title'] = "Registration List";
        $query= DB::table('tbl_rates')->select('id','c_id','age_id','aggregate_id','pre_exit','rate','status','plan_type');
        if($company_id){
            $query->where('c_id',$company_id);
        }
        if($type){
            $query->where('plan_type',$type);
        }
        if($exit){
            if($exit==1){
                $exit =0;
            }else{
                $exit=1;
            }
            $query->where('pre_exit',$exit);
        }
        $data['registers'] = $query->orderBy('id', 'DESC')->get();
        
        return view('backend.rate-list',$data);

    }
    public function registrationUpdateStatus(Request $req){
        $message = "";
        $queries = DB::table('registration') ->where('id', $req->id) ->update([ 'approval' => $req->approval]);
        if($queries){
            $message = "Registration approval  status updated successfully."; 
            Session::flash('success', $message);

            return response()->json([
                'status'=>true,
                'code'=>200,
                'type'=>"success",
                'message' => $message,
            ]);
        }
        $message = "Oops! Something went wrong.";
        Session::flash('error', $message);

        return response()->json([
            'status'=>false,
            'code'=>403,
            'type'=>"error",
            'message' => $message,
        ]);
    }

    public function amountDetectibleList($id){
        $data['title'] = "Detectible List";
        $data['detect_list'] = detectibleList($id);
        $data['company_name']=companyName($id)->company_name;

        return view('backend.detectible-list',$data);
    }
    public function addRate(){
        $data['title'] = "Rate Price Add";


        return view('backend.add-rate',$data);
    }
    public function ratePricePost(Request $req){
        $priceList = companyWiseAggregatePrice($req->company);
        $ageList = companyWiseAgeGroup($req->company);
        $detectList = companyWiseDetectible($req->company);
        

        $ageOptions = "";
        $priceOptions = "";        
        $detectOptions = "";        
        foreach ($priceList as $price) {
            $priceOptions .= "<option value='".$price->id."'>".$price->price."</option>";
        }
        
        foreach ($ageList as $age) {
            $ageOptions .= "<option value='".$age->id."'>".$age->start_age.'-'.$age->end_age."</option>";
        }
        
        foreach ($detectList as $detect) {
            $detectOptions .= "<option value='".$detect->id."'>".$detect->deductible_amt."</option>";
        }
        
        $data = ['price' => $priceOptions, 'age' => $ageOptions,'detect'=>$detectOptions];
        return response()->json($data);
    }

    public function getDetictible(Request $req){
        $detectOptions = "";        

        $detectibleList = detectible($req->company,$req->age_id);
        foreach ($detectibleList as $detect) {
            $detectOptions .= "<option value='".$detect->id."'>".$detect->deductible_amt."</option>";
        }
        return $detectOptions;
        
    }
    public function addRatePost(Request $req){
        
        $req->validate([
            'company_id' => 'required',
            'aggregate_price' => 'required',
            'age' => 'required',
            'medical' => 'required',
            'plan_type' => 'required',
            'rate' => 'required',
        ]);
        $data = [
            'c_id'=>$req->company_id,
            'aggregate_id'=>$req->aggregate_price,
            'age_id'=>$req->age,
            'pre_exit'=>$req->medical,
            'plan_type'=>$req->plan_type,
            'rate'=>$req->rate,
        ];
        if($req->id){
            if(DB::table('tbl_rates')->where('id',$req->id)->update($data)){
                return redirect("admin-registration-list")->with('success','record updated successfully.');
            }
            return redirect()->back()->with('error','New record something wrong.');

        }
        else{
            if(DB::table('tbl_rates')->insert($data)){
                return redirect("admin-registration-list")->with('success','New record added successfully.');
            }
        }
        return redirect()->back()->with('error','New record something wrong.');

    }
    public function editRate($id){
        $data['title'] = "Edit Rate";
        $data['record'] = findRate($id);
        return view('backend.edit-rate',$data);    
    }
    public function ratePriceGet(Request $req){
        
        $priceList = companyWiseAggregatePrice($req->company);
        $ageList = companyWiseAgeGroup($req->company);
        $detectList = companyWiseDetectible($req->company);
        

        $ageOptions = "";
        $priceOptions = "";        
        $detectOptions = "";        
        foreach ($priceList as $price) {
            $priceOptions .= "<option value='".$price->id."'>".$price->price."</option>";
        }
        
        foreach ($ageList as $age) {
            $ageOptions .= "<option value='".$age->id."'>".$age->start_age.'-'.$age->end_age."</option>";
        }
        
        foreach ($detectList as $detect) {
            $detectOptions .= "<option value='".$detect->id."'>".$detect->deductible_amt."</option>";
        }
        
        $data = ['price' => $priceOptions, 'age' => $ageOptions,'detect'=>$detectOptions];
        return response()->json($data);    
    }
    public function viewRate($id){
        $data['record'] = findRate($id);
        return view('backend.view-rate',$data); 
    }
    public function logout()
    {
        // exit("hello");
        Auth::logout();
        return redirect('admin-login');
    }
}

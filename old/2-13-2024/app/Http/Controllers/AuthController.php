<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Buyer;
use App\Models\User;
use App\Models\Quote_Detail;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmailQuote;


class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        return view('index');
    }
	
	public function aboutus(){
        return view('about-us');
    }
	
	public function contactus(){
        return view('contact-us');
    }
	
	public function Blog(){
        return view('blog');
    }
	
	// Blog Details Start
	
	public function EffectiveWays(){
        return view('3-effective-ways-to-pay-off-your-student-loan');
    }
	
	// Blog Details End
	
	
	
	public function privacypolicy(){
        return view('privacy-policy');
    }
	
	public function termsconditions(){
        return view('terms-and-conditions');
    }
	
	
	
	public function OrderConfirmation(){
        return view('order-confirmation');
    }
	
	
	
	public function quotecompare(){
        return view('quote-compare');
    }
	

    public function supervisa(){
        return view('super-visa-insurance');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function quotation(){
        return view('quotes');
    }
	
	public function insuranceplan(){
        return view('plan');
    }
    public function findQuotation(){
        $visitor_type=request('visitor_type');
        $visa_type=request('visa_type');
        $deductible=request('deductible');
        $date_of_birth=request('date_of_birth');
        $age=request('age');
        $start_date=request('start_date');
        $end_date=request('end_date');
        $no_of_days=request('no_of_days');
        $coverage_amt=request('coverage_amt');
        $pre_exit=request('pre_exit');
        $requestData = [
            'visitor_type'=>$visitor_type,
            'visa_type'=>$visa_type,
            'deductible'=>$deductible,
            'date_of_birth'=>$date_of_birth,
            'age'=>$age,
            'start_date'=>$start_date,
            'end_date'=>$end_date,
            'no_of_days'=>$no_of_days,
            'coverage_amt'=>$coverage_amt,
            'pre_exit'=>$pre_exit,
        ];
        $rates = DB::table('rate_with_detectible_amt')
        ->join('tbl_companies', 'tbl_companies.id', '=', 'rate_with_detectible_amt.c_id')
        ->select('rate_with_detectible_amt.*')
        ->where('rate_with_detectible_amt.coverage',$this->removeDollarSign($coverage_amt))
        ->where('rate_with_detectible_amt.start_age', '<=', $age)
        ->where('rate_with_detectible_amt.end_age', '>=', $age)
        ->where('rate_with_detectible_amt.detectible', $deductible)
        ->where('rate_with_detectible_amt.medical',$pre_exit)
        ->where('tbl_companies.visa_type','!=',3)
        ->get();
 

        $rateData = [];

        foreach ($rates as $rate) {
            if ($rate->c_id == 6) {
                $tamt = ($rate->rate * ($no_of_days - 5) * $rate->multiplecation_factor);
            } else {
                $tamt = ($rate->rate * $no_of_days * $rate->multiplecation_factor);
            }
        
            $rateArray = [
                'id' => $rate->id,
                'rate' => $rate->rate,
                'detectible' => $rate->detectible,
                'c_id' => $rate->c_id,
                'final_result' => $tamt,
            ];
        
            $rateData[] = $rateArray;
        }
        
        usort($rateData, function ($a, $b) {
            return $a['final_result'] - $b['final_result'];
        });
        
        $data['ratePackage'] = $rateData;
        $data['requestData'] = $requestData;
        return view('quotes',$data);
    }
    public function superVisaCouple1($superVisaCouple1){
       

        // $visitor_type=request('visitor_type');
        $visa_type=request('visa_type');
        $deductible=request('detectible_amount');
        $date_of_birth=request('super_visa_couple_birth1');
        $age=request('super_visa_couple_age1');
        $start_date=request('super_visa_couple_start_date1');
        $end_date=request('super_visa_couple_end_date1');
        $no_of_days=request('super_visa_couple_days1');
        $coverage_amt=request('super_visa_couple_coverage1');
        $pre_exit=request('super_visa_couple_exit1');
        $requestData = [
            'visa_type'=>$visa_type,
            'deductible'=>$deductible,
            'date_of_birth'=>$date_of_birth,
            'age'=>$age,
            'start_date'=>$start_date,
            'end_date'=>$end_date,
            'no_of_days'=>$no_of_days,
            'coverage_amt'=>$coverage_amt,
            'pre_exit'=>$pre_exit,
        ];

        $rates = DB::table('rate_with_detectible_amt')
        ->join('tbl_companies', 'tbl_companies.id', '=', 'rate_with_detectible_amt.c_id')
        ->select('rate_with_detectible_amt.*')
        ->where('rate_with_detectible_amt.coverage',$this->removeDollarSign($coverage_amt))
        ->where('rate_with_detectible_amt.start_age', '<=', $age)
        ->where('rate_with_detectible_amt.end_age', '>=', $age)
        ->where('rate_with_detectible_amt.detectible', $deductible)
        ->where('rate_with_detectible_amt.medical',$pre_exit)
        ->where('tbl_companies.visa_type','!=',3)
        ->get();
        $rateData = [];

        foreach ($rates as $rate) {
            if ($rate->c_id == 6) {
                $tamt = ($rate->rate * ($no_of_days - 5) * $rate->multiplecation_factor);
            } 
            elseif($rate->c_id == 1 || $rate->c_id == 2 || $rate->c_id == 3 || $rate->c_id == 6){
                $tamt = ($rate->rate * $no_of_days * $rate->multiplecation_factor)*0.95;
            }
            elseif($rate->c_id == 10){
                $tamt = ($rate->rate * $no_of_days * $rate->multiplecation_factor);
                $discount_extra = ($tamt*2.5)/100;
                $tamt=$tamt-$discount_extra;
                
            }
            else {
                $tamt = ($rate->rate * $no_of_days * $rate->multiplecation_factor);
            }
        
            $rateArray = [
                'id' => $rate->id,
                'rate' => $rate->rate,
                'detectible' => $rate->detectible,
                'c_id' => $rate->c_id,
                'final_result' => $tamt,
            ];
        
            $rateData[] = $rateArray;
        }
        return $rateData;
    }
    public function superVisaCouple2($superVisaCouple2){
        $visa_type=request('visa_type');
        $deductible=request('detectible_amount');
        $date_of_birth=request('super_visa_couple_birth2');
        $age=request('super_visa_couple_age2');
        $start_date=request('super_visa_couple_start_date2');
        $end_date=request('super_visa_couple_end_date2');
        $no_of_days=request('super_visa_couple_days2');
        $coverage_amt=request('super_visa_couple_coverage2');
        $pre_exit=request('super_visa_couple_exit2');
        $requestData = [
            'visa_type'=>$visa_type,
            'deductible'=>$deductible,
            'date_of_birth'=>$date_of_birth,
            'age'=>$age,
            'start_date'=>$start_date,
            'end_date'=>$end_date,
            'no_of_days'=>$no_of_days,
            'coverage_amt'=>$coverage_amt,
            'pre_exit'=>$pre_exit,
        ];

        $rates = DB::table('rate_with_detectible_amt')
        ->join('tbl_companies', 'tbl_companies.id', '=', 'rate_with_detectible_amt.c_id')
        ->select('rate_with_detectible_amt.*')
        ->where('rate_with_detectible_amt.coverage',$this->removeDollarSign($coverage_amt))
        ->where('rate_with_detectible_amt.start_age', '<=', $age)
        ->where('rate_with_detectible_amt.end_age', '>=', $age)
        ->where('rate_with_detectible_amt.detectible', $deductible)
        ->where('rate_with_detectible_amt.medical',$pre_exit)
        ->where('tbl_companies.visa_type','!=',3)
        ->get();

        $rateData = [];

        foreach ($rates as $rate) {
            if ($rate->c_id == 6) {
                $tamt = ($rate->rate * ($no_of_days - 5) * $rate->multiplecation_factor);
            }elseif($rate->c_id == 1 || $rate->c_id == 2 || $rate->c_id == 3 || $rate->c_id == 6){
                $tamt = ($rate->rate * $no_of_days * $rate->multiplecation_factor)*0.95;
            }elseif($rate->c_id == 10){
                $tamt = ($rate->rate * $no_of_days * $rate->multiplecation_factor);
                $discount_extra = ($tamt*2.5)/100;
                $tamt=$tamt-$discount_extra;
            } 
            else {
                $tamt = ($rate->rate * $no_of_days * $rate->multiplecation_factor);
            }
        
            $rateArray = [
                'id' => $rate->id,
                'rate' => $rate->rate,
                'detectible' => $rate->detectible,
                'c_id' => $rate->c_id,
                'final_result' => $tamt,
            ];
        
            $rateData[] = $rateArray;
        }
        return $rateData;
    }

    public function calculationFilter($visa_request_type){

        // exit($visa_request_type);
        if($visa_request_type=="single_visitor_visa"){
            $requestData = Session::get('visitor_visa_request_data');
            $data = Session::get('visitor_visa_deductible');
        }
        if($visa_request_type=="single_super_visa"){
            $requestData = Session::get('super_visa_request_data');
            $data = Session::get('super_visa_deductible');
            /****************date of birth fin date**********************************/
            if(!empty($requestData['date_of_birth'])){
            $dateOfBirth = \Carbon\Carbon::createFromFormat('Y-m-d', $requestData['date_of_birth']);
            // age different
            $toDate = \Carbon\Carbon::createFromFormat('Y-m-d', $requestData['start_date']);
            $fromDate = \Carbon\Carbon::createFromFormat('Y-m-d', $requestData['date_of_birth']);        
            // Check if both dates are valid
            if ($toDate && $toDate->isValid() && $fromDate && $fromDate->isValid()) {
                $age1 = $toDate->diffInYears($fromDate);
                $date_of_birth_start_age = now()->diff($dateOfBirth)->y;
            }
            }
            else{
                $date_of_birth_start_age=$requestData['age'];
                // $age =$requestData['age']; 
            }
            // exit($date_of_birth_start_age);
        }
        if($visa_request_type=="family_visitor_visa"){
            $requestData = Session::get('visitor_visa_family_request_data');
            $data = Session::get('visitor_visa_family_deductible');
        }
        $pre_exit =$data['pre_exit']; 
        $coverage_amt =$data['coverage_amt']; 
        $no_of_days =$requestData['no_of_days']; 
        // exit($no_of_days);
        $deductible =$data['deductible']; 
        if($pre_exit==0){
        $exit_or_not="NOT";
        }else{
        $exit_or_not="YES";
        }
            $CompanyDetail =[];
            $price= $this->addDollarSign($coverage_amt);
            $companiesData1 = DB::table('tbl_companies')
                ->join('tbl_aggregate_policy_limit', 'tbl_companies.id', '=', 'tbl_aggregate_policy_limit.c_id')
                ->join('tbl_age_group', 'tbl_companies.id', '=', 'tbl_age_group.c_id')
                ->join('tbl_deductible', 'tbl_companies.id', '=', 'tbl_deductible.c_id')
                ->where('tbl_aggregate_policy_limit.price', $price)
                ->where('tbl_age_group.start_age', '<=', $date_of_birth_start_age)
                ->where('tbl_age_group.end_age', '>=', $date_of_birth_start_age)
                ->where('tbl_deductible.start_age', '<=', $date_of_birth_start_age)
                ->where('tbl_deductible.end_age', '>=', $date_of_birth_start_age)

                ->where('tbl_deductible.deductible_amt', $deductible)
                ->whereNotIn('tbl_companies.id', [6, 8, 10, 11, 18])
                ->select(
                    'tbl_companies.id as company_id',
                    'tbl_companies.company_name',
                    'tbl_companies.status',
                    'tbl_companies.created_at',
                    'tbl_companies.updated_at',
                    'tbl_companies.photo',
                    'tbl_companies.basic',
                    'tbl_companies.per_month_exit',
                    'tbl_companies.standard',
                    'tbl_companies.enhanced',
                    'tbl_companies.compare_basic',
                    'tbl_companies.compare_standard',
                    'tbl_companies.compare_enhanced',
                    'tbl_companies.formula',
                    'tbl_aggregate_policy_limit.price',
                    'tbl_age_group.start_age',
                    'tbl_age_group.end_age',
                    'tbl_aggregate_policy_limit.id as aggregate_id',
                    'tbl_age_group.id as age_id',
                    'tbl_deductible.deductible_amt',
                    'tbl_deductible.multiplication_factor',
                    'tbl_deductible.sur_charge'
                )
                ->get();

        $companiesData2 = DB::table('tbl_companies')
            ->join('tbl_aggregate_policy_limit', 'tbl_companies.id', '=', 'tbl_aggregate_policy_limit.c_id')
            ->join('tbl_age_group', 'tbl_companies.id', '=', 'tbl_age_group.c_id')
            ->join('tbl_deductible', 'tbl_companies.id', '=', 'tbl_deductible.c_id')
            ->where('tbl_aggregate_policy_limit.price', $price)
            ->where('tbl_age_group.start_age', '<=', $date_of_birth_start_age)
            ->where('tbl_age_group.end_age', '>=', $date_of_birth_start_age)
            ->where('tbl_deductible.start_age', '<=', $date_of_birth_start_age)
            ->where('tbl_deductible.end_age', '>=', $date_of_birth_start_age)
            ->where('tbl_deductible.deductible_amt', $deductible)
            ->whereIn('tbl_companies.id', [6, 8, 10, 11, 18])
            ->select(
                'tbl_companies.id as company_id',
                'tbl_companies.company_name',
                'tbl_companies.status',
                'tbl_companies.created_at',
                'tbl_companies.updated_at',
                'tbl_companies.photo',
                'tbl_companies.basic',
                'tbl_companies.per_month_exit',
                'tbl_companies.standard',
                'tbl_companies.enhanced',
                'tbl_companies.compare_basic',
                'tbl_companies.compare_standard',
                'tbl_companies.compare_enhanced',
                'tbl_companies.formula',
                'tbl_aggregate_policy_limit.price',
                'tbl_age_group.start_age',
                'tbl_age_group.end_age',
                'tbl_aggregate_policy_limit.id as aggregate_id',
                'tbl_age_group.id as age_id',
                'tbl_deductible.deductible_amt',
                'tbl_deductible.multiplication_factor',
                'tbl_deductible.sur_charge'
            )
            ->get();

            $mergedCompaniesData = $companiesData1->merge($companiesData2);
            $CompanyDetail = []; // Initialize an empty array to store unique entries
            foreach ($mergedCompaniesData as $company) {
                $data['rates'] = DB::table('tbl_rates')
                    ->where('c_id', $company->company_id)
                    ->where('age_id', $company->age_id)
                    ->where('aggregate_id', $company->aggregate_id)
                    ->where('pre_exit', $pre_exit)
                    ->get();
            
                foreach ($data['rates'] as $rates) {
                    if(!empty($requestData['date_of_birth']) && ($company->company_id==6 ||$company->company_id==8 || $company->company_id==10 || $company->company_id==11 || $company->company_id==18)){
                        $age = $date_of_birth_start_age;
                    }else{
                        if(!empty($requestData['date_of_birth'])){
                            $age = $age1;
                        }else{
                            $age= $requestData['age'];
                        }

                    }

                    if ($rates->rate != "$0") {
                        if ($company->sur_charge == "B") {
                            $sur_charge = 0;
                        } else {
                            $sur_charge = $company->sur_charge;
                        }
                        
                        if($visa_request_type=="family_visitor_visa"){
                            $tamt = $this->removeDollarSign($rates->rate)* 2 * $no_of_days*$company->multiplication_factor;
                        }
                        elseif($company->company_id==9){
                            $tamt = $this->removeDollarSign($rates->rate) * ($no_of_days-5)*$company->multiplication_factor;
                        }
                        elseif($company->company_id==17){
                            $tamt = ($this->removeDollarSign($rates->rate) * $no_of_days*$company->multiplication_factor);
                        }
                        elseif( $company->company_id==18 || ($company->company_id==8 && $deductible>0) || $company->company_id==14){
                        $companies_direct_income = DB::table('rate_with_detectible_amt')
                                ->where('coverage',$this->removeDollarSign($price))
                                ->where('start_age', '<=', $age)
                                ->where('end_age', '>=', $age)
                                ->where('detectible', $deductible)
                                ->where('medical',$pre_exit)
                                ->where('c_id',$company->company_id)
                                ->first();
                                $tamt = ($companies_direct_income->rate * $no_of_days);

                        }
                        else{
                            $tamt = $this->removeDollarSign($rates->rate) * $no_of_days*$company->multiplication_factor;
                        }
                        // Create a unique key based on company_id and rate
                        $uniqueKey = $company->company_id . '_' . $rates->rate;            
                        // Check if this key already exists in the $CompanyDetail array
                        if (!isset($CompanyDetail[$uniqueKey])) {
                            // Add the details to the $CompanyDetail array
                            $CompanyDetail[$uniqueKey] = (object)[
                                'id' => $rates->id,
                                'company_id' => $company->company_id,
                                'basic' => $company->basic,
                                'standard' => $company->standard,
                                'enhanced' => $company->enhanced,
                                'compare_basic' => $company->compare_basic,
                                'compare_standard' => $company->compare_standard,
                                'compare_enhanced' => $company->compare_enhanced,
                                'company_name' => $company->company_name,
                                'per_month_exit' => $company->per_month_exit,
                                'company_status' => $company->status,
                                'company_photo' => $company->photo,
                                'company_created_at' => $company->created_at,
                                'company_updated_at' => $company->updated_at,
                                'aggregate_price' => $company->price,
                                'start_age' => $company->start_age,
                                'end_age' => $company->end_age,
                                'aggregate_id' => $company->aggregate_id,
                                'age_id' => $company->age_id,
                                'pre_exit' => $exit_or_not,
                                'rate' => $rates->rate,
                                'plan_type' => $rates->plan_type,
                                'no_of_days' => $no_of_days,
                                'total_charge' => $tamt+$company->formula,
                                'per_month' => number_format($tamt+$company->formula / 12, 2),
                                'deductible_amt' => $company->deductible_amt,
                                'sur_charge' => $sur_charge,
                                'detect_amt' => ($sur_charge / 100) * $tamt,
                                'final_result' => $tamt,
                            ];
                        }
                    }
                }
            }
            usort($CompanyDetail, function ($a, $b) {
                return $a->total_charge - $b->total_charge;
            });
            
            $uniqueCompanyDetailArray = array_values($CompanyDetail);
            return (object) $uniqueCompanyDetailArray;
    }
    // visitor visa function
    
public function deductibleFilter(Request $req){
    $requestData = Session::get('super_visa_request_data');
    $deductible = $req->deductible;
    $coverage = $req->coverage;
    $pre_exit = $req->check_exit;
    $data=[
        'deductible'=>$deductible,
        'coverage_amt'=>$coverage,
        'pre_exit'=>$pre_exit,
    ];
    Session::put('super_visa_deductible', $data);
    return true;
}


public function visitorVisa(){
    return view('visitor-visa-insurance'); 
}

public function supervisaPost(){
    $superVisaCouple1 = [
        'super_visa_couple_birth1'=>request('super_visa_couple_birth1'),
        'super_visa_couple_age1'=>request('super_visa_couple_age1'),
        'super_visa_couple_start_date1'=>request('super_visa_couple_start_date1'),
        'super_visa_couple_end_date1'=>request('super_visa_couple_end_date1'),
        'super_visa_couple_days1'=>request('super_visa_couple_days1'),
        'super_visa_couple_coverage1'=>request('super_visa_couple_coverage1'),
        'super_visa_couple_exit1'=>request('super_visa_couple_exit1'),
        'detectible_amount'=>request('detectible_amount'),
        'visa_type'=>request('visa_type'),
    ];
    $superVisaCouple2 = [
        'super_visa_couple_birth2'=>request('super_visa_couple_birth2'),
        'super_visa_couple_age2'=>request('super_visa_couple_age2'),
        'super_visa_couple_start_date2'=>request('super_visa_couple_start_date2'),
        'super_visa_couple_end_date2'=>request('super_visa_couple_end_date2'),
        'super_visa_couple_days2'=>request('super_visa_couple_days2'),
        'super_visa_couple_coverage2'=>request('super_visa_couple_coverage2'),
        'super_visa_couple_exit2'=>request('super_visa_couple_exit2'),
        'detectible_amount'=>request('detectible_amount'),
        'visa_type'=>request('visa_type'),
    ];
    $superVisaCoupleData1 = $this->superVisaCouple1($superVisaCouple1);
    $superVisaCoupleData2 = $this->superVisaCouple2($superVisaCouple2);
    $superVisaCoupleArrayData = [];
    foreach($superVisaCoupleData1 as $item1){
        foreach($superVisaCoupleData2 as $item2){
            if($item1['c_id']==$item2['c_id']){
                $superVisaPackage['id1'] = $item1['id'];
                $superVisaPackage['id2'] = $item2['id'];
                $superVisaPackage['c_id'] = $item1['c_id'];
                $superVisaPackage['detectible'] = $item1['detectible'];
                $superVisaPackage['final_result1'] = $item1['final_result'];
                $superVisaPackage['final_result2'] = $item2['final_result'];
                $superVisaPackage['total_amount'] = $item1['final_result']+$item2['final_result'];
                $superVisaCoupleArrayData[] = $superVisaPackage;    
            }
            // basic+enhanced
            elseif($item1['c_id']==1 && $item2['c_id']==3){
                $superVisaPackage['id1'] = $item1['id'];
                $superVisaPackage['id2'] = $item2['id'];
                $superVisaPackage['c_id'] = 23;
                $superVisaPackage['detectible'] = $item1['detectible'];
                $superVisaPackage['final_result1'] = $item1['final_result'];
                $superVisaPackage['final_result2'] = $item2['final_result'];
                $superVisaPackage['total_amount'] = $item1['final_result']+$item2['final_result'];
                $superVisaCoupleArrayData[] = $superVisaPackage;  
            }
            elseif($item1['c_id']==3 && $item2['c_id']==1){
                $superVisaPackage['id1'] = $item1['id'];
                $superVisaPackage['id2'] = $item2['id'];
                $superVisaPackage['c_id'] = 24;
                $superVisaPackage['detectible'] = $item1['detectible'];
                $superVisaPackage['final_result1'] = $item1['final_result'];
                $superVisaPackage['final_result2'] = $item2['final_result'];
                $superVisaPackage['total_amount'] = $item1['final_result']+$item2['final_result'];
                $superVisaCoupleArrayData[] = $superVisaPackage;  
            }
            // standard+enhanced
            elseif($item1['c_id']==2 && $item2['c_id']==3){
                $superVisaPackage['id1'] = $item1['id'];
                $superVisaPackage['id2'] = $item2['id'];
                $superVisaPackage['c_id'] = 25;
                $superVisaPackage['detectible'] = $item1['detectible'];
                $superVisaPackage['final_result1'] = $item1['final_result'];
                $superVisaPackage['final_result2'] = $item2['final_result'];
                $superVisaPackage['total_amount'] = $item1['final_result']+$item2['final_result'];
                $superVisaCoupleArrayData[] = $superVisaPackage; 
            }
            elseif($item1['c_id']==3 && $item2['c_id']==2){
                $superVisaPackage['id1'] = $item1['id'];
                $superVisaPackage['id2'] = $item2['id'];
                $superVisaPackage['c_id'] = 26;
                $superVisaPackage['detectible'] = $item1['detectible'];
                $superVisaPackage['final_result1'] = $item1['final_result'];
                $superVisaPackage['final_result2'] = $item2['final_result'];
                $superVisaPackage['total_amount'] = $item1['final_result']+$item2['final_result'];
                $superVisaCoupleArrayData[] = $superVisaPackage; 
            }
            elseif($item1['c_id']==15 && $item2['c_id']==16){
                $superVisaPackage['id1'] = $item1['id'];
                $superVisaPackage['id2'] = $item2['id'];
                $superVisaPackage['c_id'] = 27;
                $superVisaPackage['detectible'] = $item1['detectible'];
                $superVisaPackage['final_result1'] = $item1['final_result'];
                $superVisaPackage['final_result2'] = $item2['final_result'];
                $superVisaPackage['total_amount'] = $item1['final_result']+$item2['final_result'];
                $superVisaCoupleArrayData[] = $superVisaPackage; 
            }
            elseif($item1['c_id']==16 && $item2['c_id']==15){
                $superVisaPackage['id1'] = $item1['id'];
                $superVisaPackage['id2'] = $item2['id'];
                $superVisaPackage['c_id'] = 28;
                $superVisaPackage['detectible'] = $item1['detectible'];
                $superVisaPackage['final_result1'] = $item1['final_result'];
                $superVisaPackage['final_result2'] = $item2['final_result'];
                $superVisaPackage['total_amount'] = $item1['final_result']+$item2['final_result'];
                $superVisaCoupleArrayData[] = $superVisaPackage; 
            }
        }
    }

    usort($superVisaCoupleArrayData, function ($a, $b) {
        return $a['total_amount'] - $b['total_amount'];
    });
    
    $data['packageData']=$superVisaCoupleArrayData;
    $data['superVisaCouple1']=$superVisaCouple1;
    $data['superVisaCouple2']=$superVisaCouple2;
    return view('super-visa-quotation', $data);

}
/******************************super visa couple quotation**********************************/
public function visitorSingleCoverageGetQuotation(Request $req){
    
    $visa_request_type = "single_visitor_visa";
    $sessionData = [
        'date_of_birth'=>$req->date_of_birth,
        'age'=>$req->age,
        'start_date'=>$req->start_date,
        'end_date'=>$req->end_date,
        'no_of_days'=>$req->no_of_days,
        'visa_type'=>$req->visa_type,

    ];
    $data = [
        'coverage_amt'=>$req->coverage_amt,
        'pre_exit'=>$req->pre_exit,
        'deductible'=>0,
    ];
    $visa_type = [
        'visa_type'=>$req->visa_type,
    ];
    Session::put('visa_type', $visa_type);
    Session::put('visitor_visa_request_data', $sessionData);
    Session::put('visitor_visa_deductible', $data);
    $data['company_detail']=$this->calculationFilter($visa_request_type);
    // return view('visitor-single-quotation',$data);
    return redirect('visitor-single-deductable-quotation');
}
public function visitorSingleCoverageDeductableGetQuotation(Request $req){
    $deductible = $req->deductible;
    $coverage = $req->coverage;
    $pre_exit = $req->check_exit;
    $data=[
        'deductible'=>$deductible,
        'coverage_amt'=>$coverage,
        'pre_exit'=>$pre_exit,
    ];
    Session::put('visitor_visa_deductible', $data);
    return true;
}
public function visitorSingleDeductableQuotation(){
    $visa_request_type = "single_visitor_visa";
    $data['company_detail']=$this->calculationFilter($visa_request_type);
    return view('visitor-single-quotation',$data);
}
public function visitorCoupleCoverageGetQuotation(Request $request){
    $visa_request_type = "couple_visitor_visa";

    $age1 = $request->visitor_visa_couple_age1;
    $birth1 = $request->visitor_visa_couple_birth1;
    $start_date1 = $request->visitor_visa_couple_start_date1;
    $end_date1 = $request->visitor_visa_couple_end_date1;
    $days1 = $request->visitor_visa_couple_days1;
    $coverage_amt1 = $request->visitor_visa_couple_coverage1;
    $exit1 = $request->visitor_visa_couple_exit1;
    $age2 = $request->visitor_visa_couple_age2;
    $birth2 = $request->visitor_visa_couple_birth2;
    $start_date2 = $request->visitor_visa_couple_start_date2;
    $end_date2 = $request->visitor_visa_couple_end_date2;
    $days2 = $request->visitor_visa_couple_days2;
    $coverage_amt2 = $request->visitor_visa_couple_coverage2;
    $exit2 = $request->visitor_visa_couple_exit2;
    $amt_type = $request->amt_type;
    $coverage_amt2=($amt_type==1)?$coverage_amt2:$coverage_amt1;
    $sessionData = [
        'date_of_birth1'=>$birth1,
        'age1'=>$age1,
        'start_date1'=>$start_date1,
        'end_date1'=>$end_date1,
        'no_of_days1'=>$days1,
        'date_of_birth2'=>$birth2,
        'age2'=>$age2,
        'start_date2'=>$start_date2,
        'end_date2'=>$end_date2,
        'no_of_days2'=>$days2,
        'visa_type'=>$request->visa_type,

    ];
    $data = [
    'coverage_amt1'=>$coverage_amt1,
    'pre_exit1'=>$exit1,
    'deductible1'=>0,
    'coverage_amt2'=>$coverage_amt2,
    'pre_exit2'=>$exit2,
    'deductible2'=>0,
    ];
    // die(print_r($data));
    $visa_type = [
        'visa_type'=>$request->visa_type,
    ];
    Session::put('visa_type', $visa_type);

    Session::put('visitor_visa_couple_request_data', $sessionData);
    Session::put('visitor_visa_couple_deductible', $data);
    $data['company_detail'] = $this->superVisaCoupleMergeData($visa_request_type);
    return view('visitor-visa-quotation',$data);

}

public function visitorVisaDeductibleCouple(Request $request){

    $data = [
        'coverage_amt1' => $request->coverage1,
        'pre_exit1' => $request->check_exit1,
        'deductible1' => $request->deductible,
        'coverage_amt2' => $request->coverage2,
        'pre_exit2' => $request->check_exit2,
        'deductible2' => $request->deductible,
    ];
    Session::put('visitor_visa_couple_deductible', $data);
    return true;
}
public function visitorVisaDeductibleQuotation(){
    $visa_request_type ="couple_visitor_visa";
    $data['company_detail']=$this->superVisaCoupleMergeData($visa_request_type);
    return view('visitor-visa-quotation', $data);

}
public function visitorFamilyCoverageGetQuotation(Request $request){
    
    $visa_request_type = "family_visitor_visa";
    if($request->visitor_family_policy_year1>=$request->visitor_family_policy_year2){
        $age = $request->visitor_family_policy_year1;
        $date_of_birth = $request->visitor_family_policy_date1;
    }
    if($request->visitor_family_policy_year2>=$request->visitor_family_policy_year1){
        $age = $request->visitor_family_policy_year2;
        $date_of_birth = $request->visitor_family_policy_date2;
    }
    $sessionData = [
        'date_of_birth'=>$date_of_birth,
        'age'=>$age,
        'start_date'=>$request->visitor_family_start_date,
        'end_date'=>$request->visitor_family_end_date,
        'no_of_days'=>$request->visitor_family_days,
        'visa_type'=>$request->visa_type,
        'date_of_birth1'=>$request->visitor_family_policy_date1,
        'date_of_birth2'=>$request->visitor_family_policy_date2,
        'age1'=>$request->visitor_family_policy_year1,
        'age2'=>$request->visitor_family_policy_year2,


    ];
    $data = [
        'coverage_amt'=>$request->visitor_family_coverage_amt,
        'pre_exit'=>$request->visitor_family_exit,
        'deductible'=>0,
    ];

    
    $visa_type = [
        'visa_type'=>$request->visa_type,
    ];
    Session::put('visa_type', $visa_type);
    Session::put('visitor_visa_family_request_data', $sessionData);
    Session::put('visitor_visa_family_deductible', $data);
    $data['company_detail']=$this->calculationFilter($visa_request_type);
    return view('visitor-family-quotation',$data);

}
public function visitorFamilyDeductible(Request $req){
    $requestData = Session::get('visitor_visa_family_request_data');
    $deductible = $req->deductible;
    $coverage = $req->coverage;
    $pre_exit = $req->check_exit;
    $data=[
        'deductible'=>$deductible,
        'coverage_amt'=>$coverage,
        'pre_exit'=>$pre_exit,
    ];
    Session::put('visitor_visa_family_deductible', $data);
    return true;
}
public function visitorFamilyDeductibleQuotation(){
    $visa_request_type ="family_visitor_visa";
    $data['company_detail']=$this->calculationFilter($visa_request_type);
    return view('visitor-family-quotation',$data);
}
public function addDollarSign($amount) {
    $addSymbol = '$' .$amount;
    return $addSymbol;
}
public function removeDollarSign($amount)
{
    // Remove dollar sign and any commas
    $cleanedAmount = str_replace(['$', ','], '', $amount);

    // Convert the cleaned string to a float
    $numericValue = (float) $cleanedAmount;

    return $numericValue;
}  
public function comparePost(Request $req){
    $compare = [
        'compare_data'=>$req->compare_data
    ];
    Session::put('compare', $compare);
}  

public function compareQuote(){
    $compareArray = explode(',',request('package'));
    $no_of_days = request('no_of_days');
    $rates = DB::table('rate_with_detectible_amt')
                ->whereIn('id', $compareArray)
                ->get();
    $rateData = [];

    foreach ($rates as $rate) {
        if ($rate->c_id == 6) {
            $tamt = ($rate->rate * ($no_of_days - 5) * $rate->multiplecation_factor);
        } else {
            $tamt = ($rate->rate * $no_of_days * $rate->multiplecation_factor);
        }
    
        $rateArray = [
            'id' => $rate->id,
            'rate' => $rate->rate,
            'detectible' => $rate->detectible,
            'c_id' => $rate->c_id,
            'final_result' => $tamt,
        ];
    
        $rateData[] = $rateArray;
    }            
    $data['ratePackage'] = $rateData;
    return view('quote-compare',$data);
}

public function superVisaCoupleComparePost(Request $req){
    $compare = [
        'compare_data'=>$req->compare_data
    ];
    Session::put('compare', $compare);
}
public function superVisaCoupleCompare(){
    $compareData = Session::get('compare');
    $compareArray = explode(',',$compareData['compare_data']);
    $data['array_check'] = $compareArray;
    $visa_request_type ="couple_super_visa";


    $objectsArray=$this->superVisaCoupleMergeData($visa_request_type);
    // $objectsArray=$this->calculationFilter();
    $outputArray = [];
    foreach ($compareArray as $idToFind) {
        foreach ($objectsArray as $object) {
            if(!empty($object->id1) && !empty($object->id1)){
                if ($object->id1 == $idToFind) {
                    $outputArray[] = $object;
                    break; // Stop searching for the current id
                }
            }
        }
    }
    $outputObject = $outputArray;
    $data['compare_quote'] = $outputObject; 
    return view('super-visa-couple-compare',$data);   
}
public function visitorSingleComparePost(Request $req){
    $compare = [
        'compare_data'=>$req->compare_data
    ];
    Session::put('compare', $compare);
    
}

public function visitorCoupleComparePost(Request $req){
    $compare = [
        'compare_data'=>$req->compare_data
    ];
    Session::put('compare', $compare);
}
public function visitorCoupleCompare(){
    $visa_request_type ="couple_visitor_visa";

    $compareData = Session::get('compare');
    $compareArray = explode(',',$compareData['compare_data']);
    $data['array_check'] = $compareArray;
    $objectsArray=$this->superVisaCoupleMergeData($visa_request_type);
    $outputArray = [];
    foreach ($compareArray as $idToFind) {
        foreach ($objectsArray as $object) {
            if(!empty($object->id1) && !empty($object->id2)){
                if ($object->id1 == $idToFind) {
                    $outputArray[] = $object;
                    break; // Stop searching for the current id
                }
            }
        }
    }
    $outputObject = $outputArray;
    $data['compare_quote'] = $outputObject; 
    return view('visitor-couple-compare',$data);  
}
public function visitorFamilyComparePost(Request $req){
    $compare = [
        'compare_data'=>$req->compare_data
    ];
    Session::put('compare', $compare); 
}
public function visitorFamilyCompare(){
    $visa_request_type ="family_visitor_visa";

    $compareData = Session::get('compare');
    $compareArray = explode(',',$compareData['compare_data']);
    $data['array_check'] = $compareArray;
    $objectsArray=$this->calculationFilter($visa_request_type);
    $outputArray = [];
    foreach ($compareArray as $idToFind) {
        foreach ($objectsArray as $object) {
            if ($object->id == $idToFind) {
                $outputArray[] = $object;
                break; // Stop searching for the current id
            }
        }
    }
    $outputObject = (object)$outputArray;
    $data['compare_quote'] = $outputObject;
    return view('visitor-family-quotation-compare',$data);
}
public function Order($id){
    
    $data['user_id'] = $id;
    // $data['company']=$this->buyersIdDetail($id);
    return view('order',$data);
}
public function coupleOrder($id){
    $data['user_id'] = $id;
    $companyData = $this->coupleOrderCompanyData($id);
    return view('visitor-couple-order',$data);

}

public function coupleOrderCompanyData($visa_request_type,$id){

// exit($visa_request_type);
    $objectsArray = $this->superVisaCoupleMergeData($visa_request_type);
    $outputArray = [];
        foreach ($objectsArray as $object) {
            if(!empty($object->id1) && !empty($object->id2)){
                if ($object->id1 == $id) {
                    $outputArray[] = $object;
                    break; // Stop searching for the current id
                }
            }
        }
    return $outputArray;
    // $outputObject = $outputArray;

}

public function visitorFamilyOrder($id){
    $data['buy_id'] = $id;

    return view('visitor-family-order',$data);
}
public function orderPost(Request $req){

    $req->validate([
        'user_id' => 'required',
        'date_of_birth' => 'required',
        'mobile_number' => 'required',
        'destination' => 'required',
        'condidate_address' => 'required',
        'arrival_expected_date' => 'required',
        'country' => 'required',
        'baneficiary_name' => 'required',
    ]);

    // $companyData = json_encode($this->buyersIdDetail($req->buy_id));
    $buyer = new Buyer();
    $buyer->user_id = $req->user_id;
    $buyer->date_of_birth = $req->date_of_birth;
    $buyer->mobile_number = $req->mobile_number;
    $buyer->destination = $req->destination;
    $buyer->condidate_address = $req->condidate_address;
    $buyer->arrival_expected_date = $req->arrival_expected_date;
    $buyer->country = $req->country;
    $buyer->baneficiary_name = $req->baneficiary_name;
    $buyer->save();
    return redirect('thank-you');


}
public function buyersIdDetail($visa_request_type,$id){


        $objectsArray = $this->calculationFilter($visa_request_type);
    
    $outputArray = [];
    foreach ($objectsArray as $object) {
            if ($object->id == $id) {
                $outputArray[] = $object;
                break; // Stop searching for the current id
            }
    }
    $outputObject = $outputArray;
    // $data['compare_quote'] = $outputObject;
    return $outputObject;
}
public function thankYou(){
    return view('order-confirmation');
}
public function visitorOrderCouplePost(Request $req){
    $req->validate([
        'user_id' => 'required',
        'date_of_birth' => 'required',
        'mobile_number' => 'required',
        'destination' => 'required',
        'condidate_address' => 'required',
        'arrival_expected_date' => 'required',
        'country' => 'required',
        'baneficiary_name' => 'required',
    ]);

    // $companyData = json_encode($this->coupleOrderCompanyData($req->buy_id));
    $buyer = new Buyer();
    $buyer->user_id = $req->user_id;
    $buyer->date_of_birth = $req->date_of_birth;
    $buyer->mobile_number = $req->mobile_number;
    $buyer->destination = $req->destination;
    $buyer->condidate_address = $req->condidate_address;
    $buyer->arrival_expected_date = $req->arrival_expected_date;
    $buyer->country = $req->country;
    $buyer->baneficiary_name = $req->baneficiary_name;
   
    $buyer->save();
    return redirect('thank-you');    
}
public function singlePlan(){
    $no_of_days = request('no_of_days');
    $rate = DB::table('rate_with_detectible_amt')
                ->where('id', request('buyer_id'))
                ->first();
    if ($rate->c_id == 6) {
        $tamt = ($rate->rate * ($no_of_days - 5) * $rate->multiplecation_factor);
    } else {
        $tamt = ($rate->rate * $no_of_days * $rate->multiplecation_factor);
    }         
    $rateArray = [
        'id' => $rate->id,
        'rate' => $rate->rate,
        'detectible' => $rate->detectible,
        'c_id' => $rate->c_id,
        'final_result' => $tamt,
    ];
    $data['buyer_data'] = $rateArray; 
    return view('single-plan',$data);
 
}
public function visitorFamilyPlan($id){
    $visa_request_type ="family_visitor_visa";


    $data['buy_id'] = $id;
    
    $data['company']=$this->buyersIdDetail($visa_request_type,$id);
    if(empty($data['company'])){
        return redirect('/');
    }
    return view('single-plan',$data);
 
}
public function visitorSinglePlan($id){
    $visa_request_type ="single_visitor_visa";

    $data['buy_id'] = $id;
    
    $data['company']=$this->buyersIdDetail($visa_request_type,$id);
    if(empty($data['company'])){
        return redirect('/');
    }
    return view('single-plan',$data);
 
}

public function singlePlanPost(Request $req){
    // echo"<pre>";
    // print_r($req->all());
    // exit;
    // $company_data = json_encode($this->buyersIdDetail($req->buy_id));
    // $last_id = $this->userData($req,$company_data);
    $user = new User;
    $req->validate([
        'buy_id' => 'required',
        'name' => 'required',
        'phone' => 'required',
        'email' => 'required',
    ]);
    $user->buy_id = $req->buy_id;
    $user->name = $req->name;
    $user->phone = $req->phone;
    $user->password = $req->phone;
    $user->email = $req->email;
    if($user->save()){
        return redirect('order/'.$user->id);
    }
}
public function userData($userData,$company_data){
    $user = new User;
    $userData->validate([
        'buy_id' => 'required',
        'name' => 'required',
        'phone' => 'required',
        'email' => 'required',
    ]);
    $user->buy_id = $userData->buy_id;
    $user->name = $userData->name;
    $user->phone = $userData->phone;
    $user->password = $userData->phone;
    $user->email = $userData->email;
    $user->company_detail = $company_data;
    if($user->save()){
        return $user->id;    
    }
    
}
public function couplePlan($id){
    $visa_request_type="couple_super_visa";

    $data['buy_id'] = $id;
    $data['company'] = $this->coupleOrderCompanyData($visa_request_type,$id);
    if(empty($data['company'])){
        return redirect('/');
    }
    return view('couple-plan',$data);

}
public function visitorCouplePlan($id){
    $visa_request_type ="couple_visitor_visa";

    $data['buy_id'] = $id;
    $data['company'] = $this->coupleOrderCompanyData($visa_request_type,$id);
    if(empty($data['company'])){
        return redirect('/');
    }
    return view('couple-plan',$data);

}
public function couplePlanPost(Request $req){
    $visa_request_type="couple_super_visa";

    $company_data = json_encode($this->coupleOrderCompanyData($visa_request_type,$req->buy_id));
    $last_id = $this->userData($req,$company_data);
    return redirect('couple-order/'.$last_id);
}
public function emailAndWhatsappPost(Request $req){
    
    $Quote_Detail = new Quote_Detail;
    $req->validate([
        'email' => 'required'
    ]);
    $recipient = $req->email;
    Mail::to($recipient)->send(new SendEmailQuote());
    $Quote_Detail->name = $req->name;
    $Quote_Detail->email = $req->email;
    $Quote_Detail->mobile = $req->mobile;
    $Quote_Detail->send_type = 1;
    $Quote_Detail->save();
    return redirect('/');

}
public function superVisaCompareQuote(){
    $no_of_days=request('super_visa_couple_days1');    
    $compareArray = explode(',',request('package'));
    $superVisaCoupleArrayData = [];                
    foreach($compareArray as $compare){
        $package = explode('_',$compare);
        $rates1 = DB::table('rate_with_detectible_amt')
                ->where('id',$package[0])
                ->first();
        $rates2 = DB::table('rate_with_detectible_amt')
                ->where('id',$package[1])
                ->first();
        if ($rates1->c_id == 6) {
            $tamt = ($rates1->rate * ($no_of_days - 5) * $rates1->multiplecation_factor);
        } 
        elseif($rates1->c_id == 1 || $rates1->c_id == 2 || $rates1->c_id == 3 || $rates1->c_id == 6){
            $tamt = ($rates1->rate * $no_of_days * $rates1->multiplecation_factor)*0.95;
        }
        elseif($rates1->c_id == 10){
            $tamt = ($rates1->rate * $no_of_days * $rates1->multiplecation_factor);
            $discount_extra = ($tamt*2.5)/100;
            $tamt=$tamt-$discount_extra;            
        }
        else {
            $tamt = ($rates1->rate * $no_of_days * $rates1->multiplecation_factor);
        }
        $item1 = [
            'id' => $rates1->id,
            'rate' => $rates1->rate,
            'detectible' => $rates1->detectible,
            'c_id' => $rates1->c_id,
            'final_result' => $tamt,
        ];
        if ($rates2->c_id == 6) {
            $tamt = ($rates2->rate * ($no_of_days - 5) * $rates2->multiplecation_factor);
        } 
        elseif($rates2->c_id == 1 || $rates2->c_id == 2 || $rates2->c_id == 3 || $rates2->c_id == 6){
            $tamt = ($rates2->rate * $no_of_days * $rates2->multiplecation_factor)*0.95;
        }
        elseif($rates2->c_id == 10){
            $tamt = ($rates2->rate * $no_of_days * $rates2->multiplecation_factor);
            $discount_extra = ($tamt*2.5)/100;
            $tamt=$tamt-$discount_extra;            
        }
        else {
            $tamt = ($rates2->rate * $no_of_days * $rates2->multiplecation_factor);
        }
        $item2 = [
            'id' => $rates2->id,
            'rate' => $rates2->rate,
            'detectible' => $rates2->detectible,
            'c_id' => $rates2->c_id,
            'final_result' => $tamt,
        ];

            // basic+enhanced
            // elseif($item1['c_id']==1 && $item2['c_id']==3){
            
            if($item1['c_id']==$item2['c_id']){
                $superVisaPackage['id1'] = $item1['id'];
                $superVisaPackage['id2'] = $item2['id'];
                $superVisaPackage['c_id'] = $item1['c_id'];
                $superVisaPackage['detectible'] = $item1['detectible'];
                $superVisaPackage['final_result1'] = $item1['final_result'];
                $superVisaPackage['final_result2'] = $item2['final_result'];
                $superVisaPackage['total_amount'] = $item1['final_result']+$item2['final_result'];
                $superVisaCoupleArrayData[] = $superVisaPackage;    
            }
            // basic+enhanced
            elseif($item1['c_id']==1 && $item2['c_id']==3){
                $superVisaPackage['id1'] = $item1['id'];
                $superVisaPackage['id2'] = $item2['id'];
                $superVisaPackage['c_id'] = 23;
                $superVisaPackage['detectible'] = $item1['detectible'];
                $superVisaPackage['final_result1'] = $item1['final_result'];
                $superVisaPackage['final_result2'] = $item2['final_result'];
                $superVisaPackage['total_amount'] = $item1['final_result']+$item2['final_result'];
                $superVisaCoupleArrayData[] = $superVisaPackage;  
            }
            elseif($item1['c_id']==3 && $item2['c_id']==1){
                $superVisaPackage['id1'] = $item1['id'];
                $superVisaPackage['id2'] = $item2['id'];
                $superVisaPackage['c_id'] = 24;
                $superVisaPackage['detectible'] = $item1['detectible'];
                $superVisaPackage['final_result1'] = $item1['final_result'];
                $superVisaPackage['final_result2'] = $item2['final_result'];
                $superVisaPackage['total_amount'] = $item1['final_result']+$item2['final_result'];
                $superVisaCoupleArrayData[] = $superVisaPackage;  
            }
            // standard+enhanced
            elseif($item1['c_id']==2 && $item2['c_id']==3){
                $superVisaPackage['id1'] = $item1['id'];
                $superVisaPackage['id2'] = $item2['id'];
                $superVisaPackage['c_id'] = 25;
                $superVisaPackage['detectible'] = $item1['detectible'];
                $superVisaPackage['final_result1'] = $item1['final_result'];
                $superVisaPackage['final_result2'] = $item2['final_result'];
                $superVisaPackage['total_amount'] = $item1['final_result']+$item2['final_result'];
                $superVisaCoupleArrayData[] = $superVisaPackage; 
            }
            elseif($item1['c_id']==3 && $item2['c_id']==2){
                $superVisaPackage['id1'] = $item1['id'];
                $superVisaPackage['id2'] = $item2['id'];
                $superVisaPackage['c_id'] = 26;
                $superVisaPackage['detectible'] = $item1['detectible'];
                $superVisaPackage['final_result1'] = $item1['final_result'];
                $superVisaPackage['final_result2'] = $item2['final_result'];
                $superVisaPackage['total_amount'] = $item1['final_result']+$item2['final_result'];
                $superVisaCoupleArrayData[] = $superVisaPackage; 
            }
            elseif($item1['c_id']==15 && $item2['c_id']==16){
                $superVisaPackage['id1'] = $item1['id'];
                $superVisaPackage['id2'] = $item2['id'];
                $superVisaPackage['c_id'] = 27;
                $superVisaPackage['detectible'] = $item1['detectible'];
                $superVisaPackage['final_result1'] = $item1['final_result'];
                $superVisaPackage['final_result2'] = $item2['final_result'];
                $superVisaPackage['total_amount'] = $item1['final_result']+$item2['final_result'];
                $superVisaCoupleArrayData[] = $superVisaPackage; 
            }
            elseif($item1['c_id']==16 && $item2['c_id']==15){
                $superVisaPackage['id1'] = $item1['id'];
                $superVisaPackage['id2'] = $item2['id'];
                $superVisaPackage['c_id'] = 28;
                $superVisaPackage['detectible'] = $item1['detectible'];
                $superVisaPackage['final_result1'] = $item1['final_result'];
                $superVisaPackage['final_result2'] = $item2['final_result'];
                $superVisaPackage['total_amount'] = $item1['final_result']+$item2['final_result'];
                $superVisaCoupleArrayData[] = $superVisaPackage; 
            }
        // $superVisaPackage['id1'] = $item1['id'];
        // $superVisaPackage['id2'] = $item2['id'];
        // $superVisaPackage['c_id'] = $item1['c_id'];
        // $superVisaPackage['detectible'] = $item1['detectible'];
        // $superVisaPackage['final_result1'] = $item1['final_result'];
        // $superVisaPackage['final_result2'] = $item2['final_result'];
        // $superVisaPackage['total_amount'] = $item1['final_result']+$item2['final_result'];
        // $superVisaCoupleArrayData[] = $superVisaPackage;      
    }
    $data['compare_quote']=$superVisaCoupleArrayData;
    return view('super-visa-couple-compare',$data);
}
public function superVisaCouplePlanBuyer(){
    $no_of_days =   request('super_visa_couple_days1');
    $package = explode('_',request('buyer_id'));
    $rates1 = DB::table('rate_with_detectible_amt')
            ->where('id',$package[0])
            ->first();
    $rates2 = DB::table('rate_with_detectible_amt')
            ->where('id',$package[1])
            ->first();
    if ($rates1->c_id == 6) {
        $tamt = ($rates1->rate * ($no_of_days - 5) * $rates1->multiplecation_factor);
    } 
    elseif($rates1->c_id == 1 || $rates1->c_id == 2 || $rates1->c_id == 3 || $rates1->c_id == 6){
        $tamt = ($rates1->rate * $no_of_days * $rates1->multiplecation_factor)*0.95;
    }
    elseif($rates1->c_id == 10){
        $tamt = ($rates1->rate * $no_of_days * $rates1->multiplecation_factor);
        $discount_extra = ($tamt*2.5)/100;
        $tamt=$tamt-$discount_extra;            
    }
    else {
        $tamt = ($rates1->rate * $no_of_days * $rates1->multiplecation_factor);
    }
    $item1 = [
        'id' => $rates1->id,
        'rate' => $rates1->rate,
        'detectible' => $rates1->detectible,
        'c_id' => $rates1->c_id,
        'final_result' => $tamt,
    ];
    if ($rates2->c_id == 6) {
        $tamt = ($rates2->rate * ($no_of_days - 5) * $rates2->multiplecation_factor);
    } 
    elseif($rates2->c_id == 1 || $rates2->c_id == 2 || $rates2->c_id == 3 || $rates2->c_id == 6){
        $tamt = ($rates2->rate * $no_of_days * $rates2->multiplecation_factor)*0.95;
    }
    elseif($rates2->c_id == 10){
        $tamt = ($rates2->rate * $no_of_days * $rates2->multiplecation_factor);
        $discount_extra = ($tamt*2.5)/100;
        $tamt=$tamt-$discount_extra;            
    }
    else {
        $tamt = ($rates2->rate * $no_of_days * $rates2->multiplecation_factor);
    }
    $item2 = [
        'id' => $rates2->id,
        'rate' => $rates2->rate,
        'detectible' => $rates2->detectible,
        'c_id' => $rates2->c_id,
        'final_result' => $tamt,
    ];
    if($item1['c_id']==$item2['c_id']){
        $superVisaPackage['id1'] = $item1['id'];
        $superVisaPackage['id2'] = $item2['id'];
        $superVisaPackage['c_id'] = $item1['c_id'];
        $superVisaPackage['detectible'] = $item1['detectible'];
        $superVisaPackage['final_result1'] = $item1['final_result'];
        $superVisaPackage['final_result2'] = $item2['final_result'];
        $superVisaPackage['total_amount'] = $item1['final_result']+$item2['final_result'];
    }
    // basic+enhanced
    elseif($item1['c_id']==1 && $item2['c_id']==3){
        $superVisaPackage['id1'] = $item1['id'];
        $superVisaPackage['id2'] = $item2['id'];
        $superVisaPackage['c_id'] = 23;
        $superVisaPackage['detectible'] = $item1['detectible'];
        $superVisaPackage['final_result1'] = $item1['final_result'];
        $superVisaPackage['final_result2'] = $item2['final_result'];
        $superVisaPackage['total_amount'] = $item1['final_result']+$item2['final_result'];
    }
    elseif($item1['c_id']==3 && $item2['c_id']==1){
        $superVisaPackage['id1'] = $item1['id'];
        $superVisaPackage['id2'] = $item2['id'];
        $superVisaPackage['c_id'] = 24;
        $superVisaPackage['detectible'] = $item1['detectible'];
        $superVisaPackage['final_result1'] = $item1['final_result'];
        $superVisaPackage['final_result2'] = $item2['final_result'];
        $superVisaPackage['total_amount'] = $item1['final_result']+$item2['final_result'];
    }
    // standard+enhanced
    elseif($item1['c_id']==2 && $item2['c_id']==3){
        $superVisaPackage['id1'] = $item1['id'];
        $superVisaPackage['id2'] = $item2['id'];
        $superVisaPackage['c_id'] = 25;
        $superVisaPackage['detectible'] = $item1['detectible'];
        $superVisaPackage['final_result1'] = $item1['final_result'];
        $superVisaPackage['final_result2'] = $item2['final_result'];
        $superVisaPackage['total_amount'] = $item1['final_result']+$item2['final_result'];
    }
    elseif($item1['c_id']==3 && $item2['c_id']==2){
        $superVisaPackage['id1'] = $item1['id'];
        $superVisaPackage['id2'] = $item2['id'];
        $superVisaPackage['c_id'] = 26;
        $superVisaPackage['detectible'] = $item1['detectible'];
        $superVisaPackage['final_result1'] = $item1['final_result'];
        $superVisaPackage['final_result2'] = $item2['final_result'];
        $superVisaPackage['total_amount'] = $item1['final_result']+$item2['final_result'];
    }
    elseif($item1['c_id']==15 && $item2['c_id']==16){
        $superVisaPackage['id1'] = $item1['id'];
        $superVisaPackage['id2'] = $item2['id'];
        $superVisaPackage['c_id'] = 27;
        $superVisaPackage['detectible'] = $item1['detectible'];
        $superVisaPackage['final_result1'] = $item1['final_result'];
        $superVisaPackage['final_result2'] = $item2['final_result'];
        $superVisaPackage['total_amount'] = $item1['final_result']+$item2['final_result'];
    }
    elseif($item1['c_id']==16 && $item2['c_id']==15){
        $superVisaPackage['id1'] = $item1['id'];
        $superVisaPackage['id2'] = $item2['id'];
        $superVisaPackage['c_id'] = 28;
        $superVisaPackage['detectible'] = $item1['detectible'];
        $superVisaPackage['final_result1'] = $item1['final_result'];
        $superVisaPackage['final_result2'] = $item2['final_result'];
        $superVisaPackage['total_amount'] = $item1['final_result']+$item2['final_result'];
    }
    // $superVisaPackage['id1'] = $item1['id'];
    // $superVisaPackage['id2'] = $item2['id'];
    // $superVisaPackage['c_id'] = $item1['c_id'];
    // $superVisaPackage['detectible'] = $item1['detectible'];
    // $superVisaPackage['final_result1'] = $item1['final_result'];
    // $superVisaPackage['final_result2'] = $item2['final_result'];
    // $superVisaPackage['total_amount'] = $item1['final_result']+$item2['final_result'];
    $data['couple_plan'] = $superVisaPackage;
 
    return view('couple-plan',$data); 
}
}

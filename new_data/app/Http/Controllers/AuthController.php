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
    public function findQuotation(Request $req){
        $visa_request_type = "single_super_visa";
        $visa_type = [
            'visa_type'=>$req->visa_type,
        ];
        Session::put('visa_type', $visa_type);

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
        Session::put('super_visa_request_data', $sessionData);
        Session::put('super_visa_deductible', $data);
        Session::put('visa_type', $visa_type);
        $data['company_detail']=$this->calculationFilter($visa_request_type);
        // return view('quotes',$data);
        return redirect('single-detect-quotation');
    }
    public function singleDetectQuotation(){
        $visa_request_type = "single_super_visa";
        $data['company_detail']=$this->calculationFilter($visa_request_type);
        return view('quotes',$data);
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
        }
        if($visa_request_type=="family_visitor_visa"){
            $requestData = Session::get('visitor_visa_family_request_data');
            $data = Session::get('visitor_visa_family_deductible');
        }
        $pre_exit =$data['pre_exit']; 
        $coverage_amt =$data['coverage_amt']; 
        $age =$requestData['age']; 
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
            $data['companies'] = DB::table('tbl_companies')
            ->join('tbl_aggregate_policy_limit', 'tbl_companies.id', '=', 'tbl_aggregate_policy_limit.c_id')
            ->join('tbl_age_group', 'tbl_companies.id', '=', 'tbl_age_group.c_id')
            ->join('tbl_deductible', 'tbl_companies.id', '=', 'tbl_deductible.c_id')
            ->where('tbl_aggregate_policy_limit.price',$price)
            ->where('tbl_age_group.start_age', '<=', $age)
            ->where('tbl_age_group.end_age', '>=', $age)
            ->where('tbl_aggregate_policy_limit.price',$price)
            ->where('tbl_deductible.start_age', '<=', $age)
            ->where('tbl_deductible.end_age', '>=', $age)
            ->where('tbl_deductible.end_age', '>=', $age)
            ->where('tbl_deductible.deductible_amt',$deductible)
            ->select('tbl_companies.id as company_id',
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
            'tbl_aggregate_policy_limit.price',
            'tbl_age_group.start_age',
            'tbl_age_group.end_age',
            'tbl_aggregate_policy_limit.id as aggregate_id',
            'tbl_age_group.id as age_id',
            'tbl_deductible.deductible_amt',
            'tbl_deductible.sur_charge',
            )
            ->get();

            $CompanyDetail = []; // Initialize an empty array to store unique entries

            foreach ($data['companies'] as $company) {
                $data['rates'] = DB::table('tbl_rates')
                    ->where('c_id', $company->company_id)
                    ->where('age_id', $company->age_id)
                    ->where('aggregate_id', $company->aggregate_id)
                    ->where('pre_exit', $pre_exit)
                    ->get();
            
                foreach ($data['rates'] as $rates) {
                    if ($rates->rate != "$0") {
                        
                        if($visa_request_type=="family_visitor_visa"){
                            $tamt = $this->removeDollarSign($rates->rate)* 2 * $no_of_days;
                        }else{
                            $tamt = $this->removeDollarSign($rates->rate) * $no_of_days;
                        }


                        if ($company->sur_charge == "B" || $company->sur_charge == "NA") {
                            $sur_charge = 0;
                        } else {
                            $sur_charge = $company->sur_charge;
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
                                'total_charge' => $tamt,
                                'per_month' => number_format($tamt / 12, 2),
                                'deductible_amt' => $company->deductible_amt,
                                'sur_charge' => $sur_charge,
                                'detect_amt' => ($sur_charge / 100) * $tamt,
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

public function supervisaPost(Request $request){
    $visa_request_type = "couple_super_visa";
    $age1 = $request->super_visa_couple_age1;
    $birth1 = $request->super_visa_couple_birth1;
    $start_date1 = $request->super_visa_couple_start_date1;
    $end_date1 = $request->super_visa_couple_end_date1;
    $days1 = $request->super_visa_couple_days1;
    $coverage_amt1 = $request->super_visa_couple_coverage1;
    $exit1 = $request->super_visa_couple_exit1;
    $age2 = $request->super_visa_couple_age2;
    $birth2 = $request->super_visa_couple_birth2;
    $start_date2 = $request->super_visa_couple_start_date2;
    $end_date2 = $request->super_visa_couple_end_date2;
    $days2 = $request->super_visa_couple_days2;
    $coverage_amt2 = $request->super_visa_couple_coverage2;
    $exit2 = $request->super_visa_couple_exit2;
    $visa_type = $request->visa_type;
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
        'visa_type'=>$visa_type,
    ];
    $data = [
    'coverage_amt1'=>$coverage_amt1,
    'pre_exit1'=>$exit1,
    'deductible1'=>0,
    'coverage_amt2'=>$coverage_amt2,
    'pre_exit2'=>$exit2,
    'deductible2'=>0,
    ];


    $visa_type = [
        'visa_type'=>$visa_type,
    ];
    Session::put('super_visa_couple_request_data', $sessionData);
    Session::put('super_visa_couple_deductible', $data);
    Session::put('visa_type', $visa_type);
    $data['company_detail'] = $this->superVisaCoupleMergeData($visa_request_type);

    // return view('super-visa-quotation',$data);
    return redirect('super-visa-deductable-quotation');

}
public function superVisaCoupleMergeData($visa_request_type){
    $company_detail1=$this->superVisaCalculateCouple1($visa_request_type);
    $company_detail2=$this->superVisaCalculateCouple2($visa_request_type);
    $arraycount1= count($company_detail1);
    $arraycount2= count($company_detail2);
    $mergedData = [];
    if ($arraycount1 > $arraycount2) {
        $max_array = $arraycount1;
    } else {
        $max_array = $arraycount2;
    }
    
    for ($i = 0; $i < $max_array; $i++) {
        $arrayData = [
            'id1' => isset($company_detail1[$i]->id1)?$company_detail1[$i]->id1:"",
            'company_id1' => isset($company_detail1[$i]->company_id1)?$company_detail1[$i]->company_id1:"",
            'company_name1' => isset($company_detail1[$i]->company_name1)?$company_detail1[$i]->company_name1:"",
            'company_status1' => isset($company_detail1[$i]->company_status1)?$company_detail1[$i]->company_status1:"",
            'company_photo1' => isset($company_detail1[$i]->company_photo1)?$company_detail1[$i]->company_photo1:"",
            'basic1' => isset($company_detail1[$i]->basic1)?$company_detail1[$i]->basic1:"",
            'standard1' => isset($company_detail1[$i]->standard1)?$company_detail1[$i]->standard1:"",
            'enhanced1' => isset($company_detail1[$i]->enhanced1)?$company_detail1[$i]->enhanced1:"",
            'compare_basic1' => isset($company_detail1[$i]->compare_basic1)?$company_detail1[$i]->compare_basic1:"",
            'compare_standard1' => isset($company_detail1[$i]->compare_standard1)?$company_detail1[$i]->compare_standard1:"",
            'compare_enhanced1' => isset($company_detail1[$i]->compare_enhanced1)?$company_detail1[$i]->compare_enhanced1:"",
            'company_photo1' => isset($company_detail1[$i]->company_photo1)?$company_detail1[$i]->company_photo1:"",
            'per_month_exit1' => isset($company_detail1[$i]->per_month_exit1)?$company_detail1[$i]->per_month_exit1:"",
            'aggregate_price1' => isset($company_detail1[$i]->aggregate_price1)?$company_detail1[$i]->aggregate_price1:"",
            'start_age1' => isset($company_detail1[$i]->start_age1)?$company_detail1[$i]->start_age1:"",
            'end_age1' => isset($company_detail1[$i]->end_age1)?$company_detail1[$i]->end_age1:"",
            'aggregate_id1' => isset($company_detail1[$i]->aggregate_id1)?$company_detail1[$i]->aggregate_id1:"",
            'age_id1' => isset($company_detail1[$i]->age_id1)?$company_detail1[$i]->age_id1:"",
            'pre_exit1' => isset($company_detail1[$i]->pre_exit1)?$company_detail1[$i]->pre_exit1:"",
            'rate1' => isset($company_detail1[$i]->rate1)?$company_detail1[$i]->rate1:0,
            'plan_type1' => isset($company_detail1[$i]->plan_type1)?$company_detail1[$i]->plan_type1:"",
            'no_of_days1' => isset($company_detail1[$i]->no_of_days1)?$company_detail1[$i]->no_of_days1:"",
            'total_charge1' => isset($company_detail1[$i]->total_charge1)?$company_detail1[$i]->total_charge1:0,
            'per_month1' => isset($company_detail1[$i]->per_month1)?$company_detail1[$i]->per_month1:"",
            'deductible_amt1' => isset($company_detail1[$i]->deductible_amt1)?$company_detail1[$i]->deductible_amt1:0,
            'sur_charge1' => isset($company_detail1[$i]->sur_charge1)?$company_detail1[$i]->sur_charge1:0,
            'detect_amt1' => isset($company_detail1[$i]->detect_amt1)?$company_detail1[$i]->detect_amt1:0,
            'id2' => isset($company_detail2[$i]->id2)?$company_detail2[$i]->id2:"",
            'company_id2' => isset($company_detail2[$i]->company_id2)?$company_detail2[$i]->company_id2:"",
            'company_name2' => isset($company_detail2[$i]->company_name2)?$company_detail2[$i]->company_name2:"",
            'company_status2' => isset($company_detail2[$i]->company_status2)?$company_detail2[$i]->company_status2:"",
            'company_photo2' => isset($company_detail2[$i]->company_photo2)?$company_detail2[$i]->company_photo2:"",
            'basic2' => isset($company_detail1[$i]->basic2)?$company_detail1[$i]->basic2:"",
            'standard2' => isset($company_detail1[$i]->standard2)?$company_detail1[$i]->standard2:"",
            'enhanced2' => isset($company_detail1[$i]->enhanced2)?$company_detail1[$i]->enhanced2:"",
            'compare_basic2' => isset($company_detail1[$i]->compare_basic2)?$company_detail1[$i]->compare_basic2:"",
            'compare_standard2' => isset($company_detail1[$i]->compare_standard2)?$company_detail1[$i]->compare_standard2:"",
            'compare_enhanced2' => isset($company_detail1[$i]->compare_enhanced2)?$company_detail1[$i]->compare_enhanced2:"",
            'aggregate_price2' => isset($company_detail2[$i]->aggregate_price2)?$company_detail2[$i]->aggregate_price2:0,
            'start_age2' => isset($company_detail2[$i]->start_age2)?$company_detail2[$i]->start_age2:"",
            'end_age2' => isset($company_detail2[$i]->end_age2)?$company_detail2[$i]->end_age2:"",
            'aggregate_id2' => isset($company_detail2[$i]->aggregate_id2)?$company_detail2[$i]->aggregate_id2:"",
            'age_id2' => isset($company_detail2[$i]->age_id2)?$company_detail2[$i]->age_id2:"",
            'pre_exit2' => isset($company_detail2[$i]->pre_exit2)?$company_detail2[$i]->pre_exit2:"",
            'rate2' => isset($company_detail2[$i]->rate2)?$company_detail2[$i]->rate2:"",
            'plan_type2' => isset($company_detail2[$i]->plan_type2)?$company_detail2[$i]->plan_type2:"",
            'no_of_days2' => isset($company_detail2[$i]->no_of_days2)?$company_detail2[$i]->no_of_days2:"",
            'total_charge2' => isset($company_detail2[$i]->total_charge2)?$company_detail2[$i]->total_charge2:0,
            'per_month2' => isset($company_detail2[$i]->per_month2)?$company_detail2[$i]->per_month2:0,
            'deductible_amt2' => isset($company_detail2[$i]->deductible_amt2)?$company_detail2[$i]->deductible_amt2:0,
            'sur_charge2' => isset($company_detail2[$i]->sur_charge2)?$company_detail2[$i]->sur_charge2:0,
            'detect_amt2' => isset($company_detail2[$i]->detect_amt2)?$company_detail2[$i]->detect_amt2:0,
        ];
        $mergedData[] = (object)$arrayData;
    }
    return $mergedData;
}

public function superVisaCalculateCouple1($visa_request_type){
    // exit($visa_request_type);
    if($visa_request_type =="couple_super_visa"){
        $requestData = Session::get('super_visa_couple_request_data');
        $data = Session::get('super_visa_couple_deductible');
    }
    if($visa_request_type =="couple_visitor_visa"){
        $requestData = Session::get('visitor_visa_couple_request_data');
        $data = Session::get('visitor_visa_couple_deductible');
    }
    

    $pre_exit =$data['pre_exit1']; 
    $coverage_amt =$data['coverage_amt1']; 
    $age =$requestData['age1']; 
    $no_of_days =$requestData['no_of_days1']; 
    $deductible =$data['deductible1']; 


    if($pre_exit==0){
    $exit_or_not="NOT";
    }else{
    $exit_or_not="YES";
    }
        $CompanyDetail =[];
        $price= $this->addDollarSign($coverage_amt);
        $data['companies'] = DB::table('tbl_companies')
        ->join('tbl_aggregate_policy_limit', 'tbl_companies.id', '=', 'tbl_aggregate_policy_limit.c_id')
        ->join('tbl_age_group', 'tbl_companies.id', '=', 'tbl_age_group.c_id')
        ->join('tbl_deductible', 'tbl_companies.id', '=', 'tbl_deductible.c_id')
        ->where('tbl_aggregate_policy_limit.price',$price)
        ->where('tbl_age_group.start_age', '<=', $age)
        ->where('tbl_age_group.end_age', '>=', $age)
        ->where('tbl_aggregate_policy_limit.price',$price)
        ->where('tbl_deductible.start_age', '<=', $age)
        ->where('tbl_deductible.end_age', '>=', $age)
        ->where('tbl_deductible.end_age', '>=', $age)
        ->where('tbl_deductible.deductible_amt',$deductible)
        ->select('tbl_companies.id as company_id',
        'tbl_companies.company_name',
        'tbl_companies.status',
        'tbl_companies.created_at', 
        'tbl_companies.updated_at', 
        'tbl_companies.photo',
        'tbl_companies.basic', 
        'tbl_companies.standard',
        'tbl_companies.per_month_exit',  
        'tbl_companies.enhanced', 
        'tbl_companies.compare_basic', 
        'tbl_companies.compare_standard', 
        'tbl_companies.compare_enhanced', 
        'tbl_aggregate_policy_limit.price',
        'tbl_age_group.start_age',
        'tbl_age_group.end_age',
        'tbl_aggregate_policy_limit.id as aggregate_id',
        'tbl_age_group.id as age_id',
        'tbl_deductible.deductible_amt',
        'tbl_deductible.sur_charge',
        )
        ->get();
        $CompanyDetail = []; // Initialize an empty array to store unique entries

        foreach ($data['companies'] as $company) {
            $data['rates'] = DB::table('tbl_rates')
                ->where('c_id', $company->company_id)
                ->where('age_id', $company->age_id)
                ->where('aggregate_id', $company->aggregate_id)
                ->where('pre_exit', $pre_exit)
                ->get();
        
            foreach ($data['rates'] as $rates) {
                if ($rates->rate != "$0") {
                    $tamt = $this->removeDollarSign($rates->rate) * $no_of_days;
        
                    if ($company->sur_charge == "B" || $company->sur_charge == "NA") {
                        $sur_charge = 0;
                    } else {
                        $sur_charge = $company->sur_charge;
                    }
                    $uniqueKey = $company->company_id . '_' . $rates->rate;
                    if (!isset($CompanyDetail[$uniqueKey])) {
                        $CompanyDetail[$uniqueKey] = (object)[
                            'id1' => $rates->id,
                            'company_id1' => $company->company_id,
                            'company_name1' => $company->company_name,
                            'company_status1' => $company->status,
                            'company_photo1' => $company->photo,
                            'basic1' => $company->basic,
                            'standard1' => $company->standard,
                            'enhanced1' => $company->enhanced,
                            'compare_basic1' => $company->compare_basic,
                            'per_month_exit1' => $company->per_month_exit,
                            'compare_standard1' => $company->compare_standard,
                            'compare_enhanced1' => $company->compare_enhanced,
                            'company_created_at1' => $company->created_at,
                            'company_updated_at1' => $company->updated_at,
                            'aggregate_price1' => $company->price,
                            'start_age1' => $company->start_age,
                            'end_age1' => $company->end_age,
                            'aggregate_id1' => $company->aggregate_id,
                            'age_id1' => $company->age_id,
                            'pre_exit1' => $exit_or_not,
                            'rate1' => $rates->rate,
                            'plan_type1' => $rates->plan_type,
                            'no_of_days1' => $no_of_days,
                            'total_charge1' => $tamt,
                            'per_month1' => number_format($tamt / 12, 2),
                            'deductible_amt1' => $company->deductible_amt,
                            'sur_charge1' => $sur_charge,
                            'detect_amt1' => ($sur_charge / 100) * $tamt,
                        ];
                    }
                }
            }
        }
        usort($CompanyDetail, function ($a, $b) {
            return $a->total_charge1 - $b->total_charge1;
        });
        $uniqueCompanyDetailArray = array_values($CompanyDetail);
        return $uniqueCompanyDetailArray;
}
public function superVisaCalculateCouple2($visa_request_type){
    if($visa_request_type =="couple_super_visa"){
        $requestData = Session::get('super_visa_couple_request_data');
        $data = Session::get('super_visa_couple_deductible');
    }
    if($visa_request_type =="couple_visitor_visa"){
        $requestData = Session::get('visitor_visa_couple_request_data');
        $data = Session::get('visitor_visa_couple_deductible');
    }
    $pre_exit =$data['pre_exit2']; 
    $coverage_amt =$data['coverage_amt2']; 
    $age =$requestData['age2']; 
    $no_of_days =$requestData['no_of_days2']; 
    $deductible =$data['deductible2']; 


    if($pre_exit==0){
    $exit_or_not="NOT";
    }else{
    $exit_or_not="YES";
    }
        $CompanyDetail =[];
        $price= $this->addDollarSign($coverage_amt);
        $data['companies'] = DB::table('tbl_companies')
        ->join('tbl_aggregate_policy_limit', 'tbl_companies.id', '=', 'tbl_aggregate_policy_limit.c_id')
        ->join('tbl_age_group', 'tbl_companies.id', '=', 'tbl_age_group.c_id')
        ->join('tbl_deductible', 'tbl_companies.id', '=', 'tbl_deductible.c_id')
        ->where('tbl_aggregate_policy_limit.price',$price)
        ->where('tbl_age_group.start_age', '<=', $age)
        ->where('tbl_age_group.end_age', '>=', $age)
        ->where('tbl_aggregate_policy_limit.price',$price)
        ->where('tbl_deductible.start_age', '<=', $age)
        ->where('tbl_deductible.end_age', '>=', $age)
        ->where('tbl_deductible.end_age', '>=', $age)
        ->where('tbl_deductible.deductible_amt',$deductible)
        ->select('tbl_companies.id as company_id',
        'tbl_companies.company_name',
        'tbl_companies.status',
        'tbl_companies.created_at', 
        'tbl_companies.updated_at', 
        'tbl_companies.photo',
        'tbl_companies.per_month_exit', 
        'tbl_companies.basic', 
        'tbl_companies.standard', 
        'tbl_companies.enhanced', 
        'tbl_companies.compare_basic', 
        'tbl_companies.compare_standard', 
        'tbl_companies.compare_enhanced', 
        'tbl_aggregate_policy_limit.price',
        'tbl_age_group.start_age',
        'tbl_age_group.end_age',
        'tbl_aggregate_policy_limit.id as aggregate_id',
        'tbl_age_group.id as age_id',
        'tbl_deductible.deductible_amt',
        'tbl_deductible.sur_charge',
        )
        ->get();
        $CompanyDetail = []; // Initialize an empty array to store unique entries

        foreach ($data['companies'] as $company) {
            $data['rates'] = DB::table('tbl_rates')
                ->where('c_id', $company->company_id)
                ->where('age_id', $company->age_id)
                ->where('aggregate_id', $company->aggregate_id)
                ->where('pre_exit', $pre_exit)
                ->get();
        
            foreach ($data['rates'] as $rates) {
                if ($rates->rate != "$0") {
                    $tamt = $this->removeDollarSign($rates->rate) * $no_of_days;
        
                    if ($company->sur_charge == "B" || $company->sur_charge == "NA") {
                        $sur_charge = 0;
                    } else {
                        $sur_charge = $company->sur_charge;
                    }
        
                    // Create a unique key based on company_id and rate
                    $uniqueKey = $company->company_id . '_' . $rates->rate;
        
                    // Check if this key already exists in the $CompanyDetail array
                    if (!isset($CompanyDetail[$uniqueKey])) {
                        // Add the details to the $CompanyDetail array
                        $CompanyDetail[$uniqueKey] = (object)[
                            'id2' => $rates->id,
                            'company_id2' => $company->company_id,
                            'company_name2' => $company->company_name,
                            'company_status2' => $company->status,
                            'company_photo2' => $company->photo,
                            'basic2' => $company->basic,
                            'standard2' => $company->standard,
                            'enhanced2' => $company->enhanced,
                            'compare_basic2' => $company->compare_basic,
                            'per_month_exit2' => $company->per_month_exit,
                            'compare_standard2' => $company->compare_standard,
                            'compare_enhanced2' => $company->compare_enhanced,
                            'company_created_at2' => $company->created_at,
                            'company_updated_at2' => $company->updated_at,
                            'aggregate_price2' => $company->price,
                            'start_age2' => $company->start_age,
                            'end_age2' => $company->end_age,
                            'aggregate_id2' => $company->aggregate_id,
                            'age_id2' => $company->age_id,
                            'pre_exit2' => $exit_or_not,
                            'rate2' => $rates->rate,
                            'plan_type2' => $rates->plan_type,
                            'no_of_days2' => $no_of_days,
                            'total_charge2' => $tamt,
                            'per_month2' => number_format($tamt / 12, 2),
                            'deductible_amt2' => $company->deductible_amt,
                            'sur_charge2' => $sur_charge,
                            'detect_amt2' => ($sur_charge / 100) * $tamt,
                        ];
                    }
                }
            }
        }
        usort($CompanyDetail, function ($a, $b) {
            return $a->total_charge2 - $b->total_charge2;
        });
        $uniqueCompanyDetailArray = array_values($CompanyDetail);
        return $uniqueCompanyDetailArray;
}
public function superVisaDeductibleCouple(Request $request){
    $data = [
        'coverage_amt1' => $request->coverage1,
        'pre_exit1' => $request->check_exit1,
        'deductible1' => $request->deductible,
        'coverage_amt2' => $request->coverage2,
        'pre_exit2' => $request->check_exit2,
        'deductible2' => $request->deductible,
    ];
    Session::put('super_visa_couple_deductible', $data);
    return true;
}
public function superVisaDeductibleQuotation(Request $request){
    $visa_request_type = "couple_super_visa";

    $data['company_detail']=$this->superVisaCoupleMergeData($visa_request_type);
    return view('super-visa-quotation', $data);
}
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
    $visa_request_type="single_super_visa";

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
public function visitorSingleCompare(){
    $visa_request_type ="single_visitor_visa";

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
    return view('visitor-single-quotation-compare',$data);
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
public function singlePlan($id){
    $visa_request_type ="single_super_visa";


    $data['buy_id'] = $id;
    
    $data['company']=$this->buyersIdDetail($visa_request_type,$id);
    if(empty($data['company'])){
        return redirect('/');
    }
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
    $company_data = json_encode($this->buyersIdDetail($req->buy_id));
    $last_id = $this->userData($req,$company_data);
    return redirect('order/'.$last_id);
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
}

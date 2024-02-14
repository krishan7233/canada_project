<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisitorVisaController extends Controller
{
    public function visitorVisaSingleQuotation(){
        $visitorVisaRequest = request()->all();
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
        // $rates = DB::table('rate_with_detectible_amt')
        // ->where('coverage',removeDollar($coverage_amt))
        // ->where('start_age', '<=', $age)
        // ->where('end_age', '>=', $age)
        // ->where('detectible', $deductible)
        // ->where('medical',$pre_exit)
        // ->get();
        $rates = DB::table('rate_with_detectible_amt')
        ->join('tbl_companies', 'tbl_companies.id', '=', 'rate_with_detectible_amt.c_id')
        ->select('rate_with_detectible_amt.*')
        ->where('rate_with_detectible_amt.coverage',removeDollar($coverage_amt))
        ->where('rate_with_detectible_amt.start_age', '<=', $age)
        ->where('rate_with_detectible_amt.end_age', '>=', $age)
        ->where('rate_with_detectible_amt.detectible', $deductible)
        ->where('rate_with_detectible_amt.medical',$pre_exit)
        ->where('tbl_companies.visa_type','!=',2)
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
        return view('visitor-single-quotation',$data);
    }
    public function visitorCoupleCoverageQuotation(){
    //  echo"<pre>";
    //  print_r(request()->all());
    //  exit;
     $visitorVisaCouple1 = [
        'visitor_visa_couple_birth1'=>request('visitor_visa_couple_birth1'),
        'visitor_visa_couple_age1'=>request('visitor_visa_couple_age1'),
        'visitor_visa_couple_start_date1'=>request('visitor_visa_couple_start_date1'),
        'visitor_visa_couple_end_date1'=>request('visitor_visa_couple_end_date1'),
        'visitor_visa_couple_days1'=>request('visitor_visa_couple_days1'),
        'visitor_visa_couple_coverage1'=>request('visitor_visa_couple_coverage1'),
        'visitor_visa_couple_exit1'=>request('visitor_visa_couple_exit1'),
        'detectible_amount'=>request('detectible_amount'),
        'visa_type'=>request('visa_type'),
    ];
    $visitorVisaCouple2 = [
        'visitor_visa_couple_birth2'=>request('visitor_visa_couple_birth2'),
        'visitor_visa_couple_age2'=>request('visitor_visa_couple_age2'),
        'visitor_visa_couple_start_date2'=>request('visitor_visa_couple_start_date2'),
        'visitor_visa_couple_end_date2'=>request('visitor_visa_couple_end_date2'),
        'visitor_visa_couple_days2'=>request('visitor_visa_couple_days2'),
        'visitor_visa_couple_coverage2'=>request('visitor_visa_couple_coverage2'),
        'visitor_visa_couple_exit2'=>request('visitor_visa_couple_exit2'),
        'detectible_amount'=>request('detectible_amount'),
        'visa_type'=>request('visa_type'),
    ];
    $superVisaCoupleData1 = $this->visitorVisaCouple1($visitorVisaCouple1);
    $superVisaCoupleData2 = $this->visitorVisaCouple2($visitorVisaCouple2);
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
                $superVisaPackage['c_id'] = 24;
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
                $superVisaPackage['c_id'] = 23;
                $superVisaPackage['detectible'] = $item1['detectible'];
                $superVisaPackage['final_result1'] = $item1['final_result'];
                $superVisaPackage['final_result2'] = $item2['final_result'];
                $superVisaPackage['total_amount'] = $item1['final_result']+$item2['final_result'];
                $superVisaCoupleArrayData[] = $superVisaPackage; 
            }
            elseif($item1['c_id']==3 && $item2['c_id']==2){
                $superVisaPackage['id1'] = $item1['id'];
                $superVisaPackage['id2'] = $item2['id'];
                $superVisaPackage['c_id'] = 23;
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
    $data['visitorVisaCouple1']=$visitorVisaCouple1;
    $data['visitorVisaCouple2']=$visitorVisaCouple2;
    // echo"<pre>";
    // print_r($data['packageData']);
    // exit;

    return view('visitor-visa-quotation', $data);   
    }
    public function visitorVisaCouple1($visitorVisaCouple1){
        // $visitor_type=request('visitor_type');
        $visa_type=$visitorVisaCouple1['visa_type'];
        $deductible=$visitorVisaCouple1['detectible_amount'];
        $date_of_birth=$visitorVisaCouple1['visitor_visa_couple_birth1'];
        $age=$visitorVisaCouple1['visitor_visa_couple_age1'];
        $start_date=$visitorVisaCouple1['visitor_visa_couple_start_date1'];
        $end_date=$visitorVisaCouple1['visitor_visa_couple_end_date1'];
        $no_of_days=$visitorVisaCouple1['visitor_visa_couple_days1'];
        $coverage_amt=$visitorVisaCouple1['visitor_visa_couple_coverage1'];
        $pre_exit=$visitorVisaCouple1['visitor_visa_couple_exit1'];
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
        ->where('rate_with_detectible_amt.coverage',removeDollar($coverage_amt))
        ->where('rate_with_detectible_amt.start_age', '<=', $age)
        ->where('rate_with_detectible_amt.end_age', '>=', $age)
        ->where('rate_with_detectible_amt.detectible', $deductible)
        ->where('rate_with_detectible_amt.medical',$pre_exit)
        ->where('tbl_companies.visa_type','!=',2)
        ->get();
        // $rates = DB::table('rate_with_detectible_amt')
        // ->where('coverage',removeDollar($coverage_amt))
        // ->where('start_age', '<=', $age)
        // ->where('end_age', '>=', $age)
        // ->where('detectible', $deductible)
        // ->where('medical',$pre_exit)
        // ->get();
        // echo"<pre>";
        // print_r($rates);
        // exit;

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
        return $rateData;
    }
    public function visitorVisaCouple2($visitorVisaCouple2){
        $visa_type=$visitorVisaCouple2['visa_type'];
        $deductible=$visitorVisaCouple2['detectible_amount'];
        $date_of_birth=$visitorVisaCouple2['visitor_visa_couple_birth2'];
        $age=$visitorVisaCouple2['visitor_visa_couple_age2'];
        $start_date=$visitorVisaCouple2['visitor_visa_couple_start_date2'];
        $end_date=$visitorVisaCouple2['visitor_visa_couple_end_date2'];
        $no_of_days=$visitorVisaCouple2['visitor_visa_couple_days2'];
        $coverage_amt=$visitorVisaCouple2['visitor_visa_couple_coverage2'];
        $pre_exit=$visitorVisaCouple2['visitor_visa_couple_exit2'];
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

        // $rates = DB::table('rate_with_detectible_amt')
        // ->where('coverage',removeDollar($coverage_amt))
        // ->where('start_age', '<=', $age)
        // ->where('end_age', '>=', $age)
        // ->where('detectible', $deductible)
        // ->where('medical',$pre_exit)
        // ->get();
        $rates = DB::table('rate_with_detectible_amt')
        ->join('tbl_companies', 'tbl_companies.id', '=', 'rate_with_detectible_amt.c_id')
        ->select('rate_with_detectible_amt.*')
        ->where('rate_with_detectible_amt.coverage',removeDollar($coverage_amt))
        ->where('rate_with_detectible_amt.start_age', '<=', $age)
        ->where('rate_with_detectible_amt.end_age', '>=', $age)
        ->where('rate_with_detectible_amt.detectible', $deductible)
        ->where('rate_with_detectible_amt.medical',$pre_exit)
        ->where('tbl_companies.visa_type','!=',2)
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
        return $rateData;
    }
    public function visitorFamilyCoverageQuotation(){
        if(request('visitor_family_policy_year1')>=request('visitor_family_policy_year2')){
            $age = request('visitor_family_policy_year1');
            $date_of_birth = request('visitor_family_policy_date1');
        }
        if(request('visitor_family_policy_year2')>=request('visitor_family_policy_year1')){
            $age = request('visitor_family_policy_year2');
            $date_of_birth = request('visitor_family_policy_date2');
        }
        $visitor_type=request('visitor_type');
        $visa_type=request('visa_type');
        $deductible=request('visitor_family_deductible');
        $start_date=request('visitor_family_start_date');
        $end_date=request('visitor_family_end_date');
        $no_of_days=request('visitor_family_days');
        $coverage_amt=request('visitor_family_coverage_amt');
        $pre_exit=request('visitor_family_exit');
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

        // $rates = DB::table('rate_with_detectible_amt')
        // ->where('coverage',removeDollar($coverage_amt))
        // ->where('start_age', '<=', $age)
        // ->where('end_age', '>=', $age)
        // ->where('detectible', $deductible)
        // ->where('medical',$pre_exit)
        // ->get();
        $rates = DB::table('rate_with_detectible_amt')
        ->join('tbl_companies', 'tbl_companies.id', '=', 'rate_with_detectible_amt.c_id')
        ->select('rate_with_detectible_amt.*')
        ->where('rate_with_detectible_amt.coverage',removeDollar($coverage_amt))
        ->where('rate_with_detectible_amt.start_age', '<=', $age)
        ->where('rate_with_detectible_amt.end_age', '>=', $age)
        ->where('rate_with_detectible_amt.detectible', $deductible)
        ->where('rate_with_detectible_amt.medical',$pre_exit)
        ->where('tbl_companies.visa_type','!=',2)
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
                'final_result' => $tamt*2,
            ];
        
            $rateData[] = $rateArray;
        }
        usort($rateData, function ($a, $b) {
            return $a['final_result'] - $b['final_result'];
        });
        
        $data['ratePackage'] = $rateData;
        $data['requestData'] = $requestData;
        return view('visitor-family-quotation',$data);
    }
}

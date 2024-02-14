<?php 
use Illuminate\Support\Facades\DB;
function removeSign($amount){
    $cleanedAmount = str_replace(['$', ','], '', $amount);

    // Convert the cleaned string to a float
    $numericValue = (float) $cleanedAmount;

    return $numericValue;
}
function companyName($id){
$company = DB::table('tbl_companies')->select('id','company_name','basic','standard','enhanced','formula','day_discount','visa_type_permission','per_plicy_claim')->where('id',$id)->where('status',1)->first();
return $company;
}
//id wise age detail
function findAge($id){
    $query = DB::table('tbl_age_group')->select('id','start_age','end_age')->where('id',$id)->where('status',1)->first();
    return $query;    
}
function findAggregate($id){
    $query = DB::table('tbl_aggregate_policy_limit')->select('id','price')->where('id',$id)->where('status',1)->first();
    return $query;    
}
function allCompany(){
    $company = DB::table('tbl_companies')->select('id','company_name')->where('status',1)->get();
    return $company;
}
function detectibleList($id){
    $query = DB::table('tbl_deductible')->where('status',1)->where('c_id',$id)->get();
    return $query;
}
function planType($plan_type){
    if($plan_type==1){
        $type = "Basic";
    }else if($plan_type==2){
        $type = "Standard";
    }else{
        $type = "Enhanced"; 
    }
    return $type;
}
function companyWiseAggregatePrice($id){
$query = DB::table('tbl_aggregate_policy_limit')->where('c_id',$id)->get();



return $query;
}

function companyWiseAgeGroup($id){
$query = DB::table('tbl_age_group')->where('c_id',$id)->get();
return $query;
}
function companyWiseDetectible($id){
    // exit($id);
$query = DB::table('tbl_deductible')->where('c_id',$id)->get();
return $query;
}
function detectible($company_id,$age_id){
    $query = DB::table('tbl_age_group')->where('id',$age_id)->where('c_id',$company_id)->first();
    $start_age  = $query->start_age;
    $end_age  = $query->end_age;

    $query1 = DB::table('tbl_deductible')->where('start_age', '<=',$start_age)->where('end_age', '>=',$end_age)->where('c_id',$company_id)->get();
   return $query1; 
}
function findRate($id){
    $query = DB::table('tbl_rates')->where('id',$id)->first();
    return $query;
}
function companyPhoto($id){
    // return"fdsf";
    $query = DB::table('tbl_companies')->where('id',$id)->select('photo')->first();
    return $query->photo;
}
function policyType($id){
$query = DB::table('tbl_companies')->where('id',$id)->select('per_plicy_claim')->first();

if($query->per_plicy_claim==1){
    return "Per Policy";

}
return "Per Claim";
}
function perMonthCheck($id){
    $query = DB::table('tbl_companies')->where('id',$id)->first();
    return $query->per_month;
}
function removeDollar($amount)
{
    // Remove dollar sign and any commas
    $cleanedAmount = str_replace(['$', ','], '', $amount);

    // Convert the cleaned string to a float
    $numericValue = (float) $cleanedAmount;

    return $numericValue;
} 
function companyDetail($id){
    $query = DB::table('tbl_companies')->where('id',$id)->select('company_detail')->first();
    // json_decode($companies->compare_basic,true);
    return json_decode($query->company_detail,true);
}
function checkMedical($medical){
    if($medical==0){
        return "No";
    }
    return "Yes";
}

?>
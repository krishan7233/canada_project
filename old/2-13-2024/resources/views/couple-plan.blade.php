@extends('layout.commonlayout')
@section('content')
<!-- Form section start here -->
<?php
$requestData = request()->all();
$jsonData = json_encode($requestData);
$compare_data = companyDetail($couple_plan['c_id']);

$buy_id = $couple_plan['id1'].'_'.$couple_plan['id2'];
?>
<div class="section-larger">

<div class="container">
@include('layout.email_and_whatsapp')
</div>
<div class="plan-details-page">
      
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="left">
                <p><a href="#"><i class="fa fa-pencil"></i></a></p>
                    <img src="{{companyPhoto($couple_plan['c_id'])}}" />
                    <div class="price-section">


              <h3><span>$</span>{{number_format($couple_plan['final_result1'],2)}}<span></span></h3>
              <h3><span>$</span>{{number_format($couple_plan['final_result2'],2)}}<span></span></h3>
              <p>Total : <strong>{{($couple_plan['final_result1']+$couple_plan['final_result2'])}}</strong></p>
              <h3><span><strong>{{number_format(($couple_plan['final_result1']+$couple_plan['final_result2'])/12,2)}}</strong>/month</span></h3>

              <a href="tel:6475709070" class="call-btn"><i class="fa fa-mobile"></i> (647) 570-9070</a>
            </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="right">
                <p>To begin your application process, please enter your contact details</p>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                	<form action="{{route('single-plan-post')}}" method="POST">
                        @csrf
                    	<div class="form-field-row">
                        	<input type="text" name="name" class="form-control" placeholder="Your Name" required>
                        	<input type="hidden" name="buy_id" class="form-control" value="{{$jsonData}}" required>
                        </div>
                        
                        <div class="form-field-row">
                        	<input type="text" name="phone" class="form-control" placeholder="Phone number" required>
                        </div>
                        
                        
                        <div class="form-field-row">
                        	<input type="email" name="email" class="form-control" placeholder="Email address" required>
                        </div>
                        
                         <div class="form-field-row">
                        	<input type="submit" class="form-control" value="Continue" >
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="plan-details-summery">
    <div class="container">
    <h3>Plan Details</h3>
    	<div class="row">
      <button class="accordion">Benefit Summary</button>
      <div class="panel">
        <div class="panel-inner">
        	<table class="table table-striped">
  <tbody>
  <tr>
      <td colspan="2">Basic Benefits</td>
    </tr>
    <tr>
      <td><strong>Covid-19</strong></td>
      <td><strong>{{$compare_data['covid_19']}}</strong></td>
    </tr>
    <tr>
      <td><strong>Ambulance</strong>	</td>
      <td>Max <strong>{{$compare_data['ambulance']}}</strong></td>
    </tr>
   <tr>
      <td><strong>Deductible</strong><br />
      	<span>(Per Claim or Per Policy)</span>
      </td>
     <td>Max <strong>{{$compare_data['deductible_per_claim_or_per_policy']}}</strong></td>
    </tr>
   <tr>
      <td><strong>$2500 Disappearing Deductible</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['2500_disappearing_deductible']}}</strong></td>
    </tr>
   <tr>
      <td><strong>Hospitalization(Related to Emergency)</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['hospitalization_related_to_emergency']}}</strong></td>
    </tr>
   <tr>
      <td><strong>Services of aA Physician A Surgeon</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['services_of_a_physician_a_surgeon']}}</strong></td>
    </tr>
   <tr>
      <td><strong>Medical Care(Related to Emergencies)</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['medical_care_related_to_emergencies']}}</strong></td>
    </tr>
   <tr>
      <td><strong>Walk-in Clinic Visits</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['walk_in_clinic_visits']}}</strong></td>
    </tr>
   <tr>
      <td><strong>Follow Up Treatment</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['follow_up_treatment']}}</strong></td>
    </tr>
   <tr>
      <td><strong>Coverage ForLab Diagnostics X-Ray</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['coverage_forlab_diagnostics_x_ray']}}</strong></td>
    </tr>
   <tr>
      <td><strong>Prescriptions(Related to Emergencies)</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['prescriptions_related_to_emergencies']}}</strong></td>
    </tr>
   <tr>
      <td><strong>Dental Pain Relief</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['dental_pain_relief']}}</strong></td>
    </tr>
   <tr>
      <td><strong>Dental Repair(Related to Emergencies)</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['dental_repair_related_to_emergencies']}}</strong></td>
    </tr>
   <tr>
      <td><strong>Assistance Center(24-hour)</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['assistance_center24_hour']}}</strong></td>
    </tr>
   <tr>
      <td><strong>Ambulance Transportation</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['ambulance_transportation']}}</strong></td>
    </tr>
   <tr>
      <td><strong>Home Return(Related to Medical Emergencies)</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['home_return_related_to_medical_emergencies']}}</strong></td>
    </tr>
   <tr>
      <td><strong>Repatriation of Remains</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['repatriation_of_remains']}}</strong></td>
    </tr>
   <tr>
      <td><strong>Expenses forCremation Burial
</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['expenses_forcremation_burial']}}</strong></td>
    </tr>
   <tr>
      <td><strong>Pre-existing Medical Conditions(Stability required)
</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['pre_existing_medical_conditions_stability_required']}}</strong></td>
    </tr>
   <tr>
      <td><strong>Expenses forPrivate Duty Nurse Medical Attendant
</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['expenses_forprivate_duty_nurse_medical_attendant']}}</strong></td>
    </tr>
   <tr>
      <td><strong>Medical AppliancesRental Purchase

</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['medical_appliancesrental_purchase']}}</strong></td>
    </tr>
   <tr>
      <td><strong>Side-Trips Benefit(with in Canada and outside of Canada)


</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['side_trips_benefit_with_in_canada_and_outside_of_canada']}}</strong></td>
    </tr>
   <tr>
      <td><strong>Enhanced Benefits


</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['enhanced_benefits']}}</strong></td>
    </tr>
   <tr>
      <td><strong>"Emergency ServicesChiropractor Chiropodist Physiotherapist Osteopath Podiatrist"


</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['emergency_serviceschiropractor_chiropodist_physiotherapist_osteo']}}</strong></td>
    </tr>
   <tr>
      <td><strong>Accidental Death</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['accidental_death']}}</strong></td>
    </tr>
   <tr>
      <td><strong>Double Dismemberment
</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['double_dismemberment']}}</strong></td>
    </tr>
   <tr>
      <td><strong>Single Dismemberment
</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['single_dismemberment']}}</strong></td>
    </tr>
   <tr>
      <td><strong>"Bedside CompanionAccommodation Transportation"
</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['bedside_companionaccommodation_transportation']}}</strong></td>
    </tr>
   <tr>
      <td><strong>"Hospital ExpensesMeals Accommodation Out-of-pocket"
</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['hospital_expensesmeals_accommodation_accommodation_out_of_pocket']}}</strong></td>
    </tr>
   <tr>
      <td><strong>"Maternity Benefits Delivery Coverage"
</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['maternity_benefits_delivery_coverage']}}</strong></td>
    </tr>
   <tr>
      <td><strong>Pregnancy Coverage(Related to Complications)
</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['pregnancy_coverage_related_to_complications']}}</strong></td>
    </tr>
   <tr>
      <td><strong>Physical Examination(Non-emergency)
</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['physical_examination_non_emergency']}}</strong></td>
    </tr>
   <tr>
      <td><strong>Eye Examination(Non-emergency)
</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['eye_examination_non_emergency']}}</strong></td>
    </tr>
   <tr>
      <td><strong>Vaccines(Non-emergency)
</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['vaccines_non_emergency']}}</strong></td>
    </tr>
   <tr>
      <td><strong>"Coverage forChild Care Exp Escort Expenses"
</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['coverage_forchild_care_exp_escort_expenses']}}</strong></td>
    </tr>
   <tr>
      <td><strong>"Coverage forPsychiatric Psychological"
</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['coverage_forpsychiatric_psychological']}}</strong></td>
    </tr>
   <tr>
      <td><strong>Return of a Vehicle
</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['return_of_a_vehicle']}}</strong></td>
    </tr>
   <tr>
      <td><strong>Sports Injuries

</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['sports_injuries']}}</strong></td>
    </tr>
   <tr>
      <td><strong>"AccidentsFlight Travel"

</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['accidentsflight_travel']}}</strong></td>
    </tr>
   <tr>
      <td><strong>Trip-Break Benefit

</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['trip_break_benefit']}}</strong></td>
    </tr>
   <tr>
      <td><strong>Underwritten By

</strong><br />
      </td>
     <td>Max <strong>{{$compare_data['underwritten_by']}}</strong></td>
    </tr>
  </tbody>
</table>
        </div>
      </div>
      
    </div>
    </div>
    </div>
    
</div>
  
</div>
<!-- Form section Ends here -->
@endsection
@extends('layout.commonlayout')

@section('content')
<style>
  .border_div1{
            border-width: 1px 1px 1px 1px;
            border-style: solid;
            border-color: #000;
            padding: 40px;
  }
  .border_div2{
            border-width: 0px 1px 1px 1px;
            border-style: solid;
            border-color: #000;
            padding: 47px;
  }
  .border_div3{
            border-width: 0px 1px 1px 1px;
            border-style: solid;
            border-color: #000;
            padding: 22px;
  }
  .border_div4{
            border-width: 0px 1px 1px 1px;
            border-style: solid;
            border-color: #000;
  }
  .border_div5{
            border-width: 1px 1px 1px 0px;
            border-style: solid;
            border-color: #000;
  }
  .border_div6{
            border-width: 0px 1px 1px 0px;
            border-style: solid;
            border-color: #000;
  }
  .border_div7{
            border-width: 0px 1px 1px 0px;
            border-style: solid;
            border-color: #000;
  }
  .text_position{
    text-align:center;
    padding:5px;
  }
  .border_div8{
            border-width: 0px 2px 1px 0px;
            border-style: solid;
            border-color: #000;
  }
</style>
<div class="compare-table">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 m-auto">
			<div class="backhome">
				<a href="#"><i class="fa fa-arrow-left"></i> BACK TO HOME</a>
			</div>
      <div class="row">
            <div class="col-sm-6">
              <div class="row">
              <div class="col-sm-12 border_div1"  ></div>
                <div class="col-sm-12 border_div2" ></div>
                <div class="col-sm-12 border_div3"></div>
                <div class="col-sm-12 border_div4 text_position" >Covid-19	</div>
                <div class="col-sm-12 border_div4 text_position" >Ambulance	</div>
                <div class="col-sm-12 border_div4 text_position" >Deductible (Per Claim or Per Policy)	</div>
                <div class="col-sm-12 border_div4 text_position" >$2500 Disappearing Deductible</div>
                <div class="col-sm-12 border_div4 text_position" >Hospitalization(Related to Emergency)	</div>
                <div class="col-sm-12 border_div4 text_position" >Services of aA Physician A Surgeon</div>
                <div class="col-sm-12 border_div4 text_position" >Medical Care(Related to Emergencies)</div>
                <div class="col-sm-12 border_div4 text_position" >Walk-in Clinic Visits</div>
                <div class="col-sm-12 border_div4 text_position" >Follow Up Treatment</div>
                <div class="col-sm-12 border_div4 text_position" >Coverage ForLab Diagnostics X-Ray</div>
                <div class="col-sm-12 border_div4 text_position" >Prescriptions(Related to Emergencies)</div>
                <div class="col-sm-12 border_div4 text_position" >Dental Pain Relief</div>
                <div class="col-sm-12 border_div4 text_position" >Dental Repair(Related to Emergencies)	</div>
                <div class="col-sm-12 border_div4 text_position" >Assistance Center(24-hour)</div>
                <div class="col-sm-12 border_div4 text_position" >Ambulance Transportation</div>
                <div class="col-sm-12 border_div4 text_position" >Home Return(Related to Medical Emergencies)</div>
                <div class="col-sm-12 border_div4 text_position" >Repatriation of Remains</div>
                <div class="col-sm-12 border_div4 text_position" >Expenses forCremation Burial	</div>
                <div class="col-sm-12 border_div4 text_position" >Pre-existing Medical Conditions(Stability required)	</div>
                <div class="col-sm-12 border_div4 text_position" >Expenses forPrivate Duty Nurse Medical Attendant</div>
                <div class="col-sm-12 border_div4 text_position" >Medical AppliancesRental Purchase	</div>
                <div class="col-sm-12 border_div4 text_position" >Side-Trips Benefit(with in Canada and outside of Canada)	</div>
                <div class="col-sm-12 border_div4 text_position" >Enhanced Benefits</div>
                <div class="col-sm-12 border_div4 text_position" >"Emergency ServicesChiropractor Chiropodist Physiotherapist Osteopath Podiatrist"</div>
                <div class="col-sm-12 border_div4 text_position" >Accidental Death</div>
                <div class="col-sm-12 border_div4 text_position" >Double Dismemberment</div>
                <div class="col-sm-12 border_div4 text_position" >Single Dismemberment	</div>
                <div class="col-sm-12 border_div4 text_position" >"Bedside CompanionAccommodation Transportation"	</div>
                <div class="col-sm-12 border_div4 text_position" >"Hospital ExpensesMeals Accommodation Out-of-pocket"</div>
                <div class="col-sm-12 border_div4 text_position" >"Maternity Benefits Delivery Coverage"</div>
                <div class="col-sm-12 border_div4 text_position" >Pregnancy Coverage(Related to Complications)</div>
                <div class="col-sm-12 border_div4 text_position" >Physical Examination(Non-emergency)</div>
                <div class="col-sm-12 border_div4 text_position" >Eye Examination(Non-emergency)</div>
                <div class="col-sm-12 border_div4 text_position" >Vaccines(Non-emergency)</div>
                <div class="col-sm-12 border_div4 text_position" >"Coverage forChild Care Exp Escort Expenses"</div>
                <div class="col-sm-12 border_div4 text_position" >"Coverage forPsychiatric Psychological"</div>
                <div class="col-sm-12 border_div4 text_position" >Return of a Vehicle</div>
                <div class="col-sm-12 border_div4 text_position" >Sports Injuries</div>
                <div class="col-sm-12 border_div4 text_position" >"AccidentsFlight Travel"	</div>
                <div class="col-sm-12 border_div4 text_position" >Trip-Break Benefit</div>
                <div class="col-sm-12 border_div4 text_position" >Underwritten By</div>
              </div>
            </div>
            @foreach($compare_quote as $compare)
            <?php 
            $compare_data = companyDetail($compare['c_id']);
            $buyer_id = $compare['id1'].'_'.$compare['id2'];
            $amount1 = valueNumberFormate($compare['final_result1']);
            $amount2 = valueNumberFormate($compare['final_result2']);
            ?>
            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12 border_div5" >
                  <img src="{{companyPhoto($compare['c_id'])}}" class="img-fluid" alt="">
                </div>
                <div class="col-sm-12 border_div6">
                <div><img src="{{asset('assets/user.png')}}" class="user1_img" alt=""> <span class="dollar_sign">$</span>
                <span class="annuallly_amount">{{$amount1[0]}}</span>.<span class="last_digit">{{$amount1[1]}}</span>
                </div>
                <div><img src="{{asset('assets/group.png')}}" class="user1_img" alt=""> <span class="dollar_sign">$</span>
                <span class="annuallly_amount">{{$amount2[0]}}</span>.<span class="last_digit">{{$amount2[1]}}</span>
                </div>
                  <p>Total: {{number_format(($compare['final_result1']+$compare['final_result2']),2)}}</p>
                </div>
                <div class="col-sm-12 border_div6"  style="padding:9px;margin-top:1px">
                <a target="_blank" href="{{ url('super-visa-couple-plan-buyer?' . 
                'visa_type=' . request('visa_type') . '&' . 
                'super_visa_couple_birth1=' . request('super_visa_couple_birth1') . '&' . 
                'super_visa_couple_age1=' . request('super_visa_couple_age1') . '&' . 
                'super_visa_couple_birth2=' . request('super_visa_couple_birth2') . '&' . 
                'super_visa_couple_age2=' . request('super_visa_couple_age2') . '&' . 
                'super_visa_couple_start_date1=' . request('super_visa_couple_start_date1') . '&' . 
                'super_visa_couple_end_date1=' . request('super_visa_couple_end_date1') . '&' . 
                'super_visa_couple_days1=' . request('super_visa_couple_days1') . '&' . 
                'super_visa_couple_start_date2=' . request('super_visa_couple_start_date2') . '&' . 
                'super_visa_couple_end_date2=' . request('super_visa_couple_end_date2') . '&' . 
                'super_visa_couple_days2=' . request('super_visa_couple_days2') . '&' . 
                'super_visa_couple_coverage1=' . request('super_visa_couple_coverage1') . '&' . 
                'super_visa_couple_coverage2=' . request('super_visa_couple_coverage2') . '&' . 
                'detectible_amount=' . request('detectible_amount') . '&' . 
                'super_visa_couple_exit1=' . request('super_visa_couple_exit1') . '&' . 
                'super_visa_couple_exit2=' . request('super_visa_couple_exit2') . '&' . 
                'buyer_id=' . $buyer_id
            ) }}" class="buy-now">BUY NOW</a>
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['covid_19']}}
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['ambulance']}}
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['deductible_per_claim_or_per_policy']}}	
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['2500_disappearing_deductible']}}	
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['hospitalization_related_to_emergency']}}	
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['services_of_a_physician_a_surgeon']}}	
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['medical_care_related_to_emergencies']}}	
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['walk_in_clinic_visits']}}		
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['follow_up_treatment']}}
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['coverage_forlab_diagnostics_x_ray']}}                
              </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['prescriptions_related_to_emergencies']}}
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['dental_pain_relief']}}
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['dental_repair_related_to_emergencies']}}
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['assistance_center24_hour']}}	
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['ambulance_transportation']}}
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['home_return_related_to_medical_emergencies']}}
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['repatriation_of_remains']}}         
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['expenses_forcremation_burial']}}			
                </div>
                <div class="col-sm-12 border_div7 text_position" >
                {{$compare_data['pre_existing_medical_conditions_stability_required']}}	
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['expenses_forprivate_duty_nurse_medical_attendant']}}
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['medical_appliancesrental_purchase']}}
                </div>
                <div class="col-sm-12 border_div7 text_position" >
                	{{$compare_data['side_trips_benefit_with_in_canada_and_outside_of_canada']}}
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['enhanced_benefits']}}
                </div>
                <div class="col-sm-12 border_div7 text_position" >
                {{$compare_data['emergency_serviceschiropractor_chiropodist_physiotherapist_osteo']}}	
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['accidental_death']}}
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['double_dismemberment']}}
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['single_dismemberment']}}
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['bedside_companionaccommodation_transportation']}}
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['hospital_expensesmeals_accommodation_accommodation_out_of_pocket']}}			
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['maternity_benefits_delivery_coverage']}}		
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['pregnancy_coverage_related_to_complications']}}		
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['physical_examination_non_emergency']}}		
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['eye_examination_non_emergency']}}		
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['vaccines_non_emergency']}}			
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['coverage_forchild_care_exp_escort_expenses']}}			
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['coverage_forpsychiatric_psychological']}}			
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['return_of_a_vehicle']}}	
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['sports_injuries']}}		
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['accidentsflight_travel']}}
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['trip_break_benefit']}}
                </div>
                <div class="col-sm-12 border_div7 text_position">
                {{$compare_data['underwritten_by']}}
                </div>
 
              </div>
            </div>
            @endforeach

			</div>
		</div>
	</div>
</div>





<!-- Form section Ends here -->
@endsection 
@extends('backend.master')
  @section('content')
  <?php 
        $c_id = request('company_id');
        $company_detail = companyDetail($c_id);
  ?>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Update Company Detail</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Update Company Detail</h3>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
              <form action="{{url('admin-company-detail-post')}}" method="post">
                @csrf
                <div class="form-group">
                <label for="Covid 19">Covid 19:</label>
                <input type="hidden" class="form-control" id="c_id" name="c_id" value="{{$c_id}}">
                <input type="text" class="form-control" id="covid_19" placeholder="Covid 19" name="covid_19" value="{{$company_detail['covid_19']}}">
                </div>
                <div class="form-group">
                <label for="Covid 19">Ambulance:</label>
                <input type="text" class="form-control" id="ambulance" placeholder="Ambulance" name="ambulance" value="{{$company_detail['ambulance']}}">
                </div>
                <div class="form-group">
                <label for="Deductible (Per Claim or Per Policy)">Deductible (Per Claim or Per Policy):</label>
                <input type="text" class="form-control" id="deductible_per_claim_or_per_policy" placeholder="Deductible (Per Claim or Per Policy)" name="deductible_per_claim_or_per_policy" value="{{$company_detail['deductible_per_claim_or_per_policy']}}">
                </div>
                <div class="form-group">
                <label for="$2500 Disappearing Deductible">$2500 Disappearing Deductible:</label>
                <input type="text" class="form-control" id="2500_disappearing_deductible" placeholder="2500 Disappearing Deductible" name="twentty_five_hundred_disappearing_deductible" value="{{$company_detail['2500_disappearing_deductible']}}">
                </div>
                <div class="form-group">
                <label for="Hospitalization(Related to Emergency)">Hospitalization(Related to Emergency):</label>
                <input type="text" class="form-control" id="hospitalization_related_to_emergency" placeholder="Hospitalization(Related to Emergency)" name="hospitalization_related_to_emergency" value="{{$company_detail['hospitalization_related_to_emergency']}}">
                </div>
                <div class="form-group">
                <label for="Services of aA Physician A Surgeon">Services of aA Physician A Surgeon:</label>
                <input type="text" class="form-control" id="services_of_a_physician_a_surgeon" placeholder="Services of aA Physician A Surgeon" name="services_of_a_physician_a_surgeon" value="{{$company_detail['services_of_a_physician_a_surgeon']}}">
                </div>
                <div class="form-group">
                <label for="Medical Care(Related to Emergencies)">Medical Care(Related to Emergencies):</label>
                <input type="text" class="form-control" id="medical_care_related_to_emergencies" placeholder="Medical Care(Related to Emergencies)" name="medical_care_related_to_emergencies" value="{{$company_detail['medical_care_related_to_emergencies']}}">
                </div>
                <div class="form-group">
                <label for="Walk-in Clinic Visits">Walk-in Clinic Visits:</label>
                <input type="text" class="form-control" id="walk_in_clinic_visits" placeholder="Walk-in Clinic Visits" name="walk_in_clinic_visits" value="{{$company_detail['walk_in_clinic_visits']}}">
                </div>
                <div class="form-group">
                <label for="Follow Up Treatment">Follow Up Treatment:</label>
                <input type="text" class="form-control" id="follow_up_treatment" placeholder="Follow Up Treatment" name="follow_up_treatment" value="{{$company_detail['follow_up_treatment']}}">
                </div>
                <div class="form-group">
                <label for="Coverage ForLab Diagnostics X-Ray">Coverage ForLab Diagnostics X-Ray:</label>
                <input type="text" class="form-control" id="coverage_forlab_diagnostics_x_ray" placeholder="Coverage ForLab Diagnostics X-Ray" name="coverage_forlab_diagnostics_x_ray" value="{{$company_detail['coverage_forlab_diagnostics_x_ray']}}">
                </div>
                <div class="form-group">
                <label for="Prescriptions(Related to Emergencies)">Prescriptions(Related to Emergencies):</label>
                <input type="text" class="form-control" id="prescriptions_related_to_emergencies" placeholder="Prescriptions(Related to Emergencies)" name="prescriptions_related_to_emergencies" value="{{$company_detail['prescriptions_related_to_emergencies']}}">
                </div>
                <div class="form-group">
                <label for="Dental Pain Relief">Dental Pain Relief:</label>
                <input type="text" class="form-control" id="dental_pain_relief" placeholder="Dental Pain Relief" name="dental_pain_relief" value="{{$company_detail['dental_pain_relief']}}">
                </div>
                <div class="form-group">
                <label for="Dental Repair(Related to Emergencies)">Dental Repair(Related to Emergencies):</label>
                <input type="text" class="form-control" id="dental_repair_related_to_emergencies" placeholder="Dental Repair(Related to Emergencies)" name="dental_repair_related_to_emergencies" value="{{$company_detail['dental_repair_related_to_emergencies']}}">
                </div>
                <div class="form-group">
                <label for="Assistance Center(24-hour)">Assistance Center(24-hour):</label>
                <input type="text" class="form-control" id="assistance_center24_hour" placeholder="Assistance Center(24-hour)" name="assistance_center24_hour" value="{{$company_detail['assistance_center24_hour']}}">
                </div>
                <div class="form-group">
                <label for="Ambulance Transportation">Ambulance Transportation:</label>
                <input type="text" class="form-control" id="ambulance_transportation" placeholder="Ambulance Transportation" name="ambulance_transportation" value="{{$company_detail['ambulance_transportation']}}">
                </div>
                <div class="form-group">
                <label for="Home Return(Related to Medical Emergencies)">Home Return(Related to Medical Emergencies):</label>
                <input type="text" class="form-control" id="home_return_related_to_medical_emergencies" placeholder="Home Return(Related to Medical Emergencies)" name="home_return_related_to_medical_emergencies" value="{{$company_detail['home_return_related_to_medical_emergencies']}}">
                </div>
                <div class="form-group">
                <label for="Repatriation of Remains">Repatriation of Remains:</label>
                <input type="text" class="form-control" id="repatriation_of_remains" placeholder="Repatriation of Remains" name="repatriation_of_remains" value="{{$company_detail['repatriation_of_remains']}}">
                </div>
                <div class="form-group">
                <label for="Expenses forCremation Burial">Expenses forCremation Burial:</label>
                <input type="text" class="form-control" id="expenses_forcremation_burial" placeholder="Expenses forCremation Burial" name="expenses_forcremation_burial" value="{{$company_detail['expenses_forcremation_burial']}}">
                </div>
                <div class="form-group">
                <label for="Pre-existing Medical Conditions(Stability required)">Pre-existing Medical Conditions(Stability required):</label>
                <input type="text" class="form-control" id="pre_existing_medical_conditions_stability_required" placeholder="Pre-existing Medical Conditions(Stability required)" name="pre_existing_medical_conditions_stability_required" value="{{$company_detail['pre_existing_medical_conditions_stability_required']}}">
                </div>
                <div class="form-group">
                <label for="Expenses forPrivate Duty Nurse Medical Attendant">Expenses forPrivate Duty Nurse Medical Attendant:</label>
                <input type="text" class="form-control" id="expenses_forprivate_duty_nurse_medical_attendant" placeholder="Expenses forPrivate Duty Nurse Medical Attendant" name="expenses_forprivate_duty_nurse_medical_attendant" value="{{$company_detail['expenses_forprivate_duty_nurse_medical_attendant']}}">
                </div>
                <div class="form-group">
                <label for="Medical AppliancesRental Purchase">Medical AppliancesRental Purchase:</label>
                <input type="text" class="form-control" id="medical_appliancesrental_purchase" placeholder="Medical AppliancesRental Purchase" name="medical_appliancesrental_purchase" value="{{$company_detail['medical_appliancesrental_purchase']}}">
                </div>
                <div class="form-group">
                <label for="Side-Trips Benefit(with in Canada and outside of Canada)">Side-Trips Benefit(with in Canada and outside of Canada):</label>
                <input type="text" class="form-control" id="side_trips_benefit_with_in_canada_and_outside_of_canada" placeholder="Side-Trips Benefit(with in Canada and outside of Canada)" name="side_trips_benefit_with_in_canada_and_outside_of_canada" value="{{$company_detail['side_trips_benefit_with_in_canada_and_outside_of_canada']}}">
                </div>
                <div class="form-group">
                <label for="Enhanced Benefits">Enhanced Benefits:</label>
                <input type="text" class="form-control" id="enhanced_benefits" placeholder="Enhanced Benefits" name="enhanced_benefits" value="{{$company_detail['enhanced_benefits']}}">
                </div>
                <div class="form-group">
                <label for="Emergency ServicesChiropractor Chiropodist Physiotherapist Osteopath Podiatrist">"Emergency ServicesChiropractor Chiropodist Physiotherapist Osteopath Podiatrist":</label>
                <input type="text" class="form-control" id="emergency_serviceschiropractor_chiropodist_physiotherapist_osteo" placeholder="Emergency ServicesChiropractor Chiropodist Physiotherapist Osteopath Podiatrist" name="emergency_serviceschiropractor_chiropodist_physiotherapist_osteo" value="{{$company_detail['emergency_serviceschiropractor_chiropodist_physiotherapist_osteo']}}">
                </div>
                <div class="form-group">
                <label for="Accidental Death">Accidental Death:</label>
                <input type="text" class="form-control" id="accidental_death" placeholder="Accidental Death" name="accidental_death" value="{{$company_detail['accidental_death']}}">
                </div>
                <div class="form-group">
                <label for="Double Dismemberment">Double Dismemberment:</label>
                <input type="text" class="form-control" id="double_dismemberment" placeholder="Double Dismemberment" name="double_dismemberment" value="{{$company_detail['double_dismemberment']}}">
                </div>
                <div class="form-group">
                <label for="Single Dismemberment">Single Dismemberment:</label>
                <input type="text" class="form-control" id="single_dismemberment" placeholder="Single Dismemberment" name="single_dismemberment" value="{{$company_detail['single_dismemberment']}}">
                </div>
                <div class="form-group">
                <label for="Bedside CompanionAccommodation Transportation">Bedside CompanionAccommodation Transportation:</label>
                <input type="text" class="form-control" id="bedside_companionaccommodation_transportation" placeholder="Bedside CompanionAccommodation Transportation" name="bedside_companionaccommodation_transportation" value="{{$company_detail['bedside_companionaccommodation_transportation']}}">
                </div>
                <div class="form-group">
                <label for="Hospital ExpensesMeals Accommodation Out-of-pocket">Hospital ExpensesMeals Accommodation Out-of-pocket:</label>
                <input type="text" class="form-control" id="hospital_expensesmeals_accommodation_accommodation_out_of_pocket" placeholder="Hospital ExpensesMeals Accommodation Out-of-pocket" name="hospital_expensesmeals_accommodation_accommodation_out_of_pocket" value="{{$company_detail['hospital_expensesmeals_accommodation_accommodation_out_of_pocket']}}">
                </div>
                <div class="form-group">
                <label for="Maternity Benefits Delivery Coverage">Maternity Benefits Delivery Coverage:</label>
                <input type="text" class="form-control" id="maternity_benefits_delivery_coverage" placeholder="Maternity Benefits Delivery Coverage" name="maternity_benefits_delivery_coverage" value="{{$company_detail['maternity_benefits_delivery_coverage']}}">
                </div>
                <div class="form-group">
                <label for="Pregnancy Coverage(Related to Complications)">Pregnancy Coverage(Related to Complications):</label>
                <input type="text" class="form-control" id="pregnancy_coverage_related_to_complications" placeholder="Pregnancy Coverage(Related to Complications)" name="pregnancy_coverage_related_to_complications" value="{{$company_detail['pregnancy_coverage_related_to_complications']}}">
                </div>
                <div class="form-group">
                <label for="Physical Examination(Non-emergency)">Physical Examination(Non-emergency):</label>
                <input type="text" class="form-control" id="physical_examination_non_emergency" placeholder="Physical Examination(Non-emergency)" name="physical_examination_non_emergency" value="{{$company_detail['physical_examination_non_emergency']}}">
                </div>
                <div class="form-group">
                <label for="Eye Examination(Non-emergency)">Eye Examination(Non-emergency):</label>
                <input type="text" class="form-control" id="eye_examination_non_emergency" placeholder="Eye Examination(Non-emergency)" name="eye_examination_non_emergency" value="{{$company_detail['eye_examination_non_emergency']}}">
                </div>
                <div class="form-group">
                <label for="Vaccines(Non-emergency)">Vaccines(Non-emergency):</label>
                <input type="text" class="form-control" id="vaccines_non_emergency" placeholder="Vaccines(Non-emergency)" name="vaccines_non_emergency" value="{{$company_detail['vaccines_non_emergency']}}">
                </div>
                <div class="form-group">
                <label for="Coverage forChild Care Exp Escort Expenses">Coverage forChild Care Exp Escort Expenses:</label>
                <input type="text" class="form-control" id="coverage_forchild_care_exp_escort_expenses" placeholder="Coverage forChild Care Exp Escort Expenses" name="coverage_forchild_care_exp_escort_expenses" value="{{$company_detail['coverage_forchild_care_exp_escort_expenses']}}">
                </div>
                <div class="form-group">
                <label for="Coverage forPsychiatric Psychological">Coverage forPsychiatric Psychological:</label>
                <input type="text" class="form-control" id="coverage_forpsychiatric_psychological" placeholder="Coverage forPsychiatric Psychological" name="coverage_forpsychiatric_psychological" value="{{$company_detail['coverage_forpsychiatric_psychological']}}">
                </div>
                <div class="form-group">
                <label for="Return of a Vehicle">Return of a Vehicle:</label>
                <input type="text" class="form-control" id="return_of_a_vehicle" placeholder="Return of a Vehicle" name="return_of_a_vehicle" value="{{$company_detail['return_of_a_vehicle']}}">
                </div>
                <div class="form-group">
                <label for="Sports Injuries">Sports Injuries:</label>
                <input type="text" class="form-control" id="sports_injuries" placeholder="Sports Injuries" name="sports_injuries" value="{{$company_detail['sports_injuries']}}">
                </div>
                <div class="form-group">
                <label for="AccidentsFlight Travel">AccidentsFlight Travel:</label>
                <input type="text" class="form-control" id="accidentsflight_travel" placeholder="AccidentsFlight Travel" name="accidentsflight_travel" value="{{$company_detail['accidentsflight_travel']}}">
                </div>
                <div class="form-group">
                <label for="Trip-Break Benefit">Trip-Break Benefit:</label>
                <input type="text" class="form-control" id="trip_break_benefit" placeholder="Trip-Break Benefit" name="trip_break_benefit" value="{{$company_detail['trip_break_benefit']}}">
                </div>
                <div class="form-group">
                <label for="Underwritten By">Underwritten By:</label>
                <input type="text" class="form-control" id="underwritten_by" placeholder="Underwritten By" name="underwritten_by" value="{{$company_detail['underwritten_by']}}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @stop
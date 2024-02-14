@extends('layout.commonlayout')
@section('content')
<!-- Form section start here -->
<style>
        /* Add margin to the labels */
        .form-check-label {
            margin-right: 20px; /* Adjust the margin as needed */
        }

        /* Make labels bold */
        .form-check-label {
            font-weight: bold;
        }
    </style>

<?php 
if(Session::get('visitor_visa_family_request_data')){
  $request_data3 =  Session::get('visitor_visa_family_request_data');
 
}
if(Session::get('visitor_visa_family_deductible')){
  $deductible3 = Session::get('visitor_visa_family_deductible');
  
}
if (isset($_REQUEST['visa_type']) && $_REQUEST['visa_type'] == "visitorSingle") {
    $check_insurance = $_REQUEST['visa_type'];
} 
elseif(isset($_REQUEST['visa_type']) && $_REQUEST['visa_type'] == "visitorCouple"){
  $check_insurance = $_REQUEST['visa_type'];
}
elseif(isset($_REQUEST['visa_type']) && $_REQUEST['visa_type'] == "visitorFamily"){
  $check_insurance = $_REQUEST['visa_type'];
}
else {
    $check_insurance = "";
}
?>   
<div class="section-larger">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <nav class="policy-form">
          <h6>What type of policy do you want?</h6>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <div class="form-check">
        <input type="radio" class="form-check-input visitor" id="visitor-single-coverage" name="visitor_policy" value="visitor1" <?php if(isset($_REQUEST['visa_type']) && $_REQUEST['visa_type']=="visitorSingle" ){ echo"checked"; } else{ echo"checked"; }?>>
        <label class="form-check-label" for="visitor-single-coverage">SINGLE COVERAGE</label>

        <input type="radio" class="form-check-input visitor" id="visitor-couple-policy" name="visitor_policy" value="visitor2" <?php if(isset($_REQUEST['visa_type']) && $_REQUEST['visa_type']=="visitorCouple" ){ echo"checked"; }?>>
        <label class="form-check-label" for="visitor-couple-policy">COUPLE POLICY</label>

        <input type="radio" class="form-check-input visitor" id="visitor-family-coverage" name="visitor_policy" value="visitor3" <?php if(isset($_REQUEST['visa_type']) && $_REQUEST['visa_type']=="visitorFamily" ){ echo"checked"; }?>>
        <label class="form-check-label" for="visitor-family-coverage">FAMILY COVERAGE</label>

    </div>
</div>
</nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane show active fade  visitor-form1" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          <form class="form-1 visitor-visa-form1" action="{{url('visitor-visa-single-quotation')}}" method="get">
              <!-- @csrf -->
            <div class="form-field-row">
             <input type="hidden" name="visitor_type" value="visitorSingle">   
             <input type="hidden" name="deductible" value="0">   
            @php
                $currentDate = \Carbon\Carbon::now()->subYears(40);
            @endphp
            <input type="hidden" name="visa_type" value="visitorSingle">
            <div class="field-dob">
                <span>Date of Birth</span>
                <input type="date" id="singledob" class="form-control singledob" name="date_of_birth" placeholder="Date of Birth" data-date="" value="<?php if(isset($_REQUEST['date_of_birth'])){ echo $_REQUEST['date_of_birth'];}  ?>" data-date-format="DD MMMM YYYY" max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                <label>MM-DD-YYYY format</label>
            </div>
                <div class="field-or">or</div>
                <div class="field-tage">
                  <span>Age</span>
                  <input type="number" class="form-control ageInput" id="ageInput" name="age" value="<?php if(isset($_REQUEST['age'])){ echo $_REQUEST['age'];} else{ echo "35";} ?>" oninput="singleCoverageValidateAge()">
                  <label>years</label>

              </div>
            </div>
            <!-- <div id="errorDiv" style="color: red;"></div> -->
            <div id="errorDiv" style="color: red;"></div>
            <div class="ageError" style="color: red;"></div>
            <div id="error-message" style="color: red;"></div>
            <div class="form-field-row">
            <div class="sdate">
                <?php  
                $start_date = \Carbon\Carbon::now()->format('Y-m-d');
                
                ?>
                <span>Start Date</span>
                <input type="date" class="form-control visitor-single-pilicy-start-date"  name="start_date" placeholder="Start Date" value="<?php if(isset($_REQUEST['start_date'])){ echo $_REQUEST['start_date'];} else{ echo $start_date; }  ?>" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                <label id="startFormattedDateLabel" class="startFormattedDateLabel">MM-DD-YYYY format</label>
            </div>

            <div class="edate">
                <?php
                    $futureDate = \Carbon\Carbon::now()->addDays(90)->format('Y-m-d');
                ?>
                <span>End Date</span>
                <input type="date" class="form-control visitor-single-pilicy-end-date" name="end_date" placeholder="Start Date" value="<?php if(isset($_REQUEST['end_date'])){ echo $_REQUEST['end_date'];} else{ echo $futureDate;}  ?>">
                <label id="startFormattedDateLabel" class="startFormattedDateLabel">MM-DD-YYYY format</label>
            </div>
                <div class="field-or">or</div>
                <div class="field-tdays">
                	<span>Days</span>
                	<input type="number" class="form-control visitor-couple-single-day" value="<?php if(isset($_REQUEST['no_of_days'])){ echo $_REQUEST['no_of_days'];}else{ echo"90";}  ?>" name="no_of_days" oninput="singleCoverageDay()">
                    <label></label>
                </div>
            </div>
            <div class="daysInputErrors" style="color: red;"></div>
            <div class="form-field-row">
            	<div class="coverage">
                	 <span>Coverage</span>
                    <select class="form-control" name="coverage_amt">
                        <option value="10000" <?php if(isset($_REQUEST['coverage_amt']) && $_REQUEST['coverage_amt']=="10000"){ echo"selected";}  ?>>10,000 </option>
                        <option value="15000" <?php if(isset($_REQUEST['coverage_amt']) && $_REQUEST['coverage_amt']=="15000"){ echo"selected";}  ?>>15,000</option>
                        <option value="25000" <?php if(isset($_REQUEST['coverage_amt']) && $_REQUEST['coverage_amt']=="25000"){ echo"selected";}  ?>>25,000</option>
                        <option value="50000" <?php if(isset($_REQUEST['coverage_amt']) && $_REQUEST['coverage_amt']=="50000"){ echo"selected";} else{ echo"selected";}  ?>>50,000</option>
                        <option value="100000" <?php if(isset($_REQUEST['coverage_amt']) && $_REQUEST['coverage_amt']=="100000"){ echo"selected";}  ?>>100,000</option>
                        <option value="150000" <?php if(isset($_REQUEST['coverage_amt']) && $_REQUEST['coverage_amt']=="150000"){ echo"selected";}  ?>>150,000</option>
                        <option value="200000" <?php if(isset($_REQUEST['coverage_amt']) && $_REQUEST['coverage_amt']=="200000"){ echo"selected";}  ?>>200,000</option>
                        <option value="250000" <?php if(isset($_REQUEST['coverage_amt']) && $_REQUEST['coverage_amt']=="250000"){ echo"selected";}  ?>>250,000</option>
                        <option value="300000" <?php if(isset($_REQUEST['coverage_amt']) && $_REQUEST['coverage_amt']=="300000"){ echo"selected";}  ?>>300,000</option
                        ><option value="500000" <?php if(isset($_REQUEST['coverage_amt']) && $_REQUEST['coverage_amt']=="500000"){ echo"selected";}  ?>>500,000</option>
                        <option value="1000000" <?php if(isset($_REQUEST['coverage_amt']) && $_REQUEST['coverage_amt']=="1000000"){ echo"selected";}  ?>>1,000,000</option>
                    </select>
                </div>
            </div>
               
            <p>Would you like to cover pre-existing medical conditions?</p>
            
            
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="customRadioInline1" name="pre_exit" class="custom-control-input" value="0" <?php if(isset($_REQUEST['pre_exit']) && $_REQUEST['pre_exit']=="0"){ echo "checked"; } else{echo "checked";}?>>
              <label class="custom-control-label" for="customRadioInline1">No</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="customRadioInline2" name="pre_exit" class="custom-control-input" value="1" <?php if(isset($_REQUEST['pre_exit']) && $_REQUEST['pre_exit']=="1"){ echo "checked"; }?>>
              <label class="custom-control-label" for="customRadioInline2">Yes</label>
            </div>
            
            
            <input type="submit" value="GET QUOTE" class="quote">
              
            </form>
          </div>
          <div class="tab-pane show fade visitor-form2" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
          <form class="form-1 visitor-form2" action="{{url('visitor-couple-coverage-quotation')}}" method="get">
            <!-- @csrf -->
            <input type="hidden" name="visa_type" value="visitorCouple">
            <input type="hidden" name="detectible_amount" value="0">

            <div class="form-field-row">
            <div class="number">1</div>
            	<div class="field-dob">
                	 <span>Date of Birth</span>

                	<input type="date" class="form-control visitor-couple-policy-date1" name="visitor_visa_couple_birth1" placeholder="Date of Birth" max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" value="<?php if(isset($_REQUEST['visitor_visa_couple_birth1'])){ echo $_REQUEST['visitor_visa_couple_birth1'];} ?>">

                    <label>MM-DD-YYYY format</label>
                </div>
                <div class="field-or">or</div>
                <div class="field-tage">
                	<span>Age</span>

                	<input type="number" class="form-control visitor-couple-policy-year1" name="visitor_visa_couple_age1" value="<?php if(isset($_REQUEST['visitor_visa_couple_age1'])){ echo $_REQUEST['visitor_visa_couple_age1'];} else{ echo"35";} ?>" oninput="visitorCouple1()">
                    <label>years</label>
                    
                </div>
            </div>
            <p id="error-visitor-couple1-date-of-birth" style="color: red;"></p>

            <div class="form-field-row">
            <div class="number2">2</div>
            	<div class="field-dob">
                	 <span>Date of Birth</span>

                	<input type="date" class="form-control visitor-couple-policy-date2" name="visitor_visa_couple_birth2" placeholder="Date of Birth" max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"  value="<?php if(isset($_REQUEST['visitor_visa_couple_birth2'])){ echo $_REQUEST['visitor_visa_couple_birth2'];} ?>">

                    <label>MM-DD-YYYY format</label>
                </div>
                <div class="field-or">or</div>
                <div class="field-tage">
                	<span>Age</span>

                	<input type="number" class="form-control visitor-couple-policy-year2" name="visitor_visa_couple_age2" value="<?php if(isset($_REQUEST['visitor_visa_couple_age2'])){ echo $_REQUEST['visitor_visa_couple_age2'];}else{ echo"30";} ?>" oninput="visitorCouple2()">
                    <label>years</label>

                </div>

            </div>        
            <p id="error-visitor-couple2-date-of-birth" style="color: red;"></p>

            <div class="form-field-row">
            <div class="sdate">

              
            <?php 
            if(isset($_REQUEST['visitor_visa_couple_start_date1'])){ 
                $start_date1 = $_REQUEST['visitor_visa_couple_start_date1'];
            }else{
                $start_date1 = \Carbon\Carbon::now()->format('Y-m-d');
            } 
            ?>
            
                <span>Start Date</span>
                <input type="date" class="form-control visitor-couple-start-date1" name="visitor_visa_couple_start_date1" placeholder="Start Date" value="{{$start_date1}}" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                <label id="startFormattedDateLabel" >MM-DD-YYYY format</label>
            </div>

            <div class="edate">
                <?php
                    $futureDate = \Carbon\Carbon::now()->addDays(90)->format('Y-m-d');
                    $formattedFutureDate = \Carbon\Carbon::parse($futureDate)->format('d-m-Y');
                ?>
                <span>End Date</span>
                <input type="date" class="form-control visitor-couple-end-date1" name="visitor_visa_couple_end_date1" placeholder="End Date" value="<?php if(isset($_REQUEST['visitor_visa_couple_end_date1'])){ echo $_REQUEST['visitor_visa_couple_end_date1'];} else{ echo $futureDate;} ?>">
                <label id="">MM-DD-YYYY format</label>
            </div>

                <div class="field-or">or</div>
                <div class="field-tdays">
                	<span>Days</span>
                	<input type="number" class="form-control visitor-couple-days1" name="visitor_visa_couple_days1" value="<?php if(isset($_REQUEST['visitor_visa_couple_days1'])){ echo $_REQUEST['visitor_visa_couple_days1'];} else{ echo "90";} ?>" oninput="coupleDay1()">
                    <label></label>
                </div>
            </div>
            <p id="error-visitor-couple-days1" style="color: red;"></p>

            
           	<div class="seconddate">
            	<div class="form-field-row">
            	<div class="sdate">
                <?php 
                if(isset($_REQUEST['visitor_visa_couple_start_date2'])){ 
                    $start_date2 = $_REQUEST['visitor_visa_couple_start_date2'];
                }else{
                    $start_date2 = \Carbon\Carbon::now()->format('Y-m-d') ;
                } 
                ?>
                	 <span>Start Date</span>

                	<input type="date" class="form-control visitor-couple-start-date2" name="visitor_visa_couple_start_date2" placeholder="Date of Birth" value="{{$start_date2 }}" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                    <label>MM-DD-YYYY format</label>
                </div>
                <div class="edate">
                <?php
                    $futureDate = \Carbon\Carbon::now()->addDays(90)->format('Y-m-d');
                    $formattedFutureDate = \Carbon\Carbon::parse($futureDate)->format('d-m-Y');
                ?>
                	 <span>End Date</span>
                	<input type="date"  class="form-control visitor-couple-end-date2" name="visitor_visa_couple_end_date2" placeholder="Date of Birth" value="<?php if(isset($_REQUEST['visitor_visa_couple_end_date2'])){ echo $_REQUEST['visitor_visa_couple_end_date2'];} else{ echo $futureDate;} ?>">

                    <label>MM-DD-YYYY format</label>
                </div>
                <div class="field-or">or</div>
                <div class="field-tdays">
                	<span>Days</span>

                	<input type="number" class="form-control visitor-couple-days2" name="visitor_visa_couple_days2" value="<?php if(isset($_REQUEST['visitor_visa_couple_days2'])){ echo $_REQUEST['visitor_visa_couple_days2'];} else{ echo "90";} ?>" oninput="coupleDay2()">
                    <label>Days</label>
                </div>
            </div>
            <p id="error-visitor-couple-days2" style="color: red;"></p>

            </div>
            
            <a class="seconddate-toggle" href="javascript: void(0)">+ Enter different dates per applicant</a>
                                <input type="hidden" class="coverage-check" value="" name="coverage_check">

            <div class="form-field-row">
            	<div class="coverage">
                	 <span>Coverage</span>
                    <select class="form-control visitor_visa_couple_coverage1" name="visitor_visa_couple_coverage1">
                    <option value="10000" <?php if(isset($_REQUEST['visitor_visa_couple_coverage1']) && $_REQUEST['visitor_visa_couple_coverage1']=="10000"){ echo"selected";}  ?>>10,000 </option>
                        <option value="15000" <?php if(isset($_REQUEST['visitor_visa_couple_coverage1']) && $_REQUEST['visitor_visa_couple_coverage1']=="15000"){ echo"selected";}  ?>>15,000</option>
                        <option value="25000" <?php if(isset($_REQUEST['visitor_visa_couple_coverage1']) && $_REQUEST['visitor_visa_couple_coverage1']=="25000"){ echo"selected";}  ?>>25,000</option>
                        <option value="50000" <?php if(isset($_REQUEST['visitor_visa_couple_coverage1']) && $_REQUEST['visitor_visa_couple_coverage1']=="50000"){ echo"selected";} else{ echo"selected";}  ?>>50,000</option>
                        <option value="100000" <?php if(isset($_REQUEST['visitor_visa_couple_coverage1']) && $_REQUEST['visitor_visa_couple_coverage1']=="100000"){ echo"selected";}  ?>>100,000</option>
                        <option value="150000" <?php if(isset($_REQUEST['visitor_visa_couple_coverage1']) && $_REQUEST['visitor_visa_couple_coverage1']=="150000"){ echo"selected";}  ?>>150,000</option>
                        <option value="200000" <?php if(isset($_REQUEST['visitor_visa_couple_coverage1']) && $_REQUEST['visitor_visa_couple_coverage1']=="200000"){ echo"selected";}  ?>>200,000</option>
                        <option value="250000" <?php if(isset($_REQUEST['visitor_visa_couple_coverage1']) && $_REQUEST['visitor_visa_couple_coverage1']=="250000"){ echo"selected";}  ?>>250,000</option>
                        <option value="300000" <?php if(isset($_REQUEST['visitor_visa_couple_coverage1']) && $_REQUEST['visitor_visa_couple_coverage1']=="300000"){ echo"selected";}  ?>>300,000</option
                        ><option value="500000" <?php if(isset($_REQUEST['visitor_visa_couple_coverage1']) && $_REQUEST['visitor_visa_couple_coverage1']=="500000"){ echo"selected";}  ?>>500,000</option>
                        <option value="1000000" <?php if(isset($_REQUEST['visitor_visa_couple_coverage1']) && $_REQUEST['visitor_visa_couple_coverage1']=="1000000"){ echo"selected";}  ?>>1,000,000</option>
                    </select>  
                </div> 
            </div>
            <div class="otheramt" <?php if(isset($_REQUEST['coverage_check']) && $_REQUEST['coverage_check']=="yes"){echo"";}else{echo "style='display:none;'";}?>>

            <div class="form-field-row" >
            	<div class="coverage" >
                	 <span>Coverage</span>
                    <select class="form-control" name="visitor_visa_couple_coverage2">
                    <option value="10000" <?php if(isset($_REQUEST['visitor_visa_couple_coverage2']) && $_REQUEST['visitor_visa_couple_coverage2']=="10000"){ echo"selected";}  ?>>10,000 </option>
                        <option value="15000" <?php if(isset($_REQUEST['visitor_visa_couple_coverage2']) && $_REQUEST['visitor_visa_couple_coverage2']=="15000"){ echo"selected";}  ?>>15,000</option>
                        <option value="25000" <?php if(isset($_REQUEST['visitor_visa_couple_coverage2']) && $_REQUEST['visitor_visa_couple_coverage2']=="25000"){ echo"selected";}  ?>>25,000</option>
                        <option value="50000" <?php if(isset($_REQUEST['visitor_visa_couple_coverage2']) && $_REQUEST['visitor_visa_couple_coverage2']=="50000"){ echo"selected";} else{ echo"selected";}  ?>>50,000</option>
                        <option value="100000" <?php if(isset($_REQUEST['visitor_visa_couple_coverage2']) && $_REQUEST['visitor_visa_couple_coverage2']=="100000"){ echo"selected";}  ?>>100,000</option>
                        <option value="150000" <?php if(isset($_REQUEST['visitor_visa_couple_coverage2']) && $_REQUEST['visitor_visa_couple_coverage2']=="150000"){ echo"selected";}  ?>>150,000</option>
                        <option value="200000" <?php if(isset($_REQUEST['visitor_visa_couple_coverage2']) && $_REQUEST['visitor_visa_couple_coverage2']=="200000"){ echo"selected";}  ?>>200,000</option>
                        <option value="250000" <?php if(isset($_REQUEST['visitor_visa_couple_coverage2']) && $_REQUEST['visitor_visa_couple_coverage2']=="250000"){ echo"selected";}  ?>>250,000</option>
                        <option value="300000" <?php if(isset($_REQUEST['visitor_visa_couple_coverage2']) && $_REQUEST['visitor_visa_couple_coverage2']=="300000"){ echo"selected";}  ?>>300,000</option
                        ><option value="500000" <?php if(isset($_REQUEST['visitor_visa_couple_coverage2']) && $_REQUEST['visitor_visa_couple_coverage2']=="500000"){ echo"selected";}  ?>>500,000</option>
                        <option value="1000000" <?php if(isset($_REQUEST['visitor_visa_couple_coverage2']) && $_REQUEST['visitor_visa_couple_coverage2']=="1000000"){ echo"selected";}  ?>>1,000,000</option> </select>  
                </div>

            </div>
            </div>
            <a class="otheramt-toggle" href="javascript: void(0)"><?php if(isset($_REQUEST['coverage_check']) && $_REQUEST['coverage_check']=="yes"){echo"- Enter different coverage amount per applicant";}else{echo "+ Enter different coverage amount per applicant";}?></a>
            
            <!-- <input type="hidden" name="amt_type" class="amt_type" value="0" > -->
               
            <p>Would you like to cover pre-existing medical conditions?</p>
            
            <div class="row">
            <div class="col-lg-12">
            <div class="m1">
            <div class="number">1</div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="visitor-couple-exit1" name="visitor_visa_couple_exit1" class="custom-control-input" value="0" <?php if(isset($_REQUEST['visitor_visa_couple_exit1'])){ if($_REQUEST['visitor_visa_couple_exit1']=="0"){ echo"checked";} } else{ echo "checked";}?>>
              <label class="custom-control-label" for="visitor-couple-exit1">No</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="visitor-couple-exit2" name="visitor_visa_couple_exit1" class="custom-control-input" value="1" <?php if(isset($_REQUEST['visitor_visa_couple_exit1']) && $_REQUEST['visitor_visa_couple_exit1']=="1"){ echo "checked"; }?>>
              <label class="custom-control-label" for="visitor-couple-exit2">Yes</label>
            </div>
            </div>
            </div>
            </div>
            
            
            
           <div class="row">
            <div class="col-lg-12">
             <div class="m1">
            <div class="number2">2</div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="visitor-couple-exit3" name="visitor_visa_couple_exit2" class="custom-control-input" value="0" <?php if(isset($_REQUEST['visitor_visa_couple_exit2'])){ if($_REQUEST['visitor_visa_couple_exit2']=="0"){ echo"checked";} } else{ echo "checked";}?>>
              <label class="custom-control-label" for="visitor-couple-exit3">No</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="visitor-couple-exit4" name="visitor_visa_couple_exit2" class="custom-control-input" value="1" <?php if(isset($_REQUEST['visitor_visa_couple_exit2']) && $_REQUEST['visitor_visa_couple_exit2']=="1"){ echo "checked"; }?>>
              <label class="custom-control-label" for="visitor-couple-exit4">Yes</label>
            </div>
            </div>
            </div>
            </div>
            
            
            <input type="submit" value="GET QUOTE" class="quote">
              
            </form>
            	
          </div>
          <div class="tab-pane show fade visitor-form3" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
          <form class="form-1 family-form" action="{{url('visitor-family-coverage-quotation')}}" method="get">
                <input type="hidden" name="visa_type" value="visitorFamily">
                <input type="hidden" name="visitor_type" value="visitorFamily">   
                <input type="hidden" class="visitor_family_deductible" name="visitor_family_deductible" value="0">   


            <div class="form-field-row">
            <div class="number">1</div>
            	<div class="field-dob">
                	 <span>Date of Birth</span>

                	<input type="date" class="form-control visitor-family-policy-date1" name="visitor_family_policy_date1" placeholder="Date of Birth" max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" value="<?php if(isset($_REQUEST['visitor_family_policy_date1'])){ echo $_REQUEST['visitor_family_policy_date1'];} ?>">

                    <label>MM-DD-YYYY format</label>
                </div>
                <div class="field-or">or</div>
                <div class="field-tage">
                	<span>Age</span>

                	<input type="number" class="form-control visitor-family-policy-year1" name="visitor_family_policy_year1" value="<?php if(isset($_REQUEST['visitor_family_policy_year1'])){ echo $_REQUEST['visitor_family_policy_year1'];} else{ echo"35";} ?>" oninput="familyAge1()">
                    <label>years</label>
                    
                </div>
            </div>
            <p id="error-visitor-family-policy-year1" style="color: red;"></p>

            <div class="form-field-row">
            <div class="number2">2</div>
            	<div class="field-dob">
                	 <span>Date of Birth</span>

                	<input type="date" class="form-control visitor-family-policy-date2" name="visitor_family_policy_date2" placeholder="Date of Birth" max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" value="<?php if(isset($_REQUEST['visitor_family_policy_date2'])){ echo $_REQUEST['visitor_family_policy_date2'];} ?>" >

                    <label>MM-DD-YYYY format</label>
                </div>
                <div class="field-or">or</div>
                <div class="field-tage">
                	<span>Age</span>

                	<input type="number" class="form-control visitor-family-policy-year2" name="visitor_family_policy_year2" value="<?php if(isset($_REQUEST['visitor_family_policy_year2'])){ echo $_REQUEST['visitor_family_policy_year2'];} else{ echo"30";} ?>" oninput="familyAge2()">
                    <label>years</label>

                </div>

            </div>        
            <p id="error-visitor-family-policy-year2" style="color: red;"></p>
            <div class="form-field-row">
            	<div class="coverage">
                	 <span>No of dependents</span>
                    <select class="form-control">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    </select>  
                </div> 
            </div>
            
            <div class="form-field-row">
            <div class="sdate">
            <?php 
            if(isset($_REQUEST['visitor_family_start_date'])){
                 $start_date =  $_REQUEST['visitor_family_start_date'];
            }
            else{ 
                $start_date =  \Carbon\Carbon::now()->format('Y-m-d');
            } 
            ?>
                <span>Start Date</span>
                <input type="date" class="form-control visitor-family-start-date" name="visitor_family_start_date" placeholder="Start Date" value="{{ $start_date }}" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                <label id="startFormattedDateLabel" >MM-DD-YYYY format</label>
            </div>

            <div class="edate">
                <?php
                    $futureDate = \Carbon\Carbon::now()->addDays(90)->format('Y-m-d');
                    $formattedFutureDate = \Carbon\Carbon::parse($futureDate)->format('d-m-Y');
                ?>
                <span>End Date</span>
                <input type="date" class="form-control visitor-family-end-date" name="visitor_family_end_date" placeholder="End Date" value="<?php if(isset($_REQUEST['visitor_family_end_date'])){ echo $_REQUEST['visitor_family_end_date'];} else{ echo $futureDate;} ?>">
                <label id="">MM-DD-YYYY format</label>
            </div>

                <div class="field-or">or</div>
                <div class="field-tdays">
                	<span>Days</span>
                	<input type="number" class="form-control visitor-family-days" name="visitor_family_days" value="<?php if(isset($_REQUEST['visitor_family_days'])){ echo $_REQUEST['visitor_family_days'];} else{ echo"90";} ?>" oninput="familyDay()">
                    <label></label>
                </div>
            </div>
            <p id="error-visitor-family-days" style="color: red;"></p>

            <div class="form-field-row">
            	<div class="coverage">
                	 <span>Coverage</span>
                    <select class="form-control visitor_family_coverage_amt" name="visitor_family_coverage_amt">
                    	<option value="100000" <?php if(isset($_REQUEST['visitor_family_coverage_amt']) && $_REQUEST['visitor_family_coverage_amt']=="100000"){ echo"selected";}  ?>>100,000 (min. requirement)</option>
                        <option value="150000" <?php if(isset($_REQUEST['visitor_family_coverage_amt']) && $_REQUEST['visitor_family_coverage_amt']=="150000"){ echo"selected";}  ?>>150,000</option>
                        <option value="200000" <?php if(isset($_REQUEST['visitor_family_coverage_amt']) && $_REQUEST['visitor_family_coverage_amt']=="200000"){ echo"selected";}  ?>>200,000</option>
                        <option value="250000" <?php if(isset($_REQUEST['visitor_family_coverage_amt']) && $_REQUEST['visitor_family_coverage_amt']=="250000"){ echo"selected";}  ?>>250,000</option>
                        <option value="300000" <?php if(isset($_REQUEST['visitor_family_coverage_amt']) && $_REQUEST['visitor_family_coverage_amt']=="300000"){ echo"selected";}  ?>>300,000</option
                        ><option value="500000" <?php if(isset($_REQUEST['visitor_family_coverage_amt']) && $_REQUEST['visitor_family_coverage_amt']=="500000"){ echo"selected";}  ?>>500,000</option>
                        <option value="1000000" <?php if(isset($_REQUEST['visitor_family_coverage_amt']) && $_REQUEST['visitor_family_coverage_amt']=="1000000"){ echo"selected";}  ?>>1,000,000</option>
              

         
                 </select>  
                </div> 
            </div>
            
               
            <p>Would you like to cover pre-existing medical conditions?</p>
            
            <div class="row">
            <div class="col-lg-12">
            <div class="m1">
            <div class="number">1</div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="visitor-family1" name="visitor_family_exit" class="custom-control-input" value="0" <?php if(isset($_REQUEST['visitor_family_exit'])){ if($_REQUEST['visitor_family_exit']=="0"){ echo"checked";} } else{ echo "checked";}?>>
              <label class="custom-control-label" for="visitor-family1">No</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="visitor-family2" name="visitor_family_exit" class="custom-control-input" value="1" <?php if(isset($_REQUEST['visitor_family_exit'])){ if($_REQUEST['visitor_family_exit']=="1"){ echo"checked";} } ?>>
              <label class="custom-control-label" for="visitor-family2">Yes</label>
            </div>
            </div>
            </div>
            </div>
            <input type="submit" value="GET QUOTE" class="quote">
              
            </form>
          </div>
        

        </div>
      </div>
    </div>
  </div>
</div>
<?php 
$coverage_check="";
if(isset($_REQUEST['coverage_check'])){
    $coverage_check=$_REQUEST['coverage_check'];
}
?>
<script>
function singleCoverageValidateAge() {
    var ageInput = $('#ageInput');
    var errorDiv = $('#errorDiv');
    var inputValue = parseInt(ageInput.val());

    if (isNaN(inputValue) || inputValue <= 0) {
        errorDiv.text('Age must be a number and greater than 0');
        ageInput.css('border-color', 'red'); // Set border color to red when there's an error
    } else {
        errorDiv.text('');
        ageInput.css('border-color', ''); // Reset border color when there's no error
    }
}
// visitor to couple
function visitorCouple1() {
    $('.visitor-couple-policy-date1').val('');
    var ageInput = $('.visitor-couple-policy-year1');
    var errorDiv = $('#error-visitor-couple1-date-of-birth');
    var inputValue = parseInt(ageInput.val());

    if (isNaN(inputValue) || inputValue <= 0) {
        errorDiv.text('Age must be a number and greater than 0');
        ageInput.css('border-color', 'red'); // Set border color to red when there's an error
    } else {
        errorDiv.text('');
        ageInput.css('border-color', ''); // Reset border color when there's no error
    }
}
function visitorCouple2() {
    $('.visitor-couple-policy-date2').val('');
    var ageInput = $('.visitor-couple-policy-year2');
    var errorDiv = $('#error-visitor-couple2-date-of-birth');
    var inputValue = parseInt(ageInput.val());

    if (isNaN(inputValue) || inputValue <= 0) {
        errorDiv.text('Age must be a number and greater than 0');
        ageInput.css('border-color', 'red'); // Set border color to red when there's an error
    } else {
        errorDiv.text('');
        ageInput.css('border-color', ''); // Reset border color when there's no error
    }
}
function familyAge1() {
    $('.visitor-family-policy-date1').val('');
    var ageInput = $('.visitor-family-policy-year1');
    var errorDiv = $('#error-visitor-family-policy-year1');
    var inputValue = parseInt(ageInput.val());

    if (isNaN(inputValue) || inputValue <= 0) {
        errorDiv.text('Age must be a number and greater than 0');
        ageInput.css('border-color', 'red'); // Set border color to red when there's an error
    } else {
        errorDiv.text('');
        ageInput.css('border-color', ''); // Reset border color when there's no error
    }
}
function familyAge2() {
    $('.visitor-family-policy-date2').val('');
    var ageInput = $('.visitor-family-policy-year2');
    var errorDiv = $('#error-visitor-family-policy-year2');
    var inputValue = parseInt(ageInput.val());

    if (isNaN(inputValue) || inputValue <= 0) {
        errorDiv.text('Age must be a number and greater than 0');
        ageInput.css('border-color', 'red'); // Set border color to red when there's an error
    } else {
        errorDiv.text('');
        ageInput.css('border-color', ''); // Reset border color when there's no error
    }
}
function singleCoverageDay() {
    var daysInput = $('.visitor-couple-single-day');
    var errorDiv = $('.daysInputErrors');
    var inputValue = parseInt(daysInput.val());

    if (isNaN(inputValue) || inputValue <= 0) {
        errorDiv.text('Days must be a number and greater than 0');
        daysInput.css('border-color', 'red'); // Set border color to red when there's an error
    } else {
        errorDiv.text('');
        daysInput.css('border-color', ''); // Reset border color when there's no error

        // Calculate end date based on start date and number of days
        var startDate = $('.visitor-single-pilicy-start-date').val();
        var endDate = new Date(startDate);
        endDate.setDate(endDate.getDate() + inputValue);
        var formattedEndDate = endDate.toISOString().split('T')[0];

        // Update the end date input value
        $('.visitor-single-pilicy-end-date').val(formattedEndDate);
    }
}
function coupleDay1() {
    var daysInput = $('.visitor-couple-days1');
    var errorDiv = $('#error-visitor-couple-days1');
    var inputValue = parseInt(daysInput.val());

    if (isNaN(inputValue) || inputValue <= 0) {
        errorDiv.text('Days must be a number and greater than 0');
        daysInput.css('border-color', 'red'); // Set border color to red when there's an error
    } else {
        errorDiv.text('');
        daysInput.css('border-color', ''); // Reset border color when there's no error

        // Calculate end date based on start date and number of days
        var startDate = $('.visitor-couple-start-date1').val();
        var endDate = new Date(startDate);
        endDate.setDate(endDate.getDate() + inputValue);
        var formattedEndDate = endDate.toISOString().split('T')[0];

        // Update the end date input value
        $('.visitor-couple-end-date1').val(formattedEndDate);
    }
}
function coupleDay2() {
    var daysInput = $('.visitor-couple-days2');
    var errorDiv = $('#error-visitor-couple-days2');
    var inputValue = parseInt(daysInput.val());

    if (isNaN(inputValue) || inputValue <= 0) {
        errorDiv.text('Days must be a number and greater than 0');
        daysInput.css('border-color', 'red'); // Set border color to red when there's an error
    } else {
        errorDiv.text('');
        daysInput.css('border-color', ''); // Reset border color when there's no error

        // Calculate end date based on start date and number of days
        var startDate = $('.visitor-couple-start-date2').val();
        var endDate = new Date(startDate);
        endDate.setDate(endDate.getDate() + inputValue);
        var formattedEndDate = endDate.toISOString().split('T')[0];

        // Update the end date input value
        $('.visitor-couple-end-date2').val(formattedEndDate);
    }
}
function familyDay() {
    var daysInput = $('.visitor-family-days');
    var errorDiv = $('#error-visitor-family-days');
    var inputValue = parseInt(daysInput.val());

    if (isNaN(inputValue) || inputValue <= 0) {
        errorDiv.text('Days must be a number and greater than 0');
        daysInput.css('border-color', 'red'); // Set border color to red when there's an error
    } else {
        errorDiv.text('');
        daysInput.css('border-color', ''); // Reset border color when there's no error

        // Calculate end date based on start date and number of days
        var startDate = $('.visitor-family-start-date').val();
        var endDate = new Date(startDate);
        endDate.setDate(endDate.getDate() + inputValue);
        var formattedEndDate = endDate.toISOString().split('T')[0];

        // Update the end date input value
        $('.visitor-family-end-date').val(formattedEndDate);
    }
}

$(document).ready(function(){
    var radio_check = '<?php echo $check_insurance; ?>';
    if(radio_check=="visitorSingle"){
        $('.visitor-form3').hide();
        $('.visitor-form2').hide();
        $('.visitor-form1').show();
    }
    if(radio_check=="visitorCouple"){
        $('.visitor-form1').hide();
        $('.visitor-form3').hide();
        $('.visitor-form2').show();
    }
    if(radio_check=="visitorFamily"){
        $('.visitor-form1').hide();
        $('.visitor-form2').hide();
        $('.visitor-form3').show();
    }


    $('.visitor').change(function() {
    var selectedValue = $("input[name='visitor_policy']:checked").val();
    if(selectedValue == 'visitor1'){
        $('.visitor-form3').hide();
        $('.visitor-form2').hide();
        $('.visitor-form1').show();
    }
    if(selectedValue == 'visitor2'){
        $('.visitor-form1').hide();
        $('.visitor-form3').hide();
        $('.visitor-form2').show();
    }
    if(selectedValue == 'visitor3'){
        $('.visitor-form1').hide();
        $('.visitor-form2').hide();
        $('.visitor-form3').show();
    }
    });
    $(".visitor-visa-form1").submit(function(event) {
    var ageInput = parseInt($('#ageInput').val());
    var daysInput = parseInt($('.visitor-couple-single-day').val());
        // alert(ageInput);

        // alert(daysInput);
        // var selectedDate = parseInt($('.ageInput').val());

    if (ageInput > 0  && daysInput > 0) {
        // Allow form submission if the selected date is less than 120
        console.log("Form submitted!");
    } else {
        // Prevent form submission if the selected date is greater than or equal to 120
        event.preventDefault();
    }
});
$(".visitor-form2").submit(function(event) {
    var ageInput1 = parseInt($('.visitor-couple-policy-year1').val());
    var ageInput2 = parseInt($('.visitor-couple-policy-year2').val());
    var daysInpu1 = parseInt($('.visitor-couple-days1').val());
    var daysInpu2 = parseInt($('.visitor-couple-days2').val());
        // alert(ageInput);

        // alert(daysInput);
        // var selectedDate = parseInt($('.ageInput').val());

    if (ageInput1 > 0  && ageInput2 > 0 && daysInpu1 > 0 && daysInpu2 > 0) {
        // Allow form submission if the selected date is less than 120
        console.log("Form submitted!");
    } else {
        // Prevent form submission if the selected date is greater than or equal to 120
        event.preventDefault();
    }
});
$(".family-form").submit(function(event) {
    var ageInput1 = parseInt($('.visitor-family-policy-year1').val());
    var ageInput2 = parseInt($('.visitor-family-policy-year1').val());
    var daysInpu1 = parseInt($('.visitor-family-days').val());
        // alert(ageInput);

        // alert(daysInput);
        // var selectedDate = parseInt($('.ageInput').val());

    if (ageInput1 > 0  && ageInput2 > 0 && daysInpu1 > 0 && daysInpu1 > 0) {
        // Allow form submission if the selected date is less than 120
        console.log("Form submitted!");
    } else {
        // Prevent form submission if the selected date is greater than or equal to 120
        event.preventDefault();
    }
});
});
$(document).on('click', '.otheramt-toggle', function() {
    $('.otheramt').slideToggle();
    var coverage_check = "<?php echo $coverage_check;?>";
    if ($(this).text() == "+ Enter different coverage amount per applicant") {
        $('.amt_type').val(1);
        $('.coverage-check').val('yes');
        $('[name="visitor_visa_couple_coverage1"]').removeClass('visitor_visa_couple_coverage1');
        $(this).text("− Make coverage amount same for all applicants");
    } else {
        $('.amt_type').val(0);
        $('.coverage-check').val('');

        $('[name="visitor_visa_couple_coverage1"]').addClass('visitor_visa_couple_coverage1');
        $(this).text("+ Enter different coverage amount per applicant");
    }
});


$(document).on('change', '.visitor_visa_couple_coverage1', function() {
    var coverage = parseInt($(this).val());
    var options = '';
    options += '<option value="10000" ' + (coverage == 10000 ? 'selected' : '') + '>10,000</option>';
    options += '<option value="15000" ' + (coverage == 15000 ? 'selected' : '') + '>15,000</option>';
    options += '<option value="25000" ' + (coverage == 25000 ? 'selected' : '') + '>25,000</option>';
    options += '<option value="50000" ' + (coverage == 50000 ? 'selected' : '') + '>50,000</option>';
    options += '<option value="100000" ' + (coverage == 100000 ? 'selected' : '') + '>100,000</option>';
    options += '<option value="150000" ' + (coverage == 150000 ? 'selected' : '') + '>150,000</option>';
    options += '<option value="200000" ' + (coverage == 200000 ? 'selected' : '') + '>200,000</option>';
    options += '<option value="250000" ' + (coverage == 250000 ? 'selected' : '') + '>250,000</option>';
    options += '<option value="300000" ' + (coverage == 300000 ? 'selected' : '') + '>300,000</option>';
    options += '<option value="500000" ' + (coverage == 500000 ? 'selected' : '') + '>500,000</option>';
    options += '<option value="1000000" ' + (coverage == 1000000 ? 'selected' : '') + '>1,000,000</option>';
    $('.otheramt').html('<div class="form-field-row"> <div class="coverage"> <span>Coverage</span> <select class="form-control" name="visitor_visa_couple_coverage2">'+options+' </select> </div> </div>');
});
</script>
<!-- Form section Ends here -->
@endsection

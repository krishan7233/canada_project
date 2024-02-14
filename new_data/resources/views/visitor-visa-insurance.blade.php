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
if(Session::get('visitor_visa_request_data')){
  $request_data1 =  Session::get('visitor_visa_request_data');
 
}
if(Session::get('visitor_visa_deductible')){
  $deductible1 = Session::get('visitor_visa_deductible');
  
}
if(Session::get('visitor_visa_couple_request_data')){
  $request_data2 =  Session::get('visitor_visa_couple_request_data');
 
}
if(Session::get('visitor_visa_couple_deductible')){
  $deductible2 = Session::get('visitor_visa_couple_deductible');
  
}
if(Session::get('visitor_visa_family_request_data')){
  $request_data3 =  Session::get('visitor_visa_family_request_data');
 
}
if(Session::get('visitor_visa_family_deductible')){
  $deductible3 = Session::get('visitor_visa_family_deductible');
  
}

if(Session::get('visa_type')){
    $visa_type = Session::get('visa_type');
  }
  
if (isset($visa_type['visa_type']) && $visa_type['visa_type'] == "visitorSingle") {
    $check_insurance = $visa_type['visa_type'];
} 
elseif(isset($visa_type['visa_type']) && $visa_type['visa_type'] == "visitorCouple"){
  $check_insurance = $visa_type['visa_type'];
}
elseif(isset($visa_type['visa_type']) && $visa_type['visa_type'] == "visitorFamily"){
  $check_insurance = $visa_type['visa_type'];
}
else {
    $check_insurance = "";
}
// echo"<pre>";
// print_r($request_data);
// print_r($deductible);
// echo"</pre>";
?>   
<div class="section-larger">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <nav class="policy-form">
          <h6>What type of policy do you want?</h6>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <div class="form-check">
        <input type="radio" class="form-check-input visitor" id="visitor-single-coverage" name="visitor_policy" value="visitor1" <?php if(isset($visa_type['visa_type']) && $visa_type['visa_type']=="visitorSingle" ){ echo"checked"; } else{ echo"checked"; }?>>
        <label class="form-check-label" for="visitor-single-coverage">SINGLE COVERAGE</label>

        <input type="radio" class="form-check-input visitor" id="visitor-couple-policy" name="visitor_policy" value="visitor2" <?php if(isset($visa_type['visa_type']) && $visa_type['visa_type']=="visitorCouple" ){ echo"checked"; }?>>
        <label class="form-check-label" for="visitor-couple-policy">COUPLE POLICY</label>

        <input type="radio" class="form-check-input visitor" id="visitor-family-coverage" name="visitor_policy" value="visitor3" <?php if(isset($visa_type['visa_type']) && $visa_type['visa_type']=="visitorFamily" ){ echo"checked"; }?>>
        <label class="form-check-label" for="visitor-family-coverage">FAMILY COVERAGE</label>

    </div>
</div>
</nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane show active fade  visitor-form1" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          <form class="form-1" action="{{url('visitor-single-coverage-get-quotation')}}" method="post">
              @csrf
            <div class="form-field-row">
            @php
                $currentDate = \Carbon\Carbon::now()->subYears(40);
            @endphp
            <input type="hidden" name="visa_type" value="visitorSingle">
            <div class="field-dob">
                <span>Date of Birth</span>
                <input type="date" id="singledob" class="form-control singledob" name="date_of_birth" placeholder="Date of Birth" data-date="" value="<?php if(isset($request_data1['date_of_birth'])){ echo $request_data1['date_of_birth'];}  ?>" data-date-format="DD MMMM YYYY" max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                <label>MM-DD-YYYY format</label>
            </div>
                <div class="field-or">or</div>
                <div class="field-tage">
                  <span>Age</span>
                  <input type="number" class="form-control ageInput" id="ageInput" name="age" value="<?php if(isset($request_data1['age'])){ echo $request_data1['age'];} else{ echo "35";} ?>">
                  <label>years</label>

              </div>
            </div>
            <div id="errorDiv" style="color: red;"></div>
            <div class="form-field-row">
            <div class="sdate">
                <?php  
                $start_date = \Carbon\Carbon::now()->format('Y-m-d');
                
                ?>
                <span>Start Date</span>
                <input type="date" class="form-control visitor-single-pilicy-start-date"  name="start_date" placeholder="Start Date" value="<?php if(isset($request_data1['start_date'])){ echo $request_data1['start_date'];} else{ echo $start_date; }  ?>" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                <label id="startFormattedDateLabel" class="startFormattedDateLabel">MM-DD-YYYY format</label>
            </div>

            <div class="edate">
                <?php
                    $futureDate = \Carbon\Carbon::now()->addDays(90)->format('Y-m-d');
                ?>
                <span>End Date</span>
                <input type="date" class="form-control visitor-single-pilicy-end-date" name="end_date" placeholder="Start Date" value="<?php if(isset($request_data1['end_date'])){ echo $request_data1['end_date'];} else{ echo $futureDate;}  ?>">
                <label id="startFormattedDateLabel" class="startFormattedDateLabel">MM-DD-YYYY format</label>
            </div>
                <div class="field-or">or</div>
                <div class="field-tdays">
                	<span>Days</span>
                	<input type="number" class="form-control visitor-couple-single-day" value="<?php if(isset($request_data1['no_of_days'])){ echo $request_data1['no_of_days'];}else{ echo"90";}  ?>" name="no_of_days">
                    <label></label>
                </div>
            </div>
            
            <div class="form-field-row">
            	<div class="coverage">
                	 <span>Coverage</span>
                    <select class="form-control" name="coverage_amt">
                        <option value="10000" <?php if(isset($deductible1['coverage_amt']) && $deductible1['coverage_amt']=="10000"){ echo"selected";}  ?>>10,000 </option>
                        <option value="15000" <?php if(isset($deductible1['coverage_amt']) && $deductible1['coverage_amt']=="15000"){ echo"selected";}  ?>>15,000</option>
                        <option value="25000" <?php if(isset($deductible1['coverage_amt']) && $deductible1['coverage_amt']=="25000"){ echo"selected";}  ?>>25,000</option>
                        <option value="50000" <?php if(isset($deductible1['coverage_amt']) && $deductible1['coverage_amt']=="50000"){ echo"selected";} else{ echo"selected";}  ?>>50,000</option>
                        <option value="100000" <?php if(isset($deductible1['coverage_amt']) && $deductible1['coverage_amt']=="100000"){ echo"selected";}  ?>>100,000</option>
                        <option value="150000" <?php if(isset($deductible1['coverage_amt']) && $deductible1['coverage_amt']=="150000"){ echo"selected";}  ?>>150,000</option>
                        <option value="200000" <?php if(isset($deductible1['coverage_amt']) && $deductible1['coverage_amt']=="200000"){ echo"selected";}  ?>>200,000</option>
                        <option value="250000" <?php if(isset($deductible1['coverage_amt']) && $deductible1['coverage_amt']=="250000"){ echo"selected";}  ?>>250,000</option>
                        <option value="300000" <?php if(isset($deductible1['coverage_amt']) && $deductible1['coverage_amt']=="300000"){ echo"selected";}  ?>>300,000</option
                        ><option value="500000" <?php if(isset($deductible1['coverage_amt']) && $deductible1['coverage_amt']=="500000"){ echo"selected";}  ?>>500,000</option>
                        <option value="1000000" <?php if(isset($deductible1['coverage_amt']) && $deductible1['coverage_amt']=="1000000"){ echo"selected";}  ?>>1,000,000</option>
                    </select>
                </div>
            </div>
               
            <p>Would you like to cover pre-existing medical conditions?</p>
            
            
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="customRadioInline1" name="pre_exit" class="custom-control-input" value="0" <?php if(isset($deductible1['pre_exit']) && $deductible1['pre_exit']=="0"){ echo "checked"; } else{echo "checked";}?>>
              <label class="custom-control-label" for="customRadioInline1">No</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="customRadioInline2" name="pre_exit" class="custom-control-input" value="1" <?php if(isset($deductible1['pre_exit']) && $deductible1['pre_exit']=="1"){ echo "checked"; }?>>
              <label class="custom-control-label" for="customRadioInline2">Yes</label>
            </div>
            
            
            <input type="submit" value="GET QUOTE" class="quote">
              
            </form>
          </div>
          <div class="tab-pane show fade visitor-form2" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
          <form class="form-1" action="{{url('visitor-couple-coverage-get-quotation')}}" method="post">
            @csrf
            <input type="hidden" name="visa_type" value="visitorCouple">

            <div class="form-field-row">
            <div class="number">1</div>
            	<div class="field-dob">
                	 <span>Date of Birth</span>

                	<input type="date" class="form-control visitor-couple-policy-date1" name="visitor_visa_couple_birth1" placeholder="Date of Birth" max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" value="<?php if(isset($request_data2['date_of_birth1'])){ echo $request_data2['date_of_birth1'];} ?>">

                    <label>MM-DD-YYYY format</label>
                </div>
                <div class="field-or">or</div>
                <div class="field-tage">
                	<span>Age</span>

                	<input type="number" class="form-control visitor-couple-policy-year1" name="visitor_visa_couple_age1" value="<?php if(isset($request_data2['age1'])){ echo $request_data2['age1'];} else{ echo"22";} ?>">
                    <label>years</label>
                    
                </div>
            </div>
            <p id="errorcouplepolicy1" style="color: red;"></p>

            <div class="form-field-row">
            <div class="number2">2</div>
            	<div class="field-dob">
                	 <span>Date of Birth</span>

                	<input type="date" class="form-control visitor-couple-policy-date2" name="visitor_visa_couple_birth2" placeholder="Date of Birth" max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"  value="<?php if(isset($request_data2['date_of_birth2'])){ echo $request_data2['date_of_birth2'];} ?>">

                    <label>MM-DD-YYYY format</label>
                </div>
                <div class="field-or">or</div>
                <div class="field-tage">
                	<span>Age</span>

                	<input type="number" class="form-control visitor-couple-policy-year2" name="visitor_visa_couple_age2" value="<?php if(isset($request_data2['age2'])){ echo $request_data2['age2'];}else{ echo"30";} ?>" oninput="couplePolicyValidateAge2()">
                    <label>years</label>

                </div>

            </div>        
            <p id="errorcouplepolicy2" style="color: red;"></p>            
            <div class="form-field-row">
            <div class="sdate">

              
            <?php 
            if(isset($request_data2['start_date1'])){ 
                $start_date1 = $request_data2['start_date1'];
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
                <input type="date" class="form-control visitor-couple-end-date1" name="visitor_visa_couple_end_date1" placeholder="End Date" value="<?php if(isset($request_data2['end_date1'])){ echo $request_data2['end_date1'];} else{ echo $futureDate;} ?>">
                <label id="">MM-DD-YYYY format</label>
            </div>

                <div class="field-or">or</div>
                <div class="field-tdays">
                	<span>Days</span>
                	<input type="number" class="form-control visitor-couple-days1" name="visitor_visa_couple_days1" value="<?php if(isset($request_data2['no_of_days1'])){ echo $request_data2['no_of_days1'];} else{ echo "90";} ?>">
                    <label></label>
                </div>
            </div>
            
            
           	<div class="seconddate">
            	<div class="form-field-row">
            	<div class="sdate">
                <?php 
                if(isset($request_data2['start_date2'])){ 
                    $start_date2 = $request_data2['start_date2'];
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
                	<input type="date"  class="form-control visitor-couple-end-date2" name="visitor_visa_couple_end_date2" placeholder="Date of Birth" value="<?php if(isset($request_data2['end_date2'])){ echo $request_data2['end_date2'];} else{ echo $futureDate;} ?>">

                    <label>MM-DD-YYYY format</label>
                </div>
                <div class="field-or">or</div>
                <div class="field-tdays">
                	<span>Days</span>

                	<input type="number" class="form-control visitor-couple-days2" name="visitor_visa_couple_days2" value="<?php if(isset($request_data2['no_of_days2'])){ echo $request_data2['no_of_days2'];} else{ echo "90";} ?>">
                    <label>Days</label>
                </div>
            </div>
            </div>
            <a class="seconddate-toggle" href="javascript: void(0)">+ Enter different dates per applicant</a>
            					 
            
            
            <div class="form-field-row">
            	<div class="coverage">
                	 <span>Coverage</span>


                     
                    <select class="form-control" name="visitor_visa_couple_coverage1">
                    <option value="10000" <?php if(isset($deductible2['coverage_amt1']) && $deductible2['coverage_amt1']=="10000"){ echo"selected";}  ?>>10,000 </option>
                        <option value="15000" <?php if(isset($deductible2['coverage_amt1']) && $deductible2['coverage_amt1']=="15000"){ echo"selected";}  ?>>15,000</option>
                        <option value="25000" <?php if(isset($deductible2['coverage_amt1']) && $deductible2['coverage_amt1']=="25000"){ echo"selected";}  ?>>25,000</option>
                        <option value="50000" <?php if(isset($deductible2['coverage_amt1']) && $deductible2['coverage_amt1']=="50000"){ echo"selected";} else{ echo"selected";}  ?>>50,000</option>
                        <option value="100000" <?php if(isset($deductible2['coverage_amt1']) && $deductible2['coverage_amt1']=="100000"){ echo"selected";}  ?>>100,000</option>
                        <option value="150000" <?php if(isset($deductible2['coverage_amt1']) && $deductible2['coverage_amt1']=="150000"){ echo"selected";}  ?>>150,000</option>
                        <option value="200000" <?php if(isset($deductible2['coverage_amt1']) && $deductible2['coverage_amt1']=="200000"){ echo"selected";}  ?>>200,000</option>
                        <option value="250000" <?php if(isset($deductible2['coverage_amt1']) && $deductible2['coverage_amt1']=="250000"){ echo"selected";}  ?>>250,000</option>
                        <option value="300000" <?php if(isset($deductible2['coverage_amt1']) && $deductible2['coverage_amt1']=="300000"){ echo"selected";}  ?>>300,000</option
                        ><option value="500000" <?php if(isset($deductible2['coverage_amt1']) && $deductible2['coverage_amt1']=="500000"){ echo"selected";}  ?>>500,000</option>
                        <option value="1000000" <?php if(isset($deductible2['coverage_amt1']) && $deductible2['coverage_amt1']=="1000000"){ echo"selected";}  ?>>1,000,000</option>
                    </select>  
                </div> 
            </div>
            
            
            <div class="otheramt">
            	<div class="form-field-row">
            	<div class="coverage">
                	 <span>Coverage</span>
                    <select class="form-control" name="visitor_visa_couple_coverage2">
                    <option value="10000" <?php if(isset($deductible2['coverage_amt2']) && $deductible2['coverage_amt2']=="10000"){ echo"selected";}  ?>>10,000 </option>
                        <option value="15000" <?php if(isset($deductible2['coverage_amt2']) && $deductible2['coverage_amt2']=="15000"){ echo"selected";}  ?>>15,000</option>
                        <option value="25000" <?php if(isset($deductible2['coverage_amt2']) && $deductible2['coverage_amt2']=="25000"){ echo"selected";}  ?>>25,000</option>
                        <option value="50000" <?php if(isset($deductible2['coverage_amt2']) && $deductible2['coverage_amt2']=="50000"){ echo"selected";} else{ echo"selected";}  ?>>50,000</option>
                        <option value="100000" <?php if(isset($deductible2['coverage_amt2']) && $deductible2['coverage_amt2']=="100000"){ echo"selected";}  ?>>100,000</option>
                        <option value="150000" <?php if(isset($deductible2['coverage_amt2']) && $deductible2['coverage_amt2']=="150000"){ echo"selected";}  ?>>150,000</option>
                        <option value="200000" <?php if(isset($deductible2['coverage_amt2']) && $deductible2['coverage_amt2']=="200000"){ echo"selected";}  ?>>200,000</option>
                        <option value="250000" <?php if(isset($deductible2['coverage_amt2']) && $deductible2['coverage_amt2']=="250000"){ echo"selected";}  ?>>250,000</option>
                        <option value="300000" <?php if(isset($deductible2['coverage_amt2']) && $deductible2['coverage_amt2']=="300000"){ echo"selected";}  ?>>300,000</option
                        ><option value="500000" <?php if(isset($deductible2['coverage_amt2']) && $deductible2['coverage_amt2']=="500000"){ echo"selected";}  ?>>500,000</option>
                        <option value="1000000" <?php if(isset($deductible2['coverage_amt2']) && $deductible2['coverage_amt2']=="1000000"){ echo"selected";}  ?>>1,000,000</option> </select>  
                </div> 
            </div>
            </div>
            <a class="otheramt-toggle" href="javascript: void(0)">+ Enter different coverage amount per applicant</a>
            
            <input type="hidden" name="amt_type" class="amt_type" value="0" >
               
            <p>Would you like to cover pre-existing medical conditions?</p>
            
            <div class="row">
            <div class="col-lg-12">
            <div class="m1">
            <div class="number">1</div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="visitor-couple-exit1" name="visitor_visa_couple_exit1" class="custom-control-input" value="0" <?php if(isset($deductible2['pre_exit1'])){ if($deductible2['pre_exit1']=="0"){ echo"checked";} } else{ echo "checked";}?>>
              <label class="custom-control-label" for="visitor-couple-exit1">No</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="visitor-couple-exit2" name="visitor_visa_couple_exit1" class="custom-control-input" value="1" <?php if(isset($deductible2['pre_exit1']) && $deductible2['pre_exit1']=="1"){ echo "checked"; }?>>
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
              <input type="radio" id="visitor-couple-exit3" name="visitor_visa_couple_exit2" class="custom-control-input" value="0" <?php if(isset($deductible2['pre_exit2'])){ if($deductible2['pre_exit2']=="0"){ echo"checked";} } else{ echo "checked";}?>>
              <label class="custom-control-label" for="visitor-couple-exit3">No</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="visitor-couple-exit4" name="visitor_visa_couple_exit2" class="custom-control-input" value="1" <?php if(isset($deductible2['pre_exit2']) && $deductible2['pre_exit2']=="1"){ echo "checked"; }?>>
              <label class="custom-control-label" for="visitor-couple-exit4">Yes</label>
            </div>
            </div>
            </div>
            </div>
            
            
            <input type="submit" value="GET QUOTE" class="quote">
              
            </form>
            	
          </div>
          <div class="tab-pane show fade visitor-form3" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
          <form class="form-1" action="{{url('visitor-family-coverage-get-quotation')}}" method="post">
                @csrf
                <input type="hidden" name="visa_type" value="visitorFamily">

            <div class="form-field-row">
            <div class="number">1</div>
            	<div class="field-dob">
                	 <span>Date of Birth</span>

                	<input type="date" class="form-control visitor-family-policy-date1" name="visitor_family_policy_date1" placeholder="Date of Birth" max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" value="<?php if(isset($request_data3['date_of_birth1'])){ echo $request_data3['date_of_birth1'];} ?>">

                    <label>MM-DD-YYYY format</label>
                </div>
                <div class="field-or">or</div>
                <div class="field-tage">
                	<span>Age</span>

                	<input type="number" class="form-control visitor-family-policy-year1" name="visitor_family_policy_year1" value="<?php if(isset($request_data3['age1'])){ echo $request_data3['age1'];} else{ echo"35";} ?>">
                    <label>years</label>
                    
                </div>
            </div>
            <p id="errorcouplepolicy1" style="color: red;"></p>

            <div class="form-field-row">
            <div class="number2">2</div>
            	<div class="field-dob">
                	 <span>Date of Birth</span>

                	<input type="date" class="form-control visitor-family-policy-date2" name="visitor_family_policy_date2" placeholder="Date of Birth" max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" value="<?php if(isset($request_data3['date_of_birth2'])){ echo $request_data3['date_of_birth2'];} ?>">

                    <label>MM-DD-YYYY format</label>
                </div>
                <div class="field-or">or</div>
                <div class="field-tage">
                	<span>Age</span>

                	<input type="number" class="form-control visitor-family-policy-year2" name="visitor_family_policy_year2" value="<?php if(isset($request_data3['age2'])){ echo $request_data3['age2'];} else{ echo"30";} ?>">
                    <label>years</label>

                </div>

            </div>        
            <p id="errorcouplepolicy2" style="color: red;"></p>
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
            if(isset($request_data3['start_date'])){
                 $start_date =  $request_data3['start_date'];
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
                <input type="date" class="form-control visitor-family-end-date" name="visitor_family_end_date" placeholder="End Date" value="<?php if(isset($request_data3['end_date'])){ echo $request_data3['end_date'];} else{ echo $futureDate;} ?>">
                <label id="">MM-DD-YYYY format</label>
            </div>

                <div class="field-or">or</div>
                <div class="field-tdays">
                	<span>Days</span>
                	<input type="number" class="form-control visitor-family-days" name="visitor_family_days" value="<?php if(isset($request_data3['no_of_days'])){ echo $request_data3['no_of_days'];} else{ echo"90";} ?>">
                    <label></label>
                </div>
            </div>
            
            <div class="form-field-row">
            	<div class="coverage">
                	 <span>Coverage</span>
                    <select class="form-control" name="visitor_family_coverage_amt">
                    	<option value="100000" <?php if(isset($deductible3['coverage_amt']) && $deductible3['coverage_amt']=="100000"){ echo"selected";}  ?>>100,000 (min. requirement)</option>
                        <option value="150000" <?php if(isset($deductible3['coverage_amt']) && $deductible3['coverage_amt']=="150000"){ echo"selected";}  ?>>150,000</option>
                        <option value="200000" <?php if(isset($deductible3['coverage_amt']) && $deductible3['coverage_amt']=="200000"){ echo"selected";}  ?>>200,000</option>
                        <option value="250000" <?php if(isset($deductible3['coverage_amt']) && $deductible3['coverage_amt']=="250000"){ echo"selected";}  ?>>250,000</option>
                        <option value="300000" <?php if(isset($deductible3['coverage_amt']) && $deductible3['coverage_amt']=="300000"){ echo"selected";}  ?>>300,000</option
                        ><option value="500000" <?php if(isset($deductible3['coverage_amt']) && $deductible3['coverage_amt']=="500000"){ echo"selected";}  ?>>500,000</option>
                        <option value="1000000" <?php if(isset($deductible3['coverage_amt']) && $deductible3['coverage_amt']=="1000000"){ echo"selected";}  ?>>1,000,000</option>
              

         
                 </select>  
                </div> 
            </div>
            
               
            <p>Would you like to cover pre-existing medical conditions?</p>
            
            <div class="row">
            <div class="col-lg-12">
            <div class="m1">
            <div class="number">1</div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="visitor-family1" name="visitor_family_exit" class="custom-control-input" value="0" <?php if(isset($deductible3['pre_exit'])){ if($deductible3['pre_exit']=="0"){ echo"checked";} } else{ echo "checked";}?>>
              <label class="custom-control-label" for="visitor-family1">No</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="visitor-family2" name="visitor_family_exit" class="custom-control-input" value="1" <?php if(isset($deductible3['pre_exit'])){ if($deductible3['pre_exit']=="1"){ echo"checked";} } ?>>
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

<script>
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
});
</script>
<!-- Form section Ends here -->
@endsection

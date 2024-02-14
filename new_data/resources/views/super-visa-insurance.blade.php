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
if(Session::get('super_visa_request_data')){
  $request_data1 =  Session::get('super_visa_request_data');
 
}
if(Session::get('super_visa_deductible')){
  $deductible1 = Session::get('super_visa_deductible');
  
}
if(Session::get('super_visa_couple_request_data')){
  $request_data2 =  Session::get('super_visa_couple_request_data');
 
}
if(Session::get('super_visa_couple_deductible')){
  $deductible2 = Session::get('super_visa_couple_deductible');
  
}
if(Session::get('visa_type')){
  $visa_type = Session::get('visa_type');
}

if (isset($visa_type['visa_type']) && $visa_type['visa_type'] == "superVisaSingle") {
    $check_insurance = $visa_type['visa_type'];
} 
elseif(isset($visa_type['visa_type']) && $visa_type['visa_type'] == "superVisaCouple"){
  $check_insurance = $visa_type['visa_type'];
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
          <div class="form-check">
        <input type="radio" class="form-check-input super-visa" id="super-visa1" name="super_visa" value="option1" <?php if(isset($visa_type['visa_type']) && $visa_type['visa_type']=="superVisaSingle" ){ echo"checked"; } else{ echo"checked"; }?>>
        <label class="form-check-label" for="super-visa1">SINGLE COVERAGE </label>

        <input type="radio" class="form-check-input super-visa ml-2" id="super-visa2" name="super_visa" value="option2" <?php if(isset($visa_type['visa_type']) && $visa_type['visa_type']=="superVisaCouple" ){ echo"checked"; }?>>
        <label class="form-check-label ml-4" for="super-visa2">COUPLE POLICY</label>

    </div>
          <!-- <div class="nav nav-tabs" id="nav-tab" role="tablist"> <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
            <label class="form-check-label" for="exampleRadios1"> SINGLE COVERAGE </label>
            </a> <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
            <label class="form-check-label" for="exampleRadios2"> COUPLE POLICY </label>
            </a> 
          </div> -->
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade super_visa_form1 show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            
<form class="form-1" action="{{url('find-quotation')}}" method="post">
              @csrf
            <div class="form-field-row">
            @php
                $currentDate = \Carbon\Carbon::now()->subYears(40);
            @endphp
            <input type="hidden" name="visa_type" value="superVisaSingle">
            <div class="field-dob">
                <span>Date of Birth</span>
                <input type="date" id="singledob" class="form-control singledob" value="<?php if(isset($request_data1['date_of_birth'])){ echo $request_data1['date_of_birth'];}  ?>" name="date_of_birth" placeholder="Date of Birth" data-date="" data-date-format="DD MMMM YYYY" max="{{$currentDate->format('Y-m-d')}}">
                <label>MM-DD-YYYY format</label>
            </div>
                <div class="field-or">or</div>
                <div class="field-tage">
                  <span>Age</span>
                  <input type="number" class="form-control ageInput" id="ageInput" name="age" placeholder="60" value="<?php if(isset($request_data1['age'])){ echo $request_data1['age'];} else{ echo"60";}  ?>" oninput="singleCoverageValidateAge()">
                  <label>years</label>

              </div>
            </div>
            <div id="errorDiv" style="color: red;"></div>
            <div class="form-field-row">
            <div class="sdate">
                <?php 
                if(isset($request_data1['start_date'])){
                  $start_date = $request_data1['start_date'];
                }else{
                  $start_date = \Carbon\Carbon::now()->format('Y-m-d') ;
                }

                ?>
                <span>Start Date</span>
                <input type="date" id="startDate" class="form-control startDate" name="start_date" placeholder="Start Date" value="{{$start_date}}" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                <label id="startFormattedDateLabel" class="startFormattedDateLabel">MM-DD-YYYY format</label>
            </div>

            <div class="edate">
                <?php
                    $futureDate = \Carbon\Carbon::now()->addDays(365)->format('Y-m-d');
                    $formattedFutureDate = \Carbon\Carbon::parse($futureDate)->format('d-m-Y');
                    if(isset($request_data1['end_date'])){
                      $end_date = $request_data1['end_date'];
                    }else{
                      $end_date = $futureDate;
                    }
                    if(isset($request_data1['no_of_days'])){
                      $no_of_days = $request_data1['no_of_days'];
                    }else{
                      $no_of_days = 365;
                    }
                ?>
                <span>End Date</span>
                <input type="date" id="endDate" class="form-control endDate" name="end_date" placeholder="End Date" value="{{ $end_date }}" readonly>
                <label id="">MM-DD-YYYY format</label>
            </div>
                <div class="field-or">or</div>
                <div class="field-tdays">
                	<span>Days</span>
                	<input type="number" class="form-control" placeholder="365" value="{{$no_of_days}}" name="no_of_days" readonly>
                    <label></label>
                </div>
            </div>
            
            <div class="form-field-row">
            	<div class="coverage">
                	 <span>Coverage</span>
                    <select class="form-control" name="coverage_amt">
                    	<option value="100000" <?php if(isset($deductible1['coverage_amt']) && $deductible1['coverage_amt']=="100000"){ echo"selected";}  ?>>100,000 (min. requirement)</option>
                        <option value="150000" <?php if(isset($deductible1['coverage_amt']) && $deductible1['coverage_amt']=="150000"){ echo"selected";}  ?>>150,000</option>
                        <option value="200000" <?php if(isset($deductible1['coverage_amt']) && $deductible1['coverage_amt']=="200000"){ echo"selected";}  ?>>200,000</option>
                        <option value="300000" <?php if(isset($deductible1['coverage_amt']) && $deductible1['coverage_amt']=="300000"){ echo"selected";}  ?>>300,000</option>
                        <option value="500000" <?php if(isset($deductible1['coverage_amt']) && $deductible1['coverage_amt']=="500000"){ echo"selected";}  ?>>500,000</option>
                        <option value="1000000" <?php if(isset($deductible1['coverage_amt']) && $deductible1['coverage_amt']=="1000000"){ echo"selected";}  ?>>1,000,000</option>
                    </select>
                </div>
            </div>
               
            <p>Would you like to cover pre-existing medical conditions?</p>
            
            
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="customRadioInline1" name="pre_exit" class="custom-control-input" value="0" <?php if(isset($deductible1['pre_exit'])){ if($deductible1['pre_exit']=="0"){ echo"checked";} } else{ echo "checked";}?>>
              <label class="custom-control-label" for="customRadioInline1">No</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="customRadioInline2" name="pre_exit" class="custom-control-input" value="1" <?php if(isset($deductible1['pre_exit']) && $deductible1['pre_exit']=="1"){ echo "checked"; }?> >
              <label class="custom-control-label" for="customRadioInline2">Yes</label>
            </div>
            
            
            <input type="submit" value="GET QUOTE" class="quote">
              
            </form>
          </div>
          <div class="tab-pane fade show super_visa_form2" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
          <form class="form-1" action="{{url('super-visa-post')}}" method="post">
              @csrf
            <div class="form-field-row">
            <div class="number">1</div>
            	<div class="field-dob">
                	 <span>Date of Birth</span>
                   <input type="hidden" name="visa_type" value="superVisaCouple">
                	<input type="date" class="form-control super-visa-couple-date1" name="super_visa_couple_birth1" value="<?php if(isset($request_data2['date_of_birth1'])){ echo $request_data2['date_of_birth1'];} ?>" placeholder="Date of Birth" max="{{$currentDate->format('Y-m-d')}}">

                    <label>MM-DD-YYYY format</label>
                </div>
                <div class="field-or">or</div>
                <div class="field-tage">
                	<span>Age</span>

                	<input type="number" class="form-control super-visa-couple-age1" name="super_visa_couple_age1" value="<?php if(isset($request_data2['age1'])){ echo $request_data2['age1'];} else{ echo "60";} ?>" >
                    <label>years</label>
                    
                </div>
            </div>
            <p id="errorcouplepolicy1" style="color: red;"></p>

            <div class="form-field-row">
            <div class="number2">2</div>
            	<div class="field-dob">
                	 <span>Date of Birth</span>

                	<input type="date" class="form-control super-visa-couple-date2" name="super_visa_couple_birth2" placeholder="Date of Birth" max="{{$currentDate->format('Y-m-d')}}" value="<?php if(isset($request_data2['date_of_birth2'])){ echo $request_data2['date_of_birth2'];} ?>">

                    <label>MM-DD-YYYY format</label>
                </div>
                <div class="field-or">or</div>
                <div class="field-tage">
                	<span>Age</span>

                	<input type="number" class="form-control super-visa-couple-age2" name="super_visa_couple_age2" value="<?php if(isset($request_data2['age2'])){ echo $request_data2['age2'];}else{ echo"55";} ?>">
                    <label>years</label>

                </div>

            </div>        
            <p id="errorcouplepolicy2" style="color: red;"></p>            
            <div class="form-field-row">
            <div class="sdate">
              <?php 
              $startdate1 = \Carbon\Carbon::now()->format('Y-m-d');
              
              ?>
                <span>Start Date</span>
                <input type="date" id="startDate" class="form-control CoupleStartDate1" name="super_visa_couple_start_date1" placeholder="Start Date" value="<?php if(isset($request_data2['start_date1'])){ echo $request_data2['start_date1'];} else{ echo $startdate1;} ?>" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                <label id="startFormattedDateLabel" >MM-DD-YYYY format</label>
            </div>

            <div class="edate">
                <?php
                    $futureDate = \Carbon\Carbon::now()->addDays(365)->format('Y-m-d');
                    $formattedFutureDate = \Carbon\Carbon::parse($futureDate)->format('d-m-Y');
                ?>
                <span>End Date</span>
                <input type="date" id="endDate" class="form-control coupleEndDate1" name="super_visa_couple_end_date1" placeholder="End Date" value="<?php if(isset($request_data2['end_date1'])){ echo $request_data2['end_date1'];} else{ echo $futureDate;} ?>" readonly>
                <label id="">MM-DD-YYYY format</label>
            </div>

                <div class="field-or">or</div>
                <div class="field-tdays">
                	<span>Days</span>
                	<input type="number" class="form-control" value="<?php if(isset($request_data2['no_of_days1'])){ echo $request_data2['no_of_days1'];} else{ echo "365";} ?>" name="super_visa_couple_days1" readonly>
                    <label></label>
                </div>
            </div>
            
            
           	<div class="seconddate">
            	<div class="form-field-row">
            	<div class="sdate">
                <?php 
                $startdate2 = \Carbon\Carbon::now()->format('Y-m-d');
                ?>
                	 <span>Start Date</span>

                	<input type="date" class="form-control CoupleStartDate2" name="super_visa_couple_start_date2" placeholder="Date of Birth" value="<?php if(isset($request_data2['start_date2'])){ echo $request_data2['start_date2'];} else{ echo $startdate2;} ?>" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                    <label>MM-DD-YYYY format</label>
                </div>
                <div class="edate">
                <?php
                    $futureDate = \Carbon\Carbon::now()->addDays(365)->format('Y-m-d');
                    $formattedFutureDate = \Carbon\Carbon::parse($futureDate)->format('d-m-Y');
                ?>
                	 <span>End Datessss</span>
                	<input type="date"  class="form-control coupleEndDate2" name="super_visa_couple_end_date2" placeholder="Date of Birth" value="<?php if(isset($request_data2['end_date2'])){ echo $request_data2['end_date2'];} else{ echo $futureDate;} ?>" readonly>

                    <label>MM-DD-YYYY format</label>
                </div>
                <div class="field-or">or</div>
                <div class="field-tdays">
                	<span>Days</span>

                	<input type="number" class="form-control" value="<?php if(isset($request_data2['no_of_days2'])){ echo $request_data2['no_of_days2'];} else{ echo "365";} ?>" name="super_visa_couple_days2" readonly>
                    <label>Days</label>
                </div>
            </div>
            </div>
            <a class="seconddate-toggle" href="javascript: void(0)">+ Enter different dates per applicant</a>
            					 
            
            
            <div class="form-field-row">
            	<div class="coverage">
                	 <span>Coverage</span>
                    <select class="form-control" name="super_visa_couple_coverage1">
                    	<option value="100000" <?php if(isset($deductible2['coverage_amt1']) && $deductible2['coverage_amt1']=="100000"){ echo"selected";}  ?>>100,000 (min. requirement)</option>
                        <option value="150000" <?php if(isset($deductible2['coverage_amt1']) && $deductible2['coverage_amt1']=="150000"){ echo"selected";}  ?>>150,000</option>
                        <option value="200000" <?php if(isset($deductible2['coverage_amt1']) && $deductible2['coverage_amt1']=="200000"){ echo"selected";}  ?>>200,000</option>
                        <option value="300000" <?php if(isset($deductible2['coverage_amt1']) && $deductible2['coverage_amt1']=="300000"){ echo"selected";}  ?>>300,000</option>
                        <option value="500000" <?php if(isset($deductible2['coverage_amt1']) && $deductible2['coverage_amt1']=="500000"){ echo"selected";}  ?>>500,000</option>
                        <option value="1000000" <?php if(isset($deductible2['coverage_amt1']) && $deductible2['coverage_amt1']=="1000000"){ echo"selected";}  ?>>1,000,000</option>
                    </select>  
                </div> 
            </div>
            
            
            <div class="otheramt">
            	<div class="form-field-row">
            	<div class="coverage">
                	 <span>Coverage</span>
                    <select class="form-control" name="super_visa_couple_coverage2">
                    	<option value="100000" <?php if(isset($deductible2['coverage_amt2']) && $deductible2['coverage_amt2']=="100000"){ echo"selected";}  ?>>100,000 (min. requirement)</option>
                        <option value="150000" <?php if(isset($deductible2['coverage_amt2']) && $deductible2['coverage_amt2']=="150000"){ echo"selected";}  ?>>150,000</option>
                        <option value="200000" <?php if(isset($deductible2['coverage_amt2']) && $deductible2['coverage_amt2']=="200000"){ echo"selected";}  ?>>200,000</option>
                        <option value="300000" <?php if(isset($deductible2['coverage_amt2']) && $deductible2['coverage_amt2']=="300000"){ echo"selected";}  ?>>300,000</option>
                        <option value="500000" <?php if(isset($deductible2['coverage_amt2']) && $deductible2['coverage_amt2']=="500000"){ echo"selected";}  ?>>500,000</option>
                        <option value="1000000" <?php if(isset($deductible2['coverage_amt2']) && $deductible2['coverage_amt2']=="1000000"){ echo"selected";}  ?>>1,000,000</option>
                    </select>  
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
              <input type="radio" id="super_visa_couple_exit1" name="super_visa_couple_exit1" value="0" class="custom-control-input" <?php if(isset($deductible2['pre_exit1'])){ if($deductible2['pre_exit1']=="0"){ echo"checked";} } else{ echo "checked";}?>>
              <label class="custom-control-label" for="super_visa_couple_exit1">No</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="super_visa_couple_exit2" name="super_visa_couple_exit1" value="1" class="custom-control-input" <?php if(isset($deductible2['pre_exit1']) && $deductible2['pre_exit1']=="1"){ echo "checked"; }?>>
              <label class="custom-control-label" for="super_visa_couple_exit2">Yes</label>
            </div>
            </div>
            </div>
            </div>
            
            
            
           <div class="row">
            <div class="col-lg-12">
             <div class="m1">
            <div class="number2">2</div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="super_visa_couple_exit3" name="super_visa_couple_exit2" value="0" class="custom-control-input" <?php if(isset($deductible2['pre_exit2'])){ if($deductible2['pre_exit2']=="0"){ echo"checked";} } else{ echo "checked";}?>>
              <label class="custom-control-label" for="super_visa_couple_exit3">No</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="super_visa_couple_exit4" name="super_visa_couple_exit2" value="1" class="custom-control-input" <?php if(isset($deductible2['pre_exit2']) && $deductible2['pre_exit2']=="1"){ echo "checked"; }?>>
              <label class="custom-control-label" for="super_visa_couple_exit4">Yes</label>
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
    if(radio_check=="superVisaSingle"){
      $('.super_visa_form2').hide();
      $('.super_visa_form1').show();
    }
    if(radio_check=="superVisaCouple"){
      $('.super_visa_form1').hide();
      $('.super_visa_form2').show();
    }

    $('.super-visa').change(function() {
          var selectedValue = $("input[name='super_visa']:checked").val();
          if(selectedValue == 'option1'){
              $('.super_visa_form2').hide();
              $('.super_visa_form1').show();
          }
          if(selectedValue == 'option2'){
              $('.super_visa_form1').hide();
              $('.super_visa_form2').show();
          }
        });
  });
</script>
<!-- Form section Ends here -->
@endsection


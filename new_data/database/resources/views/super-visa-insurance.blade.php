@extends('layout.commonlayout')
@section('content')
<!-- Form section start here -->
<div class="section-larger">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <nav class="policy-form">
          <h6>What type of policy do you want?</h6>
          <div class="nav nav-tabs" id="nav-tab" role="tablist"> <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
            <label class="form-check-label" for="exampleRadios1"> SINGLE COVERAGE </label>
            </a> <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
            <label class="form-check-label" for="exampleRadios2"> COUPLE POLICY </label>
            </a> </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <form class="form-1">
            <div class="form-field-row">
            	<div class="field-dob">
                	 <span>Date of Birth</span>
                	<input type="date" id="singledob" class="form-control" placeholder="Date of Birth" data-date="" data-date-format="DD MMMM YYYY">
                    <label>MM-DD-YYYY format</label>
                </div>
                <div class="field-or">or</div>
                <div class="field-tage">
                	<span>Age</span>
                	<input type="number" class="form-control" placeholder="60">
                    <label>years</label>
                </div>
            </div>
            
            <div class="form-field-row">
            	<div class="sdate">
                	 <span>Start Date</span>
                	<input type="date" class="form-control" placeholder="Date of Birth" value="2023-09-18">
                    <label>MM-DD-YYYY format</label>
                </div>
                <div class="edate">
                	 <span>End Date</span>
                	<input type="date" class="form-control" placeholder="Date of Birth" value="2023-09-18" disabled>
                    <label>MM-DD-YYYY format</label>
                </div>
                <div class="field-or">or</div>
                <div class="field-tdays">
                	<span>Days</span>
                	<input type="number" class="form-control" placeholder="365" disabled>
                    <label></label>
                </div>
            </div>
            
            <div class="form-field-row">
            	<div class="coverage">
                	 <span>Coverage</span>
                    <select class="form-control">
                    	<option value="100000">100,000 (min. requirement)</option>
                        <option value="150000">150,000</option>
                        <option value="200000">200,000</option>
                        <option value="300000">300,000</option>
                        <option value="500000">500,000</option>
                        <option value="1000000">1,000,000</option>
                    </select>
                </div>
            </div>
               
            <p>Would you like to cover pre-existing medical conditions?</p>
            
            
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input" checked>
              <label class="custom-control-label" for="customRadioInline1">No</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
              <label class="custom-control-label" for="customRadioInline2">Yes</label>
            </div>
            
            
            <input type="submit" value="GET QUOTE" class="quote">
              
            </form>
          </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
          	<form class="form-1">
            <div class="form-field-row">
            <div class="number">1</div>
            	<div class="field-dob">
                	 <span>Date of Birth</span>
                	<input type="date" class="form-control" placeholder="Date of Birth">
                    <label>MM-DD-YYYY format</label>
                </div>
                <div class="field-or">or</div>
                <div class="field-tage">
                	<span>Age</span>
                	<input type="number" class="form-control" placeholder="60">
                    <label>years</label>
                </div>
            </div>
            
            <div class="form-field-row">
            <div class="number2">2</div>
            	<div class="field-dob">
                	 <span>Date of Birth</span>
                	<input type="date" class="form-control" placeholder="Date of Birth">
                    <label>MM-DD-YYYY format</label>
                </div>
                <div class="field-or">or</div>
                <div class="field-tage">
                	<span>Age</span>
                	<input type="number" class="form-control" placeholder="55">
                    <label>years</label>
                </div>
            </div>        
            
            <div class="form-field-row">
            	<div class="sdate">
                	 <span>Start Date</span>
                	<input type="date" class="form-control" placeholder="Date of Birth" value="2023-09-18">
                    <label>MM-DD-YYYY format</label>
                </div>
                <div class="edate">
                	 <span>End Date</span>
                	<input type="date" class="form-control" placeholder="Date of Birth" value="2023-09-18" disabled>
                    <label>MM-DD-YYYY format</label>
                </div>
                <div class="field-or">or</div>
                <div class="field-tdays">
                	<span>Days</span>
                	<input type="number" class="form-control" placeholder="365" disabled>
                    <label></label>
                </div>
            </div>
            
            
           	<div class="seconddate">
            	<div class="form-field-row">
            	<div class="sdate">
                	 <span>Start Date</span>
                	<input type="date" class="form-control" placeholder="Date of Birth" value="2023-09-18">
                    <label>MM-DD-YYYY format</label>
                </div>
                <div class="edate">
                	 <span>End Date</span>
                	<input type="date" class="form-control" placeholder="Date of Birth" value="2023-09-18" disabled>
                    <label>MM-DD-YYYY format</label>
                </div>
                <div class="field-or">or</div>
                <div class="field-tdays">
                	<span>Days</span>
                	<input type="number" class="form-control" placeholder="Days" disabled>
                    <label>Days</label>
                </div>
            </div>
            </div>
            <a class="seconddate-toggle" href="javascript: void(0)">+ Enter different dates per applicant</a>
            					 
            
            
            <div class="form-field-row">
            	<div class="coverage">
                	 <span>Coverage</span>
                    <select class="form-control">
                    	<option value="100000">100,000 (min. requirement)</option>
                        <option value="150000">150,000</option>
                        <option value="200000">200,000</option>
                        <option value="300000">300,000</option>
                        <option value="500000">500,000</option>
                        <option value="1000000">1,000,000</option>
                    </select>  
                </div> 
            </div>
            
            
            <div class="otheramt">
            	<div class="form-field-row">
            	<div class="coverage">
                	 <span>Coverage</span>
                    <select class="form-control">
                    	<option value="100000">100,000 (min. requirement)</option>
                        <option value="150000">150,000</option>
                        <option value="200000">200,000</option>
                        <option value="300000">300,000</option>
                        <option value="500000">500,000</option>
                        <option value="1000000">1,000,000</option>
                    </select>  
                </div> 
            </div>
            </div>
            <a class="otheramt-toggle" href="javascript: void(0)">+ Enter different coverage amount per applicant</a>
            
            
               
            <p>Would you like to cover pre-existing medical conditions?</p>
            
            <div class="row">
            <div class="col-lg-12">
            <div class="m1">
            <div class="number">1</div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
              <label class="custom-control-label" for="customRadioInline1">No</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input" checked>
              <label class="custom-control-label" for="customRadioInline2">Yes</label>
            </div>
            </div>
            </div>
            </div>
            
            
            
           <div class="row">
            <div class="col-lg-12">
             <div class="m1">
            <div class="number2">2</div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="customRadioInline1" name="customRadioInline2" class="custom-control-input" checked>
              <label class="custom-control-label" for="customRadioInline1">No</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="customRadioInline2" name="customRadioInline2" class="custom-control-input">
              <label class="custom-control-label" for="customRadioInline2">Yes</label>
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
<!-- Form section Ends here -->
@endsection

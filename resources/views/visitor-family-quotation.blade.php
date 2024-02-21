@extends('layout.commonlayout')
@section('content')

<!-- Form section start here -->
<div class="section-larger">
@php
$requestData = Session::get('visitor_visa_family_request_data');
$deductible = Session::get('visitor_visa_family_deductible');
@endphp
<?php

if($_REQUEST['visitor_family_exit']==1){
  $exits_data = "covering pre-existing medical conditions";
}else{
  $exits_data = "excluding coverage for pre-existing medical conditions";

}

?>
<div class="container">
@include('layout.email_and_whatsapp')
</div>

  <div class="container mt-60">
    <div class="row">
      <div class="col-lg-4">
        <div class="quote-left">
          <p>Visitors to Canada Insurance for Family(age {{$_REQUEST['visitor_family_policy_year1']}} years and {{$_REQUEST['visitor_family_policy_year2']}} years) for 90 days, {{$exits_data}} <a href="{{url('visitor-visa-insurance?visa_type='.$_REQUEST['visa_type'].'&visitor_type='.$_REQUEST['visitor_type'].'&visitor_family_deductible='.$_REQUEST['visitor_family_deductible'].'&visitor_family_policy_date1='.$_REQUEST['visitor_family_policy_date1'].'&visitor_family_policy_year1='.$_REQUEST['visitor_family_policy_year1'].'&visitor_family_policy_date2='.$_REQUEST['visitor_family_policy_date2'].'&visitor_family_policy_year2='.$_REQUEST['visitor_family_policy_year2'].'&visitor_family_start_date='.$_REQUEST['visitor_family_start_date'].'&visitor_family_end_date='.$_REQUEST['visitor_family_end_date'].'&visitor_family_days='.$_REQUEST['visitor_family_days'].'&visitor_family_coverage_amt='.$_REQUEST['visitor_family_coverage_amt'].'&visitor_family_exit='.$_REQUEST['visitor_family_exit'].'')}}"><span><i class="fa fa-pencil"></i></span></a></p>
          <div class="form-field-row">
            <div class="coverage"> <span class="pnkBg">Deductible</span>
              <select class="form-control visitor_family_deductible" name="visitor_family_deductible">
                <option value="0" {{ $_REQUEST['visitor_family_deductible'] == 0 ? 'selected' : '' }}>0</option>
                <option value="100" {{ $_REQUEST['visitor_family_deductible'] == 100 ? 'selected' : '' }}>100</option>
                <option value="250" {{ $_REQUEST['visitor_family_deductible'] == 250 ? 'selected' : '' }}>250</option>
                <option value="500" {{ $_REQUEST['visitor_family_deductible'] == 500 ? 'selected' : '' }}>500</option>
                <option value="1000" {{ $_REQUEST['visitor_family_deductible'] == 1000 ? 'selected' : '' }}>1000</option>
                <option value="2500" {{ $_REQUEST['visitor_family_deductible'] == 2500 ? 'selected' : '' }}>2500</option>
                <option value="3000" {{ $_REQUEST['visitor_family_deductible'] == 3000 ? 'selected' : '' }}>3000</option>
                <option value="5000" {{ $_REQUEST['visitor_family_deductible'] == 5000 ? 'selected' : '' }}>5000</option>
                <option value="10000" {{ $_REQUEST['visitor_family_deductible'] == 10000 ? 'selected' : '' }}>10000</option>
              </select>
            </div>
          </div>
          <div class="form-field-row">
            <div class="coverage"> <span class="LightYellowBg">Coverage</span>
              <select class="form-control  visitor_family_coverage_amt" name="visitor_family_coverage_amt">
              <option value="10000" {{ $_REQUEST['visitor_family_coverage_amt'] == 10000 ? 'selected' : '' }}>10,000</option>  
              <option value="15000" {{ $_REQUEST['visitor_family_coverage_amt'] == 15000 ? 'selected' : '' }}>15,000</option>
                <option value="20000" {{ $_REQUEST['visitor_family_coverage_amt'] == 20000 ? 'selected' : '' }}>20,000</option>
                <option value="25000" {{ $_REQUEST['visitor_family_coverage_amt'] == 25000 ? 'selected' : '' }}>25,000</option>
                <option value="30000" {{ $_REQUEST['visitor_family_coverage_amt'] == 30000 ? 'selected' : '' }}>30,000</option>
                <option value="50000" {{ $_REQUEST['visitor_family_coverage_amt'] == 50000 ? "selected" : (empty($_REQUEST['visitor_family_coverage_amt']) ? "selected" :"") }}>50,000</option>
                <option value="100000" {{ $_REQUEST['visitor_family_coverage_amt'] == 100000 ? 'selected' : '' }}>100,000</option>
                <option value="150000" {{ $_REQUEST['visitor_family_coverage_amt'] == 150000 ? 'selected' : '' }}>150,000</option>
                <option value="200000" {{ $_REQUEST['visitor_family_coverage_amt'] == 200000 ? 'selected' : '' }}>200,000</option>
                <option value="250000" {{ $_REQUEST['visitor_family_coverage_amt'] == 250000 ? 'selected' : '' }}>250,000</option>
                <option value="300000" {{ $_REQUEST['visitor_family_coverage_amt'] == 300000 ? 'selected' : '' }}>300,000</option>
                <option value="500000" {{ $_REQUEST['visitor_family_coverage_amt'] == 500000 ? 'selected' : '' }}>500,000</option>
                <option value="1000000" {{ $_REQUEST['visitor_family_coverage_amt'] == 1000000 ? 'selected' : '' }}>1,000,000</option>
         
            </select>
            </div>
          </div>
          <h6>Would you like to cover pre-existing medical conditions?</h6>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="visitor-family-not-exit" name="visitor_family_exit" class="custom-control-input" value="0" {{ $_REQUEST['visitor_family_exit'] == 0 ? 'checked' : '' }} >
            <label class="custom-control-label" for="visitor-family-not-exit">No</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="visitor-family-exit" name="visitor_family_exit" class="custom-control-input" value="1" {{ $_REQUEST['visitor_family_exit'] == 1 ? 'checked' : '' }} >
            <label class="custom-control-label" for="visitor-family-exit">Yes</label>
          </div>
        </div>
      </div>
      <div class="col-lg-8 quotation_data">
      @foreach($ratePackage as $ratePackage)
      <?php 
      $annually_amount = valueNumberFormate($ratePackage['final_result']);
      ?>
        <div class="quote-right">
          <div class="quote-box">
            <div class="logo-section"> <img src="{{companyPhoto($ratePackage['c_id'])}}" /> </div>
            <div class="price-section">
            <div> <span class="dollar_sign">$</span>
              <span class="annuallly_amount">{{$annually_amount[0]}}</span>.<span class="last_digit">{{$annually_amount[1]}}</span>
            </div>
              <h3><span>Deductible <strong>{{number_format($ratePackage['detectible'])}}  </strong> {{policyType($ratePackage['c_id'])}} 
              
              </span></h3>
            </div>
            <div class="btn-section"> 
            <button class="btn btn-primary visitor_family_compareData compareData" id="visitor_family_compare_btn_{{$ratePackage['id']}}" style="display:none;">Compare</button>
            <a href="{{url('visitor-single-plan?visitor_type='.request('visitor_type').'&visa_type='.request('visa_type').'&deductible='.request('deductible').'&date_of_birth='.request('date_of_birth').'&age='.request('age').'&start_date='.request('start_date').'&end_date='.request('end_date').'&no_of_days='.request('no_of_days').'&coverage_amt='.request('coverage_amt').'&pre_exit='.request('pre_exit').'&buyer_id='.$ratePackage['id'].'')}}" target="_blank" class="buy-now">Buy Now</a> 
            <a href="javascript:void(0)" class="plan-details toggle togglePlanDetails" id="toggle" onclick="togglePlanDetails{{$ratePackage['id']}}({{$ratePackage['id']}})">Plan Details</a>
            
          <div class="compaire">
                <div class="left">
                  <input type="checkbox" class="form-check-input visitor_family_compare compare" id="visitor_family_compare" value="{{$ratePackage['id']}}">
                  <label class="form-check-label" for="visitor_single_compare">Compare</label>
                </div>
                <div class="right"> <a href="{{url('visitor-single-plan?visitor_type='.request('visitor_type').'&visa_type='.request('visa_type').'&deductible='.request('deductible').'&date_of_birth='.request('date_of_birth').'&age='.request('age').'&start_date='.request('start_date').'&end_date='.request('end_date').'&no_of_days='.request('no_of_days').'&coverage_amt='.request('coverage_amt').'&pre_exit='.request('pre_exit').'&buyer_id='.$ratePackage['id'].'')}}">Benefit Summary</a> </div>
              </div>
            </div>
          </div>
              <!-- detail data -->
        </div>

      @endforeach
      </div>
      <div class="col-lg-8 quotation_filter_data"></div>
    </div>
  </div>
</div>
<!-- Form section Ends here -->

<script>
  $(document).ready(function() {
    var values = [];

    $(".visitor_family_compare").change(function() {
      // alert("gg");
        var checkedCheckboxes = $(".visitor_family_compare:checked");
        var count = checkedCheckboxes.length;

        values = [];

        if (count >= 2) {
            checkedCheckboxes.each(function() {
                var value = $(this).val();
                if (!values.includes(value)) {
                    values.push(value);
                }
                $('#visitor_family_compare_btn_' + value).show();
            });

            // Hide any comparison buttons that are not associated with checked checkboxes
            $('[id^="visitor_family_compare_btn_"]').each(function() {
                if (!values.includes($(this).attr("id").replace("visitor_family_compare_btn_", ""))) {
                    $(this).hide();
                }
            });
        }
        else {
            // If there are fewer than two checkboxes checked, hide all comparison buttons.
            $('[id^="visitor_family_compare_btn_"]').hide();
        }
    });

    $('.visitor_family_compareData').click(function() {
      var commaSeparatedValues = values.join(', ');
      <?php 
          $data = request()->all();
      ?>
      var data = <?php echo json_encode($data); ?>;
      window.location.href ="https://greenberrysignature.co.in/policymarket/public/visitor-family-compare?visitor_type="+data.visitor_type+"&visa_type="+data.visa_type+"&visitor_family_deductible="+data.visitor_family_deductible+"&visitor_family_policy_date1="+data.visitor_family_policy_date1+"&visitor_family_policy_year1="+data.visitor_family_policy_year1+"&visitor_family_policy_date2="+data.visitor_family_policy_date2+"&visitor_family_policy_year2="+data.visitor_family_policy_year2+"&visitor_family_start_date="+data.visitor_family_start_date+"&visitor_family_end_date="+data.visitor_family_end_date+"&visitor_family_days="+data.visitor_family_days+"&visitor_family_coverage_amt="+data.visitor_family_coverage_amt+"&visitor_family_exit="+data.visitor_family_exit+"&package="+commaSeparatedValues+"";    
    });
});

</script>

@endsection
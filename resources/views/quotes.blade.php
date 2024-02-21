@extends('layout.commonlayout')
@section('content')

<!-- Form section start here -->
<div class="section-larger">
<div class="container">
@include('layout.email_and_whatsapp')
</div>

  <div class="container mt-60">
    <div class="row">
      
      <div class="col-lg-4">
        <div class="quote-left">
          <p>Super Visa Insurance for Single Person(age @if(isset($requestData['age'])) {{$requestData['age']}} @endif years) for @if(isset($requestData['age'])) {{$requestData['no_of_days']}} @endif days, excluding coverage for @if($requestData['pre_exit']==0) existing @endif @if($requestData['pre_exit']==1) pre-existing @endif medical conditions 
          <a href="{{ url('super-visa?visitor_type=' . $requestData['visitor_type'] . '&visa_type=' . $requestData['visa_type'] . '&deductible=' . $requestData['deductible'] . '&date_of_birth=' . $requestData['date_of_birth'] . '&age=' . $requestData['age'] . '&start_date=' . $requestData['start_date'] . '&end_date=' . $requestData['end_date'] . '&no_of_days=' . $requestData['no_of_days'] . '&coverage_amt=' . $requestData['coverage_amt'] . '&pre_exit=' . $requestData['pre_exit']) }}">
          <span><i class="fa fa-pencil"></i></span></a></p>
          <div class="form-field-row">
          <input type="hidden" name="visitor_type" class="visitor_type" value="{{$requestData['visitor_type']}}">
              <input type="hidden" name="visa_type" class="visa_type" value="{{$requestData['visa_type']}}">
              <input type="hidden" name="date_of_birth" class="date_of_birth" value="{{$requestData['date_of_birth']}}">
              <input type="hidden" name="age" class="age" value="{{$requestData['age']}}">
              <input type="hidden" name="start_date" class="start_date" value="{{$requestData['start_date']}}">
              <input type="hidden" name="end_date" class="end_date" value="{{$requestData['end_date']}}">
              <input type="hidden" name="no_of_days" class="no_of_days" value="{{$requestData['no_of_days']}}">
            <div class="coverage"> <span class="pnkBg">Deductible</span>
              <select class="form-control deductible_amt">
                <option value="0" {{ $requestData['deductible'] == 0 ? 'selected' : '' }}>0</option>
                <option value="75" {{ $requestData['deductible'] == 75 ? 'selected' : '' }}>75</option>
                <option value="100" {{ $requestData['deductible'] == 100 ? 'selected' : '' }}>100</option>
                <option value="250" {{ $requestData['deductible'] == 250 ? 'selected' : '' }}>250</option>
                <option value="500" {{ $requestData['deductible'] == 500 ? 'selected' : '' }}>500</option>
                <option value="1000" {{ $requestData['deductible'] == 1000 ? 'selected' : '' }}>1000</option>
                <option value="2500" {{ $requestData['deductible'] == 2500 ? 'selected' : '' }}>2500</option>
                <option value="3000" {{ $requestData['deductible'] == 3000 ? 'selected' : '' }}>3000</option>
                <option value="5000" {{ $requestData['deductible'] == 5000 ? 'selected' : '' }}>5000</option>
                <option value="10000" {{ $requestData['deductible'] == 10000 ? 'selected' : '' }}>10000</option>
              </select>
            </div>
          </div>
          <div class="form-field-row">
            <div class="coverage"> <span class="LightYellowBg">Coverage</span>
              <select class="form-control  coverage_amt">
                <option value="100000" {{ $requestData['coverage_amt'] == 100000 ? 'selected' : '' }}>100,000</option>
                <option value="150000" {{ $requestData['coverage_amt'] == 150000 ? 'selected' : '' }}>150,000</option>
                <option value="200000" {{ $requestData['coverage_amt'] == 200000 ? 'selected' : '' }}>200,000</option>
                <option value="250000" {{ $requestData['coverage_amt'] == 250000 ? 'selected' : '' }}>250,000</option>
                <option value="300000" {{ $requestData['coverage_amt'] == 300000 ? 'selected' : '' }}>300,000</option>
                <option value="500000" {{ $requestData['coverage_amt'] == 500000 ? 'selected' : '' }}>500,000</option>
                <option value="1000000" {{ $requestData['coverage_amt'] == 1000000 ? 'selected' : '' }}>1,000,000</option>
              </select>
            </div>
          </div>
          <h6>Would you like to cover pre-existing medical conditions?</h6>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline1" name="customRadioOptions" class="custom-control-input" value="0" {{ $requestData['pre_exit'] == 0 ? 'checked' : '' }}>
            <label class="custom-control-label" for="customRadioInline1">No</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline2" name="customRadioOptions" class="custom-control-input" value="1" {{ $requestData['pre_exit'] == 1 ? 'checked' : '' }}>
            <label class="custom-control-label" for="customRadioInline2">Yes</label>
          </div>
        </div>
      </div>
      <?php 
      // echo"<pre>";
      // print_r($ratePackage);
      // exit;
      ?>
      <div class="col-lg-8 quotation_data">
      @foreach($ratePackage as $ratePackage)
      <?php
      $compare_data = companyDetail($ratePackage['c_id']);
      
      ?>
        <div class="quote-right">
          <div class="quote-box">
            <div class="logo-section"> <img src="{{companyPhoto($ratePackage['c_id'])}}" /> </div>
            <div class="price-section">
            <?php 
            $annually_amount = valueNumberFormate($ratePackage['final_result']);
             if(perMonthCheck($ratePackage['c_id'])==1){
                if($ratePackage['c_id']==10){
                  $perMonth = valueNumberFormate(($ratePackage['final_result']/12)+10);
                }
                else{
                  $perMonth = valueNumberFormate(($ratePackage['final_result']/12));
                }
                ?>
              <div> <span class="dollar_sign">$</span>
                <span class="annuallly_amount">{{$perMonth[0]}}</span>.<span class="last_digit">{{$perMonth[1]}}</span>/month
                <p>or Annually ${{$annually_amount[0]}}.{{$annually_amount[1]}}</p>
              </div>
              <?php
              }else{?>
              <div> <span class="dollar_sign">$</span>
              <span class="annuallly_amount">{{$annually_amount[0]}}</span>.<span class="last_digit">{{$annually_amount[1]}}</span>
              </div>
              <?php }?>
              <h3><span>Deductible <strong>{{number_format($ratePackage['detectible'])}}  </strong> {{policyType($ratePackage['c_id'])}} 
              
              </span></h3>
            </div>
            <div class="btn-section"> 
            <button class="btn btn-primary compareData" id="compare_btn_{{$ratePackage['id']}}" style="display:none;">Compare</button>
            <a target="_blank" href="{{url('single-plan?visitor_type='.request('visitor_type').'&visa_type='.request('visa_type').'&deductible='.request('deductible').'&date_of_birth='.request('date_of_birth').'&age='.request('age').'&start_date='.request('start_date').'&end_date='.request('end_date').'&no_of_days='.request('no_of_days').'&coverage_amt='.request('coverage_amt').'&pre_exit='.request('pre_exit').'&buyer_id='.$ratePackage['id'].'')}}" class="buy-now">Buy Now </a> 
            
            <a href="javascript:void(0)" class="plan-details toggle togglePlanDetails" id="toggle" onclick="togglePlanDetails_{{$ratePackage['id']}}({{$ratePackage['id']}})">Plan Details</a>
            
            
            <!-- <a href="#" class="plan-details toggle compareData" id="compare_btn_{{$ratePackage['id']}}" style="display:none;">COMPARE</a> -->
            
              <div class="compaire">
                <div class="left">
                  <input type="checkbox" class="form-check-input compare" id="exampleCheck1" value="{{$ratePackage['id']}}">
                  <label class="form-check-label" for="exampleCheck1">Compare</label>
                </div>
                <div class="right"> <a target="_blank" href="{{url('single-plan?visitor_type='.request('visitor_type').'&visa_type='.request('visa_type').'&deductible='.request('deductible').'&date_of_birth='.request('date_of_birth').'&age='.request('age').'&start_date='.request('start_date').'&end_date='.request('end_date').'&no_of_days='.request('no_of_days').'&coverage_amt='.request('coverage_amt').'&pre_exit='.request('pre_exit').'&buyer_id='.$ratePackage['id'].'')}}">Benefit Summary</a> </div>
              </div>
            </div>
          </div>
          <div id="text{{$ratePackage['id']}}" style="display:none;" class="hidden-plan-details">
            <div class="row">
              <div class="col-lg-4">
                <div class="section1">
                  <h4>Summary</h4>
                  <p>Coverage: {{$requestData['coverage_amt']}}</p>
                  <p> Deductible: {{$requestData['deductible']}}</p>
                  <p>Period: {{$requestData['no_of_days']}} days</p>
                  
                  <p> Pre-existing medical conditions: <b><?php echo checkMedical($requestData['pre_exit']);?></b> covered</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="section2">
                  <ul>
                    <li>Hospitalization(Related to Emergency):-<strong>{{$compare_data['hospitalization_related_to_emergency']}}</strong></li>
                    <li> Covid-19:-<strong>{{$compare_data['covid_19']}}</strong></li>
                    <li> Ambulance:-<strong>{{$compare_data['ambulance']}}</strong></li>
                    <li> Walk-in Clinic Visit:-<strong>{{$compare_data['walk_in_clinic_visits']}}</strong></li>
                    <li> Prescriptions(Related to Emergencies):-<strong>{{$compare_data['prescriptions_related_to_emergencies']}}</strong></li>
                    <li>Dental Pain Relief:- <strong>{{$compare_data['dental_pain_relief']}}</strong></li>
                    <li> Side Trips:-<strong>{{$compare_data['trip_break_benefit']}}</strong> </li>
                  </ul>
                  <p><em>*Important notice:   The above is only a Summary of Benefits; for complete details, refer to <a href="#">Policy Wording.</a></em></p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="section3"> <a href="tel:6475709070" class="call-btn"><i class="fa fa-mobile"></i> (647) 570-9070</a> <a target="_blank" href="{{url('single-plan',$ratePackage['id'])}}" class="benifit-sumry">Benefit Summary</a> <a target="_blank" href="{{url('single-plan',$ratePackage['id'])}}" class="srt-app">Start Application</a> </div>
              </div>
            </div>
          </div>
        </div>
        <script>
          function togglePlanDetails_{{$ratePackage['id']}}(id) {
            $('#text' + id).toggle();  // Assuming 'id' is a variable containing the desired ID
          }
        </script>


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

    $(".compare").change(function() {
        var checkedCheckboxes = $(".compare:checked");
        var count = checkedCheckboxes.length;

        values = [];

        if (count >= 2) {
            checkedCheckboxes.each(function() {
                var value = $(this).val();
                if (!values.includes(value)) {
                    values.push(value);
                }
                $('#compare_btn_' + value).show();
            });

            // Hide any comparison buttons that are not associated with checked checkboxes
            $('[id^="compare_btn_"]').each(function() {
                if (!values.includes($(this).attr("id").replace("compare_btn_", ""))) {
                    $(this).hide();
                }
            });
        }
        else {
            // If there are fewer than two checkboxes checked, hide all comparison buttons.
            $('[id^="compare_btn_"]').hide();
        }
    });

    $('.compareData').click(function() {
      var commaSeparatedValues = values.join(', ');
      <?php 
          $data = request()->all();
      ?>
      var data = <?php echo json_encode($data); ?>;
      window.location.href ="https://greenberrysignature.co.in/policymarket/public/compare-quote?visitor_type="+data.visitor_type+"&visa_type="+data.visa_type+"&deductible="+data.deductible+"&date_of_birth="+data.date_of_birth+"&age="+data.age+"&start_date="+data.start_date+"&end_date="+data.end_date+"&no_of_days="+data.no_of_days+"&coverage_amt="+data.coverage_amt+"&pre_exit="+data.pre_exit+"&package="+commaSeparatedValues+"";
    });
    $('.deductible_amt,.coverage_amt,input[name=customRadioOptions]').on('change', function() {
        // var change_quote = $('.change_quote').val();
        var visitor_type = $('.visitor_type').val();
        var visa_type = $('.visa_type').val();
        var deductible = $('.deductible_amt').val();
        var date_of_birth = $('.date_of_birth').val();
        var age = $('.age').val();
        var start_date = $('.start_date').val();
        var end_date = $('.end_date').val();
        var no_of_days = $('.no_of_days').val();
        var coverage_amt = $('.coverage_amt').val();
        var pre_exit = $('input[name=customRadioOptions]:checked').val();
        window.location.href = "https://greenberrysignature.co.in/policymarket/public/find-quotation?visitor_type="+visitor_type+"&visa_type="+visa_type+"&deductible="+deductible+"&date_of_birth="+date_of_birth+"&age="+age+"&start_date="+start_date+"&end_date="+end_date+"&no_of_days="+no_of_days+"&coverage_amt="+coverage_amt+"&pre_exit="+pre_exit+"";
      });
});

</script>

@endsection
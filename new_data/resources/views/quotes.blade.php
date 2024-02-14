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
          @php 
          $requestData = Session::get('super_visa_request_data');
          $deductible = Session::get('super_visa_deductible');
          @endphp
          <p>Super Visa Insurance for Single Person(age @if(isset($requestData['age'])) {{$requestData['age']}} @endif years) for @if(isset($requestData['age'])) {{$requestData['no_of_days']}} @endif days, excluding coverage for @if($deductible['pre_exit']==0) existing @endif @if($deductible['pre_exit']==1) pre-existing @endif medical conditions <a href="{{url('super-visa')}}"><span><i class="fa fa-pencil"></i></span></a></p>
          <div class="form-field-row">
            <div class="coverage"> <span>Deductible</span>
              <select class="form-control deductible_amt">
                <option value="0" {{ $deductible['deductible'] == 0 ? 'selected' : '' }}>0</option>
                <option value="100" {{ $deductible['deductible'] == 100 ? 'selected' : '' }}>100</option>
                <option value="250" {{ $deductible['deductible'] == 250 ? 'selected' : '' }}>250</option>
                <option value="500" {{ $deductible['deductible'] == 500 ? 'selected' : '' }}>500</option>
                <option value="1000" {{ $deductible['deductible'] == 1000 ? 'selected' : '' }}>1000</option>
                <option value="2500" {{ $deductible['deductible'] == 2500 ? 'selected' : '' }}>2500</option>
                <option value="5000" {{ $deductible['deductible'] == 5000 ? 'selected' : '' }}>5000</option>
                <option value="10000" {{ $deductible['deductible'] == 10000 ? 'selected' : '' }}>10000</option>
              </select>
            </div>
          </div>
          <div class="form-field-row">
            <div class="coverage"> <span>Coverage</span>
              <select class="form-control  coverage_amt">
                <option value="100000" {{ $deductible['coverage_amt'] == 100000 ? 'selected' : '' }}>100,000</option>
                <option value="150000" {{ $deductible['coverage_amt'] == 150000 ? 'selected' : '' }}>150,000</option>
                <option value="200000" {{ $deductible['coverage_amt'] == 200000 ? 'selected' : '' }}>200,000</option>
                <option value="250000" {{ $deductible['coverage_amt'] == 250000 ? 'selected' : '' }}>250,000</option>
                <option value="300000" {{ $deductible['coverage_amt'] == 300000 ? 'selected' : '' }}>300,000</option>
                <option value="500000" {{ $deductible['coverage_amt'] == 500000 ? 'selected' : '' }}>500,000</option>
                <option value="1000000" {{ $deductible['coverage_amt'] == 1000000 ? 'selected' : '' }}>1,000,000</option>
              </select>
            </div>
          </div>
          <h6>Would you like to cover pre-existing medical conditions?</h6>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline1" name="customRadioOptions" class="custom-control-input" value="0" {{ $deductible['pre_exit'] == 0 ? 'checked' : '' }}>
            <label class="custom-control-label" for="customRadioInline1">No</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline2" name="customRadioOptions" class="custom-control-input" value="1" {{ $deductible['pre_exit'] == 1 ? 'checked' : '' }}>
            <label class="custom-control-label" for="customRadioInline2">Yes</label>
          </div>
        </div>
      </div>
      <div class="col-lg-8 quotation_data">
      @foreach($company_detail as $companies)
        @php
        
        if($companies->plan_type==1){
          $photo = $companies->basic;
          $compare_data = json_decode($companies->compare_basic,true);
        }
        if($companies->plan_type==2){
          $photo = $companies->standard;
          $compare_data = json_decode($companies->compare_standard,true);

        }
        if($companies->plan_type==3){
          $photo = $companies->enhanced;
          $compare_data = json_decode($companies->compare_enhanced,true);

        }
        @endphp
        <div class="quote-right">
          <div class="quote-box">
            <div class="logo-section"> <img src="{{$photo}}" /> </div>
            <div class="price-section">
              <?php 
              if($companies->company_id==12){
                ?>
                              <h3>{{'$'.number_format($companies->total_charge+$companies->detect_amt, 2)}}</h3>
                <?php
              }
              else if($companies->company_id==9){
                $five_days_amt = removeSign($companies->rate)*5;
              ?>
              <h3>{{'$'.number_format($companies->total_charge - $companies->detect_amt-$five_days_amt, 2)}}</h3>

              <?php
              }
              else{
              ?>
              <h3>{{'$'.number_format($companies->total_charge - $companies->detect_amt, 2)}}</h3>
               <?php  
               }
               if($companies->per_month_exit!=1){
                ?>
                <h3><span><strong>{{'$'.number_format(($companies->total_charge - $companies->detect_amt) / 12, 2)}}</strong>/month</span></h3>
                <?php
              }?>
              <h3><span>Deductible <strong>{{$companies->deductible_amt}}</strong> 
              <?php if ($companies->company_id == 4 || $companies->company_id == 11 || $companies->company_id == 10 || $companies->company_id == 7) { 
                if($companies->company_id == 4 && $companies->plan_type==1){
                  echo "per claim";
                }else{
                  echo "per policy";
                }
                } 
              else { echo "per claim"; } ?></span></h3>
            </div>
            <div class="btn-section"> <a target="_blank" href="{{url('single-plan',$companies->id)}}" class="buy-now">BUY NOW </a> 
            <a href="#" class="plan-details toggle togglePlanDetails" id="toggle" onclick="togglePlanDetails_{{$companies->id}}({{$companies->id}})">PLAN DETAILS</a>
            <!-- <a href="#" class="plan-details toggle compareData" id="compare_btn_{{$companies->id}}" style="display:none;">COMPARE</a> -->
            <button class="btn btn-primary compareData" id="compare_btn_{{$companies->id}}" style="display:none;">COMPARE</button>
              <div class="compaire">
                <div class="left">
                  <input type="checkbox" class="form-check-input compare" id="exampleCheck1" value="{{$companies->id}}">
                  <label class="form-check-label" for="exampleCheck1">Compare</label>
                </div>
                <div class="right"> <a target="_blank" href="{{url('single-plan',$companies->id)}}">Benefit Summary</a> </div>
              </div>
            </div>
          </div>
          <div id="text{{$companies->id}}" style="display:none;" class="hidden-plan-details">
            <div class="row">
              <div class="col-lg-4">
                <div class="section1">
                  <h4>Summary</h4>
                  <p>Coverage: {{$companies->aggregate_price}}</p>
                  <p> Deductible: {{$companies->deductible_amt}}</p>
                  <p>Period: {{$companies->no_of_days}} days</p>
                  <p> Pre-existing medical conditions: <b>{{$companies->pre_exit}}</b> covered</p>
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
                <div class="section3"> <a href="tel:6475709070" class="call-btn"><i class="fa fa-mobile"></i> (647) 570-9070</a> <a target="_blank" href="{{url('single-plan',$companies->id)}}" class="benifit-sumry">Benefit Summary</a> <a target="_blank" href="{{url('single-plan',$companies->id)}}" class="srt-app">Start Application</a> </div>
              </div>
            </div>
          </div>
        </div>
        <script>
          function togglePlanDetails_{{$companies->id}}(id) {
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
      var csrfToken = $('meta[name="csrf-token"]').attr('content');

        var commaSeparatedValues = values.join(', ');
        $.ajax({
          type: 'POST',
          url: 'compare-post',  // Replace with your controller URL
          data: {
            compare_data: commaSeparatedValues,
          },
          headers: {
            'X-CSRF-TOKEN': csrfToken
          },
          success: function(response) {
            // console.log(response);
            window.location.href = 'compare-quote';
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.error('AJAX request failed:', textStatus, errorThrown);
          }
        });
    });
});

</script>

@endsection
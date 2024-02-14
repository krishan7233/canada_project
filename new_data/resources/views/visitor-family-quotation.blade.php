@extends('layout.commonlayout')
@section('content')

<!-- Form section start here -->
<div class="section-larger">
@php
$requestData = Session::get('visitor_visa_family_request_data');
$deductible = Session::get('visitor_visa_family_deductible');
@endphp
<?php  
if($deductible['pre_exit']==1){
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
          <p>Visitors to Canada Insurance for Family(age {{$requestData['age1']}} years and {{$requestData['age2']}} years) for 90 days, {{$exits_data}} <a href="{{url('visitor-visa-insurance')}}"><span><i class="fa fa-pencil"></i></span></a></p>
          <div class="form-field-row">
            <div class="coverage"> <span>Deductible</span>
              <select class="form-control visitor_deductible_amt">
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
              <select class="form-control  visitor_coverage_amt">
              <option value="10000" {{ $deductible['coverage_amt'] == 10000 ? 'selected' : '' }}>10,000</option>  
              <option value="15000" {{ $deductible['coverage_amt'] == 15000 ? 'selected' : '' }}>15,000</option>
                <option value="20000" {{ $deductible['coverage_amt'] == 20000 ? 'selected' : '' }}>20,000</option>
                <option value="25000" {{ $deductible['coverage_amt'] == 25000 ? 'selected' : '' }}>25,000</option>
                <option value="30000" {{ $deductible['coverage_amt'] == 30000 ? 'selected' : '' }}>30,000</option>
                <option value="50000" {{ $deductible['coverage_amt'] == 50000 ? "selected" : (empty($deductible['coverage_amt']) ? "selected" :"") }}>50,000</option>
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
            <input type="radio" id="visitor-family-not-exit" name="visitor_family_exit_deductible" class="custom-control-input" value="0" {{ $deductible['pre_exit'] == 0 ? 'checked' : '' }} >
            <label class="custom-control-label" for="visitor-family-not-exit">No</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="visitor-family-exit" name="visitor_family_exit_deductible" class="custom-control-input" value="1" {{ $deductible['pre_exit'] == 1 ? 'checked' : '' }} >
            <label class="custom-control-label" for="visitor-family-exit">Yes</label>
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
              <h3>{{'$'.number_format($companies->total_charge - $companies->detect_amt, 2)}}</h3>
              <!-- <h3><span><strong>{{'$'.$companies->per_month}}</strong>/month</span></h3> -->
              <h3><span>Deductible <strong>{{$companies->deductible_amt}}</strong>
              
              <?php if ($companies->company_id == 4 || $companies->company_id == 11 || $companies->company_id == 10 || $companies->company_id == 7) { 
                if($companies->company_id == 4 && $companies->plan_type==1){
                  echo "per claim";
                }else{
                  echo "per policy";
                }
                } 
              else { echo "per claim"; } ?>
            
            </span></h3>
            </div>
            <div class="btn-section"> <a target="_blank" href="{{url('visitor-family-plan',$companies->id)}}" class="buy-now">BUY NOW</a> 
            <a href="#" class="plan-details toggle togglePlanDetails" id="toggle" onclick="togglePlanDetails_{{$companies->id}}({{$companies->id}})">PLAN DETAILS</a>
            <button class="btn btn-primary visitor_family_compareData" id="visitor_family_compare_btn_{{$companies->id}}" style="display:none;">COMPARE</button>
            
            <div class="compaire">
                <div class="left">
                <input type="checkbox" class="form-check-input visitor_family_compare" id="visitor_family_compare" value="{{$companies->id}}">
                  <label class="form-check-label" for="visitor_family_compare">Compare</label>
                </div>
                <div class="right"> <a target="_blank" href="{{url('visitor-family-plan',$companies->id)}}">Benefit Summary</a> </div>
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
                <div class="section3"> <a href="tel:6475709070" class="call-btn"><i class="fa fa-mobile"></i> (647) 570-9070</a> <a  href="{{url('visitor-family-plan',$companies->id)}}" class="benifit-sumry" target="_blank">Benefit Summary</a> <a href="{{url('visitor-family-plan',$companies->id)}}" target="_blank" class="srt-app">Start Application</a> </div>
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
      var csrfToken = $('meta[name="csrf-token"]').attr('content');

        var commaSeparatedValues = values.join(', ');
        // alert(commaSeparatedValues)
        $.ajax({
          type: 'POST',
          url: 'visitor-family-compare-post',  // Replace with your controller URL
          data: {
            compare_data: commaSeparatedValues,
          },
          headers: {
            'X-CSRF-TOKEN': csrfToken
          },
          success: function(response) {
            // console.log(response);
            window.location.href = 'visitor-family-compare';
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.error('AJAX request failed:', textStatus, errorThrown);
          }
        });
    });
});

</script>

@endsection
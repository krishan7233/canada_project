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
          $requestData = Session::get('visitor_visa_couple_request_data');
          $deductible = Session::get('visitor_visa_couple_deductible');


          @endphp
          <?php 
            if($deductible['pre_exit1']==1 && $deductible['pre_exit2']==1){
              $exits_data = "covering pre-existing medical conditions";
            }elseif($deductible['pre_exit1']==0 && $deductible['pre_exit2']==0){
              $exits_data = "excluding coverage for pre-existing medical conditions";
            }
            elseif($deductible['pre_exit1']==1 && $deductible['pre_exit2']==0){
              $exits_data="covering pre-existing medical conditions for 1st applicant and excluding coverage for pre-existing medical conditions for 2nd applicant";
            }
            elseif($deductible['pre_exit1']==0 && $deductible['pre_exit2']==1){
              $exits_data="excluding coverage for pre-existing medical conditions for 1st applicant and covering pre-existing medical conditions for 2nd applicant";
            }
            ?> 
          <p>Visitors to Canada Insurance for Couple(age {{$requestData['age1']}} years and {{$requestData['age2']}} years) for {{$requestData['no_of_days1']}} days, {{$exits_data}} <a href="{{url('visitor-visa-insurance')}}"><span><i class="fa fa-pencil"></i></span></a></p>
          <div class="form-field-row">
            <div class="coverage"> <span>Deductible  </span>
              <select class="form-control visitor-couple-deductible-amt" name="deductible_amt">
              <option value="0" {{ $deductible['deductible1'] == 0 ? 'selected' : '' }}>0</option>
              <option value="100" {{ $deductible['deductible1'] == 100 ? 'selected' : '' }}>100</option>
              <option value="250" {{ $deductible['deductible1'] == 250 ? 'selected' : '' }}>250</option>
              <option value="500" {{ $deductible['deductible1']== 500 ? 'selected' : '' }}>500</option>
              <option value="1000" {{ $deductible['deductible1'] == 1000 ? 'selected' : '' }}>1000</option>
              <option value="2500" {{ $deductible['deductible1'] == 2500 ? 'selected' : '' }}>2500</option>
              <option value="5000" {{ $deductible['deductible1'] == 5000 ? 'selected' : '' }}>5000</option>
              <option value="10000" {{ $deductible['deductible1'] == 10000 ? 'selected' : '' }}>10000</option>
              </select>
            </div>
          </div>
          <div class="form-field-row">
            <div class="coverage"> <span>Coverage List 1</span>
              <select class="form-control  visitor-couple-coverage-amt1" name="coverage_amt1">
              <option value="10000" {{ $deductible['coverage_amt1'] == 10000 ? 'selected' : '' }}>10,000</option>  
              <option value="15000" {{ $deductible['coverage_amt1'] == 15000 ? 'selected' : '' }}>15,000</option>
                <option value="20000" {{ $deductible['coverage_amt1'] == 20000 ? 'selected' : '' }}>20,000</option>
                <option value="25000" {{ $deductible['coverage_amt1'] == 25000 ? 'selected' : '' }}>25,000</option>
                <option value="30000" {{ $deductible['coverage_amt1'] == 30000 ? 'selected' : '' }}>30,000</option>
                <option value="50000" {{ $deductible['coverage_amt1'] == 50000 ? "selected" : (empty($deductible['coverage_amt1']) ? "selected" :"") }}>50,000</option>

                <option value="100000" {{$deductible['coverage_amt1']==100000 ? 'selected' : ''}}>100,000</option>
                <option value="150000" {{$deductible['coverage_amt1']==150000 ? 'selected' : ''}}>150,000</option>
                <option value="200000" {{$deductible['coverage_amt1']==200000 ? 'selected' : ''}}>200,000</option>
                <option value="250000" {{$deductible['coverage_amt1']==250000 ? 'selected' : ''}}>250,000</option>
                <option value="300000" {{$deductible['coverage_amt1']==300000 ? 'selected' : ''}}>300,000</option>
                <option value="500000" {{$deductible['coverage_amt1']==500000 ? 'selected' : ''}}>500,000</option>
                <option value="1000000" {{$deductible['coverage_amt1']==1000000 ? 'selected' : ''}}>1,000,000</option>
              </select>
            </div>
          </div>
          <div class="form-field-row">
            <div class="coverage"> <span>Coverage List 2</span>
              <select class="form-control  visitor-couple-coverage-amt2" name="coverage_amt2">
              <option value="10000" {{ $deductible['coverage_amt2'] == 10000 ? 'selected' : '' }}>10,000</option>  
              <option value="15000" {{ $deductible['coverage_amt2'] == 15000 ? 'selected' : '' }}>15,000</option>
                <option value="20000" {{ $deductible['coverage_amt2'] == 20000 ? 'selected' : '' }}>20,000</option>
                <option value="25000" {{ $deductible['coverage_amt2'] == 25000 ? 'selected' : '' }}>25,000</option>
                <option value="30000" {{ $deductible['coverage_amt2'] == 30000 ? 'selected' : '' }}>30,000</option>
                <option value="50000" {{ $deductible['coverage_amt2'] == 50000 ? "selected" : (empty($deductible['coverage_amt2']) ? "selected" :"") }}>50,000</option>

                <option value="100000" {{$deductible['coverage_amt2']==100000 ? 'selected' : ''}}>100,000</option>
                <option value="150000" {{$deductible['coverage_amt2']==150000 ? 'selected' : ''}}>150,000</option>
                <option value="200000" {{$deductible['coverage_amt2']==200000 ? 'selected' : ''}}>200,000</option>
                <option value="250000" {{$deductible['coverage_amt2']==250000 ? 'selected' : ''}}>250,000</option>
                <option value="300000" {{$deductible['coverage_amt2']==300000 ? 'selected' : ''}}>300,000</option>
                <option value="500000" {{$deductible['coverage_amt2']==500000 ? 'selected' : ''}}>500,000</option>
                <option value="1000000" {{$deductible['coverage_amt2']==1000000 ? 'selected' : ''}}>1,000,000</option>
              </select>
            </div>
          </div>
          <h6>Would you like to cover pre-existing medical conditions?</h6>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="not_exit1" name="visitor_couple_exit1" class="custom-control-input " value="0" {{$deductible['pre_exit1']==0 ? 'checked' : ''}}>
            <label class="custom-control-label" for="not_exit1">No</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="exit1" name="visitor_couple_exit1" class="custom-control-input" value="1" {{$deductible['pre_exit1']==1 ? 'checked' : ''}}>
            <label class="custom-control-label" for="exit1">Yes</label>
          </div></br>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="not_exit2" name="visitor_couple_exit2" class="custom-control-input" value="0" {{$deductible['pre_exit2']==0 ? 'checked' : ''}}>
            <label class="custom-control-label" for="not_exit2">No</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="exit2" name="visitor_couple_exit2" class="custom-control-input" value="1" {{$deductible['pre_exit2']==1 ? 'checked' : ''}}>
            <label class="custom-control-label" for="exit2">Yes</label>
          </div>
        </div>
      </div>
      <div class="col-lg-8 quotation_data">
      

      @foreach($company_detail as $companies)
        @php
        if(empty($companies->id1) || empty($companies->id2)){
            continue;
        }
        if(!empty($companies->id1)){
        $id1 = $companies->id1;
        $tamt1 = $companies->total_charge1 - $companies->detect_amt1;
        $company_name1 = $companies->company_name1;
        $company_status1 = $companies->company_status1;
        $company_photo1 = $companies->company_photo1;
        $aggregate_price1 = $companies->aggregate_price1;
        $start_age1 = $companies->start_age1;
        $end_age1 = $companies->end_age1;
        $aggregate_id1 = $companies->aggregate_id1;
        $age_id1 = $companies->age_id1;
        $pre_exit1 = $companies->pre_exit1;
        $plan_type1 = $companies->plan_type1;
        $no_of_days1 = $companies->no_of_days1;
        $total_charge1 = $companies->total_charge1;
        $per_month1 = $companies->per_month1;
        $deductible_amt1 = $companies->deductible_amt1;
        $sur_charge1 = $companies->sur_charge1;
        $detect_amt1 = $companies->detect_amt1;
        if($companies->plan_type1==1){
          $photo = $companies->basic1;
          $compare_data = json_decode($companies->compare_basic1,true);

        }
        if($companies->plan_type1==2){
          $photo = $companies->standard1;
          $compare_data = json_decode($companies->compare_standard1,true);
        }
        if($companies->plan_type1==3){
          $photo = $companies->enhanced1;
          $compare_data = json_decode($companies->compare_enhanced1,true);

        }

        $companies_id1=$companies->company_id1;

        }else{
        $id1=$tamt1=$company_name1=$company_status1=$company_photo1=$aggregate_price1=$start_age1=$end_age1=$aggregate_id1=$age_id1=$pre_exit1=
        $plan_type1=$no_of_days1=$total_charge1=$per_month1=$total_charge1=$deductible_amt1=$sur_charge1=$detect_amt1=$photo=$companies_id1=0;
        }
        if(!empty($companies->id2)){
        $id2 = $companies->id2;
        $tamt2 = $companies->total_charge2 - $companies->detect_amt2;
        $company_name2 = $companies->company_name2;
        $company_status2 = $companies->company_status2;
        $company_photo2 = $companies->company_photo2;
        $aggregate_price2 = $companies->aggregate_price2;
        $start_age2 = $companies->start_age2;
        $end_age2 = $companies->end_age2;
        $aggregate_id2 = $companies->aggregate_id2;
        $age_id2 = $companies->age_id2;
        $pre_exit2 = $companies->pre_exit2;
        $plan_type2 = $companies->plan_type2;
        $no_of_days2 = $companies->no_of_days2;
        $total_charge2 = $companies->total_charge2;
        $per_month2 = $companies->per_month2;
        $deductible_amt2 = $companies->deductible_amt2;
        $sur_charge2 = $companies->sur_charge2;
        $detect_amt2 = $companies->detect_amt2;
        
        }else{
        $id2=$tamt2=$company_name2=$company_status2=$company_photo2=$aggregate_price2=$start_age2=$end_age2=$aggregate_id2=$age_id2=$pre_exit2=
        $plan_type2=$no_of_days2=$total_charge2=$per_month2=$total_charge2=$deductible_amt2=$sur_charge2=$detect_amt2=0;
        }
        $sum_total_amt = number_format(($companies->total_charge1 - $companies->detect_amt1)+($companies->total_charge2 - $companies->detect_amt2),2);
        @endphp

      <div class="quote-right">
          <div class="quote-box">
            <div class="logo-section"> <img src="{{$photo}}" /> </div>
            <div class="price-section">
               
              <!-- <h3>{{'$'.$tamt1}}</h3></br>
              <h3>{{'$'.$tamt2}}</h3>
              <p>Total : <strong>{{$sum_total_amt}}</strong></p>
              <h3><span><strong>{{'$'.$per_month1}}</strong>/month</span></h3> -->
              <h3>{{'$'.number_format($tamt1,2)}}</h3></br>
              <h3>{{'$'.number_format($tamt2,2)}}</h3>
              <p>Total : <strong>{{$sum_total_amt}}</strong></p>
              <!-- <h3><span><strong>{{'$'.number_format(($tamt1+$tamt2)/12,2)}}</strong>/month</span></h3> -->
              <h3><span>Deductible <strong>{{$deductible_amt1}}</strong> 
              <?php if ($companies_id1 == 4 || $companies_id1 == 11 || $companies_id1 == 10 || $companies_id1 == 7) { 
                if($companies_id1 == 4 && $companies->plan_type1==1){
                  echo "per claim";
                }else{
                  echo "per policy";
                }
                } 
              else { echo "per claim"; } ?>
              <?php 
              //if($companies_id1==4 || 11 || 10 || 7){ echo" per policy";}else{ echo" per claim";} 
               ?>
            </span></h3>
            </div>
            <div class="btn-section"> <a target="_blank" href="{{url('visitor-couple-plan',$companies->id1)}}" class="buy-now">BUY NOW</a> 
            <a href="#" class="plan-details toggle togglePlanDetails" id="toggle" onclick="togglePlanDetails_{{$id1}}({{$id1}})">PLAN DETAILS</a>
              <div class="compaire">
                <div class="left">
                <input type="checkbox" class="form-check-input visitor_couple_compare" id="visitor_couple_compare" value="{{$companies->id1}}">
                  <label class="form-check-label" for="visitor_couple_compare">Compare</label>
                  <button class="btn btn-primary visitor_couple_compare_data" id="visitor_couple_compare_btn_{{$companies->id1}}" style="display:none;">COMPARE</button>
                </div>
                <div class="right"> <a target="_blank" href="{{url('visitor-couple-plan',$companies->id1)}}">Benefit Summary</a> </div>
              </div>
            </div>
          </div>
          <div id="text{{$id1}}" style="display:none;" class="hidden-plan-details">
            <div class="row">
              <div class="col-lg-4">
                <div class="section1">
                  <h4>Summary</h4>
                  <p>Coverage 1: {{$aggregate_price1}}</p>
                  <p>Coverage 2: {{$aggregate_price2}}</p>
                  <p> Deductible: {{$deductible_amt1}}</p>
                  <p>Period: {{$no_of_days1}} days</p>
                  <p> Pre-existing medical conditions: <b>{{$pre_exit1}}</b> covered</p>
                  <p> Pre-existing medical conditions: <b>{{$pre_exit2}}</b> covered</p>
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
                <div class="section3"> <a href="tel:6475709070" class="call-btn"><i class="fa fa-mobile"></i> (647) 570-9070</a> <a href="{{url('visitor-couple-plan',$companies->id1)}}" class="benifit-sumry" target="_blank">Benefit Summary</a> <a href="{{url('visitor-couple-plan',$companies->id1)}}" target="_blank" class="srt-app">Start Application</a> </div>
              </div>
            </div>
          </div>
        </div>
        <script>
          function togglePlanDetails_{{$id1}}(id) {
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

    $(".visitor_couple_compare").change(function() {
        var checkedCheckboxes = $(".visitor_couple_compare:checked");
        var count = checkedCheckboxes.length;
        values = [];

        if (count >= 2) {
            checkedCheckboxes.each(function() {
                var value = $(this).val();
                if (!values.includes(value)) {
                    values.push(value);
                }
                $('#visitor_couple_compare_btn_' + value).show();
            });

            // Hide any comparison buttons that are not associated with checked checkboxes
            $('[id^="visitor_couple_compare_btn_"]').each(function() {
                if (!values.includes($(this).attr("id").replace("visitor_couple_compare_btn_", ""))) {
                    $(this).hide();
                }
            });
        }
        else {
            // If there are fewer than two checkboxes checked, hide all comparison buttons.
            $('[id^="visitor_couple_compare_btn_"]').hide();
        }
    });

    $('.visitor_couple_compare_data').click(function() {
      var csrfToken = $('meta[name="csrf-token"]').attr('content');

        var commaSeparatedValues = values.join(', ');
        // alert(commaSeparatedValues);
        $.ajax({
          type: 'POST',
          url: 'visitor-couple-compare-post',  // Replace with your controller URL
          data: {
            compare_data: commaSeparatedValues,
          },
          headers: {
            'X-CSRF-TOKEN': csrfToken
          },
          success: function(response) {
            // console.log(response);
            window.location.href = 'visitor-couple-compare';
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.error('AJAX request failed:', textStatus, errorThrown);
          }
        });
    });
});

</script>
@endsection 
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
        <?php

          if($_REQUEST['super_visa_couple_exit1']==1 && $_REQUEST['super_visa_couple_exit2']==1){
            $exits_data = "covering pre-existing medical conditions";
          }elseif($_REQUEST['super_visa_couple_exit1']==0 && $_REQUEST['super_visa_couple_exit2']==0){
            $exits_data = "excluding coverage for pre-existing medical conditions";
          }
          elseif($_REQUEST['super_visa_couple_exit1']==1 && $_REQUEST['super_visa_couple_exit2']==0){
            $exits_data="excluding coverage for pre-existing medical conditions for 1st applicant and covering pre-existing medical conditions for 2nd applicant";
          }
          elseif($_REQUEST['super_visa_couple_exit1']==0 && $_REQUEST['super_visa_couple_exit2']==1){
            $exits_data="covering pre-existing medical conditions for 1st applicant and excluding coverage for pre-existing medical conditions for 2nd applicant";
          }
          ?>
        <p>Super Visa Insurance for Couple(age {{$superVisaCouple1['super_visa_couple_age1']}} years and {{$superVisaCouple2['super_visa_couple_age2']}} years) for {{$superVisaCouple1['super_visa_couple_days1']}} days, {{$exits_data}}. <a href="{{url('super-visa?visa_type='.request('visa_type').'&super_visa_couple_birth1='.request('super_visa_couple_birth1').'&super_visa_couple_age1='.request('super_visa_couple_age1').'&super_visa_couple_birth2='.request('super_visa_couple_birth2').'&super_visa_couple_age2='.request('super_visa_couple_age2').'&super_visa_couple_start_date1='.request('super_visa_couple_start_date1').'&super_visa_couple_end_date1='.request('super_visa_couple_end_date1').'&super_visa_couple_days1='.request('super_visa_couple_days1').'&super_visa_couple_start_date2='.request('super_visa_couple_start_date2').'&super_visa_couple_end_date2='.request('super_visa_couple_end_date2').'&super_visa_couple_days2='.request('super_visa_couple_days2').'&super_visa_couple_coverage1='.request('super_visa_couple_coverage1').'&super_visa_couple_coverage2='.request('super_visa_couple_coverage2').'&detectible_amount='.request('detectible_amount').'&super_visa_couple_exit1='.request('super_visa_couple_exit1').'&super_visa_couple_exit2='.request('super_visa_couple_exit2').'&coverage_check='.request('coverage_check').'')}}"><span><i class="fa fa-pencil"></i></span></a></p>
          <div class="form-field-row">
            <div class="coverage"> <span>Deductible  </span>
              <select class="form-control super-couple-deductible-amt" name="deductible_amt">
              <option value="0" {{ $superVisaCouple1['detectible_amount'] == 0 ? 'selected' : '' }}>0</option>
              <option value="100" {{ $superVisaCouple1['detectible_amount'] == 100 ? 'selected' : '' }}>100</option>
              <option value="250" {{ $superVisaCouple1['detectible_amount'] == 250 ? 'selected' : '' }}>250</option>
              <option value="500" {{ $superVisaCouple1['detectible_amount']== 500 ? 'selected' : '' }}>500</option>
              <option value="1000" {{ $superVisaCouple1['detectible_amount'] == 1000 ? 'selected' : '' }}>1000</option>
              <option value="2500" {{ $superVisaCouple1['detectible_amount'] == 2500 ? 'selected' : '' }}>2500</option>
              <option value="5000" {{ $superVisaCouple1['detectible_amount'] == 5000 ? 'selected' : '' }}>5000</option>
              <option value="10000" {{ $superVisaCouple1['detectible_amount'] == 10000 ? 'selected' : '' }}>10000</option>
              </select>
            </div>
          </div>
          <div class="form-field-row">
            <div class="coverage"> <span>Coverage List 1</span>
              <select class="form-control  super-couple-coverage-amt1" name="coverage_amt1">
                <option value="100000" {{$superVisaCouple1['super_visa_couple_coverage1']==100000 ? 'selected' : ''}}>100,000</option>
                <option value="150000" {{$superVisaCouple1['super_visa_couple_coverage1']==150000 ? 'selected' : ''}}>150,000</option>
                <option value="200000" {{$superVisaCouple1['super_visa_couple_coverage1']==200000 ? 'selected' : ''}}>200,000</option>
                <option value="250000" {{$superVisaCouple1['super_visa_couple_coverage1']==250000 ? 'selected' : ''}}>250,000</option>
                <option value="300000" {{$superVisaCouple1['super_visa_couple_coverage1']==300000 ? 'selected' : ''}}>300,000</option>
                <option value="500000" {{$superVisaCouple1['super_visa_couple_coverage1']==500000 ? 'selected' : ''}}>500,000</option>
                <option value="1000000" {{$superVisaCouple1['super_visa_couple_coverage1']==1000000 ? 'selected' : ''}}>1,000,000</option>
              </select>
            </div>
          </div>
          <div class="form-field-row">
            <div class="coverage"> <span>Coverage List 2</span>
              <select class="form-control  super-couple-coverage-amt2" name="coverage_amt2">
                <option value="100000" {{$superVisaCouple2['super_visa_couple_coverage2']==100000 ? 'selected' : ''}}>100,000</option>
                <option value="150000" {{$superVisaCouple2['super_visa_couple_coverage2']==150000 ? 'selected' : ''}}>150,000</option>
                <option value="200000" {{$superVisaCouple2['super_visa_couple_coverage2']==200000 ? 'selected' : ''}}>200,000</option>
                <option value="250000" {{$superVisaCouple2['super_visa_couple_coverage2']==250000 ? 'selected' : ''}}>250,000</option>
                <option value="300000" {{$superVisaCouple2['super_visa_couple_coverage2']==300000 ? 'selected' : ''}}>300,000</option>
                <option value="500000" {{$superVisaCouple2['super_visa_couple_coverage2']==500000 ? 'selected' : ''}}>500,000</option>
                <option value="1000000" {{$superVisaCouple2['super_visa_couple_coverage2']==1000000 ? 'selected' : ''}}>1,000,000</option>
              </select>
            </div>
          </div>
          <h6>Would you like to cover pre-existing medical conditions?</h6>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="not_exit1" name="super_couple_exit1" class="custom-control-input " value="0" {{$superVisaCouple1['super_visa_couple_exit1']==0 ? 'checked' : ''}}>
            <label class="custom-control-label" for="not_exit1">No</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="exit1" name="super_couple_exit1" class="custom-control-input" value="1" {{$superVisaCouple1['super_visa_couple_exit1']==1 ? 'checked' : ''}}>
            <label class="custom-control-label" for="exit1">Yes</label>
          </div></br>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="not_exit2" name="super_couple_exit2" class="custom-control-input" value="0" {{$superVisaCouple2['super_visa_couple_exit2']==0 ? 'checked' : ''}}>
            <label class="custom-control-label" for="not_exit2">No</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="exit2" name="super_couple_exit2" class="custom-control-input" value="1" {{$superVisaCouple2['super_visa_couple_exit2']==1 ? 'checked' : ''}}>
            <label class="custom-control-label" for="exit2">Yes</label>
          </div>
        </div>
      </div>
      <div class="col-lg-8 quotation_data">
      @foreach($packageData as $package)
      <?php
      $package1 = $package['id1'];
      $package2 = $package['id2'];
      $button_id = $package1.'_'.$package2;
      $compare_data = companyDetail($package['c_id']);

      ?>
      <div class="quote-right">
          <div class="quote-box">
            <div class="logo-section"> <img src="{{companyPhoto($package['c_id'])}}" /> </div>
              <div class="price-section">
              <h3>{{'$'.number_format($package['final_result1'],2)}}</h3></br>
              <h3>{{'$'.number_format($package['final_result2'],2)}}</h3>
              <?php 
              $sumPackage = ($package['final_result1']+$package['final_result2']);
              ?>
              <p>Total : <strong>$ {{number_format($sumPackage,2)}}</strong></p>
              <?php  if(perMonthCheck($package['c_id'])==1){
                if($package['c_id']==10){
                  ?>
                  <h3><span><strong>$ {{number_format(($sumPackage/12)+10,2)}}</strong>/month</span></h3>

                  <?php
                }
                else{
                ?>
                <h3><span><strong>$ {{number_format(($sumPackage/12),2)}}</strong>/month</span></h3>
                <?php 
                }
              }?>
              <h3><span>Deductible <strong>{{number_format($package['detectible'])}}  </strong> {{policyType($package['c_id'])}} 
            </span></h3>
            </div>
            <div class="btn-section"> <a target="_blank" href="{{ url('super-visa-couple-plan-buyer?' . 
                'visa_type=' . request('visa_type') . '&' . 
                'super_visa_couple_birth1=' . request('super_visa_couple_birth1') . '&' . 
                'super_visa_couple_age1=' . request('super_visa_couple_age1') . '&' . 
                'super_visa_couple_birth2=' . request('super_visa_couple_birth2') . '&' . 
                'super_visa_couple_age2=' . request('super_visa_couple_age2') . '&' . 
                'super_visa_couple_start_date1=' . request('super_visa_couple_start_date1') . '&' . 
                'super_visa_couple_end_date1=' . request('super_visa_couple_end_date1') . '&' . 
                'super_visa_couple_days1=' . request('super_visa_couple_days1') . '&' . 
                'super_visa_couple_start_date2=' . request('super_visa_couple_start_date2') . '&' . 
                'super_visa_couple_end_date2=' . request('super_visa_couple_end_date2') . '&' . 
                'super_visa_couple_days2=' . request('super_visa_couple_days2') . '&' . 
                'super_visa_couple_coverage1=' . request('super_visa_couple_coverage1') . '&' . 
                'super_visa_couple_coverage2=' . request('super_visa_couple_coverage2') . '&' . 
                'detectible_amount=' . request('detectible_amount') . '&' . 
                'super_visa_couple_exit1=' . request('super_visa_couple_exit1') . '&' . 
                'super_visa_couple_exit2=' . request('super_visa_couple_exit2') . '&' . 
                'buyer_id=' . $button_id
            ) }}" class="buy-now">BUY NOW</a> 
            <a href="#" class="plan-details toggle togglePlanDetails" id="toggle" onclick="togglePlanDetails_{{$button_id}}()">PLAN DETAILS</a>
              <div class="compaire">
                <div class="left">
                  <input type="checkbox" class="form-check-input super_visa_couple_compare" id="super_visa_couple_compare" value="{{$button_id}}">
                  <label class="form-check-label" for="super_visa_couple_compare">Compare</label>
                  <button class="btn btn-primary super_visa_couple_compare_data" id="super_visa_couple_compare_btn_{{$button_id}}" style="display:none;">COMPARE</button>

                </div>
                <div class="right"> <a target="_blank" href="{{ url('super-visa-couple-plan-buyer?' . 
                'visa_type=' . request('visa_type') . '&' . 
                'super_visa_couple_birth1=' . request('super_visa_couple_birth1') . '&' . 
                'super_visa_couple_age1=' . request('super_visa_couple_age1') . '&' . 
                'super_visa_couple_birth2=' . request('super_visa_couple_birth2') . '&' . 
                'super_visa_couple_age2=' . request('super_visa_couple_age2') . '&' . 
                'super_visa_couple_start_date1=' . request('super_visa_couple_start_date1') . '&' . 
                'super_visa_couple_end_date1=' . request('super_visa_couple_end_date1') . '&' . 
                'super_visa_couple_days1=' . request('super_visa_couple_days1') . '&' . 
                'super_visa_couple_start_date2=' . request('super_visa_couple_start_date2') . '&' . 
                'super_visa_couple_end_date2=' . request('super_visa_couple_end_date2') . '&' . 
                'super_visa_couple_days2=' . request('super_visa_couple_days2') . '&' . 
                'super_visa_couple_coverage1=' . request('super_visa_couple_coverage1') . '&' . 
                'super_visa_couple_coverage2=' . request('super_visa_couple_coverage2') . '&' . 
                'detectible_amount=' . request('detectible_amount') . '&' . 
                'super_visa_couple_exit1=' . request('super_visa_couple_exit1') . '&' . 
                'super_visa_couple_exit2=' . request('super_visa_couple_exit2') . '&' . 
                'buyer_id=' . $button_id
            ) }}">Benefit Summary</a> </div>
              </div>
            </div>
          </div>
          <div id="text{{$button_id}}" style="display:none;" class="hidden-plan-details">
            <div class="row">
              <div class="col-lg-4">
                <div class="section1">
                  <h4>Summary</h4>
                  <p>Coverage 1: {{$superVisaCouple1['super_visa_couple_coverage1']}}</p>
                  <p>Coverage 2: {{$superVisaCouple2['super_visa_couple_coverage2']}}</p>
                  <p> Deductible: {{$superVisaCouple1['detectible_amount']}}</p>
                  <p>Period: {{$superVisaCouple1['super_visa_couple_days1']}} days</p>
                  <p> Pre-existing medical conditions: <b>{{$_REQUEST['super_visa_couple_exit1']}}</b> covered</p>
                  <p> Pre-existing medical conditions: <b>{{$_REQUEST['super_visa_couple_exit2']}}</b> covered</p>
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
                <div class="section3"> <a href="tel:6475709070" class="call-btn"><i class="fa fa-mobile"></i> (647) 570-9070</a> <a href="{{url('couple-plan',$button_id)}}" class="benifit-sumry" target="_blank">Benefit Summary</a> <a href="{{url('couple-plan',$button_id)}}" target="_blank" class="srt-app">Start Application</a> </div>
              </div>
            </div>
          </div>
        </div>
        <script>
    function togglePlanDetails_<?php echo $button_id; ?>() {
        $('<?php echo '#text'.$button_id; ?>').toggle();  // Assuming 'package' contains the desired ID
    }
</script>

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

    $(".super_visa_couple_compare").change(function() {
        var checkedCheckboxes = $(".super_visa_couple_compare:checked");
        var count = checkedCheckboxes.length;
        values = [];

        if (count >= 2) {
            checkedCheckboxes.each(function() {
                var value = $(this).val();

                if (!values.includes(value)) {
                    values.push(value);
                }
                $('#super_visa_couple_compare_btn_' + value).show();
            });

            // Hide any comparison buttons that are not associated with checked checkboxes
            $('[id^="super_visa_couple_compare_btn_"]').each(function() {
                if (!values.includes($(this).attr("id").replace("super_visa_couple_compare_btn_", ""))) {
                    $(this).hide();
                }
            });
        }
        else {
            // If there are fewer than two checkboxes checked, hide all comparison buttons.
            $('[id^="super_visa_couple_compare_btn_"]').hide();
        }
    });

    $('.super_visa_couple_compare_data').click(function() {
      // alert('hejj');
      var commaSeparatedValues = values.join(', ');
      // alert(commaSeparatedValues);
      <?php 
          $data = request()->all();
      ?>
      var data = <?php echo json_encode($data); ?>;
      console.log(data);
      window.location.href ="https://greenberrysignature.co.in/policymarket/public/super-visa-couple-compare-quote?visa_type="+data.visa_type+"&super_visa_couple_birth1="+data.super_visa_couple_birth1+"&super_visa_couple_age1="+data.super_visa_couple_age1+"&super_visa_couple_birth2="+data.super_visa_couple_birth2+"&super_visa_couple_age2="+data.super_visa_couple_age2+"&super_visa_couple_start_date1="+data.super_visa_couple_start_date1+"&super_visa_couple_end_date1="+data.super_visa_couple_end_date1+"&super_visa_couple_days1="+data.super_visa_couple_days1+"&super_visa_couple_start_date2="+data.super_visa_couple_start_date2+"&super_visa_couple_end_date2="+data.super_visa_couple_end_date2+"&super_visa_couple_days2="+data.super_visa_couple_days2+"&super_visa_couple_coverage1="+data.super_visa_couple_coverage1+"&super_visa_couple_coverage2="+data.super_visa_couple_coverage2+"&detectible_amount="+data.detectible_amount+"&super_visa_couple_exit1="+data.super_visa_couple_exit1+"&super_visa_couple_exit2="+data.super_visa_couple_exit2+"&package="+commaSeparatedValues+"";
    });
    // $('.super_visa_couple_compare_data').click(function() {
    //   var csrfToken = $('meta[name="csrf-token"]').attr('content');

    //     var commaSeparatedValues = values.join(', ');
    //     // alert(commaSeparatedValues);
    //     $.ajax({
    //       type: 'POST',
    //       url: 'super-visa-couple-compare-post',  // Replace with your controller URL
    //       data: {
    //         compare_data: commaSeparatedValues,
    //       },
    //       headers: {
    //         'X-CSRF-TOKEN': csrfToken
    //       },
    //       success: function(response) {
    //         console.log(response);
    //         window.location.href = 'super-visa-couple-compare';
    //       },
    //       error: function(jqXHR, textStatus, errorThrown) {
    //         console.error('AJAX request failed:', textStatus, errorThrown);
    //       }
    //     });
    // });
});

</script>


@endsection 
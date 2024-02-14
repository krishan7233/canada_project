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
          <p>Visitors to Canada Insurance for Single Person(age @if(isset($requestData['age'])) {{$requestData['age']}} @endif years) for @if(isset($requestData['age'])) {{$requestData['no_of_days']}} @endif days, excluding coverage for @if($requestData['pre_exit']==0) existing @endif @if($requestData['pre_exit']==1) pre-existing @endif medical conditions 
          <a href="{{ url('visitor-visa-insurance?visitor_type=' . $requestData['visitor_type'] . '&visa_type=' . $requestData['visa_type'] . '&deductible=' . $requestData['deductible'] . '&date_of_birth=' . $requestData['date_of_birth'] . '&age=' . $requestData['age'] . '&start_date=' . $requestData['start_date'] . '&end_date=' . $requestData['end_date'] . '&no_of_days=' . $requestData['no_of_days'] . '&coverage_amt=' . $requestData['coverage_amt'] . '&pre_exit=' . $requestData['pre_exit']) }}">
          <span><i class="fa fa-pencil"></i></span></a></p>
          <div class="form-field-row">
          <input type="hidden" name="visitor_type" class="visitor_type" value="{{$requestData['visitor_type']}}">
              <input type="hidden" name="visa_type" class="visa_type" value="{{$requestData['visa_type']}}">
              <input type="hidden" name="date_of_birth" class="date_of_birth" value="{{$requestData['date_of_birth']}}">
              <input type="hidden" name="age" class="age" value="{{$requestData['age']}}">
              <input type="hidden" name="start_date" class="start_date" value="{{$requestData['start_date']}}">
              <input type="hidden" name="end_date" class="end_date" value="{{$requestData['end_date']}}">
              <input type="hidden" name="no_of_days" class="no_of_days" value="{{$requestData['no_of_days']}}">
            <div class="coverage"> <span>Deductible</span>
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
            <div class="coverage"> <span>Coverage</span>
              <select class="form-control  coverage_amt">
                <option value="10000" {{ $requestData['coverage_amt'] == 10000 ? 'selected' : '' }}>10,000</option>
                <option value="25000" {{ $requestData['coverage_amt'] == 25000 ? 'selected' : '' }}>25,000</option>
                <option value="50000" {{ $requestData['coverage_amt'] == 50000 ? 'selected' : '' }}>50,000</option>
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
      <div class="col-lg-8 quotation_data">
      @foreach($ratePackage as $ratePackage)
        <div class="quote-right">
          <div class="quote-box">
            <div class="logo-section"> <img src="{{companyPhoto($ratePackage['c_id'])}}" /> </div>
            <div class="price-section">

              
              <h3>$ {{number_format($ratePackage['final_result'],2)}}</h3>
              <?php  if(perMonthCheck($ratePackage['c_id'])==1){
                if($ratePackage['c_id']==10){
                  ?>
                  <h3><span><strong>$ {{number_format(($ratePackage['final_result']/12)+10,2)}}</strong>/month</span></h3>

                  <?php
                }
                else{
                ?>
                <h3><span><strong>$ {{number_format(($ratePackage['final_result']/12),2)}}</strong>/month</span></h3>
                <?php 
                }
              }?>
              <h3><span>Deductible <strong>{{number_format($ratePackage['detectible'])}}  </strong> {{policyType($ratePackage['c_id'])}} 
              
              </span></h3>
            </div>
            <div class="btn-section"> <a target="_blank" href="" class="buy-now">BUY NOW </a> 
            <a href="#" class="plan-details toggle togglePlanDetails" id="toggle" onclick="togglePlanDetails_">PLAN DETAILS</a>
            <button class="btn btn-primary compareData" id="" style="display:none;">COMPARE</button>
              <div class="compaire">
                <div class="left">
                  <input type="checkbox" class="form-check-input compare" id="exampleCheck1" value="">
                  <label class="form-check-label" for="exampleCheck1">Compare</label>
                </div>
                <div class="right"> <a target="_blank" href="">Benefit Summary</a> </div>
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
        window.location.href = "https://greenberrysignature.co.in/policymarket/public/visitor-visa-single-quotation?visitor_type="+visitor_type+"&visa_type="+visa_type+"&deductible="+deductible+"&date_of_birth="+date_of_birth+"&age="+age+"&start_date="+start_date+"&end_date="+end_date+"&no_of_days="+no_of_days+"&coverage_amt="+coverage_amt+"&pre_exit="+pre_exit+"";
      });
});

</script>

@endsection
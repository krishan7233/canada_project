<footer>
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-md-3 col-sm-6 footer-sec">
                  <h5>Company</h5>
                  <ul>
                     <li><a href="#">Home</a></li>
                     <li><a href="{{ route('about-us') }}">About Us</a></li>
                     <li><a href="#">FAQs</a></li>
                     <li><a href="#">Blog</a></li>
                     <li><a href="{{ route('contact-us') }}">Contact Us</a></li>
                  </ul>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-6 footer-sec">
                  <h5>Insurance </h5>
                  <ul>
                     <li><a href="{{ route('super-visa') }}">Super Visa Insurance</a></li>
                     <li><a href="{{ route('visitor-visa-insurance') }}">Visitor To Canada Insurance</a></li>
                     <li><a href="#">Canadian Travelling Out of Country / Province</a></li>
                      <li><a href="#">Home and Auto Insurance</a></li>
                       <li><a href="#">Commercial Insurance</a></li>
                  </ul>
               </div>
               <div class="col-lg-2 col-md-2 col-sm-6 footer-sec">
                  <h5> Investments </h5>
                  <ul>
                     <li><a href="#">RESP</a></li>
                     <li><a href="#">RRSP</a></li>
                     <li><a href="#">TFSA</a></li>
                     <li><a href="#">FHSA</a> </li>
                  </ul>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 footer-sec">
                  <h5>Contact </h5>
                  <p class="adres">52680 Matheson Blvd E, Suite # 102, Mississauga, ON, L4W 0A5</p>
                  <p><strong>Phone :</strong><a href="tel:+19058777777"> 905-877-7777</a></p>
				   <p><strong>Email :</strong><a href="mailto:info@policymarket.ca"> info@policymarket.ca</a></p>
               </div>
            </div>
         </div>
         <div class="container-fluid copyright">
            <div class="container">
               <div class="row">
                  <div class="col-xl-9 col-lg-9 col-md-6">
                 <p>Copyright © 2023. All rights reserved by Policy Market. | <a href="{{ route('privacy-policy') }}">Privacy Policy</a> | <a href="{{ route('terms-and-conditions') }}">Terms and Conditions</a></p>
                  </div>
                  
                  <div class="col-xl-3 col-lg-3 col-md-6">
                     <div class="copyright-social">
                        <ul>
                           <li><a href="#"><img src="assets/images/icon_fb.png" class="img-fluid" alt=""></a></li>
                           <li><a href="#"><img src="assets/images/icon_tw.png" class="img-fluid" alt=""></a></li>
                           <li><a href="#"><img src="assets/images/icon_li.png" class="img-fluid" alt=""></a></li>
                           <li><a href="#"><img src="assets/images/icon_yt.png" class="img-fluid" alt=""></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>



<div id="cookies-popup" class="cookies-popup">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-9">
						<div class="popup-content">
							<p>We use cookies on our website to give you the most relevant experience by remembering your preferences and repeat visits. By clicking “Accept”, you consent to the use of ALL the cookies.</p>
						</div>
				  </div>
					<div class="col-lg-3 text-right">
					<a href="#" data-toggle="modal" data-target="#cookieModalCenter">Cookie Settings</a>
						<button id="accept-cookies">Accept</button>
						
						
					</div>
				</div>
			</div>
    </div>


<!-- Bootstrap JavaScript -->

<!-- Popper JS -->
<script src="{{ asset('assets/js/bootstrap/popper.min.js') }}"></script>
<!-- Latest compiled JavaScript -->
<script src="{{ asset('assets/js/bootstrap/bootstrap.min.js') }}"></script>
<!-- Jequery -->
<script src="{{ asset('assets/js/aos/jquery-3.4.1.html') }}"></script>
<!-- owl-carousel java script -->
<script src="{{ asset('assets/js/owl-carousel/owl.carousel.js') }}"></script>
<!-- Swiper JS -->
<script src="{{ asset('assets/js/swiper/swiper.min.js') }}"></script>
<!-- Plugins JavaScripts -->
<script src="{{ asset('assets/js/plugins/plugins.js') }}"></script>






<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>




<!--Cookies read more start-->

<script>
	$(document).ready(function() {
  $("#cookies-toggle").click(function() {
    var elem = $("#cookies-toggle").text();
    if (elem == "Read More") {
      //Stuff to do when btn is in the read more state
      $("#cookies-toggle").text("Read Less");
      $("#cookies-text").slideDown();
    } else {
      //Stuff to do when btn is in the read less state
      $("#cookies-toggle").text("Read More");
      $("#cookies-text").slideUp();
    }
  });
});
</script>

<!--Cookies read more End-->





<script>
	$('.seconddate-toggle').click(function() {
  $('.seconddate').slideToggle();
  if ($('.seconddate-toggle').text() == "+ Enter different dates per applicant")
  
   {
    $(this).text("− Make dates same for all applicants")
  } else {
    $(this).text("+ Enter different dates per applicant")
  }
});


function couplePolicyValidateAge1() {
    var ageInput = document.getElementById('couplepolicy1');
    var errorDiv = document.getElementById('errorcouplepolicy1');
    var inputValue = parseInt(ageInput.value);

    if (isNaN(inputValue) || inputValue < 40) {
        errorDiv.textContent = 'age1 must be greater than 39';
    } else {
        errorDiv.textContent = '';
    }
}
function couplePolicyValidateAge2() {
    var ageInput = document.getElementById('couplepolicy2');
    var errorDiv = document.getElementById('errorcouplepolicy2');
    var inputValue = parseInt(ageInput.value);

    if (isNaN(inputValue) || inputValue < 40) {
        errorDiv.textContent = 'age1 must be greater than 39';
    } else {
        errorDiv.textContent = '';
    }
}
function singleCoverageValidateAge() {
    var ageInput = document.getElementById('ageInput');
    var errorDiv = document.getElementById('errorDiv');
    var inputValue = parseInt(ageInput.value);

    if (isNaN(inputValue) || inputValue <= 39) {
        errorDiv.textContent = 'Age must be a number and greater than 39';
        $(".ageInput").css('border-color', 'red'); // Set border color to red when there's an error
    } else {
        errorDiv.textContent = '';
        $(".ageInput").css('border-color', ''); // Reset border color when there's no error
    }
}


</script>


<script>
// 	$('.otheramt-toggle').click(function() {
//     $('.otheramt').slideToggle();
//     if ($(this).text() == "+ Enter different coverage amount per applicant") {
//         $('.amt_type').val(1);
//         // $(this).removeClass('otheramt-toggle');
//         $(this).removeClass('visitor_visa_couple_coverage1');

//         $(this).text("− Make coverage amount same for all applicants");
//     } else {
//         $('.amt_type').val(0);
//         // $(this).addClass('otheramt-toggle');
//         $(this).addClass('visitor_visa_couple_coverage1');

//         $(this).text("+ Enter different coverage amount per applicant");
//     }
// });


// single coverage
function singleCoverageUpdateEndDate() {
    var startDateInput = $('.startDate').val();  // Use .val() to get the value
    var endDateInput = $('.endDate').val();
    var endFormattedDateLabel = $('.endFormattedDateLabel').text();  // Use .text() to get the text content
    var startDateValue = startDateInput;
    var endDate = new Date(startDateValue);
    endDate.setDate(endDate.getDate() + 365);  // Add 365 days
    var endYear = endDate.getFullYear();
    var endMonth = endDate.getMonth() + 1;
    var endDay = endDate.getDate();

    if (endMonth < 10) {
        endMonth = '0' + endMonth;
    }

    if (endDay < 10) {
        endDay = '0' + endDay;
    }

    var formattedEndDate = `${endYear}-${endMonth}-${endDay}`;
    $('.endDate').val(formattedEndDate);  // Use .val() to set the value

    var formattedEndLabel = `${endDay}-${endMonth}-${endYear}`;
    $('.endFormattedDateLabel').text(`MM-DD-YYYY format: ${formattedEndLabel}`);  // Use .text() to set the text content
}
$('.startDate').change(singleCoverageUpdateEndDate);
singleCoverageUpdateEndDate();

// couple policy

function couplePolicyUpdateEndDate1() {
    var startDateInput = $('.CoupleStartDate1').val();  // Use .val() to get the value
    // alert(startDateInput);
    var endDateInput = $('.coupleEndDate1').val();
    var endFormattedDateLabel = $('.endFormattedDateLabel1').text();  // Use .text() to get the text content

    var startDateValue = startDateInput;
    var endDate = new Date(startDateValue);
    endDate.setDate(endDate.getDate() + 365);  // Add 365 days

    var endYear = endDate.getFullYear();
    var endMonth = endDate.getMonth() + 1;
    var endDay = endDate.getDate();

    if (endMonth < 10) {
        endMonth = '0' + endMonth;
    }

    if (endDay < 10) {
        endDay = '0' + endDay;
    }

    var formattedEndDate = `${endYear}-${endMonth}-${endDay}`;
    $('.coupleEndDate1').val(formattedEndDate);  // Use .val() to set the value

    var formattedEndLabel = `${endDay}-${endMonth}-${endYear}`;
    $('.endFormattedDateLabel1').text(`MM-DD-YYYY format: ${formattedEndLabel}`);  // Use .text() to set the text content
}
$('.CoupleStartDate1').change(couplePolicyUpdateEndDate1);
couplePolicyUpdateEndDate1();
function couplePolicyUpdateEndDate2() {
    var startDateInput = $('.CoupleStartDate2').val();  // Use .val() to get the value
    // alert(startDateInput);
    var endDateInput = $('.coupleEndDate2').val();
    var endFormattedDateLabel = $('.endFormattedDateLabel2').text();  // Use .text() to get the text content

    var startDateValue = startDateInput;
    var endDate = new Date(startDateValue);
    endDate.setDate(endDate.getDate() + 365);  // Add 365 days

    var endYear = endDate.getFullYear();
    var endMonth = endDate.getMonth() + 1;
    var endDay = endDate.getDate();

    if (endMonth < 10) {
        endMonth = '0' + endMonth;
    }

    if (endDay < 10) {
        endDay = '0' + endDay;
    }

    var formattedEndDate = `${endYear}-${endMonth}-${endDay}`;
    $('.coupleEndDate2').val(formattedEndDate);  // Use .val() to set the value

    var formattedEndLabel = `${endDay}-${endMonth}-${endYear}`;
    $('.endFormattedDateLabel2').text(`MM-DD-YYYY format: ${formattedEndLabel}`);  // Use .text() to set the text content
}
$('.CoupleStartDate2').change(couplePolicyUpdateEndDate2);
couplePolicyUpdateEndDate2();
$("#singledob").datepicker({ dateFormat:'dd/mm/yy'});

</script>

<script>
  function calculateYearsDifference(startDate, endDate) {
    // Calculate the difference in milliseconds
    var timeDifference = endDate.getTime() - startDate.getTime();

    // Convert milliseconds to years
    var yearsDifference = timeDifference / (1000 * 60 * 60 * 24 * 365.25);

    // Round down to the nearest whole number
    yearsDifference = Math.floor(yearsDifference);

    return yearsDifference;
}
  $(document).ready(function() {
    
      $('.singledob').change(function() {
        var selectedDate = $('.singledob').val();


        var startDate = new Date(selectedDate);
        var endDate = new Date(); // current date
        var result = calculateYearsDifference(startDate, endDate);
        // $("#error-message").text("");
        //   $(".singledob").css('border-color', '');
        if(result>120){
          $("#error-message").text("Age must be less than 120 ");
          $(".singledob").css('border-color', 'red');
          $(".ageInput").css('border-color', 'red');
          console.log(result + " years");
          $('.ageInput').val(result);

        }else{
          $("#error-message").text("");
          $(".singledob").css('border-color', '');
          $(".ageInput").css('border-color', '');
          $('.ageInput').val(result);


        }

      });
      // visitor couple policy
      $('.visitor-single-pilicy-start-date, .visitor-single-pilicy-end-date').change(function() {
            var startDate = new Date($('.visitor-single-pilicy-start-date').val());
            var endDate = new Date($('.visitor-single-pilicy-end-date').val());

            if (!isNaN(startDate.getTime()) && !isNaN(endDate.getTime())) {
                var differenceInMilliseconds = endDate - startDate;
                var differenceInDays = differenceInMilliseconds / (1000 * 3600 * 24);
                $('.visitor-couple-single-day').val(differenceInDays+1);
            } 
        });
      $('.visitor-couple-start-date1, .visitor-couple-end-date1').change(function() {
            var startDate = new Date($('.visitor-couple-start-date1').val());
            var endDate = new Date($('.visitor-couple-end-date1').val());

            if (!isNaN(startDate.getTime()) && !isNaN(endDate.getTime())) {
                var differenceInMilliseconds = endDate - startDate;
                var differenceInDays = differenceInMilliseconds / (1000 * 3600 * 24);
                $('.visitor-couple-days1').val(differenceInDays+1);
            } 
        });
      $('.visitor-couple-start-date2, .visitor-couple-end-date2').change(function() {
            var startDate = new Date($('.visitor-couple-start-date2').val());
            var endDate = new Date($('.visitor-couple-end-date2').val());

            if (!isNaN(startDate.getTime()) && !isNaN(endDate.getTime())) {
                var differenceInMilliseconds = endDate - startDate;
                var differenceInDays = differenceInMilliseconds / (1000 * 3600 * 24);
                $('.visitor-couple-days2').val(differenceInDays+1);
            } 
        });


        $('.visitor-couple-policy-date1').change(function() {
          var providedDate = new Date($('.visitor-couple-policy-date1').val());
          if (!isNaN(providedDate.getTime())) {
              // Calculate the difference in years
              var currentDate = new Date();
              var differenceInYears = currentDate.getFullYear() - providedDate.getFullYear();
              $('.visitor-couple-policy-year1').val(differenceInYears);
          }
        });
        $('.visitor-couple-policy-date2').change(function() {
          var providedDate = new Date($('.visitor-couple-policy-date2').val());
          if (!isNaN(providedDate.getTime())) {
              // Calculate the difference in years
              var currentDate = new Date();
              var differenceInYears = currentDate.getFullYear() - providedDate.getFullYear();
              $('.visitor-couple-policy-year2').val(differenceInYears);
          }
        });
        $('.super-visa-couple-date1').change(function() {
          var providedDate = new Date($('.super-visa-couple-date1').val());
          if (!isNaN(providedDate.getTime())) {
              // Calculate the difference in years
              var currentDate = new Date();
              var differenceInYears = currentDate.getFullYear() - providedDate.getFullYear();
              $('.super-visa-couple-age1').val(differenceInYears);
          }
        });
        $('.super-visa-couple-date2').change(function() {
          
          var providedDate = new Date($('.super-visa-couple-date2').val());
          if (!isNaN(providedDate.getTime())) {
              // Calculate the difference in years
              var currentDate = new Date();
              var differenceInYears = currentDate.getFullYear() - providedDate.getFullYear();
              $('.super-visa-couple-age2').val(differenceInYears);
          }
        });
        // super visa couple
        $('.super-couple-deductible-amt,.super-couple-coverage-amt1,.super-couple-coverage-amt2,input[name=super_couple_exit1],input[name=super_couple_exit2]').on('change', function() {
          <?php 
          $data = request()->all();
           
          ?>
          var data = <?php echo json_encode($data); ?>;
          var deductible = $('.super-couple-deductible-amt').val();
          // alert(deductible);
          var coverage1 = $('.super-couple-coverage-amt1').val();
          var coverage2 = $('.super-couple-coverage-amt2').val();
          var check_exit1 = $('input[name=super_couple_exit1]:checked').val();
          var check_exit2 = $('input[name=super_couple_exit2]:checked').val();
          console.log(data);
          window.location.href ="https://greenberrysignature.co.in/policymarket/public/super-visa-post?visa_type="+data.visa_type+"&super_visa_couple_birth1="+data.super_visa_couple_birth1+"&super_visa_couple_age1="+data.super_visa_couple_age1+"&super_visa_couple_birth2="+data.super_visa_couple_birth2+"&super_visa_couple_age2="+data.super_visa_couple_age2+"&super_visa_couple_start_date1="+data.super_visa_couple_start_date1+"&super_visa_couple_end_date1="+data.super_visa_couple_end_date1+"&super_visa_couple_days1="+data.super_visa_couple_days1+"&super_visa_couple_start_date2="+data.super_visa_couple_start_date2+"&super_visa_couple_end_date2="+data.super_visa_couple_end_date2+"&super_visa_couple_days2="+data.super_visa_couple_days2+"&super_visa_couple_coverage1="+coverage1+"&super_visa_couple_coverage2="+coverage2+"&detectible_amount="+deductible+"&super_visa_couple_exit1="+check_exit1+"&super_visa_couple_exit2="+check_exit2+"&coverage_check="+data.coverage_check+"";
      });
      // visitor 
      $('.visitor-family-policy-date1').change(function() {
          var providedDate = new Date($('.visitor-family-policy-date1').val());
          if (!isNaN(providedDate.getTime())) {
              // Calculate the difference in years
              var currentDate = new Date();
              var differenceInYears = currentDate.getFullYear() - providedDate.getFullYear();
              $('.visitor-family-policy-year1').val(differenceInYears);
          }
        });
        $('.visitor-family-policy-date2').change(function() {
          var providedDate = new Date($('.visitor-family-policy-date2').val());
          if (!isNaN(providedDate.getTime())) {
              // Calculate the difference in years
              var currentDate = new Date();
              var differenceInYears = currentDate.getFullYear() - providedDate.getFullYear();
              $('.visitor-family-policy-year2').val(differenceInYears);
          }
        });
        $('.visitor-family-start-date, .visitor-family-end-date').change(function() {
            var startDate = new Date($('.visitor-family-start-date').val());
            var endDate = new Date($('.visitor-family-end-date').val());

            if (!isNaN(startDate.getTime()) && !isNaN(endDate.getTime())) {
                var differenceInMilliseconds = endDate - startDate;
                var differenceInDays = differenceInMilliseconds / (1000 * 3600 * 24);
                $('.visitor-family-days').val(differenceInDays+1);
            } 
        });
        $('.visitor-single-deductible-amt,.visitor-single-coverage-amt,input[name=visitor_single_exit]').on('change', function() {
        var deductible = $('.visitor-single-deductible-amt').val();
        var coverage = $('.visitor-single-coverage-amt').val();
        var check_exit = $('input[name=visitor_single_exit]:checked').val();

        // Get the CSRF token
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        // AJAX request with CSRF token
        $.ajax({
          type: 'POST',
          url: 'visitor-single-coverage-deductatble-get-quotation',  // Replace with your controller URL
          data: {
            deductible: deductible,
            coverage: coverage,
            check_exit: check_exit
          },
          headers: {
            'X-CSRF-TOKEN': csrfToken
          },
          success: function(response) {
            console.log(response);
            window.location.href = 'visitor-single-deductable-quotation';
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.error('AJAX request failed:', textStatus, errorThrown);
          }
        });
      });
      $('.visitor-couple-deductible-amt,.visitor-couple-coverage-amt1,.visitor-couple-coverage-amt2,input[name=visitor_couple_exit1],input[name=visitor_couple_exit2]').on('change', function() {
        <?php 
          $data = request()->all();
           
          ?>
          var data = <?php echo json_encode($data); ?>;
        var deductible = $('.visitor-couple-deductible-amt').val();
        var coverage1 = $('.visitor-couple-coverage-amt1').val();
        var coverage2 = $('.visitor-couple-coverage-amt2').val();
        var check_exit1 = $('input[name=visitor_couple_exit1]:checked').val();
        var check_exit2 = $('input[name=visitor_couple_exit2]:checked').val();
        console.log(data);
        window.location.href ="https://greenberrysignature.co.in/policymarket/public/visitor-couple-coverage-quotation?visa_type="+data.visa_type+"&detectible_amount="+deductible+"&visitor_visa_couple_birth1="+data.visitor_visa_couple_birth1+"&visitor_visa_couple_age1="+data.visitor_visa_couple_age1+"&visitor_visa_couple_birth2="+data.visitor_visa_couple_birth2+"&visitor_visa_couple_age2="+data.visitor_visa_couple_age2+"&visitor_visa_couple_start_date1="+data.visitor_visa_couple_start_date1+"&visitor_visa_couple_end_date1="+data.visitor_visa_couple_end_date1+"&visitor_visa_couple_days1="+data.visitor_visa_couple_days1+"&visitor_visa_couple_start_date2="+data.visitor_visa_couple_start_date2+"&visitor_visa_couple_end_date2="+data.visitor_visa_couple_end_date2+"&visitor_visa_couple_days2="+data.visitor_visa_couple_days2+"&visitor_visa_couple_coverage1="+coverage1+"&visitor_visa_couple_coverage2="+coverage2+"&visitor_visa_couple_exit1="+check_exit1+"&visitor_visa_couple_exit2="+check_exit2+"&coverage_check="+data.coverage_check+"";
      });
// visitor family 
    $('.visitor_family_deductible,.visitor_family_coverage_amt,input[name=visitor_family_exit]').on('change', function() {
      // alert("hello");
        <?php 
          $data = request()->all();
        ?>
        var data = <?php echo json_encode($data); ?>;
        var deductible = $('.visitor_family_deductible').val();
        var coverage = $('.visitor_family_coverage_amt').val();
        var check_exit = $('input[name=visitor_family_exit]:checked').val();
        window.location.href ="https://greenberrysignature.co.in/policymarket/public/visitor-family-coverage-quotation?visa_type="+data.visa_type+"&visitor_type="+data.visitor_type+"&visitor_family_deductible="+deductible+"&visitor_family_policy_date1="+data.visitor_family_policy_date1+"&visitor_family_policy_year1="+data.visitor_family_policy_year1+"&visitor_family_policy_date2="+data.visitor_family_policy_date2+"&visitor_family_policy_year2="+data.visitor_family_policy_year2+"&visitor_family_start_date="+data.visitor_family_start_date+"&visitor_family_end_date="+data.visitor_family_end_date+"&visitor_family_days="+data.visitor_family_days+"&visitor_family_coverage_amt="+coverage+"&visitor_family_exit="+check_exit+"";
      });
    });
</script>

<!--Our Partners start-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script>

	$(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 2
            }
        }]
    });
});
</script>

<!--Our Partners End-->

<script>
	$(window).scroll(function(){
    if ($(window).scrollTop() >= 300) {
        $('.navbar').addClass('fixed-header');
    }
    else {
        $('.navbar').removeClass('fixed-header');
    }
});
</script>

<!--Read More Start-->

<script>
	$(document).ready(function() {
  $("#toggle").click(function() {
    var elem = $("#toggle").text();
    if (elem == "Read More") {
      //Stuff to do when btn is in the read more state
      $("#toggle").text("Read Less");
      $("#text").slideDown();
    } else {
      //Stuff to do when btn is in the read less state
      $("#toggle").text("Read More");
      $("#text").slideUp();
    }
  });
});
</script>

<!--Read More End-->


<!--Text Email Start-->
<script>
$(document).ready(function () {
    $("#EmailBtn").click(function () {
        $("#HiddnData").show();
		$("#EmailBtn").hide();
    });	
	$("#DismissBtn").click(function () {
        $("#HiddnData").hide();
		$("#EmailBtn").show();
    });

});
</script>
<!--Text Email Start End-->

<script>
	$(document).ready(function() {
  $("#myInput").on('input', function() {
    // Check if the input value is a digit
    if (/^\d+$/.test($(this).val())) {
      $("#WhtsBtn").show();
    } else {
      $("#WhtsBtn").hide();
    }
  });
});
</script>


<!--Cookies Js Start-->


<script>
    $(document).ready(function () {
        if (localStorage.getItem('cookies-accepted') !== 'true') {
            $('#cookies-popup').show();
        }

        $('#accept-cookies').click(function () {
            localStorage.setItem('cookies-accepted', 'true');
            $('#cookies-popup').hide();
        });
    });
</script>

<!--Cookies Js End-->


<!--Form Field Hidden Data Start-->

<script>
$(document).ready(function () {
    $("#Address").click(function () {
        $("#AddressDetail").toggle();
		
		
		var icon = $(this).find('i');

        if (icon.hasClass('fa-question-circle-o')) {
		
            icon.removeClass('fa-question-circle-o').addClass('fa-close');
        } else {
            
            icon.removeClass('fa-close').addClass('fa-question-circle-o');
        }
		
		
    });	
	
	$("#ArrDate").click(function () {
        $("#ArrDateDetail").toggle();
		
		var icon = $(this).find('i');

        if (icon.hasClass('fa-question-circle-o')) {
            
            icon.removeClass('fa-question-circle-o').addClass('fa-close');
        } else {
            
            icon.removeClass('fa-close').addClass('fa-question-circle-o');
        }
		
    });
	
	$("#CntryName").click(function () {
        $("#CountryDetail").toggle();
		
		var icon = $(this).find('i');

        if (icon.hasClass('fa-question-circle-o')) {
            
            icon.removeClass('fa-question-circle-o').addClass('fa-close');
        } else {
            
            icon.removeClass('fa-close').addClass('fa-question-circle-o');
        }
		
    });
	
	$("#BenName").click(function () {
        $("#BenNameDetail").toggle();
		
		var icon = $(this).find('i');

        if (icon.hasClass('fa-question-circle-o')) {
           
            icon.removeClass('fa-question-circle-o').addClass('fa-close');
        } else {
            
            icon.removeClass('fa-close').addClass('fa-question-circle-o');
        }
		
    });
	
	
	
});
</script>

<!--Form Field Hidden Data End-->


<!--Accordian Start-->

<script>
var acc = document.getElementsByClassName("accordion");
var i;
for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>

<!--Accordian End-->



<!--Cookie Popup Start-->
<script>
$(document).ready(function() {
  // Add an event listener for the input field
  $(".ageInput").on("input", function() {
    $('.singledob').val("");
    // Get the current value of the input field
    var inputValue = $(this).val();
    var numericValue = parseFloat(inputValue);

    // Check if the value is greater than or equal to 120
    if (numericValue > 120) {
      // If it is, set the value to 119 (or any other maximum value you want)
      $(this).val(120);
    }
  });
//************************couple date of birth calculation************************************ */
$('.super-visa-couple-date1').change(function() {
        var selectedDate = $('.super-visa-couple-date1').val();
        var age = $('.super-visa-couple-age1').val();
        // alert(age);

        var startDate = new Date(selectedDate);
        var endDate = new Date(); // current date
        var result = calculateYearsDifference(startDate, endDate);
        // $("#error-message").text("");
        //   $(".singledob").css('border-color', '');
        if(result>120 || age<39){
          $("#super-visa-couple-date1-error").text("Age must be greater than 39 and less than 120 ");
          $(".super-visa-couple-date1").css('border-color', 'red');
          $(".super-visa-couple-age1").css('border-color', 'red');
          console.log(result + " years");
          $('.super-visa-couple-age1').val(result);

        }else{
          $("#super-visa-couple-date1-error").text("");
          $(".super-visa-couple-date1").css('border-color', '');
          $(".super-visa-couple-age1").css('border-color', '');
          $('.super-visa-couple-age1').val(result);


        }

      });
      $('.super-visa-couple-date2').change(function() {
        var selectedDate = $('.super-visa-couple-date2').val();
        var age = $('.super-visa-couple-age2').val();
        // alert(age);

        var startDate = new Date(selectedDate);
        var endDate = new Date(); // current date
        var result = calculateYearsDifference(startDate, endDate);
        // $("#error-message").text("");
        //   $(".singledob").css('border-color', '');
        if(result>120 || age<39){
          $("#super-visa-couple-date2-error").text("Age must be greater than 39 and less than 120 ");
          $(".super-visa-couple-date2").css('border-color', 'red');
          $(".super-visa-couple-age2").css('border-color', 'red');
          console.log(result + " years");
          $('.super-visa-couple-age2').val(result);

        }else{
          $("#super-visa-couple-date1-error").text("");
          $(".super-visa-couple-date2").css('border-color', '');
          $(".super-visa-couple-age2").css('border-color', '');
          $('.super-visa-couple-age2').val(result);


        }

      });


      $('.super-visa-couple-age2').on('keyup', function() {
        $('.super-visa-couple-date2').val('');
        // alert("hekk");
        var selectedDate = $('.super-visa-couple-age2').val();
        if(selectedDate>120 || selectedDate<39){
          $("#super-visa-couple-date2-error").text("Age must be greater than 39 and less than 120 ");
          $(".super-visa-couple-date2").css('border-color', 'red');
          $(".super-visa-couple-age2").css('border-color', 'red');
          console.log(selectedDate + " years");
          $('.super-visa-couple-age2').val(selectedDate);

        }else{
          $("#super-visa-couple-date2-error").text("");
          $(".super-visa-couple-date2").css('border-color', '');
          $(".super-visa-couple-age2").css('border-color', '');
          $('.super-visa-couple-age2').val(selectedDate);


        }
      });
      $('.super-visa-couple-age1').on('keyup', function() {
        $('.super-visa-couple-date1').val('');
        var selectedDate = $('.super-visa-couple-age1').val();
        if(selectedDate>120 || selectedDate<39){
          $("#super-visa-couple-date1-error").text("Age must be greater than 39 and less than 120 ");
          $(".super-visa-couple-date1").css('border-color', 'red');
          $(".super-visa-couple-age1").css('border-color', 'red');
          console.log(selectedDate + " years");
          $('.super-visa-couple-age1').val(selectedDate);

        }else{
          $("#super-visa-couple-date1-error").text("");
          $(".super-visa-couple-date1").css('border-color', '');
          $(".super-visa-couple-age1").css('border-color', '');
          $('.super-visa-couple-age1').val(selectedDate);


        }
      });





});
$(".formsubmit1").submit(function(event) {
    var selectedDate = parseInt($('.ageInput').val());

    if (selectedDate < 121  && selectedDate > 39) {
        // Allow form submission if the selected date is less than 120
        console.log("Form submitted!");
    } else {
        // Prevent form submission if the selected date is greater than or equal to 120
        event.preventDefault();
        console.log("Form submission prevented. Selected date is 120 or greater.");
    }
});
$(".formsubmit2").submit(function(event) {
    var age1 = parseInt($('.super-visa-couple-age1').val());
    var age2 = parseInt($('.super-visa-couple-age2').val());

    if ((age1 < 121 && age1>39)  && (age2 < 121 && age2>39)) {
        // Allow form submission if the selected date is less than 120
        console.log("Form submitted!");
    } else {
        // Prevent form submission if the selected date is greater than or equal to 120
        event.preventDefault();
        console.log("Form submission prevented. Selected date is 120 or greater.");
    }
});





      
</script>

<div class="modal fade cookies-model" id="cookieModalCenter" tabindex="-1" role="dialog" aria-labelledby="cookieModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cookieModalCenterTitle">Privacy Overview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<p>This website uses cookies to improve your experience while you navigate through the website. Out of these cookies, the cookies that are categorized as necessary are stored on your browser as they are essential for the working of basic functionalities of the website. </p>
        
<span id="cookies-text">
<p>We also use third-party cookies that help us analyze and understand how you use this website. These cookies will be stored in your browser only with your consent. You also have the option to opt-out of these cookies. But opting out of some of these cookies may have an effect on your browsing experience.</p>
</span>
        
<div class="btn-container">
<button id="cookies-toggle">Read More</button>
</div>


<div class="accordion" id="accordionExample">
          <div class="card">
            <div class="card-header" id="headingOne">
              <h2>
                <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseTwo"> Necessary </button>
                <span class="Enable">Always Enabled</span>
              </h2>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body">
                <p>Necessary cookies are absolutely essential for the website to function properly. This category only includes cookies that ensures basic functionalities and security features of the website. These cookies do not store any personal information.</p></div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingTwo">
              <h2>
                <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Non-necessary </button>
                    <!-- Default checked -->
<div class="custom-control custom-switch Enable">
  <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
  <label class="custom-control-label" for="customSwitch1">Enabled</label>
</div>
              </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
              <div class="card-body">
                <p>Any cookies that may not be particularly necessary for the website to function and is used specifically to collect user personal data via analytics, ads, other embedded contents are termed as non-necessary cookies. It is mandatory to procure user consent prior to running these cookies on your website.</p>
              </div>
            </div>
          </div>
          
          
          
        </div>

       
       <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary" id="accept-cookies">Save & Accept</button>
      </div>
      
    </div>
  </div>
</div>
<!--Cookie Popup End-->




</body>
</html>
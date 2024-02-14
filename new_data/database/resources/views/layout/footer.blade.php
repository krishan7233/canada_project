
<!-- Bootstrap JavaScript -->
<!-- jQuery library -->
<script src="{{ asset('assets/js/bootstrap/jquery.min.js') }}"></script>
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
</script>



<script>
	$('.otheramt-toggle').click(function() {
  $('.otheramt').slideToggle();
  if ($('.otheramt-toggle').text() == "+ Enter different coverage amount per applicant")
  
   {
    $(this).text("− Make coverage amount same for all applicants")
  } else {
    $(this).text("+ Enter different coverage amount per applicant")
  }
});
</script>

<script>
	$("#singledob").datepicker({ dateFormat:'dd/mm/yy'});
</script>


<script>
  @if(Session::has('message'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('message') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.warning("{{ session('warning') }}");
  @endif
</script>
</body>
</html>
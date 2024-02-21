<!doctype html>
<html class="no-js" lang="">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Visa</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{asset('auth/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('auth/css/fontawesome-all.min.css')}}">
	<link rel="stylesheet" href="{{asset('auth/font/flaticon.css')}}">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('auth/style.css')}}">
	<script src="{{asset('auth/sweetalert.min.js')}}"></script>
	<script src="{{asset('auth/jquery/3.6.1/jquery.min.js')}}"></script>
    
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
	
</head>
<body>
    <div id="preloader" class="preloader">
        <div class='inner'>
            <div class='line1'></div>
            <div class='line2'></div>
            <div class='line3'></div>
        </div>
    </div>
	<section class="fxt-template-animation fxt-template-layout14">
		<div class="container">
			<div class="row align-items-center justify-content-center">
				<div class="col-xl-6 col-lg-7 col-sm-12 col-12 fxt-bg-color">
					<div class="fxt-content">
						<div class="fxt-header">
							<p>Login into your pages account</p>
							<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
	<div class="alert alert-danger alert-dismissible" id="error" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
						</div>
						<div class="fxt-form">
							<form method="POST" action="{{ route('admin-login-post') }}" >
							@csrf
								<div class="form-group">
									<div class="fxt-transformY-50 fxt-transition-delay-1">
									<input class="form-control" type="text" placeholder="Enter email" name="email" id="email" value="{{ old('email') }}">
									</div>

								</div>
								<div class="form-group">
									<div class="fxt-transformY-50 fxt-transition-delay-2">
										<input id="password" type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" placeholder="********" required="required">
										<i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
									</div>

								</div>
								<div class="form-group">
									<div class="fxt-transformY-50 fxt-transition-delay-3">
										<div class="fxt-checkbox-area">
											<div class="checkbox">
												<input id="checkbox1" type="checkbox">
												<label for="checkbox1">Keep me logged in</label>
											</div>
											<a href="#" class="switcher-text">Forgot Password</a>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="fxt-transformY-50 fxt-transition-delay-4">
										<button type="submit" id="butlogin" name="butlogin" class="fxt-btn-fill">Log in</button>
										<!-- <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Log In</button> -->
									</div>
								</div>
							</form>
						</div>
					
                    </div>
				</div>
			</div>
		</div>
	</section>
    <!-- jquery-->
	<script src="{{asset('auth/js/jquery-3.5.0.min.js')}}"></script>
	<!-- Bootstrap js -->
	<script src="{{asset('auth/js/bootstrap.min.js')}}"></script>
	<!-- Imagesloaded js -->
	<script src="{{asset('auth/js/imagesloaded.pkgd.min.js')}}"></script>
	<!-- Validator js -->
	<script src="{{asset('auth/js/validator.min.js')}}"></script>
	<!-- Custom Js -->
	<script src="{{asset('auth/js/main.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>


    @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
    @endif
  
  
    @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}");
    @endif
  
  
    @if(Session::has('warning'))
            toastr.warning("{{ Session::get('warning') }}");
    @endif
  
  
    @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
    @endif
  
  
  </script>

    </body>


<!-- Mirrored from deepakwebit.in/rathore/Admin/Login/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Jun 2023 18:13:33 GMT -->
</html>
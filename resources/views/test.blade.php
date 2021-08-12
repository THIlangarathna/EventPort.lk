<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <!-- Google Fonts -->
	 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

	<link rel="icon" type="image/png" href="loginassets/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="loginassets/vendor/bootstrap/css/bootstrap.min.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="loginassets/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="loginassets/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="loginassets/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="loginassets/css/util.css">
	<link rel="stylesheet" type="text/css" href="loginassets/css/main.css">
	  <!-- Vendor CSS Files -->
	  <link href="Nav/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	  <link href="Nav/vendor/icofont/icofont.min.css" rel="stylesheet">
	
	  <!-- Template Main CSS File -->
	  <link href="Nav/css/style.css" rel="stylesheet">

</head>
<body>
  
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container-fluid d-flex">

      <div class="logo mr-auto">
        
        
        <a href="/"><img src="Nav/img/Untitled-3.png" alt="" class="img-fluid"></a>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="/">Home</a></li>
          <li><a href="/#about">About Us</a></li>
          <li><a href="/#services">Services</a></li>
          <li><a href="/#portfolio">Events</a></li>
          <li><a href="/#contact">Contact Us</a></li>

          <li class="get-started"><a href="register">Register</a></li>
        </ul>
      </nav>
      <!-- .nav-menu -->

    </div>
  </header>
  <!-- End Header -->
	<!--======================log in======================-->	
	<main id="main">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100" style="height:450px;">
				<div class="login101-pic js-tilt" style="padding-bottom:150px;" data-tilt>
					<img src="loginassets/images/forgot.svg" alt="IMG">
				</div>

				<form method="POST" action="{{ route('password.email') }}" class="login100-form validate-form" style="padding-top:40px;">
                        @csrf
                        
					
					<span class="login100-form-title">
						<h3>Reset Password</h3>
                    </span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100 @error('email') is-invalid @enderror" type="text" name="email" placeholder="Email">
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            {{ __('Send Password Reset Link') }}
						</button>
					</div>

					<div class="text-center p-t-20">
						<a class="txt2" href="register">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>
	
<!--======================end log in======================-->	

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container py-3">
      <div class="copyright">
        &copy; Copyright <strong><span>Event Port</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
       
     
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
	
	

	
<!--===============================================================================================-->	
	<script src="loginassets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="loginassets/vendor/bootstrap/js/popper.js"></script>
	<script src="loginassets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="loginassets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="loginassets/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="loginassets/js/main.js"></script>
	
  <!-- Vendor JS Files -->
  <script src="Nav/vendor/jquery/jquery.min.js"></script>
  <script src="Nav/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="Nav/js/main.js"></script>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Request Permission</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <!-- Google Fonts -->
	 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

	<link rel="icon" type="image/png" href="Adminreq/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="Adminreq/vendor/bootstrap/css/bootstrap.min.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="Adminreq/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="Adminreq/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="Adminreq/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="Adminreq/css/util.css">
	<link rel="stylesheet" type="text/css" href="Adminreq/css/main.css">
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
        
        
        <a href="index.html"><img src="Nav/img/Untitled-3.png" alt="" class="img-fluid"></a>
      </div>

	  <nav class="nav-menu d-none d-lg-block">
	  <ul>
          <li class="active"><a href="/">Home</a></li>
          <li><a href="/myevents">My Events</a></li>
          @guest
          <li class="get-started"><a href="#Login">Create Event</a></li>

                        @else
                            <li class="drop-down">
                                <a href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul>
                                    <li><a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a></li>
                                </ul>
                                    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

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
			
			<div class="wrap-login100">
				<span class="login100-form-title">
					<h3>Requset Permission to Post an Event</h3></span>
					<span class="txt1">
						It will be easy for the Administration to grant you permission if you can fill the following form
					</span>
					<form method="POST" action = "req" enctype="multipart/form-data" class="login100-form validate-form">
						@csrf
					<div class="wrap-input100 " >
						<input class="input100" type="text" name="organizationname" placeholder="Organization or Host Name" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 ">
						<input class="input100" type="text" name="fburl" placeholder="Facebook URL">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-facebook" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100">
						<input class="input100" type="text" name="linkedinurl" placeholder="LinkedIn URL">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-linkedin" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 " >
						<input class="input100" type="text" name="eventcount" placeholder="How many events are you planning to host">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-question" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 " >
						<textarea type="textarea" class="input100" rows="5" name="comments" placeholder="Any Comments" style="padding-left:80px;padding-top:12px;"></textarea>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-comment" aria-hidden="true"></i>
						</span>
					</div>
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Request Permission
						</button>
					</div>
				</form>
				<div class="login100-pic js-tilt" data-tilt>
					<img src="Adminreq/images/img-01.svg" alt="IMG">
				</div>
		
			</div>
		</div>
	</div>
</main>
	
<!--======================end log in======================-->	

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Event Port</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
       
     
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
	
	

	
<!--===============================================================================================-->	
	<script src="Adminreq/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="Adminreq/vendor/bootstrap/js/popper.js"></script>
	<script src="Adminreq/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="Adminreq/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="Adminreq/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="Adminreq/js/main.js"></script>
	
  <!-- Vendor JS Files -->
  <script src="Nav/vendor/jquery/jquery.min.js"></script>
  <script src="Nav/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="Nav/js/main.js"></script>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Edit Event</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <!-- Google Fonts -->
	 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

	<link rel="icon" type="image/png" href="create_event/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="create_event/vendor/bootstrap/css/bootstrap.min.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="create_event/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="create_event/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="create_event/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="create_event/css/util.css">
	<link rel="stylesheet" type="text/css" href="create_event/css/main.css">
	  <!-- Vendor CSS Files -->
	  <link href="Nav/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	  <link href="Nav/vendor/icofont/icofont.min.css" rel="stylesheet">
	
	  <!-- Template Main CSS File -->
	  <link href="Nav/css/style.css" rel="stylesheet">

</head>
<body>
	<header id="header" class="fixed-top">
		<div class="container-fluid d-flex">
	
		  <div class="logo mr-auto">
			
			
			<a href="/"><img src="Nav/img/Untitled-3.png" alt="" class="img-fluid"></a>
		  </div>
	
		  <nav class="nav-menu d-none d-lg-block">
			<ul>
			<li><a href="/">Home</a></li>
          <li><a href="/myevents">My Events</a></li>
          @guest
          <li class="get-started"><a href="#Login">Create Event</a></li>

                        @else
                            <li class="drop-down">
                                <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
				<div class="login100-pic js-tilt" data-tilt>
					<img src="Nav/img/Untitled-3.png" alt="" class="img-fluid">
					<img src="/storage/{{  $data->cover }}" alt="IMG">
				</div>
				<form class="login100-form validate-form" method="POST" action = "/saveevent" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name ="id" value="{{$data->id}}">
					<span class="login100-form-title1">
						<h3> Edit Event</h3>
					</span>
					<div class="wrap-input100 " >
					  <input class="input100" type="text" name="eventname" value="{{$data->eventname}}" placeholder="Event name">
					  <span class="focus-input100"></span>
					  <span class="symbol-input100">
						<i class="fa fa-id-badge" aria-hidden="true"></i>
					  </span>
					</div>

					<div class="wrap-input100 " >
						<textarea id="description" type="textarea" class="input100" rows="5" name="description" value="{{$data->description}}" placeholder="Description" style="padding-left:80px;">{{$data->description}}</textarea>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
						<i class="fa fa-edit" aria-hidden="true"></i>
					  </span>
					  </div>
		  
					<div class="wrap-input100 ">
					  <input class="input100" type="text" name="venue" value="{{$data->venue}}" placeholder="Venue">
					  <span class="focus-input100"></span>
					  <span class="symbol-input100">
						<i class="fa fa-map-marker" aria-hidden="true"></i>
					  </span>
					</div>
					<div class="wrap-input100">
					  <input class="input100" type="date"" name="date" value="{{$data->date}}" placeholder="Date">
					  <span class="focus-input100"></span>
					  <span class="symbol-input100">
						<i class="fa fa-calendar" aria-hidden="true"></i>
					  </span>
					</div>
					<div class="wrap-input100 " >
					  <input class="input100" type="time" name="starttime" value="{{$data->starttime}}" placeholder="Start Time">
					  <span class="focus-input100"></span>
					  <span class="symbol-input100">
						<i class="fa fa-clock-o" aria-hidden="true"></i>
					  </span>
					</div>
					<div class="wrap-input100 " >
					  <input class="input100" type="time" name="endtime" value="{{$data->endtime}}" placeholder="End Time">
					  <span class="focus-input100"></span>
					  <span class="symbol-input100">
						<i class="fa fa-clock-o" aria-hidden="true"></i>
					  </span>
					</div>
					<div class="wrap-input100 " >
					  <input class="input100" id="upload" type="file" name="cover" value="{{$data->cover}}" placeholder="">
					  <span class="focus-input100"></span>
					  <span class="symbol-input100">
						<i class="fa fa-upload" aria-hidden="true"></i>
					  </span>
					</div>
					
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
						Save Event
					  </button>
					</div>
                  </form>
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
	<script src="create_event/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="create_event/vendor/bootstrap/js/popper.js"></script>
	<script src="create_event/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="create_event/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="create_event/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="create_event/js/main.js"></script>
	
  <!-- Vendor JS Files -->
  <script src="Nav/vendor/jquery/jquery.min.js"></script>
  <script src="Nav/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="Nav/js/main.js"></script>

</body>
</html>
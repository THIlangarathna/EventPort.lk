<!DOCTYPE html>
<html lang="en">
<head>
	<title>Event Dashboard</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <!-- Google Fonts -->
	 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

	<link rel="icon" type="image/png" href="vieweve/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vieweve/vendor/bootstrap/css/bootstrap.min.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="vieweve/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vieweve/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vieweve/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vieweve/css/util.css">
	<link rel="stylesheet" type="text/css" href="vieweve/css/main.css">
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
				@foreach ($data as $row)
				<div class="cvr" data-tilt>
					<img src="/storage/{{ $row->cover}}" class="img-fluid" alt="">
				</div>

				<form class="login100-form validate-form">
					<span class="login100-form-title">
						<h3>Event Details</h3>
					</span>

					<div class="wrap-input100 ">
						<labale class="input100">{{$row->eventname}}</lable>						
						<span class="symbol-input100">
							<i class="fa fa-id-badge" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 ">
						<labale class="input100">{{$row->description}}</lable>						
						<span class="symbol-input100">
							<i class="fa fa-edit " aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 ">
						<labale class="input100">{{$row->venue}}</lable>						
						<span class="symbol-input100">
							<i class="fa fa-map-marker" aria-hidden="true"></i>
						</span>
					</div>
				
					<div class="wrap-input100 ">
						<labale class="input100">{{$row->date}}</lable>						
						<span class="symbol-input100">
							<i class="fa fa-calendar" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 ">
						<labale class="input100">{{$row->starttime}}</lable>						
						<span class="symbol-input100">
							<i class="fa fa-clock-o" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 ">
						<labale class="input100">{{$row->endtime}}</lable>						
						<span class="symbol-input100">
							<i class="fa fa-clock-o" aria-hidden="true"></i>
						</span>
					</div>

				
					<span class="login100-form-title1">
						<h3> Event Dashboard</h3>
					</span>
					<div class="btn1">
						<a href="{{route('editevent',['id' => Crypt::encrypt($row->id) ])}}" class="btn-dash-with bg1 m-b-10">
							<i class="fa fa-pencil"></i>
							 Edit Event
						</a>
					</div>
					@endforeach
					@if($forms->count())
								@foreach($forms as $form)
					<div class="btn2">
						<a href="{{route('/ShowForm',['id' => Crypt::encrypt($form->id) ])}}" class="btn-dash-with bg1 m-b-10">
							<i class="fa fa-eye"></i>
							View Form
						</a>
					</div>
					<div class="btn3">
						<a href="{{route('/ViewSubmissions',['id' => Crypt::encrypt($form->id) ])}}" class="btn-dash-with bg1 m-b-10">
						<i class="fa fa-info"></i>
							Submissions
						</a>
					</div>
					<div class="btn4">
						<a href="{{route('/invite',['id' => Crypt::encrypt($form->id) ])}}" class="btn-dash-with bg1 m-b-10">
							<i class="fa fa-envelope "></i>
							Send Invitations
						</a>
					</div>	
					<div class="btn5">
						<a href="{{route('/checkin',['id' => Crypt::encrypt($form->id) ])}}" class="btn-dash-with bg1 m-b-10">
							<i class="fa fa-check-square-o "></i>
							Check In
						</a>
					</div>
					@endforeach
					@endif
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
	<script src="vieweve/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vieweve/vendor/bootstrap/js/popper.js"></script>
	<script src="vieweve/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vieweve/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vieweve/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="vieweve/js/main.js"></script>
	
  <!-- Vendor JS Files -->
  <script src="Nav/vendor/jquery/jquery.min.js"></script>
  <script src="Nav/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="Nav/js/main.js"></script>

</body>
</html>
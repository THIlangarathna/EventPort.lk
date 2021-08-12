<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <!-- Google Fonts -->
	 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

	<link rel="icon" type="image/png" href="tb/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="tb/vendor/bootstrap/css/bootstrap.min.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="tb/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="tb/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="tb/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="tb/css/util.css">
	<link rel="stylesheet" type="text/css" href="tb/css/main.css">
	  <!-- Vendor CSS Files -->
	  <link href="Nav/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	  <link href="Nav/vendor/icofont/icofont.min.css" rel="stylesheet">
	
	  <!-- Template Main CSS File -->
	  <link href="Nav/css/style.css" rel="stylesheet">
	  <script src="{{ asset('vendor/formbuilder/js/footable/js/footable.min.js') }}" defer></script>
	<script src="{{ asset('vendor/formbuilder/js/script.js') }}{{ jazmy\FormBuilder\Helper::bustCache() }}" defer></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/formbuilder/js/footable/css/footable.standalone.min.css') }}">

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
				
					<h3 class="table-title">Send Invitations</h3>
				
				
				<div class="login100-pic" >
					<img src="tb/images/img-01.svg" alt="IMG">
				</div>
				@if($data->count())
				<div class="tb table-responsive">
					<form method="POST" action = "/send" enctype="multipart/form-data">
						{{ csrf_field() }}
						@csrf     
					<table class="table-condensed table-hover table">
					  <thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Name</th>
							<th scope="col">Email</th>
							<th scope="col">Invite</th>
							<th scope="col">Invited</th>
						</tr>
					  </thead>
					  <tbody>
						@foreach ($data as $row)
            				<tr>
            					<td scope="row">{{ $loop->iteration }}</td>
            					<td>{{$row->name}}</td>
            					<td>{{$row->email}}</td>
            					<td><input type="checkbox" name="check[]" id="check[]" class="individual" value="{{$row->email}}"></td>
							<td>
							@if($row->is_invited)
							<button type="button"class="btn btn-success">Invited</button>
							@else
								---
							@endif
						  </td>
          					</tr>
          				@endforeach
					  </tbody>
					</table>
					<button type="submit" class="btn btn-primary float-right">Invite</button>
				</form>
				<input type="checkbox" class="selectall" /> Select All <br>
		  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
		  <script>
		  $(".selectall").click(function () {
			$(".individual").prop("checked", $(this).prop("checked"));
		  });
		  </script>
					</div>
                @else
                    <div class="card-body">
                        <h4 class="text-danger text-center">
                            No submission to display.
                        </h4>
                    </div>  
                @endif
				</div>
			</div>
		</div>
	</div>
</main>
	


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
	<script src="tb/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="tb/vendor/bootstrap/js/popper.js"></script>
	<script src="tb/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="tb/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="tb/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="tb/js/main.js"></script>
	
  <!-- Vendor JS Files -->
  <script src="Nav/vendor/jquery/jquery.min.js"></script>
  <script src="Nav/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="Nav/js/main.js"></script>

</body>
</html>
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
				
					<h3 class="table-title">{{ $pageTitle }} ({{ $submissions->count() }})</h3>
				
				
				<div class="login100-pic" >
					<img src="tb/images/img-01.svg" alt="IMG">
				</div>
				@if($submissions->count())
				<div class="tb table-responsive">          
					<table class="table-condensed table-hover">

					  <thead>
						<tr>
							<th class="five">#</th>
							<th class="fifteen">Name</th>
							@foreach($form_headers as $header)
								<th>{{ $header['label'] ?? ($header['name']) }}</th>
							@endforeach
							<th class="fifteen">Actions</th>
						</tr>
					  </thead>
					  <tbody>
						@foreach($submissions as $submission)
						<tr>
							<td>{{ $loop->iteration }}</td>
                                        <td>{{ $submission->user->name ?? 'n/a' }}</td>
                                        @foreach($form_headers as $header)
                                            <td>
                                                {{ 
                                                    $submission->renderEntryContent(
                                                        $header['name'], $header['type'], true
                                                    ) 
                                                }}
                                            </td>
                                        @endforeach
                                        <td>
                                            <a href="{{route('/ViewSub',['id' => Crypt::encrypt($submission->id) ])}}" class="btn-tb" title="View submission" style="text-decoration:none;">
                                                <i class="fa fa-eye"></i> View
											</a>

                                            <form action="{{ route('formbuilder::forms.submissions.destroy', [$form, $submission]) }}" method="POST" id="deleteSubmissionForm_{{ $submission->id }}" class="d-inline-block p-2">
                                                @csrf 
                                                @method('DELETE')

                                                <button type="submit" class="btn-tb confirm-form" style="text-decoration:none;" data-form="deleteSubmissionForm_{{ $submission->id }}" data-message="Delete this submission?" title="Delete submission">
                                                    <i class="fa fa-trash-o"></i> Delete
                                                </button>
                                            </form>
                                        </td>
							<!--<a href=""><button class="btn-tb"><i class="fa fa-eye"></i>View</button></a>
							<a href=""><button class="btn-tb"><i class="fa fa-trash"></i>Delete</button></a>-->
						  </td>
						</tr>
						@endforeach
					  </tbody>
					</table>
					</div>
					@if($submissions->hasPages())
                        <div class="card-footer mb-0 pb-0">
                            <div>{{ $submissions->links() }}</div>
                        </div>
                    @endif
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
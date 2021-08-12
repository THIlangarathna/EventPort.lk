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
    

    <script type="text/javascript">
		window.FormBuilder = {
			csrfToken: '{{ csrf_token() }}',
		}
	</script>
	<script src="{{ asset('vendor/formbuilder/js/jquery-ui.min.js') }}" defer></script>
	<script src="{{ asset('vendor/formbuilder/js/sweetalert.min.js') }}" defer></script>
	<script src="{{ asset('vendor/formbuilder/js/jquery-formbuilder/form-builder.min.js') }}" defer></script>
	<script src="{{ asset('vendor/formbuilder/js/jquery-formbuilder/form-render.min.js') }}" defer></script>
	<script src="{{ asset('vendor/formbuilder/js/parsleyjs/parsley.min.js') }}" defer></script>
	<script src="{{ asset('vendor/formbuilder/js/clipboard/clipboard.min.js') }}?b=ck24" defer></script>
	<script src="{{ asset('vendor/formbuilder/js/moment.js') }}"></script>
	<!--<script src="{{ asset('vendor/formbuilder/js/footable/js/footable.min.js') }}" defer></script>-->
	<script src="{{ asset('vendor/formbuilder/js/script.js') }}{{ jazmy\FormBuilder\Helper::bustCache() }}" defer></script>
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/formbuilder/js/footable/css/footable.standalone.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/formbuilder/css/styles.css') }}{{ jazmy\FormBuilder\Helper::bustCache() }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



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
			<div class="wrap-login100 col-md-10 justify-content-center">
      <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        {{ $pageTitle ?? '' }}
                    </h5>
                </div>

                <form action="{{ route('formbuilder::forms.store') }}" method="POST" id="createFormForm">
                    @csrf 
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name" class="col-form-label">Form Name</label>

                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Enter Form Name">

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <input type="hidden" name="visibility" id="visibility" class="form-control" required="required" value="PRIVATE">
                                    
                                    
                            <input type ="hidden" name="allows_edit" id="allows_edit" class="form-control" required="required" value="0">
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-info" role="alert">
                                    <i class="fa fa-info-circle"></i> 
                                    Click on or drag and drop components onto the main panel to build your form content.
                                </div>

                                <div id="fb-editor" class="fb-editor"></div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="card-footer" id="fb-editor-footer" style="display: none;">
                    <button type="button" class="btn btn-secondary fb-clear-btn">
                        <i class="fa fa-remove"></i> Clear Form 
                    </button> 
                    <button type="button" class="btn btn-secondary fb-save-btn">
                        <i class="fa fa-save"></i> Submit &amp; Save Form
                    </button>
                </div>
            </div>
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
	
  <script type="text/javascript">
        window.FormBuilder = window.FormBuilder || {}
        window.FormBuilder.form_roles = @json($form_roles);
    </script>
    <script src="{{ asset('vendor/formbuilder/js/create-form.js') }}{{ jazmy\FormBuilder\Helper::bustCache() }}" defer></script>


	
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
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

    <script type="text/javascript">
        window._form_builder_content = {!! json_encode($form->form_builder_json) !!}
    </script>
    <script src="{{ asset('vendor/formbuilder/js/preview-form.js') }}{{ jazmy\FormBuilder\Helper::bustCache() }}" defer></script>
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
			<div class="wrap-login100 col-md-7 float-left mr-3">
            <div class="card rounded-0 col-md-12">
                <div class="card-header">
                    <h5 class="card-title">
                        Form Preview for '{{ $form->name }}' 

                        <div class="btn-toolbar float-md-right" role="toolbar">
                            <div class="btn-group" role="group">
                                <a href="{{route('/ViewSubmissions',['id' => Crypt::encrypt($form->id) ])}}" class="btn btn-primary float-md-right btn-sm">
                                    <i class="fa fa-th-list"></i> Submissions
                                </a>
                                <a href="{{route('/EditForm',['id' => Crypt::encrypt($form->id) ])}}" class="btn btn-primary float-md-right btn-sm">
                                    <i class="fa fa-edit"></i> Edit
                                </a> 
                                <!--<a href="{{ route('formbuilder::forms.create') }}" class="btn btn-primary float-md-right btn-sm">
                                    <i class="fa fa-plus-circle"></i> New Form
                                </a>-->
                            </div>
                        </div>
                    </h5>
                </div>

                <div class="card-body">
                    <div id="fb-render"></div>
                </div>
            </div>
				  
            </div>
            <div class="wrap-login100 col-md-4 float-right">
            <div class="card rounded-0">
                <div class="card-header">
                    <h5 class="card-title">
                        Details 

                        <button class="btn btn-primary btn-sm clipboard float-right" data-clipboard-text="{{ route('formbuilder::form.render', $form->identifier) }}" data-message="Copied" data-original="Copy Form URL" title="Copy form URL to clipboard">
                            <i class="fa fa-clipboard"></i> Copy Form URL
                        </button>
                        
                    </h5>
                </div>

                <ul class="list-group list-group-flush">
                <li class="list-group-item"> 
                        <strong>URL: </strong>
                        @if($form->live)
                            <a href="{{route('/revokelink',['id' => Crypt::encrypt($form->identifier) ])}}"><button class="btn btn-danger btn-sm clipboard float-right">
                            <i class="fa fa-clipboard"></i>Revoke URL
                        </button></a>
                        @else
                            <a href="{{route('/livelink',['id' => Crypt::encrypt($form->identifier) ])}}"><button class="btn btn-success btn-sm clipboard float-right">
                            <i class="fa fa-clipboard"></i>Live URL
                        </button></a>  
                        @endif
                    </li>
                    <li class="list-group-item">
                        <strong>Public URL: </strong> 
                        <a href="{{ route('formbuilder::form.render', $form->identifier) }}" class="float-right" target="_blank">
                            {{$form->identifier}}
                        </a>
                    </li>
                    <li class="list-group-item">
                        <strong>Visibility: </strong> <span class="float-right">{{ $form->visibility }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Allows Edit: </strong> 
                        <span class="float-right">{{ $form->allowsEdit() ? 'YES' : 'NO' }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Owner: </strong> <span class="float-right">{{ $form->user->name }}</span>
                    </li>
                     <li class="list-group-item">
                        <strong>Current Submissions: </strong> 
                        <span class="float-right">{{ $form->submissions_count }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>Last Updated On: </strong> 
                        <span class="float-right">
                            {{ $form->updated_at->toDayDateTimeString() }}
                        </span>
                    </li>
                    <li class="list-group-item">
                        <strong>Created On: </strong> 
                        <span class="float-right">
                            {{ $form->created_at->toDayDateTimeString() }}
                        </span>
                    </li>
                </ul>
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
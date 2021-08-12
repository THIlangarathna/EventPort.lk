<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>My Events</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="#" rel="icon">
  <link href="#" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="Nav/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="Nav/vendor/icofont/icofont.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="Nav/css/stylemyevents.css" rel="stylesheet">


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
          <li><a href="#">My Events</a></li>
          <li class="get-started"><a href="event">Create Event</a></li>
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


  <main id="main">



  </main><!-- End #main -->
  
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
        
          <p>My Events</p>
        </div>
        @if($data->count())
        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          @foreach ($data as $row)
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="storage\<?php echo $row->cover; ?>" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="storage\<?php echo $row->cover; ?>" data-gall="portfolioGallery" class="venobox"><i class="icofont-plus-circle"></i></a>
                <a href="{{route('viewevent',['id' => Crypt::encrypt($row->id) ])}}" title="More Details"><i class="icofont-link"></i></a>
                <a href="{{route('deleteevent',['id' => Crypt::encrypt($row->id) ])}}" title="Delete Event"><i class="icofont-ui-delete"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>{{$row->eventname}}</h4>
                <p>{{$row->description}}</p>
              </div>
            </div>
          </div>
          @endforeach

        </div>
        @else
                    <div class="card-body">
                      <center>
                    <h2 class="table-title">No Events</h2>
</center>
                    </div>  
                @endif

      </div>
    </section><!-- End Portfolio Section -->

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

  <!-- Vendor JS Files -->
  <script src="Nav/vendor/jquery/jquery.min.js"></script>
  <script src="Nav/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="Nav/js/main.js"></script>

</body>

</html>
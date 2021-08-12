<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Event Port</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="#" rel="icon">
  <link href="#" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assetshome/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assetshome/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assetshome/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assetshome/vendor/venobox/venobox.css" rel="stylesheet">

  <link href="assetshome/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assetshome/css/style.css" rel="stylesheet">


</head>

<body>
  
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container-fluid d-flex">

      <div class="logo mr-auto">
        
        
        <a href="/"><img src="assetshome/img/Untitled-3.png" alt="" class="img-fluid"></a>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="/">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Events</a></li>
          <li><a href="#contact">Contact Us</a></li>

          <li class="get-started"><a href="{{ url('/home') }}">Create Event</a></li>
        </ul>
      </nav>
      <!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- =======  Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1">
          <h1>Better event experience with event port</h1>
          <h2>Lorem ipsum dolorolorem obcaecati nam a enim? Saepe evs!</h2>
          <a href="{{ route('login') }}" class="btn-get-started scrollto text-decoration-none">Create event</a>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="assetshome/img/hero-img.svg" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row justify-content-between">
          <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">
            <img src="assetshome/img/about-img.svg" class="img-fluid" alt="" data-aos="zoom-in">
          </div>
          <div class="col-lg-6 pt-5 pt-lg-0">
            <h3 data-aos="fade-up">What is event port</h3>
            <p data-aos="fade-up" data-aos-delay="100">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
            </p>
            <div class="row">
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <i class="bx bx-receipt"></i>
                <h4>manage events</h4>
                <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
              </div>
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <i class="bx bx-cube-alt"></i>
                <h4>evaluate the registrants</h4>
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
    <!-- ======= Services Section ======= -->
 <section id="services" class="services section-bg">
  <div class="container">

    <div class="section-title" data-aos="fade-up">
      <h2>Services</h2>
      <p>Check out the great services we offer</p>
    </div>

    <div class="row">
      <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
        <div class="icon-box">
          <div class="icon"><i class="bx bxl-dribbble"></i></div>
          <h4 class="title"><a href="">Lorem Ipsum</a></h4>
          <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
        <div class="icon-box">
          <div class="icon"><i class="bx bx-file"></i></div>
          <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
          <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
        <div class="icon-box">
          <div class="icon"><i class="bx bx-tachometer"></i></div>
          <h4 class="title"><a href="">Magni Dolores</a></h4>
          <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="400">
        <div class="icon-box">
          <div class="icon"><i class="bx bx-world"></i></div>
          <h4 class="title"><a href="">Nemo Enim</a></h4>
          <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum</p>
        </div>
      </div>

    </div>

  </div>
</section><!-- End Services Section -->


    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
        
          <p>Events</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">Upcoming</li>
              <li data-filter=".filter-web">registration over</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assetshome/img/portfolio/event.png" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assetshome/img/portfolio/event.png" data-gall="portfolioGallery" class="venobox"><i class="icofont-plus-circle"></i></a>
                <a href="#" title="More Details"><i class="icofont-link"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>DevFest</h4>
                <p>Google</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assetshome/img/portfolio/event2.png" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assetshome/img/portfolio/event2.png" data-gall="portfolioGallery" class="venobox" ><i class="icofont-plus-circle"></i></a>
                <a href="#" title="More Details"><i class="icofont-link"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>DRIBBBLE</h4>
                <p>colombo</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assetshome/img/portfolio/event.png" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assetshome/img/portfolio/event.png" data-gall="portfolioGallery" class="venobox" ><i class="icofont-plus-circle"></i></a>
                <a href="#" title="More Details"><i class="icofont-link"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>DevFest</h4>
                <p>Google</p>
              </div>
            </div>
          </div>

         

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assetshome/img/portfolio/event2.png" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assetshome/img/portfolio/event2.png" data-gall="portfolioGallery" class="venobox" ><i class="icofont-plus-circle"></i></a>
                <a href="#" title="More Details"><i class="icofont-link"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>DRIBBBLE</h4>
                <p>colombo</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="assetshome/img/portfolio/event.png" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assetshome/img/portfolio/event.png" data-gall="portfolioGallery" class="venobox" ><i class="icofont-plus-circle"></i></a>
                <a href="#" title="More Details"><i class="icofont-link"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>DevFest</h4>
                <p>Google</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="assetshome/img/portfolio/event2.png" class="img-fluid" alt="">
              <div class="portfolio-links">
                <a href="assetshome/img/portfolio/event2.png" data-gall="portfolioGallery" class="venobox" ><i class="icofont-plus-circle"></i></a>
                <a href="#" title="More Details"><i class="icofont-link"></i></a>
              </div>
              <div class="portfolio-info">
                <h4>DRIBBBLE</h4>
                <p>colombo</p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section -->

     <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Contact Us</h2>
          <p>Contact us the get started</p>
        </div>

        <div class="row justify-content-between">
          
            <div class="col-lg-6 mt-5 mt-lg-0 d-flex align-items-left" data-aos="fade-up" data-aos-delay="200">
            <form method="POST" action="Hello" class="php-email-form" enctype="multipart/form-data">
            @csrf
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required/>

                </div>
                <div class="form-group col-md-6">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="Please enter a valid email" required/>

                </div>
              </div>
              <div class="form-group">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />

              </div>
              <div class="form-group">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" data-rule="required" data-msg="Please write something for us" required></textarea>

              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>
          <div class="col-lg-6 d-flex align-items-center justify-content-center about-img">
            <img src="assetshome/img/mail.svg" class="img-fluid" alt="" data-aos="zoom-in">
          </div>

        </div>

      </div>
    </section><!-- End Contact Us Section -->


  </main><!-- End #main -->

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
  <script src="assetshome/vendor/jquery/jquery.min.js"></script>
  <script src="assetshome/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assetshome/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assetshome/vendor/php-email-form/validate.js"></script>
  <script src="assetshome/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assetshome/vendor/venobox/venobox.min.js"></script>
  <script src="assetshome/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assetshome/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assetshome/js/main.js"></script>

</body>

</html>
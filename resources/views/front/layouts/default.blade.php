<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <!--[if IE]>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <![endif]-->
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- Page title -->
      <title>IdentiPET - Red Veterinaria en linea</title>

      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.js"></script>
      <![endif]-->

      <!-- Bootstrap Core CSS -->
      <link rel="stylesheet" href="{{URL::asset('front/css/bootstrap.css')}}" type="text/css" />
      <!-- Icon fonts -->

      <link rel="stylesheet" href="{{URL::asset('front/fonts/font-awesome/css/font-awesome.min.css')}}" type="text/css" />
      <link rel="stylesheet" href="{{URL::asset('front/fonts/flaticons/flaticon.css')}}" type="text/css" />

      <!-- Google fonts -->
      <link href="http://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet" type="text/css">
	  <link href="http://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet" type="text/css">

      <!-- Css Animations -->
      <link rel="stylesheet" href="{{URL::asset('front/css/animate.css')}}" type="text/css" />
      <!-- Theme CSS -->
      <link rel="stylesheet" href="{{URL::asset('front/css/style.css')}}" type="text/css" />

	    <!-- Color Style CSS -->
      <link rel="stylesheet" href="{{URL::asset('front/styles/yellowpaws.css')}}" type="text/css" />


	  <!-- Prefix free CSS -->
    <script type="text/javascript" src="{{URL::asset('front/js/prefixfree.js')}}"></script>

      <!-- Owl Slider & Prettyphoto -->
      <link rel="stylesheet" href="{{URL::asset('front/css/owl.carousel.css')}}"/>
      <link rel="stylesheet" href="{{URL::asset('front/css/prettyPhoto.css')}}"/>

      <!-- Favicons-->
      <link rel="apple-touch-icon" sizes="57x57" href="{{URL::asset('front/apple-touch-icon-57x57.png')}}">
      <link rel="apple-touch-icon" sizes="72x72" href="{{URL::asset('front/apple-touch-icon-72x72.png')}}">
      <link rel="apple-touch-icon" sizes="114x114" href="{{URL::asset('front/apple-touch-icon-114x114.png')}}">
      <link rel="apple-touch-icon" sizes="144x144" href="{{URL::asset('front/apple-touch-icon-144x144.png')}}">
      <link rel="shortcut icon" href="{{URL::asset('front/favicon.ico')}}" type="image/x-icon">
      <link rel="icon" href="{{URL::asset('front/favicon.ico')}}" type="image/x-icon">
      </head>

   <body id="page-top" data-spy="scroll" data-target=".navbar-custom">



    @yield('content')


    <!-- Footer -->
<footer>
 <div class="container">
  <div class="row wow fadeInUp" data-wow-delay="0.2s">
   <div class="col-sm-6 col-md-4">
   <!-- Social Media icons -->
    <ul class="social-media">
       <li><a title="Facebook" href="https://www.facebook.com/identipetcolombia/"><i class="fa fa-facebook"></i></a></li>
       <li><a title="Twitter" href="https://twitter.com/identipetco"><i class="fa fa-twitter"></i></a></li>
       <li><a title="Google Plus" href="https://plus.google.com/u/1/b/102915556214026630272/+Identipetcolombia"><i class="fa fa-google-plus"></i></a></li>
    </ul>
   </div>
   <!-- Bottom Credits -->
   <div class="col-sm-6 col-md-offset-5 col-md-3 text-center">
    <p>COPYRIGHT © 2016 PETSolution</p>
   </div>
  </div><!-- /row-->
 </div><!-- /container -->
 <!-- Go To Top Link -->
 <div class="page-scroll hidden-sm hidden-xs">
  <a href="#page-top" class="back-to-top"><i class="fa fa-angle-up"></i></a>
 </div>
</footer>
<!-- /footer ends -->


<!-- Core JavaScript Files -->
<script type="text/javascript" src="{{URL::asset('front/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('front/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('front/js/main.js')}}"></script>
<!-- Counter -->
<script type="text/javascript" src="{{URL::asset('front/js/numscroller.js')}}"></script>
<!-- WOW animations -->
<script type="text/javascript" src="{{URL::asset('front/js/wow.min.js')}}"></script>
<!-- Prettyphoto Lightbox -->
<script type="text/javascript" src="{{URL::asset('front/js/jquery.prettyPhoto.js')}}"></script>
<!-- Owl Carousel -->
<script type="text/javascript" src="{{URL::asset('front/js/owl.carousel.min.js')}}"></script>
<!-- Contact form -->
<script type="text/javascript" src="{{URL::asset('front/js/contact.js')}}"></script>
<!-- Isotope -->
<script type="text/javascript" src="{{URL::asset('front/js/jquery.isotope.js')}}"></script>
<!-- Google maps -->
<script src="https://maps.googleapis.com/maps/api/js"></script>

</body>
</html>

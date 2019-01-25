@extends('front.layouts.default')


@section('content')

<!-- Preloader -->
<div id="preloader">
  <div class="spinner">
    <div class="rect1"></div>
    <div class="rect2"></div>
    <div class="rect3"></div>
    <div class="rect4"></div>
    <div class="rect5"></div>
  </div>
</div>
<!-- Navbar -->
    <nav class="navbar navbar-custom navbar-fixed-top">
      <!-- Start Top Bar -->
    <!-- End Top bar -->
       <div class="container">
       <!-- navbar -->
          <div class="navbar-header page-scroll">
             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
             <i class="fa fa-bars"></i>
             </button>
             <!-- Logo -->
             <div class="page-scroll">
                <a class="navbar-brand" href="#page-top" style="padding: 5px;">
        <!--Font Icon logo and text -->
                   <img src="{{URL::asset('front/img/logo.svg')}}" alt="" width="165" />
                </a>
             </div>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
             <ul class="nav navbar-nav page-scroll">

                <li><a href="/login">Login</a></li>
                <li><a href="/register">registro</a></li>
             </ul>
          </div>
       </div>
    </nav><!-- Navbar ends -->
<!-- Full Page Image Background Slider -->
<div class="slider-container">
<!-- Controls -->
   <div class="slider-control left inactive"></div>
   <div class="slider-control right"></div>
     <ul class="slider-pagi"></ul>
   <!--Slider -->
   <div class="slider">
   <!-- Slide 1 -->
    <div class="slide slide-0 active">
     <div class="slide__bg"></div>
     <div class="slide__content">
      <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
         <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
      </svg>
      <div class="slide__text">
        <div class="box cont-div">

            <div class="icon red">
              <a href="/user/pets">
                 <div class="image"><span class="flaticon-pet22"></span></div>
                 <h5>Perdi mi mascota</h5>
              </a>
            </div>

            <div class="icon red">
              <a href="/search">
               <div class="image"><span class="flaticon-dog65"></span></div>
                <h5>Encontré una Mascota</h5>
              </div>
            </a>
        </div>




        <h1 class="slide__text-heading">BIENVENIDO A Identipet</h1>
        <div class="hidden-sm hidden-xs">
          <p class="lead">IdentiPET es la solución perfecta para estar siempre cerca a tu mascota.</p>
          <div class="page-scroll">
           <!--<a href="#services" class="btn btn-default">Servicios</a>-->
          </div>
         </div>
      </div>
     </div>
    </div>

    <div class="slide slide-1">
     <div class="slide__bg"></div>
     <div class="slide__content">
      <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
         <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
      </svg>
      <div class="slide__text">
        <div class="box cont-div">
            <div class="icon red">
                <a href="/user/pets">
                  <div class="image"><span class="flaticon-pet22"></span></div>
                  <h5>Perdi mi mascota</h5>
                </a>
            </div>
            <div class="icon red">
                <a href="/search">
                  <div class="image"><span class="flaticon-dog65"></span></div>
                  <h5>Encontré una Mascota</h5>
                </a>
            </div>
        </div>
         <h1 class="slide__text-heading">Notas de Interés</h1>
         <div class="hidden-sm hidden-xs">
          <p class="lead">Enterate de avisos clasificados y notas de interés acordes a tú mascota.</p>
          <div class="page-scroll">

          </div>
         </div>
      </div>
     </div>
    </div>

    <div class="slide slide-2">
     <div class="slide__bg"></div>
     <div class="slide__content">
      <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
         <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
      </svg>
      <div class="slide__text">
        <div class="box cont-div">
            <div class="icon red">
              <a href="/user/pets">
               <div class="image"><span class="flaticon-pet22"></span></div>
               <h5>Perdi mi mascota</h5>
             </a>
            </div>
            <div class="icon red">
              <a href="/search">
               <div class="image"><span class="flaticon-dog65"></span></div>
               <h5>Encontré una Mascota</h5>
             </a>
            </div>
        </div>
         <h1 class="slide__text-heading">Acerca de Nosotros</h1>
         <div class="hidden-sm hidden-xs">
          <p class="lead">Descubre los multiples beneficios que tiene IdentiPET para tu mascota.</p>
          <div class="page-scroll">

          </div>
         </div>
      </div>
     </div>
    </div>

    <div class="slide slide-3">
     <div class="slide__bg"></div>
     <div class="slide__content">
      <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
         <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
      </svg>
      <div class="slide__text">
        <div class="box cont-div">
            <div class="icon red">
                <a href="/user/pets">
                    <div class="image"><span class="flaticon-pet22"></span></div>
                    <h5>Perdi mi mascota</h5>
                </a>
            </div>
            <div class="icon red">
              <a href="/search">
               <div class="image"><span class="flaticon-dog65"></span></div>
               <h5>Encontré una Mascota</h5>
             </a>
            </div>
        </div>
         <h1 class="slide__text-heading">Red de especialistas</h1>
         <div class="hidden-sm hidden-xs">
          <p class="lead">Toda una RED de Médicos Veterinarios Especialistas para tú mascota</p>
          <div class="page-scroll">
          
          </div>
         </div>
      </div>
     </div>
    </div>

   </div>
</div>
<!--/ Slider ends -->

@stop

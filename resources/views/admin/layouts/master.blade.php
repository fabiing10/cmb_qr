<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">
    <title>Identipet</title>
    <link rel="apple-touch-icon" href="{{URL::asset('admin/assets/images/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{URL::asset('admin/assets/images/favicon.ico')}}">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{URL::asset('admin/global/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/global/css/bootstrap-extend.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/assets/css/site.min.css')}}">
    <!-- Plugins -->
    <link rel="stylesheet" href="{{URL::asset('admin/global/vendor/animsition/animsition.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/global/vendor/asscrollable/asScrollable.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/global/vendor/switchery/switchery.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/global/vendor/intro-js/introjs.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/global/vendor/slidepanel/slidePanel.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/global/vendor/flag-icon-css/flag-icon.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/global/vendor/chartist-js/chartist.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/global/vendor/jvectormap/jquery-jvectormap.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css')}}">

    @yield('style')

    <!-- Fonts -->
    <link rel="stylesheet" href="{{URL::asset('admin/global/fonts/glyphicons/glyphicons.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/global/fonts/font-awesome/font-awesome.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/global/fonts/weather-icons/weather-icons.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/global/fonts/web-icons/web-icons.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/global/fonts/brand-icons/brand-icons.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('front/fonts/flaticons/flaticon.css')}}" type="text/css" />

    <!--<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>-->
    <!--[if lt IE 9]>
    <script src="{{URL::asset('admin/global/vendor/html5shiv/html5shiv.min.js')}}"></script>
    <![endif]-->
    <!--[if lt IE 10]>
    <script src="{{URL::asset('admin/global/vendor/media-match/media.match.min.js')}}"></script>
    <script src="{{URL::asset('admin/global/vendor/respond/respond.min.js')}}"></script>
    <![endif]-->
    <!-- Scripts -->
    <script src="{{URL::asset('admin/global/vendor/modernizr/modernizr.js')}}"></script>
    <script src="{{URL::asset('admin/global/vendor/breakpoints/breakpoints.js')}}"></script>
    <script>
        Breakpoints();
    </script>

    <style>
    .select2-container--default {
        display: block;
        z-index: 2000;
    }
    </style>
</head>
<body class="dashboard">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle hamburger hamburger-close navbar-toggle-left hided"
                data-toggle="menubar">
            <span class="sr-only">Toggle navigation</span>
            <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-collapse"
                data-toggle="collapse">
            <i class="icon wb-more-horizontal" aria-hidden="true"></i>
        </button>
        <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
            <img class="navbar-brand-logo" src="{{URL::asset('assets/logo.png')}}" title="Remark">
            <!--<img class="navbar-brand-logo-responsive" src="{{URL::asset('assets/logo-identipet-responsive.png')}}" title="Remark">-->
            <!--<span class="navbar-brand-text hidden-xs"> Identipet</span>-->
        </div>
        <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-search"
                data-toggle="collapse">
            <span class="sr-only">Toggle Search</span>
            <i class="icon wb-search" aria-hidden="true"></i>
        </button>
    </div>
    <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
            <!-- Navbar Toolbar -->
            <ul class="nav navbar-toolbar">
                <li class="hidden-float" id="toggleMenubar">
                    <a data-toggle="menubar" href="#" role="button">
                        <i class="icon hamburger hamburger-arrow-left">
                            <span class="sr-only">Toggle menubar</span>
                            <span class="hamburger-bar"></span>
                        </i>
                    </a>
                </li>
                <li class="hidden-xs" id="toggleFullscreen">
                    <a class="icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                        <span class="sr-only">Toggle fullscreen</span>
                    </a>
                </li>
                <li class="hidden-float">
                    <a class="icon wb-search" data-toggle="collapse" href="#" data-target="#site-navbar-search"
                       role="button">
                        <span class="sr-only">Toggle Search</span>
                    </a>
                </li>
            </ul>
            <!-- End Navbar Toolbar -->

            <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                <li style="font-weight: bold;margin-top: 23px;margin-right: 30px;">
                  {{session('nameVeterinary')}}
                </li>
            </ul>
        </div>
        <!-- End Navbar Collapse -->
        <!-- Site Navbar Seach -->
        <div class="collapse navbar-search-overlap" id="site-navbar-search">
            <form role="search">
                <div class="form-group">
                    <div class="input-search">
                        <i class="input-search-icon wb-search" aria-hidden="true"></i>
                        <input type="text" class="form-control" name="site-search" placeholder="Buscar .">
                        <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search"
                                data-toggle="collapse" aria-label="Close"></button>
                    </div>
                </div>
            </form>
        </div>
        <!-- End Site Navbar Seach -->
    </div>
</nav>



<!--- Menu selection -->
<div class="site-menubar">
    <div class="site-menubar-body">
        <div>
            <div>

                <ul class="site-menu">
                   @yield('menu')
                </ul>
            </div>
        </div>
    </div>
    <div class="site-menubar-footer">
        <a href="/logout" data-placement="top" data-toggle="tooltip" data-original-title="Logout">
            <span class="icon wb-power" aria-hidden="true"></span>
        </a>
    </div>
</div>

<!-- Page -->
<div class="page animsition">

    <div class="page-content padding-10 container-fluid">

@yield('content')

    </div>
</div>
<!-- End Page -->
<!-- Footer -->
<footer class="site-footer">
    <div class="site-footer-legal">© 2018 <a href="http://identipet.co">Identipet</a></div>
    <div class="site-footer-right">
        <i class="red-600 wb wb-heart"></i> + <a href="http://identipet.co">Politicas y Privacidad</a>
    </div>
</footer>
<!-- Core  -->
<script src="{{URL::asset('admin/global/vendor/jquery/jquery.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/bootstrap/bootstrap.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/animsition/animsition.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/asscroll/jquery-asScroll.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/asscrollable/jquery.asScrollable.all.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/ashoverscroll/jquery-asHoverScroll.js')}}"></script>
<!-- Plugins -->
<script src="{{URL::asset('admin/global/vendor/switchery/switchery.min.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/intro-js/intro.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/screenfull/screenfull.js')}}"></script>
<script src="{{URL::asset('admin/global/vendor/slidepanel/jquery-slidePanel.js')}}"></script>

@yield('plugins')
<!-- Scripts -->
<script src="{{URL::asset('admin/global/js/core.js')}}"></script>
<script src="{{URL::asset('admin/assets/js/site.js')}}"></script>
<script src="{{URL::asset('admin/assets/js/sections/menu.js')}}"></script>
<script src="{{URL::asset('admin/assets/js/sections/menubar.js')}}"></script>
<script src="{{URL::asset('admin/assets/js/sections/gridmenu.js')}}"></script>
<script src="{{URL::asset('admin/assets/js/sections/sidebar.js')}}"></script>
<script src="{{URL::asset('admin/global/js/configs/config-colors.js')}}"></script>
<script src="{{URL::asset('admin/assets/js/configs/config-tour.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/asscrollable.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/animsition.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/slidepanel.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/matchheight.js')}}"></script>

@yield('script')
</body>
</html>

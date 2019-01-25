<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">
    <title>Cmb</title>
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
    <link rel="stylesheet" href="{{URL::asset('admin/assets/examples/css/dashboard/v1.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/assets/examples/css/pages/login.css')}}">

    <!-- Fonts -->
    <link rel="stylesheet" href="{{URL::asset('admin/global/fonts/weather-icons/weather-icons.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/global/fonts/web-icons/web-icons.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/global/fonts/brand-icons/brand-icons.min.css')}}">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
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
    @yield('style')
</head>
<body class="page-login layout-full page-dark">
@yield('content')
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
<script src="{{URL::asset('admin/global/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>

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
<script src="{{URL::asset('admin/global/js/components/switchery.js')}}"></script>
<script src="{{URL::asset('admin/global/js/components/matchheight.js')}}"></script>
<script src="{{URL::asset('admin/assets/examples/js/dashboard/v2.js')}}"></script>
<script src="{{URL::asset('admin/assets/js/jquery.validate.js')}}"></script>
@yield('script')
</body>

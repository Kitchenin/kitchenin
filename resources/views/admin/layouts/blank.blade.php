<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
<head>

    <title>KITCHEN IN</title>

    <meta charset="utf-8" />
    <meta name="Author" content="Martin Aleksandrov" />

    <!-- mobile settings -->
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

    <!-- WEB FONTS : use %7C instead of | (pipe) -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />

    <!-- CORE CSS -->
    <link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- THEME CSS -->
    <link href="/assets/css/essentials.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/layout.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/layout-shop.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/green.css" rel="stylesheet" type="text/css" id="color_scheme" />
    <link href="/assets/css/custom.css" rel="stylesheet" type="text/css" id="color_scheme" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script type="text/javascript" src="/assets/plugins/jquery/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="/assets/plugins/jquery/jquery-ui.min.js"></script>
</head>


<body class="smoothscroll enable-animation">

<!-- wrapper -->
<div id="wrapper">

    @yield('mainContent')


    <!-- /FOOTER -->

</div>
<!-- /wrapper -->

<input type="hidden" id="global_csrf_token" name="global_csrf_token" value="{{ csrf_token() }}" />

<!-- SCROLL TO TOP -->
<a href="#" id="toTop"></a>

<div id="preloader">
    <div class="inner">
        <span class="loader"></span>
    </div>
</div>

<!-- JAVASCRIPT FILES -->
<script type="text/javascript" src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/js/admin.js"></script>

<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

</body>
</html>
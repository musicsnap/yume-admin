<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>Metronic | User Login 1</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/global/css/components-md.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{asset('backend/global/css/plugins-md.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/pages/css/login.min.css')}}" rel="stylesheet" type="text/css" />
    @yield('css')
    <link rel="shortcut icon" href="favicon.ico" /> </head>

<body class=" login">
<div class="logo">
    <a href="index.html">
        <img src="{{asset('backend/pages/img/logo-big.png')}}" alt="" /> </a>
</div>
<div class="content">
    @yield('content')
</div>
<div class="copyright"> 2014 © Metronic. Admin Dashboard Template. </div>
<!--[if lt IE 9]>
<script src="{{asset('backend/global/plugins/respond.min.js')}}"></script>
<script src="{{asset('backend/global/plugins/excanvas.min.js')}}"></script>
<![endif]-->
<script src="{{asset('backend/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/global/plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/global/scripts/app.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/pages/scripts/login.min.js')}}" type="text/javascript"></script>
@yield('js')
</body>

</html>
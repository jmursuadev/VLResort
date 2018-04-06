<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'VL Resort') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.2.1/dt-1.10.16/datatables.min.css"/>
    <link href="{{ asset('fonts/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datepicker.min.css') }}" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,700,300,600,800,400' rel='stylesheet' type='text/css'>

    <style>
        ul li{
            list-style: none;
        }
        ul ul li:hover{
            background-color: maroon !important;
        }
    </style>
</head>
<body>
<div id="app">
    <!-- Navigation
    ==========================================-->
    <nav id="tf-menu" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class= "logo">
                    <a href="{{ route('index') }}"><img src="{{ asset('images1/logo.jpg') }}" width="70px"></a>
                    <a href="{{ route('index') }}"><font size="4px"><font color="white">Villa Leonora Resort and Event Venue</font></font></a>
                </div>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling --><style>.paging{background-color:grey; color:black;}</style>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li> <a href="{{ route('index') }}" class="page-scroll">Home</a></li>
                    <li><a href="{{ route('about_us') }}" class="page-scroll">About Us</a></li>
                    <li><a class="page-scroll">Amenities</a>
                        <ul>
                            <li><a href="{{ route('room.index') }}">Rooms</font></a></li>
                            <li><a href="{{ route('cottage.index') }}">Cottages</font></a></li>
                            <li><a href="{{ route('pool.index') }}">Pools</font></a></li>
                            {{--<li><a href="#">Event Venue</font></a></li>--}}
                        </ul>
                    </li>
                    @guest
                        <li><a href="{{ route('register') }}" class="page-scroll"> <Font size="0.1">Register</Font></a></li>
                        <li><a href="{{ route('login') }}" class="page-scroll"><Font size="0.1">Login</Font></a></li>
                    @else
                        @role('admin')
                        <li><a href="{{ route('admin.dashboard') }}" class="page-scroll"><Font size="0.1">{{ Auth::user()->name }}</Font></a></li>
                        <li class="page-scroll">
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        @endrole

                        @role('user')
                        <li><a href="{{ route('user.profile.index') }}" class="page-scroll"><Font size="0.1">{{ Auth::user()->name }}</Font></a></li>
                        <li class="page-scroll">
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        @endrole
                    @endguest
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    @yield('content')

    <nav id="footer">
        <div class="container">
            <div class="pull-left fnav">
                <p style="color: #fff;">ALL RIGHTS RESERVED. COPYRIGHT © {{ Date('Y') }}. Designed by <font color="orange">BSIT 3RD YR</font></a> </p>
            </div>
            <div class="pull-right fnav">
                <ul class="footer-social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<!-- Scripts -->
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.2.1/dt-1.10.16/datatables.min.js"></script>
<script src="https://unpkg.com/sweetalert2@7.17.0/dist/sweetalert2.all.js"></script>
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
@yield('script')
</body>
</html>

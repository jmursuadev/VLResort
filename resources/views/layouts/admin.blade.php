<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'VL Resort') }}</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('/assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/cs-skin-elastic.css') }}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{ asset('/assets/scss/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.css"/>
    {{--<link href="{{ asset('/assets/css/lib/vector-map/jqvmap.min.css') }}" rel="stylesheet">--}}
</head>
<body>
<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin</a>
            <a class="navbar-brand hidden" href="{{ route('admin.dashboard') }}">A</a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ route('admin.dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                <h3 class="menu-title">Booking</h3><!-- /.menu-title -->
                <li>
                    <a href="{{ route('admin.booking.pending') }}"> <i class="menu-icon ti-email"></i>Pending </a>
                </li>
                <li>
                    <a href="{{ route('admin.booking.approved') }}"> <i class="menu-icon ti-email"></i>Approved </a>
                </li>
                <h3 class="menu-title">Rooms</h3><!-- /.menu-title -->
                <li>
                    <a href="{{ route('admin.room.index') }}"> <i class="menu-icon ti-more"></i>Manage</a>
                </li>
                <h3 class="menu-title">Cottages</h3><!-- /.menu-title -->
                <li>
                    <a href="{{ route('admin.cottage.index') }}"> <i class="menu-icon ti-more"></i>Manage</a>
                </li>
                <h3 class="menu-title">Pools</h3><!-- /.menu-title -->
                <li>
                    <a href="{{ route('admin.pool.index') }}"> <i class="menu-icon ti-more"></i>Manage</a>
                </li>
                {{--<h3 class="menu-title">Events</h3><!-- /.menu-title -->--}}
                {{--<li>--}}
                    {{--<a href="{{ route('admin.room.index') }}"> <i class="menu-icon ti-more"></i>Manage</a>--}}
                {{--</li>--}}
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
    <header id="header" class="header">

        <div class="header-menu">

            <div class="col-sm-7">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                <div class="header-left">


                </div>
            </div>

            <div class="col-sm-5">
                <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="user-avatar rounded-circle" src="{{ asset('images/admin.png') }}" alt="User Avatar">
                    </a>

                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="{{ route('admin.profile.index') }}"><i class="fa fa- user"></i>My Profile</a>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout <i class="fa fa-power -off"></i>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </header><!-- /header -->
    <div>
        @yield('content')
    </div>
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="{{ asset('/assets/js/main.js') }}"></script>
    <script src="https://unpkg.com/sweetalert2@7.17.0/dist/sweetalert2.all.js"></script>
    <script src="{{ asset('/assets/js/plugins.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>

{{--<script src="{{ asset('/assets/js/lib/chart-js/Chart.bundle.js') }}"></script>--}}
{{--<script src="{{ asset('/assets/js/dashboard.js') }}"></script>--}}
{{--<script src="{{ asset('/assets/js/widgets.js') }}"></script>--}}
{{--<script src="{{ asset('/assets/js/lib/vector-map/jquery.vmap.js') }}"></script>--}}
{{--<script src="{{ asset('/assets/js/lib/vector-map/jquery.vmap.min.js') }}"></script>--}}
{{--<script src="{{ asset('/assets/js/lib/vector-map/jquery.vmap.sampledata.js') }}"></script>--}}
{{--<script src="{{ asset('/assets/js/lib/vector-map/country/jquery.vmap.world.js') }}"></script>--}}
@yield('script')
</body>
</html>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="description" content="Sidebar Transitions: Transition effects for off-canvas views" />
    <meta name="keywords" content="transition, off-canvas, navigation, effect, 3d, css3, smooth" />
    <meta name="author" content="Codrops" />
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/demo.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/icons.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/component.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tabs-component.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tabs-demo.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css" />
    <script src="{{ asset('js/modernizr.custom.js') }}"></script>
    <script src="https://use.fontawesome.com/2a9575154c.js"></script>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<div id="st-container" class="st-container">

    <nav class="st-menu st-effect-4" id="menu-4">
        <h2 class="icon icon-world">Planner</h2>
        <ul>
            <li><a class="icon icon-display" href="{{ url('/home') }}">Dashboard</a></li>
            <li><a class="icon icon-tag" href="{{ url('/departments') }}">Departments</a></li>
            <li><a class="icon icon-user" href="{{ url('/users') }}">Users</a></li>
            <li><a class="icon icon-note" href="{{ url('/subjects') }}">Subjects</a></li>
            <li><a class="icon icon-t-shirt" href="#">Grades</a></li>
            <li><a class="icon icon-calendar" href="#">Weekly Plans</a></li>
            <li><a class="icon icon-data" href="#">Reports</a></li>
        </ul>
    </nav>

    <!-- content push wrapper -->
    <div class="st-content"><!-- this is the wrapper for the content -->
        <div class="st-content-inner"><!-- extra div for emulating position:fixed of the menu -->
            <!-- Top Navigation -->
            <div id="top-nav" class="top-nav clearfix">
                @if (!\Auth::guest())
                    <button class="nav-btn" data-effect="st-effect-4">
                        <i class="fa fa-bars"></i> Menu
                    </button>
                @endif
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <div class="pull-right">
                        <a href="{{ url('/login') }}">
                            Login
                        </a>

                        <a href="{{ url('/register') }}">
                            Register
                        </a>
                    </div>
                @else
                    <div class="pull-right">
                        <a href="#">
                            {{ \Auth::user()->userName }}
                        </a>

                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                @endif
            </div>

            <div id="app">
                @yield('content')
            </div>
        </div><!-- /st-content-inner -->
    </div><!-- /st-content -->
</div><!-- /st-container -->
<script src="{{ asset('js/classie.js') }}"></script>
<script src="{{ asset('js/sidebarEffects.js') }}"></script>
<script src="{{ asset('js/cbpFWTabs.js') }}"></script>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<!-- Data tables -->
{{--//code.jquery.com/jquery-1.12.4.js--}}
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('#data-table').DataTable();
    } );

    if (document.getElementById( 'tabs' ) !== null) {

        new CBPFWTabs( document.getElementById( 'tabs' ) );

    }

</script>
</body>
</html>
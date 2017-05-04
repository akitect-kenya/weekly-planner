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
            <li><a class="icon icon-settings" href="#">WB Setup</a></li>
            <li><a class="icon icon-tag" href="#">Departments</a></li>
            <li><a class="icon icon-user" href="#">Users</a></li>
            <li><a class="icon icon-note" href="#">Subjects</a></li>
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
                <button data-effect="st-effect-4">
                    <i class="fa fa-bars"></i> Menu
                </button>
            </div>

            <header class="codrops-header">
                <h1>Sidebar Transitions <span>Transition effects for off-canvas views</span></h1>
            </header>
            <div class="main clearfix">

            </div><!-- /main -->
        </div><!-- /st-content-inner -->
    </div><!-- /st-content -->
</div><!-- /st-container -->
<script src="{{ asset('js/classie.js') }}"></script>
<script src="{{ asset('js/sidebarEffects.js') }}"></script>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
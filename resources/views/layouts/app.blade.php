<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/plugins/fullcalendar/css/fullcalendar.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('public/plugins/c3/c3.min.css')}}" rel="stylesheet" type="text/css"  />
    <link href="{{ asset('public/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/packages/core/main.css')}}" rel='stylesheet' />
    <link href="{{ asset('public/packages/daygrid/main.css')}}" rel='stylesheet' />
    <link href="{{ asset('public/packages/timegrid/main.css')}}" rel='stylesheet' />
    <link href="{{asset('public/plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css')}}" rel="stylesheet" type="text/css" media="screen">
    @yield('style')
</head>
<body>
    <div id="app">
        <main class="">
            @yield('content')
        </main>
    </div>

    <script src="{{asset('public/js/jquery.min.js')}}"></script>
    <script src="{{asset('public/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('public/js/modernizr.min.js')}}"></script>
    <script src="{{asset('public/js/detect.js')}}"></script>
    <script src="{{asset('public/js/fastclick.js')}}"></script>
    <script src="{{asset('public/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('public/js/jquery.blockUI.js')}}"></script>
    <script src="{{asset('public/js/waves.js')}}"></script>
    <script src="{{asset('public/js/jquery.nicescroll.js')}}"></script>
    <script src="{{asset('public/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('public/js/arrow.js')}}"></script>


@yield('scripts')
</body>
</html>

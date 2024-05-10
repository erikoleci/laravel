<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.sip')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('links')

    <title>{{ config('app.name', 'CRM') }}</title>

    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">
    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
{{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/packages/core/main.css')}}" rel='stylesheet' />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css" rel="stylesheet">
    {{--    <link href="{{ asset('css/icons.css')}}" rel="stylesheet" type="text/css">--}}
    @yield('style')
</head>
{{--background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0,0,0,0.2)), url({{asset('images/black-panther.jpg')}});background-repeat:no-repeat;--}}
<body id="a1body" class="night">
{{--<body style="background: white;">--}}
<div class="container1">
    <div class="fixed-left">

        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div id="wrapper">

            @include('layouts.sidebar')
            <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content" style="padding: 0 !important;">

                    @include('layouts.topbar')

                    @yield('content')
                </div>
                <!-- END wrapper -->
            </div>

            <!-- jQuery  -->
            <script src="{{asset('public/js/jquery.min.js')}}"></script>
            <script src="{{asset('public/js/bootstrap.bundle.min.js')}}"></script>
            <script src="{{asset('public/js/jquery.slimscroll.js')}}"></script>
            <script src="{{asset('public/js/waves.js')}}"></script>
            <script src="{{asset('public/js/arrow.js')}}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>


                {{--            <script src="{{asset('public/js/modernizr.min.js')}}"></script>--}}
                {{--            <script src="{{asset('public/js/detect.js')}}"></script>--}}
                {{--            <script src="{{asset('public/js/fastclick.js')}}"></script>--}}
                {{--            <script src="{{asset('public/js/jquery.blockUI.js')}}"></script>--}}
                {{--            <script src="{{asset('public/js/jquery.nicescroll.js')}}"></script>--}}
                {{--            <script src="{{asset('public/js/jquery.scrollTo.min.js')}}"></script>--}}


            <!-- skycons -->
                {{--            <script src="{{asset('public/plugins/skycons/skycons.min.js')}}"></script>--}}

            <!-- skycons -->
                {{--            <script src="{{asset('public/plugins/peity/jquery.peity.min.js')}}"></script>--}}

            <!--Morris Chart-->

                {{--                <script src="{{asset('public/plugins/moment/moment.js')}}"></script>--}}
                {{--                <script src="{{asset('public/packages/core/main.js')}}"></script>--}}
                {{--                <script src="{{asset('public/packages/interaction/main.js')}}"></script>--}}

            <!-- dashboard -->
                {{--            <script src="{{asset('pages/dashboard.js')}}"></script>--}}

            <!-- App js -->

                <script src="{{asset('public/js/app2.js')}}"></script>

                <script>
                    // const toggleBtn = document.getElementById("a1body");
                    //     console.log("Switching theme");
                    // if(document.documentElement.hasAttribute('theme')){
                    //     document.documentElement.removeAttribute('theme');
                    // }
                    // else{
                    document.documentElement.setAttribute('theme', '{{logged_in()->account_id}}');
                    // }

                    let currentTheme;

                    var i;

                    console.log(sessionStorage.getItem('night'));

                    if (sessionStorage.getItem('night')==="true")
                    {
                        $('body').addClass('night');
                        $('.toggle1').addClass('active');
                        {{
                                    Session::forget('mode')
                                }}
                        {{ session(['mode' => 'dark'])}}
                    }
                    else if (sessionStorage.getItem('night')==="false") {
                        $('body').removeClass('night');
                        $('.toggle1').removeClass('active');
                        {{
                                    Session::forget('mode')
                                }}
                                {{ session(['mode' => 'light']) }};
                    }
                    else if (sessionStorage.getItem("night") === null) {
                        //...
                        $('body').addClass('night');
                        $('.toggle1').addClass('active');
                        {{
                                    Session::forget('mode')
                                }}
                        {{ session(['mode' => 'dark'])}}
                    }

                    $(document).ready(function(){
                        $('.toggle1').click(function(){

                            if ($('body').hasClass('night')){
                                $('.toggle1').removeClass('active')
                                $('body').removeClass('night')
                                sessionStorage.setItem("night", "false");
                                {{
                                    Session::forget('mode')
                                }}
                                        {{
                                            session(['mode' => 'light'])
                                        }}
                                    currentTheme = sessionStorage.getItem('night') ? sessionStorage.getItem('night') : null;
                                console.log(currentTheme);

                            }
                            else {
                                $('.toggle1').addClass('active');
                                $('body').addClass('night');
                                sessionStorage.setItem('night', "true");
                                {{
                                    Session::forget('mode')
                                }}
                                        {{ session(['mode' => 'dark'])}}
                                    currentTheme = sessionStorage.getItem('night') ? sessionStorage.getItem('night') : null;
                                console.log(currentTheme);

                            }
                        })
                    })

                    // currentTheme = localStorage.getItem('night') ? localStorage.getItem('night') : null;





                </script>

                @yield('scripts')
                <script src="{{asset('js/arrow.js')}}"></script>

            @if(hasanyguard(['admin','manager']))
                @stack('sipScripts')


                @stack('sipContent')
            @endif

            @if(hasguard('manager'))

        <script>

            $(document).ready(function(){
                setTimeout(function(){

                    getNotifications();

                },10000);
            });


                    // function sayhello() {
                    //     console.log('ready');
                    //     // setTimeout(sayhello,5000);
                    // }

                    function getNotifications(){
                    axios.get('{{URL::to('get_reminder')}}', {

                    }).then(function(response) {

                    response.data.forEach(function (arrayItem) {

                    console.log(arrayItem.title);

                    axios.post('{{URL::to('set_seen_event')}}', {
                    id:arrayItem.id
                    }).then(function(response) {
                    }).catch(function(error) {
                    });

                    var turl='reminder_popup/'+arrayItem.id;
                    pop(turl);

                    });
                    // toastr.success("Event saved!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
                    }).catch(function(error) {
                    // console.log(error);
                    // toastr.error("Error saving the event!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
                    });

                    setTimeout(getNotifications,120000);

                    }



            function pop(turl){
                var windowSize = {
                    width: 426,
                    height: 550,
                };
                var windowLocation = {
                    left:  (window.screen.availLeft + (window.screen.availWidth )) - (windowSize.width ),
                    top: (window.screen.availTop + (window.screen.availHeight )) - (windowSize.height )
                };
                window.open(turl, 'lead'+Date.now(), 'width=' + windowSize.width + ', height=' + windowSize.height + ', left=' + windowLocation.left + ', top=' + windowLocation.top);
            }



        </script>
            @endif

        </div>
    </div>
</div>
</body>
</html>

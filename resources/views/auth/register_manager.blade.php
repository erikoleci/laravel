@extends('layouts.app')

@section('content')

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
     
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">

        <link href="{{asset('css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css">

    </head>


{{--    <body class="fixed-left">--}}

    <!-- Loader -->
    <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

    <!-- Begin page -->
    <div class="accountbg">

        <div class="content-center">
            <div class="content-desc-center">
                <div class="container2" style="background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0,0,0,0.2)), url({{asset('/images/bp_register.jpg')}});background-repeat:no-repeat; background-size: cover;background-position: bottom center">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-8">
                            <div class="card register_card">
                                <div class="register_body card-body">

                                    <h3 class="text-center mt-0 m-b-15">
                                        <a href="#" style="margin:2.5rem 0 2rem 0logo;" class="logo logo-admin"><img src="{{asset('images/icon.png')}}" height="120" alt="logo"></a>
                                    </h3>


                                    <div class="p-3">
                                        <form method="POST" class="form-horizontal m-t-big" action="{{ route('register') }}">
                                            @csrf

                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <input type="hidden" name="account_id" value="manager">
                                                    <input class="form-control inputTranparent form_input" name="email" type="email" value="{{ old('email') }}" required="" placeholder="Email">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <input class="form-control inputTranparent form_input" name="password" type="password" required="" placeholder="Password">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <input class="form-control inputTranparent form_input" name="password_confirmation" type="password" required="" placeholder="Retype your Password">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <span style="font-size: 0.9rem;color: #eee;margin-top: 1rem;">Enter your personal information:</span>
                                                    <input class="form-control inputTranparent form_input" name="name" type="text" required="" value="{{ old('name') }}" placeholder="Full Name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <label style="font-size: 0.9rem;color: #eee;margin-top: 1rem;" for="country">Choose a country:</label>

                                                    <select name="country" value="{{ old('country') }}" placeholder="Country" id="country" onchange="myFunction()" class="form-control inputTranparent form_input">
                                                        <option hidden value="">Please choose an option</option>
                                                        <option value="Italy">Italy</option>
                                                        <option value="Germany">Germany</option>
                                                        <option value="Greece">Greece</option>
                                                        <option value="Spain">Spain</option>
                                                        <option value="United Kingdom">United Kingdom</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-4">
                                                    <input class="form-control inputTranparent form_input" name="country_code" id="country_code" readonly="readonly" type="number" required="" value="{{ old('country_code') }}" placeholder="Country Code">
                                                </div>
                                                <div class="col-8">
                                                    <input class="form-control inputTranparent form_input" name="phone" type="number" required="" value="{{ old('phone') }}" placeholder="Phone Number">
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <input class="form-control inputTranparent form_input" name="city" type="text" required="" value="{{ old('city') }}" placeholder="City">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <input class="form-control inputTranparent form_input" name="postal_code" type="text" required="" value="{{ old('postal_code') }}" placeholder="Postal Code">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <input class="form-control inputTranparent form_input" name="address" type="text" required="" value="{{ old('address') }}" placeholder="Address">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-4">
                                                    <span style="color:#858585;" class="form-control inputTranparent">EUR </span>
                                                </div>
                                                <div class="col-8">
                                                    <input class="form-control inputTranparent form_input" name="promo_code" value="{{ old('promo_code') }}" placeholder="Promo Code">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="over_18" id="customCheck1" value="1" aria-checked="true">
                                                        <label style="font-size:0.9rem;" class="custom-control-label font-weight-normal text-white" for="customCheck1">I am over 18 years old</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="accept_terms" id="customCheck2" value="1" aria-checked="true">
                                                        <label style="font-size:0.9rem;" class="custom-control-label font-weight-normal text-white" for="customCheck2">I accept <a href="#" class="text-primary">Terms and Conditions</a></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group text-center row m-t-20">
                                                <div class="col-12">
                                                    <button class="btn btn_custom btn-block waves-effect waves-light" type="submit">Register</button>
                                                </div>
                                            </div>

                                            @if ($errors->any())
                                                <div class="text-danger font-20">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            <div class="form-group m-t-10 mb-0 row">
                                                <div class="col-12 m-t-20 text-center">
                                                    <a href="{{url('login')}}" class="text-muted">Already have account?</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery  -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/modernizr.min.js')}}"></script>
    <script src="{{asset('js/detect.js')}}"></script>
    <script src="{{asset('js/fastclick.js')}}"></script>
    <script src="{{asset('js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('js/jquery.blockUI.js')}}"></script>
    <script src="{{asset('js/waves.js')}}"></script>
    <script src="{{asset('js/app2.js')}}"></script>
    <script src="{{asset('js/jquery.nicescroll.js')}}"></script>
    <script src="{{asset('js/jquery.scrollTo.min.js')}}"></script>

    <!-- App js -->
{{--    <script src="assets/js/app.js"></script>--}}

{{--    </body>--}}

{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Register') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('register') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}

{{--                                @error('name')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Register') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@endsection
@section('scripts')
<script>
    function myFunction() {
        var country_code;
        var country = document.getElementById("country").value;

        switch(country) {
            case "Italy":
                text = "39";
                break;
            case "Germany":
                text = "49";
                break;
            case "Greece":
                text = "30";
                break;
            case "Spain":
                text = "34";
                break;
            case "United Kingdom":
                text = "44";
                break;
            default:
                text = " ";
        }
        document.getElementById("country_code").value = text;
    }
</script>
@endsection

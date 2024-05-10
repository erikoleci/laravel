@extends('layouts.app')



@section('style')
{{--    <link rel="stylesheet" href="{{asset('css/toastr.css')}}">--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">--}}
@endsection

@section('content')

<div>
    <div class="banner-area relative" style="background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0,0,0,0.2)), url({{asset('images/promo_bg.jpg')}});background-size:cover;background-repeat:no-repeat;" >
        <div style="display: flex; justify-content: center;" class="container">
            <div class="row fullscreen d-flex align-items-center justify-content-start">
                <div class="banner-content text-center col-lg-12 col-md-12">
                    <h5 class="text-white text-uppercase">Thank you for opening an account with</h5>
                    <h1 class="text-uppercase">
                    
                    </h1>
                    <h5 style="text-align:center;" class="text-white pt-20 pb-20">
                        Please wait until we verify your account. <br>
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <!-- End banner Area -->

    <!-- Start convert Area -->
    <div class="convert-area" id="ghhh">
        <div class="container">
            <div class="convert-wrap">
                <div class="row justify-content-center align-items-center flex-column pb-30">
                    <h1 class="text-white">Promo Credit</h1>
                    <p class="text-white">Please insert the amount you want to start with.</p>
                </div>
                <div class="row justify-content-center align-items-start">
                    <div class="col-lg-4 ">

                            <form method="POST" action="{{ route('set_promo_amount') }}" enctype="multipart/form-data">
                              @csrf
                            <input class="promo_input text-center" type="number" min="0" required name="promo_amount">
                                <button style="padding: 10px 39px;" type="submit" class="btn btn-lg btn-dark m-auto mb-2">Submit</button>
                            </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">--}}
{{--    <script src="{{asset('js/toastr.min.js')}}"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.3/axios.min.js"></script>--}}
{{--    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>--}}


{{--    <script>--}}
{{--        var vm = new Vue({--}}
{{--            el: '#app',--}}
{{--            mounted: function () {--}}
{{--            },--}}

{{--            data: function () {--}}
{{--                return {--}}
{{--                    user_id: null,--}}
{{--                    promo_amount:null,--}}
{{--                }--}}
{{--            },--}}
{{--            methods: {--}}
{{--                openProject(){--}}
{{--                    let self=this;--}}
{{--                        axios.post('{{URL::to('set_promo_amount')}}', {--}}
{{--                        user_id:{{logged_in()->id}},--}}
{{--                        promo_amount:self.promo_amount,--}}
{{--                    }).then(function(response) {--}}
{{--                        location.reload();--}}
{{--                    }).catch(function(error) {--}}
{{--                    });--}}
{{--                }--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
@endsection

@extends('layouts.app')


<style>
#email{width: 40%;
    margin: 2rem auto;}
.glow-on-hover{background: linear-gradient(to left, #d3cce3, #e9e4f0);transition: .5s all; color:white!important;padding: 10px 25px!important;
    border-radius: 31px!important;}

.glow-on-hover:hover{background: linear-gradient(to right, #d3cce3, #e9e4f0);}

</style>

@section('content')




 <div style="padding-bottom: 2%; padding-bottom: 2%;height: 100vh;background: linear-gradient(to top, #0f0c29, #302b63, #24243e);display: flex;align-items: center;" class="page-content-wrapper" id="app">

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8" style="z-index:100000000">
            <div class="">


                <div class="" style="text-align: center; color: white;"> <img style="width: 180px;" src="{{asset('/images/change_password.png')}}">

                    <h2>Forgot your Password?</h2>
                    <p>No worries! Enter your email and we will send you a reset link.</p>



                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     <div>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf


                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>




                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>


                                @enderror



                                <button type="submit" class="btn btn-lg glow-on-hover">
                                    {{ __('Send Password Reset Link') }}
                                </button>

                    </form>

                     </div>

                </div>

            </div>

                </div>
        <img src="{{asset('/images/skyline.png')}}" style="position:absolute;bottom:0; left:0;width:100%;z-index:1;opacity:.3">
            </div>
        </div>
    </div>
</div>
 </div>
@endsection

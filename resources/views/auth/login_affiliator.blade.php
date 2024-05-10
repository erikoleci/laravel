@extends('layouts.app')

<style>


body{
    background: linear-gradient(to right, #000000, #434343);
}

body .login-wrap {
    position: relative;
    background: #fff;
    border-radius: 10px;
    -webkit-box-shadow: 0px 10px 34px -15px rgb(0 0 0 / 24%);
    -moz-box-shadow: 0px 10px 34px -15px rgba(0, 0, 0, 0.24);
    box-shadow: 0px 10px 34px -15px rgb(0 0 0 / 24%);
    padding: 6rem 1rem !important;
}

.login-wrap .icon {
    width: 80px;
    height: 80px;
    background: #2e2f30;
    border-radius: 50%;
    font-size: 30px;
    margin: 0 auto;
    margin-bottom: 10px;
    color: white
}


h3{
    
    color: #525050;
}

.p-4 {
    padding: 1.5rem !important;
}
.justify-content-center {
    -webkit-box-pack: center !important;
    -ms-flex-pack: center !important;
    justify-content: center !important;
}

.ftco-section {
    padding: 7em 0;
}

.login-wrap h3 {
    font-weight: 300;
}

.text-center {
    text-align: center !important;
}

button{
    background: linear-gradient(to right, #000000, #434343);
}

@media only screen and (max-width : 1400px ){
    body .login-wrap {
     padding: 7rem 2rem !important;
}
}



</style>

@section('content')

    <div class="page-content-wrapper ">

        <div class="container-fluid">
            
            <section class="ftco-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center mb-5">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-7 col-lg-5">
                            <div class="login-wrap p-4 p-md-5">
                          <div class="icon d-flex align-items-center justify-content-center">
                              <span class="fa fa-user-o"></span>
                          </div>
                          <h3 class="text-center mb-4">Sign In</h3>
                          <form method="POST" class="login-form" action="{{ url('login_affiliator') }}">
                            @csrf
                              <div class="form-group">
                                  <input type="text" class="form-control rounded-left" name="email" value="{{ old('email') }}" placeholder="Username" required>
                                <input type="hidden" name="allowed_role" value="affiliator">
                              </div>
                        <div class="form-group d-flex">
                          <input type="password" class="form-control rounded-left" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group" style="margin-top: 4rem;">
                            <button type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
                        </div>
                      
                      </form>
                    </div>
                        </div>
                    </div>
                </div>
            </section>
           
        </div>

    </div>



@endsection

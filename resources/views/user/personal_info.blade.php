@extends('layouts.dashboard')
@section('style')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.3/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link href="{{asset('plugins/dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <style>

       .card .card-header {
           border-radius: 3px;
           margin-top: -20px;
           padding: 15px;
           width: 97%;
           margin: auto;
           margin-top: -25px;
       }

       .card{
           padding: 14px 12px;
           background-color: rgb(48 48 48);
       }

.card.bg-primary, .card .card-header-primary .card-icon, .card .card-header-primary .card-text, .card .card-header-primary:not(.card-header-icon):not(.card-header-text), .card.card-rotate.bg-primary .back, .card.card-rotate.bg-primary .front {
    background: linear-gradient( 
60deg
 ,#a68f67,#d0cece)

}



    body.night .form-control:disabled, body.night .form-control{
    border: none!important;
    border-bottom: 1px solid white!important;;
    border-radius: 0!important;
    background-color: transparent!important;
    color: rgba(255, 255, 255, 0.76);

      }


        .page-heading {
            margin: 20px 0;
            color: #666;
            -webkit-font-smoothing: antialiased;
            font-family: "Segoe UI Light", "Arial", serif;
            font-weight: 600;
            letter-spacing: 0.05em;
        }
        body.night .daterangepicker{color:black!important;}

        #my-dropzone .message {
            font-family: "Segoe UI Light", "Arial", serif;
            font-weight: 600;
            color: #0087F7;
            font-size: 1.5em;
            letter-spacing: 0.05em;
        }

        .dropzone {
            border: 2px dashed #0087F7;
            background: white;
            border-radius: 5px;
            min-height: 100px;
            padding: 30px 0;
            vertical-align: baseline;
            margin-top: 2rem;
        }
        body.night .table-hover tbody tr:hover, body.night .table-striped tbody tr:nth-of-type(odd), .thead-default th {
            background-color: #3e3e3e;
            color:white;
        }
        body.night .table-striped tr{
            color:white;
        }

        .select-doc-type{
        position: absolute;
        width: 100%;
        top: -30%;
        }


        label{
        text-transform: uppercase;
        color: #b19b80;
        }


        body.night .dropzone{
            border: 1px outset;
            border: 1px outset;
        }

    </style>
@endsection
@section('content')
    
    <style>

    </style>





<div class="page-content-wrapper">

<div class="container-fluid">


            <br>
            <br>
            <br>



<div class="row">
        <div class="col-md-7">
                <div class="card" style="width: 90%; height:100%; margin:auto">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Edit Profile</h4>
                    <p class="card-category">Complete your profile</p>
                  </div>
                  <div class="card-body">
                    <form method="POST" novalidate action="{{action('UserController@update')}}" enctype="multipart/form-data">
                      @csrf
               

                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                              <label class="bmd-label-floating">Full Name</label>
                              <input :disabled="inputDisabled" class="form-control" aria-describedby="addon-right" type="text" name="name" value="{{logged_in()->name}}">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                              <label class="bmd-label-floating">Phone Number</label>
                              <input :disabled="inputDisabled" class="form-control" aria-describedby="addon-right" type="text" name="phone" value="{{logged_in()->phone}}">
                            </div>
                          </div>
                      </div>


                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                              <label class="bmd-label-floating">Email Address</label>
                              <input :disabled="inputDisabled" class="form-control" aria-describedby="addon-right" type="text" name="email" value="{{logged_in()->email}}">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                              <label class="bmd-label-floating">Password</label>
                              <input :disabled="inputDisabled" class="form-control" aria-describedby="addon-right" type="password" name="real_password" value="{{logged_in()->real_password}}">
                            </div>
                          </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Address</label>
                            <input :disabled="inputDisabled" class="form-control" aria-describedby="addon-right" type="text" name="address" value="{{logged_in()->address}}">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">City</label>
                            <input :disabled="inputDisabled" class="form-control" aria-describedby="addon-right" type="text" name="city" value="{{logged_in()->city}}">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Country</label>
                            <input :disabled="inputDisabled" class="form-control" aria-describedby="addon-right" type="text" name="country" value="{{logged_in()->country}}">
                          </div>
                        </div>
                      
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                              <label class="bmd-label-floating">{{__("Account Number")}}</label>
                              {{-- <input class="form-control text-capitalize" disabled aria-describedby="addon-right" type="text" name="" value="@isset(logged_in()->account){{logged_in()->account->name}}@endisset"> --}}
                              <input class="form-control text-capitalize" disabled aria-describedby="addon-right" type="text" name="" value="{{logged_in()->mt4_account}}">
                            </div>
                        </div>
                          <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                              <label class="bmd-label-floating">{{__("Referal Code")}}</label>
                              <input class="form-control" disabled aria-describedby="addon-right" type="text" name="promo_code" value="{{logged_in()->promo_code}}">
                            </div>
                          </div>
                      </div>
                     
                      <br>
                      <br>
                      <br>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <div class="form-group bmd-form-group">
                              <label class="bmd-label-floating" style="text-transform: none;color:white; font-weight:300"> 
                                  These are all the data filled by the client in the registration form. <br>
                                  You can change any of them in seconds.  
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <button type="submit" class="btn btn-primary pull-right" style="background: #b4b4b6;
                      border: none;
                      color: #615c5c;">
                      Update Profile
                      </button>
                      <div class="clearfix"></div>
                    </form>
                  </div>
                </div>
        </div>


        <div class="col-md-5">
            <div class="m-b-30">
                <div class="col-md-11" style="margin:auto">
                    <div class="card">
                      <div class="card-header card-header-primary">
                        <h4 class="card-title">Upload your documents.</h4>
                        <p class="card-category">In order to activate you account you should send the required documents.</p>
                      </div>
                      <div class="card-body">
                        <form method="POST" action="{{ url('drop_files')}}" class="dropzone dz-clickable position-relative" enctype="multipart/form-data">
                            @csrf
                            {{-- <div class="select-doc-type">
                            <select class="custom-select" name="file_type" type="text">
                            <option value="DOD">DOD</option>
                            <option value="KYC">KYC</option>
                            <option value="DELEGA">DELEGA</option>
                            <option value="CONTRACT">CONTRACT</option>
                            </select>
                            </div> --}}
                            <div class="fallback">
                                <input name="file" type="file" multiple="multiple">
                            </div>
                        </form>
                      </div>
                    </div>
                </div>            
            </div>

            <br>    

            <div class="">
                <div class="m-b-30">
                <div class="col-md-11" style="margin:auto">
                <div class="card" >
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">MT4 Information</h4>
                    <p class="card-category">Stay up to date with your account information.</p>
                  </div>
                  <div class="card-body">
                    <div>
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                              <label class="bmd-label-floating">BALANCE</label>
                              <input disabled class="form-control" aria-describedby="addon-right" type="text" name="" value="">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                              <label class="bmd-label-floating">COLLATERAL</label>
                              <input disabled class="form-control" aria-describedby="addon-right" type="text" name="" value="">
                            </div>
                          </div>
                      
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                              <label class="bmd-label-floating">FREE MARGIN</label>
                              <input disabled class="form-control" aria-describedby="addon-right" type="text" name="" value="">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group bmd-form-group">
                              <label class="bmd-label-floating">EQUITY</label>
                              <input disabled class="form-control" aria-describedby="addon-right" type="text" name="" value="">
                            </div>
                          </div>
                      </div>
                
                      <div class="clearfix"></div>
                    </div>
                  </div>
                </div>
             </div>
                </div>
            </div>
        </div>

</div>


</div>

</div>

@endsection

@section('scripts')
    <script src="{{asset('js/toastr.min.js')}}"></script>
    <script src="{{asset('plugins/dropzone/dist/dropzone.js')}}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
 
@endsection

@extends('layouts.dashboard')
@section('style')
    <style>

        .card{
            background:#16181a;  border-radius:14px; max-width: 371px; display:block; margin:auto;
            padding:60px; padding-left:20px; padding-right:20px;box-shadow: 2px 10px 40px black; z-index:99;
        }

        .logo-card{max-width:50px; margin-bottom:15px; margin-top: -19px;}

        label{display:flex; font-size:10px; color:white; opacity:.4;}

        input{background:transparent; border:none; border-bottom:1px solid transparent; color:#dbdce0; transition: border-bottom .4s;}
        input:focus{border-bottom:1px solid #1abc9c; outline:none;}

        .cardnumber{display:block; font-size:20px; margin-bottom:8px; }

        .name{display:block; font-size:15px; max-width: 200px; float:left; margin-bottom:15px;}

        .toleft{float:left;}
        .ccv{width:50px; margin-top:-5px; font-size:15px;}

        .receipt{background: #dbdce0; border-radius:4px; padding:5%; padding-top:200px; max-width:700px; display:block; margin:auto; margin-top:-180px; position:relative;}

        .col{width:50%; float:left;}
        .bought-item{background:#f5f5f5; padding:2px;}
        .bought-items{margin-top:-3px;}

        .cost{color:#3a7bd5;}
        .seller{color: #3a7bd5;}
        .description{font-size: 13px;}
        .price{font-size:12px;}
        .comprobe{text-align:center;}
        .proceed{position:absolute!important; transform: translate(293px, 20px)!important;  width:50px!important; height:50px!important; border-radius:50%!important; background:#1abc9c!important; border:none!important;color:white!important; transition: box-shadow .2s, transform .4s!important; cursor:pointer!important; margin:0!important;}
        .proceed:active{outline:none; }
        .proceed:focus{outline:none;box-shadow: inset 0px 0px 5px white;}
        .sendicon{filter:invert(100%); padding-top:2px;}

        .card_label{
        font-size: 15px;
        font-weight: 500;
        }
        p{color: black}

        @media (max-width: 600px){
            .proceed{transform:translate(250px, 10px);}
            .col{display:block; margin:auto; width:100%; text-align:center;}
        }

    </style>
    <link rel="stylesheet" href="{{asset('css/toastr.css')}}">

@endsection
@section('content')

    <div style="padding-bottom: 10%;" class="page-content-wrapper" id="app">

        <div class="container-fluid">

        <form class="form" method="POST" novalidate action="{{action('PaymentsController@purchase_scuderia')}}" enctype="multipart/form-data">
            @csrf

            <div class="container" style="margin-top:10%">
                <div class="card" style="border: 0.05px solid #ffffff69;">
                    <button class="proceed"><svg class="sendicon" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
                        </svg></button>
                    <img src="https://seeklogo.com/images/V/VISA-logo-62D5B26FE1-seeklogo.com.png" class="logo-card">
                    <label>Card number:</label>
                    <input id="user" type="text" class="input cardnumber"  placeholder="1234 5678 9101 1121">
                    <label>Name:</label>
                    <input class="input name "  placeholder="{{logged_in()->name}}">
                    <label class="toleft">CVV:</label>
                    <input class="input toleft ccv" placeholder="***">
                </div>
                <div class="receipt">

                    <div class="d-flex align-items-center justify-content-between">
                    <div class="col" style="z-index: 1566516511651656511651165165651651; margin-right: 33px;">
                        <p class="card_label">Amount:</p>
                        <input style="height: calc(1.5em + .75rem + 1px)!important;" type="text" name="amount"  value="" class="form-control ">
                        <br>
                        <p class="card_label">Name:</p>
                        <h3 class="seller text-capitalize">{{logged_in()->name}}</h3>
                        <br>
                        <p class="card_label">Email:</p>
                        <h3 class="seller ">{{logged_in()->email}}</h3>
                    </div>
                    <div class="col">
                        <p class="card_label">Country:</p>
                        <h3 class="bought-items cost">IT</h3>
                        <br>
                        <p class="card_label">City:</p>
                        <h3 class="bought-items text-capitalize cost">{{logged_in()->city}}</h3>
                        <br>
                        <p class="card_label">ZIP Code:</p>
                        <h3 class="seller text-capitalize">{{logged_in()->postal_code}}</h3>
                    </div>
                    </div>

                    <div class="input-group fieldset-expiration">
                        <input style="border: 1px solid rgba(0, 0, 0, 0.3); box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.2);" type="text" hidden name="id"   value="{{logged_in()->id}}" class="form-control " aria-label="Text input with dropdown button">
                    </div>

                    <div class="input-group fieldset-expiration">
                        <input style="border: 1px solid rgba(0, 0, 0, 0.3); box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.2);" type="text" hidden name="name"   value="{{explode(' ', logged_in()->name, 2)[0]}}" class="form-control " aria-label="Text input with dropdown button">
                    </div>


                    <div class="input-group fieldset-expiration">
                        <input style="border: 1px solid rgba(0, 0, 0, 0.3); box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.2);" type="text" hidden name="lastName"   value="{{explode(' ', logged_in()->name, 2)[1]}}" class="form-control " aria-label="Text input with dropdown button">
                    </div>

                    <div class="input-group fieldset-expiration">
                        <input style="border: 1px solid rgba(0, 0, 0, 0.3); box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.2);" type="text" hidden name="email"   value="{{logged_in()->email}}" class="form-control " aria-label="Text input with dropdown button">
                    </div>

                    <div class="input-group fieldset-expiration">
                        <input style="border: 1px solid rgba(0, 0, 0, 0.3); box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.2);" type="text" hidden name="country"   value="IT" class="form-control " aria-label="Text input with dropdown button">
                    </div>

                    <div class="input-group fieldset-expiration">
                        <input style="border: 1px solid rgba(0, 0, 0, 0.3); box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.2);" type="text" hidden name="address"  value="{{logged_in()->address}}" class="form-control " aria-label="Text input with dropdown button">
                    </div>

                    <div class="input-group fieldset-expiration">
                        <input style="border: 1px solid rgba(0, 0, 0, 0.3); box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.2);" type="text" hidden name="city"  value="{{logged_in()->city}}" class="form-control " aria-label="Text input with dropdown button">
                    </div>

                    <div class="input-group fieldset-expiration">
                        <input style="border: 1px solid rgba(0, 0, 0, 0.3); box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.2);" type="text" hidden name="zipCode"  value="{{logged_in()->postal_code}}" class="form-control " aria-label="Text input with dropdown button">
                    </div>

                    <button type="submit" style="margin-top:50px!important;" class="btn_credit_Card"><i class="fa fa-lock"></i> submit</button>
                    @if ($errors->any())
                        <div class="text-danger font-20">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>

            </form>
        </div>
    </div>


    <!-- END wrapper -->



    <!-- Central Modal Medium Success-->

@endsection

@section('scripts')

@endsection

@extends('layouts.app')




<style type="text/css">


     .display-flex, .signup-content, .form-row, .label-flex, .form-radio-group{
        display: flex;
    display: -webkit-flex;
     }

    a:focus, a:active {
    text-decoration: none;
    outline: none;
    transition: all 300ms ease 0s;
    -moz-transition: all 300ms ease 0s;
    -webkit-transition: all 300ms ease 0s;
    -o-transition: all 300ms ease 0s;
    -ms-transition: all 300ms ease 0s; }
    
    input, select, textarea {
    outline: none;
    appearance: unset !important;
    -moz-appearance: unset !important;
    -webkit-appearance: unset !important;
    -o-appearance: unset !important;
    -ms-appearance: unset !important; }
    
    input::-webkit-outer-spin-button, input::-webkit-inner-spin-button {
    appearance: none !important;
    -moz-appearance: none !important;
    -webkit-appearance: none !important;
    -o-appearance: none !important;
    -ms-appearance: none !important;
    margin: 0; }
    
    input:focus, select:focus, textarea:focus {
    outline: none;
    box-shadow: none !important;
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    -o-box-shadow: none !important;
    -ms-box-shadow: none !important; }
    
    input[type=checkbox] {
    appearance: checkbox !important;
    -moz-appearance: checkbox !important;
    -webkit-appearance: checkbox !important;
    -o-appearance: checkbox !important;
    -ms-appearance: checkbox !important; }
    
    input[type=radio] {
    appearance: radio !important;
    -moz-appearance: radio !important;
    -webkit-appearance: radio !important;
    -o-appearance: radio !important;
    -ms-appearance: radio !important; }
    
    input:-webkit-autofill {
    box-shadow: 0 0 0 30px transparent inset;
    -moz-box-shadow: 0 0 0 30px transparent inset;
    -webkit-box-shadow: 0 0 0 30px transparent inset;
    -o-box-shadow: 0 0 0 30px transparent inset;
    -ms-box-shadow: 0 0 0 30px transparent inset;
    background-color: transparent !important; }
    
    img {
    max-width: 100%;
    height: auto; }
    
    figure {
    margin: 0; }
    
    p {
    margin: 0px;
    font-weight: 600;
    color: #fff; }
    
    h2 {
    line-height: 1.2;
    margin: 0;
    padding: 0;
    font-weight: 900;
    color: #fff;
    font-size: 26px;
    text-transform: uppercase;
    margin-bottom: 10px; }
    
    .clear {
    clear: both; }
    
    body {
    font-size: 14px;
    line-height: 1.8;
    color: #222;
    font-weight: 500;
    margin: 0px;
    background: #282828!important;
    padding: 100px 0px 0px 0px;
    }
    
    .main {
    position: relative; }
    
    .container {
    width: 1400px!important;
    max-width: 1400px!important;
    margin: 0 auto;
    background: #fff;
    padding: 0!important; }
    
    .signup-img {
    position: relative;
    width: 385px; }
    
    .signup-form {
    width: 1015px;
    margin-top: -2px;
    display: flex;
    align-items: center;
    justify-content: center;
    }
    
    .signup-img-content {
    padding: 0 8px;    
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
    -o-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    text-align: center;
    width: 100%; }
    
    .register-form {
    padding: 55px 115px 55px 80px;
    margin-bottom: -8px; 
    width: 100%;
    } 
    
    .form-row {
    margin: 0 -30px; }
    
    .form-row .form-group {
    width: 50%;
    padding: 0 30px; }
    
    .form-input, .form-select, .form-radio {
    margin-bottom: 23px; }
    
    label, input {
    display: block;
    width: 100%; }
    
    label {
    font-weight: bold;
    text-transform: uppercase;
    margin-bottom: 7px; }
    
    label.required {
    position: relative; }
    
    label.required:after {
    content: '*';
    margin-left: 2px;
    color: #b90000; }
    
    input {
    box-sizing: border-box;
    border: 1px solid #ebebeb;
    padding: 14px 20px;
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    -o-border-radius: 5px;
    -ms-border-radius: 5px;
    font-size: 14px; }
    input:focus {
    border: 1px solid #329e5e; }

    select{
        box-sizing: border-box;
    border: 1px solid #ebebeb;
    padding: 14px 20px;
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    -o-border-radius: 5px;
    -ms-border-radius: 5px;
    font-size: 14px;
    width: 100%;
    color: #434343;
    }
    
    .label-flex {
    justify-content: space-between;
    -moz-justify-content: space-between;
    -webkit-justify-content: space-between;
    -o-justify-content: space-between;
    -ms-justify-content: space-between; }
    
    .label-flex label {
    width: auto; }
    
    .form-link {
    font-size: 12px;
    color: #222;
    text-decoration: none;
    position: relative; }
    .form-link:after {
    position: absolute;
    content: "";
    width: 100%;
    height: 2px;
    background: #d7d7d7;
    left: 0;
    bottom: 12px; }
    
    .form-radio {
    margin-bottom: 18px; }
    .form-radio input {
    width: auto;
    display: inline-block; }
    
    .radio-label {
    padding-right: 72px; }
    
    .form-radio-group {
    padding-bottom: 10px;
    padding-top: 12px; }
    
    .form-radio-item {
    position: relative;
    margin-right: 30px; }
    .form-radio-item label {
    font-weight: 500;
    padding-left: 30px;
    position: relative;
    z-index: 9;
    display: block;
    cursor: pointer;
    text-transform: none; }
    
    .check {
    display: inline-block;
    position: absolute;
    border: 1px solid #ebebeb;
    border-radius: 50%;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    -o-border-radius: 50%;
    -ms-border-radius: 50%;
    height: 18px;
    width: 18px;
    top: 2px;
    left: 0px;
    z-index: 5;
    transition: border .25s linear;
    -webkit-transition: border .25s linear; }
    .check:before {
    position: absolute;
    display: block;
    content: '';
    width: 12px;
    height: 12px;
    border-radius: 50%;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    -o-border-radius: 50%;
    -ms-border-radius: 50%;
    top: 3px;
    left: 3px;
    margin: auto;
    transition: background 0.25s linear;
    -webkit-transition: background 0.25s linear; }
    
    input[type=radio] {
    position: absolute;
    visibility: hidden; }
    input[type=radio]:checked ~ .check {
    border: 1px solid #329e5e; }
    input[type=radio]:checked ~ .check::before {
    background: #329e5e; }
    
    ul {
    background: 0 0;
    position: relative;
    z-index: 9;
    border: 1px solid #ebebeb;
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    -o-border-radius: 5px;
    -ms-border-radius: 5px; }
    
    ul li {
    padding: 13px 20px;
    z-index: 2;
    color: #222; }
    
    ul li:not(.init) {
    background: #fff;
    color: #222;
    padding: 5px 10px; }
    
    ul li:not(.init):hover, ul li.selected:not(.init) {
    background: #329e5e;
    color: #fff; }
    
    li.init {
    cursor: pointer;
    position: relative; }
    li.init:after {
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    -moz-transform: translateY(-50%);
    -webkit-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    font-size: 22px;
    color: #222;
    content: '\f2f2'; }
    
    #slider-margin {
    height: 5px;
    border: none;
    box-shadow: none;
    -moz-box-shadow: none;
    -webkit-box-shadow: none;
    -o-box-shadow: none;
    -ms-box-shadow: none;
    background: #f8f8f8;
    border-radius: 2.5px;
    -moz-border-radius: 2.5px;
    -webkit-border-radius: 2.5px;
    -o-border-radius: 2.5px;
    -ms-border-radius: 2.5px; }
    #slider-margin .noUi-connect {
    background: #329e5e; }
    #slider-margin .noUi-handle {
    width: 100px;
    height: 30px;
    top: -12px;
    background: #329e5e;
    box-shadow: 0px 3px 2.85px 0.15px rgba(0, 0, 0, 0.1);
    -moz-box-shadow: 0px 3px 2.85px 0.15px rgba(0, 0, 0, 0.1);
    -webkit-box-shadow: 0px 3px 2.85px 0.15px rgba(0, 0, 0, 0.1);
    -o-box-shadow: 0px 3px 2.85px 0.15px rgba(0, 0, 0, 0.1);
    -ms-box-shadow: 0px 3px 2.85px 0.15px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    -o-border-radius: 5px;
    -ms-border-radius: 5px;
    outline: none;
    border: none;
    right: -50px; }
    #slider-margin .noUi-handle:after, #slider-margin .noUi-handle:before {
      background: transparent;
      height: 0px;
      width: 20px;
      top: -2px;
      font-size: 18px;
      outline: none; }
    #slider-margin .noUi-handle:before {
      color: #fff;
      content: '\f2fa';
      left: 10px; }
    #slider-margin .noUi-handle:after {
      color: #fff;
      content: '\f2fb';
      left: auto;
      right: -5px; }
    #slider-margin .noUi-handle .noUi-tooltip {
      bottom: 2px;
      border: none;
      background: transparent;
      font-weight: bold;
      color: #fff;
      padding: 0px; }
    
    .donate-us {
    margin-bottom: 93px;
    margin-top: 30px; }
    .donate-us label {
    margin-bottom: 32px; }

    .register-logo{
            display: none;
          
        }   
    

    .form-submit {
    text-align: right; }
    
    .submit {
    width: 150px;
    height: 50px;
    display: inline-block;
    font-weight: bold;
    font-size: 14px;
    padding: 10px;
    border: none;
    cursor: pointer;
    text-transform: uppercase;
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    -o-border-radius: 5px;
    -ms-border-radius: 5px; }
    
    #reset {
    background: #fff;
    color: #999;
    border: 2px solid #ebebeb; }
    #reset:hover {
    border: 2px solid #329e5e;
    background: #329e5e;
    color: #fff; }
    
    #submit {
    background: linear-gradient(to right, #4b79a1, #283e51);
    color: #fff;
    margin-right: 25px; }
    #submit:hover {
    background: linear-gradient(to left, #4b79a1, #283e51); }
    
    .form-input {
    position: relative; }

    .register-paragraph{
    
    font-weight: 100;
    text-transform: uppercase;
    font-size: .9rem;
    
    }
    
    label.error {
    display: block;
    position: absolute;
    top: 0px;
    right: 0; }
    label.error:after {
    position: absolute;
    content: '\f1f8';
    right: 20px;
    top: 37px;
    font-size: 23px;
    color: #c70000; }
    
    input.error {
    border: 1px solid #c70000; }
    
    .select-list {
    position: relative;
    display: inline-block;
    width: 100%;
    margin-bottom: 47px; }
    
    .list-item {
    position: absolute;
    width: 100%;
    z-index: 99; }
    
    @media screen and (max-width: 1024px) {
    .container {
    width: calc( 100% - 30px);
    max-width: 100%!important;
    margin: 0 auto; }
    
    .signup-img {
    display: none; }
    
    .signup-form {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    }
    
    .register-form {
    padding: 55px 80px 55px 80px; } }
    @media screen and (max-width: 992px) {
    .signup-content {
    width: 100%; }
    
    .form-radio-item {
    margin-right: 15px; }
    
    .register-form {
    padding: 55px 80px 55px 30px; } }
    @media screen and (max-width: 768px) {


    body{
         padding: 0;
         background: white!important
     }  

     .signup-form{
            flex-direction: column;
        }
    
        .register-logo{
            display: block;
            text-align: center;
            width: 225px;
            margin-top: 50px;
        }   



    .form-row {
    flex-direction: column;
    -moz-flex-direction: column;
    -webkit-flex-direction: column;
    -o-flex-direction: column;
    -ms-flex-direction: column;
    margin: 0px; }
    
    .form-row .form-group {
    width: 100%;
    padding: 0 0px; } }
    
    @media screen and (max-width: 480px) {  

    
     body{
         padding: 0;
         background: #fff;
     }   

    .submit {
    width: 100%; }
    
    #submit {
    margin-bottom: 20px;
    margin-right: 0px; }
    
    .form-radio-group {
    flex-direction: column;
    -moz-flex-direction: column;
    -webkit-flex-direction: column;
    -o-flex-direction: column;
    -ms-flex-direction: column; }
    
    .break{
    display: none;
    }  
    
    }
    
    </style>



@section('content')

<body>

 
<div class="main">

    <div class="container">
        <div class="signup-content">
            <div class="signup-img" style="background-image: linear-gradient(45deg, #22313e8a, #1515159e),url({{asset('images/register-img.jpg')}}); background-size: cover;">
                <div class="signup-img-content">
                    <h2>Register now </h2>
                    <p class="register-paragraph">We are almost done. Before using our services you need to create an account.</p>
                </div>
            </div>
            <div class="signup-form">

                <img src="{{asset('images/26.png')}}" alt="" class="register-logo">

                <form method="POST" action="{{ route('register') }}" class="register-form" id="register-form">
                    @csrf
                    <div class="form-row">
                        <input type="hidden" name="account_id" value="starter">
                        <div class="form-group">
                            <div class="form-input">
                                <label for="first_name" class="required">Full Name</label>
                                <input type="text" name="name" type="text" required="" value="{{ old('name') }}" placeholder="Full Name" id="full_name" />
                            </div>
                            <div class="form-input">
                                <label for="last_name" class="required">Email</label>
                                <input type="text" name="email" type="email" value="{{ old('email') }}" required="" placeholder="Email" id="email" />
                            </div>
                            <div class="form-input">
                                <label for="company" class="required">Password</label>
                                <input name="password" type="password" required="" placeholder="Password" id="password" />
                            </div>
                            <div class="form-input">
                                <label for="email" class="required">Retype Password</label>
                                <input name="password_confirmation" type="password" required="" placeholder="Retype your Password" id="confirmation" />
                            </div>
                            <div class="form-input">
                                <label for="phone_number" class="required">Promo Code</label>
                                <input type="text" type="number" name="promo_code" value="{{ old('promo_code') }}" placeholder="Promo Code" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-select">
                                <div class="label-flex">
                                    <label for="meal_preference">Country</label>
                                </div>
                                <div class="form-input">
                                    <select name="country" value="{{ old('country') }}" placeholder="Country" onchange="myFunction()" class="">
                                        <option hidden value="">Please choose an option</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Canada">Canada</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-input">
                                <label for="phone_number" class="required">Country Code</label>
                                <input type="text" name="country_code" id="country_code"  type="number" required="" value="{{ old('country_code') }}" placeholder="Country Code" />
                            </div>
                           
                            <div class="form-input">
                                <label for="chequeno">Phone</label>
                                <input type="text" name="phone" type="number" required="" value="{{ old('phone') }}" placeholder="Phone Number" id="chequeno" />
                            </div>
                            <div class="form-input">
                                <label for="blank_name">City</label>
                                <input type="text" name="city" type="text" required="" value="{{ old('city') }}" placeholder="City" />
                            </div>
                            <div class="form-input">
                                <label for="payable">Address</label>
                                <input type="text" name="address" type="text" required="" value="{{ old('address') }}" placeholder="Address" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="over_18" id="customCheck1" value="1" aria-checked="true">
                                    <label style="font-size:0.9rem;" class="custom-control-label font-weight-normal" for="customCheck1">I am over 18 years old</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="accept_terms" id="customCheck2" value="1" aria-checked="true">
                                    <label style="font-size:0.9rem;" class="custom-control-label font-weight-normal" for="customCheck2">I accept <a target="_blank" href="https://bitfex-ltd.com/terms-conditions" class="text-primary">Terms and Conditions</a></label>
                                </div>
                            </div>
                        </div>  
                    </div>
                    
                    <div class="form-submit">
                        <input type="submit" value="Submit" class="submit" id="submit" name="submit" />
                    </div>

                    <div class="row">
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
                    
                </form>
            </div>
        </div>
    </div>

</div>
</body>




<script src="{{asset('js/jquery.min.js')}}"></script>


<!-- JS -->


<script>
   
    (function($) {
    
    $('#meal_preference').parent().append('<ul class="list-item" id="newmeal_preference" name="meal_preference"></ul>');
    $('#meal_preference option').each(function(){
        $('#newmeal_preference').append('<li value="' + $(this).val() + '">'+$(this).text()+'</li>');
    });
    $('#meal_preference').remove();
    $('#newmeal_preference').attr('id', 'meal_preference');
    $('#meal_preference li').first().addClass('init');
    $("#meal_preference").on("click", ".init", function() {
        $(this).closest("#meal_preference").children('li:not(.init)').toggle();
    });
    
    var allOptions = $("#meal_preference").children('li:not(.init)');
    $("#meal_preference").on("click", "li:not(.init)", function() {
        allOptions.removeClass('selected');
        $(this).addClass('selected');
        $("#meal_preference").children('.init').html($(this).html());
        allOptions.toggle();
    });
    
    })(jQuery);
    
    </script>



@endsection

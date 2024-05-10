@extends('layouts.dashboard')
@section('style')
    <link rel="stylesheet" href="{{asset('css/toastr.css')}}">

    <style>
.page-content {
	width: 100%;
	margin:  0 auto;
	display: flex;
	display: -webkit-flex;
	justify-content: center;
	-o-justify-content: center;
	-ms-justify-content: center;
	-moz-justify-content: center;
	-webkit-justify-content: center;
	align-items: center;
	-o-align-items: center;
	-ms-align-items: center;
	-moz-align-items: center;
	-webkit-align-items: center;
}
.form-v4-content  {
	background: #fff;
	width: 80%;
	border-radius: 10px;
	-o-border-radius: 10px;
	-ms-border-radius: 10px;
	-moz-border-radius: 10px;
	-webkit-border-radius: 10px;
	box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
	-o-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
	-ms-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
	-moz-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
	-webkit-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
	margin: 175px 0;
	position: relative;
	display: flex;
	display: -webkit-flex;
	font-family: 'Open Sans', sans-serif;
}
.form-v4-content h2 {
	font-weight: 700;
	font-size: 30px;
	padding: 6px 0 0;
	margin-bottom: 34px;
}
.form-v4-content .form-left {
    background: linear-gradient(to bottom, #141e30, #243b55);
    border-top-left-radius: 10px;
	border-bottom-left-radius: 10px;
	padding: 20px 40px;
	position: relative;
	width: 100%;
	color: #fff;
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.form-v4-content .form-left p {
	font-size: 15px;
	font-weight: 300;
	line-height: 1.5;
}
.form-v4-content .form-left span {
	font-weight: 700;
}
.form-v4-content .form-left .text-2 {
	margin: 20px 0 25px;
}
.form-v4-content .form-left .account {
	background: #fff;
	border-top-left-radius: 5px;
	border-bottom-right-radius: 5px;
	width: 180px;
	border: none;
	margin: 15px 0 50px 0px;
	cursor: pointer;
	color: #333;
	font-weight: 700;
	font-size: 15px;
	font-family: 'Open Sans', sans-serif;
	appearance: unset;
    -moz-appearance: unset;
    -webkit-appearance: unset;
    -o-appearance: unset;
    -ms-appearance: unset;
    outline: none;
    -moz-outline: none;
    -webkit-outline: none;
    -o-outline: none;
    -ms-outline: none;
}
.form-v4-content .form-left .account:hover {
	background: #e5e5e5;
}
.form-v4-content .form-left .form-left-last input {
	padding: 15px;
}
.form-v4-content .form-detail {
    padding: 20px 40px;
	position: relative;
	width: 100%;
}
.form-v4-content .form-detail h2 {
	color: #3786bd;
}
.form-v4-content .form-detail .form-group {
	display: flex;
	display: -webkit-flex;
	margin:  0 -8px;
}
.form-v4-content .form-detail .form-row {
	width: 100%;
	position: relative;
}
.form-v4-content .form-detail .form-group .form-row.form-row-1 {
	width: 50%;
	padding: 0 8px;
}
.form-v4-content .form-detail label {
	font-weight: 600;
	font-size: 15px;
	color: #666;
	display: block;
	margin-bottom: 8px;
}
.form-v4-content .form-detail .form-row label#valid {
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    -o-transform: translateY(-50%);
    -moz-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    -webkit-transform: translateY(-50%);
    width: 14px;
    height: 14px;
    border-radius: 50%;
    -o-border-radius: 50%;
    -ms-border-radius: 50%;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    background: #53c83c;
}
.form-v4-content .form-detail .form-row label#valid::after {
	content: "";
    position: absolute;
    left: 5px;
    top: 1px;
    width: 3px;
    height: 8px;
    border: 1px solid #fff;
    border-width: 0 2px 2px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    -o-transform: rotate(45deg);
    -moz-transform: rotate(45deg);
    transform: rotate(45deg);
}
.form-v4-content .form-detail .form-row label.error {
	padding-left: 0;
	margin-left: 0;
    display: block;
    position: absolute;
    bottom: -5px;
    width: 100%;
    background: none;
    color: red;
}
.form-v4-content .form-detail .form-row label.error::after {
    content: "\f343";
    font-family: "LineAwesome";
    position: absolute;
    transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    -o-transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
    right: 10px;
    top: -31px;
    color: red;
    font-size: 18px;
    font-weight: 900;
}
.form-v4-content .form-detail .input-text {
	margin-bottom: 27px;
}
.form-v4-content .form-detail input {
	width: 100%;
    padding: 11.5px 15px;
    border: 1px solid #e5e5e5;
    border-top-left-radius: 5px;
    border-bottom-right-radius: 5px;
    appearance: unset;
    -moz-appearance: unset;
    -webkit-appearance: unset;
    -o-appearance: unset;
    -ms-appearance: unset;
    outline: none;
    -moz-outline: none;
    -webkit-outline: none;
    -o-outline: none;
    -ms-outline: none;
    font-family: 'Open Sans', sans-serif;
    font-size: 15px;
    color: #333;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -o-box-sizing: border-box;
    -ms-box-sizing: border-box;
}
.form-v4-content .form-detail .form-row input:focus {
	border: 1px solid #53c83c;
}
.form-v4-content .form-detail .form-checkbox {
	margin-top: 1px;
	position: relative;
}
.form-v4-content .form-detail .form-checkbox input {
	width: 18px;
    height: 18px;
    padding: 0;
    border: 1px solid;
    border-radius: 0;
}
.form-v4-content .form-detail .form-checkbox .checkmark {
	
    height: 15px;
    width: 15px;
    border: 1px solid #ccc;
    cursor: pointer;
}
.form-v4-content .form-detail .form-checkbox .checkmark::after {
	content: "";
    position: absolute;
    left: 5px;
   	top: 1px;
    width: 3px;
    height: 8px;
    border: 1px solid #3786bd;
    border-width: 0 2px 2px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    -o-transform: rotate(45deg);
    -moz-transform: rotate(45deg);
    transform: rotate(45deg);
    display: none;
}
.form-v4-content .form-detail .form-checkbox input:checked ~ .checkmark::after {
    display: block;
}
.form-v4-content .form-detail .form-checkbox p {
    margin-left: 34px;
    color: #333;
    font-size: 14px;
    font-weight: 600;
}
.form-v4-content .form-detail .form-checkbox .text {
	font-weight: 700;
	color: #3786bd;
	text-decoration: underline;
}
.form-v4-content .form-detail .register {
	background: #3786bd;
	border-top-left-radius: 5px;
	border-bottom-right-radius: 5px;
	width: 130px;
	border: none;
	margin: 6px 0 50px 0px;
	cursor: pointer;
	color: #fff;
	font-weight: 700;
	font-size: 15px;
}
.form-v4-content .form-detail .register:hover {
	background: #2f73a3;
}
.form-v4-content .form-detail .form-row-last input {
	padding: 12.5px;
}

/* Responsive */
@media screen and (max-width: 991px) {
	.form-v4-content {
		margin: 180px 20px;
		flex-direction:  column;
		-o-flex-direction:  column;
		-ms-flex-direction:  column;
		-moz-flex-direction:  column;
		-webkit-flex-direction:  column;
	}
	.form-v4-content .form-left {
		width: auto;
		border-top-right-radius: 10px;
		border-bottom-left-radius: 0;
	}
	.form-v4-content .form-detail {
		padding: 30px 20px 30px 20px;
	    width: auto;
	}
}
@media screen and (max-width: 575px) {
	.form-v4-content .form-detail .form-group {
		flex-direction: column;
		-o-flex-direction:  column;
		-ms-flex-direction:  column;
		-moz-flex-direction:  column;
		-webkit-flex-direction:  column;
		margin: 0;
	}
	.form-v4-content .form-detail .form-group .form-row.form-row-1 {
		width: 100%;
		padding:  0;
	}
}


.custom_select{
    width: 100%;
    padding: 13px 15px;
    border: 1px solid #e5e5e5;
}
    
    </style>
@endsection
@section('content')


    <div style="padding-bottom: 2%;" class="page-content-wrapper">

        <div class="container-fluid">



            {{-- @if(!(logged_in()->can_withdraw))

            <div id="ac-wrapper">
                <div id="popup">
                        <i style="font-size: 95px;padding-top:45px;color: #009688;" class="fas fa-university"></i>
                        <h3 style="color: black">Notifica importante!</h3>
                        <br>
                        <h5 style="color: #4d5252;padding: 0 31px;">Prima di fare una richiesta di prelievo si metta in contatto con il suo Financial Manager o l'ufficio Customer Service per guidarla al meglio.</h5>
                </div>
            </div>

            @endif --}}


            {{-- <div class="row">
                <div class="col-sm-8 deposit_form">
                    <h3 class="deposit_header">{{__('Withdraw')}}</h3>
                </div>
            </div> --}}


{{-- 
            <div class="row">
                <div class="col-sm-8 withdraw_form border_shadow">
                    <div class="withdraw_header">
                        <h2 class="withdraw_heading">{{__('Withdrawal Request Form')}}</h2>

                        <button type="button" class="btn btn_withdraws btn-primary" data-toggle="modal" data-target="#withdraws_list">
                            {{__('My Withdraws')}}
                         </button>
                     </div>
                     <div class="withdraw_description">
                         <p>
                             {{__('To withdraw funds, fully complete this online form or print and physically sign this Withdrawal Request Form. Withdrawal requests are processed typically within two (2) business days of receipt of this form. If you want to physically sign this form please email your completed form to customer@any1oin.com')}}
                        </p>
                        <p class="bold">
                            {{__('This form must be fully completed including a full address. All information requested below must be provided to avoid errors or delays in processing.  will not be held responsible for delays caused by incorrect information provided by the customer')}}.
                        </p>
                    </div>



                    <form class=" form-horizontal" method="POST" novalidate action="{{action('DepositController@storeWithdraw')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="withdraw_details">
                            <h5 class="text-uppercase">{{__('Withdrawal Details')}}</h5>
                            <hr class="withdraw_separator">
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <span style="font-size: 1rem;margin-top: 1rem;">{{__('Amount you want to withdraw')}}:</span>
                                <input id="amount" class="form-control" type="text" required="" value="{{old('amount')}}" name="amount" placeholder="{{__('Amount')}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <span style="font-size: 1rem;margin-top: 1rem;">{{__('Reason for withdrawal')}}:</span>
                                <textarea class="form-control" type="text" required="" name="reason"  placeholder="{{__('Reason')}}" rows="9">{{old('reason')}}</textarea>
                            </div>
                        </div>

                        <div class="withdraw_details">
                     
                            <hr class="withdraw_separator">
                        </div>


                        <div class="form-group row">
                            <div class="col-12">
                                <span style="font-size: 1rem;margin-top: 1rem;">{{__("Today's Date")}}:</span>
                                <input disabled type="text" class="withdraw_date" name="withdrawal_date"
                                       value="{{now()->format('d/m/Y')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <span style="font-size: 1rem;margin-top: 1rem;">{{__('Customer Full Name')}}:</span>
                                <input class="form-control" type="text" required="" placeholder="{{__('Full Name')}}"  value="{{old('name')}}" name="name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <span style="font-size: 1rem;margin-top: 1rem;">{{__('Customer Address')}}:</span>
                                <input class="form-control" type="text" required="" placeholder="{{__('Address')}}"  value="{{old('address')}}" name="address">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <span style="font-size: 1rem;margin-top: 1rem;">{{__('Customer Phone Number')}}:</span>
                                <input class="form-control" type="text" required="" placeholder="{{__('Phone Number')}}"  value="{{old('phone')}}" name="phone">
                            </div>
                        </div>



                        <div class="row">

                            <div class="col-sm-12">
                                <div class="withdraw_details">
                                    <h5>{{__('RECEIVING SOURCE INFORMATION')}}</h5>
                                    <hr class="withdraw_separator">
                                </div>


                                <div class="form-group row">
                                    <div class="col-12">
                                        <span style="font-size: 1rem;margin-top: 1rem;">{{__('Bank Name')}}:</span>
                                        <input class="form-control" type="text" required="" placeholder=""  value="{{old('bank_name')}}" name="bank_name">
                                        <input class="form-control" type="text" hidden placeholder=""  value="{{logged_in()->mt4_account}}" name="account_id">
                                        <input class="form-control" type="text" hidden placeholder=""  value="bank" name="method">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12">
                                        <span style="font-size: 1rem;margin-top: 1rem;">{{__('Sort Code, ABA # or Swift Code')}}:</span>
                                        <input class="form-control" type="text" required="" placeholder=""  value="{{old('code')}}" name="code">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <span style="font-size: 1rem;margin-top: 1rem;">IBAN # :</span>
                                        <input class="form-control" type="text" required="" placeholder=""  value="{{old('iban')}}" name="iban">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <span style="font-size: 1rem;margin-top: 1rem;">{{__('Bank Address')}} :</span>
                                        <input class="form-control" type="text" required="" placeholder=""  value="{{old('bank_address')}}" name="bank_address">
                                    </div>
                                </div>
                            </div>



                        </div>




                        <div class="row">

                            <div class="col-sm-12">
                                <div class="withdraw_details">
                                    <h5 class="text-uppercase">{{__('Customer Approval')}}</h5>
                                    <hr class="withdraw_separator">
                                </div>

                                <div class="form-group row">
                                    <div class="col-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1" name="accept_deposit">
                                            <label style="font-size:0.9rem;" class="custom-control-label font-weight-normal" for="customCheck1">{{__('I have read and accept')}} <a href="#" class="text-primary">{{__('Deposit & Withdraw Policy')}}</a></label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2" name="accept_terms">
                                            <label style="font-size:0.9rem;" class="custom-control-label font-weight-normal" for="customCheck2">{{__('I have read and accept')}} <a href="#" class="text-primary">{{__('Terms and Conditions')}}</a></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group text-center row m-t-20">
                                    <div class="col-7 centered">
                                        <button class="btn btn_custom btn-block waves-effect waves-light text-uppercase" type="submit">{{__('Submit')}}</button>
                                    </div>
                                </div>



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
                    </form>

                </div>


            </div> --}}






            <div class="page-content">
                <div class="form-v4-content">
                    <div class="form-left">
                        <h2>INFORMATION</h2>
                        <p class="text-1">
                         
                            Want to withdraw funds from your account? No problem! Customers may withdraw funds from their account at any time. 
                            Funds can be withdrawn up to the value of the balance of your BITFEX LIMITED account, minus the amount of margin used.   
                            
                        </p>
                        <p class="text-2">
                            Funds are withdrawn using the same method, and sent to the same account, as previously used for your deposit.
                           
                            <br> <br>
                            
                            <span style="font-style: italic; font-weight:200">
                                *Please note you will be asked to provide an alternative payment method if we are unable to return your funds via your original deposit method.
                            </span>
                        </p>
                       
                    </div>
                    <form class="form-detail" method="POST" novalidate action="{{action('DepositController@storeWithdraw')}}" enctype="multipart/form-data" id="myform">
                        @csrf
                        <h2>WITHDRAW FORM</h2>
                        <div class="form-group">
                            <div class="form-row">
                                <label for="first_name">Amount</label>
                                <input type="text" name="amount" id="amount" class="input-text">
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="your_email">Beneficary Name</label>
                            <input type="text" name="beneficary_name" id="name" class="input-text" required >
                        </div>
                        <div class="form-row">
                            <div class="form-row form-row-1 ">
                                <label for="bank_name">Bank Name</label>
                                <input type="text" name="bank_name" id="bank_name" class="input-text" required>
                            </div>
                        </div>
                        <div class="form-row">    
                            <div class="form-row form-row-1">
                                <label for="swift-password">Swift Code</label>
                                <input type="text" name="swift" id="swift" class="input-text" required>
                            </div>
                        </div>
                        <div class="form-row">    
                            <div class="form-row form-row-1">
                                <label for="iban">IBAN</label>
                                <input type="text" name="iban" id="iban" class="input-text" required>
                            </div>
                        </div>
                        <div class="form-row">    
                            <div class="form-row form-row-1">
                                <label for="bank_address-password">Bank Address</label>
                                <input type="text" name="bank_address" id="swift" class="input-text" required>
                            </div>
                        </div>
                      
                        <div class="form-checkbox d-flex align-items-center mb-3">
                            <input type="checkbox" name="checkbox">
                            <label class="container" style="margin: 0"><p style="margin: 0 5px">I agree to the Terms and Conditions</p>
                                  
                            </label>
                        </div>
                        <div class="form-row-last">
                            <input type="submit"  class="register">
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>



@endsection

@section('scripts')

    <!-- Required datatable js -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.css"/>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>
    <!-- Datatable init js -->
    <script src="{{asset('pages/datatables.init.js')}}"></script>
    <script src="{{asset('js/toastr.min.js')}}"></script>

    <script>
        var vm = new Vue({
            el: '#app',
            mounted: function () {
                console.log('it started');
            },

            data: function () {
                return {
                    password_old:null,
                    password:null,
                    password_confirmation:null,
                    replyErrors:[],
                    output:null,
                    inputDisabled:true,
                    email:null,
                    amount:null,
                    currencyCode:'EUR',
                    full_name_bank:null,
                    email_transaction:null,
                    whatsapp:null,
                    accounts:[],
                    user:{},
                    selectedAccount:{
                        id:null,
                        name:null,
                        slug:null,
                    },
                }
            },
            methods:{
                changePassword:function() {
                    let self=this;

                    self.replyErrors=[];


                    axios.post('{{URL::to('change_password')}}', {
                        password_old:self.password_old,
                        password:self.password,
                        password_confirmation:self.password_confirmation,
                    }).then(function(response) {
                        console.log(response.data);
                        self.output=response.data;
                        {{--window.location.href = '{{URL::to('personal_info/')}}'+'?msg='+response.data;--}}

                    }).catch(function(error) {
                        // self.loading = false;
                        self.replyErrors = error.response.data.errors;
                        console.log(error.response.data);
                        toastr.error("Error changing the password!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
                        window.location.hash='{{URL::to('personal_info/')}}';
                    });
                },

                setWithdrawStatus:function(withdraw_id, status) {
                    let self=this;
                    self.replyErrors=[];

                    axios.post('{{URL::to('withdraw_status')}}', {
                        withdraw_id:withdraw_id,
                        status:status,
                    }).then(function(response) {
                        console.log(response.data);
                        {{--window.location.href = '{{URL::to('personal_info/')}}'+'?msg='+response.data;--}}
                        toastr.success("Withdraw status changed!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
                        window.location.href='{{URL::to('withdraws/')}}';

                    }).catch(function(error) {
                        // self.loading = false;
                        self.replyErrors = error.response.data.errors;
                        console.log(error.response.data);
                        toastr.error("Error changing withdraw status!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
                        window.location.href='{{URL::to('withdraws/')}}';
                    });
                },
            }
        })

    </script>

@endsection

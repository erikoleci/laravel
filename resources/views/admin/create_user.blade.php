@extends('layouts.dashboard')
@section('style')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.3/axios.min.js"></script>
    <link href="{{asset('/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{asset('/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')


    <div class="page-content-wrapper" id="app">

        <div>

            <div class="content-center">
                <div class="content-desc-center">
                    <div class="container2">
                        <div class="row justify-content-center">
                            <div class="col-lg-5 col-md-8">
                                <div class="card register_card">
                                    <div class="register_body card-body">

                                    

                                        <div class="p-3">
                                            <form method="POST" class="form-horizontal m-t-big" action="{{ url('store_user') }}">
                                                @csrf

                                       
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <input class="form-control inputTranparent form_input" name="email" type="email" value="{{ old('email') }}" required="" placeholder="Email">
                                                        <input class="form-control inputTranparent form_input" name="account_id" type="text" value="starter" required="" hidden placeholder="">
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
                                                    <div class="col-4">
                                                        <input class="form-control inputTranparent form_input" name="country_code" type="text" required="" value="{{ old('country_code') }}" placeholder="Country Code">
                                                    </div>
                                                    <div class="col-8">
                                                        <input class="form-control inputTranparent form_input" name="phone" type="number" required="" value="{{ old('phone') }}" placeholder="Phone Number">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <input class="form-control inputTranparent form_input" name="country" type="text" required="" value="{{ old('country') }}" placeholder="Country">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <input class="form-control inputTranparent form_input" name="city" type="text" required="" value="{{ old('city') }}" placeholder="City">
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
                                                        <input class="form-control inputTranparent form_input" type="text" name="promo_code" required="" value="{{ old('promo_code') }}" placeholder="Promo Code">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <div class="custom-control custom-checkbox pb-2">
                                                            <input type="checkbox" class="custom-control-input" name="create_mt4" checked id="create_mt4">
                                                            <label style="font-size:1.1rem;" class="custom-control-label font-weight-normal text-white" for="create_mt4">Create MT4 account</label>
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

    </div> <!-- Page content Wrapper -->


@endsection

@section('scripts')

    <!-- Required datatable js -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.css"/>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>

    <!-- Datatable init js -->
    <script src="{{asset('pages/datatables.init.js')}}"></script>

    <script>

        var vm = new Vue({
            el: '#app',
            mounted: function () {
                this.getAccounts();
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
                        "id": 1,
                        "name": "black panther",
                        "slug": "black_panther",
                        "currency": "eur",
                        "leverage": "1:100",
                        "spread": "0",
                        "volume": "0",
                        "created_at": "2020-02-13 00:00:00",
                        "updated_at": "2020-02-13 00:00:00"
                    },
                }
            },
            methods:{
                enableEditProfile(){
                    this.inputDisabled=false;
                },
                getAccounts(){
                    let self = this;
                    axios.get('/get_all_accounts').then(response => {
                        console.log(response);
                        self.accounts = response.data;
                    });
                },
                getRegisterStyle(account){
                    var img;
                    if (account==='black_panther')
                        img="bp_register.jpg";
                    else if (account==='bull_bear')
                        img="bull_bear-min.jpg";
                    else if (account==='phoenix')
                        img="phoenixx-min.jpg";
                    else if (account==='kings')
                        img="lion5-min.jpg";
                    else
                        img="skyscraper2.jpg";
                    return 'background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0,0,0,0.2)), url({{asset("/images/")}}/'+img+');background-repeat:no-repeat; background-size: cover;background-position: bottom center';
                },

                storeUser(){
                    let self=this;

                    self.replyErrors=[];

                    axios.post('{{URL::to('store_user')}}', {
                        account:self.selectedAccount.slug,

                    }).then(function(response) {
                        console.log(response.data);
                        self.output=response.data;
                        {{--window.location.href = '{{URL::to('personal_info/')}}'+'?msg='+response.data;--}}
                        toastr.success("Account changed!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});

                    }).catch(function(error) {
                        // self.loading = false;
                        self.replyErrors = error.response.data.errors;
                        console.log(error.response.data);
                        toastr.error("Error changing the account!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
                        window.location.hash='{{URL::to('personal_info/')}}';
                    });
                },

                changeAccount:function() {
                    let self=this;

                    self.replyErrors=[];


                    axios.post('{{URL::to('change_account')}}', {
                        user_id:self.user_id,
                        account:self.selectedAccount.slug,
                    }).then(function(response) {
                        console.log(response.data);
                        self.output=response.data;
                        {{--window.location.href = '{{URL::to('personal_info/')}}'+'?msg='+response.data;--}}
                        toastr.success("Account changed!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});

                    }).catch(function(error) {
                        // self.loading = false;
                        self.replyErrors = error.response.data.errors;
                        console.log(error.response.data);
                        toastr.error("Error changing the account!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
                        window.location.hash='{{URL::to('personal_info/')}}';
                    });
                },
            }
        })
    </script>
@endsection
@extends('layouts.dashboard')
@section('style')

    <style>  .transactionsTable input {
            border-radius: 5px;
            border-top: 0;
            border: 1px outset #80767630;
        }

        a{color: #0650a0;}

        .offline {
            color: #0650a0!important;
        }

        body.night a {color: #e6c9a1;}

        body.night .offline {color: #e6c9a1!important;}


        table.dataTable tbody>tr.selected, table.dataTable tbody>tr>.selected {
            background-color: #00396b!important;
        }


        div.dataTables_wrapper div.dataTables_filter input {
            margin-left: 0.5em;
            display: inline-block;
            width: auto;
            border: 1px solid #0650a0;
        }

        .selectedTemplate{
            box-shadow: 0 1px 3px 0 #0487cc;
            border: 1px solid #0487cc;
            border-top-width: 1px !important;
        }

        .dt-buttons{opacity:0;transition: .5s;}
        .dt-buttons:hover{opacity:1;}

        .btn-dark {
            background-color: #0650a0;
            border: 1px solid #0650a0;
            color: #ffffff;
        }

        tr{background: #f3f6f94a;transition: .3s;font-weight: 900;}


        body.night tr{background: #2b44bf42; color: white;}
        body.night thead tr{color:white!important;}
        .table-padded {
            border-collapse: separate;
            border-spacing: 0 .5rem!important;

        }

        tr{background: #f3f6f94a;transition: .3s;}
        .table td, .table th {border-top:0!important;}
        thead tr{background: transparent;border-spacing: 0!important;}
        .table > tbody > tr > td, .table > tfoot > tr > td, .table > thead > tr > td {
            padding: 1.5rem 1rem;
        }


        @media only screen and (min-width: 1600px) {
            th{min-width: 117px;}
        }

        tr:hover{box-shadow: 0 2px 7px rgba(120,130,140,0.3);}

        thead tr{color:black!important;}

        .modal-open .modal{overflow-x:auto!important;}

        .signup-img {
            position: relative;
            width: 385px;
            color:white;
            -webkit-background-size: cover;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .signup-form {
            width: 1015px;
            margin-top: -2px; }

        .signup-img-content {
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
            padding: 27px 15px 15px 15px;
            margin-bottom: -8px; }

        .form-row {
            margin: 0 -30px; }
        .form-row .form-group {
            width: 50%;
            padding: 0 30px; }

        .form-input, .form-select, .form-radio {
            margin-bottom: 23px; }

        label,.depositForm input {
            display: block;
            width: 100%; }

        label {
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 0px; }

        label.required {
            position: relative; }
        label.required:after {
            content: '*';
            margin-left: 2px;
            color: #b90000; }

        .depositForm input {
            box-sizing: border-box;
            border: 1px solid #ebebeb;
            padding: 14px 20px;
            border-radius: 5px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            -o-border-radius: 5px;
            -ms-border-radius: 5px;
            font-size: 14px;
            font-family: 'Poppins'; }
        .depositForm input:focus {
            border: 1px solid #329e5e; }


        div.dataTables_wrapper div.dataTables_filter label{text-align:right!important;}

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

        .display-flex, .signup-content, .form-row, .label-flex, .form-radio-group {
            display: flex;
            display: -webkit-flex; }

        .form-submit {
            text-align: right; }

        .depositForm input, select, textarea {
            outline: none;
            appearance: unset !important;
            -moz-appearance: unset !important;
            -webkit-appearance: unset !important;
            -o-appearance: unset !important;
            -ms-appearance: unset !important; }

        .depositForm input::-webkit-outer-spin-button,.depositForm input::-webkit-inner-spin-button {
            appearance: none !important;
            -moz-appearance: none !important;
            -webkit-appearance: none !important;
            -o-appearance: none !important;
            -ms-appearance: none !important;
            margin: 0; }

        .depositForm input:focus, select:focus, textarea:focus {
            outline: none;
            box-shadow: none !important;
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            -o-box-shadow: none !important;
            -ms-box-shadow: none !important;
        }

        select{width: 100%;
            height: 50px;
            border: 1px solid #eee;
            border-radius: 6px;
            padding: 0 10px}

        .submit {
            width: 150px;
            height: 50px;
            display: inline-block;
            font-family: 'Poppins';
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
        .circle-icon {
            width: 30px;
            height: 30px;
            text-align: center;
            line-height: 28px;
            border: 2px solid #B4BBC1;
            border-radius: 100px;
            font-size: 14px;
            color: #B4BBC1;
            cursor: pointer;
            display: block;
            float: left;
        }
        .circle-icon.small {
            height: 25px;
            width: 25px;
            line-height: 23px;
            font-size: 11px;
        }
        .circle-icon:hover {
            color: #57636C;
            border-color: #57636C;
        }
        .circle-icon.red {
            color: #D23B3D;
            border-color: #D23B3D;
        }
        .circle-icon.red:hover {
            color: #791C1E;
            border-color: #791C1E;
        }

        .modal-open .modal{overflow-x:auto!important;}

        .select-list {
            position: relative;
            display: inline-block;
            width: 100%;
            /*margin-bottom: 47px; */
        }

        .list-item {
            position: absolute;
            width: 100%;
            z-index: 99; }
        .checkbox-wrapper {
            cursor: pointer;
            height: 20px;
            width: 20px;
            position: relative;
            display: inline-block;
            box-shadow: inset 0 0 0 1px #A3ADB2;
            border-radius: 1px;
        }
        .checkbox-wrapper input {
            opacity: 0;
            cursor: pointer;
        }
        .checkbox-wrapper input:checked ~ label {
            opacity: 1;
        }
        .checkbox-wrapper label {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            cursor: pointer;
            background: #A3ADB2;
            opacity: 0;
            transition-duration: 0.05s;
        }
        .checkbox-wrapper label:hover {
            background: #95a1a6;
            opacity: 0.5;
        }
        .checkbox-wrapper label:active {
            background: #87949b;
        }

        @media only screen and (min-width:2000px) {
            tr{font-size: 16px;}
        }

    </style>

    <link href="{{asset('/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{asset('/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.3/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

@endsection
@section('content')


    <div class="page-content-wrapper usersContainer" id="app">

        <div class="container-fluid">

            <div class="row mt-4">
                <div class="col-sm-12">
                    <div class="float-right page-breadcrumb">
                        <ol class="breadcrumb">
                        </ol>
                    </div>

                </div>
            </div>
            <!-- end row -->
            <div class="row mt-4">
                <div class="col-xl-12 ">
                    <div class="border_shadow m-t--4">
                        <div class="card-header bg_white border-0">
                            <div class="row">
                                <div class="col-xl-8">
                                    <h3>Deposit Requests</h3>
                                </div>
                                <div class="col-xl-4 text-right">
{{--                                    <input id="toggle-one" @if($user->active) checked @endif class="mr-3" data-onstyle="success" data-offstyle="danger"  data-style="ios" type="checkbox">--}}

                                    <div class="display-flex align-content-center justify-content-center mr-3" @click="showModal2" id="img2" style="width:40px; height:40px; border-radius: 50%; font-size: 22px; color:white; background: #4DB6AC;">
                                        <i class="fa fa-university my-auto"  ></i>

                                    </div>
                                </div>
                            </div>
                        </div>
                       <div class="card-body col-md-12 pt-0">

                           <div class="box-outer">
                               <a class="arrow-left arrow" id="arrowLeft"><i class="fa fa-chevron-left"></i></a>
                               <a class="arrow-right arrow" id="arrowRight"><i class="fa fa-chevron-right"></i></a>
                               <div class="box-inner">
                                   <table class="table table-padded  box-outer table-responsive-fix-big call-center-table transactionsTable any1transactions any1table" style="width: 100% !important;">

                                <thead class="searchRow">
                                    <tr>
                                        <th class="noInput" style="width:15px !important"></th>
                                        <th class="idInput" style="width:50px !important;" data-priority="1">Account</th>
                                        <th data-priority="3">Client</th>
                                        <th class="amountInput" data-priority="3">MT4 Account</th>
                                        <th class="amountInput" data-priority="1">Amount</th>
                                        <th class="amountInput" data-priority="1">Bank Name</th>
                                        <th class="amountInput" data-priority="1">Beneficiary Name</th>
                                        <th class="amountInput" data-priority="1">Swift</th>
                                        <th class="amountInput" data-priority="1">Iban</th>
                                        <th class="amountInput" data-priority="1">Status</th>
                                        <th class="currencyInput" data-priority="3">Requested At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($requests->sortByDesc('id') as $request)
                                <tr>
                                    <td>
                                        <a @click="delete_request({{$request->id}})">
                                            <i class="fa fa-times font-20 deleteUser"></i>
                                        </a>
                                    </td>
                                    <td>
                                    @if(isset($request->client))
                                        @if (($request->client->account_id) === 'black_panther')
                                            <img class="rounded-circle" src="{{asset('images/users/panther_logo.png')}}" alt="user" width="65">
                                            <span style="display: none">Black Panther</span>
                                        @elseif (($request->client->account_id) === 'bull_bear')
                                            <img class="rounded-circle" src="{{asset('images/users/bull_logo.png')}}" alt="user" width="65">
                                            <span style="display: none">Bull Bear</span>
                                        @elseif (($request->client->account_id) === 'phoenix')
                                            <img class="rounded-circle" src="{{asset('images/users/phoenix_logo.png')}}" alt="user" width="65">
                                            <span style="display: none">Phoenix</span>
                                        @elseif (($request->client->account_id) === 'kings')
                                            <img class="rounded-circle" src="{{asset('images/users/kings_logo.png')}}" alt="user" width="65">
                                            <span style="display: none">Kings</span>
                                        @else
                                            <img class="rounded-circle" src="{{asset('images/users/promo_logo.png')}}" alt="user" width="65">
                                            <span style="display: none">Promo</span>
                                        @endif
                                    @endif
                                    </td>
                                    <td> @if(isset($request->client))<a href="{{url('user/'.$request->client->id)}}">{{$request->client->name}}</a> @endif</td>
                                    <td> @if(isset($request->client)){{$request->client->mt4_account}} @endif</td>
                                    <td>{{$request->amount}}</td>
                                    <td>{{$request->bank_name}}</td>
                                    <td>{{$request->beneficiary_name}}</td>
                                    <td>{{$request->swift}}</td>
                                    <td>{{$request->iban}}</td>
                                    <td>{{$request->status}}</td>
                                    <td>{{$request->created_at->format('d/m/Y')}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                               </div>
                           </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

            <div id="myModal2" class="modal fade modal_bank bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">

                        <div class="signup-content row">
                            <div  v-if="!showTemplates" class="signup-img col-md-4 " style="background-image: url({{asset('images/bank_details.jpg')}})" >
                                <div class="signup-img-content">
                                    <h2>Bank Details </h2>
                                </div>
                            </div>
                            <div v-else class="col-md-4 pl-4 pr-2">

                                <h4 class="text-center">Select template</h4>


                                <div class="text-center">

                                    <button @click.prevent="saveTemplate(content, 'Banking')" class="btn btn-outline-success mb-2 mr-1"><i class="fa fa-save text-success"> </i>  Save</button>
                                    <button @click.prevent="saveTemplate(content, 'Banking')" class="btn btn-outline-primary mb-2 mr-1"><i class="fa fa-plus-circle text-primary"> </i>  Create</button>
                                    <button data-toggle="modal" :data-target="'#editTemplate'+selectedTemplate.id" class="btn btn-outline-warning mb-2 mr-1"><i class="fa fa-edit text-warning"> </i>  Edit</button>
                                    <button @click.prevent="deleteTemplate(selectedTemplate.id)" class="btn btn-outline-danger mb-2"><i class="fa fa-times text-danger"> </i>  Delete</button>

                                </div>
                                {{--                                <input type="text"> +--}}
                                <ul class="list-group p-1">
                                    <li :class="getTemplateStyle(template.id)" v-for="template in templates"  v-if="template.type==='Banking'"  @click="selectTemplate(template)" class="list-group-item mb-2 p-2" style="border-radius: 4px; ">
                                        {{--                                        <span  style="white-space: pre-wrap;word-wrap: break-word;font-family: inherit;">@{{template.content }}</span>--}}

                                        <span  style="white-space: pre-wrap;word-wrap: break-word;font-family: inherit;">@{{template.content }}</span>

                                    </li>
                                </ul>

                            </div>
                            <div class="signup-form col-md-8">
                                <form method="POST" class="register-form">
                                    <div class="form-row depositForm">


                                        <div class="form-group col-md-6">
                                            <div class="form-select">
                                                <div class="label-flex">
                                                    <label for="select_user">Select User</label>
                                                </div>
                                                <div class="select-list">
                                                    <select v-model="receiver_id" name="select_user">
                                                        <option v-for="user in users" :value="user.id">@{{ user.name }}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-input">
                                                <label for="first_name" class="required">Beneficiary Name</label>
                                                <input v-model="beneficiary_name" type="text" name="beneficary_no" id="beneficary_no" />
                                            </div>
                                            <div class="form-input">
                                                <label for="first_name" class="required">Beneficiary Address</label>
                                                <input v-model="beneficiary_address" type="text" name="beneficary_add" id="beneficary_add" />
                                            </div>
                                            <div class="form-input">
                                                <label for="first_name" class="required">Bank Name</label>
                                                <input v-model="bank_name"  type="text" name="bank_name" id="bank_name" />
                                            </div>
                                        </div>


                                        <div class="form-group col-md-6">
                                            <div class="form-input">
                                                <label for="first_name" class="required">Swift</label>
                                                <input v-model="swift"  type="text" name="bank_swift" id="bank_wift" />
                                            </div>
                                            <div class="form-input">
                                                <label for="first_name" class="required">Iban</label>
                                                <input v-model="iban" type="text" name="bank_iban" id="bank_iban" />
                                            </div>
                                            <div class="form-input">
                                                <label for="last_name" class="required">Full Name</label>
                                                <input v-model="full_name" type="text" name="full_name" id="full_name" />
                                            </div>
                                            <div class="form-input">
                                                <label for="company" class="required">Amount</label>
                                                <input v-model="amount" type="text" name="amount_bank" id="amount_bank" />
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <textarea v-model="content" style="width:100%; border: 1px solid #ebebeb; padding:5px; border-radius: 3px; white-space: pre-wrap; word-wrap: break-word;font-family: inherit;" id="margin_textarea" rows="8">
                                            </textarea>
                                            <div class="d-flex justify-content-center">
                                                <button v-show="!showTemplates" @click.prevent="showTemplates=true" class="btn btn-dark mb-2 mr-4 mr-auto"><i class="fa fa-arrow-left"> </i>  Templates </button>
                                                <button v-show="showTemplates" @click.prevent="showTemplates=false" class="btn btn-dark mb-2 mr-4 mr-auto"><i class="fa fa-arrow-right"> </i>  Templates </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-submit">

                                        <button   @click.prevent="submitEmail('bank', 1)" class="btn btn-lg btn-primary mb-2 mr-4 mr-auto text-uppercase"><i class="fa fa-envelope"> </i>  Send email </button>

                                        <button  @click.prevent="submitEmail('bank', 0)" class="btn btn-lg btn-danger mb-2 mr-4 mr-auto text-uppercase"><i class="fa fa-info">  </i>   Send notification </button>

                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <!-- Central Modal Medium Success -->
            <div class="modal fade" :id="'editTemplate'+selectedTemplate.id" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-notify modal-success" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <!--Header-->

                        <div class="modal-header">
                            <p class="heading lead">Edit Template</p>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="white-text">&times;</span>
                            </button>
                        </div>
                        <div>

                            <div class="form-group row pt-3">
                                <div class="col-8 centered">
                                    <textarea style="width: 100%; border: 0;" rows="15" v-model="selectedTemplate.content">

                                    </textarea>

                                </div>
                            </div>

                            <!--Footer-->
                            <div class="modal-footer justify-content-center">
                                <a @click="updateTemplate(selectedTemplate)" type="submit" class="btn btn-success">CONFIRM<i class="far fa-gem ml-1 text-white"></i></a>
                            </div>
                        </div>
                    </div>
                    <!--/.Content-->
                </div>
            </div>
            <!-- Central Modal Medium Success-->
        </div><!-- container fluid -->

    </div> <!-- Page content Wrapper -->


@endsection

@section('scripts')

    <!-- Required datatable js -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.css"/>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>
    <script src="{{asset('js/toastr.min.js')}}"></script>



    <!-- Datatable init js -->
    <script src="{{asset('pages/datatables.init.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>

        var vm = new Vue({
            el: '#app',
            mounted: function () {
                this.getAlertsAdmin();
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
                    user_id:null,
                    request_id:null,
                    collateral:null,
                    currencyCode:'EUR',
                    full_name_bank:null,
                    email_transaction:null,
                    whatsapp:null,
                    email_alerts:[],
                    users:[],

                    receiver_id:null,
                    sender_id:{{logged_in()->id}},
                    subject:null,
                    content:'Come da comunicazione le invio le coordinate bancarie correspondente alla somma '+self.amount,
                    account_number:null,
                    balance:null,
                    credit:null,
                    equity:null,
                    margin:null,
                    free_margin:null,
                    beneficiary_name:null,
                    beneficiary_address:null,
                    bank_name:null,
                    swift:null,
                    iban:null,
                    full_name:null,
                    amount:0,
                    selectedEmail:{},
                    emailOpened:false,
                    type:'Banking',
                    showTemplates:false,
                    templates:[],
                    selectedTemplate:{
                        id:0,
                        type:'',
                        content:'',
                    },
                    editableTemplate:null,
                    editActive:false,
                }
            },
            methods:{
                enableEditProfile(){
                    this.inputDisabled=false;
                },
                getAlertsAdmin(){
                    let self = this;
                    axios.get('/get_alerts_admin/').then(response => {
                        self.email_alerts = response.data.emails;
                        self.users=response.data.users;
                        self.templates=response.data.templates;

                        // self.user = response.data.user;
                        // self.selectedAccount=self.user.account;
                    });
                },
                submitEmail(type, send){
                    let self=this;
                    self.replyErrors=[];

                    axios.post('{{URL::to('new_email')}}', {
                        email:self.newEmail,
                        type:type,
                        receiver:self.receiver_id,
                        sender_id:self.sender_id,
                        subject:self.subject,
                        content:self.content,
                        beneficiary_name:self.beneficiary_name,
                        beneficiary_address:self.beneficiary_address,
                        bank_name:self.bank_name,
                        swift:self.swift,
                        iban:self.iban,
                        full_name:self.full_name,
                        amount:self.amount,
                        send_email: send
                    }).then(function(response) {
                        {{--window.location.href = '{{URL::to('personal_info/')}}'+'?msg='+response.data;--}}
                        toastr.success("Successfully sent!");

                        console.log(response);
                    }).catch(function(error) {
                        // self.replyErrors = error.response.data.errors;
                        console.log(error.response);

                        // toastr.error("Error changing the account!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
                        {{--                        window.location.hash='{{URL::to('personal_info/')}}';--}}
                    });
                },

                delete_request:function(request_id) {

                    let self=this;

                    self.replyErrors=[];
                    swal({
                        title: "Are you sure?",
                        text: "Once deleted, you won't be able to recover this user!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((result) => {
                        if (result) {
                            axios.post('{{URL::to('delete_request')}}', {
                                request_id:request_id,
                            }).then(function(response) {
                                console.log(response);
                                self.output=response.data;
                                toastr.success("Request deleted!", {
                                    positionClass: 'toast-bottom-right',
                                    containerId: 'toast-bottom-right'
                                });
                                window.location.reload();

                            }).catch(function(error) {
                                // self.loading = false;
                                self.replyErrors = error.response.data.errors;
                                console.log(error.response.data);
                            });
                        }else{
                        }
                    })
                },

                openModal(email, type){
                    this.emailOpened=true;
                    this.type=type;
                    let self=this;
                    self.replyErrors=[];
                    this.selectedEmail=email;
                    $('body').addClass('show-message');

                    axios.post('{{URL::to('set_read')}}', {
                        id:self.selectedEmail.id,
                    }).then(function(response) {
                        {{--window.location.href = '{{URL::to('personal_info/')}}'+'?msg='+response.data;--}}
                        // toastr.success("Account changed!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
                    }).catch(function(error) {
                        // self.loading = false;
                        // self.replyErrors = error.response.data.errors;
                        console.log(error.response.data);
                        // toastr.error("Error changing the account!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
                        {{--                        window.location.hash='{{URL::to('personal_info/')}}';--}}
                    });
                    this.getAlertsAdmin();

                },

                getRead(read){
                    if (read)
                        return '';
                    else return 'unread';
                },

                showModal1(){
                    this.newEmail={
                        receiver_id:null,
                        sender_id:{{logged_in()->id}},
                        subject:null,
                        content:'Gentile Cliente\n' +
                            'Come da comunicazione le invio le coordinate bancarie correspondente alla somma '+this.amount,
                        account_number:null,
                        balance:null,
                        credit:null,
                        equity:null,
                        margin:null,
                        free_margin:null,
                        beneficiary_name:null,
                        beneficiary_address:null,
                        bank_name:null,
                        swift:null,
                        iban:null,
                        full_name:null,
                        amount:null
                    };
                    $('#myModal1').modal('show');
                },

                showModal2(){

                    let self=this;
                    $('#myModal2').modal('show');
                },

                saveTemplate(desc, type){
                    let self=this;
                    axios.post('{{URL::to('template_store')}}', {
                        content:desc,
                        type:type
                    }).then(function(response) {
                        self.getAlertsAdmin();
                        toastr.success("Template saved", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});

                    }).catch(function(error) {
                        // self.loading = false;
                        console.log('error');
                        {{--toastr.error("Error changing the password!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});--}}
                        {{--window.location.hash='{{URL::to('personal_info/')}}';--}}
                    });
                },

                deleteTemplate(id){
                    if (id) {
                        console.log('hmm');
                        let self = this;
                        axios.post('{{URL::to('template_destroy')}}', {
                            template_id: id,
                        }).then(function (response) {
                            self.getAlertsAdmin();
                            console.log('response');

                        }).catch(function (error) {
                            // self.loading = false;
                            console.log('error');
                            toastr.error("Error deleting the template password!", {
                                positionClass: 'toast-bottom-right',
                                containerId: 'toast-bottom-right'
                            });
                            {{--window.location.hash='{{URL::to('personal_info/')}}';--}}
                        });
                    }
                    else toastr.error("Please select a template to delete!", {
                        positionClass: 'toast-bottom-right',
                        containerId: 'toast-bottom-right'
                    });
                },

                getTemplateStyle(template_id){
                    if(template_id===this.selectedTemplate.id){
                        return 'selectedTemplate';
                    }
                    // else return 'text-white';
                },
                selectTemplate(template){
                    this.selectedTemplate=template;
                    this.content=template.content;
                },
                canEdit(template_id){
                    if (template_id===this.selectedTemplate.id)
                    {
                        return 'true';
                    }
                    else return 'false';
                },

                updateTemplate(template){

                    let self=this;
                    axios.post('{{URL::to('update_template')}}', {

                        template_id: template.id,
                        content: template.content,
                    }).then(function (response) {
                        // console.log(response.data);
                        // self.output = response.data;
                        toastr.success("Template updated successfully!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                        $('#editTemplate'+template.id).modal('hide');
                        {{--window.location.href = '{{URL::to('personal_info/')}}'+'?msg='+response.data;--}}

                    }).catch(function (error) {
                        // self.loading = false;
                        self.replyErrors = error.response.data.errors;
                        console.log(error.response.data);
                        toastr.error("Error!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                        {{--                        window.location.hash='{{URL::to('personal_info/')}}';--}}
                    });

                }

            }
        });

        Vue.filter('formatDate', function(value) {
            if (value) {
                return moment(String(value)).format('MM/DD/YYYY hh:mm')
            }
        });

        // $(document).ready(function () {
        //     $("#img1").click(function () {
        //         $('#myModal1').modal('show');
        //     });
        // });
        // $(document).ready(function () {
        //     $("#img2").click(function () {
        //         $('#myModal2').modal('show');
        //     });
        // });

    </script>


@endsection

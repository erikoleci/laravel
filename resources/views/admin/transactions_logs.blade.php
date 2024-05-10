@extends('layouts.dashboard')
@section('style')


    <style>

        .transactionsTable input {
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

        .dt-buttons{opacity:0;transition: .5s;}
        .dt-buttons:hover{opacity:1;}

        .btn-dark {
            background-color: #0650a0;
            border: 1px solid #0650a0;
            color: #ffffff;
        }

        .table-padded {
            border-collapse: separate;
            border-spacing: 0 .5rem!important;

        }

        tr{background: #f3f6f94a;transition: .3s;font-weight: 900;}

        body.night thead tr{color:white !important;}
        .table td, .table th {border-top:0!important;}
        thead tr{background: transparent;border-spacing: 0!important;}
        .table > tbody > tr > td, .table > tfoot > tr > td, .table > thead > tr > td {
            padding: 1.5rem 1rem;
        }


        tr:hover{box-shadow: 0 2px 7px rgba(120,130,140,0.3);}

        @media only screen and (min-width:2000px) {
            tr{font-size: 16px;}
        }

        tr{color:white!important;}
        thead tr{color:black!important;}
    </style>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.3/axios.min.js"></script>
    <link href="{{asset('/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{asset('/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
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
                    <div class="m-t--4">
                        <div class="mt-2">
                            <div class="row">
                                <div class="col-xl-8">
                                    <h3>Transaction</h3>
                                </div>
                                <div class="col-xl-4 text-right">
                                    <div class="col-xl-4 text-right">
                                        <a class="btn btn-lg btn-dark text-white"
                                           data-toggle="modal" data-target="#centralModalSuccess">
                                            Add Deposit

                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">

                            <div class="box-outer">
                                <a class="arrow-left arrow" id="arrowLeft"><i class="fa fa-chevron-left"></i></a>
                                <a class="arrow-right arrow" id="arrowRight"><i class="fa fa-chevron-right"></i></a>
                                <div class="box-inner">
                                    <table class="table table-padded  box-outer table-responsive-fix-big call-center-table transactionsTable any1transactions any1table" style="width: 100% !important;">

                                <thead class="searchRow">
                                <tr>
                                    <th class="idInput" style="width:50px !important;" data-priority="1">Account</th>
                                    <th class="idInput" data-priority="1">Type</th>
                                    <th data-priority="3">Client</th>
                                    <th  data-priority="3">MT4 Account</th>
                                    <th  data-priority="1">Status</th>
                                    <th class="amountInput" data-priority="1"> Amount</th>
                                    <th class="currencyInput" data-priority="3"> Currency</th>
                                    <th data-priority="3">Description</th>
                                    <th data-priority="3">Type</th>
                                    <th data-priority="3">Credit Card Nr</th>
                                    <th data-priority="6">Result Message</th>
                                    <th data-priority="6">Message Details</th>
                                    <th data-priority="6">Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transactions->sortByDesc('created_at') as $transaction)
                                    <tr class="@if(isset($transaction->status))@if($transaction->status=='success' || $transaction->status=='completed') bg-success-light @elseif ($transaction->status=='pending') bg-pending @else bg-danger-light @endif @endisset">
                                        <td>@if(isset($transaction->client->account_id)) @if (($transaction->client->account_id) === 'black_panther')
                                                <img class="rounded-circle" src="{{asset('images/users/panther_logo.png')}}" alt="user" width="65">
                                                <span style="display: none">Black Panther</span>
                                            @elseif (($transaction->client->account_id) === 'bull_bear')
                                                <img class="rounded-circle" src="{{asset('images/users/bull_logo.png')}}" alt="user" width="65">
                                                <span style="display: none">Bull Bear</span>
                                            @elseif (($transaction->client->account_id) === 'phoenix')
                                                <img class="rounded-circle" src="{{asset('images/users/phoenix_logo.png')}}" alt="user" width="65">
                                                <span style="display: none">Phoenix</span>
                                            @elseif (($transaction->client->account_id) === 'kings')
                                                <img class="rounded-circle" src="{{asset('images/users/kings_logo.png')}}" alt="user" width="65">
                                                <span style="display: none">Kings</span>
                                            @else
                                                <img class="rounded-circle" src="{{asset('images/users/promo_logo.png')}}" alt="user" width="65">
                                                <span style="display: none">Promo</span>

                                            @endif @endisset
                                        </td>
                                        <th> @if(isset($transaction->type))@if($transaction->type==='bank') <i style="color:white" class="fa fa-university font-18 transactionType"></i><span style="display: none">Bank</span> @else <i style="color:white" class="fa fa-credit-card"></i><span style="display: none">Card</span> @endif @endif
                                            <a @click="delete_transaction_log({{$transaction->id}})"><i class="fa fa-times font-20 deleteTransaction"></i></a>
                                        </th>
                                        <td>
                                            @isset($transaction->client)<a href="{{url('admin/client/'.$transaction->client->id)}}">{{$transaction->client->name}}</a>@endisset</td>
                                        <td>@isset($transaction->client){{$transaction->client->mt4_account}}@endisset</td>
                                        <td class="text-capitalize">{{$transaction->status}}</td>
                                        <td >{{$transaction->source_amount}}</td>
                                        <td>{{$transaction->source_currency_code}}</td>
                                        <td>@if(isset($transaction->deposit->description)){{$transaction->deposit->description}}@endif</td>
                                        <td>@if(isset($transaction->deposit_type)) @if($transaction->deposit_type==='positive')<i style="color: green" class="fa fa-arrow-right font-18 transactionType"></i> @else <i style="color: red" class="fa fa-arrow-left font-18 transactionType"></i> @endif @endif </td>
                                        <td>{{$transaction->ccNumber}}</td>
                                        <td>{{$transaction->resultMessage}}</td>
                                        <td>{{$transaction->errorMessage}}</td>
                                        <td>{{$transaction->created_at}}</td>

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



{{--            <div class="modal fade" id="centralModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"--}}
{{--                 aria-hidden="true">--}}
{{--                <div class="modal-dialog modal-notify modal-success" role="document">--}}
{{--                    <!--Content-->--}}
{{--                    <div class="modal-content">--}}
{{--                        <!--Header-->--}}

{{--                        <div class="modal-header">--}}
{{--                            <p class="heading lead">Bank Deposit</p>--}}

{{--                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                <span aria-hidden="true" class="white-text">&times;</span>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                        <div class="text-center">--}}
{{--                            <i style="color:green;font-size:4rem;margin:1rem 0;" class="fa fa-university fa-4x mb-3 animated zoomInLeft "></i>--}}
{{--                        </div>--}}
{{--                        <div>--}}

{{--                            <div class="form-group row">--}}
{{--                                <div class="col-8 centered">--}}
{{--                                    <select v-model="user_id" class="form-control text-capitalize" aria-describedby="addon-right" type="text">--}}
{{--                                        <option v-for="user in users" :value="user.id">@{{ user.name }}</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group row">--}}
{{--                                <div class="col-8 centered">--}}
{{--                                    <input v-model="full_name_bank" class="form-control" type="text" required="" name="mt4_acc" placeholder="MT4 Account">--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group row">--}}
{{--                                <div class="col-8 centered">--}}
{{--                                    <input v-model="amount" class="form-control" type="text" required="" name="amount" placeholder="Amount">--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group row">--}}
{{--                                <div class="col-8 centered">--}}
{{--                                    <input v-model="description" class="form-control" type="text" required="" name="description" placeholder="Description">--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group row">--}}
{{--                                <div class="col-8 centered">--}}
{{--                                    <select v-model="depositype" class="form-control text-capitalize" aria-describedby="addon-right" type="text">--}}
{{--                                        <option :value="'Bank'">Bank</option>--}}
{{--                                        <option :value="'Card'">Card</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}


{{--                            <div class="form-group row">--}}
{{--                                <div class="col-8 centered">--}}
{{--                                    <select v-model="type" class="form-control text-capitalize" aria-describedby="addon-right" type="text">--}}
{{--                                        <option :value="'positive'">Positive</option>--}}
{{--                                        <option :value="'negative'">Negative</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <!--Footer-->--}}
{{--                            <div class="modal-footer justify-content-center">--}}
{{--                                <a @click="submitDeposit()" type="submit" class="btn btn-success">CONFIRM<i class="far fa-gem ml-1 text-white"></i></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!--/.Content-->--}}
{{--                </div>--}}
{{--            </div>--}}


            <div class="modal fade" id="centralModalSuccess" tabindex="-1" role="dialog" aria-labelledby="depositModal"
                 aria-hidden="true">
                <div class="modal-dialog modal-notify modal-success" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <!--Header-->

                        <div class="modal-header">
                            <p class="heading lead">Bank Deposit</p>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="white-text">&times;</span>
                            </button>
                        </div>
                        <div class="text-center">
                            <i style="color:green;font-size:4rem;margin:1rem 0;" class="fa fa-university fa-4x mb-3 animated zoomInLeft "></i>
                        </div>
                        <div>

                            <div class="form-group row">
                                <div class="col-8 centered">
                                    <select v-model="user" class="form-control text-capitalize" aria-describedby="addon-right" type="text">
                                        <option selected v-if="user" :value="user">@{{ user.name }}</option>
                                        <option v-for="user in users" :value="user">@{{ user.name }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-8 centered">
                                    <input v-model="user.mt4_account" class="form-control" type="text" required="" name="mt4_acc" placeholder="MT4 Account">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-8 centered">
                                    <input v-model="amount" class="form-control" type="text" required="" name="amount" placeholder="Amount">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-8 centered">
                                    <input v-model="description" class="form-control" type="text" required="" name="description" placeholder="Description">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-8 centered">
                                    <select v-model="depositype" class="form-control text-capitalize" aria-describedby="addon-right" type="text">
                                        <option :value="'Bank'">Bank</option>
                                        <option :value="'Card'">Card</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-8 centered">
                                    <select v-model="type" class="form-control text-capitalize" aria-describedby="addon-right" type="text">
                                        <option :value="'positive'">Positive</option>
                                        <option :value="'negative'">Negative</option>
                                    </select>
                                </div>
                            </div>

                            <!--Footer-->
                            <div class="modal-footer justify-content-center">
                                <a @click="submitDeposit()" type="submit" class="btn btn-success">CONFIRM<i class="far fa-gem ml-1 text-white"></i></a>
                            </div>
                        </div>
                    </div>
                    <!--/.Content-->
                </div>
            </div>


        </div><!-- container fluid -->

    </div> <!-- Page content Wrapper -->


@endsection

@section('scripts')

    <!-- Required datatable js -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.css"/>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Datatable init js -->
    <script src="{{asset('pages/datatables.init.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="{{asset('js/toastr.min.js')}}"></script>


    <script>
        var vm = new Vue({
            el: '#app',
            mounted: function () {
                this.getUsers();
                console.log('it started');
            },

            data: function () {
                return {
                    replyErrors:[],
                    spinVal:[],
                    user_id: null,
                    amount:null,
                    collateral:null,
                    currencyCode:'EUR',
                    full_name_bank:null,
                    mt4_account:null,
                    depositype: 'bank',
                    type: 'positive',
                    email_transaction:null,
                    description:null,
                    withdrawVal:[],
                    real_pass:'',
                    user:{
                        id:null,
                        name:null,
                        mt4_account:null,
                    },
                    users: [],
                }
            },
            methods:{

                getUsers(){
                    let self = this;
                    axios.get('/get_users/').then(response => {
                        self.users = response.data;
                    });
                },
                submitDeposit(){
                    let self=this;
                    self.replyErrors=[];

                    axios.post('{{URL::to('save_bank_deposit')}}', {
                        user_id:self.user_id,
                        amount:self.amount,
                        mt4_account: self.user.mt4_account,
                        currencyCode: self.currencyCode,
                        collateral: self.collateral,
                        full_name_bank:self.full_name_bank,
                        email_transaction:self.email_transaction,
                        description:self.description,
                        type: self.type,
                        depositype:self.depositype,
                    }).then(function(response) {
                        console.log(response.data);
                        self.output=response.data;
                        toastr.success("Deposit inserted successfully!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
                        {{--window.location.href = '{{URL::to('personal_info/')}}'+'?msg='+response.data;--}}
                        $('#centralModalSuccess').modal('hide');

                    }).catch(function(error) {
                        // self.loading = false;
                        self.replyErrors = error.response.data.errors;
                        console.log(error.response.data);
                        toastr.error("Error saving the deposit!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
                        {{--                        window.location.hash='{{URL::to('personal_info/')}}';--}}
                    });
                },

                delete_transaction_log:function(transaction_id) {

                    let self=this;
                    console.log('im here');

                    self.replyErrors=[];
                    swal({
                        title: "Are you sure?",
                        text: "Once deleted, you won't be able to recover this transaction!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((result) => {
                        if (result) {
                            axios.post('{{URL::to('delete_transaction_log')}}', {
                                transaction_id:transaction_id,
                            }).then(function(response) {
                                console.log(response);
                                self.output=response.data;
                                window.location.href = '{{URL::to('admin/transactions/')}}'+'?msg='+response.data;

                            }).catch(function(error) {
                                // self.loading = false;
                                self.replyErrors = error.response.data.errors;
                                console.log(error.response.data);
                                {{--toastr.error("Error changing the password!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});--}}
                                {{--window.location.hash='{{URL::to('personal_info/')}}';--}}
                            });
                        }else{
                            //console.log(lead_id);
                        }
                    })
                },
            }
        })
    </script>


@endsection

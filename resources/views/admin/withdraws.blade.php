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
        @media only screen and (min-width:2000px){

            font-weight:17px;
        }

        body.night tr{background: #2b44bf42; color: white;}
        body.night thead tr{color:white!important;}
        .table-padded {
            border-collapse: separate;
            border-spacing: 0 .5rem!important;

        }



        .table td, .table th {border-top:0!important;}

        thead tr{background: transparent;border-spacing: 0!important;}

        .table > tbody > tr > td, .table > tfoot > tr > td, .table > thead > tr > td {
            padding: 1.5rem 1rem;
        }


        tr:hover{box-shadow: 0 2px 7px rgba(120,130,140,0.3);}



        thead tr{color:black!important;}

        .modal.right .modal-dialog {
            position: fixed;
            top:71.25px;
            margin: auto;
            width: 650px;
            height: calc(100% - 71.25px);
            -webkit-transform: translate3d(0%, 0, 0);
            -ms-transform: translate3d(0%, 0, 0);
            -o-transform: translate3d(0%, 0, 0);
            transform: translate3d(0%, 0, 0);
        }

        .modal.right .modal-content {
            height: 100%;
            overflow-y: auto;
            border-radius: 0;
            border: none;
        }

        .modal.right.fade .modal-dialog {
            right: -400px;
            -webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
            -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
            -o-transition: opacity 0.3s linear, right 0.3s ease-out;
            transition: opacity 0.3s linear, right 0.3s ease-out;
        }

        .modal.right.fade.show .modal-dialog {
            right: 0;
        }

        body.night .modal-content{background-color: #0d1f40}

        body.night .modal-content tr {background-color: transparent;}

        @media only screen and (min-width:2000px) {
            tr{font-size: 16px;}
        }

    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.3/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
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
                         <div class=" col-md-12">


                             <div class="box-outer">
                                 <a class="arrow-left arrow" id="arrowLeft"><i class="fa fa-chevron-left"></i></a>
                                 <a class="arrow-right arrow" id="arrowRight"><i class="fa fa-chevron-right"></i></a>
                                 <div class="box-inner">
                                     <table class="table table-padded  box-outer table-responsive-fix-big call-center-table transactionsTable any1transactions any1table" style="width: 100% !important;">

                                <thead>
                                    <tr>
                                   
                               
                                        <th data-priority="3">Client</th>
                                        <th class="amountInput" data-priority="1">Amount</th>
                                        <th data-priority="1">Request Date</th>
                                        <th class="noInput"  data-priority="1">Status</th>
                                        <th class="noInput"  data-priority="1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($withdraws->sortByDesc('id') as $withdraw)
                                <tr class="">
                                   
                               
                                    <td class="openBtn" data-toggle="modal" @click="openModal({{$withdraw}})" data-target="#modal{{$withdraw->id}}"> {{$withdraw->user->name}}</td>
                               
                                    <td >{{$withdraw->amount}}</td>
                                    <td>{{$withdraw->created_at}}</td>
                                    <td class="text-capitalize">{{$withdraw->status}}</td>
                                    <td >@if($withdraw->status==="In Review")<a @click="setWithdrawStatus({{$withdraw->id}}, 'completed')" class="btn btn-success mr-2">✓</a><a @click="setWithdrawStatus({{$withdraw->id}}, 'rejected')" class="btn btn-danger">X</a>@endif</td>

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


            <div v-if="selectedWithdraw" class="modal right fade" :id="getModalId()" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <table class="table transactionsTable">

                            <thead>

                                <th class="idInput" data-priority="1">WITHDRAW REQUEST</th>
                                <th data-priority="3"></th>

                            <hr>

                            </thead>
                            <tbody>

                               


                                <tr>
                                    <td>Amount</td>
                                    <td>@{{selectedWithdraw.amount}}</td>

                                </tr>

                                <tr>
                                    <td>Beneficary Name</td>
                                    <td>@{{ selectedWithdraw.beneficary_name }}</td>

                                </tr>


                                <tr>
                                    <td>Bank Name</td>
                                    <td>@{{selectedWithdraw.bank_name}}</td>

                                </tr>

                                <tr>
                                    <td>SWIFT</td>
                                    <td>@{{selectedWithdraw.swift}}</td>

                                </tr>


                                <tr>
                                    <td>IBAN</td>
                                    <td>@{{selectedWithdraw.iban}}</td>

                                </tr>

                                <tr>
                                    <td>Bank Address</td>
                                    <td>@{{selectedWithdraw.bank_address}}</td>

                                </tr>

                        

                                <tr>
                                    <td>Request Date</td>
                                    <td>@{{selectedWithdraw.created_at}}</td>

                                </tr>

                                <tr>
                                    <td>Status</td>
                                    <td>@{{selectedWithdraw.status}}</td>

                                </tr>

                                <tr>
                                    <td>Action</td>
                                    <td><a v-if="selectedWithdraw.status==='In Review'" @click="setWithdrawStatus(selectedWithdraw.id, 'completed')" class="btn btn-success mr-2">Accept</a><a @click="setWithdrawStatus(selectedWithdraw.id, 'rejected')" class="btn btn-danger">Reject</a></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
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
    <!-- Datatable init js -->
    <script src="{{asset('pages/datatables.init.js')}}"></script>
    <script src="{{asset('js/toastr.min.js')}}"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
                    address:null,
                    city:null,
                    currencyCode:'EUR',
                    full_name_bank:null,
                    email_transaction:null,
                    whatsapp:null,
                    accounts:[],
                    user:{},
                    selectedWithdraw:{
                    },
                }
            },
            methods:{
                getModalId(){
                    var output;
                    if (this.selectedWithdraw && this.selectedWithdraw.id) {
                        output = 'modal'+this.selectedWithdraw.id;
                        console.log(output)

                        return output;
                    }
                    else
                        output = 'modal'+0;
                        return output;
                },

                openModal(withdraw){
                    console.log(withdraw.id);
                    this.selectedWithdraw=withdraw;

                    var dialog = document.getElementById('modal'+withdraw.id);
                    console.log(dialog);
                    dialog.showModal();
                },
                getAlertsAdmin(){
                    let self = this;
                    axios.get('/get_alerts_admin/').then(response => {
                        self.email_alerts = response.data.emails;
                        self.users=response.data.users;

                        // self.user = response.data.user;
                        // self.selectedAccount=self.user.account;
                    });
                },

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

                delete_withdraw:function(id) {

                    let self=this;
                    console.log('im here');

                    self.replyErrors=[];
                    swal({
                        title: "Are you sure?",
                        text: "Once deleted, you won't be able to recover this user!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((result) => {
                        if (result) {
                            axios.post('{{URL::to('delete_withdraw')}}', {
                                id:id,
                            }).then(function(response) {
                                console.log(response);
                                self.output=response.data;
                                window.location.href = '{{URL::to('admin/withdraws/')}}'+'?msg='+response.data;

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
                        window.location.href='{{URL::to('admin/withdraws/')}}';

                    }).catch(function(error) {
                        // self.loading = false;
                        self.replyErrors = error.response.data.errors;
                        console.log(error.response.data);
                        toastr.error("Error changing withdraw status!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
                        window.location.href='{{URL::to('admin/withdraws/')}}';
                    });
                },
            }
        })

    </script>

    <script>
        $('openBtn').on('click',function(){
            $('.modal-body').load('getContent.php?id=2',function(){
                $('#myModal').modal({show:true});
            });
        });
    </script>


@endsection

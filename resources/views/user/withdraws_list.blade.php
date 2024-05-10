@extends('layouts.dashboard')
@section('style')
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
                    <div class="card bg_light_grey border_shadow m-t--4">
                        <div class="card-header border-0 light-grey-bg mt-2">
                            <div class="row">
                                <div class="col-xl-8">
                                    <h3>My Withdraws</h3>
                                </div>
                                <div class="col-xl-4 text-right">
                                    <a href="{{url('withdraw')}}" class="btn btn-lg btn-dark text-white"
                                    >
                                        {{__('Request Withdraw')}}

                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body col-md-12">
                            <table class="table transactionsTable table-responsive table-bordered any1withdraws any1table" style="width: 100% !important;">

                                <thead>
                                    <tr>
{{--                                        <th class="idInput" data-priority="1">Id</th>--}}
                                        <th data-priority="3">Full Name</th>
{{--                                        <th class="amountInput" data-priority="3">MT4 Account</th>--}}
                                        <th class="amountInput" data-priority="1">Amount</th>
{{--                                        <th class="amountInput" data-priority="1">Reason</th>--}}
{{--                                        <th class="amountInput" data-priority="1">Full Name</th>--}}
{{--                                        <th class="amountInput" data-priority="1">Withdraw Phone</th>--}}
{{--                                        <th class="amountInput" data-priority="1">Withdraw Address</th>--}}
                                        <th class="amountInput" data-priority="1">Withdraw Bank Name</th>
                                        <th class="amountInput" data-priority="1">Withdraw Code</th>
                                        <th class="amountInput" data-priority="1">Withdraw IBAN</th>
                                        <th class="amountInput" data-priority="1">Bank Adress</th>
{{--                                        <th class="amountInput" data-priority="1">Intermediary Bank</th>--}}
{{--                                        <th class="amountInput" data-priority="1">Intermediary Bank Adress</th>--}}
{{--                                        <th class="amountInput" data-priority="1">Intermediary Bank Aba</th>--}}
{{--                                        <th class="currencyInput" data-priority="3">Currency</th>--}}
{{--                                        <th data-priority="1">Withdraw Request Date</th>--}}
                                        <th class="idInput" data-priority="1">Withdraw Method</th>
                                        <th class="noInput"  data-priority="1">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($withdraws->sortByDesc('id') as $withdraw)
                                <tr class="">
{{--                                    <th> {{$withdraw->id}} </th>--}}
                                    <td>{{$withdraw->name}}</td>
{{--                                    <td>-</td>--}}
                                    <td>{{$withdraw->amount}}</td>
{{--                                    <td>{{$withdraw->reason}}</td>--}}
{{--                                    <td>{{$withdraw->name}}</td>--}}
{{--                                    <td>{{$withdraw->phone}}</td>--}}
{{--                                    <td>{{$withdraw->address}}</td>--}}
                                    <td>{{$withdraw->bank_name}}</td>
                                    <td>{{$withdraw->code}}</td>
                                    <td>{{$withdraw->iban}}</td>
                                    <td>{{$withdraw->bank_address}}</td>
{{--                                    <td>{{$withdraw->intermediary_bank}}</td>--}}
{{--                                    <td>{{$withdraw->intermediary_bank_address}}</td>--}}
{{--                                    <td>{{$withdraw->intermediary_bank_aba}}</td>--}}
{{--                                    <td>{{$withdraw->currency}}</td>--}}
{{--                                    <td>{{$withdraw->created_at}}</td>--}}
                                    <td>{{$withdraw->method}}</td>
                                    <td>@if($withdraw->status!=="completed") {{__('In progress')}} @else {{__('Completed')}} @endif</td>

                                </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

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
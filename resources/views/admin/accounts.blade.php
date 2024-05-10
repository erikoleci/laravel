@extends('layouts.dashboard')
@section('style')

    <style>   .usersTable input {
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

        tr{background: #f3f6f94a;transition: .3s;}
        .table td, .table th {border-top:0!important;}
        thead tr{background: transparent;border-spacing: 0!important;}
        .table > tbody > tr > td, .table > tfoot > tr > td, .table > thead > tr > td {
            padding: 1.5rem 1rem;
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


        .custom-switch .custom-control-label::before {
            left: -2.25rem;
            width: 2.8rem;
            height: 1.5rem;
            pointer-events: all;
            border-radius: 0.8rem;
        }

        .custom-switch .custom-control-label::after {
            top: calc(.25rem + 2px);
            left: calc(-2.2rem + 2px);
            width: calc(1.5rem - 4px);
            height: calc(1.5rem - 4px);
            background-color: #adb5bd;
            border-radius: 70%;
        }

        .custom-switch .custom-control-input:checked~.custom-control-label::after {
            background-color: #fff;
            -webkit-transform: translateX(.75rem);
            transform: translateX(1.2rem);
        }


        tr:hover{box-shadow: 0 2px 7px rgba(120,130,140,0.3);}
    </style>

    <link href="{{asset('/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{asset('/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.3/axios.min.js"></script>
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
                                    <h3>Accounts</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="box-outer">
                                <a class="arrow-left arrow" id="arrowLeft"><i class="fa fa-chevron-left"></i></a>
                                <a class="arrow-right arrow" id="arrowRight"><i class="fa fa-chevron-right"></i></a>
                                <div class="box-inner">
                                    <table class="table table-padded  box-outer table-responsive-fix-big call-center-table transactionsTable any1transactions any1table" style="width: 100% !important;">

                                <thead>
                                    <tr>
                                        <th class="noInput" data-priority="1">Accounts</th>
                                        <th class="noInput" data-priority="1">Create Account</th>
                                        <th class="noInput" data-priority="3">Enable/Disable</th>
                                        <th class="noInput" data-priority="1">Promo Code</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(isset($accounts))
                                @foreach($accounts as $account)
                                <div class="">
                                    <td> @if (($account->slug) === 'black_panther')
                                            <img class="rounded-circle" src="{{asset('images/users/panther_logo.png')}}" alt="user" width="65">
                                        @elseif (($account->slug) === 'bull_bear')
                                            <img class="rounded-circle" src="{{asset('images/users/bull_logo.png')}}" alt="user" width="65">
                                        @elseif (($account->slug) === 'phoenix')
                                            <img class="rounded-circle" src="{{asset('images/users/phoenix_logo.png')}}" alt="user" width="65">
                                        @elseif (($account->slug) === 'kings')
                                            <img class="rounded-circle" src="{{asset('images/users/kings_logo.png')}}" alt="user" width="65">
                                        @elseif (($account->slug) === 'manager')
                                            <img class="rounded-circle" src="{{asset('images/users/manager_logo.png')}}" alt="user" width="65">
                                        @elseif (($account->slug) === 'prime')
                                            <img class="rounded-circle" src="{{asset('images/users/prime_logo.png')}}" alt="user" width="75">
                                        @elseif (($account->slug) === 'grand_master')
                                            <img class="rounded-circle" src="{{asset('images/users/master_logo.png')}}" alt="user" width="75">
                                        @else
                                            <img class="rounded-circle" src="{{asset('images/users/promo_logo.png')}}" alt="user" width="65">
                                        @endif </td>


                                     <td>

                                        <a href="{{url('admin/create_user').'?role='.$account->slug}}" class="btn btn-dark btn-lg">Create Account</a>
                                    </td>

                                    <td>
                                        <div class="custom-control custom-switch">
                                        <input @if($account->promo_code) checked @endif  @click="setPromo({{$account->id}}, null)" type="checkbox" class="custom-control-input" id="activeSwitch{{$account->id}}">
                                        <label class="custom-control-label" for="activeSwitch{{$account->id}}"></label></td>
                                        </div>
                                    <td><input type="text" class="form-control" value="{{$account->promo_code}}" @change="setPromo({{$account->id}}, $event.target.value)"></td>


                                </tr>

                                @endforeach
                                    @endif

                                </tbody>
                            </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

            <!-- Central Modal Medium Success -->

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="{{asset('js/toastr.min.js')}}"></script>

    <script>
        var vm = new Vue({
            el: '#app',
            mounted: function () {
            },

            data: function () {
                return {
                    replyErrors: [],
                    output: null,
                    inputDisabled: true,
                    user_id: null,
                    type: 'positive',
                    amount: null,
                    currencyCode: 'EUR',
                    users: [],
                }
            },
            methods: {
                setPromo(account_id, e) {
                    console.log(e);

                    axios.post('{{URL::to('set_promo')}}', {
                        account_id: account_id,
                        promo_code: e,
                    }).then(function (response) {
                        // console.log(response.data);
                        // self.output = response.data;
                        toastr.success("Promo Code set successfully!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });

                    }).catch(function (error) {
                        // self.loading = false;
                        self.replyErrors = error.response.data.errors;
                    })
                },
                submitCollateral() {
                    let self = this;
                    self.replyErrors = [];

                    axios.post('{{URL::to('save_collateral')}}', {
                        user_id: self.user_id,
                        amount: self.amount,
                        type: self.type,
                    }).then(function (response) {
                        // console.log(response.data);
                        // self.output = response.data;
                        toastr.success("Deposit inserted successfully!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                        self.user_id=null;
                        self.amount=null;
                        $('#centralModalSuccess').modal('hide');
                        {{--window.location.href = '{{URL::to('personal_info/')}}'+'?msg='+response.data;--}}
                            window.location.href = '{{URL::to('admin/collaterals/')}}';

                    }).catch(function (error) {
                        // self.loading = false;
                        self.replyErrors = error.response.data.errors;
                        console.log(error.response.data);
                        toastr.error("Error saving the deposit!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                        {{--                        window.location.hash='{{URL::to('personal_info/')}}';--}}
                    });
                },
            }
        });
    </script>

@endsection

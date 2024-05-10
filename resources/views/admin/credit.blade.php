@extends('layouts.dashboard')
@include('layouts.user_tools')
@section('style')



    @stack('user_style')

    <style>


        table.dataTable th:nth-child(1) {
            width: 20px!important;
            max-width: 20px!important;
            word-break: break-all;
            white-space: pre-line;
        }





    </style>

    <link href="{{asset('/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.css"/>

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
                        <div class="border-0  mt-2">
                            <div class="row">
                                <div class="col-xl-5">
                                    <h3>Credits</h3>
                                </div>
                                <div class="col-xl-7 text-right">

                                    <a class="btn btn-lg btn-dark text-white" data-toggle="modal" data-target="#creditsModal">
                                        Add Credits
                                    </a>

                                </div>
                            </div>
                        </div>


                        <!-- end row -->
                        <div class="col-md-12">
                            <div class="box-outer">

                                <div class="box-inner">

                                    <table class="table table-padded call-center-table transactionsTable box-outer table-responsive-fix-big any1table" width="100%" id="users-table">
                                        <thead>
                                        <tr>
                                            <th>
                                                <select class="search_input" name="account_id" id="accounts">
                                                    <option value=" ">All</option>
                                                    <option value="black_panther">BP</option>
                                                    <option value="bull_bear">BB</option>
                                                    <option value="phoenix">PH</option>
                                                    <option value="kings">KG</option>
                                                    <option value="promo">PR</option>
                                                </select>
                                            </th>
                                            <th></th>
                                            <th>Client
                                                <input class="search_input" id="check_name" type="text" name="email">
                                            </th>
                                            <th>MT4</th>
                                            <th>Amount</th>
                                            <th>Description</th>
                                            <th>Type</th>
                                            <th>Date</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>

                                    </table>


                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
            @stack('user_modals')
        </div><!-- container fluid -->

    </div> <!-- Page content Wrapper -->


@endsection

@section('scripts')

    <!-- Required datatable js -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.3/axios.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Datatable init js -->

    <script src="{{asset('pages/datatables.init.js')}}"></script>
    <script src="{{asset('js/toastr.min.js')}}"></script>




    <script>

        $(function() {
            var new_table = $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                pageLength: 15,
                ajax: {

                    url: "{{ route('credits.datatable') }}",

                    data: function (d) {

                        d.account = $('#accounts').val();
                        d.name = $('#check_name').val();

                    }

                },

                dom: 'Bfrtip',
                lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                ],
                buttons: [
                    'pageLength','excelHtml5','csvHtml5','print'
                ],
                columns: [
                    { data: 'account', name: 'users.account_id' },
                    { data: 'action', name: 'action' },
                    { data: 'name', name: 'users.name' },
                    { data: 'mt4_account', name: 'users.mt4_account' },
                    { data: 'amount', name: 'amount',},
                    { data: 'description', name: 'description' },
                    { data: 'type', name: 'type' },
                    { data: 'created_at', name: 'created_at' },
                ]
            });

            $(".search_input").change(function(e){

                new_table.draw();

            });
        });


        // DELETE USER END



        // CHECKBOX START

        function delete_credits(id){
            vm.delete_credit(id);
        }

        // CHECKBOX END





    </script>

    @stack('user_scripts')

@endsection

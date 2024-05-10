@extends('layouts.dashboard')
@include('layouts.user_tools')
@section('style')

    <style>

        @stack('user_style')


    </style>

    <link href="{{asset('/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
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
                        <div class="border-0  mt-2">
                            <div class="row">
                                <div class="col-xl-5">
                                    <h3>Affiliator</h3>
                                </div>

                               

                                <div class="col-xl-7 text-right">

                                </div>

                            </div>
                        </div>


                        <!-- end row -->
                        <div class="col-md-12">
                            <div class="box-outer">
                                <a class="arrow-left arrow" id="arrowLeft"><i class="fa fa-chevron-left"></i></a>
                                <a class="arrow-right arrow" id="arrowRight"><i class="fa fa-chevron-right"></i></a>
                                <div class="box-inner">

                                    <table class="table table-padded call-center-table transactionsTable box-outer table-responsive-fix-big any1table" width="100%" id="users-table">


                                        <thead>
                                        <tr>

                                          
                                            <th>Name
                                                <input class="search_input check_inputs" id="check_name" type="text" name="email">
                                            </th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Status
                                                <select class="custom_select check_inputs" name="status" id="check_status">
                                                    <option value=" "> </option>
                                                    @isset($statuses)
                                                    @foreach($statuses as $status)
                                                        <option  value="{{$status->id}}"> {{$status->status}}</option>
                                                    @endforeach
                                                    @endisset
                                                </select>
                                            </th>
                                            <th>Affiliator</th>
                                            <th>Source
                                                <input class="search_input check_inputs" id="check_source" type="text" name="source">
                                            </th>
                                           <th>Created At</th>
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

    <!-- Datatable init js -->

    <script src="{{asset('pages/datatables.init.js')}}"></script>




    <script>

        $(function() {
            var new_table = $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                pageLength: 15,
                ajax: {

                    url: "{{ route('leads.affiliator') }}",
                    data: function (d) {

                        d.status = $('#check_status').val();
                        d.name = $('#check_name').val();
                        d.source = $('#check_source').val();

                    }

                },

                dom: 'Bfrtip',
                lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                ],
                buttons: [
                    'pageLength'
                ],
                columns: [
                    { data: 'name', name: 'name'},
                    { data: 'phone', name: 'phone' },
                    { data: 'email', name: 'email' },
                    { data: 'status', name: 'status' },
                    { data: 'affiliator', name: 'affiliator' },
                    { data: 'source', name: 'source' },
                    { data: 'created_at', name: 'created_at' },

                ]
            });

            let oTable = $('#users-table').DataTable();
            oTable.on('draw', function () {

                vm.b_data =  oTable.ajax.json().data;
                // console.log(vm.b_data);

            });

             $(".check_inputs").change(function(e){

                new_table.draw();

            });
        });


    </script>

    @stack('user_scripts')

@endsection

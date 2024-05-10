@extends('layouts.dashboard')
@include('layouts.user_tools')
@section('style')
@stack('user_style')
<style>
    .form-control {
        height: calc(1.55em + .75rem + 2px) !important;
    }

    #users-table_filter{
        display: none;
    }


    .chosen-container{
        width: 100%!important;
        /* height: calc(1.55em + .75rem + 2px)!important; */
        
    }

    .chosen-container-multi .chosen-choices{
        min-height: calc(1.8em + .75rem + 2px)!important;
        border-radius: 2px!important;
    }

</style>
    <link href="{{asset('/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.min.css" rel="stylesheet" type="text/css" />
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

                                    <h3 v-if="multiUsers.length">Clients Selected</h3>
                                    <h3 v-else>Clients</h3>
                                </div>

                               

                                <div class="col-xl-7 text-right">

                                                        

                                </div>

                               

                            </div>
                        </div>

                        <hr>

                        <div class="row"  id="divStaffContent">

                            <div class="col-lg-12">

                            <div class="row" style="padding-left:15px">


                             <div class="">
                                        <div class="btn text-white btn-primary ml-2 " v-on:click="show_search = !show_search">
                                            <i class="fas fa-caret-down"></i>
                                        </div>
                                        <div class="btn text-white btn-primary ml-2" id="reset" onclick="reset_inputs()">
                                            <i class="far fa-trash-alt"></i>
                                        </div>
                                    </div>

                                  

                                    <div class="col-lg-2">
                                        <input type="date" name="fromdate" id="check_fromdate" class="custom-select">
                                    </div>

                                    <div class="col-lg-2">
                                        <input type="date" name="todate" id="check_todate" class="custom-select">
                                    </div>



                                    <div  class="col-md-2">
                                        <select name="status[]"  multiple="true" id="check_status" class="select select_custom custom-select check_inputs">
                                            
                                            @foreach ($statuses as $key => $status)
                                                <option value="{{ $status->id }}">{{ $status->status }}</option>
                                            @endforeach
                                        </select>
                                     
                                    </div>

                                
                                    <div  class="col-md-2"><input type="text" name="country" id="check_country"
                                        class="form-control form-group check_inputs" placeholder="Country"></div>

                                

                               

                                    <br>


                             
                           

                                    <div v-if="show_search" class="col-md-2"><input type="text" name="name" id="check_name"
                                            class="form-control custom-input check_inputs" placeholder="Name"></div>
                                    <div v-if="show_search" class="col-md-2"><input type="text" name="phone" id="check_phone"
                                            class="form-control form-group check_inputs" placeholder="Phone"></div>
                                    <div v-if="show_search" class="col-md-2"><input type="text" name="email" id="check_email"
                                            class="form-control form-group check_inputs" placeholder="Email"></div>
                                                                              


                             
                                
                                <div class="col-md-1 ml-2">
                                    <div class="btn btn-primary text-white" id="search_button">
                                        <i class="fas fa-search"></i>
                                    </div>
                                </div>

                                </div>



                            </div>

                        </div>

                        <br>

                        <!-- end row -->
                        <div class="col-md-12">
                            <div class="box-outer">
                                <a class="arrow-left arrow" id="arrowLeft"><i class="fa fa-chevron-left"></i></a>
                                <a class="arrow-right arrow" id="arrowRight"><i class="fa fa-chevron-right"></i></a>
                                <div class="box-inner">

                                    <table class="table table-padded call-center-table transactionsTable box-outer table-responsive-fix-big any1table" width="100%" id="users-table">
                                        <thead>
                                        <tr>

                                         
                                            <th>Action</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th>Country</th>
                                            <th>Registered</th>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.3/axios.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Datatable init js -->

    <script src="{{asset('pages/datatables.init.js')}}"></script>
    <script src="{{asset('js/toastr.min.js')}}"></script>




    <script>


        
$(document).ready(function() {
  setTimeout(function() {
    $('#check_status').chosen();
    $('#check_manager').chosen();
 }, 100);
});



        $(function() {
            var new_table = $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                pageLength: 15,
                ajax: {

                    url: "{{ route('manager_clients') }}",

                    data: function (d) {

                        d.status = $('#check_status').val();
                        d.name = $('#check_name').val();
                        d.phone = $('#check_phone').val();
                        d.email = $('#check_email').val();
                        d.source = $('#check_source').val();
                        d.country = $('#check_country').val();
                        d.fromdate = $('#check_fromdate').val();
                        d.todate = $('#check_todate').val();

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
                    { data: 'action', name: 'action'},
                    { data: 'name', name: 'name'},
                    { data: 'email', name: 'email' },
                    { data: 'phone', name: 'phone' },
                    { data: 'status', name: 'status' },
                    { data: 'country', name: 'country' },
                    { data: 'created_at', name: 'created_at' },
                ]
            });

            let oTable = $('#users-table').DataTable();
            oTable.on('draw', function () {

                vm.b_data =  oTable.ajax.json().data;
             

            });

            $("#search_button").click(function(e) {

                new_table.draw();

            });
        });





        function reset_inputs() {
           $('#divStaffContent').find('input:text, input:password, select')
                .each(function () {
                 $(this).val('');
        });
           $('#check_fromdate').val('');
           $('#check_todate').val('');
           $('.select_custom').chosen();
         }







        // CHECKBOX START

        function checkUser_new(user, mt4, e){
            vm.checkUser_test(user, mt4, e)
        }


        function openmodalvue(user){
            // vm.openmodal(user)
            console.log(user);
        }




        // CHECKBOX END





    </script>

    @stack('user_scripts')

@endsection

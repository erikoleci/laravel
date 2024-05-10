@extends('layouts.dashboard')
@include('layouts.user_tools')
@section('style')

<style>

    @stack('user_style')


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
                                    <h3>Clients</h3>
                                </div>
                                <div class="col-xl-7 text-right">

                                    <a style="margin-right: 15px" class="btn btn-lg btn-dark text-white" data-toggle="modal" data-target="#multiAssign">
                                        Assign Users  (@{{ multiUsers.length }})
                                    </a>

                                    @if(onlyguard('admin'))

                                    <a style="margin-right: 15px" href="{{url('admin/create_user')}}" class="btn btn-lg btn-dark text-white">
                                        Create Client
                                    </a>
                                    <a style="margin-right: 15px" class="btn btn-lg btn-dark text-white" data-toggle="modal" data-target="#depositModal">
                                        Add Deposit
                                    </a>

                                    <button :disabled="!enabledGeo" class="btn btn-lg btn-dark text-white" @click.prevent="updateGeoIP()">
                                        <i class="fas fa-sync"></i>
                                        Refresh IP Info
                                    </button>

                                    @endif


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

                    <th class="noInput"></th>
                    <th>Action</th>
                    <th>Name
                        <br>
                        <input class="search_input" id="check_name" type="text" name="email">
                    </th>
                    <th>Email</th>
                    <th>Approve Users</th>
                    <th>T&C</th>
                    <th>ExClient</th>
                    <th>Recycle</th>
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

                  url: "{{ route('users.datatable') }}",

                  data: function (d) {

                    
                      d.name = $('#check_name').val();

                 
                  }

              },

                dom: 'Bfrtip',
                lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                ],
                buttons: [
                    'pageLength'  @if(onlyguard('admin')) ,'excelHtml5','csvHtml5','print'  @endif
                ],
                columns: [
                    { data: 'checkbox_new', sWidth:'5%'},
                    { data: 'action', name: 'action'},
                    { data: 'name', name: 'name'},
                    { data: 'email', name: 'email' },
                    { data: 'active', name: 'active' },
                    { data: 'active', name: 'active' },
                    { data: 'exclient', name: 'exclient' },
                    { data: 'recycle', name: 'recycle' },
                   
                    { data: 'created_at', name: 'created_at' },
                ]
            });

            $(".search_input").change(function(e){

                new_table.draw();

            });
        });



        // SET FOREX START

       function edituser_permission(user_id, type , val){
            console.log(val);

            axios.post('{{URL::to('edituser_permission')}}', {
                user_id:user_id,
                value:val,
                type:type,
            }).then(function(response) {
                console.log(response);
            })
                .catch(function(error) {
                    console.log(error);
                });
        }

    

        // CHECKBOX START

        function checkUser_new(user, mt4, e){
            vm.checkUser_test(user, mt4, e)
        }



        // CHECKBOX END





    </script>

    @stack('user_scripts')

@endsection

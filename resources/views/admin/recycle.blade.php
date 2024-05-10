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
                                    <h3 v-if="multiUsers.length">@{{ multiUsers.length }} Exclients Selected</h3>
                                    <h3 v-else>Exclients</h3>
                                </div>
                                <div class="col-xl-7 text-right">


                                    <a style="margin-right: 15px" class="btn btn-lg btn-dark text-white" data-toggle="modal" data-target="#multiAssign">
                                        Assign Users  (@{{ multiUsers.length }})
                                    </a>


                                    @if(onlyguard('admin'))

                                    <a style="margin-right: 15px" class="btn btn-lg btn-dark text-white" href="{{action('AdminController@checkDeposit')}}" >
                                        Check Deposit
                                    </a>

                                  
                                    <a style="margin-right: 15px" class="btn btn-lg btn-dark text-white" data-toggle="modal" data-target="#multiEmail">
                                        Send Email  (@{{ multiUsers.length }})
                                    </a>

                                    <a target="_blank" style="margin-right: 15px" href="{{url('admin/create_user')}}" class="btn btn-lg btn-dark text-white">
                                        Create User
                                    </a>


                                    <a style="margin-right: 15px" class="btn btn-lg btn-dark text-white" data-toggle="modal" data-target="#depositModal">
                                        Add Deposit
                                    </a>

                                    <a class="btn btn-lg btn-dark text-white" data-toggle="modal" data-target="#collateralModal">
                                        Add Collateral
                                    </a>

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

                                            <th class=""> <input type="checkbox" class="" @change="checkAll_new($event)" name="select-all" id="select-all" /> </th>
                                        
                                            <th>Action</th>
                                            <th>Name
                                                <br>
                                                <input class="check_inputs" id="check_name" type="text" name="email">
                                            </th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th></th>
                                            <th>Whatsapp</th>
                                            <th>Manager
                                                <br>
                                                <select class="custom_select check_inputs" name="manager" id="check_manager">
                                                    <option value=" ">All</option>
                                                    <option value="12345">None</option>
                                                    @isset($manager)
                                                        @foreach($manager as $manager)
                                                            <option  value="{{$manager->id}}"> {{$manager->name}}</option>
                                                        @endforeach
                                                    @endisset
                                                </select>
                                            </th>
                                            <th>Country</th>
                                            <th>City</th>
                                            <th>Address</th>
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

                    url: "{{ route('recycle.datatable') }}",

                    data: function (d) {

                        d.account = $('#accounts').val();
                        d.name = $('#check_name').val();
                        d.manager = $('#check_manager').val();
                        // d.search = $('input[type="search"]').val()
                    }

                },

                dom: 'Bfrtip',
                lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                ],
                buttons: [
                    'pageLength'  @if(onlyguard('admin')) ,'excelHtml5','csvHtml5','print'   @endif
                ],
                columns: [
                    { data: 'checkbox_new', sWidth:'5%', orderable: false},
                    { data: 'action', name: 'action'},
                    { data: 'name', name: 'name'},
                    { data: 'email', name: 'email' },
                    { data: 'phone', name: 'phone' },
                    { data: 'call', name: 'call' },
                    { data: 'whatsapp', name: 'whatsapp' },
                    { data: 'manager', name: 'manager' },
                    { data: 'country', name: 'country' },
                    { data: 'city', name: 'city' },
                    { data: 'address', name: 'address' },
                    { data: 'created_at', name: 'created_at' },
                ]
            });

            let oTable = $('#users-table').DataTable();
            oTable.on('draw', function () {

                vm.b_data =  oTable.ajax.json().data;
                console.log(vm.b_data);

            });

            $(".check_inputs").change(function(e){

                new_table.draw();

            });
        });





        // DELETE USER START

        function delete_user_new(user_id){
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
                    axios.post('{{URL::to('delete_user')}}', {
                        user_id:user_id,
                    }).then(function(response) {
                        console.log(response);
                        self.output=response.data;
                        toastr.success("User deleted!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                        window.location.reload();

                    }).catch(function(error) {
                        // self.loading = false;
                        self.replyErrors = error.response.data.errors;
                        console.log(error.response.data);
                    });
                }
                else{
                }
            })
        }

        // DELETE USER END







        // APPROVE USER START

        function set_active_new(user_id, val){


            var element=document.getElementById('activeSwitch'+user_id);
            axios.post('{{URL::to('user_status')}}', {
                user_id:user_id,
                value:val,
            }).then(function(response) {
                console.log(response);
            })
                .catch(function(error) {
                    console.log(error);
                });
        }

        // APPROVE USER END








        // COMPLETE FORMATION START

        function set_formation_new(user_id, val) {


            var element = document.getElementById('userFormation' + user_id);
            axios.post('{{URL::to('user_formation')}}', {
                user_id: user_id,
                value: val,
            }).then(function (response) {
                console.log(response);
            })
                .catch(function (error) {
                    console.log(error);
                });
        }

        // COMPLETE FORMATION END







        // SET EXCLIENT START

        function set_exclient_new(user_id, val){


            var element=document.getElementById('activeExclient'+user_id);
            axios.post('{{URL::to('set_exclient')}}', {
                user_id:user_id,
                value:val,
            }).then(function(response) {
                console.log(response);
            })
                .catch(function(error) {
                    console.log(error);
                });
        }

        // SET EXCLIENT END






        // SET SPIN START

        function set_spin_new(user_id, val){


            var element=document.getElementById('spinSwitch'+user_id);
            axios.post('{{URL::to('set_spin')}}', {
                user_id:user_id,
                value:val,
            }).then(function(response) {
                console.log(response);
            })
                .catch(function(error) {
                    console.log(error);
                });
        }

        // SET SPIN END






        // CAN WITHDRAW START

        function set_withdraw_new(user_id, val) {


            var element=document.getElementById('withdrawSwitch'+user_id);
            axios.post('{{URL::to('set_withdraw')}}', {
                user_id:user_id,
                value:val,
            }).then(function(response) {
                console.log(response);
            })
                .catch(function(error) {
                    console.log(error);
                });
        }

        // CAN WITHDRAW END







        // CHECK DEPOSIT START

        function set_check_deposit(user_id, val){

            var element=document.getElementById('checkDeposit'+user_id);
            axios.post('{{URL::to('set_check_deposit')}}', {
                user_id:user_id,
                value:val,
            }).then(function(response) {
                console.log(response);
            })
                .catch(function(error) {
                    console.log(error);
                });
        }

        // CHECK DEPOSIT END




        // SET FOREX START

        function set_forex_new(user_id, val){
            console.log(val);

            var element=document.getElementById('forexSwitch'+user_id);
            axios.post('{{URL::to('set_forex')}}', {
                user_id:user_id,
                value:val,
            }).then(function(response) {
                console.log(response);
            })
                .catch(function(error) {
                    console.log(error);
                });
        }

        function set_commodities_new(user_id, val){
            console.log(val);

            var element=document.getElementById('commoditiesSwitch'+user_id);
            axios.post('{{URL::to('set_commodities')}}', {
                user_id:user_id,
                value:val,
            }).then(function(response) {
                console.log(response);
            })
                .catch(function(error) {
                    console.log(error);
                });
        }

        function set_indices_new(user_id, val){
            console.log(val);

            var element=document.getElementById('indicesSwitch'+user_id);
            axios.post('{{URL::to('set_indices')}}', {
                user_id:user_id,
                value:val,
            }).then(function(response) {
                console.log(response);
            })
                .catch(function(error) {
                    console.log(error);
                });
        }

        function set_stocks_new(user_id, val){
            console.log(val);

            var element=document.getElementById('stocksSwitch'+user_id);
            axios.post('{{URL::to('set_stocks')}}', {
                user_id:user_id,
                value:val,
            }).then(function(response) {
                console.log(response);
            })
                .catch(function(error) {
                    console.log(error);
                });
        }

        function set_crypto_new(user_id, val){
            console.log(val);

            var element=document.getElementById('cryptoSwitch'+user_id);
            axios.post('{{URL::to('set_crypto')}}', {
                user_id:user_id,
                value:val,
            }).then(function(response) {
                console.log(response);
            })
                .catch(function(error) {
                    console.log(error);
                });
        }



        // SET FOREX END






        // CHECKBOX START

        function checkUser_new(user, mt4, e){
            vm.checkUser_test(user, mt4, e)
        }



        // CHECKBOX END





    </script>

    @stack('user_scripts')

@endsection

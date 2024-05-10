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

   
    <link href="{{ asset('/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.min.css" rel="stylesheet" type="text/css" />
    
    <link href="{{ asset('/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.css" />

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
                                    <h3 v-if="multiUsers.length">@{{ multiUsers . length }} Leads Selected</h3>
                                    <h3 v-else>Leads</h3>
                                </div>



                                <div class="col-xl-7 text-right">


                                    @if (logged_in()->can_upload || logged_in()->account_id === 'admin')

                                    <a target="_blank" style="margin-right: 15px" href="{{ url('/import_csv') }}"
                                    class="btn btn-lg btn-dark text-white">
                                    Import Leads
                                    </a>

                                    <a target="_blank" style="margin-right: 15px"class="btn btn-lg btn-dark text-white"
                                    data-toggle="modal" data-target="#createLead">
                                    Create Lead
                                     </a>

                                    @endif


                                    @if (logged_in()->can_assign || logged_in()->account_id === 'admin')

                                        <a style="margin-right: 15px" class="btn btn-lg btn-dark text-white"
                                            data-toggle="modal" data-target="#multiAssign_Leads">
                                            Assign Leads (@{{ multiUsers . length }})
                                        </a>

                                    @endif

                                    <a style="margin-right: 15px" class="btn btn-lg btn-dark text-white"
                                    data-toggle="modal" data-target="#deleteComments_Leads">
                                    Delete Comments (@{{ multiUsers . length }})
                                    </a>


                                    @if (onlyguard('admin'))

                                        <a style="margin-right: 15px" class="btn btn-lg btn-dark text-white"
                                            data-toggle="modal" data-target="#multiChange_status">
                                            Change Status (@{{ multiUsers . length }})
                                        </a>


                                    @endif

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

                                      

                                        <div class="col-lg-2 form-group">
                                            <input type="date" name="fromdate" id="check_fromdate" class="custom-select">
                                        </div>

                                        <div class="col-lg-2 form-group">
                                            <input type="date" name="todate" id="check_todate" class="custom-select">
                                        </div>

                                        <div class="col-lg-2 form-group">
                                            <input type="date" name="fromassigneddate" id="check_fromassigneddate" class="custom-select">
                                        </div>

                                        <div class="col-lg-2 form-group">
                                            <input type="date" name="toassigneddate" id="check_toassigneddate" class="custom-select">
                                        </div>

 
                                        <div  class="col-md-2 form-group">
                                            <select name="status[]"  multiple="true" id="check_status" class="select select_custom custom-select check_inputs">
                                                
                                                @foreach ($statuses as $key => $status)
                                                    <option value="{{ $status->id }}">{{ $status->status }}</option>
                                                @endforeach
                                            </select>
                                         
                                        </div>

                                        <div  class="col-md-2 form-group">
                                            <select name="manager[]" multiple id="check_manager" class="select custom-select check_inputs" placeholder="Manager" type="text">
                                                
                                                <option value="12345">None</option>
                                                @isset($manager)
                                                    @foreach ($manager as $manager)
                                                        <option value="{{ $manager->id }}"> {{ $manager->name }}
                                                        </option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </div>


                                        <div  class="col-md-2"><input type="text" name="country" id="check_country"
                                            class="form-control form-group check_inputs" placeholder="Country"></div>

                                    

                                   

                                        <br>


                                 
                               

                                        <div v-if="show_search" class="col-md-2"><input type="text" name="firstname" id="check_firstname"
                                                class="form-control custom-input check_inputs" placeholder="First Name"></div>
                                        <div v-if="show_search" class="col-md-2"><input type="text" name="lastname" id="check_lastname"
                                                class="form-control form-group check_inputs" placeholder="Last Name"></div>
                                         
                                        @if (logged_in()->account_id === 'admin')
                                        <div v-if="show_search" class="col-md-2"><input type="text" name="phone" id="check_phone"
                                                class="form-control form-group check_inputs" placeholder="Phone"></div>
                                        @endif
                                                
                                        <div v-if="show_search" class="col-md-2"><input type="text" name="email" id="check_email"
                                                class="form-control form-group check_inputs" placeholder="Email"></div>
                                      
                                        <div v-if="show_search" class="col-md-2"><input type="text" name="source" id="check_source"
                                                class="form-control form-group check_inputs" placeholder="Source"></div>
                                                


                                 
                                    
                                    <div class="col-md-1 ml-2">
                                        <div class="btn btn-primary text-white" id="search_button">
                                            <i class="fas fa-search"></i>
                                        </div>
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

                                    <table
                                        class="table table-padded call-center-table transactionsTable box-outer table-responsive-fix-big any1table"
                                        width="100%" id="users-table">


                                        <thead>
                                            <tr>

                                                <th class=""> <input type="checkbox" class="" @change="checkAll_new($event)"
                                                        name="select-all" id="select-all" /> </th>

                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                 @if (logged_in()->account_id === 'admin')
                                                <th>Phone</th>
                                                @endif
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Manager</th>
                                                <th>Source</th>
                                                <th>Promo Code</th>
                                                <th>Country</th>
                                                <th>Platform</th>
                                                  <th>Deposit</th>
                                                   <th>Lost Capital</th>
                                                    <th>Account Creation</th>
                                                <th>Assigned Date</th>
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


            <div class="modal fade bd-example-modal-md multiAssign" id="multiChange_status" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Assign To Manager</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{-- <span class="badge badge-pill badge-primary mr-2 mb-1" v-for="user in multiUsers" >@{{ user.name }}</span> --}}

                            <label for="assign_limit">How many leads do you want to assign?</label>
                            <input name="assign_limit" v-model="assign_limit" class="form-control form-input">

                            <br>

                            <label for="statuses">Choose a Status:</label>
                            <select name="selected_status" v-model="selected_status" id="statuses"
                                class="form-control inputTranparent form_input">

                                @foreach ($statuses as $status)
                                    <option :value="{{ $status->id }}"> {{ $status->status }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Discard</button>
                            <button @click.prevent="multiStatusChange(0)" type="button"
                                class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade bd-example-modal-md multiAssign" id="multiDelete" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Leads</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{-- <span class="badge badge-pill badge-primary mr-2 mb-1" v-for="user in multiUsers" >@{{ user.name }}</span> --}}

                            <label for="assign_limit">How many leads do you want to delete?</label>
                            <input name="assign_limit" v-model="assign_limit" class="form-control form-input">

                            <br>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Discard</button>
                            <button @click.prevent="multiDelete(0)" type="button" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </div>
            </div>

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

    <script src="{{ asset('pages/datatables.init.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>




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

                    url: "{{ route('leads.datatable') }}",
                    data: function(d) {

                        d.status = $('#check_status').val();
                        d.firstname = $('#check_firstname').val();
                        d.lastname = $('#check_lastname').val();
                        d.manager = $('#check_manager').val();
                        
                         @if (logged_in()->account_id === 'admin')
                        d.phone = $('#check_phone').val();
                        @endif
                        d.email = $('#check_email').val();
                        d.source = $('#check_source').val();
                        d.country = $('#check_country').val();
                        d.fromdate = $('#check_fromdate').val();
                        d.todate = $('#check_todate').val();
                        d.fromassigneddate = $('#check_fromassigneddate').val();
                        d.toassigneddate = $('#check_toassigneddate').val();

                    }

                },

                dom: 'Bfrtip',
                lengthMenu: [
                    [10, 25, 50,100,150,200,250,300, -1],
                    ['10 rows', '25 rows', '50 rows','100 rows','150 rows','200 rows','250 rows','300 rows', 'Show all']
                ],
                buttons: [
                    'pageLength'  @if(onlyguard('admin')) ,'excelHtml5','csvHtml5','print'  @endif
                ],
                columns: [{
                        data: 'checkbox_new',
                        sWidth: '5%',
                        orderable: false
                    },
                    
                    {
                        data: 'first_name',
                        name: 'first_name',
                        className:'text-uppercase'
                    },
                    {
                        data: 'last_name',
                        name: 'last_name',
                        className:'text-uppercase'
                    },
                     @if (logged_in()->account_id === 'admin')
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    @endif
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'manager',
                        name: 'manager'
                    },
                    {
                        data: 'source',
                        name: 'source'
                    },
                    {
                        data: 'promo_code',
                        name: 'promo_code'
                    },
                    {
                        data: 'country',
                        name: 'country'
                    },
                     {
                        data: 'platform',
                        name: 'platform'
                    },
                     {
                        data: 'deposit',
                        name: 'deposit'
                    },
                     {
                        data: 'lost_capital',
                        name: 'lost_capital'
                    },
                     {
                        data: 'account_creation',
                        name: 'account_creation'
                    },
                    {
                        data: 'assigned_date',
                        name: 'assigned_date'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },

                ]
            });

            let oTable = $('#users-table').DataTable();
            oTable.on('draw', function() {

                vm.b_data = oTable.ajax.json().data;
                // console.log(vm.b_data);

            });

            $("#search_button").click(function(e) {

                new_table.draw();

            });
        });





        // DELETE LEAD START

        function delete_lead(user_id) {
            let self = this;

            self.replyErrors = [];
            swal({
                title: "Are you sure?",
                text: "Once deleted, you won't be able to recover this user!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((result) => {
                if (result) {
                    axios.post('{{ URL::to('delete_lead') }}', {
                        user_id: user_id,
                    }).then(function(response) {
                        console.log(response);
                        self.output = response.data;
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
                } else {}
            })
        }

        function checkUser_new(user, mt4, e) {
            vm.checkUser_test(user, mt4, e)
        }


        function reset_inputs() {
            $('#divStaffContent').find('input:text, input:password, select')
                    .each(function () {
                        $(this).val('');
                    });
                    $('#check_fromdate').val('');
                    $('#check_todate').val('');
                    $('#check_fromassigneddate').val('');
                    $('#check_toassigneddate').val('');
                    $('.select_custom').chosen();
                }



    </script>

    @stack('user_scripts')

@endsection

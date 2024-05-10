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

        .selectedTemplate{
            box-shadow: 0 1px 3px 0 #0487cc;
            border: 1px solid #0487cc;
            border-top-width: 1px !important;
        }

        .dt-buttons{opacity:0;transition: .5s;}
        .dt-buttons:hover{opacity:1;}

        .btn-dark {
            background-color: #0650a0;
            border: 1px solid #0650a0;
            color: #ffffff;
        }

        tr{background: #f3f6f94a;transition: .3s;font-weight: 900;}


        body.night tr{background: #2b44bf42; color: white;}
        body.night thead tr{color:white!important;}
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


        @media only screen and (min-width: 1600px) {
            th{min-width: 117px;}
        }

        tr:hover{box-shadow: 0 2px 7px rgba(120,130,140,0.3);}

        thead tr{color:black!important;}

        .modal-open .modal{overflow-x:auto!important;}

        .signup-img {
            position: relative;
            width: 385px;
            color:white;
            -webkit-background-size: cover;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .signup-form {
            width: 1015px;
            margin-top: -2px; }

        .signup-img-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -webkit-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
            width: 100%; }

        .register-form {
            padding: 27px 15px 15px 15px;
            margin-bottom: -8px; }

        .form-row {
            margin: 0 -30px; }
        .form-row .form-group {
            width: 50%;
            padding: 0 30px; }

        .form-input, .form-select, .form-radio {
            margin-bottom: 23px; }

        label,.depositForm input {
            display: block;
            width: 100%; }

        label {
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 0px; }

        label.required {
            position: relative; }
        label.required:after {
            content: '*';
            margin-left: 2px;
            color: #b90000; }

        .depositForm input {
            box-sizing: border-box;
            border: 1px solid #ebebeb;
            padding: 14px 20px;
            border-radius: 5px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            -o-border-radius: 5px;
            -ms-border-radius: 5px;
            font-size: 14px;
            font-family: 'Poppins'; }
        .depositForm input:focus {
            border: 1px solid #329e5e; }


        div.dataTables_wrapper div.dataTables_filter label{text-align:right!important;}

        .label-flex {
            justify-content: space-between;
            -moz-justify-content: space-between;
            -webkit-justify-content: space-between;
            -o-justify-content: space-between;
            -ms-justify-content: space-between; }
        .label-flex label {
            width: auto; }

        .form-link {
            font-size: 12px;
            color: #222;
            text-decoration: none;
            position: relative; }
        .form-link:after {
            position: absolute;
            content: "";
            width: 100%;
            height: 2px;
            background: #d7d7d7;
            left: 0;
            bottom: 12px; }

        .display-flex, .signup-content, .form-row, .label-flex, .form-radio-group {
            display: flex;
            display: -webkit-flex; }

        .form-submit {
            text-align: right; }

        .depositForm input, select, textarea {
            outline: none;
            appearance: unset !important;
            -moz-appearance: unset !important;
            -webkit-appearance: unset !important;
            -o-appearance: unset !important;
            -ms-appearance: unset !important; }

        .depositForm input::-webkit-outer-spin-button,.depositForm input::-webkit-inner-spin-button {
            appearance: none !important;
            -moz-appearance: none !important;
            -webkit-appearance: none !important;
            -o-appearance: none !important;
            -ms-appearance: none !important;
            margin: 0; }

        .depositForm input:focus, select:focus, textarea:focus {
            outline: none;
            box-shadow: none !important;
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            -o-box-shadow: none !important;
            -ms-box-shadow: none !important;
        }

        select{width: 100%;
            height: 50px;
            border: 1px solid #eee;
            border-radius: 6px;
            padding: 0 10px}

        .submit {
            width: 150px;
            height: 50px;
            display: inline-block;
            font-family: 'Poppins';
            font-weight: bold;
            font-size: 14px;
            padding: 10px;
            border: none;
            cursor: pointer;
            text-transform: uppercase;
            border-radius: 5px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            -o-border-radius: 5px;
            -ms-border-radius: 5px; }
        .circle-icon {
            width: 30px;
            height: 30px;
            text-align: center;
            line-height: 28px;
            border: 2px solid #B4BBC1;
            border-radius: 100px;
            font-size: 14px;
            color: #B4BBC1;
            cursor: pointer;
            display: block;
            float: left;
        }
        .circle-icon.small {
            height: 25px;
            width: 25px;
            line-height: 23px;
            font-size: 11px;
        }
        .circle-icon:hover {
            color: #57636C;
            border-color: #57636C;
        }
        .circle-icon.red {
            color: #D23B3D;
            border-color: #D23B3D;
        }
        .circle-icon.red:hover {
            color: #791C1E;
            border-color: #791C1E;
        }

        .modal-open .modal{overflow-x:auto!important;}

        .select-list {
            position: relative;
            display: inline-block;
            width: 100%;
            /*margin-bottom: 47px; */
        }

        .list-item {
            position: absolute;
            width: 100%;
            z-index: 99; }
        .checkbox-wrapper {
            cursor: pointer;
            height: 20px;
            width: 20px;
            position: relative;
            display: inline-block;
            box-shadow: inset 0 0 0 1px #A3ADB2;
            border-radius: 1px;
        }
        .checkbox-wrapper input {
            opacity: 0;
            cursor: pointer;
        }
        .checkbox-wrapper input:checked ~ label {
            opacity: 1;
        }
        .checkbox-wrapper label {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            cursor: pointer;
            background: #A3ADB2;
            opacity: 0;
            transition-duration: 0.05s;
        }
        .checkbox-wrapper label:hover {
            background: #95a1a6;
            opacity: 0.5;
        }
        .checkbox-wrapper label:active {
            background: #87949b;
        }

        @media only screen and (min-width:2000px) {
            tr{font-size: 16px;}
        }

    </style>

    <link href="{{asset('/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{asset('/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.3/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

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

                    <div class="border_shadow m-t--4">
                       <div class="card-body col-md-12 pt-0">


                           <div class="box-outer">
                               <a class="arrow-left arrow" id="arrowLeft"><i class="fa fa-chevron-left"></i></a>
                               <a class="arrow-right arrow" id="arrowRight"><i class="fa fa-chevron-right"></i></a>


                               <div style="padding-left: 28px;padding-top: 22px;" class="row"> <h4>Account Request Closure</h4></div>

                               <div class="box-inner">
                                   <table class="table table-padded  box-outer table-responsive-fix-big call-center-table transactionsTable any1transactions any1table" style="width: 100% !important;">

                                <thead class="searchRow">
                                    <tr>
                                        <th data-priority="3">Client</th>
                                        <th class="amountInput" data-priority="3">MT4 Account</th>
                                        <th class="amountInput" data-priority="1">Phone</th>
                                        <th class="amountInput" data-priority="1">Email</th>
                                        <th class="amountInput" data-priority="1">Address</th>
                                        <th class="amountInput" data-priority="1">Reason</th>
                                        <th class="amountInput" data-priority="3">Requested At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($requests->sortByDesc('id') as $request)
                                    @if(isset($request->user))
                                  @if($request->user->manager === logged_in()->id)
                                <tr>
                                    
                                    <td>{{$request->closure_name}} </td>
                                    <td>{{$request->closure_account_id}} </td>
                                    <td>{{$request->closure_phone}} </td>
                                    <td>{{$request->closure_email}} </td>
                                    <td>{{$request->closure_address}} </td>
                                    <td>{{$request->closure_reason}} </td>
                                    <td>{{$request->created_at->format('d/m/Y')}}</td>
                                </tr>
                                @endif
                                @endif
                                @endforeach
                                </tbody>
                            </table>
                               </div>
                           </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->


            <!-- Central Modal Medium Success -->

            <!-- Central Modal Medium Success-->
        </div><!-- container fluid -->

    </div> <!-- Page content Wrapper -->


@endsection

@section('scripts')

    <!-- Required datatable js -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.css"/>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>
    <script src="{{asset('js/toastr.min.js')}}"></script>



    <!-- Datatable init js -->
    <script src="{{asset('pages/datatables.init.js')}}"></script>




    <script>
        var vm = new Vue({
            el: '#app',
            mounted: function () {
                console.log('it started');
            },

            data: function () {
                return {
                    user_id:null,
                    active:null
                }
            },
            methods:{
                setClosure:function(user_id, active) {
                    let self=this;
                    self.replyErrors=[];

                    axios.post('{{URL::to('set_closure')}}', {
                        user_id:user_id,
                        active:active,

                    }).then(function(response) {
                        console.log(response.data);
                        {{--window.location.href = '{{URL::to('personal_info/')}}'+'?msg='+response.data;--}}
                        toastr.success("Closure status changed!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
                        window.location.href='{{URL::to('admin/closure_requests/')}}';

                    }).catch(function(error) {
                        // self.loading = false;
                        self.replyErrors = error.response.data.errors;
                        console.log(error.response.data);
                        toastr.error("Error changing closure status!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
                        window.location.href='{{URL::to('admin/closure_requests/')}}';
                    });
                    console.log(user_id);
                },
            }
        })

    </script>




@endsection

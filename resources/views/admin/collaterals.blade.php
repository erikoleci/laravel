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


        .font-18 {
            font-size: 26px!important;
        }

        tr:hover{box-shadow: 0 2px 7px rgba(120,130,140,0.3);}

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
                                    <h3>Collaterals</h3>
                                </div>
                                <div class="col-xl-4 text-right">
                                    <div class="col-xl-4 text-right">
                                        <a class="btn btn-lg btn-dark text-white"
                                           data-toggle="modal" data-target="#collateralModal"
                                        >
                                            Add Collateral

                                        </a>
                                    </div>
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
                                        <th data-priority="1">Account</th>
                                        <th class="noInput" data-priority="1"></th>
                                        <th data-priority="3">Client</th>
                                        <th data-priority="3">MT4 Account</th>
                                        <th data-priority="1">Amount</th>
                                        <th data-priority="3">Currency</th>
                                        <th data-priority="1">Description</th>
                                        <th class="noInput" data-priority="1">Type</th>
                                        <th data-priority="1">Date</th>

                                    </tr>
                                </thead>
                                <tbody>
                                @if(isset($collaterals))
                                @foreach($collaterals->sortByDesc('id') as $collateral)
                                    @if($collateral->amount != 0)
                                <tr class="">
                                    <td>@if(isset($collateral->user->account_id)) @if (($collateral->user->account_id) === 'black_panther')
                                            <img class="rounded-circle" src="{{asset('images/users/panther_logo.png')}}" alt="user" width="65">
                                            <span style="display: none">Black Panther</span>
                                        @elseif (($collateral->user->account_id) === 'bull_bear')
                                            <img class="rounded-circle" src="{{asset('images/users/bull_logo.png')}}" alt="user" width="65">
                                            <span style="display: none">Bull Bear</span>
                                        @elseif (($collateral->user->account_id) === 'phoenix')
                                            <img class="rounded-circle" src="{{asset('images/users/phoenix_logo.png')}}" alt="user" width="65">
                                            <span style="display: none">Phoenix</span>
                                        @elseif (($collateral->user->account_id) === 'kings')
                                            <img class="rounded-circle" src="{{asset('images/users/kings_logo.png')}}" alt="user" width="65">
                                            <span style="display: none">Kings</span>
                                        @elseif (($collateral->user->account_id) === 'prime')
                                            <img class="rounded-circle" src="{{asset('images/users/prime_logo.png')}}" alt="user" width="75">
                                            <span style="display: none">Kings</span>
                                        @elseif (($collateral->user->account_id) === 'grand_master')
                                            <img class="rounded-circle" src="{{asset('images/users/master_logo.png')}}" alt="user" width="75">
                                            <span style="display: none">Kings</span>
                                        @else
                                            <img class="rounded-circle" src="{{asset('images/users/promo_logo.png')}}" alt="user" width="65">
                                            <span style="display: none">Promo</span>
                                        @endif @endisset
                                    </td>
                                    <td><a @click="delete_collateral({{$collateral->id}})"><i class="fa fa-times font-20 deleteTransaction"></i></a></td>
                                    <td>@if(isset($collateral->user))<a href="{{url('admin/client/'.$collateral->user->id)}}">{{$collateral->user->name}}</a>@endif</td>
                                    <td>@if(isset($collateral->user)){{$collateral->user->mt4_account}}@endif</td>
                                    <td>{{$collateral->amount}}</td>
                                    <td>EUR</td>
                                    <td>@if(isset($collateral->description)) {{($collateral->description)}}@endif</td>
                                    <td>@if($collateral->type==='negative')<i class="fa fa-arrow-left text-danger font-18"></i>@else<i class="fa fa-arrow-right text-success font-18"></i>@endif</td>
                                    <td>{{$collateral->created_at}}</td>


                                </tr>
                                @endif
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
            <div class="modal fade" id="collateralModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-notify modal-success" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <!--Header-->

                        <div class="modal-header">
                            <p class="heading lead">Collateral</p>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="white-text">&times;</span>
                            </button>
                        </div>
                        <div class="text-center">
                            <i style="color:green;font-size:4rem;margin:1rem 0;" class="fa fa-university fa-4x mb-3 animated zoomInLeft "></i>
                        </div>
                        <div>

                            <div class="form-group row">
                                <div class="col-8 centered">
                                    <select v-model="user_id" class="form-control text-capitalize" aria-describedby="addon-right" type="text">
                                        <option v-for="user in users" :value="user.id">@{{ user.name }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-8 centered">
                                    <input v-model="mt4_account" class="form-control" type="text" required="" name="mt4_acc" placeholder="MT4 Account">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-8 centered">
                                    <input v-model="amount" class="form-control" type="text" required="" name="amount" placeholder="Amount">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-8 centered">
                                    <input v-model="description" class="form-control" type="text" required="" name="description" placeholder="Description">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-8 centered">
                                    <select v-model="type" class="form-control text-capitalize" aria-describedby="addon-right" type="text">
                                        <option :value="'positive'">Positive</option>
                                        <option :value="'negative'">Negative</option>
                                    </select>
                                </div>
                            </div>

                            <!--Footer-->
                            <div class="modal-footer justify-content-center">
                                <a @click="submitCollateral()" type="submit" class="btn btn-success">CONFIRM<i class="far fa-gem ml-1 text-white"></i></a>
                            </div>
                        </div>
                    </div>
                    <!--/.Content-->
                </div>
            </div>
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


    <!-- Datatable init js -->
    <script src="{{asset('pages/datatables.init.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="{{asset('js/toastr.min.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        var vm = new Vue({
            el: '#app',
            mounted: function () {
                this.getUsers();
            },

            data: function () {
                return {
                    replyErrors: [],
                    output: null,
                    inputDisabled: true,
                    user_id: null,
                    collateral_id: null,
                    description:null,
                    mt4_account:null,
                    type: 'positive',
                    amount: null,
                    currencyCode: 'EUR',
                    users: [],
                }
            },
            methods: {
                getUsers(){
                    let self = this;
                    axios.get('/get_users/').then(response => {
                        self.users = response.data;
                    });
                },
                submitCollateral() {
                    let self = this;
                    self.replyErrors = [];

                    axios.post('{{URL::to('save_collateral')}}', {
                        user_id: self.user_id,
                        amount: self.amount,
                        type: self.type,
                        description: self.description,
                        mt4_account: self.mt4_account,
                    }).then(function (response) {
                        // console.log(response.data);
                        // self.output = response.data;
                        toastr.success("Deposit inserted successfully!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                        self.user_id=null;
                        self.amount=null;
                        $('#collateralModal').modal('hide');
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
                delete_collateral:function(collateral_id) {

                    let self=this;
                    console.log('im here');

                    self.replyErrors=[];
                    swal({
                        title: "Are you sure?",
                        text: "Once deleted, you won't be able to recover this credit!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((result) => {
                        if (result) {
                            axios.post('{{URL::to('delete_collateral')}}', {
                                collateral_id:collateral_id,
                            }).then(function(response) {
                                console.log(response);
                                self.output=response.data;
                                window.location.href = '{{URL::to('admin/collaterals/')}}';

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
            }
        });
    </script>
    <script>var box = $(".box-inner"), x;


        var hovered = false;
        var loop = window.setInterval(function () {
            if (hovered) {
                // ...
            }
        }, 250);

        var clicks=0;

        var scrollSize=450;
        var windowWidth=$( "table" ).width();
        var maxClicks=Math.floor(windowWidth/scrollSize);
        console.log('wwidth: ', windowWidth, 'scrolls: ', scrollSize, 'maxClicks: ',maxClicks);
        $(".arrow").click(


            function() {
                if ($(this).hasClass("arrow-right")) {
                    if (clicks<maxClicks){
                        clicks=clicks+1;
                    }
                    else{
                        $('#arrowRight').css('display','none');
                    }

                    if ($(this).scrollLeft){
                        $('#arrowLeft').css('display','inline-block');
                    }
                    console.log(clicks);

                    x = ((box.width()));
                    // console.log('im right');
                    box.animate({scrollLeft: scrollSize*clicks}
                    )
                } else {
                    if (clicks>=1){
                        clicks=clicks-1;
                        $('#arrowRight').css('display','inline-block');

                    }
                    if (clicks===0){
                        $('#arrowLeft').css('display','none');
                    }
                    // clicks=clicks-1;

                    // console.log('im left');
                    x = ((box.width()));
                    box.animate({
                            scrollLeft: scrollSize*clicks,
                        }
                    )
                }
            }
        )
    </script>
@endsection

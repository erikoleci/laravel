@extends('layouts.dashboard')
@section('style')


    <style>



        .card-wrapper {
            display: inline-block;
            perspective: 1000px;
            width: 100%;
            height:100%
        }
        .card-wrapper .card {
            position: relative;
            cursor: pointer;
            transition-duration: 0.6s;
            transition-timing-function: ease-in-out;
            transform-style: preserve-3d;
            height: 100%;
            width: 100%;
        }
        .card-wrapper .card .front,
        .card-wrapper .card .back {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            transform: rotateX(0deg);
        }
        .card-wrapper .card .front {
            z-index: 2;
        }

        .card-wrapper .card .back,
        .card-wrapper.flip-right .card .back {
            transform: rotateY(180deg);
        }
        .card-wrapper:hover .card,
        .card-wrapper.flip-right:hover .card {
            transform: rotateY(180deg);
        }
        .card-wrapper.flip-left .card .back {
            transform: rotateY(-180deg);
        }
        .card-wrapper.flip-left:hover .card {
            transform: rotateY(-180deg);
        }
        .card-wrapper.flip-up .card .back {
            transform: rotateX(180deg);
        }
        .card-wrapper.flip-up:hover .card {
            transform: rotateX(180deg);
        }
        .card-wrapper.flip-down .card .back {
            transform: rotateX(-180deg);
        }
        .card-wrapper.flip-down:hover .card {
            transform: rotateX(-180deg);
        }
        .card-wrapper.flip-diagonal-right .card .back {
            transform: rotate3d(1, 1, 0, 180deg);
        }
        .card-wrapper.flip-diagonal-right:hover .card {
            transform: rotate3d(1, 1, 0, 180deg);
        }
        .card-wrapper.flip-diagonal-left .card .back {
            transform: rotate3d(1, 1, 0, -180deg);
        }
        .card-wrapper.flip-diagonal-left:hover .card {
            transform: rotate3d(1, 1, 0, -180deg);
        }
        .card-wrapper.flip-inverted-diagonal-right .card .back {
            transform: rotate3d(-1, 1, 0, 180deg);
        }
        .card-wrapper.flip-inverted-diagonal-right:hover .card {
            transform: rotate3d(-1, 1, 0, 180deg);
        }
        .card-wrapper.flip-inverted-diagonal-left .card .back {
            transform: rotate3d(1, -1, 0, 180deg);
        }
        .card-wrapper.flip-inverted-diagonal-left:hover .card {
            transform: rotate3d(1, -1, 0, 180deg);
        }




        .gradient-1{background: linear-gradient(to right, #8e9eab, #eef2f3);padding: 2rem 0rem 2rem 0rem;}
        .gradient-2{background: linear-gradient(135deg, #23bdb8 0%, #43e794 100%);padding: 2rem 0rem 2rem 0rem;}
        .gradient-3{background-color: #007ea7;background-image: linear-gradient(315deg, #007ea7 0%, #80ced7 74%);padding: 2rem 0rem 2rem 0rem;}
        .gradient-4{background: linear-gradient(to right, #fceabb, #f8b500);padding: 2rem 0rem 2rem 0rem;}
        .statistic_content{display: flex; align-items: center;}
        .statistic_icons{width:85px;margin-left:30px; margin-right:15px;}
        .card{box-shadow: 0 2px 5px rgba(0,0,0,.5); transition: .5s all;}
        .card:hover{box-shadow: 0 2px 5px rgba(0,0,0,.8); transform: translateY(-5px)}


        .col-lg-3 .wdgt-opt, .col-lg-4 .wdgt-opt {
            top: 25px;
            right: 30px;
        }

        .wdgt-opt {
            position: absolute;
            right: 40px;
            top: 35px;
            z-index: 2;
        }

        .col-lg-3 .wdgt-opt > a, .col-lg-4 .wdgt-opt > a {
            font-size: 20px;
        }

        .wdgt-opt > a + a {
            padding-left: 10px;
            margin-left: 10px;
        }
        .wdgt-opt > a {
            color: #9b9b9b;
            font-size: 25px;
            line-height: initial;
            position: relative;
            display: inline-block;
        }

        .wdgt-ldr {
            position: absolute;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(255,255,255,.9);
            z-index: 2;
            opacity: 0;
            visibility: hidden;
        }

        .td-lst-wrp .wdgt-titl {
            padding: 20px 40px 0;
        }
        .wdgt-titl {
            float: left;
            position: relative;
            width: 100%;
        }


        body.night .card-body{
            color: black;

        }

        .td-wrp {
            float: left;
            width: inherit !important;
            height: inherit !important;
        }

        .td-lst-wrp .slimScrollDiv {
            height: 480px !important;
            float: left;
            width: 100% !important;
        }
        .wdgt-titl + .slimScrollDiv {
            margin-top: 20px;
        }

        .td-lst > li.blu-td:before {
            background-color: #7460ee;
        }
        .td-lst > li:before {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            z-index: -1;
            opacity: .05;
        }

        .td-lst > li.blu-td {
            border-left-color: #7460ee;
        }
        .td-lst > li {
            float: left;
            width: 100%;
            border-left: 5px solid;
            padding: 23.1px 40px 22.1px 35px;
            position: relative;
            line-height: 25px;
            z-index: 1;
        }

        .td-lst {
            padding-left: 0;
            list-style: none;
            float: left;
            width: 100%;
            margin-bottom: 0;
        }

        .td-lst > li h6 {
            font-size: 14px;
            font-family: Barlow;
            color: #555;
            margin-bottom: 0;
        }

        .td-lst > li span {
            display: block;
            font-size: 13px;
            color: #a3a3a3;
            text-transform: uppercase;
        }

        .td-lst > li a {
            position: absolute;
            right: 10px;
            line-height: 30px;
            width: 30px;
            font-size: 16px;
            -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.1);
            -ms-box-shadow: 0 5px 10px rgba(0,0,0,.1);
            -o-box-shadow: 0 5px 10px rgba(0,0,0,.1);
            box-shadow: 0 5px 10px rgba(0,0,0,.1);
            text-align: center;
            top: 10px;
            z-index: 1;
            background-color: #fff;
            -webkit-border-radius: 4px;
            border-radius: 4px;
            margin-top:20px;
        }

        .ad-tsk {
            float: left;
            width: 100%;
            padding: 19.25px 40px;
            text-align: center;
        }

        .ad-tsk > a {
            -webkit-border-radius: 40px;
            border-radius: 40px;
            color: #fff;
            width: 100%;
            text-transform: uppercase;
            font-size: 13px;
            font-weight: 600;
            padding: 10px 30px;
            display: inline-block;
            background-color: #0d0d77;
        }

        .ion-android-delete:before {
            content: "\f37f";
        }

        .remove-ext5 .wdgt-box {
            margin-bottom: 40px;
        }

        .gray-bg .wdgt-box {
            background-color: #fff;
        }

        .wdgt-box {
            background-color: #ffffff;
            float: left;
            width: 100%;
            position: relative;
            -webkit-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.1);
            -ms-box-shadow: 0 5px 10px rgba(0,0,0,.1);
            -o-box-shadow: 0 5px 10px rgba(0,0,0,.1);
            box-shadow: 0 5px 10px rgba(0,0,0,.1);
            overflow: hidden;
        }

        .add-tsk {
            float: left;
            display: none;
            width: 100%;
            background-color: #fbfbfb;
            padding: 25px 40px;
        }


        .add-tsk > form {
            display: flex;
            width: 80%;
            position: relative;
            -webkit-border-radius: 5px;
            border-radius: 5px;
            overflow: hidden;
            margin: auto;
        }

        .add-tsk > form input {
            background-color: #fff;
            font-size: 13px;
            height: 40px;
            padding: 10px 40px 10px 20px;
            width: 100%;
            float: left;
            color: #777;
            border:none;
        }


        .add-tsk > form button{

            border:none;
            padding:2px 15px;
            color:white;
            background: darkblue;
        }

        .td-lst > li.grn-td:before {
            background-color: #60ee8f;
        }

        .td-lst > li.grn-td {
            border-left-color: #60ee8f;
        }

        .td-lst > li.red-td:before {
            background-color: #ee606a;
        }

        .td-lst > li.red-td {
            border-left-color: #ee606a;
        }

        .td-lst > li.ylw-td:before {
            background-color: #e6e032;
        }
        .td-lst > li.ylw-td {
            border-left-color: #e6e032;
        }

        .td-lst-wrp .slimScrollDiv {
            height: 480px !important;
            float: left;
            width: 100% !important;
        }


        .card_testt.ful-wdgt {
            position: fixed;
            z-index: 99999;
        }

        .wdgt-box.ful-wdgt {
            position: fixed;
            z-index: 99999;
        }
        .ful-wdgt {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin-bottom: 0 !important;
        }

        polyline{display:none!important}

        tspan{font-size: 12px;}
    </style>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.3/axios.min.js"></script>
    <link href="{{asset('/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{asset('/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')


    <div class="page-content-wrapper usersContainer" id="app">

        <div class="container-fluid">


            <!-- DASHBOARD PANEL -->


            <div class="row mt-4" style="height:130px;">



                <div class="col-xl-3 col-xxl-6 col-sm-6">

                    <div class="card-wrapper flip-left">

                        <div class="card statistic_cards">

                            <div class="card-body gradient-1 front">

                                <div class="statistic_content">

                                    <img class="statistic_icons" src="{{asset('images/bank_icon.png')}}" alt="bank_icon">

                                    <div class="statistic_description">


                                        <h4>{{number_format((($deposit->where('type','positive')->sum('source_amount'))-($deposit->where('type','negative')->sum('amount'))),2)}}</h4>
{{--                                        <h3>@if($deposit){{number_format($deposit->sum('source_amount'),2)}} € @endif</h3>--}}
                                        <h6>Bank Deposit</h6>

                                    </div>

                                </div>

                            </div>



                            <div class="card-body gradient-1 back">
                                <div class="statistic_content">

                                    <img class="statistic_icons" src="{{asset('images/bank_icon.png')}}" alt="bank_icon">

                                    <div class="statistic_description">

                                        <h3>@if($bank_total){{number_format((($bank_total->where('type','positive')->sum('source_amount'))-($bank_total->where('type','negative')->sum('source_amount'))),2)}} € @endif</h3>
{{--                                        <h3>@if($bank_total){{number_format($bank_total->sum('source_amount'),2)}} € @endif</h3>--}}
                                        <h6>Total Bank Deposit </h6>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--            <div class="card statistic_cards">--}}

                {{--            <div class="card-body gradient-2">--}}

                {{--            <div class="statistic_content">--}}

                {{--                <img class="statistic_icons" src="{{asset('images/bank_icon.png')}}" alt="bank_icon">--}}

                {{--                <div class="statistic_description">--}}

                {{--                <h3>@if($deposit){{number_format($deposit->sum('source_amount'),2)}} € @endif</h3>--}}
                {{--                <h6>Bank Deposit</h6>--}}

                {{--                </div>--}}

                {{--            </div>--}}

                {{--            </div>--}}

                {{--            </div>--}}







                <div class="col-xl-3 col-xxl-6 col-sm-6">

                    <div class="card-wrapper flip-up">



                        <div class="card statistic_cards">

                            <div class="card-body gradient-2 front">

                                <div class="statistic_content">

                                    <img class="statistic_icons" src="{{asset('images/card_icon.png')}}" alt="card_icon">

                                    <div class="statistic_description">

                                        <h3>@if($depos_card){{number_format($depos_card->sum('source_amount'),2)}} € @endif</h3>
                                        <h6>Card Deposit </h6>

                                    </div>

                                </div>

                            </div>



                            <div class="card-body gradient-2 back">
                                <div class="statistic_content">

                                    <img class="statistic_icons" src="{{asset('images/card_icon.png')}}" alt="card_icon">

                                    <div class="statistic_description">

                                        <h3>@if($card_total){{number_format($card_total->sum('source_amount'),2)}} € @endif</h3>
                                        <h6>Total Card Deposit</h6>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>



                    {{--                <div class="card statistic_cards">--}}

                    {{--                    <div class="card-body gradient-3">--}}

                    {{--                        <div class="statistic_content">--}}

                    {{--                            <img class="statistic_icons" src="{{asset('images/card_icon.png')}}" alt="card_icon">--}}

                    {{--                            <div class="statistic_description">--}}

                    {{--                                <h3>@if($depos_card){{number_format($depos_card->sum('source_amount'),2)}} € @endif</h3>--}}
                    {{--                                <h6>Card Deposit</h6>--}}

                    {{--                            </div>--}}

                    {{--                        </div>--}}

                    {{--                    </div>--}}

                    {{--                </div>--}}

                </div>





                <div class="col-xl-3 col-xxl-6 col-sm-6">


                    <div class="card-wrapper flip-up">



                        <div class="card statistic_cards">

                            <div class="card-body gradient-3 front">

                                <div class="statistic_content">

                                    <img class="statistic_icons" src="{{asset('images/withdraw_icon.png')}}" alt="withdraw">

                                    <div class="statistic_description">

                                        <h3>@if($withdraws){{number_format($withdraws->sum('amount'),2)}} € @endif</h3>
                                        <h6>Withdraw Requests</h6>

                                    </div>

                                </div>

                            </div>



                            <div class="card-body gradient-3 back">
                                <div class="statistic_content">

                                    <img class="statistic_icons" src="{{asset('images/withdraw_icon.png')}}" alt="withdraw">

                                    <div class="statistic_description">

                                        <h3>@if($withdraw_total){{number_format($withdraw_total->sum('amount'),2)}} € @endif</h3>
                                        <h6>Total Withdraw Requests</h6>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    {{--                <div class="card statistic_cards">--}}

                    {{--                    <div class="card-body gradient-4">--}}

                    {{--                        <div class="statistic_content">--}}

                    {{--                            <img class="statistic_icons" src="{{asset('images/withdraw_icon.png')}}" alt="withdraw">--}}

                    {{--                            <div class="statistic_description">--}}

                    {{--                                <h3>@if($withdraws){{number_format($withdraws->sum('amount'),2)}} € @endif</h3>--}}
                    {{--                                <h6>Withdraw Requests</h6>--}}

                    {{--                            </div>--}}

                    {{--                        </div>--}}

                    {{--                    </div>--}}

                    {{--                </div>--}}

                </div>




                <div class="col-xl-3 col-xxl-6 col-sm-6">

                    <div class="card-wrapper flip-right">



                        <div class="card statistic_cards">

                            <div class="card-body gradient-4 front">

                                <div class="statistic_content">

                                    <img class="statistic_icons" src="{{asset('images/user_icon.png')}}" alt="user_icon">

                                    <div class="statistic_description">

                                        <h3>{{$users->count()}}</h3>
                                        <h6>New Users</h6>

                                    </div>

                                </div>

                            </div>



                            <div class="card-body gradient-4 back">
                                <div class="statistic_content">

                                    <img class="statistic_icons" src="{{asset('images/user_icon.png')}}" alt="user_icon">

                                    <div class="statistic_description">

                                        <h3>{{$users_total->count()}}</h3>
                                        <h6>Total Users</h6>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    {{--                <div class="card statistic_cards">--}}

                    {{--                    <div class="card-body gradient-4">--}}

                    {{--                        <div class="statistic_content">--}}

                    {{--                            <img class="statistic_icons" src="{{asset('images/user_icon.png')}}" alt="user_icon">--}}

                    {{--                            <div class="statistic_description">--}}

                    {{--                                <h3>{{$users->count()}}</h3>--}}
                    {{--                                <h6>New Users</h6>--}}

                    {{--                            </div>--}}

                    {{--                        </div>--}}

                    {{--                    </div>--}}

                    {{--                </div>--}}

                </div>


            </div>




            <!-- REVENUE + TO DO LIST -->


            <div class="row mt-5">

                <div class="col-lg-8">

                    <div class="card card_testt" style="height:100%;background-color: white">
                        <div class="card-body">
                            <div class="row m-0">
                                <h4 class="mt-0 header-title">Daily Revenue </h4>
                                <select class="ml-auto" @change="generateChart(selectedMonth)" v-model="selectedMonth" id="">
                                    <option :value="00">January</option>
                                    <option :value="01">February</option>
                                    <option :value="02">March</option>
                                    <option :value="03">April</option>
                                    <option :value="04">May</option>
                                    <option :value="05">June</option>
                                    <option :value="06">July</option>
                                    <option :value="07">August</option>
                                    <option :value="08">September</option>
                                    <option :value="09">October</option>
                                    <option :value="10">November</option>
                                    <option :value="11">December</option>
                                </select>
                            </div>
                            <canvas id="bar-chart" width="800" height="450"></canvas>
                        </div><!--end card-body-->
                    </div>


                </div>

                <div class="col-lg-4">

                    <div class="card wdgt-box td-lst-wrp">
                        <div class="wdgt-opt">
                            <a class="expnd-btn" href="#" title=""><i class="icon ion-arrow-expand"></i></a>
                        </div>
                        <div class="wdgt-ldr">
                            <div class="ball-pulse">
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                        <div class="wdgt-titl">
                            <h4>To Do list</h4>
                            <p>Please Mention Your task</p>
                        </div>

                        <div class="td-wrp">
                            <div class="add-tsk">
                                <form action="submit" method="POST">
                                    <input v-model="todo_desc" type="text" placeholder="Add Your Task Here..." />
                                    <button @click.prevent="submitTodo(todo_desc)" type="submit"><i class="icon ion-forward"></i></button>
                                </form>
                            </div>
                            <ul class="td-lst">
                                <li v-for="todo in todos" class="blu-td">
                                    <h6>@{{ todo.description }}</h6>
                                    <span>@{{ todo.created_at }}</span>
                                    <a @click.prevent="deleteTodo(todo.id)" title=""><i class="far fa-trash-alt"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="ad-tsk">
                            <a class="ad-tsk-btn" href="#" title="">Add Task</a>
                        </div>
                    </div>

                </div>

            </div>



            <!-- NEW USERS + ACCOUNT TYPES -->

            <div class="row mt-5">

                <div class="col-lg-7">

                    <div class="card" style="background-color:white">
                        <div class="card-body new-user">
                            <h5 class="header-title mb-4 mt-0">New Users</h5>
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>

                                    <tr>
                                        <th class="border-top-0">Name</th>
                                        <th class="border-top-0">Phone</th>
                                        <th class="border-top-0">Email</th>
                                        <th class="border-top-0">Deposit</th>
                                    </tr>

                                    </thead>

                                    <tbody>
                                    @foreach($users_total as $user)
                                        @if($loop->index < 8)
                                            <tr>
                                               
                                                <td><a href="javascript:void(0);">{{$user->name}}</a></td>
                                                <td>{{$user->phone}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{number_format($user->deposits->sum('source_amount'), 2, '.', '')}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div><!--end card-body-->
                    </div>


                </div>

                <div class="col-lg-5">

                    <div class="card" style="background-color:white;width: 100%; height: 100%" >
                        <h6 style="padding-left: 15px; padding-top:15px">Account Types</h6>
                        <div style="width: 100%; height: 100%" id="chartdiv"></div>

                    </div>

                </div>






            </div><!-- container fluid -->

        </div> <!-- Page content Wrapper -->


    @endsection

    @section('scripts')

        <!-- Required datatable js -->
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.css"/>

            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>

            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

            <script src="https://www.amcharts.com/lib/4/core.js"></script>
            <script src="https://www.amcharts.com/lib/4/charts.js"></script>
            <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
            <!-- Datatable init js -->
            <script src="{{asset('pages/datatables.init.js')}}"></script>

            <script>

                var d = new Date();
                var month = d.getMonth();
                console.log(month);

                var vm = new Vue({
                    el: '#app',
                    created: function () {
                        // this.getChartData('02');
                        console.log('it started');
                        this.getTodos();
                    },

                    mounted(){
                        this.generateChart(month);

                    },

                    data: function () {
                        return {
                            replyErrors:[],
                            spinVal:[],
                            withdrawVal:[],
                            real_pass:'',
                            type: 'bar',
                            selectedMonth:month,
                            dataclicks:@json($deposits_daily),
                            chart:null,
                            todos:[],
                            todo_desc:null,
                        }
                    },
                    methods:{

                        getChartData(month){

                            let self=this;
                            axios.post('{{URL::to('deposits_chart')}}', {
                                month:month,
                            }).then(function(response) {
                                self.dataclicks=[];
                                self.dataclicks=response.data;
                                // console.log('hmm: ',self.dataclicks);

                            }).catch(function(error) {
                                // self.loading = false;
                                self.replyErrors = error.response.data.errors;
                                console.log(error.response.data);
                                {{--toastr.error("Error changing the password!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});--}}
                                {{--window.location.hash='{{URL::to('personal_info/')}}';--}}
                            });

                        },

                        changeChart(month){
                            this.generateChart();
                        },

                        generateChart(month){
                            let self=this;
                            self.getChartData(month);


                            var ctx = document.getElementById("bar-chart").getContext("2d");
                            if(window.bar != undefined)
                                window.bar.destroy();
                            window.bar = new Chart(ctx, {
                                type: 'bar',
                                data_click: this.dataclicks['sums'],

                                data: {
                                    labels: this.dataclicks['dates'],
                                    datasets: [
                                        {
                                            label: "Revenue",
                                            backgroundColor: "#3e95cd",
                                            data: this.dataclicks['sums']
                                        }
                                    ]
                                },
                                options: {
                                    legend: { display: false },
                                    title: {
                                        display: false,
                                        text: ''
                                    }
                                }
                            });

                        },

                        submitTodo(desc){
                            let self=this;
                            axios.post('{{URL::to('todo_store')}}', {
                                description:desc,
                            }).then(function(response) {
                                self.getTodos();
                                toastr.success("Todo saved", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});

                            }).catch(function(error) {
                                // self.loading = false;
                                console.log('error');
                                {{--toastr.error("Error changing the password!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});--}}
                                {{--window.location.hash='{{URL::to('personal_info/')}}';--}}
                            });
                        },

                        getTodos(){
                            axios.get('{{URL::to('/todos')}}')
                                .then(response => {
                                    this.todos=response.data;
                                    // self.users = response.data;
                                });
                        },

                        deleteTodo(id){
                            let self=this;
                            axios.post('{{URL::to('todo_destroy')}}', {
                                todo_id:id,
                            }).then(function(response) {
                                self.getTodos();
                                // toastr.success("Todo deleted", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
                                console.log('response');

                            }).catch(function(error) {
                                // self.loading = false;
                                console.log('error');
                                {{--toastr.error("Error changing the password!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});--}}
                                {{--window.location.hash='{{URL::to('personal_info/')}}';--}}
                            });
                        }
                    }
                });



                //===== To DO List Add Task Field =====//
                $('.ad-tsk-btn').on('click', function(){
                    $('div.add-tsk').slideToggle();
                    return false;
                });

                //===== To Do List Deleted =====//
                $('.td-lst > li > a').on('click', function () {
                    $(this).parent('li').slideUp();
                    return false;
                });

                var counter = 0;
                var skns = ['grn-td','blu-td','red-td','ylw-td'];
                $('.add-tsk form > button').on('click', function () {
                    var task_list = $('ul.td-lst');
                    var task_item = $('.add-tsk form > input').val();
                    var date = new Date();
                    var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul',
                        'Aug','Sep','Oct','Nov','Dec'];
                    var current_date = date.getDate()+' '+months[date.getMonth()]+' '+date.getFullYear();

                    return false;
                });

                if ($.isFunction($.fn.slimscroll)) {
                    $('.td-wrp,.sal-lst-wrp').slimscroll({});
                };

                /**
                 * ---------------------------------------
                 * This demo was created using amCharts 4.
                 *
                 * For more information visit:
                 * https://www.amcharts.com/
                 *
                 * Documentation is available at:
                 * https://www.amcharts.com/docs/v4/
                 * ---------------------------------------
                 */

                // Themes begin
                am4core.useTheme(am4themes_animated);
                // Themes end

                var chart = am4core.create("chartdiv", am4charts.PieChart3D);
                chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

                chart.legend = new am4charts.Legend();

                chart.data = [
                    {
                        account: "Italy",
                        value: @if($uit){{$uit}}}@endif,
                    {
                        account: "Greece",
                        value: {{$ugr}}},
                    {
                        account: "Spain",
                        value: {{$ues}}},
                    {
                        account: "Germany",
                        value: {{$ude}}}];

                var series = chart.series.push(new am4charts.PieSeries3D());
                series.dataFields.value = "value";
                series.dataFields.category = "account";


                $('.expnd-btn').on('click', function(){
                    $(this).parent().parent().toggleClass('ful-wdgt');
                    return false;
                });

            </script>


@endsection

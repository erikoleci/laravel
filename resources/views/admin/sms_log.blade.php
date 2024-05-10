@extends('layouts.dashboard')
@section('style')


    <style>

        .container-sms {
            border: 2px solid #dedede;
            background: linear-gradient(to left, #bdc3c7, #2c3e50);
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
            transition: 1s all;
        }


        .container-sms::after {
            content: "";
            clear: both;
            display: table;
        }

        .container-sms img {
            float: left;
            max-width: 60px;
            width: 100%;
            margin-right: 20px;
            border-radius: 50%;
        }

        .container-sms img.right {
            float: right;
            margin-left: 20px;
            margin-right:0;
        }

        .time-right {
            float: right;
            color: #000;
        }

        .time-left {
            float: left;
            color: #000;
        }

        .darker {
            border-color: #ccc;
            background: linear-gradient(to right, #bdc3c7, #2c3e50);
        }

        .load_more_btn{
            display: flex;
            align-items: center;
            background: darkcyan;
            width: fit-content;
            padding: 3px 12px;
            border-radius: 3px;
            cursor: pointer;
            margin: 0 auto;
        }

        .load_more_btn span{
            font-size: 16px;
        }

        .load_more_btn svg {
            margin-right: 5px;
            font-size: 18px;
            color: seashell;
        }

        .sender{
            font-size: 15px;
            font-weight: 700;
            color: #207d36;
        }

        .receiver{
            font-size: 15px;
            font-weight: 700;
            color: #2c629c;
        }

        .received_sms{
            font-size: 50px;
            margin-left: 21px;
            color: #d25454;
        }

        .sent_sms{
            font-size: 50px;
            margin-right: 21px;
            color: darkcyan;
        }

    </style>



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
                                    <h3>Sms Log</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div v-for="sms in sms">
                                <div v-if="sms.type === 'out'" class="container-sms darker d-flex align-items-center">
                                    <div><i class="fas sent_sms fa-arrow-right"></i></div>
                                    <div><div class="d-flex align-items-center m-b-10"><span class="m-r-10 sender">@{{ sms.user_name }}</span><i class="fa fa-arrow-right m-r-10"></i><span class="receiver">@{{ sms.client_name }}</span></div>
                                    <p>@{{ sms.message }}</p>
                                    <span class="time-left">@{{ sms.created_at }}</span>
                                    </div>
                                </div>


                                <div v-else class="container-sms d-flex align-items-center justify-content-end">
                                    <div><div class="d-flex align-items-center justify-content-end m-b-10"><span class="m-r-10 sender">@{{ sms.from_number }}</span><i class="fa fa-arrow-right m-r-10"></i><span class="receiver"> </span></div>
                                    <p class="text-right">@{{ sms.message }}</p>
                                    <span class="time-right">@{{ sms.created_at }}</span>
                                    </div>
                                    <div><i class="fas received_sms fa-arrow-left"></i></div>
                                </div>

                            </div>

                            <div class="load_more_btn" @click="LoadMore()"><i class="fas fa-spinner"></i><span> Load More </span></div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->


        </div><!-- container fluid -->

    </div> <!-- Page content Wrapper -->


@endsection

@section('scripts')

    <!-- Required datatable js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.3/axios.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="{{asset('js/toastr.min.js')}}"></script>


    <script>
        var vm = new Vue({
            el: '#app',
            mounted: function () {

                this.getSms(this.sms_number);
                // console.log();
            },

            data: function () {
                return {
                    sms_number:5,
                    sms: [],
                }
            },
            methods:{

                getSms(nr){
                    let self = this;
                    axios.get('/{{get_guard()}}/get_sms_log/'+nr).then(response => {
                        self.sms = response.data.sms;
                    });
                },

                LoadMore(){
                    let self = this;
                    self.sms_number = self.sms_number + 5;
                    self.getSms(self.sms_number);
                },

            }
        })
    </script>


@endsection

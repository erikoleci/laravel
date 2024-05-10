{{--@extends('layouts.dashboard')--}}
<head>
{{--@section('style')--}}

    <style>

        body{
            background-color: #252424!important;
        }

        .hide{
            display: none!important;
        }

        .add_more_button{
            padding: 5px 24px;
            margin-top: 75px;
            margin: 9px 5px 0;
            border-radius: 2px;
            border: none;
            font-size: 15px;
            width: 130px;
        }

        .new-clients-input{
            width: 50%;
            text-align: center;
        }

        .date-input{
            background: #f3f3f3!important;
            height: 40px!important;
            border-radius: 4px!important;;
        }
    </style>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('packages/core/main.css')}}" rel='stylesheet' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
{{--@endsection--}}
</head>
{{--@section('content')--}}

<body>
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
                    <div class="m-t--20">
                        <div class="border-0  mt-20">
                            <div class="col-md-6 ml-auto mr-auto text-center">

                            </div>


                            <!-- Grid row -->
                            <div class="row accordion-gradient-bcg d-flex justify-content-center">

                                <!-- Grid column -->
                                <div class="col-md-10 col-xl-8 py-5 d-flex flex-column">

                                    <div>
                                        <h3 style="text-align: center; color: #b73535;" v-if="show_required_msg"> Please fill out all the inputs before submit:</h3>
                                        <div class="d-flex align-items-center justify-content-between m-b-10" v-for="indexx in counter" :key="indexx">
                                           <select v-model="user[indexx-1]" @change="log_index($event.target.selectedIndex)" class="input_custom custom-select m-r-5" placeholder="Clients">
                                           <option  v-for="(user, index) in  users"  :class="'id'+index" :hidden="user.accept_terms === '0'"> @{{ user.name }}</option>
                                           </select>
                                            <input class="input-group input_custom m-r-5" v-model="amount[indexx-1]" placeholder="Amount">
                                            <input  v-model="date[indexx-1]" type="date" class="form-control date-input m-r-5" placeholder="dd.mm.yyyy">
                                            <input  v-model="comment[indexx-1]" class="input-group input_custom m-r-5" placeholder="Comment">
                                            <select v-model="type[indexx-1]" class="input_custom custom-select m-r-5">
                                            <option value="Confirmed" >Confirmed</option>
                                            <option value="To Confirm">To Confirm</option>
                                            <option value="50/50">50/50</option>
                                            </select>

                                        </div>
                                        <div v-if="show_need_users" class="d-flex flex-column align-items-center">
                                            <h4>How many clients do you need this month?</h4>
                                            <input class="input-group input_custom new-clients-input" v-model="new_clients" placeholder="New Clients">
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-center">
                                    <button v-if="user_counter > 1" class="add_more_button" @click="addRow" type="button">Add More</button>
                                    <button  v-if="user_counter === 1" class="add_more_button" @click="change_need_users" type="button">New Clients</button>
                                    <button v-if="user_counter === 0" class="add_more_button" @click="participants" type="button">Send</button>
                                    </div>
                                </div>
                                <!-- Grid column -->

                            </div>

                            <!-- Grid row -->

                        </div>
                   </div>
                </div>
            </div>

        </div><!-- container fluid -->

    </div> <!-- Page content Wrapper -->
</body>

{{--@endsection--}}

{{--@section('scripts')--}}

<script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js"></script>

{{--    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>--}}
    <script src="{{asset('js/toastr.min.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.3/axios.min.js"></script>





    <script>
        var vm = new Vue({
            el: '#app',
            mounted: function () {
                this.getUserss();
                // this.$el.getElementsByClassName('datepicker').datepicker();
            },

            data: function () {
                return {
                    counter:1,
                    user_counter:null,
                    user:[],
                    amount:[],
                    date:[],
                    comment:[],
                    user_add:null,
                    type:[],
                    users:[],
                    result:[],
                    show_required_msg:0,
                    show_need_users:0,
                    selected_option:null,
                    new_clients:null,
                }
            },
            methods: {


                getUserss() {
                    let self = this;
                    axios.get('/manager/get_manager_users/').then(response => {
                        self.users = response.data;
                        self.user_counter = response.data.length;
                        console.log(self.users);
                    });
                    // console.log(self.users);
                    // console.log(self.users_count);
                },
                log_index(selectedIndex){

                    this.users[selectedIndex].accept_terms = '0';
                },
                participants() {
                    for (let i = 0; i < this.user.length; i++) {
                        this.result.push({ user:this.user[i], amount:this.amount[i], date:this.date[i], type:this.type[i], comment:this.comment[i] });
                    }
                    // console.log(this.result)
                    axios.post('{{URL::to('/manager/post_form_data/')}}', {
                        form_dataaa:this.result,
                        new_clients:this.new_clients,
                    }).then(function(response) {
                        toastr.success("Form Sent!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                        window.location.href='{{URL::to('manager/clients/')}}';
                    }).catch(function(error) {
                        toastr.error("Couldn't send Form", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                    });
                },


                // OPEN COMMENT MODAL FUNCTIONS

                OpenStatus(id){

                    axios.post('{{URL::to('/admin/get_status')}}', {
                        id:id,
                    }).then(function(response) {

                        var final = response.data[0];
                        vm.OpenStatusModal(final);
                    }).catch(function(error) {
                        console.log(error);

                    });
                },

                change_need_users(){
                  if(this.user.length > 0){
                    if (this.user.filter(Boolean).length === this.amount.filter(Boolean).length  && this.user.filter(Boolean).length === this.date.filter(Boolean).length && this.user.filter(Boolean).length === this.comment.filter(Boolean).length && this.user.filter(Boolean).length === this.type.filter(Boolean).length) {
                    this.show_need_users=1;
                    --this.user_counter;

                    }
                    else {
                        this.show_required_msg = 1;
                    }

                  }

                },

                addRow:function () {
                    ++this.counter;
                    --this.user_counter;
                    },




            }
        });
    </script>

{{--@endsection--}}

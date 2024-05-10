@extends('layouts.dashboard')
@section('style')

    <style>

        .uploaded_image{
            max-width: 750px;
        }

        .row-searches{
        width: 100%;
        padding: 0 20px;
        }

        .search-row{
           width: 20%;
        }

        .width-10{
            width: 10%;
        }

        .width-15{
            width: 15%;
        }

        .width-20{
            width: 20%;
        }

        .width-55{
            width: 55%;
            padding-right: 10px;
        }


        .custom-ul{
            list-style: none;
            font-weight: 700;
            font-size: 16px;
            color: #80adc7;
        }
        .new_clients_heading{
            margin: 30px auto 0;
            width: fit-content;
            color: #80adc7;
        }

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection
@section('content')


    <div class="page-content-wrapper usersContainer" id="app">

        <div class="container-fluid">

            <!-- end row -->
            <div class="row">
                <div class="col-xl-12 ">
                    <div class="m-t--20">
                        <div class="border-0  mt-20">

                            <!-- Grid row -->
                            <div class="row accordion-gradient-bcg d-flex justify-content-center">
                              @if(onlyguard('admin'))
                               <div class="d-flex align-items-center justify-content-between row-searches">
                                <div>
                                    <label>Limit:</label>
                                    <select @change="getForms"  v-model="form_limit" class="custom-select">
                                        <option :value="5">5</option>
                                        <option :value="10">10</option>
                                        <option :value="12">15</option>
                                    </select>
                                </div>
                                 <div class="search-row">
                                    <label>Select Manager:</label>
                                    <select @click="getManagers" @change="findFormsByUser" v-model="user_name" class="custom-select">
                                        <option v-for="user in users" :value="user.id">@{{ user.name }}</option>
                                    </select>
                                 </div>
                                </div>
                              @endif
                                <!-- Grid column -->
                                <div class="col-md-10 col-xl-12 py-5">

                                    <!--Accordion wrapper-->
                                    <div class="accordion md-accordion accordion-2" id="accordionEx7" role="tablist"
                                         aria-multiselectable="true">

                                        <!-- Accordion card -->


                                        <div v-if="forms" class="card" v-for="forms in forms">

                                            <!-- Card header -->
                                            <div class="d-flex align-items-center justify-content-between card-header mb-1" role="tab" :id="'heading' + forms.id">
                                                <a data-toggle="collapse" data-parent="#accordionEx7" :href="'#collapse' + forms.id" aria-expanded="true"
                                                   :aria-controls="'collapse' + forms.id">
                                                    <h5 class="mb-0 light-gold text-uppercase">
                                                        <i class="fas fa-file-signature color-gold"></i>

                                                        @{{ forms.user.name }}


                                                    </h5>

                                                </a>
                                                @if(onlyguard('admin')) <a :href="'{{url('/admin/tasks')}}/'+ forms.id"> <span class="btn btn-success btn-sm" >Export</span></a> @endif
                                                <h5>@{{ forms.created_at }}</h5>
                                            </div>

                                            <!-- Card body -->
                                            <div :id="'collapse' + forms.id" class="collapse" role="tabpanel" :aria-labelledby="'heading'+ forms.id"
                                                 data-parent="#accordionEx7">
                                                <div class="card-body mb-1 rgba-grey-light white-text">
{{--                                                    <div v-for="status_new in statuss" class="d-flex align-items-center text-left justify-content-between">--}}
                                                    <ul class="d-flex align-items-center custom-ul">
                                                        <li class="width-15">Client</li>
                                                        <li class="width-10">Amount</li>
                                                        <li class="width-10">Date</li>
                                                        <li class="width-55">Comment</li>
                                                        <li class="width-10">Type</li>
                                                    </ul>
                                                    <ul class="d-flex align-items-center" style="list-style: none" v-for="results in JSON.parse(forms.result)">
                                                        <li class="width-15">@{{ results.user }}</li>
                                                        <li class="width-10">@{{ results.amount }} €</li>
                                                        <li class="width-10">@{{ results.date }}</li>
                                                        <li class="width-55">@{{ results.comment }}</li>
                                                        <li class="width-10">@{{ results.type }}</li>
                                                    </ul>
                                                    <h5 class="new_clients_heading">New Clients: @{{ forms.new_clients }}</h5>
                                                    </div>

{{--                                                    <p>@{{ statuss.result }}</p>--}}
{{--                                                    <a  @click="openUploadModal(status_new.id)" class="text-left">@{{ status_new.filename }}</a>--}}
{{--                                                    <p>@{{ status_new.created_at }}</p>--}}
{{--                                                    <span @click="deleteUpload(status_new.id)"><i class="fa fa-trash" aria-hidden="true"></i> </span>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <!-- Accordion card -->

                                    </div>
                                    <!--/.Accordion wrapper-->

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


@endsection

@section('scripts')



    <script src="{{asset('js/toastr.min.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.3/axios.min.js"></script>


{{--    <script>--}}
{{--        // function exportTasks(_this) {--}}
{{--        //     let _url = $(_this).data('href');--}}
{{--        //     window.location.href = _url;--}}
{{--        // }--}}
{{--    </script>--}}

    <script>
        var vm = new Vue({
            el: '#app',
            mounted: function () {
                @if(onlyguard('admin'))
                this.getForms(5);
                @elseif(onlyguard('manager'))
                this.getManagerForms()
                @endif
            },

            data: function () {
                return {
                    forms:[],
                    user_name:null,
                    users:[],
                    form_limit:5,

                }
            },
            methods: {




                // COMMENT FUNCTIONS

                getForms:function(limit) {
                    let self=this;
                    axios.post('{{URL::to('/admin/get_managers_form')}}', {
                        form_limit:self.form_limit,
                    }).then(function(response) {
                        self.forms = response.data.form_data;
                    }).catch(function(error) {

                    });

                },

                getManagers(){
                    let self = this;
                    axios.get('/admin/get_managers/').then(response => {
                        self.users = response.data;
                    });
                },

                exportTasks(id){
                    let self = this;
                    axios.get('/admin/tasks/'+id).then(response => {
                        // self.users = response.data;
                    });
                },

                clearSearch:function() {
                    let self=this;
                    self.getForms(10);
                },

                findFormsByUser:function() {

                    let self=this;
                    axios.post('{{URL::to('/admin/find_manager_form')}}', {
                        user_name:self.user_name,
                    }).then(function(response) {
                    self.forms=response.data.form_data;
                    }).catch(function(error) {

                    });

                },

                getManagerForms:function() {

                    let self=this;
                    axios.post('{{URL::to('/manager/find_manager_form')}}', {
                        user_name:{{logged_in()->id}},
                    }).then(function(response) {
                        self.forms=response.data.form_data;
                    }).catch(function(error) {

                    });

                },

                // EVENT FUNCTIONS


            }
        });
    </script>

@endsection

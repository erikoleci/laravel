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
                                <div class="d-flex align-items-center justify-content-between row-searches">
                                <div>
                                    <label>Limit:</label>
                                    <select @change="getUploads()" v-model="upload_limit" class="custom-select">
                                        <option :value="5">5</option>
                                        <option :value="10">10</option>
                                        <option :value="15">15</option>
                                        <option :value="20">20</option>
                                        <option :value="25">25</option>
                                        <option :value="30">30</option>
                                    </select>
                                </div>
                                <div class="search-row">
                                    <label>Select User:</label>
                                    <select @click="getUsers" @change="findUploadByUser()" v-model="user_name" class="custom-select">
                                        <option v-for="user in users" :value="user.id">@{{ user.name }}</option>
                                    </select>
                                </div>
                                </div>
                                <!-- Grid column -->
                                <div class="col-md-10 col-xl-12 py-5">

                                    <!--Accordion wrapper-->
                                    <div class="accordion md-accordion accordion-2" id="accordionEx7" role="tablist"
                                         aria-multiselectable="true">

                                        <!-- Accordion card -->

{{--                                        @foreach($statuses as $status)--}}
                                        <div v-if="statuses" class="card" v-for="statuss in statuses">

                                            <!-- Card header -->
                                            <div class="d-flex align-items-center justify-content-between card-header mb-1" role="tab" :id="'heading' + statuss[0].id">
                                                <a data-toggle="collapse" data-parent="#accordionEx7" :href="'#collapse' + statuss[0].id" aria-expanded="true"
                                                   :aria-controls="'collapse' + statuss[0].id">
                                                    <h5 class="mb-0 light-gold text-uppercase">
                                                        <i class="fa fa-folder-open color-gold"></i>

                                                       <span v-if="statuss[0].user">  @{{ statuss[0].user.name }}</span>
                                                       <span v-else>Deleted User</span>
                                                    </h5>
                                                </a>
                                            </div>

                                            <!-- Card body -->
                                            <div :id="'collapse' + statuss[0].id" class="collapse" role="tabpanel" :aria-labelledby="'heading'+ statuss[0].id"
                                                 data-parent="#accordionEx7">
                                                <div class="card-body mb-1 rgba-grey-light white-text">
                                                    <div v-for="status_new in statuss" class="d-flex align-items-center text-left justify-content-between">
                                                    <p>@{{ status_new.file_type }}</p>
                                                    <a  @click="openUploadModal(status_new.id)" class="text-left">@{{ status_new.filename }}</a>
                                                    <p>@{{ status_new.created_at }}</p>
                                                    <span @click="deleteUpload(status_new.id)"><i class="fa fa-trash" aria-hidden="true"></i> </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div v-if="selected_user" class="card">
                                            <div class="d-flex align-items-center justify-content-between card-header mb-1" role="tab" id="heading">
                                                <a data-toggle="collapse" data-parent="#accordionEx7" href="#collapse" aria-expanded="true"
                                                   aria-controls="collapse">
                                                    <h5 class="mb-0 light-gold text-uppercase">
                                                        <i class="fa fa-folder-open color-gold"></i>
                                                        @{{ selected_user[0].user_name }}
                                                    </h5>
                                                </a>
                                            </div>

                                            <!-- Card body -->
                                            <div id="collapse" class="collapse" role="tabpanel" aria-labelledby="heading"
                                                 data-parent="#accordionEx7">
                                                <div class="card-body mb-1 rgba-grey-light white-text">

                                                    {{--                                                    <div class="d-flex align-items-center text-left justify-content-between">--}}
                                                    {{--                                                     <p>TYPE</p>--}}
                                                    {{--                                                     <p>NAME</p>--}}
                                                    {{--                                                     <p>TIME</p>--}}
                                                    {{--                                                    </div>--}}
                                                    <div v-for="upload in selected_user" class="d-flex align-items-center text-left justify-content-between">
                                                        <p>@{{ upload.file_type }}</p>
                                                        <a  @click="openUploadModal(upload.id)" class="text-left">@{{ upload.filename }}</a>
                                                        <p>@{{ upload.created_at }}</p>
                                                        <span @click="deleteUpload(upload.id)"><i class="fa fa-trash" aria-hidden="true"></i> </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

{{--                                    @endforeach--}}
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


            <div v-if="selected_upload_id" class="modal fade" id="modalUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Document</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                           <img class="uploaded_image" :src="'{{url('files/')}}/' + selected_upload_id">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a type="button" :href="'{{url('files/')}}/' + selected_upload_id"  class="btn btn-primary">Download</a>
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


    <script>
        var vm = new Vue({
            el: '#app',
            mounted: function () {
                this.getUploads();
            },

            data: function () {
                return {
                    statuses:[],
                    selected_status:{
                    },
                    selected_upload_id:null,
                    user_count:[],
                    lead_count:[],
                    user_name:null,
                    selected_user:null,
                    users:[],
                    upload_limit:10,
                }
            },
            methods: {




                // COMMENT FUNCTIONS

                getUploads:function(upload_limit) {
                    let self=this;
                    axios.post('{{URL::to('/admin/get_uploads/')}}', {
                        upload_limit:self.upload_limit,
                    }).then(function(response) {
                        self.statuses = response.data.user_count;
                        // self.user_count = response.data.user_count;
                        // self.lead_count = response.data.lead_count;
                        self.selected_user = null
                    }).catch(function(error) {
                        toastr.error("Couldn't get Statuses! Please refresh the page!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                    });

                },

                getUsers(){
                    let self = this;
                    axios.get('/get_users/').then(response => {
                        self.users = response.data;
                    });
                },

                openUploadModal(final){
                    this.selected_upload_id = final;
                    $('#modalUpload').modal('show');
                },


                deleteUpload:function(id) {

                    let self=this;
                    axios.post('{{URL::to('/admin/delete_uploads')}}', {
                        id:id,
                    }).then(function(response) {
                        toastr.success("Status Deleted!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                        self.getUploads();
                    }).catch(function(error) {
                        toastr.error("Couldn't delete Status", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                    });

                },

                findUploadByUser:function() {

                    let self=this;
                    axios.post('{{URL::to('/admin/find_uploads')}}', {
                        user_name:self.user_name,
                    }).then(function(response) {
                        toastr.success("Status Deleted!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                        console.log(response.data.user_count);
                        self.statuses=null;
                        self.selected_user= response.data.user_count;
                    }).catch(function(error) {
                        toastr.error("Couldn't delete Status", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                    });

                },

                clearSearch:function() {
                    let self=this;
                    self.selected_user=null;
                    self.getUploads(10);
                },


                // EVENT FUNCTIONS


            }
        });
    </script>

@endsection

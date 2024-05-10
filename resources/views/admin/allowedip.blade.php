@extends('layouts.dashboard')
@section('style')

    <style>

        .animationbtn1 {
            background-color: #1b2854;
            color: #000000;
            cursor: pointer;
            display: inline-block;
            font-size: 14px;
            font-weight: bold;
            min-width: 110px;
            overflow: hidden;
            position: relative;
            text-decoration: none !important;
            text-transform: none;
            z-index: 1;
            -webkit-transition: color 320ms ease;
            transition: color 320ms ease;
            display: flex;
            flex-direction: column;
            width: 135px;
            height: 124px;
            color: white;
            margin: auto;
            border-radius: 4px;
        }

        .animationbtn1 h1{
            font-size: 45px;
        }

        .animationbtn1:hover::after {
            left: 127%;
        }
        .animationbtn1::after {
            background: radial-gradient(ellipse farthest-corner at right bottom, #ffffff 0%, #bfa876 8%, #ceae6c 30%, #a0813b 40%, transparent 80%), radial-gradient(ellipse farthest-corner at left top, #FFFFFF 0%, #f9f9f6 8%, #e0d8c2 25%, #5d4a1f 62.5%, #5d4a1f 100%);
            bottom: -5px;
            content: "";
            left: -30%;
            position: absolute;
            top: -5px;
            -webkit-transform: skewX(-30deg);
            transform: skewX(-30deg);
            -webkit-transition: left 0.5s ease-in-out;
            transition: left 0.5s ease-in-out;
            width: 180%;
            z-index: -1;
        }
        .delete_icon{
            cursor: pointer;
        }


    </style>
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
                    <div class="m-t--20">
                        <div class="border-0  mt-20">
                            <div class="col-md-6 ml-auto mr-auto text-center">
                                        <a class="animationbtn1" href="#"  data-toggle="modal" data-target="#statusmodal">
                                            <h1>+</h1>
                                            ADD IP
                                        </a>
                            </div>


                            <!-- Grid row -->
                            <div class="row accordion-gradient-bcg d-flex justify-content-center">

                                <!-- Grid column -->
                                <div class="col-md-10 col-xl-6 py-5">

                                    <!--Accordion wrapper-->
                                    <div class="accordion md-accordion accordion-2" id="accordionEx7" role="tablist"
                                         aria-multiselectable="true">

                                        <!-- Accordion card -->

{{--                                        @foreach($statuses as $status)--}}
                                        <div class="card" v-for="ip in allowedip">

                                            <!-- Card header -->
                                            <div class="d-flex align-items-center justify-content-between card-header mb-1" role="tab" :id="'heading' + ip.id">
                                                <a data-toggle="collapse" data-parent="#accordionEx7" :href="'#collapse' + ip.id" aria-expanded="true"
                                                   :aria-controls="'collapse' + ip.id">
                                                    <h5 class="mb-0 light-gold text-uppercase">
                                                        @{{ip.ip}} </i>
                                                    </h5>
                                                </a>
                                                <div class="delete_icon">
                                                    <span @click="deleteStatus(ip.id)"><i class="fa fa-trash" aria-hidden="true"></i> </span>
                                                </div>
                                            </div>

                                            <!-- Card body -->
                                          
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

            <div class="modal fade" id="statusmodal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            {{--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                            <h4 class="modal-title">Allow New IP</h4>
                        </div>
                        <div class="modal-body">

                            <div class="row form-group">
                                <label class="col-sm-4" for="title">IP: </label>
                                <div class="col-sm-12">

                                    <input class="form-control"  v-model="new_allowedip">

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" @click="createStatus()" class="btn btn-primary" id="save-event">Save changes</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
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
                this.getStatuses();
            },

            data: function () {
                return {
                    allowedip:[],
                    new_allowedip:null,
              
                }
            },
            methods: {




                // COMMENT FUNCTIONS

                getStatuses:function() {
                    let self=this;
                    axios.get('{{URL::to('/admin/get_allowedip/')}}', {
                    }).then(function(response) {
                        self.allowedip = response.data;
                    }).catch(function(error) {
                        toastr.error("Couldn't get Statuses! Please refresh the page!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                    });

                },


                createStatus:function() {

                    let self=this;
                    axios.post('{{URL::to('/admin/create_allowedip')}}', {
                        ip:self.new_allowedip,
                    }).then(function(response) {
                        toastr.success("Status Created!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                        self.getStatuses();
                        $('.modal').modal('hide');
                        }).catch(function(error) {
                        toastr.error("Couldn't create status", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                    });
                },


                deleteStatus:function(id) {

                    let self=this;
                    axios.post('{{URL::to('/admin/delete_allowedip')}}', {
                        id:id,
                    }).then(function(response) {
                        toastr.success("Status Deleted!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                        self.getStatuses();
                    }).catch(function(error) {
                        toastr.error("Couldn't delete Status", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                    });

                },


                // EVENT FUNCTIONS


            }
        });
    </script>

@endsection

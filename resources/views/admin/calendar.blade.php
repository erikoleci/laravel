@extends('layouts.dashboard')
@section('style')
    <title>Calendar</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link href="{{ asset('plugins/fullcalendar/css/fullcalendar.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('packages/daygrid/main.css')}}" rel='stylesheet' />
    <link href="{{ asset('packages/timegrid/main.css')}}" rel='stylesheet' />

@endsection
@section('content')



    <div class="page-content-wrapper usersContainer" id="app">

        <div class="container-fluid">

            <!-- end row -->

            <div class="row">
                <div class="col-12">
                    <div class="card bg-white m-b-30">
                        <div class="card-body">

                            <div class="row">

                                <div id='calendar' class="col-xl-12 col-lg-12 col-md-12"></div>

                                <div id='datepicker'></div>

                            </div>
                            <!-- end row -->

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div><!-- container fluid -->
        <div class="modal fade" id="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
{{--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                        <h4 class="modal-title">Create new event</h4>
                    </div>
                    <div class="modal-body">

                        <div class="row form-group">
                            <label class="col-sm-4" for="title">Client Name: </label>
                            <div class="col-sm-12">

                                <select v-model="user" class="form-control text-capitalize" id="title" aria-describedby="addon-right" type="text">
                                    <option selected v-if="user"  :value="user">@{{ user.name }}</option>
                                    <option v-for="user in users" :value="user">@{{ user.name }}</option>
                                </select>

                                <input v-model="user.id" class="form-control" hidden type="text" required="" >

                            </div>
                        </div>


                        <div class="row form-group">
                            <label class="col-sm-4" for="starts-at">Event Comment: </label>
                            <div class="col-sm-12">
                                <input class="form-control" v-model="event_comment" id="event_comment"  />
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-4" for="starts-at">Event Time: </label>
                            <div class="col-sm-12">
                                <input class="form-control" v-bind="start" id="starts-at" />
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-4" for="starts-at">Priority: </label>
                            <div class="col-sm-12">
                                <select v-model="priority" class="form-control text-capitalize" id="title" aria-describedby="addon-right" type="text">
                                    <option value="Low">Low</option>
                                    <option value="Medium">Medium</option>
                                    <option value="High">High</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-4" for="starts-at">Status: </label>
                            <div class="col-sm-12">
                                <select v-model="status" class="form-control text-capitalize" id="title" aria-describedby="addon-right" type="text">
                                    <option value="pending">Pending</option>
                                    <option value="completed">Completed</option>
                                    <option value="canceled">Canceled</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" @click="SaveEvent()" class="btn btn-primary" id="save-event">Save changes</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <div v-if="selected_event" class="modal fade" :id="getModalId()" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        {{--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                        <h4 class="modal-title">Create new event</h4>
                    </div>
                    <div class="modal-body">

                        <div class="row form-group">
                            <label class="col-sm-4" for="title">Client Name: </label>
                            <div class="col-sm-12">


                                <a v-if="selected_event.real_user" :href="'{{url(get_guard())}}/user_profile/' + selected_event.client_id" class="font-16" target="_blank">@{{ selected_event.title }}</a>
                                <a v-else :href="'{{url(get_guard())}}/lead_profile/' + selected_event.client_id" class="font-16" target="_blank">@{{ selected_event.title }}</a>

                                <input v-model="selected_event.id" class="form-control" hidden type="text" required="" >

                            </div>
                        </div>


                        <div class="row form-group">
                            <label class="col-sm-4" for="starts-at">Event Comment: </label>
                            <div class="col-sm-12">
                                <input class="form-control" v-model="selected_event.event_comment" />
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-sm-4" for="starts-at">Event Time: </label>
                            <div class="col-sm-12">
                                <input class="form-control" v-model="selected_event.start"  id="starts-at_edit" />
                            </div>
                        </div>



                    <div class="row form-group">
                        <label class="col-sm-4" for="starts-at">Priority: </label>
                        <div class="col-sm-12">
                            <select v-model="selected_event.priority" class="form-control text-capitalize" id="title" aria-describedby="addon-right" type="text">
                                <option selected :value="selected_event.priority">@{{selected_event.priority}}</option>
                                <option value="Low">Low</option>
                                <option value="Medium">Medium</option>
                                <option value="High">High</option>
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-sm-4" for="starts-at">Status: </label>
                        <div class="col-sm-12">
                            <select v-model="selected_event.status" class="form-control text-capitalize" id="title" aria-describedby="addon-right" type="text">
                                <option selected :value="selected_event.status">@{{selected_event.status}}</option>
                                <option value="pending">Pending</option>
                                <option value="completed">Completed</option>
                                <option value="canceled">Canceled</option>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" @click="UpdateEvent()" class="btn btn-primary" id="save-event">Save changes</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

    </div> <!-- Page content Wrapper -->

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="{{asset('plugins/fullcalendar/js/fullcalendar.min.js')}}"></script>
    <script src="{{asset('packages/daygrid/main.js')}}"></script>
    <script src="{{asset('packages/timegrid/main.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="{{asset('js/toastr.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.3/axios.min.js"></script>

    <script>
        $(document).ready(function() {



            $('#calendar').fullCalendar({
                events:('{{URL::to('get_all_events')}}') ,
                displayEventTime:true,
                displayEventEnd:true,
                timeFormat: 'HH:mm',
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                selectable: true,
                selectHelper: true,
                select: function(start, end) {
                    // Display the modal.
                    // You could fill in the start and end fields based on the parameters
                    //
                    var timeStart = moment(start).format('DD/MM/YYYY HH:mm');
                    $('#modal').find('#starts-at').val(timeStart);
                    $('#modal').modal('show');

                },
                editable: true,
                eventLimit: true,
                eventClick: function(event,){
                    // $('.modal').modal('show');
                    // $('.modal').find('#title').val(event.title);
                    // $('.modal').find('#starts-at').val(event.start);
                    vm.OpenEvent(event._id);

                    $(".closeon").click(function() {
                        $('#calendar').fullCalendar('removeEvents',event._id);
                    });
                },
                
                // eventColor: '#000',
                eventRender: function(event, element) {


                    element.append( "<div class='calendar-icons'><span class='calendar-call'>📞</span><span class='closeon'>X</span></div>" );

                    element.find(".closeon").click(function() {
                        $('#calendar').fullCalendar('removeEvents',event._id);
                        axios.post('{{URL::to('delete_event')}}', {
                            id:event._id,
                        }).then(function(response) {
                            console.log(response);
                            toastr.success("Deleted!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
                        }).catch(function(error) {
                            console.log(error);
                            toastr.error("Error deleting the event!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});

                        });
                    });


                    element.find(".calendar-call").click(function() {
                            axios.post('{{URL::to('get_phone')}}', {
                            id:event.client_id,
                            real_user:event.real_user,
                        }).then(function(response) {

                            var phone = response.data.phone;
                            var res = phone.substring(0, 2);
                            // console.log(response.data.phone);
                            // console.log(res);

                            if (event.real_user === 1){
                                console.log('user');
                                console.log(phone);
                                {{--sipCall('call-audio', `{{logged_in()->sip}}39${phone}`);--}}

                            }
                            else{
                                console.log('lead');
                                console.log(phone);
                            {{--sipCall('call-audio', `{{logged_in()->sip}}${phone}`);--}}
                            }
                        }).catch(function(error) {
                            console.log(error);
                        });
                    });
                }
            });



            // $("#starts-at, #ends-at").datetimepicker();

            $('#starts-at').datetimepicker({
                format: 'DD/MM/YYYY HH:mm',
                useCurrent: true,
                showTodayButton: true,
                showClear: true,
                toolbarPlacement: 'bottom',
                sideBySide: true,
                icons: {
                    time: "fa fa-clock",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down",
                    previous: "fa fa-chevron-left",
                    next: "fa fa-chevron-right",
                    today: "fa fa-clock",
                    clear: "fa fa-trash"
                }
            });
        });



        function pop(turl){
            var windowSize = {
                width: 426,
                height: 550,
            };
            var windowLocation = {
                left:  (window.screen.availLeft + (window.screen.availWidth )) - (windowSize.width ),
                top: (window.screen.availTop + (window.screen.availHeight )) - (windowSize.height )
            };
            window.open(turl, 'lead'+Date.now(), 'width=' + windowSize.width + ', height=' + windowSize.height + ', left=' + windowLocation.left + ', top=' + windowLocation.top);
        }




    </script>

    <script>
    var vm = new Vue({
    el: '#app',
    mounted: function () {
        this.getUsers();
    },

    data: function () {
    return {
    title: null,
    start: null,
    status: null,
    priority: null,
    event_comment: null,
    client_id: null,
    selected_event:{
    },
    user: {
        name:null,
        id:null,
    },
    users:[],
    }
    },

    methods:{


    getUsers() {
        let self = this;
        axios.get('/get_users/').then(response => {
            self.users = response.data;
        });
    },


     SaveEvent() {

         var eventData = {
             title: this.user.name,
             start: moment($('#starts-at').val(),'DD/MM/YYYY HH:mm').format('YYYY-MM-DD HH:mm'),
         };

         axios.post('{{URL::to('save_event')}}', {
             title:this.user.name,
             start:moment($('#starts-at').val(),'DD/MM/YYYY HH:mm').format('YYYY-MM-DD HH:mm'),
             client_id:this.user.id,
             event_comment:this.event_comment,
             status:this.status,
             priority:this.priority,
             real_user:1,
         }).then(function(response) {
             console.log(response);
             {{--window.location.href = '{{URL::to('personal_info/')}}'+'?msg='+response.data;--}}
             toastr.success("Event saved!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
         }).catch(function(error) {
             // self.loading = false;
             console.log(error);
             toastr.error("Error saving the event!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
             {{--window.location.hash='{{URL::to('personal_info/')}}';--}}
         });

                 $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true


         $('#calendar').fullCalendar('unselect');

    // Clear modal inputs
   $('#modal').find('input').val('');

    // hide modal
$('#modal').modal('hide');


     },
        UpdateEvent() {

            var eventData = {
                title: this.selected_event.title,
                start: this.selected_event.start,
            };

            axios.post('{{URL::to('update_event')}}', {
                id:this.selected_event.id,
                start:this.selected_event.start,
                event_comment:this.selected_event.event_comment,
                status:this.selected_event.status,
                priority:this.selected_event.priority,
            }).then(function(response) {
                console.log(response);
                {{--window.location.href = '{{URL::to('personal_info/')}}'+'?msg='+response.data;--}}
                toastr.success("Event saved!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
            }).catch(function(error) {
                // self.loading = false;
                console.log(error);
                toastr.error("Error saving the event!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});

            });

            $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true


            $('#calendar').fullCalendar('unselect');

            // Clear modal inputs
            $('#modal').find('input').val('');

            // hide modal
            $('#modal').modal('hide');

            location.reload();
        },
        OpenEvent(id){

            axios.post('{{URL::to('get_event')}}', {
                id:id,
            }).then(function(response) {

                var final = response.data[0];
                vm.OpenEventNew(final);

            }).catch(function(error) {
                console.log(error);

            });



            $('#modal'+this.selected_event.id).modal('show');
            },

        OpenEventNew(final){


                this.selected_event = final;

            $('#modal'+this.selected_event.id).modal('show');
        },
        getModalId(){

            var output;

            if (this.selected_event.id !== 0) {
                output = 'modal'+this.selected_event.id;
                return output;
            }

            else
                output = 'modal'+0;
            // console.log(this.selected_event.id);

            return output;


        },
    }
    });
    </script>
@endsection

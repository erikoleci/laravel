<title>{{$user->name}}</title>
@extends('layouts.dashboard')
@include('layouts.user_profile_functions')
@section('style')

    <style>

        .form-group {
            width: 100%;
        }

        .signup-img {
            position: relative;
            width: 385px;
            color: white;
            -webkit-background-size: cover;
            background-size: cover;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .selectedTemplate {
            box-shadow: 0 1px 3px 0 #0487cc;
            border: 1px solid #0487cc;
            border-top-width: 1px !important;
        }

        .signup-form {
            padding: 1rem;
        }

        .border-bottom {
            color: #000 !important;;
        }

        #myModal1 .list-group-item{
            display: flex;
            align-items: center;
            font-size: 15px;
            border: 1px solid #00000026;
            border-top: 1px solid #00000038;
        }


        @stack('user_profile_style')

    </style>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


@endsection


@section('content')


    <div class="page-content-wrapper usersContainer" id="app">

        <div class="container-fluid">

            {{--            ROW 1--}}

            <div class="padding-bottom-3x mb-2">

                <div class="row align-items-stretch">

                    {{--                    USER ACCOUNT INFORMATION CARD--}}

                    <div class="col-xl-3 col-lg-4">

                        <div class="card">

                            <aside class="user-info-wrapper">
                                <div class="user-info">
                                    <img src="{{asset('images/UserProfile.png')}}" alt="User">
                                    <div class="user-data text-uppercase">
                                    {{$user->name}}
                                     <br>
                                     <br>
                                    </div>
                                </div>
                            </aside>

                            <nav class="list-group">
                               
                                    <div class="list-group-item d-flex align-items-center justify-content-between">
                                        <h6>ACCOUNT NO:</h6>
                                        <p>{{$user->mt4_account}}</p>
                                    </div>
                                  
                                    <div class="list-group-item d-flex align-items-center justify-content-between">
                                        <h6>PASSWORD: </h6>
                                        <p>{{$user->real_password}}</p>
                                    </div>
                                                                               
                                     <br>
                                        
                                     <hr style="background: #feffff; width: 100%;">

                                    <div class="d-flex align-items-center justify-content-center">
                                       <a class="btn btn--ios" v-if="tmp" target="_blank" :href="'https://webtrader.fgm-group.com/login?tmpToken=' + tmp">
                                         <span style="font-size:16px; color:white;" class="btn__text">LOGIN </span> 
                                       </a>

                                       <a class="btn btn--ios" v-else @click="autologin">
                                          <span style="font-size:16px" class="btn__text">REQUEST AUTOLOGIN </span> 
                                       </a>
                                    </div>

                            </nav>
                        </div>

                    </div>

                    {{--                    USER ACCOUNT INFROMATION CARD--}}


                    {{--                    USER INFORMATION CARD--}}

                    <div class="col-xl-9 col-lg-8">

                        <div class="card user-information">

                            {{--                            NAME & STATUS--}}

                            <div class="row d-flex row_input align-items-center justify-content-between">
                                <div class="input-group flex-column input-group-custom">
                                    <label class="label_custom">Client Name</label>
                                    <input disabled class="input_custom" type="text" value="{{$user->name}}">
                                </div>

                                <div class="input-group flex-column input-group-custom">
                                    <label class="label_custom">Client Status</label>
                                    <select v-model="status" @if(logged_in()->edit_status || logged_in()->account_id === 'admin') @change="changeStatus({{$user->id}})" @endif
                                            class="select input_custom">
                                        <option selected
                                                :value="{{$user->status_id}}">{{$user->status->status}}</option>
                                        @foreach($statuses as $status)
                                            <option :value="{{$status->id}}">{{$status->status}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{--                            NAME & STATUS--}}



                            {{--                            PHONE & EMAIL ROWS--}}

                            <div class="row d-flex row_input  align-items-center justify-content-between">
                                <div class="input-group flex-column input-group-custom">

                                    <label class="label_custom">Client Phone</label>
                                    <input disabled class="input_custom" type="text" value="{{$user->phone}}">

                                   
                                </div>

                                <div class="input-group flex-column input-group-custom" style="z-index: 5;">

                                    <label class="label_custom">Client Email</label>
                                    <input class="input_custom" disabled type="text" value="{{$user->email}}">

                            
                                </div>

                            </div>

                            {{--                            PHONE & EMAIL ROWS--}}


                            {{--                            ADDRESS & DATE ROWS--}}

                            <div class="row d-flex row_input  align-items-center justify-content-between">
                                <div class="input-group flex-column input-group-custom">
                                    <label class="label_custom">Client Address</label>
                                    <input disabled class="input_custom" type="text" value="{{$user->address}}">
                                </div>

                                <div class="input-group flex-column input-group-custom">
                                    <label class="label_custom">Registered Date</label>
                                    <input class="input_custom" disabled type="text" value="{{$user->created_at}}">
                                </div>
                            </div>


                            {{--                            NOTE & WEBFORM--}}


                            <div class="row d-flex row_input  align-items-center justify-content-between">
                                <div class="input-group flex-column">
                                    <label class="label_custom">Note</label>
                                    <input v-model="note" v-on:keyup.enter="createNote({{$user->id}})"
                                           class="input_custom" type="text">
                                </div>
                            </div>


                        </div>

                    </div>

                    {{--                    USER INFORMATION CARD--}}

                </div>
            </div>

            {{--            ROW 1--}}


            <br>


            {{--            ROW 2--}}

            <div class="padding-bottom-3x mb-2">
                <div class="row align-items-stretch">

                    {{--                    USER ACCOUNT INFORMATION CARD--}}

                    <div class="col-xl-3 col-lg-5">

                        <div class="card" style=" height:100%; max-height: 750px; overflow-y: scroll">
                            <aside class="user-info-wrapper">
                                <div class="user-info">
                                    <img class="add_event" data-toggle="modal" data-target="#eventModal"
                                         src="{{asset('images/add_event.png')}}">
                                </div>
                            </aside>
                            <nav class="list-group" style="height:380px">
                                {{--                              @isset($events)--}}
                                {{--                                @foreach($events as $event)--}}
                                <div v-for="event in events"
                                     class="list-group-item calendar-div d-flex align-items-center">
                                    <div class="calendar-icon" @click="OpenEvent(event.id)"><i
                                            class="fa fa-calendar-alt"></i></div>
                                    <div class="m-l-10 m-r-auto">
                                        <h6 class="m-b-5 "> @{{event.event_comment}}</h6>
                                        <span class="comment_time"> @{{event.start}}</span>
                                    </div>
                                    {{--                                    @if($event->status === 'completed')--}}
                                    <div v-if="event.status == 'completed'">
                                        <i class="fa fa-check-double completed"></i>
                                    </div>

                                    <div v-if="event.status == 'pending'">
                                        <span @click="SetEventcompleted(event.id)"><i
                                                class="fa fa-check pending"></i></span>
                                    </div>

                                    <div v-if="event.status == 'canceled'">
                                        <span @click="DeleteEvent(event.id)"><i
                                                class="fa fa fa-times canceled"></i></span>
                                    </div>
                                </div>
                            </nav>
                        </div>

                    </div>

                    {{--                    USER ACCOUNT INFROMATION CARD--}}


                    {{--                    USER COMMENTS CARD--}}

                    <div class="col-xl-9 col-lg-7" style="max-height: 750px;">

                        <div class="card user-information" style="overflow-y: scroll">

                            {{--                            COMMENT--}}

                            <div class="row d-flex border_row align-items-center justify-content-between">
                                <textarea v-model="comment" placeholder="Write your comment here"
                                          class="note_textarea"></textarea>
                                <button @if(logged_in()->can_comment || logged_in()->account_id === 'admin') @click="createComment({{$user->id}},'{{logged_in()->name}}')" @endif
                                        class="add_comment"><i class="fa fa-comment"></i> Add Comment
                                </button>
                            </div>

                            <div v-for="commentss in comments_vue"
                                 class="row position-relative comment_row d-flex align-items-center justify-content-around m-t-15">
                                @if(onlyguard('admin'))

                                    <div class="delete_icon">
                                        <span @click="OpenComment(commentss.id)"><i class="fas fa-edit"></i></span>
                                        <span @click="deleteComment(commentss.id)"><i class="fa fa-trash"
                                                                                      aria-hidden="true"></i> </span>
                                    </div>
                                @endif
                                <div><img class="comment_logo" src="{{asset('images/UserProfile.png')}}"></div>

                                <div class="d-flex flex-column comment_column">
                                    <h5 class="comment_name">@{{commentss.manager_name}}</h5>
                                    <p class="comment_paragraph">@{{commentss.comment}}</p>
                                    <span class="comment_time">@{{commentss.created_at}}</span>
                                </div>

                            </div>


                            {{--                            COMMENT--}}

                        </div>

                    </div>

                    {{--                    USER COMMENTS CARD--}}

                </div>

            </div>

            {{--            ROW 2--}}

            <br>


            <div class="modal fade" id="eventModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Create new event</h4>
                        </div>
                        <div class="modal-body">

                            <input class="form-control" hidden name="client_id" v-model="client_id"/>
                            <input class="form-control" hidden name="title" v-model="title"/>
                            <input class="form-control" hidden name="user_id" v-model="user_id"/>

                            <div class="row form-group">
                                <label class="col-sm-4" for="starts-at">Event Comment: </label>
                                <div class="col-sm-12">
                                    <input class="form-control" v-model="event_comment" id="event_comment"/>
                                </div>
                            </div>

                            <div class="row form-group">
                                <label class="col-sm-4" for="starts-at">Event Time: </label>
                                <div class="col-sm-12">
                                    <input class="form-control" v-bind="start" id="starts-at"/>
                                </div>
                            </div>

                            <div class="row form-group">
                                <label class="col-sm-4" for="starts-at">Priority: </label>
                                <div class="col-sm-12">
                                    <select name="priority" v-model="priority" class="form-control text-capitalize"
                                            id="title" aria-describedby="addon-right" type="text">
                                        <option value="Low">Low</option>
                                        <option value="Medium">Medium</option>
                                        <option value="High">High</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <label class="col-sm-4" for="starts-at">Status: </label>
                                <div class="col-sm-12">
                                    <select name="status" v-model="event_status" class="form-control text-capitalize"
                                            id="title" aria-describedby="addon-right" type="text">
                                        <option value="pending">Pending</option>
                                        <option value="completed">Completed</option>
                                        <option value="canceled">Canceled</option>
                                    </select>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" @click="SaveEvent()" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


            <div v-if="selected_event" class="modal fade" :id="getModalIdEvent()" tabindex="-1" role="dialog">

                <div class="modal-dialog" role="document">

                    <div class="modal-content">

                        <div class="modal-header">
                            <h4 class="modal-title">Create new event</h4>
                        </div>

                        <div class="modal-body">
                            <div class="row form-group">
                                <label class="col-sm-4" for="starts-at">Event Comment: </label>
                                <div class="col-sm-12">
                                    <input class="form-control" v-model="selected_event.event_comment"/>
                                </div>
                            </div>

                            <div class="row form-group">
                                <label class="col-sm-4" for="starts-at">Event Time: </label>
                                <div class="col-sm-12">
                                    <input class="form-control" v-model="selected_event.start" id="starts-at"/>
                                </div>
                            </div>

                            <div class="row form-group">
                                <label class="col-sm-4" for="starts-at">Priority: </label>
                                <div class="col-sm-12">
                                    <select name="priority" v-model="selected_event.priority"
                                            class="form-control text-capitalize" id="title"
                                            aria-describedby="addon-right" type="text">
                                        <option value="Low">Low</option>
                                        <option value="Medium">Medium</option>
                                        <option value="High">High</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <label class="col-sm-4" for="starts-at">Status: </label>
                                <div class="col-sm-12">
                                    <select name="status" v-model="selected_event.status"
                                            class="form-control text-capitalize" id="title"
                                            aria-describedby="addon-right" type="text">
                                        <option value="pending">Pending</option>
                                        <option value="completed">Completed</option>
                                        <option value="canceled">Canceled</option>
                                    </select>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" @click="UpdateEvent" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="SMSModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header sms-header">
                            <i class="fa fa-sms sms-icon"></i>
                        </div>

                        <div class="modal-body">
                            <div class="row form-group">
                                <label class="col-sm-4" for="starts-at">Client: </label>
                                <div class="col-sm-12">
                                    <input class="form-control" hidden v-model="smsid" disabled/>
                                    <input class="form-control" hidden v-model="smsname" disabled/>
                                    <input class="form-control" value="{{$user->name}}" disabled/>
                                </div>
                            </div>

                            <div class="row form-group">
                                <label class="col-sm-4" for="starts-at">Phone: </label>
                                <div class="col-sm-12">
                                    <input class="form-control" disabled value="{{$user->phone}}"/>
                                </div>
                            </div>

                            <div class="row form-group">
                                <label class="col-sm-4" for="starts-at">Priority: </label>
                                <div class="col-sm-12">
                                    <textarea v-model="message" placeholder="Write your Message here"
                                              class="note_textarea"></textarea>
                                    <button @click="sendMessage({{$user->phone}})" class="add_comment"><i
                                            class="fa fa-comment m-r-10"></i>Send Message
                                    </button>
                                </div>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


            <div v-if="selected_comment" class="modal fade" :id="getModalId()" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Comment</h4>
                        </div>

                        <div class="modal-body">

                            <div class="row form-group">
                                <label class="col-sm-4" for="title">Comment: </label>
                                <div class="col-sm-12">

                                    <input class="form-control" v-model="selected_comment.comment">

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" @click="UpdateComment" class="btn btn-primary" id="save-event">Savechanges</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>


            <div v-if="template_name_show" class="modal fade" id="templatename" style="z-index: 151515615615615" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Please enter the Template Name</h4>
                        </div>

                        <div class="modal-body">

                            <div class="row form-group">
                                <label class="col-sm-4" for="title">Name: </label>
                                <div class="col-sm-12">
                                    <input class="form-control" v-model="template_name">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" @click="saveTemplate(newEmail.content, 'Margin Call')" class="btn btn-primary" id="save-event">Save changes</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>


            <div id="myModal1" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">

                        <div class="signup-content row ">
                            <div v-if="!showTemplates" class="signup-img col-md-4 " style="background-image: url({{asset('images/form-img.jpg')}});" >
                                <div class="signup-img-content">
                                    <h2>Email Templates </h2>
                                </div>
                            </div>

                            <div v-else class="col-md-4 pl-4 pr-2">

                                <h4 class="text-center">Select template</h4>

                                <div class="text-center">
                                    <button @click.prevent="OpenTemplateName" class="btn btn-outline-primary mb-2 mr-1"><i class="fa fa-plus-circle text-primary"> </i>  Create</button>
                                    <button @click.prevent="deleteTemplate(selectedTemplate.id)" class="btn btn-outline-danger mb-2"><i class="fa fa-times text-danger"> </i>  Delete</button>
                                </div>
                                <ul class="list-group p-1">
                                    <li :class="getTemplateStyle(template.id)" v-for="template in templates"  v-if="template.type==='Margin Call'"  @click="selectTemplate(template)" class="list-group-item templates-group mb-2 p-2" style="border-radius: 4px; ">
                                        <span  style="white-space: pre-wrap;word-wrap: break-word;font-family: inherit;">@{{template.template_name }}</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="signup-form col-md-8">
                                <form method="POST" class="register-form">
                                    <div class="form-row">
                                        <div class="form-group width-100">
                                            <div class="d-flex align-items-center mb-1">
                                                <div class="col-md-1">
                                                    To:
                                                </div>
                                                <div class="col-md-11">
                                                    <input type="text" class="form-control" disabled v-model="email">
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="col-md-1">
                                                    Subject:
                                                </div>
                                                <div class="col-md-11">
                                                    <input type="text" v-model="subject" class="form-control" id="recipient-name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12 pl-3 pr-3">
                                            <textarea v-model="newEmail.content" style="width:100%; border: 1px solid #ebebeb; padding:5px; border-radius: 3px; white-space: pre-wrap; word-wrap: break-word;font-family: inherit;" id="margin_textarea" rows="18"></textarea>
                                        </div>

                                    </div>
                                    <div class="form-submit">

                                        <button v-show="!showTemplates" @click.prevent="showTemplates=true" class="btn btn-lg btn-dark btn-primary text-uppercase  mb-2 mr-4 mr-auto"><i class="fa fa-arrow-left"> </i>  Templates </button>
                                        <button v-show="showTemplates" @click.prevent="showTemplates=false" class="btn btn-lg btn-dark btn-primary text-uppercase mb-2 mr-4 mr-auto"><i class="fa fa-arrow-right"> </i>  Templates </button>
                                        <button  @click.prevent="submitEmail()" class="btn btn-lg btn-primary mb-2 mr-4 mr-auto text-uppercase"><i class="fa fa-envelope"> </i>  Send email </button>

                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div><!-- container fluid -->

    </div><!-- Page content Wrapper -->


@endsection

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="{{asset('js/toastr.min.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.3/axios.min.js"></script>



    @if (logged_in()->can_copy ===0) 

    <script type="text/javascript">
        $(document).ready(function () {
            //Disable full page
            $('body').bind('cut copy paste', function (e) {
                e.preventDefault();
            });
            
            //Disable part of page
            $('#id').bind('cut copy paste', function (e) {
                e.preventDefault();
            });
        });
    </script>
    
    @endif


    <script>

        $(document).ready(function () {

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


    </script>


    <script>
        var vm = new Vue({
            el: '#app',
            mounted: function () {
                this.getComments({{$user->id}});
                this.getEvents({{$user->id}});

            },

            data: function () {
                return {
                    note: '{{$user->note}}',
                    status:{{$user->status_id}},
                    id: null,
                    comment: null,
                    name: null,
                    comments_vue: [],
                    events: [],
                    message: null,
                    smsid: null,
                    smsname: null,
                    title: null,
                    user_id: null,
                    start: null,
                    tmp:null,
                    client_id: null,
                    event_comment: null,
                    event_status: null,
                    priority: null,
                    email: '{{$user->email}}',
                    subject: null,
                    content: null,
                    template_name:null,
                    template_name_show:null,
                    composition: null,
                    htmlComposition: null,
                    real_user: 1,
                    webform: '{{$user->webform}}',
                    selected_comment: {},
                    selected_event: {},
                    showTemplates: false,
                    newEmail: {
                        content: '',
                    },
                    templates: [],
                    selectedTemplate: {
                        id: 0,
                        type: '',
                        content: '',
                    },
                }
            },
            methods: {

                changeStatus: function (user_id) {
                    let self = this;
                    swal({
                        title: "Do you want to change the status?",
                        icon: "success",
                        buttons: true,
                        dangerMode: true,
                    }).then((result) => {
                        if (result) {
                            axios.post('{{URL::to('/change_status')}}', {
                                id: user_id,
                                status: self.status,
                                real_user: self.real_user,
                            }).then(function (response) {
                                toastr.success("Status changed!", {
                                    positionClass: 'toast-bottom-right',
                                    containerId: 'toast-bottom-right'
                                });

                            }).catch(function (error) {
                                console.log(error);
                            });
                        } else {
                        }
                    })
                },

                createNote: function (user_id) {
                    let self = this;
                    swal({
                        title: "Do you want to change the note?",
                        icon: "success",
                        buttons: true,
                        dangerMode: true,
                    }).then((result) => {
                        if (result) {
                            axios.post('{{URL::to('/create_note')}}', {
                                id: user_id,
                                note: self.note,
                                real_user: self.real_user,
                            }).then(function (response) {
                                toastr.success("Note changed!", {
                                    positionClass: 'toast-bottom-right',
                                    containerId: 'toast-bottom-right'
                                });

                            }).catch(function (error) {
                                console.log(error);
                            });
                        } else {
                        }
                    })
                },


                OpenEvent(id) {

                    axios.post('{{URL::to('/get_event_json')}}', {
                        id: id,
                    }).then(function (response) {

                        var final = response.data[0];
                        vm.OpenEventModal(final);
                    }).catch(function (error) {
                        console.log(error);

                    });
                },
                autologin:function() {
                   
                   let self=this;
                   let agent={{logged_in()->sip}};
                   let number='{{$user->phone}}';
                   axios.post('https://cc-rtm01.voiso.com/api/v1/a4dfd2f844ae1e857e7aeac5e65f8e30196e171486397505/click2call?agent='+agent+'&number='+number , {
         agent:'1000',
         number:'3935621457'
        
                 }).then(function(response) {
                   
                       /* self.tmp = response.data; */
                       console.log(response.data);
                   }).catch(function(error) {
                     

                       console.log(error);
                   });

               },

                OpenEventModal(final) {


                    this.selected_event = final;
                    $('#modal' + this.selected_event.id).modal('show');
                },

                // OPEN COMMENT MODAL FUNCTIONS

                OpenComment(id) {

                    axios.post('{{URL::to('/admin/get_comment')}}', {
                        id: id,
                    }).then(function (response) {

                        var final = response.data[0];
                        vm.OpenCommentModal(final);
                    }).catch(function (error) {
                        console.log(error);

                    });
                },

                OpenCommentModal(final) {


                    this.selected_comment = final;
                    $('#modal' + this.selected_comment.id).modal('show');
                },

                getModalId() {

                    var output;

                    if (this.selected_comment) {
                        output = 'modal' + this.selected_comment.id;
                        return output;
                    } else
                        output = 'modal' + 0;
                    return output;
                },

                getModalIdEvent() {

                    var output;

                    if (this.selected_event) {
                        output = 'modal' + this.selected_event.id;
                        return output;
                    } else
                        output = 'modal' + 0;
                    return output;
                },


                // OPEN COMMENTS MODAL FUNCTION


                // COMMENT FUNCTIONS

                getComments: function (c) {
                    let self = this;
                    axios.post('{{URL::to('/get_comments/')}}', {
                        id: c,
                    }).then(function (response) {
                        self.comments_vue = response.data.comments;
                    }).catch(function (error) {
                        toastr.error("Couldn't get comments! Please refresh the page!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                    });

                },

                getEvents: function (c) {
                    let self = this;
                    axios.post('{{URL::to('/get_leads_events/')}}', {
                        id: c,
                        real_user: self.real_user,
                    }).then(function (response) {
                        self.events = response.data;
                        // console.log(self.events);
                    }).catch(function (error) {
                        toastr.error("Couldn't get comments! Please refresh the page!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                    });

                },

                UpdateComment() {
                    let self = this;
                    axios.post('{{URL::to('/admin/update_comment')}}', {
                        id: self.selected_comment.id,
                        comment: self.selected_comment.comment,
                    }).then(function (response) {
                        toastr.success("Comment Updated!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                        self.getComments({{$user->id}});
                        $('.modal').modal('hide');
                    }).catch(function (error) {
                        // self.loading = false;
                        console.log(error);
                        toastr.error("Error updating the comment!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });

                    });

                },

                createComment: function (user_id, name) {

                    let self = this;
                    axios.post('{{URL::to('/create_comment')}}', {
                        user_id: user_id,
                        name: name,
                        comment: self.comment,
                        real_user: self.real_user,
                    }).then(function (response) {
                        toastr.success("Comment Created!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                        self.getComments({{$user->id}});
                        self.comment = null;
                    }).catch(function (error) {
                        toastr.error("Couldn't create comment", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                    });
                },

                deleteComment: function (id) {
                    console.log(id);
                    let self = this;
                    axios.post('{{URL::to('/admin/delete_comment')}}', {
                        id: id,
                        real_user: self.real_user,
                    }).then(function (response) {
                        toastr.success("Comment Created!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                        // location.reload();
                        self.getComments({{$user->id}});
                        // self.comment=null;
                    }).catch(function (error) {
                        toastr.error("Couldn't create comment", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                    });

                },


                // COMMENT FUNCTIONS


                createWebform: function (user_id) {

                    let self = this;
                    axios.post('{{URL::to('/admin/create_webform')}}', {
                        user_id: user_id,
                        webform: self.webform,
                        real_user: self.real_user,
                    }).then(function (response) {
                        toastr.success("Comment Created!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });

                    }).catch(function (error) {
                        toastr.error("Couldn't create comment", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                    });

                },

                sendMessage: function (phone) {


                    let self = this;
                    axios.post('{{URL::to('/sendMessage')}}', {
                        phone: phone,
                        smsid:{{$user->id}},
                        smsname: '{{$user->name}}',
                        message: self.message,
                    }).then(function (response) {
                        toastr.success("Comment Created!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                        console.log(phone);
                    }).catch(function (error) {
                        toastr.error("Couldn't create comment", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                    });

                },

                submitEmail() {
                    let self = this;
                    self.replyErrors = [];
                    axios.post('{{URL::to('send_email')}}', {

                        user_id:{{$user->id}},
                        email: self.email,
                        subject: self.subject,
                        content: self.newEmail.content,
                        composition: self.htmlComposition,

                    }).then(function (response) {
                        {{--window.location.href = '{{URL::to('personal_info/')}}'+'?msg='+response.data;--}}
                        toastr.success("Successfully sent!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });

                        $('#emailModal').modal('hide');

                    }).catch(function (error) {
                        self.replyErrors = error.response.data.errors;
                        $('#emailModal').modal('hide');
                        toastr.error("Error sending email!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });

                        console.log(error.response.data);
                    });
                },

                // EVENT FUNCTIONS


                SaveEvent() {

                    let self = this;

                    axios.post('{{URL::to('save_event')}}', {
                        title: '{{$user->name}}',
                        user_id:{{logged_in()->id}},
                        start: moment($('#starts-at').val(), 'DD/MM/YYYY HH:mm').format('YYYY-MM-DD HH:mm'),
                        client_id:{{$user->id}},
                        event_comment: self.event_comment,
                        status: self.event_status,
                        priority: self.priority,
                        real_user: self.real_user,
                    }).then(function (response) {
                        toastr.success("Event saved!",
                            {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});

                        // let self = this;
                        $('#eventModal').modal('hide');
                        self.getEvents({{$user->id}});
                    }).catch(function (error) {
                        toastr.error("Error saving the event!",
                            {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});

                    });

                },

                UpdateEvent() {
                    let self = this;
                    axios.post('{{URL::to('update_event')}}', {
                        id: self.selected_event.id,
                        event_comment: self.selected_event.event_comment,
                        status: self.selected_event.status,
                        priority: self.selected_event.priority,
                        start: self.selected_event.start,

                    }).then(function (response) {
                        toastr.success("Event Updated!",
                            {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
                        self.getEvents({{$user->id}});
                        $(`#modal${self.selected_event.id}`).modal('hide');
                    }).catch(function (error) {
                        toastr.error("Error updating the event!",
                            {positionClass: 'toast-bottom-riht', containerId: 'toast-bottom-right'});
                    });
                },


                SetEventcompleted: function (id) {

                    let self = this;
                    axios.post('{{URL::to('/set_event_completed')}}', {
                        id: id,
                    }).then(function (response) {
                        toastr.success("Event Changed!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                        self.getEvents({{$user->id}});
                    }).catch(function (error) {
                        toastr.error("Couldn't change event", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                    });

                },


                DeleteEvent: function (id) {

                    let self = this;
                    axios.post('{{URL::to('/delete_event')}}', {
                        id: id,
                    }).then(function (response) {
                        toastr.success("Event Changed!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                        self.getEvents({{$user->id}});
                    }).catch(function (error) {
                        toastr.error("Couldn't change event", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                    });

                },

                showModal1() {

                    this.getUserTemplates();

                    this.newEmail = {
                        sender_id:{{logged_in()->id}},
                        subject: null,
                    };
                    $('#myModal1').modal('show');
                },

                getUserTemplates() {
                    let self = this;

                    axios.get('/get_templates').then(response => {
                        self.templates = response.data.templates;
                    });
                },

                getTemplateStyle(template_id) {
                    if (template_id === this.selectedTemplate.id) {
                        return 'selectedTemplate';
                    }
                },
                selectTemplate(template) {
                    this.selectedTemplate = template;
                    this.newEmail.content = template.content;
                    console.log(this.newEmail.content);
                },
                canEdit(template_id) {
                    if (template_id === this.selectedTemplate.id) {
                        return 'true';
                    } else return 'false';
                },

                updateTemplate(template) {

                    let self = this;
                    axios.post('{{URL::to('update_template')}}', {

                        template_id: template.id,
                        content: template.content,
                    }).then(function (response) {
                        toastr.success("Template updated successfully!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                        $('#editTemplate' + template.id).modal('hide');

                    }).catch(function (error) {
                        self.replyErrors = error.response.data.errors;
                        console.log(error.response.data);
                        toastr.error("Error!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                    });

                },

                OpenTemplateName(){
                    let self = this;

                    self.template_name_show=1;

                    $('#templatename').modal('show');

                },

                saveTemplate(desc, type) {

                    let self = this;

                    axios.post('{{URL::to('template_store')}}', {
                        content: desc,
                        type: type,
                        template_name: self.template_name,
                    }).then(function (response) {
                        self.getUserTemplates();
                        toastr.success("Template saved", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });

                    }).catch(function (error) {
                        console.log('error');
                        toastr.error("Error saving the Template!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                    });
                },

                deleteTemplate(id) {
                    if (id) {
                        console.log('hmm');
                        let self = this;
                        axios.post('{{URL::to('template_destroy')}}', {
                            template_id: id,
                        }).then(function (response) {
                            self.getUserTemplates();
                            console.log('response');
                        }).catch(function (error) {
                            toastr.error("Error deleting the template!", {
                                positionClass: 'toast-bottom-right',
                                containerId: 'toast-bottom-right'
                            });
                        });
                    } else toastr.error("Please select a template to delete!", {
                        positionClass: 'toast-bottom-right',
                        containerId: 'toast-bottom-right'
                    });
                },


                // EVENT FUNCTIONS


            }
        });
    </script>

@endsection

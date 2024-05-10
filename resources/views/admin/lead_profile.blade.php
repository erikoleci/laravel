<title>{{$user->name}}</title>
@extends('layouts.dashboard')
@include('layouts.user_profile_functions')
@section('style')

    <style>
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

                 <!--<div class="col-xl-3 col-lg-4">-->

                 <!--     <div class="card height-100 d-flex flex-column justify-content-between">-->

                 <!--       <aside class="user-info-wrapper">-->
                 <!--           <div class="user-info">-->
                 <!--                 <img src="{{asset('images/UserProfile.png')}}" alt="User">-->
                 <!--               <div class="user-data">-->
                 <!--                   <h4>{{$user->name}}</h4><span>{{$user->mt4_account}}</span>-->
                 <!--               </div>-->
                 <!--           </div>-->
                 <!--       </aside>-->

                 <!--       <nav class="list-group">-->
                 <!--           <div class="list-group-item d-flex align-items-center justify-content-between"><h6>Manager:</h6><p class="custom-lead-color">{{$manager}}</p></div>-->
                 <!--           <div class="list-group-item d-flex align-items-center justify-content-between"><h6>Status:</h6><p class="custom-lead-color">{{$user->status->status}}</p></div>-->
                 <!--           <div class="list-group-item d-flex align-items-center justify-content-between"><h6>Note:</h6><p class="custom-lead-color text-capitalize">{{$user->note}}</p></div>-->
                 <!--           <div class="list-group-item d-flex align-items-center justify-content-between"><h6>Location:</h6><p class="custom-lead-color">{{$user->country}}</p></div>-->
                 <!--           <div class="d-flex align-items-center"><a class="actions" onclick="sipCall('call-audio','{{logged_in()->sip.$user->phone}}')"><i class="icons fa fa-phone"></i></a><a class="actions" data-toggle="modal" data-target="#SMSModal" href="#"><i class="icons fa fa-envelope"></i></a></div>-->
                 <!--       </nav>-->


                 <!--     </div>-->


                 <!-- </div>-->

{{--                    USER ACCOUNT INFROMATION CARD--}}


{{--                    USER INFORMATION CARD--}}

                    <div class="col-xl-12 col-lg-12">

                        <div class="card user-information">





{{--                            NAME & STATUS--}}

                            <div class="row d-flex row_input align-items-center justify-content-between">
                                <div class="input-group flex-column input-group-custom">
                                <label class="label_custom">First Name</label>
                                <input disabled class="input_custom" type="text" value="{{$user->first_name}}">
                                </div>


                                <div class="input-group flex-column input-group-custom">
                                <label class="label_custom">Last Name</label>
                                <input disabled class="input_custom" type="text" value="{{$user->last_name}}">
                                </div>

                            </div>

{{--                            NAME & STATUS--}}




{{--                            PHONE & EMAIL ROWS--}}

      

{{--                            PHONE & EMAIL ROWS--}}



{{--                            NAME & STATUS--}}

                            <div class="row d-flex row_input align-items-center justify-content-between">
                                <div class="input-group flex-column input-group-custom">
                                <label class="label_custom">Platform</label>
                                <input disabled class="input_custom" type="text" value="{{$user->platform}}">
                                </div>


                                <div class="input-group flex-column input-group-custom">
                                <label class="label_custom">Deposit</label>
                                <input disabled class="input_custom" type="text" value="{{$user->deposit}}">
                                </div>

                            </div>

{{--                            NAME & STATUS--}}



{{--                            NAME & STATUS--}}

                            <div class="row d-flex row_input align-items-center justify-content-between">
                                <div class="input-group flex-column input-group-custom">
                                <label class="label_custom">Lost Capital</label>
                                <input disabled class="input_custom" type="text" value="{{$user->lost_capital}}">
                                </div>


                                <div class="input-group flex-column input-group-custom">
                                <label class="label_custom">Account Creation</label>
                                <input disabled class="input_custom" type="text" value="{{$user->account_creation}}">
                                </div>

                            </div>

{{--                            NAME & STATUS--}}







{{--                            ADDRESS & DATE ROWS--}}

                            <div class="row d-flex row_input  align-items-center justify-content-between">

                                <div class="input-group flex-column input-group-custom">
                                    <label class="label_custom">Client Status</label>
                                    <select  v-model="status" @if(logged_in()->edit_status || logged_in()->account_id === 'admin') @change="changeStatus({{$user->id}})" @endif class="select input_custom">
                                        <option selected :value="{{$user->status->id}}">{{$user->status->status}}</option>
                                        @foreach($statuses as $status)
                                            <option  :value="{{$status->id}}">{{$status->status}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="input-group flex-column input-group-custom">
                                    <label class="label_custom">Source</label>
                                    <input class="input_custom" disabled type="text" value="{{$user->source}}">
                                </div>

                            </div>

{{--                            ADDRESS & DATE ROWS--}}






{{--                            NOTE--}}
                            <div class="row d-flex row_input  align-items-center justify-content-between">
                               
                               <div class="input-group flex-column input-group-custom">
                                <label class="label_custom">Client Email</label>
                                   
                                    <input class="input_custom" disabled type="text" value="{{$user->email}}">
                                   </div>
                                   

                                <div class="input-group flex-column input-group-custom">
                                    <label class="label_custom">Registered Date</label>
                                    <input class="input_custom" disabled type="text" value="{{$user->created_at}}">
                                </div>

                            </div>
                            
                                     <div class="row d-flex row_input  align-items-center justify-content-between">
                     <div class="input-group flex-column input-group-custom">

                          <label class="label_custom">Call</label>
                          @if (logged_in()->account_id ==='admin')
                              <input disabled class="input_custom" type="text" value="{{$user->phone}}">
                           @endif
                                      
                            
                        @if (logged_in()->departament ==='Convert')
                                      <div class="m-t-5" style="z-index: 5;">
                                         <div class="tooltip">
                                            <a @click="autologin(11)">
                                            <img class="phone-icons" src="{{asset('images/phone-icons/phone1.png')}}">
                                            <span class="tooltiptext">Cyprus</span>
                                            </a>
                                        </div>

                                        <div class="tooltip">
                                            <a @click="autologin(23)">
                                            <img class="phone-icons" src="{{asset('images/phone-icons/phone2.png')}}">
                                            <span class="tooltiptext">Random Italy</span>
                                            </a>
                                        </div>
                                          <div class="tooltip">
                                            <a @click="autologin(32)">
                                            <img class="phone-icons" src="{{asset('images/phone-icons/phone2.png')}}">
                                            <span class="tooltiptext">United Kingdom</span>
                                            </a>
                                        </div>

                                        <div class="tooltip">
                                            <a @click="autologin(20)">
                                            <img class="phone-icons" src="{{asset('images/phone-icons/phone4.png')}}">
                                            <span class="tooltiptext">Random Spain</span>
                                            </a>
                                        </div>
                                        
                                         <div class="tooltip">
                                            <a @click="autologin(33)">
                                            <img class="phone-icons" src="{{asset('images/phone-icons/phone4.png')}}">
                                            <span class="tooltiptext">Random Germany</span>
                                            </a>
                                        </div>
                                        
                                         <div class="tooltip">
                                            <a @click="autologin(7)">
                                            <img class="phone-icons" src="{{asset('images/phone-icons/phone4.png')}}">
                                            <span class="tooltiptext">Random UK</span>
                                            </a>
                                        </div>
                                        
                                         <div class="tooltip">
                                            <a @click="autologin(19)">
                                            <img class="phone-icons" src="{{asset('images/phone-icons/phone4.png')}}">
                                            <span class="tooltiptext">United Kingdom 2</span>
                                            </a>
                                        </div>
                                        
                                         <div class="tooltip">
                                            <a @click="autologin(14)">
                                            <img class="phone-icons" src="{{asset('images/phone-icons/phone4.png')}}">
                                            <span class="tooltiptext">Italy 2</span>
                                            </a>
                                        </div>
                                        
                                        
                                         <div class="tooltip">
                                            <a @click="autologin(21)">
                                            <img class="phone-icons" src="{{asset('images/phone-icons/phone4.png')}}">
                                            <span class="tooltiptext">Random GR</span>
                                            </a>
                                        </div>
                                        
                                          <div class="tooltip">
                                            <a @click="autologin(35)">
                                            <img class="phone-icons" src="{{asset('images/phone-icons/phone4.png')}}">
                                            <span class="tooltiptext">Australia</span>
                                            </a>
                                        </div>
                                 
                                    </div>
                                    
                        @endif  
                        
                        
                        @if (logged_in()->departament ==='CAD')
                                      <div class="m-t-5" style="z-index: 5;">
                                         <div class="tooltip">
                                            <a @click="autologin(5)">
                                            <img class="phone-icons" src="{{asset('images/phone-icons/phone1.png')}}">
                                            <span class="tooltiptext">CAD 1</span>
                                            </a>
                                        </div>

                                        <div class="tooltip">
                                            <a @click="autologin(29)">
                                            <img class="phone-icons" src="{{asset('images/phone-icons/phone2.png')}}">
                                            <span class="tooltiptext">CAD 2</span>
                                            </a>
                                        </div>
                                        
                                        
                                        <div class="tooltip">
                                            <a @click="autologin(4)">
                                            <img class="phone-icons" src="{{asset('images/phone-icons/phone2.png')}}">
                                            <span class="tooltiptext">CAD GSM</span>
                                            </a>
                                        </div>
                                        
                                          <div class="tooltip">
                                            <a @click="autologin(7)">
                                            <img class="phone-icons" src="{{asset('images/phone-icons/phone2.png')}}">
                                            <span class="tooltiptext">United Kingdom</span>
                                            </a>
                                        </div>
                                 
                                    </div>
                                    
                        @endif  
                        
                      @if (logged_in()->departament ==='Recovery')
                                      <div class="m-t-5" style="z-index: 5;">
                                         <div class="tooltip">
                                            <a @click="autologin(33)">
                                            <img class="phone-icons" src="{{asset('images/phone-icons/phone1.png')}}">
                                            <span class="tooltiptext">Random DE</span>
                                            </a>
                                        </div>

                                        <div class="tooltip">
                                            <a @click="autologin(20)">
                                            <img class="phone-icons" src="{{asset('images/phone-icons/phone2.png')}}">
                                            <span class="tooltiptext">Random Spain</span>
                                            </a>
                                        </div>
                                          <div class="tooltip">
                                            <a @click="autologin(23)">
                                            <img class="phone-icons" src="{{asset('images/phone-icons/phone2.png')}}">
                                            <span class="tooltiptext">Random IT</span>
                                            </a>
                                        </div>

                                        <div class="tooltip">
                                            <a @click="autologin(13)">
                                            <img class="phone-icons" src="{{asset('images/phone-icons/phone4.png')}}">
                                            <span class="tooltiptext">UK FIX</span>
                                            </a>
                                        </div>
                                          <div class="tooltip">
                                            <a @click="autologin(7)">
                                            <img class="phone-icons" src="{{asset('images/phone-icons/phone4.png')}}">
                                            <span class="tooltiptext">Random UK</span>
                                            </a>
                                        </div>
                        
                                        </div>
                                    
                        @endif           
                        
                        
                        @if (logged_in()->departament ==='Retention')
                                      <div class="m-t-5" style="z-index: 5;">
                                         <div class="tooltip">
                                            <a @click="autologin(24)">
                                            <img class="phone-icons" src="{{asset('images/phone-icons/phone1.png')}}">
                                            <span class="tooltiptext">Cyprus</span>
                                            </a>
                                        </div>

                                        <div class="tooltip">
                                            <a @click="autologin(100)">
                                            <img class="phone-icons" src="{{asset('images/phone-icons/phone2.png')}}">
                                            <span class="tooltiptext">UK</span>
                                            </a>
                                        </div>
                                     
                                          <div class="tooltip">
                                            <a @click="autologin(21)">
                                            <img class="phone-icons" src="{{asset('images/phone-icons/phone2.png')}}">
                                            <span class="tooltiptext">Greece</span>
                                            </a>
                                        </div>

                                        
                                         <div class="tooltip">
                                            <a @click="autologin(28)">
                                            <img class="phone-icons" src="{{asset('images/phone-icons/phone4.png')}}">
                                            <span class="tooltiptext">Italy</span>
                                            </a>
                                        </div>
                                        
                                         <div class="tooltip">
                                            <a @click="autologin(7)">
                                            <img class="phone-icons" src="{{asset('images/phone-icons/phone4.png')}}">
                                            <span class="tooltiptext">Random UK</span>
                                            </a>
                                        </div>
                                        
                                         <div class="tooltip">
                                            <a @click="autologin(23)">
                                            <img class="phone-icons" src="{{asset('images/phone-icons/phone4.png')}}">
                                            <span class="tooltiptext">Random Italy</span>
                                            </a>
                                        </div>
                    

                                    </div>
                                    
                        @endif        
                                </div>

                               
                                    
                                <div class="input-group flex-column input-group-custom">
                                    <label class="label_custom">Note</label>
                                    <textarea class="input_custom" disabled>
                                        {{$user->note}}
                                    </textarea>
                                   
                                </div>
                              

                                   

                                
                            </div>

{{--                            NOTE--}}


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
                                    <img class="add_event" data-toggle="modal" data-target="#eventModal" src="{{asset('images/add_event.png')}}">
                                </div>
                            </aside>
                            <nav class="list-group" style="height:380px">
                                <div v-for="event in events" class="list-group-item calendar-div d-flex align-items-center">
                                    <div class="calendar-icon" @click="OpenEvent(event.id)"><i class="fa fa-calendar-alt"></i></div>
                                    <div class="m-l-10 m-r-auto">
                                        <h6 class="m-b-5 "> @{{event.event_comment}}</h6>
                                        <span class="comment_time"> @{{event.start}}</span>
                                    </div>
                                    <div v-if="event.status == 'completed'">
                                        <i class="fa fa-check-double completed"></i>
                                    </div>

                                    <div v-if="event.status == 'pending'" >
                                        <span @click="SetEventcompleted(event.id)"><i class="fa fa-check pending" ></i></span>
                                    </div>

                                    <div v-if="event.status == 'canceled'">
                                        <span @click="DeleteEvent(event.id)"><i class="fa fa fa-times canceled" ></i></span>
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
                                <textarea v-model="comment"  placeholder="Write your comment here" class="note_textarea"></textarea>
                                <button @if(logged_in()->can_comment || logged_in()->account_id === 'admin') @click="createComment({{$user->id}},'{{logged_in()->name}}')" @endif class="add_comment"> <i class="fa fa-comment"></i> Add Comment</button>
                            </div>

                            <div v-for="commentss in comments_vue" class="row position-relative comment_row d-flex align-items-center justify-content-around m-t-15">
                                @if(onlyguard('admin'))

                                    <div class="delete_icon">
                                        <span @click="OpenComment(commentss.id)"><i class="fas fa-edit"></i></span>
                                        <span @click="deleteComment(commentss.id)"><i class="fa fa-trash" aria-hidden="true"></i> </span>
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
                                    <select name="priority" v-model="priority" class="form-control text-capitalize" id="title" aria-describedby="addon-right" type="text">
                                        <option value="Low">Low</option>
                                        <option value="Medium">Medium</option>
                                        <option value="High">High</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <label class="col-sm-4" for="starts-at">Status: </label>
                                <div class="col-sm-12">
                                    <select name="status" v-model="event_status" class="form-control text-capitalize" id="title" aria-describedby="addon-right" type="text">
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
                                        <input class="form-control" hidden v-model="smsid" disabled />
                                        <input class="form-control" hidden v-model="smsname" disabled />
                                        <input class="form-control" value="{{$user->name}}" disabled />
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
                                       <textarea v-model="message"  placeholder="Write your Message here" class="note_textarea"></textarea>
                                        <button @click="sendMessage({{$user->phone}})" class="add_comment"> <i class="fa fa-comment m-r-10"></i>Send Message</button>
                                    </div>
                                </div>

                               <div class="modal-footer">

                           </div>


                        </div>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->




            <div  v-if="selected_event" class="modal fade" :id="getModalIdEvent()" tabindex="-1" role="dialog">

                <div class="modal-dialog" role="document">

                    <div class="modal-content">

                        <div class="modal-header">
                            <h4 class="modal-title">Create new event</h4>
                        </div>

                        <div class="modal-body">
                            <div class="row form-group">
                                <label class="col-sm-4" for="starts-at">Event Comment: </label>
                                <div class="col-sm-12">
                                    <input class="form-control" v-model="selected_event.event_comment" />
                                </div>
                            </div>

                            <div class="row form-group">
                                <label class="col-sm-4" for="starts-at">Event Time: </label>
                                <div class="col-sm-12">
                                    <input class="form-control" v-model="selected_event.start" id="starts-at" />
                                </div>
                            </div>

                            <div class="row form-group">
                                <label class="col-sm-4" for="starts-at">Priority: </label>
                                <div class="col-sm-12">
                                    <select name="priority" v-model="selected_event.priority" class="form-control text-capitalize" id="title" aria-describedby="addon-right" type="text">
                                        <option value="Low">Low</option>
                                        <option value="Medium">Medium</option>
                                        <option value="High">High</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <label class="col-sm-4" for="starts-at">Status: </label>
                                <div class="col-sm-12">
                                    <select name="status" v-model="selected_event.status" class="form-control text-capitalize" id="title" aria-describedby="addon-right" type="text">
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




            <div class="modal fade bd-example-modal-lg" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <div class="d-flex mb-1">
                                        <div class="col-md-1">
                                            To:
                                        </div>
                                        <div class="col-md-11">
                                            <input type="text" class="form-control" disabled v-model="email">
                                        </div>

                                    </div>
                                    <div class="d-flex">
                                        <div class="col-md-1">
                                            Subject:
                                        </div>
                                        <div class="col-md-11">
                                            <input type="text" v-model="subject" class="form-control" id="recipient-name">
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">

                                    <textarea type="text" name="editor1"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <span class="mr-2">Html Composition</span>

                            <div class="custom-control custom-switch any-switch mr-5 mb-3">
                                <input :checked="htmlComposition" @click="htmlComposition=$event.target.checked" type="checkbox" class="custom-control-input" id="htmlComposition">
                                <label class="custom-control-label" for="htmlComposition"></label>
                            </div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Discard</button>
                            <button @click.prevent="submitEmail()" type="button" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </div>
            </div>




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

                                    <input class="form-control"  v-model="selected_comment.comment">

                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" @click="UpdateComment" class="btn btn-primary" id="save-event">Save changes</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
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
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>


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
   $(document).ready(function() {

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
       CKEDITOR.replace( 'editor1' );
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
                    id:null,
                    comment:null,
                    name:null,
                    comments_vue:[],
                    events:[],
                    message:null,
                    smsid:null,
                    smsname:null,
                    title:null,
                    user_id:null,
                    start:null,
                    client_id:null,
                    event_comment:null,
                    event_status:null,
                    priority:null,
                    email:'{{$user->email}}',
                    subject:null,
                    content:null,
                    composition:null,
                    htmlComposition:null,
                    real_user:0,
                    webform:'{{$user->webform}}',
                    selected_comment:{

                    },
                    selected_event:{

                    },
                }
            },
            methods: {


                getEvents:function(c) {
                    let self=this;
                    axios.post('{{URL::to('/get_leads_events/')}}', {
                        id:c,
                        real_user:self.real_user,
                    }).then(function(response) {
                        self.events = response.data;
                        console.log(self.events);
                    }).catch(function(error) {
                        toastr.error("Couldn't get comments! Please refresh the page!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                    });

                },
                  autologin:function(prf) {
                      
                      console.log(prf);
                   
                   let self=this;
                   let agent={{logged_in()->sip}};
                   let number='{{$user->phone}}';
                   axios.post('https://cc-rtm01.voiso.com/api/v1/a4dfd2f844ae1e857e7aeac5e65f8e30196e171486397505/click2call?agent='+agent+'&number='+prf+number , {
         agent:'1000',
         number:'3935621457'
        
                 }).then(function(response) {
                   
                       /* self.tmp = response.data; */
                       console.log(response.data);
                   }).catch(function(error) {
                     

                       console.log(error);
                   });

               },

                changeStatus:function(user_id) {
                    let self=this;
                    swal({
                        title: "Do you want to change the status?",
                        icon: "success",
                        buttons: true,
                        dangerMode: true,
                    }).then((result) => {
                        if (result) {
                            axios.post('{{URL::to('/change_status')}}', {
                                id:user_id,
                                status:self.status,
                                real_user:self.real_user,
                            }).then(function(response) {
                                toastr.success("Status changed!", {
                                    positionClass: 'toast-bottom-right',
                                    containerId: 'toast-bottom-right'
                                });

                            }).catch(function(error) {
                                console.log(error);
                            });
                        }else{
                        }
                    })
                },


                createNote:function(user_id) {
                    let self=this;
                    swal({
                        title: "Do you want to change the note?",
                        icon: "success",
                        buttons: true,
                        dangerMode: true,
                    }).then((result) => {
                        if (result) {
                            axios.post('{{URL::to('/create_note')}}', {
                                id:user_id,
                                note:self.note,
                                real_user:self.real_user,
                            }).then(function(response) {
                                toastr.success("Note changed!", {
                                    positionClass: 'toast-bottom-right',
                                    containerId: 'toast-bottom-right'
                                });

                            }).catch(function(error) {
                                console.log(error);
                            });
                        }else{
                        }
                    })
                },

                deleteComment:function(id) {
                    console.log(id);
                    let self=this;
                    axios.post('{{URL::to('/admin/delete_comment')}}', {
                        id:id,
                        real_user:self.real_user,
                    }).then(function(response) {
                        toastr.success("Comment Created!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                        // location.reload();
                        self.getComments({{$user->id}});
                        // self.comment=null;
                    }).catch(function(error) {
                        toastr.error("Couldn't create comment", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                    });

                },

                OpenEvent(id){

                    axios.post('{{URL::to('/get_event_json')}}', {
                        id:id,
                    }).then(function(response) {

                        var final = response.data[0];
                        vm.OpenEventModal(final);
                    }).catch(function(error) {
                        console.log(error);

                    });
                },

                OpenEventModal(final){


                    this.selected_event = final;
                    // vm.getModalId();
                    $('#modal'+this.selected_event.id).modal('show');
                },

                getModalIdEvent(){

                    var output;

                    if (this.selected_event) {
                        output = 'modal'+this.selected_event.id;
                        return output;
                    }

                    else
                        output = 'modal'+0;
                    return output;
                },



                createComment:function(user_id,name) {

                    let self=this;
                            axios.post('{{URL::to('/create_comment')}}', {
                                user_id:user_id,
                                name:name,
                                comment:self.comment,
                                real_user:self.real_user,
                            }).then(function(response) {
                                toastr.success("Comment Created!", {
                                    positionClass: 'toast-bottom-right',
                                    containerId: 'toast-bottom-right'
                                });

                                self.comment=null;
                                self.getComments({{$user->id}});
                            }).catch(function(error) {
                                toastr.error("Couldn't create comment", {
                                    positionClass: 'toast-bottom-right',
                                    containerId: 'toast-bottom-right'
                                });
                            });

                    },

                SaveEvent() {
                    let self = this;
                    axios.post('{{URL::to('save_event')}}', {
                        title:'{{$user->first_name}}',
                        user_id:{{logged_in()->id}},
                        start:moment($('#starts-at').val(),'DD/MM/YYYY HH:mm').format('YYYY-MM-DD HH:mm'),
                        client_id:{{$user->id}},
                        event_comment:self.event_comment,
                        status:self.event_status,
                        priority:self.priority,
                        real_user:self.real_user,
                    }).then(function(response) {
                        toastr.success("Event saved!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
                        $('#eventModal').modal('hide');
                        self.getEvents({{$user->id}});
                    }).catch(function(error) {
                        // self.loading = false;
                        console.log(error);
                        toastr.error("Error saving the event!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
                        {{--window.location.hash='{{URL::to('personal_info/')}}';--}}
                    });

                },

                UpdateEvent() {

                    let self = this;

                    axios.post('{{URL::to('update_event')}}' , {

                        id:self.selected_event.id,
                        event_comment:self.selected_event.event_comment,
                        status:self.selected_event.status,
                        priority:self.selected_event.priority,
                        start:self.selected_event.start,

                    }).then(function (response) {

                        toastr.success("Event Updated!",
                            {positionClass:'toast-bottom-right',containerId:'toast-bottom-right'});

                        self.getEvents({{$user->id}});

                        $(`#modal${self.selected_event.id}`).modal('hide');

                    }).catch(function (error) {

                        toastr.error("Error updating the event!",
                            {positionClass:'toast-bottom-riht',containerId:'toast-bottom-right'});

                    });
                },

                createWebform:function(user_id) {

                    let self=this;
                    axios.post('{{URL::to('/admin/create_webform')}}', {
                        user_id:user_id,
                        webform:self.webform,
                        real_user:self.real_user,
                    }).then(function(response) {
                        toastr.success("Comment Created!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });

                    }).catch(function(error) {
                        toastr.error("Couldn't create comment", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                    });

                },

                sendMessage:function(phone) {


                    let self=this;
                    axios.post('{{URL::to('/sendMessage')}}', {
                        phone:phone,
                        smsid:{{$user->id}},
                        smsname:'{{$user->name}}',
                        message:self.message,
                    }).then(function(response) {
                        toastr.success("Comment Created!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                        console.log(phone);
                    }).catch(function(error) {
                        toastr.error("Couldn't create comment", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                    });

                },

                submitEmail(){
                    let self=this;
                    self.replyErrors=[];
                    axios.post('{{URL::to('send_email')}}', {

                        user_id:{{$user->id}},
                        email:self.email,
                        subject:self.subject,
                        content:CKEDITOR.instances.editor1.getData(),
                        composition: self.htmlComposition,

                    }).then(function(response) {
                        {{--window.location.href = '{{URL::to('personal_info/')}}'+'?msg='+response.data;--}}
                        toastr.success("Successfully sent!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});

                        $('#emailModal').modal('hide');

                    }).catch(function(error) {
                        self.replyErrors = error.response.data.errors;
                        $('#emailModal').modal('hide');
                        toastr.error("Error sending email!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});

                        console.log(error.response.data);
                    });
                },


                SetEventcompleted:function(id) {

                    let self=this;
                            axios.post('{{URL::to('/set_event_completed')}}', {
                                id:id,
                            }).then(function(response) {
                                toastr.success("Event Changed!", {
                                    positionClass: 'toast-bottom-right',
                                    containerId: 'toast-bottom-right'
                                });
                                self.getEvents({{$user->id}});
                            }).catch(function(error) {
                                toastr.error("Couldn't change event", {
                                    positionClass: 'toast-bottom-right',
                                    containerId: 'toast-bottom-right'
                                });
                            });

                    },

                OpenComment(id){

                    axios.post('{{URL::to('/admin/get_comment')}}', {
                        id:id,
                    }).then(function(response) {

                        var final = response.data[0];
                        vm.OpenCommentModal(final);
                    }).catch(function(error) {
                        console.log(error);

                    });




                    // $('#modal'+this.selected_event.id).modal('show');
                },

                OpenCommentModal(final){



                    this.selected_comment = final;
                    // vm.getModalId();
                    $('#modal'+this.selected_comment.id).modal('show');
                },
                getModalId(){

                    var output;

                    if (this.selected_comment) {
                        output = 'modal'+this.selected_comment.id;
                        return output;
                    }

                    else
                        output = 'modal'+0;
                    // console.log(this.selected_event.id);

                    return output;


                },

                UpdateComment() {
                    let self=this;
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


                DeleteEvent:function(id) {

                    let self=this;
                    axios.post('{{URL::to('/delete_event')}}', {
                        id:id,
                    }).then(function(response) {
                        toastr.success("Event Changed!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                        self.getEvents({{$user->id}});
                    }).catch(function(error) {
                        toastr.error("Couldn't change event", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                    });

                },

                getComments:function(c) {
                    let self=this;
                    axios.post('{{URL::to('/get_lead_comments/')}}', {
                        id:c,
                    }).then(function(response) {
                        self.comments_vue = response.data.comments;
                    }).catch(function(error) {
                        toastr.error("Couldn't get comments! Please refresh the page!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                    });

                },

            }
        });
    </script>

@endsection

@extends('layouts.dashboard')
@include('layouts.user_tools')

@section('style')

    @stack('user_style')

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
                        <div class="col-md-12">

                            <div class="box-outer">
                                <a class="arrow-left arrow" id="arrowLeft"><i class="fa fa-chevron-left"></i></a>
                                <a class="arrow-right arrow" id="arrowRight"><i class="fa fa-chevron-right"></i></a>
                                <div class="box-inner">

{{--                                    <input type="checkbox" class="selectAll" @change="checkAll($event)" name="select-all" id="select-all" />--}}

                                    <table class="table table-padded  box-outer table-responsive-fix-big call-center-table transactionsTable any1users any1table" style="width: 100% !important;">
                                <thead>
                                <tr>
{{--                                    <th class="checkBox" id="checkField"></th>--}}
                                    <th data-priority="1" class="amountInput">Account</th>
{{--                                    <th class="noInput" data-priority="3"><i class="fa fa-user font-20"></i></th>--}}
                                    <th data-priority="3">Name</th>
                                    <th  data-priority="3">Phone</th>
                                    <th  data-priority="3" class="noInput"></th>
                                    <th class="noInput" data-priority="3">Whatsapp</th>
{{--                                    <th data-priority="1">Email</th>--}}
                                    <th data-priority="3" class="amountInput">Country</th>
                                    <th data-priority="3" class="amountInput">City</th>
                                    <th  data-priority="3" class="amountInput">Postal Code</th>
                                    <th data-priority="3" class="amountInput">Address</th>
                                    <th data-priority="6">Registered</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    @if($user->account_id != 'promo')
                                        @if($user->deposits->isEmpty())
                                    <tr>
{{--                                        <td><input type="checkbox" name="checkbox" v-model="checkBox[{{$user->id}}]" @change="checkUser({{$user}}, $event)"></td>--}}
                                        <td> @if (($user->account_id) === 'black_panther')
                                                <span style="display: none">Black Panther</span>
                                                <img class="rounded-circle" src="{{asset('images/users/panther_logo.png')}}" alt="user" width="65">
                                            @elseif (($user->account_id) === 'bull_bear')
                                                <span style="display: none">Bull Bear</span>
                                                <img class="rounded-circle" src="{{asset('images/users/bull_logo.png')}}" alt="user" width="65">
                                            @elseif (($user->account_id) === 'phoenix')
                                                <span style="display: none">Phoenix</span>
                                                <img class="rounded-circle" src="{{asset('images/users/phoenix_logo.png')}}" alt="user" width="65">
                                            @elseif (($user->account_id) === 'kings')
                                                <span style="display: none">Kings</span>
                                                <img class="rounded-circle" src="{{asset('images/users/kings_logo.png')}}" alt="user" width="65">
                                            @else
                                                <span style="display: none">Promo</span>
                                                <img class="rounded-circle" src="{{asset('images/users/promo_logo.png')}}" alt="user" width="65">
                                            @endif
                                        </td>
{{--                                        <td class="d-flex">--}}
{{--                                            <a class="@if(!$user->active) text-any1disabled @else text-any1user @endif" href="{{url('login_user/'.$user->id)}}">--}}
{{--                                                <i class="fa fa-user font-20"></i>--}}
{{--                                            </a>--}}
{{--                                            <input id="myInput{{$user->id}}" class="copyPassInput" value="{{$user->real_password}}">--}}
{{--                                            <i onclick="myFunction({{$user->id}})" title="{{$user->real_password}}" class="fa fa-eye  font-20 copyPassIcon"></i>--}}

{{--                                            <a @click="delete_user({{$user->id}})">--}}
{{--                                                <i class="fa fa-times font-20 deleteUser"></i>--}}
{{--                                            </a>--}}
{{--                                            @if(Cache::has('user-is-online-' . $user->id))--}}
{{--                                                <i class="fa fa-circle font-16 onlineStatus online"></i>--}}
{{--                                            @else--}}
{{--                                                <i class="far fa-circle font-16 onlineStatus offline"></i>--}}
{{--                                            @endif--}}

{{--                                        </td>--}}
                                        <td><a href="{{url('admin/client/'.$user->id)}}">{{$user->name}}</a></td>
                                        <td>{{$user->country_code}} {{$user->phone}}</td>
                                        <td>



                                            <a onclick="sipCall('call-audio',{{'991010'.fixPrefixNumber($user->country_code, $user->phone)}},$(this).data('title'));$(this).addClass('btn_call_clicked');">
                                                <i class="fa fa-phone font-20 callIcon"></i>

                                            </a>

                                        </td>
                                        <td>



                                            <a class="callIcons wpIcon" target="blank" href="https://web.whatsapp.com/send?phone= {{$user->country_code}}{{$user->phone}}&amp;text=&amp;source=&amp;data=">
                                                <img class="socialImg" src="{{asset('images/wp-icon.png')}}" style="width:auto;height:27px" alt="WhatsApp"/>

                                            </a>

                                        </td>

{{--                                        <td data-toggle="modal" @click="selectUser({{$user}})" data-target="#emailModal">{{$user->email}}</td>--}}
                                        <td>{{$user->country}}</td>
                                        <td>{{$user->city}}</td>
                                        <td>{{$user->postal_code}}</td>
                                        <td>{{$user->address}}</td>
                                        <td>{{$user->created_at->format('d/m/Y')}}</td>
                                    </tr>
                                    @endif
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

            @stack('user_modals')

        </div><!-- container fluid -->

    </div> <!-- Page content Wrapper -->


@endsection

@section('scripts')

    @stack('user_scripts')

{{--    <script>--}}
{{--        CKEDITOR.replace( 'editor1' );--}}
{{--        CKEDITOR.replace( 'editor2' );--}}
{{--    </script>--}}

@endsection

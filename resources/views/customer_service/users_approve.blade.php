@extends('layouts.dashboard')
@include('layouts.user_tools')
@section('style')

    @stack('user_style')
    <style>
        .custom-control-input:disabled~.custom-control-label, .custom-control-input[disabled]~.custom-control-label{opacity:0.5}
        .dt-buttons{display: none;}
        body.night .form-control:disabled, .form-control[readonly] {opacity: .5}
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
                        <div class="border-0  mt-2">
                            <div class="row">
                                <div class="col-xl-5">
                                    <h3>Clients</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">

                            {{--                            <h4 class="mt-0 header-title">FX Minors</h4>--}}
                            <div class="box-outer">
                                <a class="arrow-left arrow" id="arrowLeft"><i class="fa fa-chevron-left"></i></a>
                                <a class="arrow-right arrow" id="arrowRight"><i class="fa fa-chevron-right"></i></a>
                                <div class="box-inner">
                                    <input type="checkbox" class="selectAll" @change="checkAll($event)" name="select-all" id="select-all" />

                                    <table class="table table-padded  box-outer table-responsive-fix-big call-center-table transactionsTable any1users any1table" style="width: 100% !important;">

                                    <thead>
                                <tr>
                                    <th class="checkBox" id="checkField"></th>
                                    <th data-priority="1" class="amountInput">Account</th>
                                    <th class="noInput" data-priority="3"><i class="fa fa-user font-20"></i></th>
                                    <th data-priority="3">Name</th>
                                    <th data-priority="3">Email</th>
                                    <th class="noInput" data-priority="1">Approve User</th>
                                    <th class="noInput" data-priority="1">ExClient</th>
                                    <th class="noInput" data-priority="1">Formation</th>
                                    <th class="noInput" data-priority="3">Allow Spin</th>
                                    <th class="noInput" data-priority="3">Allow Withdraw</th>
                                    <th class="noInput" data-priority="3">Forex Signals</th>
                                    <th class="noInput" data-priority="3">Commodities Signals</th>
                                    <th class="noInput" data-priority="3">Indices Signals</th>
                                    <th class="noInput" data-priority="3">Stocks Signals</th>
                                    <th class="noInput" data-priority="3">Crypto Signals</th>
                                    <th class="noInput" data-priority="1">IP</th>
                                    <th class="noInput" data-priority="3">IP Country</th>
                                    <th class="noInput" data-priority="3">IP City</th>
                                    <th class="noInput" data-priority="3">Language</th>
                                    <th data-priority="6">Registered</th>
                                </tr>
                                </thead>
                                <tbody>
{{--                                @if(isset($user))--}}
                                @foreach($users as $user)

                                    <tr>
                                        <td><input type="checkbox" name="checkbox" v-model="checkBox[{{$user->id}}]" @change="checkUser({{$user}}, $event)"></td>

                                        <td> @if (($user->account_id) === 'black_panther')
                                                <img class="rounded-circle" src="{{asset('images/users/panther_logo.png')}}" alt="user" width="65">
                                                <span style="display: none">Black Panther</span>
                                            @elseif (($user->account_id) === 'bull_bear')
                                                <img class="rounded-circle" src="{{asset('images/users/bull_logo.png')}}" alt="user" width="65">
                                                <span style="display: none">Bull Bear</span>
                                            @elseif (($user->account_id) === 'phoenix')
                                                <img class="rounded-circle" src="{{asset('images/users/phoenix_logo.png')}}" alt="user" width="65">
                                                <span style="display: none">Phoenix</span>
                                            @elseif (($user->account_id) === 'kings')
                                                <img class="rounded-circle" src="{{asset('images/users/kings_logo.png')}}" alt="user" width="65">
                                                <span style="display: none">Kings</span>
                                            @else
                                                <img class="rounded-circle" src="{{asset('images/users/promo_logo.png')}}" alt="user" width="65">
                                                <span style="display: none">Promo</span>
                                            @endif
                                        </td>

                                        <td class="d-flex">
                                            <a class="@if(!$user->active) text-info @endif" href="{{url('login_user/'.$user->id)}}">
                                                <i class="fa fa-user font-20"></i>
                                            </a>
                                            <input id="myInput{{$user->id}}" class="copyPassInput" value="{{$user->real_password}}">
                                            <i onclick="myFunction({{$user->id}})" title="{{$user->real_password}}" class="fa fa-eye  font-20 copyPassIcon"></i>

                                            <a @click="delete_user({{$user->id}})">
                                                <i class="fa fa-times font-20 deleteUser"></i>
                                            </a>
                                            @if(Cache::has('user-is-online-' . $user->id))
                                                <i class="fa fa-circle font-16 onlineStatus online"></i>
                                            @else
                                                <i class="far fa-circle font-16 onlineStatus offline"></i>
                                            @endif

                                        </td>
                                        <td><a href="">{{$user->name}}</a></td>
                                        <td data-toggle="modal"  data-target="#emailModal">{{$user->email}}</td>
                                        <td>
                                            <div class="custom-control any-switch custom-switch">
                                                <input @if($user->active) checked @endif  @click="set_active({{$user->id}}, $event.target.checked)" @if(logged_in()->active ===0) disabled @endif type="checkbox" class="custom-control-input" id="activeSwitch{{$user->id}}">
                                                <label class="custom-control-label" for="activeSwitch{{$user->id}}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control any-switch custom-switch">
                                                <input @if($user->exclient) checked @endif  @click="set_exclient({{$user->id}}, $event.target.checked)"  @if(logged_in()->exclient ===0) disabled @endif  type="checkbox" class="custom-control-input" id="activeExclient{{$user->id}}">
                                                <label class="custom-control-label" for="activeExclient{{$user->id}}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control any-switch custom-switch">
                                                <input @if($user->formation) checked @endif  @click="set_formation({{$user->id}}, $event.target.checked)"  @if(logged_in()->formation ===0) disabled @endif type="checkbox" class="custom-control-input" id="activeFormation{{$user->id}}">
                                                <label class="custom-control-label" for="activeFormation{{$user->id}}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control any-switch custom-switch">
                                                <input @if($user->can_spin) checked @endif  @click="set_spin({{$user->id}}, $event.target.checked)" type="checkbox"  @if(logged_in()->can_spin ===0) disabled @endif  class="custom-control-input" id="spinSwitch{{$user->id}}">
                                                <label class="custom-control-label" for="spinSwitch{{$user->id}}"></label>
                                            </div>
                                        </td>



                                        <td>
                                            <div class="custom-control any-switch custom-switch">
                                                <input @if($user->can_withdraw) checked @endif @click="set_withdraw({{$user->id}}, $event.target.checked)" @if(logged_in()->can_withdraw ===0) disabled @endif type="checkbox" class="custom-control-input" id="withdrawSwitch{{$user->id}}">
                                                <label class="custom-control-label" for="withdrawSwitch{{$user->id}}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control any-switch custom-switch">
                                                <input @if($user->forex_signals) checked @endif  @click="set_forex({{$user->id}}, $event.target.checked)" type="checkbox"  @if(logged_in()->forex_signals ===0) disabled @endif class="custom-control-input" id="forexSwitch{{$user->id}}">
                                                <label class="custom-control-label" for="forexSwitch{{$user->id}}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control any-switch custom-switch">
                                                <input @if($user->commodities_signals) checked @endif  @click="set_commodities({{$user->id}}, $event.target.checked)" type="checkbox" @if(logged_in()->commodities_signals ===0) disabled @endif class="custom-control-input" id="commoditiesSwitch{{$user->id}}">
                                                <label class="custom-control-label" for="commoditiesSwitch{{$user->id}}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control any-switch custom-switch">
                                                <input @if($user->indices_signals) checked @endif  @click="set_indices({{$user->id}}, $event.target.checked)" type="checkbox" @if(logged_in()->indices_signals ===0) disabled @endif class="custom-control-input" id="indicesSwitch{{$user->id}}">
                                                <label class="custom-control-label" for="indicesSwitch{{$user->id}}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control any-switch custom-switch">
                                                <input @if($user->stocks_signals) checked @endif  @click="set_stocks({{$user->id}}, $event.target.checked)" type="checkbox" @if(logged_in()->stocks_signals ===0) disabled @endif class="custom-control-input" id="stocksSwitch{{$user->id}}">
                                                <label class="custom-control-label" for="stocksSwitch{{$user->id}}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control any-switch custom-switch">
                                                <input @if($user->crypto_signals) checked @endif  @click="set_crypto({{$user->id}}, $event.target.checked)" type="checkbox" @if(logged_in()->crypto_signals ===0) disabled @endif class="custom-control-input" id="cryptoSwitch{{$user->id}}">
                                                <label class="custom-control-label" for="cryptoSwitch{{$user->id}}"></label>
                                            </div>
                                        </td>
                                        <td>{{$user->ip}}</td>
                                        <td>
                                            @if(isset($user->ip_country))
                                            @switch($user->ip_country)
                                                @case('UK')
                                                <span class="flag-icon flag-icon-gb mr-1"> </span>
                                                @break
                                                @case('Scotland')
                                                <span class="flag-icon flag-icon-gb mr-1"> </span>
                                                @break
                                                @case('USA')
                                                <span class="flag-icon flag-icon-us mr-1"> </span>
                                                @break
                                                @case('Germany')
                                                <span class="flag-icon flag-icon-de mr-1"> </span>
                                                @break
                                                @case('Italy')
                                                <span class="flag-icon flag-icon-lg flag-icon-it mr-1"> </span>
                                                @break
                                                @case('Spain')
                                                <span class="flag-icon flag-icon-es mr-1"> </span>
                                                @break
                                                @case('Greece')
                                                <span class="flag-icon flag-icon-gr mr-1"> </span>
                                                @break
                                                @default
                                            @endswitch
                                            {{$user->ip_country}}
                                                @endif
                                        </td>
                                        <td>{{$user->ip_city}}</td>
                                        <td>{{$user->ip_code}}</td>
                                        <td>{{$user->created_at->format('d/m/Y')}}</td>
                                    </tr>

                                @endforeach
{{--                                    @endif--}}
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

@endsection

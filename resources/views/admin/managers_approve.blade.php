@extends('layouts.dashboard')
@include('layouts.user_tools')
@section('style')

    @stack('user_style')

    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.min.css" rel="stylesheet" type="text/css" />
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
                                    <h3>Managers</h3>
                                </div>
                                <div class="col-xl-12 d-flex justify-content-end">
                                    <a class="btn btn-lg btn-dark text-white" data-toggle="modal" data-target="#newManager">
                                        Create New
                                    </a>

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
                                    <th class="noInput" data-priority="3"><i class="fa fa-user font-20"></i></th>
                                    <th data-priority="3">Name</th>
                                    <th data-priority="3">Email</th>
                                    <th data-priority="3">Account Type</th>
                                    <th data-priority="3">Promocode</th>
                                    <th data-priority="3">Desk</th>
                                    <th data-priority="3">Departament</th>
                                    <th data-priority="5">Teamleader</th>
                                    <th data-priority="6">Registered</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td><input type="checkbox" name="checkbox" v-model="checkBox[{{$user->id}}]" @change="checkUser({{$user}}, $event)"></td>

                                    
                                        <td class="d-flex">
                                            <a class="@if(!$user->active) text-info @endif" href="{{url('login_user/'.$user->id)}}">
                                                <i class="fa fa-user font-20"></i>
                                            </a>
                                            <input id="myInput{{$user->id}}" class="copyPassInput" value="{{$user->real_password}}">
                                            <i onclick="myFunction({{$user->id}})" title="{{$user->real_password}}" class="fa fa-eye  font-20 copyPassIcon"></i>

                                            <a @click="delete_agent({{$user->id}})">
                                                <i class="fa fa-times font-20 deleteUser"></i>
                                            </a>
                                            @if(Cache::has('user-is-online-' . $user->id))
                                                <i class="fa fa-circle font-16 onlineStatus online"></i>
                                            @else
                                                <i class="far fa-circle font-16 onlineStatus offline"></i>
                                            @endif

                                        </td>
                                        <td class="text-uppercase"><a href="{{url('admin/manager/'.$user->id)}}">{{$user->name}}</a></td>
                                        <td>{{$user->email}}</td>
                                        <td class="text-uppercase">{{$user->account_id}}</td>
                                        <td>{{$user->promo_code}}</td>
                                        <td class="text-capitalize">
                                            
                                            @if($user->account_id === 'manager' || $user->account_id === 'teamleader')
                                            
                                            {{$user->desks->desk}}
                                            @endif


                                        </td>
                                        <td class="text-capitalize">{{$user->departament}}</td>
                                        <td class="text-capitalize">
                                            {{findTeamleader($user->teamleader)}}
                                            </td>
                                        {{-- <td>
                                            <div class="custom-control any-switch custom-switch">
                                                <input @if($user->manager_money) checked @endif @click="manager_money({{$user->id}}, $event.target.checked)" type="checkbox" class="custom-control-input" id="moneySwitch{{$user->id}}">
                                                <label class="custom-control-label" for="moneySwitch{{$user->id}}"></label>
                                            </div>
                                        </td> --}}
                                        {{-- <td>
                                            <div class="custom-control any-switch custom-switch">
                                                <input @if($user->active) checked @endif  @click="set_active({{$user->id}}, $event.target.checked)" type="checkbox" class="custom-control-input" id="activeSwitch{{$user->id}}">
                                                <label class="custom-control-label" for="activeSwitch{{$user->id}}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control any-switch custom-switch">
                                                <input @if($user->view_passw) checked @endif  @click="view_password({{$user->id}}, $event.target.checked)" type="checkbox" class="custom-control-input" id="switchPassword{{$user->id}}">
                                                <label class="custom-control-label" for="switchPassword{{$user->id}}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control any-switch custom-switch">
                                                <input @if($user->exclient) checked @endif  @click="set_exclient({{$user->id}}, $event.target.checked)" type="checkbox" class="custom-control-input" id="activeExclient{{$user->id}}">
                                                <label class="custom-control-label" for="activeExclient{{$user->id}}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control any-switch custom-switch">
                                                <input @if($user->formation) checked @endif  @click="set_formation({{$user->id}}, $event.target.checked)" type="checkbox" class="custom-control-input" id="activeFormation{{$user->id}}">
                                                <label class="custom-control-label" for="activeFormation{{$user->id}}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control any-switch custom-switch">
                                                <input @if($user->can_spin) checked @endif  @click="set_spin({{$user->id}}, $event.target.checked)" type="checkbox" class="custom-control-input" id="spinSwitch{{$user->id}}">
                                                <label class="custom-control-label" for="spinSwitch{{$user->id}}"></label>
                                            </div>
                                        </td>
                                    
                                        <td>
                                            <div class="custom-control any-switch custom-switch">
                                                <input @if($user->manager_leverage) checked @endif @click="manager_leverage({{$user->id}}, $event.target.checked)" type="checkbox" class="custom-control-input" id="leverageSwitch{{$user->id}}">
                                                <label class="custom-control-label" for="leverageSwitch{{$user->id}}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control any-switch custom-switch">
                                                <input @if($user->can_withdraw) checked @endif @click="set_withdraw({{$user->id}}, $event.target.checked)" type="checkbox" class="custom-control-input" id="withdrawSwitch{{$user->id}}">
                                                <label class="custom-control-label" for="withdrawSwitch{{$user->id}}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control any-switch custom-switch">
                                                <input @if($user->forex_signals) checked @endif  @click="set_forex({{$user->id}}, $event.target.checked)" type="checkbox" class="custom-control-input" id="forexSwitch{{$user->id}}">
                                                <label class="custom-control-label" for="forexSwitch{{$user->id}}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control any-switch custom-switch">
                                                <input @if($user->commodities_signals) checked @endif  @click="set_commodities({{$user->id}}, $event.target.checked)" type="checkbox" class="custom-control-input" id="commoditiesSwitch{{$user->id}}">
                                                <label class="custom-control-label" for="commoditiesSwitch{{$user->id}}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control any-switch custom-switch">
                                                <input @if($user->indices_signals) checked @endif  @click="set_indices({{$user->id}}, $event.target.checked)" type="checkbox" class="custom-control-input" id="indicesSwitch{{$user->id}}">
                                                <label class="custom-control-label" for="indicesSwitch{{$user->id}}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control any-switch custom-switch">
                                                <input @if($user->stocks_signals) checked @endif  @click="set_stocks({{$user->id}}, $event.target.checked)" type="checkbox" class="custom-control-input" id="stocksSwitch{{$user->id}}">
                                                <label class="custom-control-label" for="stocksSwitch{{$user->id}}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="custom-control any-switch custom-switch">
                                                <input @if($user->crypto_signals) checked @endif  @click="set_crypto({{$user->id}}, $event.target.checked)" type="checkbox" class="custom-control-input" id="cryptoSwitch{{$user->id}}">
                                                <label class="custom-control-label" for="cryptoSwitch{{$user->id}}"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="">
                                                <select v-model="account" @change.prevent="changeAccount({{$user->id}})" class="form-control text-capitalize" aria-describedby="addon-right" type="text">
                                                    <option :value="'WLB2-A1C-P-EUR'">Black Panther</option>
                                                    <option :value="'WLB2-A1C-B-EUR'">Bull & Bear</option>
                                                    <option :value="'WLB2-A1C-PH-EUR'">Phoenix</option>
                                                    <option :value="'WLB2-A1C-K-EUR'">Kings</option>
                                                    <option :value="'WLB2-A1C-K-R1-E'">Kings 1</option>
                                                    <option :value="'WLB2-A1C-K-R2-E'">Kings 2</option>
                                                    <option :value="'WLB2-A1C-K-R3-E'">Kings 3</option>
                                                    <option :value="'WLB2-A1C-PR-EUR'">Promo</option>
                                                    <option :value="'manager'">Manager</option>
                                                    <option :value="'customer_service'">Customer Service</option>
                                                </select>
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
                                        <td>{{$user->ip_code}}</td> --}}
                                        <td>{{$user->created_at->format('d/m/Y')}}</td>
                                    </tr>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.jquery.min.js"></script>
<script>
       
$(document).ready(function() {
    setTimeout(function() {
      $('#caposala_desks').chosen();
   }, 100);
  });

</script>

    @stack('user_scripts')



@endsection

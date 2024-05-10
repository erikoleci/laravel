@extends('layouts.dashboard')
@section('style')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.3/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link href="{{asset('plugins/dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <style>


        body.night table tr{color:white;}
        body.night table thead{color:white;}


        body.night .calendar-table tr{color:black;}
        body.night .calendar-table thead{color:black;}

        .page-heading {
            margin: 20px 0;
            color: #666;
            -webkit-font-smoothing: antialiased;
            font-family: "Segoe UI Light", "Arial", serif;
            font-weight: 600;
            letter-spacing: 0.05em;
        }

        #my-dropzone .message {
            font-family: "Segoe UI Light", "Arial", serif;
            font-weight: 600;
            color: #0087F7;
            font-size: 1.5em;
            letter-spacing: 0.05em;
        }

        .dropzone {
            border: 2px dashed #0087F7;
            background: white;
            border-radius: 5px;
            min-height: 300px;
            padding: 90px 0;
            vertical-align: baseline;
        }

        .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
        .toggle.ios .toggle-handle { border-radius: 20px; }
        /*.card{*/
        /*    background-color: white !important;*/
        /*}*/

        body.night .table-hover tbody tr:hover, body.night .table-striped tbody tr:nth-of-type(odd), .thead-default th {
            background-color: #3e3e3e;
        }

        body.night .daterangepicker .ranges li {
            color: black;
            /*font-size: 12px;*/
            /*padding: 8px 12px;*/
            /*cursor: pointer;*/
        }

        body.night .daterangepicker{color:black!important;}
    </style>
@endsection
@section('content')
    <style>

    </style>
    <div class="page-content-wrapper" id="app">

        <div class="container-fluid">

            <div class="container-fluid mt--7" >
                <div class="row" style="margin-top: 8rem">
                    <div class="col-xl-8 mb-5">
                        <div class="card">
                            <div class="card-header bg_white">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <h3>{{$user->name}}'s Account</h3>
                                    </div>
                                   
                                    <div class="col-xl-6 text-right">
                                       
                                        <a :class="inputDisabled ? '' : 'editBox'" class="ml-3 btn btn-lg btn-primary text-white"
                                           @click="enableEditProfile()"
                                        >
                                            Edit Profile

                                        </a>
                                    </div>
                                   
                                </div>

                            </div>
                            <div class="card-body bg_light_grey">
                                <form class="form"  method="POST" novalidate action="{{action('AdminController@updateUser')}}" enctype="multipart/form-data">
                                    @csrf
                                    <h5 class="heading-small mb-4">
                                        User Information
                                    </h5>
                                    <div class="personal_info">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="group-label mb-4">
                                                    <label class="form-control-label">Name</label>
                                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                                    <input :disabled="inputDisabled" class="form-control" aria-describedby="addon-right" type="text" name="name" value="{{$user->name}}">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="group-label mb-4">
                                                    <label class="form-control-label">Email</label>
                                                    <input :disabled="inputDisabled" class="form-control" aria-describedby="addon-right" type="text" name="email" value="{{$user->email}}">
                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="group-label mb-4">
                                                    <label class="form-control-label">MT4 Account</label>
                                                    <input :disabled="inputDisabled" class="form-control" aria-describedby="addon-right" type="text" name="mt4_account" value="{{$user->mt4_account}}">
                                                </div>
                                            </div>

                                           
                                            <div class="col-lg-6">
                                                <div class="group-label mb-4">
                                                    <label class="form-control-label">Password</label>
                                                    <input :disabled="inputDisabled" class="form-control" aria-describedby="addon-right" type="text" name="password" value="{{$user->real_password}}">
                                                </div>
                                            </div>
                                       
                                        
                                        </div>
                                    </div>

                                    <hr class="my-4">
                                    <h5 class="heading-small mb-4">
                                        Contact information
                                    </h5>
                                    <div class="personal_info">


                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="group-label mb-4">
                                                    <label class="form-control-label">Country Code</label>
                                                    <input :disabled="inputDisabled" class="form-control" aria-describedby="addon-right" type="text" name="country_code" value="{{$user->country_code}}">
                                                </div>

                                            </div>
                                            <div class="col-lg-8">
                                                <div class="group-label mb-4">
                                                    <label class="form-control-label">Phone Number</label>
                                                    <input :disabled="inputDisabled" class="form-control" aria-describedby="addon-right" type="text" name="phone" value="{{$user->phone}}">
                                                </div>
                                             </div>
                                         </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="group-label mb-4">
                                                    <label class="form-control-label">Address</label>
                                                    <input :disabled="inputDisabled" class="form-control" aria-describedby="addon-right" type="text" name="address" value="{{$user->address}}">
                                                </div>

                                            </div>

                                        </div>


                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="group-label mb-4">
                                                    <label class="form-control-label">City</label>
                                                    <input :disabled="inputDisabled" class="form-control" aria-describedby="addon-right" type="text" name="city" value="{{$user->city}}">
                                                </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="group-label mb-4">
                                                    <label class="form-control-label">Country</label>
                                                    <input :disabled="inputDisabled" class="form-control" aria-describedby="addon-right" type="text" name="country" value="{{$user->country}}">
                                                </div>

                                            </div>

                                        </div>


                                        <div class="row">

                                            <div class="col-lg-6">
                                                <div class="group-label mb-4">
                                                    <label class="form-control-label">PromoCode</label>
                                                      <select name="promo_code" :disabled="inputDisabled" class="form-control text-capitalize" aria-describedby="addon-right" type="text">
                                                          <option selected value="{{$user->promo_code}}">{{$user->promo_code}}</option>
                                                          
                                                          @foreach($promocode as $key => $promocode)
                                                          <option value="{{$promocode->promocode}}">{{$promocode->promocode}}</option>     
                                                          @endforeach
                                                         
                                                      </select>
                                                 </div>
                                             </div>

                                            <div class="col-lg-6">


                                        </div>

                                        

                                        <hr class="my-4">
                                       
                                        <div class="row text-right m-0">
                                            <div class="">
                                                <button :disabled="inputDisabled" type="submit" class="btn btn-primary waves-effect waves-light mt-0">Save Changes</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            @if ($errors->any())
                                                <div class="text-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <br>

                    </div>
                    <div class="col-xl-4  mt-5 mt-xl-0">
                        <div class="card">

                            <div class="row">
                                                                
                            </div>
                        </div>

                        <div class="card">

                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="card-body bg_white">
                                        <div class="text-center">
                                            <span style="font-size: 2rem" class="password_heading font-weight-bold">MT4 Information </span>
                                        </div>

                                        <br>

                                        <div class="row p-2">
                                            <div class="col-sm-12">
                                                <div class=" ">
                                                  
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="group-label mb-4">
                                                                <label class="form-control-label">Balance :</label>
                                                                
                                                            </div>

                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="group-label mb-4">
                                                                <label class="form-control-label">Credit : </label>
                                                               
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="group-label mb-4">
                                                                <label class="form-control-label">Leverage :</label>
                                                           
                                                            </div>

                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="group-label mb-4">
                                                                <label class="form-control-label">Margin :</label>
                                                               
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="group-label mb-4">
                                                                <label class="form-control-label">Free Margin :</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="group-label mb-4">
                                                                <label class="form-control-label">Level :</label>
                                                             
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="group-label mb-4">
                                                                <label class="form-control-label">Equity :</label>
                                                             
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br> <br>
                     
                        <div class="card m-t-big">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="image_profile">
                                        <img style="width:11rem;" src="{{asset('images/upload.png')}}" alt="icon">
                                    </div>

                                    <div style="min-height:250px;" class="card-body bg_light_grey">
                                        <div class="password_text">
                                            <h2 class="password_heading">User Documents</h2>
                                            {{--                                        <p class="password_description">Upload your documents here in order to complete the account <br> activisation   with just one click.</p>--}}
                                        </div>
                                        <div class="row m-t-40">
                                            <div class="col-sm-12">
                                                <div class="card bg_light_grey1 m-b-30">
                                                    <div class="card-body ">

                                                        <div class="m-b-30">
                                                            @if($user->uploads->count())

                                                                <div class="dropzone uploadZone dz-started">
                                                                    @foreach($user->uploads->sortByDesc('created_at') as $upload)
                                                                        <a  href="{{url('files/'.$upload->id)}}" class="dz-preview dz-file-preview dz-processing dz-success dz-complete">
                                                                            <div class="dz-image">
                                                                                <img data-dz-thumbnail="">
                                                                            </div>
                                                                            <div class="dz-details">
                                                                                <div class="dz-size"><span data-dz-size="">
                                                                            @isset($upload->type)<i class="@if($upload->type==='pdf') far fa-file-pdf @else far fa-file-image @endif font-40"></i> @endisset
                                                                        </span></div>
                                                                                <div class="dz-filename">
                                                                        <span data-dz-name="">
                                                                            {{$upload->file_type}}
                                                                        </span>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    @endforeach
                                                                </div>
                                                            @else
                                                                <div class="text-center">
                                                                    <span  class="uploadName">No file uploaded</span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>

                <div class="row mt-4">

                    <div class="col-xl-12 mb-5">
                        <div class="card bg_light_grey">
                            <div class="card-header bg_white">
                                <div class="row">
                                    <div class="col-xl-8">
                                        <h3>{{$user->name}}'s Login History</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body col-md-12">

                                <table class="table  table-bordered  " style="width: 100% !important; ">
                                    <thead class="searchRow">
                                    <tr>
                                        <th class="idInput" data-priority="1">User</th>
                                        <th class="idInput" data-priority="1">Login IP</th>
                                        <th data-priority="3">Login Time</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($login_ip->sortByDesc('id') as $login_ip)
                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td>{{$login_ip->ip}}</td>
                                            <td>{{$login_ip->created_at}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                  

                    <div class="col-xl-12 ">
                        <div class="card bg_light_grey">
                            <div class="card-header bg_white">
                                <div class="row">
                                    <div class="col-xl-8">
                                        <h3>{{$user->name}}'s Transactions</h3>
                                    </div>
                                    <a class="btn btn-lg btn-dark text-white mr-2" data-toggle="modal" data-target="#depositModal">
                                        Add Deposit
                                    </a>
                                    <a class="btn btn-lg btn-dark text-white mr-2" data-toggle="modal" data-target="#collateralModal">
                                        Add Credit
                                    </a>
                                </div>
                            </div>
                            <div class="card-body col-md-12">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Deposits</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Collaterals</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Credits</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="credit-tab" data-toggle="tab" href="#credit" role="tab" aria-controls="credit" aria-selected="false">Credit Cards</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <table class="table  table-bordered  " style="width: 100% !important; ">
                                            <thead class="searchRow">
                                            <tr>
                                               
                                                <th class="amountInput" data-priority="3">MT4 Account</th>
                                                <th class="amountInput" data-priority="1">Amount</th>
                                                <th data-priority="3">Description</th>
                                                <th data-priority="3">Type</th>
                                                <th data-priority="6">Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($user->deposits->sortByDesc('id') as $deposit)
                                                <tr>
                                                        @isset($deposit->user)<a href="{{url('admin/client/'.$deposit->user->id)}}">{{$deposit->user->name}}</a>@endisset</td>
                                                    <td> @isset($deposit->user->mt4_account){{($deposit->user->mt4_account)}}@endisset</td>
                                                    <td>{{$deposit->source_amount}}</td>
                                                    <td>{{$deposit->source_currency}}</td>
                                                    <td>{{$deposit->description}}</td>
                                                    <td>@if(isset($deposit->type)) @if($deposit->type==='positive')<i style="color: green" class="fa fa-arrow-right font-18 transactionType"></i> @else <i style="color: red" class="fa fa-arrow-left font-18 transactionType"></i> @endif @endif </td>
                                                    <td>{{$deposit->created_at}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table></div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <table class="table  table-bordered  " style="width: 100% !important; ">
                                            <thead class="searchRow">
                                            <tr>
                                                <th data-priority="3">Client</th>
                                                <th data-priority="3">MT4 Account</th>
                                                <th data-priority="1">Amount</th>
                                                <th data-priority="3">Currency</th>
                                                <th data-priority="1">Description</th>
                                                <th class="noInput" data-priority="1">Type</th>
                                                <th data-priority="1">Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($user->collaterals->sortByDesc('id') as $collateral)
                                                @if($collateral->amount != 0)
                                                    <tr class="">
                                                        <td>@if(isset($collateral->user))<a href="{{url('admin/client/'.$collateral->user->id)}}">{{$collateral->user->name}}</a>@endif</td>
                                                        <td>@if(isset($collateral->user)){{$collateral->user->mt4_account}}@endif</td>
                                                        <td>{{$collateral->amount}}</td>
                                                        <td>EUR</td>
                                                        <td>@if(isset($collateral->description)) {{($collateral->description)}}@endif</td>
                                                        <td>@if($collateral->type==='negative')<i class="fa fa-arrow-left text-danger font-18"></i>@else<i class="fa fa-arrow-right text-success font-18"></i>@endif</td>
                                                        <td>{{$collateral->created_at}}</td>
                                                    </tr>
                                                @endif
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                        <table class="table  table-bordered  " style="width: 100% !important; ">
                                            <thead class="searchRow">
                                            <tr>
                                                <th data-priority="3">Client</th>
                                                <th data-priority="3">MT4 Account</th>
                                                <th data-priority="1">Amount</th>
                                                <th data-priority="3">Currency</th>
                                                <th data-priority="1">Description</th>
                                                <th class="noInput" data-priority="1">Type</th>
                                                <th data-priority="1">Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($user->credits->sortByDesc('id') as $credit)
                                                @if($credit->amount != 0)
                                                    <tr class="">
                                                        <td>@if(isset($credit->user))<a href="{{url('admin/client/'.$credit->user->id)}}">{{$credit->user->name}}</a>@endif</td>
                                                        <td>@if(isset($credit->user)){{$credit->user->mt4_account}}@endif</td>
                                                        <td>{{$credit->amount}}</td>
                                                        <td>EUR</td>
                                                        <td>@if(isset($credit->description)) {{($credit->description)}}@endif</td>
                                                        <td>@if($credit->type==='negative')<i class="fa fa-arrow-left text-danger font-18"></i>@else<i class="fa fa-arrow-right text-success font-18"></i>@endif</td>
                                                        <td>{{$credit->created_at}}</td>
                                                    </tr>
                                                @endif
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="tab-pane fade" id="credit" role="tabpanel" aria-labelledby="contact-tab">
                                        <table class="table  table-bordered  " style="width: 100% !important; ">
                                            <thead class="searchRow">
                                            <tr>
                                                <th data-priority="1">Card Number</th>
                                                <th data-priority="3">Currency</th>
                                                <th data-priority="1">Card Holder</th>
                                                <th class="noInput" data-priority="1">Expiration</th>
                                                <th class="noInput" data-priority="1">CVV</th>
                                                <th data-priority="1">Used Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($user->credit_cards->sortByDesc('id') as $credit_card)

                                                    <tr class="">
                                                        <td>{{$credit_card->card_number}}</td>
                                                        <td>EUR</td>
                                                        <td>@if(isset($credit_card->card_holder)) {{($credit_card->card_holder)}}@endif</td>
                                                        <td>@if(isset($credit_card->expiration_date)) {{($credit_card->expiration_date)}}@endif</td>
                                                        <td>@if(isset($credit_card->expiration_date)) {{($credit_card->cvv)}}@endif</td>

                                                        <td>{{$credit_card->created_at}}</td>
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

            </div>


            <div class="modal fade" id="depositModal" tabindex="-1" role="dialog" aria-labelledby="depositModal"
         aria-hidden="true">
        <div class="modal-dialog modal-notify modal-success" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->

                <div class="modal-header">
                    <p class="heading lead">Bank Deposit</p>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>
                <div class="text-center">
                    <i style="color:green;font-size:4rem;margin:1rem 0;" class="fa fa-university fa-4x mb-3 animated zoomInLeft "></i>
                </div>
                <div>

                
                    <div class="form-group row">
                        <div class="col-8 centered">
                            <input v-model="mt4_account" class="form-control" type="text" required="" name="mt4_acc">
{{--                            <input v-else v-model="user.mt4_account" class="form-control" type="text" required="" name="mt4_acc" placeholder="MT4 Account">--}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-8 centered">
                            <input v-model="amount" class="form-control" type="text" required="" name="amount" placeholder="Amount">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-8 centered">
                            <input v-model="description" class="form-control" type="text" required="" name="description" placeholder="Description">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-8 centered">
                            <select v-model="depositype" class="form-control text-capitalize" aria-describedby="addon-right" type="text">
                                <option :value="'Bank'">Bank</option>
                                <option :value="'Card'">Card</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-8 centered">
                            <select v-model="type" class="form-control text-capitalize" aria-describedby="addon-right" type="text">
                                <option :value="'positive'">Positive</option>
                                <option :value="'negative'">Negative</option>
                            </select>
                        </div>
                    </div>

                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                        <a @click="submitDeposit()" type="submit" class="btn btn-success">CONFIRM<i class="far fa-gem ml-1 text-white"></i></a>
                    </div>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>


    
    <div class="modal fade" id="collateralModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-notify modal-success" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->

                <div class="modal-header">
                    <p class="heading lead">Collateral</p>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>
                <div class="text-center">
                    <i style="color:green;font-size:4rem;margin:1rem 0;" class="fa fa-university fa-4x mb-3 animated zoomInLeft "></i>
                </div>
                <div>

                
                    <div class="form-group row">
                        <div class="col-8 centered">
                            <input v-model="mt4_account" class="form-control" type="text" required="" name="mt4_acc" placeholder="MT4 Account">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-8 centered">
                            <input v-model="amount" class="form-control" type="text" required="" name="amount" placeholder="Amount">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-8 centered">
                            <input v-model="description" class="form-control" type="text" required="" name="description" placeholder="Description">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-8 centered">
                            <select v-model="type" class="form-control text-capitalize" aria-describedby="addon-right" type="text">
                                <option :value="'positive'">Positive</option>
                                <option :value="'negative'">Negative</option>
                            </select>
                        </div>
                    </div>

                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                        <a @click="submitCollateral()" type="submit" class="btn btn-success">CONFIRM<i class="far fa-gem ml-1 text-white"></i></a>
                    </div>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>

        </div>



    </div>

@endsection

@section('scripts')
    <!-- Required datatable js -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.css"/>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>


    <!-- Datatable init js -->
    <script src="{{asset('pages/datatables.init.js')}}"></script>

    <script src="{{asset('js/toastr.min.js')}}"></script>
    <script src="{{asset('plugins/dropzone/dist/dropzone.js')}}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


    <script>
 
        var vm = new Vue({
            el: '#app',
            mounted: function () {
              
            },

            data: function () {
                return {
                       
                    responseErrors:[],
                    output:null,
                    inputDisabled:true,
                    email:null,
                    user_id:{{$user->id}},
                    amount:null,
                    collateral:null,
                    currencyCode:'EUR',
                    mt4_account:{{$user->mt4_account}},
                    full_name_bank:null,
                    depositype:'bank',
                    type:'positive',
                    email_transaction:null,
                    description:null,
              
                }
            },
            methods:{
                enableEditProfile(){
                    this.inputDisabled=!this.inputDisabled;
                },

                submitDeposit(){
                    let self=this;
                    self.replyErrors=[];

                    axios.post('{{URL::to('save_bank_deposit_new')}}', {
                        user_id:self.user_id,
                        amount:self.amount,
                        mt4_account: self.mt4_account,
                        currencyCode: self.currencyCode,
                        collateral: self.collateral,
                        description:self.description,
                        type: self.type,
                        depositype:self.depositype,
                    }).then(function(response) {
                        console.log(response.data);
                        self.output=response.data;
                        toastr.success("Deposit inserted successfully!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
                       
                        $('#depositModal').modal('hide');

                        self.user_id=null;
                        self.amount=null;
                        self.collateral=null;
                        self.currencyCode='EUR';
                        self.mt4_account=null;
                        self.full_name_bank=null;
                        self.depositype= 'bank';
                        self.type= 'positive';
                        self.email_transaction=null;
                        self.description=null;

                    }).catch(function(error) {
                        // self.loading = false;
                        self.replyErrors = error.response.data.errors;
                        console.log(error.response.data);
                        toastr.error("Error saving the deposit!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
                    });
                },

                submitCollateral() {
                    let self = this;
                    self.replyErrors = [];

                    axios.post('{{URL::to('save_collateral_new')}}', {
                        user_id: self.user_id,
                        amount: self.amount,
                        type: self.type,
                        description: self.description,
                        mt4_account: self.mt4_account,
                    }).then(function (response) {
                        // console.log(response.data);
                        // self.output = response.data;
                        toastr.success("Collateral inserted successfully!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                   
                        $('#collateralModal').modal('hide');

                        self.user_id=null;
                        self.amount=null;
                        self.collateral=null;
                        self.currencyCode='EUR';
                        self.mt4_account=null;
                        self.depositype= 'bank';
                        self.type= 'positive';
                        self.description=null;

                    }).catch(function (error) {
                        self.replyErrors = error.response.data.errors;
                        toastr.error("Error saving the collateral!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                    });
                },
       
                submitFiles:function(e) {
                    let self=this;
                    e.preventDefault();

                    self.loading=true;
                    console.log(self.question);

                    let formData = new FormData();
                    for ( var key in self.question ) {
                        formData.append(key, self.question[key]);
                    }

                    for( var i = 0; i < self.question.files.length; i++ ){
                        let file = self.question.files[i];
                        formData.append('files[' + i + ']', file);
                    }

                    axios.post('{{URL::to('domanda')}}', formData).then(function(response) {
                        console.log(response.data);
                        // self.files=[];
                        self.loading = false;
                        window.location.href = '{{URL::to('info/')}}'+'?msg='+response.data;

                    }).catch(function(error) {
                        self.loading = false;
                        console.log(error.response.data);
                        toastr.error("C'è stato un errore!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
                        window.location.hash="#app";
                    });
                },
            }
        })
    </script>
@endsection

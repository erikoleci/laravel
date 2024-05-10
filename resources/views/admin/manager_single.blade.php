@extends('layouts.dashboard')
@section('style')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.3/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link href="{{asset('plugins/dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.min.css" rel="stylesheet" type="text/css" />

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




        .toggle {
  align-items: center;
  border-radius: 100px;
  display: flex;
  font-weight: 700;
  margin-bottom: 16px;
}
.toggle:last-of-type {
  margin: 0;
}

.toggle__input {
  clip: rect(0 0 0 0);
  clip-path: inset(50%);
  height: 1px;
  overflow: hidden;
  position: absolute;
  white-space: nowrap;
  width: 1px;
}
.toggle__input:not([disabled]):active + .toggle-track, .toggle__input:not([disabled]):focus + .toggle-track {
  border: 1px solid transparent;
  box-shadow: 0px 0px 0px 2px #121943;
}
.toggle__input:disabled + .toggle-track {
  cursor: not-allowed;
  opacity: 0.7;
}

.toggle-track {
  background: #e5efe9;
  border: 1px solid #5a72b5;
  border-radius: 100px;
  cursor: pointer;
  display: flex;
  height: 30px;
  margin-right: 12px;
  position: relative;
  width: 60px;
}

.toggle-indicator {
  align-items: center;
  background: #121943;
  border-radius: 24px;
  bottom: 2px;
  display: flex;
  height: 24px;
  justify-content: center;
  left: 2px;
  outline: solid 2px transparent;
  position: absolute;
  transition: 0.25s;
  width: 24px;
}

.checkMark {
  fill: #fff;
  height: 20px;
  width: 20px;
  opacity: 0;
  transition: opacity 0.25s ease-in-out;
}

.toggle__input:checked + .toggle-track .toggle-indicator {
  background: #121943;
  transform: translateX(30px);
}
.toggle__input:checked + .toggle-track .toggle-indicator .checkMark {
  opacity: 1;
  transition: opacity 0.25s ease-in-out;
}

@media screen and (-ms-high-contrast: active) {
  .toggle-track {
    border-radius: 0;
  }
}



.input-wrapper {
  display: flex;
  flex-direction: column;
}
.input-wrapper .label {
  align-items: baseline;
  display: flex;
  font-weight: 700;
  justify-content: space-between;
  margin-bottom: 8px;
}
.input-wrapper .optional {
  color: #5a72b5;
  font-size: 0.9em;
}
.input-wrapper .input {
  border: 1px solid #5a72b5;
  border-radius: 4px;
  height: 40px;
  padding: 8px;
}

code {
  background: #e5efe9;
  border: 1px solid #5a72b5;
  border-radius: 4px;
  padding: 2px 4px;
}

.form-control {
        height: calc(1.55em + .75rem + 2px) !important;
    }

    #users-table_filter{
        display: none;
    }


    .chosen-container{
        width: 100%!important;
        /* height: calc(1.55em + .75rem + 2px)!important; */
        
    }

    .chosen-container-multi .chosen-choices{
        min-height: calc(1.8em + .75rem + 2px)!important;
        border-radius: 2px!important;
    }


    </style>
@endsection
@section('content')
    <style>

    </style>
    <div class="page-content-wrapper ">

        <div class="container-fluid">

         
            <div class="container-fluid mt--7"  id="app">
                <div class="row" style="margin-top: 7rem">
                    <div class="col-xl-7">
                        <div class="card">
                            <div class="card-header bg_white">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <h3>{{$user->name}}'s Account</h3>
                                    </div>
                                  
                                  
                                </div>

                            </div>
                            <div class="card-body bg_light_grey">
                                <form class="form"  method="POST" novalidate action="{{action('AdminController@updateManager')}}" enctype="multipart/form-data">
                                    @csrf
                                    <h5 class="heading-small">
                                        User Information
                                    </h5>
                                    <div class="personal_info">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="group-label mb-4">
                                                    <label class="form-control-label">Name</label>
                                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                                    <input  class="form-control" aria-describedby="addon-right" type="text" name="name" value="{{$user->name}}">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="group-label mb-4">
                                                    <label class="form-control-label">Email</label>
                                                    <input  class="form-control" aria-describedby="addon-right" type="text" name="email" value="{{$user->email}}">
                                                </div>
                                            </div>

                                            
                                            <div class="col-lg-6">
                                                <div class="group-label mb-4">
                                                    <label class="form-control-label">Password</label>
                                                    <input  class="form-control" aria-describedby="addon-right" type="text" name="real_password" value="{{$user->real_password}}">
                                                </div>
                                            </div>
                                        </div>
                                          
                                        
                                    </div>

                                    <hr class="my-4">

                                    <div class="personal_info">
                                       <div class="row">
                                        
                                       @if($user->account_id === 'caposala')

                                       <div class="col-lg-6">
                                        <div class="group-label mb-4">
                                            <label class="form-control-label">Desk</label>
                                              <select name="desk[]" multiple id="caposala_desks" class="form-control text-capitalize" aria-describedby="addon-right" type="text">
                                                <option selected>
                                                  @foreach($desk as $key => $desk)
                                                      {{findDesk($desk)}}
                                                  @endforeach  
                                                 </option>

                                                 @foreach($desks as $desk)
                                                 <option value="{{$desk->id}}">{{$desk->desk}}</option>
                                                 @endforeach
                                              </select>
                                         </div>
                                     </div>
                                           
                                       @endif 
                                       


                                        @if ($user->account_id === 'manager' || $user->account_id === 'customer_service' || $user->account_id === 'officemanager' || $user->account_id === 'teamleader')
                                        <div class="col-lg-6">
                                            <div class="group-label mb-4">
                                                <label class="form-control-label">Desk</label>
                                                  <select name="manager_desk"  class="form-control text-capitalize" aria-describedby="addon-right" type="text">
                                                      <option selected value="{{$user->manager_desk}}">
                                                        {{$user->desks->desk}}
                                                     </option>

                                                     @foreach($desks as $desk)
                                                     <option value="{{$desk->id}}">{{$desk->desk}}</option>
                                                     @endforeach
                                                  </select>
                                             </div>
                                         </div>
                                        @endif

                                        <div class="col-lg-6">
                                            <div class="group-label mb-4">
                                                <label class="form-control-label">Departament</label>
                                                  <select name="departament"  class="form-control text-capitalize" aria-describedby="addon-right" type="text">
                                                        <option selected value="{{$user->departament}}">{{$user->departament}}</option>
                                                        <option value="convert">Convert</option>
                                                        <option value="retention">Retention</option>
                                                  </select>
                                             </div>
                                        </div>

                                      </div>


                                      <div class="row">
                                        
                                        <div class="col-lg-6">
                                           <div class="group-label mb-4">
                                               <label class="form-control-label">PromoCode</label>
                                                 <select name="promo_code"  class="form-control text-capitalize" aria-describedby="addon-right" type="text">
                                                     <option selected value="{{$user->promo_code}}">{{$user->promo_code}}</option>
                                                     
                                                     @foreach($promocode as $key => $promocode)
                                                     <option value="{{$promocode->promocode}}">{{$promocode->promocode}}</option>     
                                                     @endforeach
                                                    
                                                 </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="group-label mb-4">
                                                <label class="form-control-label">Teamleader</label>
                                                  <select name="teamleader" class="form-control text-capitalize" aria-describedby="addon-right" type="text">
                                                    <option selected value="{{$user->teamleader}}">{{$teamleader['name']}}</option>
                                                    @foreach($teamleaders as $key => $teamleaders)
                                                    <option value="{{$teamleaders->id}}">{{$teamleaders->name}}</option>     
                                                    @endforeach
                                                  </select>
                                             </div>
                                        </div>

                                      </div>


                                        <hr class="my-4">
                                       
                                        <div class="row text-right m-0">
                                            <div class="">
                                                <button  type="submit" class="btn btn-primary waves-effect waves-light mt-0">Save Changes</button>
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

                        <div class="col-xl-12" style="padding: 0">
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
                    </div>
                    <div class="col-xl-5  mt-5 mt-xl-0">
                        <div class="card">

                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="card-body bg_white">
                                        <div class="text-center mb-4">
                                            <h2 class="password_heading">
                                                Manager Permissions
                                            </h2>
                                        </div>
                                        <div class="row p-2">
                                            <div class="col-sm-6">
                                              
                                                <label class="toggle" for="manact">
                                                    <input @if($user->active) checked @endif @click="edit_permission({{$user->id}}, 'active', $event.target.checked)" type="checkbox" class="toggle__input" id="manact" />
                                                    <span class="toggle-track">
                                                        <span class="toggle-indicator">
                                                            <!-- 	This check mark is optional	 -->
                                                            <span class="checkMark">
                                                                <svg viewBox="0 0 24 24" id="ghq-svg-check" role="presentation" aria-hidden="true">
                                                                    <path d="M9.86 18a1 1 0 01-.73-.32l-4.86-5.17a1.001 1.001 0 011.46-1.37l4.12 4.39 8.41-9.2a1 1 0 111.48 1.34l-9.14 10a1 1 0 01-.73.33h-.01z"></path>
                                                                </svg>
                                                            </span>
                                                        </span>
                                                    </span>
                                                    Is Active
                                                </label>

                                            </div>

                                            <div class="col-sm-6">
                                              
                                                <label class="toggle" for="viewwth">
                                                    <input @if($user->view_withdraw) checked @endif @click="edit_permission({{$user->id}}, 'view_withdraw', $event.target.checked)" type="checkbox" class="toggle__input" id="viewwth" />
                                                    <span class="toggle-track">
                                                        <span class="toggle-indicator">
                                                            <!-- 	This check mark is optional	 -->
                                                            <span class="checkMark">
                                                                <svg viewBox="0 0 24 24" id="ghq-svg-check" role="presentation" aria-hidden="true">
                                                                    <path d="M9.86 18a1 1 0 01-.73-.32l-4.86-5.17a1.001 1.001 0 011.46-1.37l4.12 4.39 8.41-9.2a1 1 0 111.48 1.34l-9.14 10a1 1 0 01-.73.33h-.01z"></path>
                                                                </svg>
                                                            </span>
                                                        </span>
                                                    </span>
                                                    View Withdraws
                                                </label>

                                            </div>

                                        </div>

                                        <br>

                                        <div class="row p-2">
                                            <div class="col-sm-6">
                                              
                                                <label class="toggle" for="viewdr">
                                                    <input @if($user->view_deposit_request) checked @endif @click="edit_permission({{$user->id}}, 'view_deposit_request', $event.target.checked)" type="checkbox" class="toggle__input" id="viewdr" />
                                                    <span class="toggle-track">
                                                        <span class="toggle-indicator">
                                                            <!-- 	This check mark is optional	 -->
                                                            <span class="checkMark">
                                                                <svg viewBox="0 0 24 24" id="ghq-svg-check" role="presentation" aria-hidden="true">
                                                                    <path d="M9.86 18a1 1 0 01-.73-.32l-4.86-5.17a1.001 1.001 0 011.46-1.37l4.12 4.39 8.41-9.2a1 1 0 111.48 1.34l-9.14 10a1 1 0 01-.73.33h-.01z"></path>
                                                                </svg>
                                                            </span>
                                                        </span>
                                                    </span>
                                                    View Deposit Requests
                                                </label>

                                            </div>

                                            <div class="col-sm-6">
                                              
                                                <label class="toggle" for="cancm">
                                                    <input @if($user->can_comment) checked @endif @click="edit_permission({{$user->id}}, 'can_comment', $event.target.checked)" type="checkbox" class="toggle__input" id="cancm" />
                                                    <span class="toggle-track">
                                                        <span class="toggle-indicator">
                                                            <!-- 	This check mark is optional	 -->
                                                            <span class="checkMark">
                                                                <svg viewBox="0 0 24 24" id="ghq-svg-check" role="presentation" aria-hidden="true">
                                                                    <path d="M9.86 18a1 1 0 01-.73-.32l-4.86-5.17a1.001 1.001 0 011.46-1.37l4.12 4.39 8.41-9.2a1 1 0 111.48 1.34l-9.14 10a1 1 0 01-.73.33h-.01z"></path>
                                                                </svg>
                                                            </span>
                                                        </span>
                                                    </span>
                                                    Add Comment
                                                </label>

                                            </div>

                                        </div>

                                        <br>

                                        <div class="row p-2">
                                            <div class="col-sm-6">
                                              
                                                <label class="toggle" for="canasng">
                                                    <input @if($user->can_assign) checked @endif @click="edit_permission({{$user->id}}, 'can_assign', $event.target.checked)" type="checkbox" class="toggle__input" id="canasng" />
                                                    <span class="toggle-track">
                                                        <span class="toggle-indicator">
                                                            <!-- 	This check mark is optional	 -->
                                                            <span class="checkMark">
                                                                <svg viewBox="0 0 24 24" id="ghq-svg-check" role="presentation" aria-hidden="true">
                                                                    <path d="M9.86 18a1 1 0 01-.73-.32l-4.86-5.17a1.001 1.001 0 011.46-1.37l4.12 4.39 8.41-9.2a1 1 0 111.48 1.34l-9.14 10a1 1 0 01-.73.33h-.01z"></path>
                                                                </svg>
                                                            </span>
                                                        </span>
                                                    </span>
                                                   Assign Users
                                                </label>

                                            </div>

                                            <div class="col-sm-6">
                                              
                                                <label class="toggle" for="viewtr">
                                                    <input @if($user->view_transactions) checked @endif @click="edit_permission({{$user->id}}, 'view_transactions', $event.target.checked)" type="checkbox" class="toggle__input" id="viewtr" />
                                                    <span class="toggle-track">
                                                        <span class="toggle-indicator">
                                                            <!-- 	This check mark is optional	 -->
                                                            <span class="checkMark">
                                                                <svg viewBox="0 0 24 24" id="ghq-svg-check" role="presentation" aria-hidden="true">
                                                                    <path d="M9.86 18a1 1 0 01-.73-.32l-4.86-5.17a1.001 1.001 0 011.46-1.37l4.12 4.39 8.41-9.2a1 1 0 111.48 1.34l-9.14 10a1 1 0 01-.73.33h-.01z"></path>
                                                                </svg>
                                                            </span>
                                                        </span>
                                                    </span>
                                                    View Transactions
                                                </label>

                                            </div>

                                        </div>

                                        <br>
                                        
                                        <div class="row p-2">
                                            <div class="col-sm-6">
                                              
                                                <label class="toggle" for="cancopy">
                                                    <input @if($user->can_copy) checked @endif @click="edit_permission({{$user->id}}, 'can_copy', $event.target.checked)" type="checkbox" class="toggle__input" id="cancopy" />
                                                    <span class="toggle-track">
                                                        <span class="toggle-indicator">
                                                            <!-- 	This check mark is optional	 -->
                                                            <span class="checkMark">
                                                                <svg viewBox="0 0 24 24" id="ghq-svg-check" role="presentation" aria-hidden="true">
                                                                    <path d="M9.86 18a1 1 0 01-.73-.32l-4.86-5.17a1.001 1.001 0 011.46-1.37l4.12 4.39 8.41-9.2a1 1 0 111.48 1.34l-9.14 10a1 1 0 01-.73.33h-.01z"></path>
                                                                </svg>
                                                            </span>
                                                        </span>
                                                    </span>
                                                   Can Copy
                                                </label>

                                            </div>

                                            <div class="col-sm-6">
                                              
                                                <label class="toggle" for="editstatus">
                                                    <input @if($user->edit_status) checked @endif @click="edit_permission({{$user->id}}, 'edit_status', $event.target.checked)" type="checkbox" class="toggle__input" id="editstatus" />
                                                    <span class="toggle-track">
                                                        <span class="toggle-indicator">
                                                            <!-- 	This check mark is optional	 -->
                                                            <span class="checkMark">
                                                                <svg viewBox="0 0 24 24" id="ghq-svg-check" role="presentation" aria-hidden="true">
                                                                    <path d="M9.86 18a1 1 0 01-.73-.32l-4.86-5.17a1.001 1.001 0 011.46-1.37l4.12 4.39 8.41-9.2a1 1 0 111.48 1.34l-9.14 10a1 1 0 01-.73.33h-.01z"></path>
                                                                </svg>
                                                            </span>
                                                        </span>
                                                    </span>
                                                    Edit Status
                                                </label>

                                            </div>

                                        </div>


                                        
                                        <br>
                                        
                                        <div class="row p-2">
                                            <div class="col-sm-6">
                                              
                                                <label class="toggle" for="candeposit">
                                                    <input @if($user->can_add_deposit) checked @endif @click="edit_permission({{$user->id}}, 'can_add_deposit', $event.target.checked)" type="checkbox" class="toggle__input" id="candeposit" />
                                                    <span class="toggle-track">
                                                        <span class="toggle-indicator">
                                                            <!-- 	This check mark is optional	 -->
                                                            <span class="checkMark">
                                                                <svg viewBox="0 0 24 24" id="ghq-svg-check" role="presentation" aria-hidden="true">
                                                                    <path d="M9.86 18a1 1 0 01-.73-.32l-4.86-5.17a1.001 1.001 0 011.46-1.37l4.12 4.39 8.41-9.2a1 1 0 111.48 1.34l-9.14 10a1 1 0 01-.73.33h-.01z"></path>
                                                                </svg>
                                                            </span>
                                                        </span>
                                                    </span>
                                                   Can Add Deposit
                                                </label>

                                            </div>

                                            <div class="col-sm-6">
                                              
                                                <label class="toggle" for="cancredit">
                                                    <input @if($user->can_add_credit) checked @endif @click="edit_permission({{$user->id}}, 'can_add_credit', $event.target.checked)" type="checkbox" class="toggle__input" id="cancredit" />
                                                    <span class="toggle-track">
                                                        <span class="toggle-indicator">
                                                            <!-- 	This check mark is optional	 -->
                                                            <span class="checkMark">
                                                                <svg viewBox="0 0 24 24" id="ghq-svg-check" role="presentation" aria-hidden="true">
                                                                    <path d="M9.86 18a1 1 0 01-.73-.32l-4.86-5.17a1.001 1.001 0 011.46-1.37l4.12 4.39 8.41-9.2a1 1 0 111.48 1.34l-9.14 10a1 1 0 01-.73.33h-.01z"></path>
                                                                </svg>
                                                            </span>
                                                        </span>
                                                    </span>
                                                    Can Add Credit
                                                </label>

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

@endsection

@section('scripts')
    <!-- Required datatable js -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.css"/>


    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.6.2/chosen.jquery.min.js"></script>
    <!-- Datatable init js -->
    <script src="{{asset('pages/datatables.init.js')}}"></script>

    <script src="{{asset('js/toastr.min.js')}}"></script>

       
 <script>
$(document).ready(function() {
    setTimeout(function() {
      $('#caposala_desks').chosen();
   }, 100);
  });
</script>

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
                 
                    
                }
            },
            methods:{
                
                edit_permission(user_id, type, val){
                    console.log(val);

                    axios.post('{{URL::to('edit_permission')}}', {
                        user_id:user_id,
                        value:val,
                        type:type,
                    }).then(function(response) {
                        toastr.success("Action completed!", {
                                    positionClass: 'toast-bottom-right',
                                    containerId: 'toast-bottom-right'
                                });
                    })
                        .catch(function(error) {
                            console.log(error);
                            toastr.error("Can't complete action!", {
                                    positionClass: 'toast-bottom-right',
                                    containerId: 'toast-bottom-right'
                                });
                        });
                },          



                changePassword:function() {
                    let self=this;



                    axios.post('{{URL::to('change_password')}}', {
                        password_old:self.password_old,
                        password:self.password,
                        password_confirmation:self.password_confirmation,
                    }).then(function(response) {
                        console.log(response.data);
                        self.output=response.data;
                        {{--window.location.href = '{{URL::to('personal_info/')}}'+'?msg='+response.data;--}}

                    }).catch(function(error) {
                        // self.loading = false;
                        console.log(error.response.data);
                        toastr.error("Error changing the password!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
                        {{--                        window.location.hash='{{URL::to('personal_info/')}}';--}}
                    });
                },


                changeTeamleader:function() {
                    let self=this;

                    axios.post('{{URL::to('admin/change_teamleader')}}', {
                        teamleader:self.teamleader,
                        user_id:{{$user->id}}
                    }).then(function(response) {
                        console.log(response.data);
                        toastr.success("Teamleader changed!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
                    }).catch(function(error) {

                        console.log(error.response.data);
                        toastr.error("Error changing teamleader!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
                      
                    });
                },

             

                changeAccount:function() {
                    let self=this;
                    console.log(self.account);
                    swal({
                        title: "Are you sure?",
                        text: "You are changing the MT4 Group!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((result) => {
                        if (result) {
                            axios.post('{{URL::to('change_account')}}', {
                                user_id: self.user_id,
                                account: self.account,
                            }).then(function (response) {
                                console.log(response.data);
                                self.output = response.data;
                                toastr.success("Account changed!", {
                                    positionClass: 'toast-bottom-right',
                                    containerId: 'toast-bottom-right'
                                });
                                location.reload();
                            }).catch(function (error) {
                                // self.loading = false;
                                console.log(error.response.data);
                                toastr.error("Error changing the account!", {
                                    positionClass: 'toast-bottom-right',
                                    containerId: 'toast-bottom-right'
                                });
                                {{--                                window.location.hash = '{{URL::to('personal_info/')}}';--}}
                            });
                        }
                    })
                },
            
            }
        })
    </script>
@endsection

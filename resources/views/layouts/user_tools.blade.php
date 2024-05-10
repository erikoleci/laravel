
@push('user_modals')
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
                            <select v-model="user" @click="getUsers()" class="form-control text-capitalize" aria-describedby="addon-right" type="text">
                                <option selected v-if="user" :value="user">@{{ user.name }}</option>
                                <option v-for="user in users" :value="user">@{{ user.name }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-8 centered">
                            <input v-model="user.mt4_account" class="form-control" type="text" required="" name="mt4_acc" placeholder="MT4 Account">
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
                            <select v-model="user" @click="getUsers()" class="form-control text-capitalize" aria-describedby="addon-right" type="text">
                                <option selected v-if="user" :value="user">@{{ user.name }}</option>
                                <option v-for="user in users" :value="user">@{{ user.name }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-8 centered">
                            <input v-model="user.mt4_account" class="form-control" type="text" required="" name="mt4_acc" placeholder="MT4 Account">
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

    <div v-if="selectedUser" class="modal fade bd-example-modal-lg" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <input type="text" class="form-control" disabled v-model="selectedUser.email">
                                    {{--                                            <select v-model="assignedCaller" placeholder="Select users...">--}}
                                    {{--                                                <option v-for="user in users" :value="user">@{{ user.name }}</option>--}}
                                    {{--                                            </select>--}}
                                </div>

                                {{--                                        <div class="col-md-1">--}}
                                {{--                                            Subject:--}}
                                {{--                                        </div>--}}
                            </div>
                            <div class="d-flex">
                                <div class="col-md-1">
                                    Subject:
                                </div>
                                <div class="col-md-11">
                                    <input type="text" v-model="subject" class="form-control" id="recipient-name">
                                </div>

                                {{--                                        <div class="col-md-1">--}}
                                {{--                                            To:--}}
                                {{--                                        </div>--}}
                            </div>
                        </div>
                        <div class="form-group">

                            {{--                                    <label for="message-text" class="col-form-label">Message:</label>--}}
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

    <div class="modal fade bd-example-modal-lg" id="multiEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <div class="d-flex mb-2">
                                <div class="col-md-1">
                                    To:
                                </div>
                                <div class="col-md-11">
                                    <span class="badge badge-pill badge-primary mr-2 mb-1" v-for="user in multiUsers" >@{{ user.email }}</span>
                                    {{--                                            <label v-for="user in multiUsers" for="">@{{ user.name }}</label>--}}
                                    {{--                                            <input type="text" class="form-control" disabled v-model="selectedUser.email">--}}
                                    {{--                                            <select v-model="assignedCaller" placeholder="Select users...">--}}
                                    {{--                                                <option v-for="user in users" :value="user">@{{ user.name }}</option>--}}
                                    {{--                                            </select>--}}
                                </div>

                                {{--                                        <div class="col-md-1">--}}
                                {{--                                            Subject:--}}
                                {{--                                        </div>--}}
                            </div>
                            <div class="d-flex">
                                <div class="col-md-1 mt-2">
                                    Subject:
                                </div>
                                <div class="col-md-11">
                                    <input type="text" v-model="subject" class="form-control">
                                </div>

                                {{--                                        <div class="col-md-1">--}}
                                {{--                                            To:--}}
                                {{--                                        </div>--}}
                            </div>
                        </div>
                        <div class="form-group">

                            {{--                                    <label for="message-text" class="col-form-label">Message:</label>--}}
                            <textarea type="text" name="editor2"></textarea>
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
                    <button @click.prevent="sendMultiEmail()" type="button" class="btn btn-primary">Send</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade bd-example-modal-md multiAssign" id="multiAssign" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Assign To Manager</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span class="badge badge-pill badge-primary mr-2 mb-1" v-for="user in multiUsers" >@{{ user.id }}</span>

                    <input name="assign_limit" v-model="assign_limit" class="form-control form-input">
                    <form>
                        <label for="managers">Choose a Manager:</label>

                        <select name="managers" v-model="managers" id="managers" @click="getmanagers" class="form-control inputTranparent form_input">

                            <option v-if="allmanagers" v-for="manager in allmanagers" :value="manager.id">@{{manager.name}}</option> 
                            <option :value="12345">None</option>
                        </select>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Discard</button>
                    <button @click.prevent="sendMultiAssign(1)" type="button" class="btn btn-primary">Send</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade bd-example-modal-md deleteComments_Leads" id="deleteComments_Leads" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Comments</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span class="badge badge-pill badge-primary mr-2 mb-1" v-for="user in multiUsers" >@{{ user.id }}</span>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Discard</button>
                    <button @click.prevent="deleteComments(0)" type="button" class="btn btn-primary">Send</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade bd-example-modal-md multiAssign" id="multiAssign_Leads" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Assign To Manager</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
{{--                    <span class="badge badge-pill badge-primary mr-2 mb-1" v-for="user in multiUsers" >@{{ user.name }}</span>--}}

                       <label for="assign_limit">How many leads do you want to assign?</label>
                       <input name="assign_limit" v-model="assign_limit" class="form-control form-input">

                         <br>

                        <label for="managers">Choose a Manager:</label>
                        <select name="managers" v-model="managers" id="managers" @click="getmanagers" class="form-control inputTranparent form_input">
                            <option v-if="allmanagers" v-for="mng in allmanagers" :value="mng.id">@{{ mng.name }}</option>
                            <option :value="12345">None</option>
                        </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Discard</button>
                    <button @click.prevent="sendMultiAssign(0)" type="button" class="btn btn-primary">Send</button>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade bd-example-modal-m" id="registrationEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-m" role="document">
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
                            <div class="d-flex mb-2">
                                <div class="col-md-1">
                                    To:
                                </div>
                                <div class="form-group row">
                                    <div class="col-8 centered">
                                        <select v-model="user" @click="getUsers()" class="form-control text-capitalize" aria-describedby="addon-right" type="text">
                                            <option selected v-if="user" :value="user">@{{ user.name }}</option>
                                            <option v-for="user in users" :value="user">@{{ user.name }}</option>
                                        </select>
                                    </div>
                                </div>

                                {{--                                        <div class="col-md-1">--}}
                                {{--                                            Subject:--}}
                                {{--                                        </div>--}}
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Discard</button>
                    <button @click.prevent="sendRegistrationEmail()" type="button" class="btn btn-primary">Send</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="creditsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-notify modal-success" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->

                <div class="modal-header">
                    <p class="heading lead">Credit</p>

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
                            <select v-model="user" @click="getUsers()" class="form-control text-capitalize" aria-describedby="addon-right" type="text">
                                <option v-for="user in users" :value="user">@{{ user.name }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-8 centered">
                            <input v-model="user.mt4_account" class="form-control" type="text" required="" name="mt4_acc" placeholder="MT4 Account">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-8 centered">
                            <input v-model="user.promo_amount" class="form-control" type="text" required="" name="amount" placeholder="Amount">
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
                        <a @click="submitPromo()" type="submit" class="btn btn-success">CONFIRM<i class="far fa-gem ml-1 text-white"></i></a>
                    </div>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>

    <div v-if="selectedUser" class="modal right fade" :id="getModalId()" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <table class="table transactionsTable">

                    <thead>

                    <h4 style="text-align: center;"> User Documents </h4>

                    <hr>

                    </thead>
                    <tbody>

                    <tr v-if="selectedUser.uploads" v-for="upload in selectedUser.uploads" >
                        <td>@{{ upload.filename }}</td>
                        <td><a class="btn btn-dark btn-lg" :href="'{{url('files/')}}/'+upload.id"> ↓ Download </td>

                    </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>


 <div class="modal fade" id="newManager" tabindex="-1" role="dialog" aria-labelledby="newManager"
    aria-hidden="true">
   <div class="modal-dialog modal-notify modal-success" role="document">
       <!--Content-->
       <div class="modal-content">
           <!--Header-->

           <div class="modal-header">
               <p class="heading lead">Create New</p>

               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true" class="white-text">&times;</span>
               </button>
           </div>
         
           <div>
               <div class="form-group row">
                   <div class="col-8 centered">
                       <input v-model="new_manager.name" class="form-control" type="text" required="" name="mt4_acc" placeholder="Full Name">
                   </div>
               </div>

               <div class="form-group row">
                   <div class="col-8 centered">
                       <select v-model="new_manager.account_id" class="form-control text-capitalize" aria-describedby="addon-right" type="text">
                           <option value="manager">Manager</option>
                           <option value="teamleader">TeamLeader</option>
                           <option value="officemanager">OfficeManager</option>
                           <option value="customer_service">Customer Service</option>
                           <option value="caposala">CapoSala</option>
                           <option value="affiliator">Affiliator</option>
                        </select>
                   </div>
               </div>


               <div class="form-group row">
                   <div class="col-8 centered">
                       <input v-model="new_manager.email" class="form-control" type="text" required="" name="amount" placeholder="Email">
                   </div>
               </div>

               <div class="form-group row">
                   <div class="col-8 centered">
                       <input v-model="new_manager.password" class="form-control" type="text" required="" name="description" placeholder="Password">
                   </div>
               </div>


            <div v-if="new_manager.account_id==='caposala'" class="form-group row">
                <div class="col-8 centered">
                    <select v-model="new_manager.desk" class="form-control text-capitalize" id="caposala_desks" aria-describedby="addon-right" id="" type="text">
                        <option value="italy">Italy</option>
                        <option value="greece">Greece</option>
                        <option value="uk">UK</option>
                        <option value="uk">UK</option>
                        <option value="spain">Spain</option>
                        <option value="germany">Germany</option>
                     </select>
                </div>
            </div>

            <div v-else class="form-group row">
                <div class="col-8 centered">
                    <select v-model="new_manager.manager_desk" class="form-control text-capitalize" aria-describedby="addon-right" type="text">
                        <option value="1">Italy</option>
                        <option value="2">Greece</option>
                        <option value="5">UK</option>
                        <option value="4">Spain</option>
                        <option value="3">Germany</option>
                     </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-8 centered">
                    <select v-model="new_manager.departament" class="form-control text-capitalize" aria-describedby="addon-right" type="text">
                        <option value="Convert">Convert</option>
                        <option value="Retention">Retention</option>
                     </select>
                </div>
            </div>

               <div class="form-group row">
                <div class="col-8 centered">
                    <input v-model="new_manager.promo_code" class="form-control" type="text" required="" name="description" placeholder="Promo">
                </div>
                </div>
            

               <!--Footer-->
               <div class="modal-footer justify-content-center">
                   <span @click="createNewMng" type="submit" class="btn btn-success">CONFIRM<i class="far fa-gem ml-1 text-white"></i></span>
               </div>
           </div>
       </div>
       <!--/.Content-->
   </div>
</div>



<div class="modal fade" id="createLead" tabindex="-1" role="dialog" aria-labelledby="createLead"
aria-hidden="true">
<div class="modal-dialog modal-notify modal-success" role="document">
   <!--Content-->
   <div class="modal-content">
       <!--Header-->

       <div class="modal-header">
           <p class="heading lead">Create New Lead</p>

           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true" class="white-text">&times;</span>
           </button>
       </div>
     
       <div>
        
        <div class="form-group row mt-5">
              <div class="col-8 centered">
                   <input v-model="new_lead.first_name" class="form-control" type="text" required="" name="" placeholder="First Name">
              </div>
        </div>

        <div class="form-group row">
            <div class="col-8 centered">
                <input v-model="new_lead.last_name" class="form-control" type="text" required="" name="" placeholder="Last Name">
            </div>
        </div>


        <div class="form-group row">
            <div class="col-8 centered">
                <input v-model="new_lead.phone" class="form-control" type="text" required="" name="" placeholder="Phone">
            </div>
        </div>


        <div class="form-group row">
            <div class="col-8 centered">
                <input v-model="new_lead.email" class="form-control" type="text" required="" name="" placeholder="Email">
            </div>
        </div>

     
      
        <div class="form-group row">
            <div class="col-8 centered">
                <select v-model="new_lead.country" class="form-control text-capitalize" aria-describedby="addon-right" type="text">
                    <option value="italy">Italy</option>
                    <option value="greece">Greece</option>
                    <option value="uk">UK</option>
                    <option value="spain">Spain</option>
                    <option value="germany">Germany</option>
                 </select>
            </div>
        </div>


           <div class="form-group row">
            <div class="col-8 centered">
                <input v-model="new_lead.source" class="form-control" type="text" required="" name="description" placeholder="Source">
            </div>
            </div>


            <div class="form-group row">
                <div class="col-8 centered">
            <select name="managers" v-model="new_lead.manager" @click="getmanagers" class="form-control inputTranparent form_input">

                <option v-if="allmanagers" v-for="manager in allmanagers" :value="manager.id">@{{manager.name}}</option> 
                <option :value="12345">None</option>
            </select>

        </div>
    </div>
        

           <!--Footer-->
           <div class="modal-footer justify-content-center">
               <span @click="createLead" type="submit" class="btn btn-success">CONFIRM<i class="far fa-gem ml-1 text-white"></i></span>
           </div>
       </div>
   </div>
   <!--/.Content-->
</div>
</div>


    <div v-if="selectedUser" class="modal right fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <!--Header-->

                <div class="modal-header">
                    <p class="heading lead">Credit</p>

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
                            {{--                                    <input class="form-control" type="text" disabled v-model="user_id">--}}
                            <select v-model="user_id" class="form-control text-capitalize" aria-describedby="addon-right" type="text">
                                <option selected :value="selectedUser.id">@{{ selectedUser.name }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-8 centered">
                            <input v-model="selectedUser.mt4_account" class="form-control" type="text" required="" name="mt4_acc" placeholder="MT4 Account">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-8 centered">
                            <input v-model="selectedUser.promo_amount" class="form-control" type="text" required="" name="amount" placeholder="Amount">
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
                        <a @click="submitPromo()" type="submit" class="btn btn-success">CONFIRM<i class="far fa-gem ml-1 text-white"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endpush

@push('user_style')
    <style>
        .usersTable input {
            border-radius: 5px;
            border-top: 0;
            border: 1px outset #80767630;
        }

        a{color: #0650a0;}

        .offline {
            color: #0650a0!important;
        }

        body.night a {color: #e6c9a1;}

        body.night .offline {color: #e6c9a1!important;}

        a.promo_wish:visited {color: red!important;}

        table.dataTable tbody>tr.selected, table.dataTable tbody>tr>.selected {
            background-color: #00396b!important;
        }


        div.dataTables_wrapper div.dataTables_filter input {
            margin-left: 0.5em;
            display: inline-block;
            width: auto;
            border: 1px solid #0650a0;
        }

        .dt-buttons{opacity:0;transition: .5s;}
        .dt-buttons:hover{opacity:1;}

        .btn-dark {
            background-color: #0650a0;
            border: 1px solid #0650a0;
            color: #ffffff;
        }

        .table-padded {
            border-collapse: separate;
            border-spacing: 0 .35rem!important;

        }

        tr{background: #f3f6f94a;transition: .3s;font-weight: 900;}
        @media only screen and (min-width:2000px){

            font-weight:17px;
        }

        body.night tr{background: #2b44bf42;}

        body.night .copyPassIcon {
            color: #e6c9a1;
            cursor: pointer;
        }

        .copyPassIcon {color: #0650a0;}


        .table td, .table th {border-top:0!important;}
        thead tr{background: transparent;border-spacing: 0!important;}
        .table > tbody > tr > td, .table > tfoot > tr > td, .table > thead > tr > td {
            padding: 1.5rem 1rem;
        }


        tr:hover{box-shadow: 0 2px 7px rgba(120,130,140,0.3);}

        @media only screen and (min-width:2000px) {
            tr{font-size: 16px;}
        }


    </style>


    <link href="{{asset('/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{asset('/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.css"/>



@endpush

@push('user_scripts')

    <script src="{{asset('js/toastr.min.js')}}"></script>

    <!-- Required datatable js -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/cr-1.5.2/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Datatable init js -->
    <script src="{{asset('pages/datatables.init.js')}}"></script>

    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.3/axios.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#checkField").click(function(event) {
                event.preventDefault();
            });
        });


        function myFunction(index) {
            var copyText = document.getElementById("myInput"+index);
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
        }

        $(document).ready(function(){
            $("[name='real_password']").focus(function(){
                this.type = "text";
            }).blur(function(){
                this.type = "real_password";
            })
        });

        var vm = new Vue({
            el: '#app',
            mounted: function () {
                console.log('it started');
                this.$nextTick(() => {

                  
                })

                
            },

            data: function () {
                return {
                    replyErrors:[],
                    spinVal:[],
                    withdrawVal:[],
                    managers:null,
                    allmanagers:[],
                    b_data:null,
                    real_user:null,
                    request_id:null,
                    assign_limit:null,
                    selected_status:null,
                    show_search:0,
                    real_pass:'',
                    user:{
                        id:null,
                        name:null,
                        mt4_account:null,
                    },

                    selectedUser:{
                    },
                    new_manager:{
                    name:null,
                    email:null,
                    password:null,  
                    promo_code:null,
                    account_id:null,
                    manager_desk:null,
                    desk:null,
                    departament:null,
                    },

                    new_lead:{
                    first_name:null,
                    last_name:null,
                    phone:null,  
                    email:null,
                    country:null,
                    source:null,
                    manager:null,
                    },

                    users:[],
                    user_id:null,
                    amount:null,
                    collateral:null,
                    currencyCode:'EUR',
                    mt4_account:null,
                    promo_amount:null,
                    full_name_bank:null,
                    depositype: 'bank',
                    type: 'positive',
                    email_transaction:null,
                    description:null,

                    sendTo:null,
                    content:null,
                    account:null,
                    subject:'',

                    checkB:{},
                    multiUsers:[],
                    checkBox:{},
                    htmlComposition:false,
                    enabledGeo:true,
                }
            },
            methods:{
                enableEditProfile(){
                    this.inputDisabled=false;
                },

                getUsers(){
                    let self = this;
                    axios.get('/get_users/').then(response => {
                        self.users = response.data;
                    });
                },

         

                createNewMng(){
                    let self = this;
                    axios.post('{{URL::to('/admin/create_new_manager')}}', {
                        name:self.new_manager.name,
                        email:self.new_manager.email,
                        password:self.new_manager.password,
                        account_id:self.new_manager.account_id,
                        promo_code:self.new_manager.promo_code,
                        desk:self.new_manager.desk,
                        manager_desk:self.new_manager.manager_desk,
                        departament:self.new_manager.departament,
                    }).then(function(response) {
                        toastr.success("User Created!", {
                                    positionClass: 'toast-bottom-right',
                                    containerId: 'toast-bottom-right'
                                });
                        $('#newManager').modal('hide');
                    })
                        .catch(function(error) {
                            toastr.error("Error creating user!", {
                                    positionClass: 'toast-bottom-right',
                                    containerId: 'toast-bottom-right'
                                });
                        });
                },


                
                createLead(){
                    let self = this;
                    axios.post('{{URL::to('/admin/createLead')}}', {
                        first_name:self.new_lead.first_name,
                        last_name:self.new_lead.last_name,
                        phone:self.new_lead.phone,
                        email:self.new_lead.email,
                        source:self.new_lead.source,
                        country:self.new_lead.country,
                        manager:self.new_lead.manager,
                    }).then(function(response) {
                        toastr.success("Lead Created!", {
                                    positionClass: 'toast-bottom-right',
                                    containerId: 'toast-bottom-right'
                                });
                        $('#createLead').modal('hide');
                    })
                        .catch(function(error) {
                            toastr.error("Error creating lead!", {
                                    positionClass: 'toast-bottom-right',
                                    containerId: 'toast-bottom-right'
                                });
                        });
                },
            
            

                set_active(user_id, val){
                    console.log(val);

                    var element=document.getElementById('activeSwitch'+user_id);
                    axios.post('{{URL::to('user_status')}}', {
                        user_id:user_id,
                        value:val,
                    }).then(function(response) {
                        console.log(response);
                    })
                        .catch(function(error) {
                            console.log(error);
                        });
                },

               
                getmanagers(){

                    axios.get('/get_managers/').then(response => {
                        this.allmanagers = response.data;
                    });
              
                },

                set_check_deposit(user_id, val){
                    console.log(val);

                    var element=document.getElementById('checkDeposit'+user_id);
                    axios.post('{{URL::to('set_check_deposit')}}', {
                        user_id:user_id,
                        value:val,
                    }).then(function(response) {
                        console.log(response);
                    })
                        .catch(function(error) {
                            console.log(error);
                        });
                },

                manager_leverage(user_id, val){
                    console.log(val);

                    var element=document.getElementById('leverageSwitch'+user_id);
                    axios.post('{{URL::to('manager_leverage')}}', {
                        user_id:user_id,
                        value:val,
                    }).then(function(response) {
                        console.log(response);
                    })
                        .catch(function(error) {
                            console.log(error);
                        });
                },

                view_password(user_id, val){
                    console.log(val);

                    var element=document.getElementById('switchPassword'+user_id);
                    axios.post('{{URL::to('view_password')}}', {
                        user_id:user_id,
                        value:val,
                    }).then(function(response) {
                        console.log(response);
                    })
                        .catch(function(error) {
                            console.log(error);
                        });
                },

                set_formation(user_id, val){
                    console.log(val);

                    var element=document.getElementById('activeFormation'+user_id);
                    axios.post('{{URL::to('user_formation')}}', {
                        user_id:user_id,
                        value:val,
                    }).then(function(response) {
                        console.log(response);
                    })
                        .catch(function(error) {
                            console.log(error);
                        });
                },
                changeAccount:function($user_test) {
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
                                user_id: $user_test,
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
                delete_transaction_log:function(transaction_id) {

                    let self=this;
                    console.log('im here');

                    self.replyErrors=[];
                    swal({
                        title: "Are you sure?",
                        text: "Once deleted, you won't be able to recover this transaction!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((result) => {
                        if (result) {
                            axios.post('{{URL::to('delete_transaction_log')}}', {
                                transaction_id:transaction_id,
                            }).then(function(response) {
                                console.log(response);
                                self.output=response.data;
                                window.location.href = '{{URL::to('admin/transactions/')}}'+'?msg='+response.data;

                            }).catch(function(error) {
                                // self.loading = false;
                                self.replyErrors = error.response.data.errors;
                                console.log(error.response.data);
                                {{--toastr.error("Error changing the password!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});--}}
                                {{--window.location.hash='{{URL::to('personal_info/')}}';--}}
                            });
                        }else{
                            //console.log(lead_id);
                        }
                    })
                },
                delete_request:function(request_id) {

                    let self=this;

                    self.replyErrors=[];
                    swal({
                        title: "Are you sure?",
                        text: "Once deleted, you won't be able to recover this user!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((result) => {
                        if (result) {
                            axios.post('{{URL::to('delete_request')}}', {
                                request_id:request_id,
                            }).then(function(response) {
                                console.log(response);
                                self.output=response.data;
                                toastr.success("Request deleted!", {
                                    positionClass: 'toast-bottom-right',
                                    containerId: 'toast-bottom-right'
                                });
                                window.location.reload();

                            }).catch(function(error) {
                                // self.loading = false;
                                self.replyErrors = error.response.data.errors;
                                console.log(error.response.data);
                            });
                        }else{
                        }
                    })
                },

                submitDeposit(){
                    let self=this;
                    self.replyErrors=[];

                    axios.post('{{URL::to('save_bank_deposit')}}', {
                        user_id:self.user.id,
                        amount:self.amount,
                        mt4_account: self.user.mt4_account,
                        currencyCode: self.currencyCode,
                        collateral: self.collateral,
                        description:self.description,
                        type: self.type,
                        depositype:self.depositype,
                    }).then(function(response) {
                        console.log(response.data);
                        self.output=response.data;
                        toastr.success("Deposit inserted successfully!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
                        {{--window.location.href = '{{URL::to('personal_info/')}}'+'?msg='+response.data;--}}
                        $('#depositModal').modal('hide');

                        self.user_id=null;
                        self.user.id=null;
                        self.user.mt4_account=null;
                        self.user.name=null;
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

                    axios.post('{{URL::to('save_collateral')}}', {
                        user_id: self.user.id,
                        amount: self.amount,
                        type: self.type,
                        description: self.description,
                        mt4_account: self.user.mt4_account,
                    }).then(function (response) {
                        // console.log(response.data);
                        // self.output = response.data;
                        toastr.success("Collateral inserted successfully!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                        self.user.id=null;
                        self.user.mt4_account=null;
                        self.user.name=null;
                        self.user_id=null;
                        self.amount=null;
                        $('#collateralModal').modal('hide');

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
                        {{--window.location.href = '{{URL::to('personal_info/')}}'+'?msg='+response.data;--}}
                        {{--    window.location.href = '{{URL::to('crm/collaterals/')}}';--}}

                    }).catch(function (error) {
                        self.replyErrors = error.response.data.errors;
                        toastr.error("Error saving the collateral!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                    });
                },

                delete_user:function(user_id) {

                    let self=this;

                    self.replyErrors=[];
                    swal({
                        title: "Are you sure?",
                        text: "Once deleted, you won't be able to recover this user!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((result) => {
                        if (result) {
                            axios.post('{{URL::to('delete_user')}}', {
                                user_id:user_id,
                            }).then(function(response) {
                                console.log(response);
                                self.output=response.data;
                                toastr.success("User deleted!", {
                                    positionClass: 'toast-bottom-right',
                                    containerId: 'toast-bottom-right'
                                });
                                window.location.reload();

                            }).catch(function(error) {
                                // self.loading = false;
                                self.replyErrors = error.response.data.errors;
                                console.log(error.response.data);
                            });
                        }else{
                        }
                    })
                },
                delete_agent:function(user_id) {

                    let self=this;

                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you won't be able to recover this user!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((result) => {
                    if (result) {
                        axios.post('{{URL::to('delete_agent')}}', {
                            user_id:user_id,
                        }).then(function(response) {
                            self.output=response.data;
                            toastr.success("User deleted!", {
                                positionClass: 'toast-bottom-right',
                                containerId: 'toast-bottom-right'
                            });
                            window.location.reload();
                        
                        }).catch(function(error) {
                            // self.loading = false;
                            self.replyErrors = error.response.data.errors;
                            console.log(error.response.data);
                        });
                    }else{
                    }
                })
                },

                getModalId(){
                    var output;
                    if (this.selectedUser && this.selectedUser.id) {
                        output = 'modal'+this.selectedUser.id;
                        console.log(output)

                        return output;
                    }
                    else
                        output = 'modal'+0;
                    return output;
                },

                openModal(user){
                    console.log(user.id);
                    this.selectedUser=user;

                    console.log(this.selectedUser);
                    var dialog = document.getElementById('modal'+user.id);
                    console.log(dialog);
                    dialog.showModal();
                },

                copyToClipboard(elem) {
                    this.real_pass.select();
                    document.execCommand('copy');
                },

                checkUser(user, e){

                    if (e.target && e.target.checked) {
                        this.user=user;
                        this.multiUsers.push(user);
                    }
                    else {
                        var index = this.multiUsers.findIndex(p => p.id == user.id);
                        this.multiUsers.splice(index, 1);
                        this.user.id=null;
                        this.user.name=null;
                        this.user.mt4_account=null;
                    }
                },

                checkUser_test(user, mt4, e,){
                    // console.log(this.multiUsers);
                    if (e.target && e.target.checked) {
                        this.user.id=user;
                        // this.user.name=name;
                        this.user.mt4_account=mt4;
                        this.multiUsers.push(user);
                        console.log(this.multiUsers);

                    }
                    else {
                        var index = this.multiUsers.findIndex(p => p == user);
                        this.multiUsers.splice(index, 1);
                        console.log(this.multiUsers);
                        this.user.id=null;
                        // this.user.name=null;
                        this.user.mt4_account=null;
                    }
                },

                checkAll(e){
                    if (e.target && e.target.checked) {
                        this.multiUsers = this.users;
                        console.log(this.multiUsers);
                    }
                    else {
                        this.multiUsers=[];
                    }
                },

                checkAll_new(e){
                    if (e.target && e.target.checked) {
                        this.multiUsers = this.b_data;
                        console.log(this.multiUsers);
                    }
                    else {
                        this.multiUsers=[];
                        console.log(this.multiUsers);
                    }
                },
                delete_collateral:function(collateral_id) {

                    let self=this;
                    console.log('im here');

                    self.replyErrors=[];
                    swal({
                        title: "Are you sure?",
                        text: "Once deleted, you won't be able to recover this credit!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((result) => {
                        if (result) {
                            axios.post('{{URL::to('delete_collateral')}}', {
                                collateral_id:collateral_id,
                            }).then(function(response) {
                                console.log(response);
                                self.output=response.data;
                                window.location.href = '{{URL::to('admin/collaterals/')}}';

                            }).catch(function(error) {
                                // self.loading = false;
                                self.replyErrors = error.response.data.errors;
                                console.log(error.response.data);
                                {{--toastr.error("Error changing the password!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});--}}
                                {{--window.location.hash='{{URL::to('personal_info/')}}';--}}
                            });
                        }else{
                            //console.log(lead_id);
                        }
                    })
                },
                delete_credit:function(credit_id) {

                    let self=this;
                    console.log('im here');

                    self.replyErrors=[];
                    swal({
                        title: "Are you sure?",
                        text: "Once deleted, you won't be able to recover this credit!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((result) => {
                        if (result) {
                            axios.post('{{URL::to('delete_credit')}}', {
                                credit_id:credit_id,
                            }).then(function(response) {
                                console.log(response);
                                self.output=response.data;
                                window.location.href = '{{URL::to('admin/credit/')}}'+'?msg='+response.data;

                            }).catch(function(error) {
                                // self.loading = false;
                                self.replyErrors = error.response.data.errors;
                                console.log(error.response.data);
                                {{--toastr.error("Error changing the password!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});--}}
                                {{--window.location.hash='{{URL::to('personal_info/')}}';--}}
                            });
                        }else{
                            //console.log(lead_id);
                        }
                    })
                },
                submitEmail(){
                    let self=this;
                    self.replyErrors=[];
                    axios.post('{{URL::to('send_email')}}', {

                        user_id:self.selectedUser.id,
                        email:self.selectedUser.email,
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

                sendMultiEmail(){


                    let self=this;
                    self.replyErrors=[];
                    if (self.multiUsers.length) {
                        axios.post('{{URL::to('send_multi_email')}}', {

                            users: self.multiUsers,
                            subject: self.subject,
                            content: CKEDITOR.instances.editor2.getData(),
                            composition: self.htmlComposition,

                        }).then(function (response) {
                            {{--window.location.href = '{{URL::to('personal_info/')}}'+'?msg='+response.data;--}}
                            toastr.success("Successfully sent!", {
                                positionClass: 'toast-bottom-right',
                                containerId: 'toast-bottom-right'
                            });
                            self.multiUsers=[];

                            $('#multiEmail').modal('hide');

                        }).catch(function (error) {
                            self.replyErrors = error.response.data.errors;
                            toastr.error("Error sending email!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});

                            console.log(error.response.data);
                        });
                    }
                    else {
                        toastr.error("No users selected!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                    }
                },


                sendMultiAssign(isrealuser){


                    let self=this;
                    self.replyErrors=[];
                    if (self.multiUsers.length) {
                        axios.post('{{URL::to('/assign_multi')}}', {

                            users: self.multiUsers,
                            nr : self.multiUsers.length,
                            managers:self.managers,
                            real_user:isrealuser,
                            assign_limit: self.assign_limit,

                        }).then(function (response) {
                            toastr.success("Successfully sent!", {
                                positionClass: 'toast-bottom-right',
                                containerId: 'toast-bottom-right'
                            });
                            self.multiUsers=[];

                            $('.multiAssign').modal('hide');

                        }).catch(function (error) {

                            toastr.error("Error sending email!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
                            // console.log(users);
                            console.log(error);
                        });
                    }
                    else {
                        toastr.error("No users selected!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                    }
                },

                deleteComments(isrealuser){


                    let self=this;
                    self.replyErrors=[];
                    if (self.multiUsers.length) {
                        axios.post('{{URL::to('/delete_multi_comments')}}', {

                            users: self.multiUsers,
                            nr : self.multiUsers.length,
                            real_user:isrealuser,

                        }).then(function (response) {
                            toastr.success("Successfully sent!", {
                                positionClass: 'toast-bottom-right',
                                containerId: 'toast-bottom-right'
                            });
                            self.multiUsers=[];

                            $('.multiAssign').modal('hide');

                        }).catch(function (error) {

                            toastr.error("Error sending email!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
                            // console.log(users);
                            console.log(error);
                        });
                    }
                    else {
                        toastr.error("No users selected!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                    }
                },
                multiStatusChange(isrealuser){


                    let self=this;
                    self.replyErrors=[];
                    if (self.multiUsers.length) {
                        axios.post('{{URL::to('admin/change_status_multi')}}', {

                            users: self.multiUsers,
                            selected_status:self.selected_status,
                            real_user:isrealuser,
                            assign_limit: self.assign_limit,

                        }).then(function (response) {
                            {{--window.location.href = '{{URL::to('personal_info/')}}'+'?msg='+response.data;--}}
                            toastr.success("Successfully sent!", {
                                positionClass: 'toast-bottom-right',
                                containerId: 'toast-bottom-right'
                            });
                            console.log(self.multiUsers);
                            console.log(self.managers);
                            self.multiUsers=[];

                            $('#multiChange_status').modal('hide');

                        }).catch(function (error) {

                            toastr.error("Error sending email!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
                            // console.log(users);
                            console.log(error);
                        });
                    }
                    else {
                        toastr.error("No users selected!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                    }
                },
                multiDelete(isrealuser){


                    let self=this;
                    self.replyErrors=[];
                    if (self.multiUsers.length) {
                        axios.post('{{URL::to('admin/delete_multi')}}', {

                            users: self.multiUsers,
                            real_user:isrealuser,
                            assign_limit: self.assign_limit,

                        }).then(function (response) {
                            {{--window.location.href = '{{URL::to('personal_info/')}}'+'?msg='+response.data;--}}
                            toastr.success("Successfully sent!", {
                                positionClass: 'toast-bottom-right',
                                containerId: 'toast-bottom-right'
                            });
                            console.log(self.multiUsers);
                            console.log(self.managers);
                            self.multiUsers=[];

                            $('#multiDelete').modal('hide');

                        }).catch(function (error) {

                            toastr.error("Error sending email!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});
                            // console.log(users);
                            console.log(error);
                        });
                    }
                    else {
                        toastr.error("No users selected!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                    }
                },

                sendRegistrationEmail(){
                    // console.log(self.user);
                    let self=this;
                    self.replyErrors=[];
                        axios.post('{{URL::to('send_registration_email')}}', {

                            users: self.user,

                        }).then(function (response) {
                            {{--window.location.href = '{{URL::to('personal_info/')}}'+'?msg='+response.data;--}}
                            toastr.success("Successfully sent!", {
                                positionClass: 'toast-bottom-right',
                                containerId: 'toast-bottom-right'
                            });
                            console.log(response.data);
                            $('#registrationEmail').modal('hide');

                        }).catch(function (error) {
                            self.replyErrors = error.response.data.errors;
                            toastr.error("Error sending email!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});

                            console.log(error.response.data);
                        });

                },

                selectUser(user){
                    this.selectedUser=user;
                    this.user=this.selectedUser;
                    // $('#emailModal').modal('show');
                },


                submitPromo() {
                    let self = this;
                    self.replyErrors = [];

                    axios.post('{{URL::to('save_credit')}}', {
                        user_id: self.user.id,
                        amount: self.user.promo_amount,
                        type: self.type,
                        description: self.description,
                        mt4_account: self.user.mt4_account,
                    }).then(function (response) {
                        toastr.success("Promo inserted successfully!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                        self.user.id=null;
                        self.user.name=null;
                        self.user.mt4_account=null;
                        $('#creditsModal').modal('hide');
                        window.location.href = '{{URL::to('admin/users_promo/')}}';

                    }).catch(function (error) {
                        // self.loading = false;
                        self.replyErrors = error.response.data.errors;
                        console.log(error.response.data);
                        toastr.error("Error saving the promo!", {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                    });
                },

                updateGeoIP(){
                    let self=this;

                    self.enabledGeo=false;

                    // console.log('im clicked');
                    axios.get('{{URL::to('update_geo_ip')}}')
                        .then(function (response) {
                            console.log(response);
                        {{--window.location.href = '{{URL::to('personal_info/')}}'+'?msg='+response.data;--}}
                        toastr.success("Successfully updated ip info!", {
                                positionClass: 'toast-bottom-right',
                                containerId: 'toast-bottom-right'
                            });

                        }).catch(function (error) {
                            toastr.error("Error updating ip info!", {positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right'});

                            self.enabledGeo=true;

                            console.log(error.response.data);
                        });
                }
            }
        })
    </script>

    <script>

        $('#select-all').click(function(event) {
            if(this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;
                });
            }
        });
    </script>


@endpush

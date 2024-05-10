@extends('layouts.dashboard')

@section('style')
    <style>

body{
     background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0,0,0,0.2)), url({{asset('images/wall_st-min.jpg')}});background-size:cover;background-repeat:no-repeat; "
    }


  .stage .btn {
  box-sizing: border-box;
  display: inline-block;
  text-align: left;
  white-space: nowrap;
  text-decoration: none;
  vertical-align: middle;
  touch-action: manipulation;
  cursor: pointer;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  border: 1px solid #ddd;
  padding: 4px 8px;
  margin: 5px auto;
  border-radius: 4px;
  color: #fff;
  fill: #fff;
  background: #000;
  line-height: 1em;
  min-width: 190px;
  height: 45px;
  transition: 0.2s ease-out;
  box-shadow: 0 1px 2px rgba(0,0,0,0.2);
  -webkit-tap-highlight-color: rgba(0,0,0,0);
  font-family: $btn-font;
  font-weight: 500;
  text-rendering: optimizeLegibility;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  -moz-font-feature-settings: 'liga', 'kern';
}
.stage .btn:hover,
.btn:focus {
  background: #111;
  color: #fff;
  fill: #fff;
  border-color: #fff;
  transform: scale(1.01) translate3d(0, -1px, 0);
  box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}
.stage .btn:active {
  outline: 0;
  background: #353535;
  transition: none;
}
.stage .btn__icon,
.stage .btn__text,
.stage .btn__storename {
  display: inline-block;
  vertical-align: top;
}
.stage .btn__icon {
  width: 30px;
  height: 30px;
  margin-right: 5px;
  margin-top: 2px;
}
.stage .btn__icon--amazon {
  transform: scale(0.85);
}
.stage .btn__text {
  letter-spacing: 0.08em;
  margin-top: -0.1em;
  font-size: 10px;
}
.stage .btn__storename {
  display: block;
  margin-left: 38px;
  margin-top: -17px;
  font-size: 22px;
  letter-spacing: -0.03em;
}
.stage .btn--small {
  padding: 2px 8px;
  min-width: 118.75px;
  height: 24px;
  border-radius: 3px;
}
.stage .btn--small .btn__icon {
  width: 16px;
  height: 16px;
  margin: 1px 2px 0 0;
}
.stage .btn--small .btn__text {
  display: none;
}
.stage .btn--small .btn__storename {
  font-size: 12px;
  display: inline-block;
  margin: 0;
  vertical-align: middle;
}

.stage > h1 {
  margin-top: -5%;
  margin-bottom: 5%;
  font-family: Avenir, Trebuchet, 'Trebuchet MS', sans-serif;
  font-size: 7vw;
  font-weight: 400;
  color: #c67d0c;
}

.mt4-list li {
    padding-bottom: 5px;
}


@media (min-width: 50em) {
  .stage > h1 {
    font-size: 5vw;
  }
}

@media only screen and (min-width: 1400px) {
    .support-card{
        padding: 70px 60px;
    }
}


body.night .card_dashboard{
    background: #1d375299!important;
}

.mini-stat .mini-stat-img{
    background-image: url({{asset('/images/bg-1.png')}});
}

    </style>
    <link rel="stylesheet" href="{{asset('css/toastr.css')}}">
    <link href="{{ asset('plugins/c3/c3.min.css')}}" rel="stylesheet" type="text/css"  />
@endsection
@section('content')

    <div class="page-content-wrapper " id="app">

        <div class="container-fluid">


            
            <br>

            @if (session('status'))
            <div class="alert alert-success" style="margin: auto; width: 50%;">
                
               <h5 style="text-align: center; color:#2f2a2a;"> {{ session('status') }} </h5>
            </div>
        @endif

            <div class="row">
                <div class="card col-sm-8" style="margin:2rem auto; padding:3rem 3rem">


                 
                  <h3>
                    Dear {{logged_in()->name}} !
                 </h3>  
                 <p style="color:#b3b1b1">  
                    Welcome to your personal account with BITFEX LIMITED. We are glad that you have chosen us and we wish 
                     to have a long and succesful collaboration. From here you can check your Balance and Credit, add Deposits, Withdraw funds, receieve Signals & Notifications 
                     and access Trading Platform.
                  </p>
                </div>
            </div>
            <!-- end row -->


            <br>

                @if(hasanyguard(['starter']))

            <div class="row">
        
                    <div class="col-xl-4 col-md-4">
                        <div class="card mini-stat bg-primary">
                            <div class="card-body mini-stat-img">
                                <div class="mini-stat-icon d-flex justify-content-end">
                                    <img src="{{asset('images/accno.png')}}" alt="" style="width: 55px;">
                                </div>
                                <div class="">
                                    <h4 class="text-uppercase mb-3 font-size-16" style="color: #beab72">Account Number</h4>
                                    <h1 class="mb-4 text-white font-weight-lighter">
                                    {{logged_in()->mt4_account}}
                                    </h1>   
                                </div>
                            </div>
                          </div>
                        </div>


                    <div class="col-xl-4 col-md-4">
                        <div class="card mini-stat bg-primary">
                            <div class="card-body mini-stat-img">
                                <div class="mini-stat-icon d-flex justify-content-end">
                                    <img src="{{asset('images/balance.png')}}" alt="" style="width: 55px;">
                                </div>
                                <div class="">
                                    <h4 class="text-uppercase mb-3 font-size-16" style="color: #beab72">Balance</h4>
                                    <h1 class="mb-4 text-white font-weight-lighter">
                                
                                        {{number_format(((logged_in()->deposits->where('type','positive')->sum('source_amount'))-(logged_in()->deposits->where('type','negative')->sum('source_amount'))), 2, '.', '')}}

                                    </h1>
                                    {{-- <span class="badge bg-info"> +11% </span> <span class="ms-2">From previous period</span> --}}
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-xl-4 col-md-4">
                            <div class="card mini-stat bg-primary">
                                <div class="card-body mini-stat-img">
                                    <div class="mini-stat-icon d-flex justify-content-end">
                                        <img src="{{asset('images/credit.png')}}" alt="" style="width: 55px;">
                                    </div>
                                    <div>
                                        <h4 class="text-uppercase mb-3 font-size-16" style="color: #beab72">Credit</h4>
                                        <h1 class="mb-4 text-white font-weight-lighter">
                                        {{number_format(((logged_in()->deposits->where('type','positive')->sum('source_amount'))-(logged_in()->deposits->where('type','negative')->sum('source_amount'))), 2, '.', '')}}
                                        </h1>
                                        {{-- <span class="badge bg-info"> +11% </span> <span class="ms-2">From previous period</span> --}}
                                    </div>                                
                                </div>
                              </div>
                            </div>
            </div>


            @if(logged_in()->id===410)

                <br>
            <div class="row">
        
                <div class="col-xl-4 col-md-4">
                    <div class="card mini-stat bg-primary">
                        <div class="card-body mini-stat-img">
                            <div class="mini-stat-icon d-flex justify-content-end">
                                <img src="{{asset('images/accno.png')}}" alt="" style="width: 55px;">
                            </div>
                            <div class="">
                                <h4 class="text-uppercase mb-3 font-size-16" style="color: #beab72">Account Number</h4>
                                <h1 class="mb-4 text-white font-weight-lighter">
                                {{logged_in()->scd_account}}
                                </h1>   
                            </div>
                        </div>
                      </div>
                    </div>


                <div class="col-xl-4 col-md-4">
                    <div class="card mini-stat bg-primary">
                        <div class="card-body mini-stat-img">
                            <div class="mini-stat-icon d-flex justify-content-end">
                                <img src="{{asset('images/balance.png')}}" alt="" style="width: 55px;">
                            </div>
                            <div class="">
                                <h4 class="text-uppercase mb-3 font-size-16" style="color: #beab72">Balance</h4>
                                <h1 class="mb-4 text-white font-weight-lighter">
                               
                                </h1>
                                {{-- <span class="badge bg-info"> +11% </span> <span class="ms-2">From previous period</span> --}}
                            </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-xl-4 col-md-4">
                        <div class="card mini-stat bg-primary">
                            <div class="card-body mini-stat-img">
                                <div class="mini-stat-icon d-flex justify-content-end">
                                    <img src="{{asset('images/credit.png')}}" alt="" style="width: 55px;">
                                </div>
                                <div>
                                    <h4 class="text-uppercase mb-3 font-size-16" style="color: #beab72">Credit</h4>
                                    <h1 class="mb-4 text-white font-weight-lighter">
                                   
                                    </h1>
                                    {{-- <span class="badge bg-info"> +11% </span> <span class="ms-2">From previous period</span> --}}
                                </div>                                
                            </div>
                          </div>
                        </div>
        </div>

        <br>

          
            @endif
            
                @endif

               <br>

            <!-- end row -->

            <div class="row cards-row">

                <div class="col-xl-8 col-md-8">
                    <div class="card" style="height: 100%; display: flex; justify-content: center;">
                   
                 <div style="display: flex; align-items: center;">

                    <img style="width: 30%;" src="{{asset('images/dashboard.png')}}">  
                      
                    <p> 
                    <ul class="elementor-icon-list-items mt4-list" style="list-style: none">
                    <li class="elementor-icon-list-item">
                    <span  target="_blank" rel="noopener"> <span class="elementor-icon-list-icon">
                     <i aria-hidden="true" class="fas fa-arrow-right"></i> </span>
                     <span class="elementor-icon-list-text">Double click "Login to Webtrader"</span>
                    </span>
                    <br>
                    OR 
                    <br>
                    <span  target="_blank" rel="noopener"> <span class="elementor-icon-list-icon">
                    <i aria-hidden="true" class="fas fa-arrow-right"></i> </span>
                    <span class="elementor-icon-list-text">Download the Terminal Software by clicking here</span>
                    </span>
                    </li>
                    <li class="elementor-icon-list-item">
                    <span class="elementor-icon-list-icon">
                    <i aria-hidden="true" class="fas fa-arrow-right"></i> </span>
                    <span class="elementor-icon-list-text">Run the download file (.exe)</span>
                    </li>
                    <li class="elementor-icon-list-item">
                    <span class="elementor-icon-list-icon">
                    <i aria-hidden="true" class="fas fa-arrow-right"></i> </span>
                    <span class="elementor-icon-list-text">Install on to your machine, once installed run the application</span>
                    </li>
                    <li class="elementor-icon-list-item">
                    <span class="elementor-icon-list-icon">
                    <i aria-hidden="true" class="fas fa-arrow-right"></i> </span>
                    <span class="elementor-icon-list-text">After launch, enter your details to login to your demo / live account</span>
                    </li>
                    </ul>

                    </p>

                </div>          

                    <div class="stage">
 
    
 <p style="text-align: center">

  


     <a class="btn btn--ios" v-if="tmp" target="_blank" :href="'">
        <i class="fas fa-globe btn__icon"></i>
        <span class="btn__text">Login </span> 
        <span class="btn__storename">Webtrader</span>
     <a class="btn btn--ios"  v-else @click="autologin">
        <i class="fas fa-globe btn__icon"></i>
         <span class="btn__text">Login </span> 
         <span class="btn__storename">Webtrader</span>
     </a>
     {{-- <span class="btn btn--ios" @click="autologin">
        <i class="fas fa-globe btn__icon"></i>
         <span class="btn__text">Login </span> 
         <span class="btn__storename">Webtrader</span>
     </span> --}}



     <!-- <a class="btn btn--ios" href="https://apps.apple.com/us/app/metatrader-4/id496212596">
         <svg class="btn__icon btn__icon--apple" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
         preserveAspectRatio="xMidYMid"
         viewBox="0 0 20 20">
             <path fill-rule="evenodd" clip-rule="evenodd" d="M17.5640259,13.8623047
     c-0.4133301,0.9155273-0.6115723,1.3251343-1.1437988,2.1346436c-0.7424927,1.1303711-1.7894897,2.5380249-3.086853,2.5500488
     c-1.1524048,0.0109253-1.4483032-0.749939-3.0129395-0.741333c-1.5640259,0.008606-1.8909302,0.755127-3.0438843,0.7442017
     c-1.296814-0.0120239-2.2891235-1.2833252-3.0321655-2.4136963c-2.0770874-3.1607666-2.2941895-6.8709106-1.0131836-8.8428955
     c0.9106445-1.4013062,2.3466187-2.2217407,3.6970215-2.2217407c1.375,0,2.239502,0.7539673,3.3761597,0.7539673
     c1.1028442,0,1.7749023-0.755127,3.3641357-0.755127c1.201416,0,2.4744263,0.6542969,3.3816528,1.7846069
     C14.0778809,8.4837646,14.5608521,12.7279663,17.5640259,13.8623047z M12.4625244,3.8076782
     c0.5775146-0.741333,1.0163574-1.7880859,0.8571167-2.857666c-0.9436035,0.0653076-2.0470581,0.6651611-2.6912842,1.4477539	C10.0437012,3.107605,9.56073,4.1605835,9.7486572,5.1849365C10.7787476,5.2164917,11.8443604,4.6011963,12.4625244,3.8076782z"/>
         </svg>
         <span class="btn__text">Download on the</span> 
         <span class="btn__storename">App Store</span>
     </a> -->
     

     <!-- <a class="btn btn--android" href="https://play.google.com/store/apps/details?id=net.metaquotes.metatrader4&hl=en&gl=US">
         <svg class="btn__icon btn__icon--google" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
         preserveAspectRatio="xMidYMid"
         viewBox="0 0 20 20">
             <path d="M4.942627,18.0508423l7.6660156-4.3273926l-1.6452026-1.8234253L4.942627,18.0508423z M2.1422119,2.1231079
     C2.0543823,2.281311,2,2.4631958,2,2.664917v15.1259766c0,0.2799683,0.1046143,0.5202026,0.2631226,0.710144l7.6265259-7.7912598
     L2.1422119,2.1231079z M17.4795532,9.4819336l-2.6724854-1.508606l-2.72229,2.7811279l1.9516602,2.1630249l3.4431152-1.9436035
     C17.7927856,10.8155518,17.9656372,10.5287476,18,10.2279053C17.9656372,9.927063,17.7927856,9.6402588,17.4795532,9.4819336z
      M13.3649292,7.1592407L4.1452026,1.954834l6.8656616,7.609314L13.3649292,7.1592407z"/>
         </svg>
         <span class="btn__text">Get it on</span> 
         <span class="btn__storename">PlayStore</span>
     </a> -->
     
     <!-- <a class="btn btn--windows" download href="{{asset('/files/FGMSetup.exe')}}">
         <svg class="btn__icon btn__icon--windows" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
         preserveAspectRatio="xMidYMid"
         viewBox="0 0 20 20">
             <path d="M9.5,3.2410278V9.5H18V2L9.5,3.2410278z M2,9.5h6.5V3.3870239L2,4.3359985V9.5z M9.5,16.7589722L18,18v-7.5H9.5V16.7589722z
  M2,15.6640015l6.5,0.9489746V10.5H2V15.6640015z"/>
         </svg>
         <span class="btn__text">Download for</span> 
         <span class="btn__storename">Desktop</span>
     </a> -->

 </p>

</div>
               </div>
             
             </div>


            <div class="col-xl-4 col-md-4">
               
                <div class="card support-card" style="padding:70px 30px; height: 100%; display: flex; flex-direction: column; justify-content: center">
                    <div style="background:#b3b1b163; padding: 10px; border-radius: 50%; width: fit-content">
                    <i style="font-size: 2.3rem;" class="fas fa-headset"></i>
                    </div>    
                    <br>
                    The quickest way to get answers to your questions is to contact us at the email below.
                    Due to a high increase in the volume of requests, our response time may be extended. 
                    We are working to handle all inquiries as quickly as possible and thank you for your patience and understanding during this time. 

                  
                    <br> <br>
                  
                    <div style="background: #09418663;width: fit-content;padding: 3px 14px;border-radius: 18px;">
                    <span>support@bitfex-ltd.com</span>
                    </div>

                  </div>
                </div>
               
            </div>
            

        </div>  <!-- End Right content here -->
    </div>
@endsection

@section('scripts')
    <script src="{{asset('js/toastr.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.3/axios.min.js"></script>

    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif



    </script>

@endsection

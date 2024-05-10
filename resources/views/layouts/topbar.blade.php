<style>


.languageMenu{
    transform: translate3d(-9px, 42px, 0px)!important;
    min-width: 3rem;
}

.center {
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  position: absolute;
  width: 30px;
}

.center:before,
.center:after,
.center div {
    background: #fff;
    content: "";
    display: block;
    height: 0.5px;
    border-radius: 0px;
    margin: 7px 0;
    transition: 0.5s;
}
.center:hover:before {
  transform: translateY(12px) rotate(135deg);
}
.center:hover:after {
  transform: translateY(-12px) rotate(-135deg);
}
.center:hover div {
  transform: scale(0);
}

.dropdown-toggle::after{
    display: none;
}

.logo{
    width: 12rem; margin-right: 3rem;
}

@media only screen and (max-width:650px){
    .logo{
        width: 8rem;
    }
}



.top-text-block {
  display: block;
  padding: 3px 20px;
  clear: both;
  font-weight: 400;
  line-height: 1.42857143;
  color: #333;
  white-space: inherit !important;
  border-bottom: 1px solid #f4f4f4;
  position: relative;
}
.top-text-block:hover:before {
  content: '';
  width: 4px;
  background: #f05a1a;
  left: 0;
  top: 0;
  bottom: 0;
  position: absolute;
}
.top-text-block.unread {
  background: #ffc;
}
.top-text-block .top-text-light {
  color: #999;
  font-size: 0.8em;
}
.top-head-dropdown .dropdown-menu {
  width: 350px;
  height: 300px;
  overflow: auto;
}
.top-head-dropdown li:last-child .top-text-block {
  border-bottom: 0;
}
.topbar-align-center {
  text-align: center;
}
.loader-topbar {
  margin: 5px auto;
  border: 3px solid #ddd;
  border-radius: 50%;
  border-top: 3px solid #666;
  width: 22px;
  height: 22px;
  -webkit-animation: spin-topbar 1s linear infinite;
  animation: spin-topbar 1s linear infinite;
}
.top-text-heading{
   color: #b00a0a;
}

.fa-bell{
    font-size: 1.9rem;
}

.ntf_count{

    color: #d55b53;
    font-size: 15px;
    position: absolute;
    font-weight: 900;
    top: 45%;
    left: 49%;
    transform: translate(-50%, -50%);
    z-index: 151515161561551155165;
}

.cl-red{
    color: #d55b53
}

</style>
<!-- Top Bar Start -->
<div class="topbar">
    <nav class="navbar-custom">

        <ul class="list-inline float-right mb-0" style="margin-top: .7rem;">

            {{-- <li class="list-inline-item" style="position: relative !important;">
                <div class="toggle_row">
                    <i class="fas fa-sun"></i> <div class="toggle1 active"></div> <i class="fas fa-moon" style="left: 85px; position: absolute;"></i>
                </div>
            </li> --}}
           @if(onlyguard('manager'))
            
            <div class="btn-group pull-right top-head-dropdown">
                <span class="ntf_count">{{logged_in()->unreadNotifications->count()}}</span>
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="far @if (logged_in()->unreadNotifications->count()) cl-red @endif fa-bell"></i> <span class="caret"></span>
                </button>
                
                <ul class="dropdown-menu dropdown-menu-right">
                    
                         
                     
                    @foreach(logged_in()->notifications as $key => $notification)
                  <li>
                 
                        
                 
                    <a href="#" class="top-text-block">
                      
                      <div class="top-text-heading">{{$notification->data['Notification']}}</div>
                      <div class="top-text-light">{{$notification->created_at}}</div>
                      {{$notification->markAsRead()}}
                    </a> 
                  
                  </li>
                
                  @endforeach
                 
                </ul>
              </div>

              @endif

            <li class="list-inline-item dropdown">
                @php $locale =  App::getLocale(); @endphp


                

                <a class="nav-link dropdown-toggle text-white" href="" style="margin-top:10px; "
                   id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                        class="languageText">

                        @switch($locale)
                            @case('en')
                            <span class="flag-icon flag-icon-gb mr-1"> </span> 
                            @break
                            @case('de')
                            <span class="flag-icon flag-icon-de mr-1"> </span> 
                            @break
                            @case('it')
                            <span class="flag-icon flag-icon-it mr-1"> </span> 
                            @break
                            @case('es')
                            <span class="flag-icon flag-icon-es mr-1"> </span> 
                            @break
                            @case('gr')
                            <span class="flag-icon flag-icon-gr mr-1"> </span> 
                            @break
                            @default
                            <span class="flag-icon flag-icon-gb mr-1"> </span>
                        @endswitch
                    </span></a>


                <div class="dropdown-menu languageMenu" aria-labelledby="dropdown09">
                    <a class="dropdown-item"
                       href="{{ (request()->is(get_guard().'/home')||request()->is(get_guard())) ? get_guard().'/lang/en' : 'lang/en' }}"><span
                            class="flag-icon flag-icon-gb mr-1"> </span> </a>
                    <a class="dropdown-item"
                       href="{{ (request()->is(get_guard().'/home')||request()->is(get_guard())) ? get_guard().'/lang/de' : 'lang/de' }}"><span
                            class="flag-icon flag-icon-de mr-1"> </span> </a>
                    <a class="dropdown-item"
                       href="{{ (request()->is(get_guard().'/home')||request()->is(get_guard())) ? get_guard().'/lang/it' : 'lang/it' }}"><span
                            class="flag-icon flag-icon-it mr-1"> </span> </a>
                    <a class="dropdown-item"
                       href="{{ (request()->is(get_guard().'/home')||request()->is(get_guard())) ? get_guard().'/lang/es' : 'lang/es' }}"><span
                            class="flag-icon flag-icon-es mr-1"> </span> </a>
                    <a class="dropdown-item"
                       href="{{ (request()->is(get_guard().'/home')||request()->is(get_guard())) ? get_guard().'/lang/gr' : 'lang/gr' }}"><span
                            class="flag-icon flag-icon-gr mr-1"> </span> </a>
                    {{--                    <a class="dropdown-item" href="#ru"><span class="flag-icon flag-icon-ru mr-1"> </span>  Russian</a>--}}
                </div>
            </li>

            <li class="list-inline-item dropdown notification-list">


            <li class="list-inline-item dropdown notification-list">
                <a style="margin-top: .7rem;" class="nav-link dropdown-toggle arrow-none waves-effect nav-user d-flex" data-toggle="dropdown"
                   href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <div
                        style="display: flex;flex-direction: column;/* align-items: center; */justify-content: center;">
                        <span style="width: 100%"
                              class="username"> @if(logged_in()) {{logged_in()->name}} {{logged_in()->surname}} @endif  </span>
                    </div>
                   
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                    


                    <a class="dropdown-item" href="{{url(get_guard().'/personal_info')}}"><i
                            class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                            class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        <input type="hidden" name="role" value="{{logged_in()->account_id}}">
                        @csrf
                    </form>
                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="list-inline-item" style="display: flex; align-items: center;">
               
                <div style="display: inline-flex; height: 70px;">

                    
                    <div type="button" style="" class="button-menu-mobile open-left waves-effect">
                        <div class="center">
                   <div>

                   </div>
                 </div>

                    {{-- <span class="d-flex align-items-center mt4_account_nav"
                          style="left: 200px !important; font-size: 20px;color: white; position: relative;">
                          
                          @if(logged_in()&&logged_in()->mt4_account) {{logged_in()->mt4_account}} @endif
                    </span> --}}
                </div>
            </li>
        </ul>

{{--        <div class="clearfix"></div>--}}

    </nav>

</div>
<!-- Top Bar End -->
@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.15.3/axios.min.js"></script>
    <script>
        var vm = new Vue({
            el: '#app',
            mounted: function () {
                console.log('it started');
            },

            data: function () {
                return {
                    user_id:null,
                    value:null,

                }
            },
            methods:{
                login_manager(user_id, val){
                    console.log(val);

                    // var element=document.getElementById('spinSwitch'+user_id);
                    axios.post('{{URL::to('login_manager_test')}}', {
                        user_id:user_id,
                        value:val,
                    }).then(function(response) {
                        console.log(response);

                        if(val===1)
                            window.location.href = '{{URL::to('manager/clients/')}}';
                        else
                            window.location.href = '{{URL::to('manager/home/')}}';
                    })
                        .catch(function(error) {
                            console.log(error);
                        });
                },
            }
        })
    </script>


@endsection

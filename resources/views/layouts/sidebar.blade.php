<style>
    .non_click {
        pointer-events: none;
        cursor: default;
        opacity: 0.5;
    }

</style>
<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu n_color">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="ion-close"></i>

    </button>

    <div class="left-side-logo d-block d-lg-none">
        <div style="margin:2.5rem 0 2rem 0;" class="text-center">

            <a href="{{ url(get_guard() . '/') }}" class="logo"><img src="{{ asset('images/icon.png') }}"
                    height="90" alt="logo"></a>
        </div>
    </div>

    <div class="sidebar-inner slimscrollleft">

        <div id="sidebar-menu">
            <ul>




                {{-- /// ADMIN SIDEBAR START /// --}}



                @if (onlyguard('admin'))
                    <li>
                        <a href="{{ url(get_guard() . '/') }}" class="waves1-effect">
                            <div
                                class="icon_sizer {{ request()->is(get_guard() . '/') || request()->is('/') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fas fa-laptop-code menuIcon"></i>

                            </div> <span> {{ __('Dashboard') }}</span> <span class="menu-arrow float-right"><i
                                    class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>



                    <li>
                        <a href="{{ url(get_guard() . '/approve_managers') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/approve_managers') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fa fa-user-tie menuIcon"></i>
                            </div> <span> {{ __('Approve Agents') }}
                            </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>


                    <li>
                        <a href="{{ url(get_guard() . '/approve_users') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/approve_users') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fas fa-users menuIcon"></i>
                            </div> <span> {{ __('Approve Clients') }} </span>
                            <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>


                    

                    <li>
                        <a href="{{ url(get_guard() . '/users') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/users') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fa fa-user menuIcon"></i>
                            </div> <span> {{ __('Users') }} </span> <span class="menu-arrow float-right"><i
                                    class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>

                    {{-- <li>
                        <a href="{{ url(get_guard() . '/promo_users') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/promo_users') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fas fa-user-shield menuIcon"></i>
                            </div> <span> {{ __('Promo') }} </span>
                            <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li> --}}
                    <li>
                        <a href="{{ url(get_guard() . '/clients') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/clients') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fas fa-money-bill-wave menuIcon"></i>
                            </div> <span> {{ __('Clients') }}
                            </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>
                   
                    <li>
                        <a href="{{ url(get_guard() . '/leads') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/leads') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fa fa-headset menuIcon"></i>
                            </div> <span> {{ __('Leads') }} </span> <span class="menu-arrow float-right"><i
                                    class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url(get_guard() . '/transaction_logs') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/transaction_logs') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fa fa-chart-line menuIcon"></i>
                            </div><span> {{ __('Transactions') }}</span>
                            <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url(get_guard() . '/collateral') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/collateral') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fa fa-coins menuIcon"></i>
                            </div><span> {{ __('Collaterals') }}</span> <span class="menu-arrow float-right"><i
                                    class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="{{ url(get_guard() . '/credit') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/credit') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fas fa-wallet menuIcon"></i>
                            </div> <span> {{ __('Credits') }}</span> <span class="menu-arrow float-right"><i
                                    class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li> --}}
                    <li>
                        <a href="{{ url(get_guard() . '/deposit_request') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/deposit_request') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fa fa-search-dollar menuIcon"></i>
                            </div> <span>
                                {{ __('Deposit Requests') }}</span> <span class="menu-arrow float-right"><i
                                    class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url(get_guard() . '/withdraws') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/withdraws') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fa fa-sync menuIcon"></i>
                            </div> <span> {{ __('Withdraws') }}</span> <span class="menu-arrow float-right"><i
                                    class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>
{{-- 
                    <li>
                        <a href="{{ url(get_guard() . '/accounts') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/accounts') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fab fa-artstation menuIcon"></i>
                            </div><span> {{ __('Accounts') }}</span>
                            <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li> --}}
                    <li>
                        <a href="{{ url(get_guard() . '/uploads') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/uploads') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fas fa-file-upload menuIcon"></i>
                            </div><span> {{ __('Uploads') }}</span>
                            <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url(get_guard() . '/statuses') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/statuses') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fas fa-star-half-alt menuIcon"></i>
                            </div><span> {{ __('Status') }}</span>
                            <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url(get_guard() . '/desks') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/desks') ? 'active_icon' : 'inactive_icon' }}">
                               
                                <i class="far fa-clone menuIcon"></i>
                            </div><span> {{ __('Desks') }}</span>
                            <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>

                    
                    <li>
                        <a href="{{ url(get_guard() . '/allowedpromocode') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/statuses') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fas fa-atom menuIcon"></i>
                            </div><span> {{ __('Allowed PromoCode') }}</span>
                            <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ url(get_guard() . '/allowedip') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/statuses') ? 'active_icon' : 'inactive_icon' }}">
                               
                                <i class="fab fa-connectdevelop menuIcon"></i>
                            </div><span> {{ __('Allowed IP') }}</span>
                            <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="{{ url(get_guard() . '/managers_form') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/managers_form') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="far fa-file-alt menuIcon"></i>
                            </div><span>
                                {{ __('Managers Reports') }}</span> <span class="menu-arrow float-right"><i
                                    class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li> --}}
                    {{-- <li>
                        <a href="{{ url(get_guard() . '/surveys') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/surveys') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fa fa-question menuIcon"></i>
                            </div><span> {{ __('Survey') }}</span> <span class="menu-arrow float-right"><i
                                    class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li> --}}
                    {{-- <li>
                        <a href="{{ url(get_guard() . '/projects') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/projects') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fa fa-file-signature menuIcon"></i>
                            </div><span> {{ __('Projects') }}</span>
                            <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li> --}}

                    <li>
                        <a href="{{ url(get_guard() . '/email_alerts') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is('/email_alerts') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fa fa-envelope-open menuIcon"></i>
                            </div><span>
                                {{ __('Notifications') }}</span> <span class="menu-arrow float-right"><i
                                    class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="{{ url(get_guard() . '/sms_log') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is('/sms_log') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fa fa-sms menuIcon"></i>
                            </div><span> {{ __('Sms Log') }}</span> <span class="menu-arrow float-right"><i
                                    class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li> --}}

                    {{-- <li>
                        <a href="{{ url(get_guard() . '/exclients') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/exclients') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fa fa-user-slash menuIcon"></i>
                            </div> <span> {{ __('Exclients') }} </span>
                            <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li> --}}

                    {{-- <li>
                        <a href="{{ url(get_guard() . '/recycle') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/recycle') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fa fa-recycle menuIcon"></i>
                            </div> <span> {{ __('Recycle') }} </span> <span class="menu-arrow float-right"><i
                                    class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li> --}}
                    <li>
                        <a href="{{ url(get_guard() . '/calendar') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/calendar') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="far fa-calendar-alt menuIcon"></i>
                            </div><span> {{ __('Calendar') }} </span>
                            <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>
                @endif



                {{-- /// ADMIN SIDEBAR END /// --}}







                {{-- /// OFFICEMANAGER SIDEBAR START /// --}}




                @if (hasanyguard(['officemanager','caposala']))

                    {{-- <li>
                        <a href="{{ url(get_guard() . '/approve_users') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/approve_users') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fa fa-users-cog menuIcon"></i>
                            </div> <span> {{ __('Approve') }} </span>
                            <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li> --}}
                    <li>
                        <a href="{{ url(get_guard() . '/clients') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/clients') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fas fa-money-bill-wave menuIcon"></i>
                            </div> <span> {{ __('Clients') }}
                            </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url(get_guard() . '/users') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/users') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fa fa-user menuIcon"></i>
                            </div> <span> {{ __('Users') }} </span> <span class="menu-arrow float-right"><i
                                    class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>

                    {{-- <li>
                        <a href="{{ url(get_guard() . '/exclients') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/exclients') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fa fa-user-slash menuIcon"></i>
                            </div> <span> {{ __('Exclients') }} </span>
                            <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li> --}}
                    <li>
                        <a href="{{ url(get_guard() . '/leads') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/leads') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fa fa-headset menuIcon"></i>
                            </div> <span> {{ __('Leads') }} </span> <span class="menu-arrow float-right"><i
                                    class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>

                    @if (logged_in()->view_deposit_request)
                    <li>
                        <a href="{{ url(get_guard() . '/deposit_requests') }}" class="waves1-effect "><div
                                class="icon_sizer  {{ request()->is(get_guard() . '/deposit_requests') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fa fa-search-dollar menuIcon"></i>
                            </div> <span>
                                {{ __('Deposit Requests') }}</span> <span class="menu-arrow float-right"><i
                                    class="mdi mdi-chevron-right"></i></span></a>
                    </li>
                    @endif

                    @if (logged_in()->view_withdraw)
                    <li>
                        <a href="{{ url(get_guard() . '/withdraws') }}" class="waves1-effect @if (logged_in()->manager_money === 0) non_click @endif"><div
                                class="icon_sizer  {{ request()->is(get_guard() . '/withdraws') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fa fa-sync menuIcon"></i>
                            </div> <span> {{ __('Withdraws') }}</span>
                            <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    </li>
                    @endif
                    <li>
                        <a href="{{ url(get_guard() . '/calendar') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/calendar') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="far fa-calendar-alt menuIcon"></i>
                            </div><span> {{ __('Calendar') }}
                            </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>

                @endif



                {{-- /// OFFICEMANAGER SIDEBAR END /// --}}




                {{-- /// AFFILIATOR SIDEBAR START /// --}}




                @if (onlyguard('affiliator'))

                    <li>
                        <a href="{{ url(get_guard() . '/leads') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/leads') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fa fa-headset menuIcon"></i>
                            </div> <span> {{ __('Leads') }} </span> <span class="menu-arrow float-right"><i
                                    class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>

                @endif



                {{-- /// AFFILIATOR SIDEBAR END /// --}}





                {{-- /// TEAMLEADER SIDEBAR START /// --}}




                @if (onlyguard('teamleader'))

               
                    <li>
                        <a href="{{ url(get_guard() . '/clients') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/clients') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fas fa-money-bill-wave menuIcon"></i>
                            </div> <span> {{ __('Clients') }}
                            </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url(get_guard() . '/users') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/users') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fa fa-user menuIcon"></i>
                            </div> <span> {{ __('Users') }} </span> <span class="menu-arrow float-right"><i
                                    class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>
{{-- 
                    <li>
                        <a href="{{ url(get_guard() . '/exclients') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/exclients') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fa fa-user-slash menuIcon"></i>
                            </div> <span> {{ __('Exclients') }} </span>
                            <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li> --}}
                    <li>
                        <a href="{{ url(get_guard() . '/leads') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/leads') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fa fa-headset menuIcon"></i>
                            </div> <span> {{ __('Leads') }} </span> <span class="menu-arrow float-right"><i
                                    class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>
                    @if (logged_in()->view_deposit_request)
                    <li>
                        <a href="{{ url(get_guard() . '/deposit_requests') }}" class="waves1-effect @if (logged_in()->manager_money === 0) non_click @endif"><div
                                class="icon_sizer  {{ request()->is(get_guard() . '/deposit_requests') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fa fa-search-dollar menuIcon"></i>
                            </div> <span>
                                {{ __('Deposit Requests') }}</span> <span class="menu-arrow float-right"><i
                                    class="mdi mdi-chevron-right"></i></span></a>
                    </li>
                    @endif
                    @if (logged_in()->view_withdraw)
                    <li>
                        <a href="{{ url(get_guard() . '/withdraws') }}" class="waves1-effect @if (logged_in()->manager_money === 0) non_click @endif"><div
                                class="icon_sizer  {{ request()->is(get_guard() . '/withdraws') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fa fa-sync menuIcon"></i>
                            </div> <span> {{ __('Withdraws') }}</span>
                            <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    </li>
                    @endif
                    <li>
                        <a href="{{ url(get_guard() . '/calendar') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/calendar') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="far fa-calendar-alt menuIcon"></i>
                            </div><span> {{ __('Calendar') }}
                            </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>

                @endif



                {{-- /// TEAMLEADER SIDEBAR END /// --}}












                {{-- /// MANAGER SIDEBAR START /// --}}



                @if (hasguard('manager'))

                  
                        <li>
                            <a href="{{ url(get_guard() . '/clients') }}" class="waves1-effect">
                                <div
                                    class="icon_sizer  {{ request()->is(get_guard() . '/clients') ? 'active_icon' : 'inactive_icon' }}">
                                    <i class="fas fa-money-bill-wave menuIcon"></i>
                                </div> <span> {{ __('Clients') }}
                                </span> <span class="menu-arrow float-right"><i
                                        class="mdi mdi-chevron-right"></i></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url(get_guard() . '/users') }}" class="waves1-effect">
                                <div
                                    class="icon_sizer  {{ request()->is(get_guard() . '/users') ? 'active_icon' : 'inactive_icon' }}">
                                    <i class="fas fa-user menuIcon"></i>
                                </div> <span> {{ __('Users') }} </span>
                                <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                            </a>
                        </li>
                        {{-- <li>
                            <a href="{{ url(get_guard() . '/promo') }}" disabled="true" class="waves1-effect">
                                <div
                                    class="icon_sizer  {{ request()->is(get_guard() . '/promo') ? 'active_icon' : 'inactive_icon' }}">
                                    <i class="fas fa-user-shield menuIcon"></i>
                                </div> <span> {{ __('Promo') }}
                                </span> <span class="menu-arrow float-right"><i
                                        class="mdi mdi-chevron-right"></i></span>
                            </a>
                        </li> --}}
                        {{-- <li>
                            <a href="{{ url(get_guard() . '/exclients') }}" class="waves1-effect">
                                <div
                                    class="icon_sizer  {{ request()->is(get_guard() . '/exclients') ? 'active_icon' : 'inactive_icon' }}">
                                    <i class="fa fa-user-slash menuIcon"></i>
                                </div> <span> {{ __('Exclients') }}
                                </span> <span class="menu-arrow float-right"><i
                                        class="mdi mdi-chevron-right"></i></span>
                            </a>
                        </li> --}}
                        <li>
                            <a href="{{ url(get_guard() . '/leads') }}" class="waves1-effect">
                                <div
                                    class="icon_sizer  {{ request()->is(get_guard() . '/leads') ? 'active_icon' : 'inactive_icon' }}">
                                    <i class="fa fa-headset menuIcon"></i>
                                </div> <span> {{ __('Leads') }} </span>
                                <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                            </a>
                        </li>
                        {{-- <li>
                            <a href="{{ url(get_guard() . '/approve_users') }}" class="waves1-effect">
                                <div
                                    class="icon_sizer  {{ request()->is(get_guard() . '/approve_users') ? 'active_icon' : 'inactive_icon' }}">
                                    <i class="fa fa-users-cog menuIcon"></i>
                                </div> <span> {{ __('Approve') }} </span>
                                <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                            </a>
                        </li> --}}
                        <hr>
                        {{-- <li>
                            <a href="{{ url(get_guard() . '/manager_form') }}" class="waves1-effect">
                                <div
                                    class="icon_sizer  {{ request()->is(get_guard() . '/manager_form') ? 'active_icon' : 'inactive_icon' }}">
                                    <i class="far fa-file-alt menuIcon"></i>
                                </div><span>
                                    {{ __('Clients Report') }}</span> <span class="menu-arrow float-right"><i
                                        class="mdi mdi-chevron-right"></i></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url(get_guard() . '/managers_form') }}" class="waves1-effect">
                                <div
                                    class="icon_sizer  {{ request()->is(get_guard() . '/managers_form') ? 'active_icon' : 'inactive_icon' }}">
                                    <i class="fa fa-file-signature menuIcon"></i>
                                </div><span>
                                    {{ __('Sent Reports') }}</span> <span class="menu-arrow float-right"><i
                                        class="mdi mdi-chevron-right"></i></span>
                            </a>
                        </li> --}}
                        {{-- <li>
                            <a href="{{url(get_guard().'/surveys')}}" class="waves1-effect"><div class="icon_sizer  {{ (request()->is(get_guard().'/surveys')) ? 'active_icon' : 'inactive_icon' }}"> <i class="fa fa-question menuIcon"></i> </div><span> {{__("Survey")}}</span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                        </li> --}}
                        @if (logged_in()->view_transactions)
                        <li>
                            <a href="{{ url(get_guard() . '/transaction_logs') }}" class="waves1-effect">
                                <div
                                    class="icon_sizer  {{ request()->is(get_guard() . '/transaction_logs') ? 'active_icon' : 'inactive_icon' }}">
                                    <i class="fa fa-chart-line menuIcon"></i>
                                </div><span> {{ __('Transactions') }}</span>
                                <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                            </a>
                        </li>
                        @endif
                        @if (logged_in()->view_deposit_request)
                        <li>
                            <a href="{{ url(get_guard() . '/deposit_requests') }}" class="waves1-effect @if (logged_in()->manager_money === 0) non_click @endif"><div
                                    class="icon_sizer  {{ request()->is(get_guard() . '/deposit_requests') ? 'active_icon' : 'inactive_icon' }}">
                                    <i class="fa fa-search-dollar menuIcon"></i>
                                </div> <span>
                                    {{ __('Deposit Requests') }}</span> <span class="menu-arrow float-right"><i
                                        class="mdi mdi-chevron-right"></i></span></a>
                        </li>
                        @endif
                        @if (logged_in()->view_withdraw)
                        <li>
                            <a href="{{ url(get_guard() . '/withdraws') }}" class="waves1-effect @if (logged_in()->manager_money === 0) non_click @endif"><div
                                    class="icon_sizer  {{ request()->is(get_guard() . '/withdraws') ? 'active_icon' : 'inactive_icon' }}">
                                    <i class="fa fa-sync menuIcon"></i>
                                </div> <span> {{ __('Withdraws') }}</span>
                                <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                        </li>
                        @endif
                        <li>
                            <a href="{{ url(get_guard() . '/calendar') }}" class="waves1-effect">
                                <div
                                    class="icon_sizer  {{ request()->is(get_guard() . '/calendar') ? 'active_icon' : 'inactive_icon' }}">
                                    <i class="far fa-calendar-alt menuIcon"></i>
                                </div><span> {{ __('Calendar') }}
                                </span> <span class="menu-arrow float-right"><i
                                        class="mdi mdi-chevron-right"></i></span>
                            </a>
                        </li>
                        
                   

                @endif


                {{-- /// MANAGER SIDEBAR END /// --}}





                {{-- /// USER SIDEBAR START /// --}}


                @if (hasanyguard(['starter']))
                    <li>
                        <a href="{{ url(get_guard() . '/') }}" style="padding:1.15rem 0" class="waves1-effect">
                            <div class="icon_sizer">

                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    fill="{{ request()->is(get_guard() . '/') ? '#cab287' : 'currentColor' }}"
                                    class="bi bi-window-sidebar" viewBox="0 0 16 16">
                                    <path
                                        d="M2.5 4a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm2-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm1 .5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                    <path
                                        d="M2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v2H1V3a1 1 0 0 1 1-1h12zM1 13V6h4v8H2a1 1 0 0 1-1-1zm5 1V6h9v7a1 1 0 0 1-1 1H6z" />
                                </svg>

                            </div> <span> {{ __('Dashboard') }}</span> <span class="menu-arrow float-right"><i
                                    class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ url(get_guard() . '/personal_info') }}" style="padding:1.15rem 0"
                            class="waves1-effect">
                            <div class="icon_sizer">

                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    fill="{{ request()->is(get_guard() . '/personal_info') ? '#cab287' : 'currentColor' }}"
                                    class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                                    <path
                                        d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z" />
                                    <path
                                        d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                </svg>

                            </div><span> {{ __('Profile') }} </span> <span class="menu-arrow float-right"><i
                                    class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>

                    <li class="has_sub">
                        <a href="javascript:void(0);" style="padding:1rem 0" class="waves1-effect">
                            <div class="icon_sizer">

                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27"
                                    fill="{{ request()->is(get_guard() . '/deposit_bank') ? '#cab287' : 'currentColor' }}"
                                    class="bi bi-credit-card-2-front" viewBox="0 0 16 16">
                                    <path
                                        d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z" />
                                    <path
                                        d="M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                </svg>

                            </div>
                            <span> {{ __('Finance') }} </span>
                        </a>
                        <ul class="list-unstyled">
                            <li><a href="{{ url(get_guard() . '/deposit_bank') }}">{{ __('Deposit Bank') }}</a>
                            </li>

                            {{-- <li><a href="{{ url(get_guard() . '/deposit') }}">{{ __('Deposit Card') }}</a></li> --}}

                        </ul>
                    </li>

                    <li class="has_sub" style="padding: 1.15rem 0">
                        <a href="javascript:void(0);" class="waves1-effect">
                            <div class="icon_sizer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    fill="{{ request()->is(get_guard() . '/withdraw') || request()->is(get_guard() . '/withdraws') ? '#cab287' : 'currentColor' }}"
                                    class="bi bi-wallet2" viewBox="0 0 16 16">
                                    <path
                                        d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z" />
                                </svg>
                            </div><span> {{ __('Withdraw') }} </span>
                        </a>
                        <ul class="list-unstyled">
                            <li><a href="{{ url(get_guard() . '/withdraw') }}">{{ __('Submit Withdraw') }}</a>
                            </li>
                            <li><a
                                    href="{{ url(get_guard() . '/withdraws') }}">{{ __('Withdraws History') }}</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="{{ url(get_guard() . '/economic_calendar') }}" style="padding:.75rem 0"
                            class="waves1-effect">
                            <div class="icon_sizer inactive_icon">

                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    fill="{{ request()->is(get_guard() . '/economic_calendar') ? '#cab287' : 'currentColor' }}"
                                    class="bi bi-calendar4-range" viewBox="0 0 16 16">
                                    <path
                                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1H2zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5z" />
                                    <path
                                        d="M9 7.5a.5.5 0 0 1 .5-.5H15v2H9.5a.5.5 0 0 1-.5-.5v-1zm-2 3v1a.5.5 0 0 1-.5.5H1v-2h5.5a.5.5 0 0 1 .5.5z" />
                                </svg>

                            </div><span>{{ __('Economic Calendar') }} </span> <span
                                class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>

                    @if(logged_in()->forex_signals) 
                    <li>
                        <a href="{{ url(get_guard() . '/signals') }}" style="padding:1rem 0" class="waves1-effect">
                            <div class="icon_sizer inactive_icon">

                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    fill="{{ request()->is(get_guard() . '/signals') ? '#cab287' : 'currentColor' }}"
                                    class="bi bi-graph-up" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M0 0h1v15h15v1H0V0zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5z" />
                                </svg>

                            </div><span>{{ __('Signals') }} </span> <span class="menu-arrow float-right"><i
                                    class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>
                    @endif

                   @if(logged_in()->can_spin) 
                    <li>
                        <a href="{{ url(get_guard() . '/spin') }}" style="padding:1rem 0" class="waves1-effect">
                            <div class="icon_sizer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                    fill="{{ request()->is(get_guard() . '/spin') ? '#cab287' : 'currentColor' }}"
                                    class="bi bi-tropical-storm" viewBox="0 0 16 16">
                                    <path d="M8 9.5a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                                    <path
                                        d="M9.5 2c-.9 0-1.75.216-2.501.6A5 5 0 0 1 13 7.5a6.5 6.5 0 1 1-13 0 .5.5 0 0 1 1 0 5.5 5.5 0 0 0 8.001 4.9A5 5 0 0 1 3 7.5a6.5 6.5 0 0 1 13 0 .5.5 0 0 1-1 0A5.5 5.5 0 0 0 9.5 2zM8 3.5a4 4 0 1 0 0 8 4 4 0 0 0 0-8z" />
                                </svg>
                            </div> <span> {{ __('Fortune Wheel') }} </span> <span class="menu-arrow float-right"><i
                                    class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>
                    @endif
                    <li class="has_sub" style="padding: 1.15rem 0">
                        <a href="javascript:void(0);" class="waves1-effect">
                            <div class="icon_sizer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                    fill="{{ request()->is(get_guard() . '/chart') ? '#cab287' : 'currentColor' }}"
                                    class="bi bi-bar-chart-line" viewBox="0 0 16 16">
                                    <path
                                        d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2zm1 12h2V2h-2v12zm-3 0V7H7v7h2zm-5 0v-3H2v3h2z" />
                                </svg>
                            </div><span> {{ __('Financial Tool') }} </span>
                        </a>
                        <ul class="list-unstyled">
                            <li><a href="{{ url(get_guard() . '/chart') }}">{{ __('Realtime Chart') }}</a></li>
                            <li><a
                                    href="{{ url(get_guard() . '/forex_rates') }}">{{ __('Forex Cross Rates') }}</a>
                            </li>
                            <li><a
                                    href="{{ url(get_guard() . '/crypto_market') }}">{{ __('Cryptocurrency Market') }}</a>
                            </li>
                            <li><a href="{{ url(get_guard() . '/market_data') }}">{{ __('Market Data') }}</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="{{ url(get_guard() . '/porta_amico') }}" style="padding:1.15rem 0"
                            class="waves1-effect">
                            <div class="icon_sizer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                    fill="{{ request()->is(get_guard() . '/porta_amico') ? '#cab287' : 'currentColor' }}"
                                    class="bi bi-people" viewBox="0 0 16 16">
                                    <path
                                        d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                                </svg>

                            </div><span> {{ __('Refer a Friend') }}</span> <span class="menu-arrow float-right"><i
                                    class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url(get_guard() . '/email_alert') }}" style="padding:1rem 0"
                            class="waves1-effect">
                            <div class="icon_sizer inactive_icon">

                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    fill="{{ request()->is(get_guard() . '/email_alert') ? '#cab287' : 'currentColor' }}"
                                    class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path
                                        d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z" />
                                </svg>

                            </div><span>{{ __('Notifications') }} </span><i
                                class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>


                    {{-- <li class="has_sub" style="margin: 7px 0">
                        <a href="javascript:void(0);" class="waves1-effect">
                            <div class="icon_sizer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor"
                                    class="bi bi-bezier2" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 2.5A1.5 1.5 0 0 1 2.5 1h1A1.5 1.5 0 0 1 5 2.5h4.134a1 1 0 1 1 0 1h-2.01c.18.18.34.381.484.605.638.992.892 2.354.892 3.895 0 1.993.257 3.092.713 3.7.356.476.895.721 1.787.784A1.5 1.5 0 0 1 12.5 11h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5H6.866a1 1 0 1 1 0-1h1.711a2.839 2.839 0 0 1-.165-.2C7.743 11.407 7.5 10.007 7.5 8c0-1.46-.246-2.597-.733-3.355-.39-.605-.952-1-1.767-1.112A1.5 1.5 0 0 1 3.5 5h-1A1.5 1.5 0 0 1 1 3.5v-1zM2.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10 10a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z" />
                                </svg>
                            </div><span> {{ __('Remote Control') }} </span> <span
                                class="menu-arrow float-right"></span>
                        </a>
                        <ul class="list-unstyled">
                            <li><a href="https://download.teamviewer.com/download/TeamViewer_Setup.exe"><img
                                        style="width: 25px;" class="m-r-10"
                                        src="{{ asset('/images/teamviwer_logo-min.png') }}">{{ __('TeamViewer') }}</a>
                            </li>
                            <li><a
                                    href="https://download.anydesk.com/AnyDesk.exe?_ga=2.117006022.1917152222.1588601310-125356855.1588601310"><img
                                        style="width: 25px;" class="m-r-10"
                                        src="{{ asset('/images/anydesk_icon-min.png') }}">{{ __('AnyDesk') }}</a>
                            </li>

                        </ul>
                    </li> --}}

                @endif


                {{-- /// USER SIDEBAR END /// --}}




                @if (hasanyguard(['grand_master', 'kings']))
                    <li>
                        <a href="{{ url(get_guard() . '/economic_calendar') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/economic_calendar') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="far fa-calendar-plus menuIcon"></i>
                            </div><span>{{ __('Economic Calendar') }}
                            </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url(get_guard() . '/risk_management') }}" class="waves1-effect">
                            <div
                                class="icon_sizer  {{ request()->is(get_guard() . '/risk_management') ? 'active_icon' : 'inactive_icon' }}">
                                <i class="fa fa-hand-holding-usd menuIcon"></i>
                            </div><span>{{ __('Risk Management') }}
                            </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url(get_guard() . '/balance_protection') }}" class="waves1-effect">
                            <div class="icon_sizer inactive_icon }}">
                                <i class="fa  fa-shield-alt menuIcon"></i>
                                {{-- <svg class="menuIcon spinIcon" id="Outline" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m24 408h28l21.6 28.8a8 8 0 0 0 6.4 3.2h56a8 8 0 0 0 8-8v-24h224v24a8 8 0 0 0 8 8h56a8 8 0 0 0 6.4-3.2l21.6-28.8h28a8 8 0 0 0 8-8v-320a8 8 0 0 0 -8-8h-464a8 8 0 0 0 -8 8v320a8 8 0 0 0 8 8zm104 16h-44l-12-16h56zm300 0h-44v-16h56zm-396-272h48v32h-48zm56 128h-24v-80h24a8 8 0 0 0 8-8v-48a8 8 0 0 0 -8-8h-24v-16h384v240h-384v-16h24a8 8 0 0 0 8-8v-48a8 8 0 0 0 -8-8zm-56-80h16v80h-16zm0 96h48v32h-48zm0 48h16v24a8 8 0 0 0 8 8h400a8 8 0 0 0 8-8v-256a8 8 0 0 0 -8-8h-400a8 8 0 0 0 -8 8v24h-16v-48h448v304h-448z"/><path d="m176 304a64 64 0 1 0 -64-64 64.072 64.072 0 0 0 64 64zm0-112a48 48 0 1 1 -48 48 48.054 48.054 0 0 1 48-48z"/><path d="m176 264a24 24 0 1 0 -24-24 24.027 24.027 0 0 0 24 24zm0-32a8 8 0 1 1 -8 8 8.009 8.009 0 0 1 8-8z"/><circle cx="312" cy="248" r="8"/><circle cx="344" cy="248" r="8"/><circle cx="376" cy="248" r="8"/><circle cx="312" cy="280" r="8"/><circle cx="344" cy="280" r="8"/><circle cx="376" cy="280" r="8"/><circle cx="312" cy="312" r="8"/><circle cx="344" cy="312" r="8"/><circle cx="376" cy="312" r="8"/><path d="m280 216h128a8 8 0 0 0 8-8v-48a8 8 0 0 0 -8-8h-128a8 8 0 0 0 -8 8v48a8 8 0 0 0 8 8zm8-48h112v32h-112z"/></svg> --}}
                            </div><span>{{ __('Balance Protection') }} </span> <span
                                class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>
                @endif

              
                @if (hasanyguard(['phoenix']))
                    <li>
                        <a href="{{ url(get_guard() . '/projects') }}" class="waves1-effect">
                            <div class="icon_sizer inactive_icon"><i class="fa fa-chart-bar menuIcon"></i></div>
                            <span>{{ __('Weekly Crypto Analysis') }} </span> <span class="menu-arrow float-right"><i
                                    class="mdi mdi-chevron-right"></i></span>
                        </a>
                    </li>
                @endif




                {{-- /// CALL BUTTONS START --}}



                @if (hasanyguard(['admin']))

                    <li class="sipButtons" style="display: flex; justify-content: center;  margin-top: 30px;">
                        <div id="divBtnCallGroup" class="btn-group" style="padding-left: 6px;padding-right: 7px;">
                            <button id="btnCall" disabled style="background-image: none"
                                class="btn btn-info menu-call-icon call-btn" data-toggle="dropdown">
                                <i class="fas fa-phone"></i>
                                {{-- <span class="call-text">Call</span> --}}
                            </button>
                        </div>

                        <div class="btn-group" style="">
                            <!--                            <input type="button" id="btnHangUp"  style="background-image: none" class="btn btn-danger menu-call-icon hangup-btn" value="HangUp" onclick='sipHangUp();' disabled />-->
                            <button id="btnHangUp" onclick='sipHangUp();' disabled style="background-image: none"
                                class="btn btn-info menu-call-icon hangup-btn" data-toggle="dropdown">
                                {{-- <span class="hangup-text">HangUp</span> --}}

                                <i class="fa fa-phone-slash"></i>

                            </button>
                        </div>
                    </li>
                    <li class="sipButtons" style="max-height: 70px; text-align:center;">

                        <div id='divCallOptions' class='call-options btn-group call-options btn-group'
                            style="justify-content: center !important; ">
                            <!--                            <input type="button" class="btn menu-call-icon manual-btn" style="margin-left: 5px; margin-right:5px;;padding-left: 15px; padding-right: 15px;background-image: none" id="btnMute" />-->
                            <button id="btnMute" value="Mute" onclick='sipToggleMute();' style="background-image: none"
                                class="btn menu-call-icon mute-btn" data-toggle="dropdown">
                                <i style="font-size: 20px !important;" class="fa fa-volume-mute mute-icon"></i><span
                                    class="mute-text">Mute</span>
                            </button>

                            <button id="btnHoldResume" value="Hold" onclick='sipToggleHoldResume();'
                                style="background-image: none" class="btn menu-call-icon pause-btn"
                                data-toggle="dropdown">
                                <i style="font-size: 20px !important;" class="fa fa-pause pause-icon"></i><span
                                    class="pause-text">Pause</span>
                            </button>

                            <button id="btnTransfer" value="Transfer" onclick='sipTransfer();'
                                style="background-image: none" class="btn menu-call-icon transfer-btn"
                                data-toggle="dropdown">
                                <i style="font-size: 20px !important;"
                                    class="fa fa-exchange-alt transfer-icon"></i><span
                                    class="transfer-text">Transfer</span>
                            </button>
                            <!--<input type="button" class="btn menu-call-icon manual-btn" style="margin-left: 5px;; margin-right:5px;;padding-left: 15px;; padding-right: 15px;background-image: none" id="btnHoldResume" value="Hold" onclick='sipToggleHoldResume();' /> &nbsp;-->
                            <!--<input type="button" class="btn menu-call-icon manual-btn" style="margin-left: 5px;; margin-right:5px;;padding-left: 15px;; padding-right: 15px;background-image: none" onclick='sipTransfer();' /> &nbsp;-->
                            <!-- <input type="button" class="btn" style="" id="btnKeyPad" value="KeyPad" onclick='openKeyPad();' /> -->
                            <!-- </div> -->
                        </div>

                    </li>
                    <li class="sipButtons" style="text-align: center;">
                        <div class="btn-group" style="margin-top: 10px; justify-content: center;text-align: center;">
                            <a style="cursor:pointer;" onclick="$('#manual_call').modal();"
                                style="background-image: none" class="btn btn-info menu-call-icon manual-btn"
                                data-toggle="dropdown">Manual Call</a>

                            </a>

                        </div>
                    </li>


                    <li class="sipButtons"
                        style="max-height: 50px;width:265px; display:flex; font-size:10px; margin-bottom:10px">
                        <label id="txtCallStatus"></label>

                    </li>
                    <li class="sipButtons"
                        style="max-height: 30px;width:265px; display:box; font-size:10px; margin-top:10px">

                        <label style="" id="txtRegStatus"></label>
                        <object id="fakePluginInstance" classid="clsid:69E4A9D1-824C-40DA-9680-C7424A27B6A0"
                            style="visibility:hidden;"> </object>
                    </li>
                @endif


                {{-- /// CALL BUTTONS END --}}

            </ul>

        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->





{{-- <li><a href="{{url(get_guard().'/select_deposit')}}">{{__("Deposit")}}</a></li> --}}

{{-- <li><a href="{{url(get_guard().'/internal_transfer')}}">{{__("Intern Transfer")}}</a></li> --}}

{{-- <li>
                   <a href="{{url(get_guard().'/account_closure')}}" class="waves1-effect"><div class="icon_sizer inactive_icon"><i class="far menuIcon fa-times-circle"></i></div><span>{{__("Account Closure")}} </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span> </a>
                </li> --}}

{{-- <li>
                    <a href="{{url(get_guard().'/internal_transfer')}}" class="waves1-effect"><div class="icon_sizer inactive_icon"><i class="far menuIcon fa-times-circle"></i></div><span>{{__("Internal Transfer")}} </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span> </a>
                 </li> --}}
{{-- <li>
                    <a href="{{url(get_guard().'/news')}}" class="waves1-effect"><div class="icon_sizer {{ (request()->is(get_guard().'/news')) ? 'active_icon' : 'inactive_icon' }}"><i class="far fa-newspaper menuIcon"></i></div><span>{{__("News")}} </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                </li> --}}
{{-- <li>
                    <a href="{{url(get_guard().'/emails')}}" class="waves1-effect"><div class="icon_sizer  {{ (request()->is('/emails')) ? 'active_icon' : 'inactive_icon' }}"> <i class="fa fa-envelope-open-text menuIcon"></i> </div><span> {{__("Sendgrid Emails")}}</span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
               </li> --}}
{{-- <li>
                    <a href="{{url(get_guard().'/closure_requests')}}" class="waves1-effect"><div class="icon_sizer  {{ (request()->is('/closure_requests')) ? 'active_icon' : 'inactive_icon' }}"> <i class="far menuIcon fa-times-circle"></i> </div><span> {{__("Closure Requests")}}</span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                </li> --}}
{{-- <li>
                    <a href="{{url(get_guard().'/fill_survey')}}" class="waves1-effect"><div class="icon_sizer {{ (request()->is(get_guard().'/fill_survey')) ? 'active_icon' : 'inactive_icon' }}"><i class="fa fa-question menuIcon"> </i></div><span> {{__("Questionario")}} </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                </li> --}}
{{-- <li>
                    <a href="{{url(get_guard().'/info')}}"  class="waves1-effect"><div class="icon_sizer inactive_icon"><i class="fa fa-info-circle menuIcon"></i></div><span class="text-center">{{__("Info")}} </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                </li> --}}

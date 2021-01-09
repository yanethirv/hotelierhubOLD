    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav bookmark-icons">
                            <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-shopping-cart"></i></a>
                                <ul class="dropdown-menu dropdown-menu-media dropdown-cart dropdown-menu-right">
                                    <li class="dropdown-menu-header">
                                        <div class="dropdown-header m-0 p-2">
                                            <h3 class="white">In Your Cart</h3>
                                        </div>
                                    </li>
                                    <li class="scrollable-container">
                                        @include('shop.cart')
                                    </li>
                                    <li class="dropdown-menu-footer">
                                        <a class="dropdown-item p-1 text-center text-primary" href="{{ route('checkout') }}">
                                            <i class="feather icon-shopping-cart align-middle"></i>
                                            <span class="align-middle text-bold-600"> {{ __("Checkout") }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown dropdown-notification nav-item">
                                <a class="nav-link nav-link-label" href="" data-toggle="dropdown">
                                    <i class="ficon feather icon-bell"></i>
                                    @if ($count = Auth::user()->unreadNotifications->count())
                                        <span class="badge badge-pill badge-primary badge-up">{{ $count }}</span>
                                    @endif
                                </a>
                                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                    <li class="dropdown-menu-header">
                                        <div class="dropdown-header m-0 p-2">
                                            @if ($count = Auth::user()->unreadNotifications->count())
                                                <h3 class="white">{{ $count }} {{ __("New") }}</h3><span class="notification-title">{{ __("App Notifications") }}</span>
                                            @else
                                            <h3 class="white">0 {{ __("New") }}</h3><span class="notification-title">{{ __("App Notifications") }}</span>
                                            @endif
                                        </div>
                                    </li>
                                    <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="{{ route('notifications.index') }}">{{ __("View all notifications") }}</a></li>
                                </ul>
                            </li>

                            <!-- li.nav-item.mobile-menu.d-xl-none.mr-auto-->
                            <!--   a.nav-link.nav-menu-main.menu-toggle.hidden-xs(href='#')-->
                            <!--     i.ficon.feather.icon-menu-->
                            <!--<li class="nav-item d-none d-lg-block"><a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="Todo"><i class="ficon feather icon-check-square"></i></a></li>
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="Chat"><i class="ficon feather icon-message-square"></i></a></li>
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="Email"><i class="ficon feather icon-mail"></i></a></li>
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="Calendar"><i class="ficon feather icon-calendar"></i></a></li>-->
                        </ul>
                    </div>
                    <ul class="nav navbar-nav float-right">
                        

                       {{--   <li class="nav-item d-none d-lg-block">
                            <a class="nav-link nav-link-label" href="{{ route('notifications.index') }}" title="Notifications">
                                <i class="ficon feather icon-bell"></i>
                                @if ($count = Auth::user()->notifications->count())
                                    <span class="badge badge-pill badge-primary badge-up">{{ $count }}</span>
                                @endif
                            </a>
                        </li>--}}

         
                        

                        {{--  
                        <li class="dropdown dropdown-notification nav-item">
                            <a class="nav-link nav-link-label" href="{{ route('notifications.index') }}" data-toggle="dropdown">
                                <i class="ficon feather icon-bell"></i>
                                @if ($count = Auth::user()->notifications->count())
                                    <span class="badge badge-pill badge-primary badge-up">{{ $count }}</span>
                                @endif
                            </a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <div class="dropdown-header m-0 p-2">
                                        @if ($count = Auth::user()->notifications->count())
                                            <h3 class="white">{{ $count }} New</h3><span class="notification-title">App Notifications</span>
                                        @else
                                        <h3 class="white">0 New</h3><span class="notification-title">App Notifications</span>
                                        @endif
                                    </div>
                                </li>
                                <li class="scrollable-container media-list"><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-plus-square font-medium-5 primary"></i></div>
                                            <div class="media-body">
                                                <h6 class="primary media-heading">You have new order!</h6><small class="notification-text"> Are your going to meet me tonight?</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">9 hours ago</time></small>
                                        </div>
                                    </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-download-cloud font-medium-5 success"></i></div>
                                            <div class="media-body">
                                                <h6 class="success media-heading red darken-1">99% Server load</h6><small class="notification-text">You got new order of goods.</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">5 hour ago</time></small>
                                        </div>
                                    </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-alert-triangle font-medium-5 danger"></i></div>
                                            <div class="media-body">
                                                <h6 class="danger media-heading yellow darken-3">Warning notifixation</h6><small class="notification-text">Server have 99% CPU usage.</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Today</time></small>
                                        </div>
                                    </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-check-circle font-medium-5 info"></i></div>
                                            <div class="media-body">
                                                <h6 class="info media-heading">Complete the task</h6><small class="notification-text">Cake sesame snaps cupcake</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last week</time></small>
                                        </div>
                                    </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-file font-medium-5 warning"></i></div>
                                            <div class="media-body">
                                                <h6 class="warning media-heading">Generate monthly report</h6><small class="notification-text">Chocolate cake oat cake tiramisu marzipan</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last month</time></small>
                                        </div>
                                    </a></li>
                                <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="javascript:void(0)">View all notifications</a></li>
                            </ul>
                        </li>
                        --}}

                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none">
                                    <!--<span class="user-name text-bold-600 pr-1">{{ Auth::user()->name }} -->
                                    <p class="user-name font-weight-bolder mb-0"> {{ Auth::user()->name }}</p><i class="feather icon-power"></i></span>
                                    <span class="user-status"><img src="{{ asset(Auth::user()->avatar) }}" alt="avatar" height="40" width="40" style="border-radius: 50%"></span>
                  
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('profile.index') }}""><i class="feather icon-user"></i> {{ __("Edit Profile") }}</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('update-password.edit',[Auth::user()->id]) }}"><i class="feather icon-user"></i> {{ __("Change Password") }}</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="feather icon-power"></i> {{ __("Logout") }}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->
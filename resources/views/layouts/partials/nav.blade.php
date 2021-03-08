<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav bookmark-icons">
                        <!-- li.nav-item.mobile-menu.d-xl-none.mr-auto-->
                        <!--   a.nav-link.nav-menu-main.menu-toggle.hidden-xs(href='#')-->
                        <!--     i.ficon.feather.icon-menu-->
                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-todo.html" data-toggle="tooltip" data-placement="top" title="Todo"><i class="ficon feather icon-check-square"></i></a></li>
                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-chat.html" data-toggle="tooltip" data-placement="top" title="Chat"><i class="ficon feather icon-message-square"></i></a></li>
                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-email.html" data-toggle="tooltip" data-placement="top" title="Email"><i class="ficon feather icon-mail"></i></a></li>
                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-calender.html" data-toggle="tooltip" data-placement="top" title="Calendar"><i class="ficon feather icon-calendar"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i class="ficon feather icon-star warning"></i></a>
                            <div class="bookmark-input search-input">
                                <div class="bookmark-input-icon"><i class="feather icon-search primary"></i></div>
                                <input class="form-control input" type="text" placeholder="Explore Vuexy..." tabindex="0" data-search="template-list">
                                <ul class="search-list search-list-bookmark"></ul>
                            </div>
                            <!-- select.bookmark-select-->
                            <!--   option Chat-->
                            <!--   option email-->
                            <!--   option todo-->
                            <!--   option Calendar-->
                        </li>
                    </ul>
                </div>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-language nav-item">
                        <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="flag-icon flag-icon-us"></i><span class="selected-language">{{ __("English") }}</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                            <a class="dropdown-item" href="#" data-language="en"><i class="flag-icon flag-icon-us"></i>{{ __("English") }}</a>
                            <a class="dropdown-item" href="#" data-language="es"><i class="flag-icon flag-icon-es"></i>{{ __("Spanish") }}</a>
                        </div>
                    </li>
                    <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-shopping-cart"></i></a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-cart dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <div class="dropdown-header m-0 p-2">
                                    <h3 class="white">{{ __("In Your Cart") }}</h3>
                                </div>
                            </li>
                            <li class="scrollable-container">
                                @include('shop.cart')
                            </li>
                            <li class="dropdown-menu-footer">
                                <a class="dropdown-item p-1 text-center text-primary" href="{{ route('checkout') }}">
                                    <i class="feather icon-shopping-cart align-middle"></i>
                                    <span class="align-middle text-bold-600">{{ __("Checkout") }}</span>
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
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none">
                                <span class="user-name text-bold-600">{{ Auth::user()->name }} {{ Auth::user()->surname }}</span>
                                <span class="user-status">{{ Auth::user()->status }}</span>
                            </div>
                            <span><img class="round" src="{{ asset(Auth::user()->avatar) }}" alt="avatar" height="40" width="40"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('profile.index') }}""><i class="feather icon-user"></i> {{ __("Edit Profile") }}</a>
                            <div class="dropdown-divider"></div>

                            @role('user|hotelier')
                            <a class="dropdown-item" href="{{ route('hotel-profile.index') }}""><i class="fa fa-building-o"></i> {{ __("Edit Hotel Profile") }}</a>
                            <div class="dropdown-divider"></div>
                            @endrole

                            <a class="dropdown-item" href="{{ route('update-password.edit',[Auth::user()->id]) }}"><i class="feather icon-lock"></i> {{ __("Change Password") }}</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="feather icon-power"></i> {{ __("Logout") }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
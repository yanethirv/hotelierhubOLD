    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
              <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ route('home') }}">
                      <h2 class="brand-text mb-0">HOTELIER HUB</h2>
                  </a></li>
              <!--<li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>-->
          </ul>
      </div>
      <div class="shadow-bottom"></div>
      <div class="main-menu-content">
          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
              <li class=" nav-item"><a href="{{ route('home') }}">
                  <i class="feather icon-home"></i>
                  <span class="menu-title" data-i18n="Dashboard">{{ __("Dashboard") }}</span></a>
              </li>

                @role('super-admin|admin')
                    <li class=" navigation-header"><span>{{ __("User Management") }}</span></li>
                @endrole

                @role('super-admin')
                    <li class="{{ (request()->is('permissions')) ? 'active' : '' }}"><a href="{{url('permissions')}}"><i class="feather icon-lock"></i><span class="menu-title">{{ __("Permissions") }}</span></a></li>
                @endrole

                @role('super-admin|admin')
                    <li {{Route::is('role.edit')? 'class=active':''}} class="{{ (request()->is('roles')) ? 'active' : '' }}"><a href="{{url('roles')}}"><i class="feather icon-settings"></i><span class="menu-title">{{ __("Roles") }}</span></a></li>
                    <li {{Route::is('users.edit')? 'class=active':''}} class="{{ (request()->is('users')) ? 'active' : '' }}"><a href="{{url('users')}}"><i class="feather icon-users"></i><span class="menu-title">{{ __("Users") }}</span></a>
                @endrole

                @role('super-admin|admin')
                    <li class="navigation-header"><span>{{ __("Marketplace Management") }}</span></li>
                    {{--  <li {{Route::is('plans.create')? 'class=active':''}} class=" nav-item"><a href="{{ route('plans.create') }}"><i class="feather icon-plus"></i><span class="menu-title">Crear Plan</span></a></li>--}}
                    <li class="{{ (request()->is('types')) ? 'active' : '' }}"><a href="{{url('types')}}"><i class="fa fa-tag"></i><span class="menu-title">{{ __("Types") }}</span></a></li>
                    <li class="{{ (request()->is('services')) ? 'active' : '' }}"><a href="{{ route('services') }}"><i class="fa fa-rocket"></i><span class="menu-title">{{ __("Services") }}</span></a></li>
                    <li class="{{ (request()->is('suscriptions')) ? 'active' : '' }}"><a href="{{ route('suscriptions') }}"><i class="fa fa-diamond"></i><span class="menu-title">{{ __("Subscriptions") }}</span></a></li>
                @endrole

                @role('super-admin|admin')
                    <li class="navigation-header"><span>{{ __("Requests Management") }}</span></li>

                    <li class="{{ (request()->is('activations-request')) ? 'active' : '' }}"><a href="{{ route('activations-request') }}"><i class="fa fa-tag"></i><span class="menu-title">{{ __("Activation Services Request") }}</span></a></li>
                    <li class="{{ (request()->is('services-request')) ? 'active' : '' }}"><a href="{{ route('services-request') }}"><i class="fa fa-tags"></i><span class="menu-title">{{ __("Payment Services Request") }}</span></a></li>

                    <li class="{{ (request()->is('subscriptions-request')) ? 'active' : '' }}"><a href="{{ route('subscriptions-request') }}"><i class="fa fa-diamond"></i><span class="menu-title">{{ __("Subscriptions Request") }}</span></a></li>
                @endrole

                <li class="navigation-header"><span>{{ __("User Account") }}</span></li>

                <li {{Route::is('update-password.edit')? 'class=active':''}} class="nav-item"><a href="{{ route('update-password.edit',[Auth::user()->id]) }}"><i class="feather icon-unlock"></i><span class="menu-title">{{ __("Change Password") }}</span></a></li>
                <li {{Route::is('profile.index')? 'class=active':''}} class="nav-item"><a href="{{ route('profile.index') }}"><i class="feather icon-user"></i><span class="menu-title">{{ __("Edit Profile") }}</span></a></li>

                @role('user')
                <li {{Route::is('hotel-profile.index')? 'class=active':''}} class="nav-item"><a href="{{ route('hotel-profile.index') }}"><i class="fa fa-building-o"></i><span class="menu-title">{{ __("Edit Hotel Profile") }}</span></a></li>
                @endrole
                
                @role('super-admin|user')
                    <li {{Route::is('billing.credit_card_form')? 'class=active':''}} class="nav-item"><a href="{{ route('billing.credit_card_form') }}"><i class="fa fa-credit-card"></i><span class="menu-title">{{ __("My Card") }}</span></a></li>
                    <li {{Route::is('orders.index')? 'class=active':''}} class="nav-item"><a href="{{ route('orders.index') }}"><i class="fa fa-list"></i><span class="menu-title">{{ __("My Orders") }}</span></a></li>
                @endrole

                @role('super-admin|user')
                    <li class="navigation-header"><span>{{ __("Marketplace") }}</span></li>
                    <li class="{{ (request()->is('checkout')) ? 'active' : '' }}"><a href="{{url('checkout')}}"><i class="feather icon-shopping-cart"></i><span class="menu-title">{{ __("Checkout") }}</span></a></li>
                    {{--  <li class="nav-item has-sub open"><a href="#"><i class="fa fa-rocket"></i><span class="menu-title">{{ __("Services") }}</span></a>
                        <ul class="menu-content" style="">
                            <li {{Route::is('shop')? 'class=active':''}} class="is-shown"><a href="{{ route('shop') }}"><i class="feather icon-circle"></i><span class="menu-title">{{ __("One Time") }}</span></a></li>
                            <li {{Route::is('services-recurring.index')? 'class=active':''}} class="is-shown"><a href="{{ route('services-recurring.index') }}"><i class="feather icon-circle"></i><span class="menu-title">{{ __("Recurring") }}</span></a></li>
                        </ul>
                    </li>--}}
                    <li {{Route::is('activation-services')? 'class=active':''}} class="nav-item"><a href="{{ route('activation-services') }}"><i class="fa fa-tag"></i><span class="menu-title">{{ __("Request a Activation") }}</span></a></li>
                    <li {{Route::is('shop')? 'class=active':''}} class="nav-item"><a href="{{ route('shop') }}"><i class="fa fa-tags"></i><span class="menu-title">{{ __("Services-Buy Now") }}</span></a></li>
                    <li {{Route::is('plans.index')? 'class=active':''}} class="nav-item"><a href="{{ route('plans.index') }}"><i class="fa fa-diamond"></i><span class="menu-title">{{ __("Subscriptions") }}</span></a></li>
                @endrole

                @role('super-admin|admin')
                <li class="navigation-header"><span>{{ __("Reports") }}</span></li>
                <li {{Route::is('charts')? 'class=active':''}} class="nav-item"><a href="{{ route('charts') }}"><i class="feather icon-bar-chart-2"></i><span class="menu-title">{{ __("Charts") }}</span></a></li>
                @endrole

               
                <li class="navigation-header"><span>{{ __("Notifications") }}</span></li>
                @role('super-admin|admin')
                <li {{Route::is('messages.create')? 'class=active':''}} class="nav-item"><a href="{{ route('messages.create') }}"><i class="fa fa-paper-plane-o"></i><span class="menu-title">{{ __("Send Message") }}</span></a></li>
                <li {{Route::is('massives.create')? 'class=active':''}} class="nav-item"><a href="{{ route('massives.create') }}"><i class="fa fa-paper-plane"></i><span class="menu-title">{{ __("Send Massive Message") }}</span></a></li>
                @endrole
                <li {{Route::is('notifications.index')? 'class=active':''}} class="nav-item"><a href="{{ route('notifications.index') }}"><i class="feather icon-bell"></i><span class="menu-title">{{ __("Notifications") }}</span></a></li>
                

                @role('user')
                <li class="navigation-header"><span>{{ __("Support") }}</span></li>
                
                <li {{Route::is('messages.create')? 'class=active':''}} class="nav-item"><a href="{{ route('messages.create') }}"><i class="fa fa-paper-plane-o"></i><span class="menu-title">{{ __("Send Request") }}</span></a></li>
                @endrole
                <!--<li class="nav-item"><a href="#"><i class="feather icon-folder"></i><span class="menu-title" data-i18n="Documentation">{{ __("Documentation") }}</span></a></li>
                <li class="nav-item"><a href="#"><i class="feather icon-life-buoy"></i><span class="menu-title" data-i18n="Raise Support">{{ __("Support") }}</span></a></li>-->
          </ul>
      </div>
  </div>
  <!-- END: Main Menu-->
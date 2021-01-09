@extends('layouts.vuexy')

@section('title')
{{ __("Change Password") }}
@endsection

@section('extra-css')
@endsection

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __("Dashboard") }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __("Change Password") }}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-7 mx-auto">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                        <form class="form-horizontal form-label-left" action="{{ route('update-password.update',[$user->id]) }}" method="post" novalidate>
                                            @csrf
                                            @method('PATCH') 
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="account-old-password">{{ __("Current Password") }}</label>
                                                            <input type="password" class="form-control" name="oldpassword" required placeholder="{{ __("Current Password") }}" data-validation-required-message="This old password field is required">
                                                        </div>
                                                        @error('oldpassword') <span class="text-danger">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="account-new-password">{{ __("New Password") }}</label>
                                                            <input type="password" id="newpassword" name="newpassword" class="form-control" placeholder="{{ __("New Password") }}" required data-validation-required-message="The password field is required" minlength="6">
                                                        </div>
                                                        @error('newpassword') <span class="text-danger">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="account-retype-new-password">{{ __("Confirm New Password") }}</label>
                                                            <input type="password"  id="confirmpassword" name="confirmpassword" class="form-control" required  placeholder="{{ __("Confirm New Password") }}" data-validation-required-message="The Confirm password field is required" minlength="6">
                                                        </div>
                                                        @error('confirmpassword') <span class="text-danger">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <a href="{{ route('home') }}" class="btn btn-outline-primary">{{ __("Back") }}</a>
                                                    <button type="submit" class="btn btn-primary float-right">{{ __("Save") }}</button>
                                                </div>
                                            </div>
                                        </form>
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

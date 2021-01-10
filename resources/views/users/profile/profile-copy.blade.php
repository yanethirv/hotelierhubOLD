@extends('layouts.vuexy')

@section('title')
{{ __("Edit Profile") }}
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
                                    <li class="breadcrumb-item active">{{ __("Edit Profile") }}
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
                                    <form id="form_validation" method="POST" action="{{ route('profile.update',$user->id) }}" enctype="multipart/form-data" novalidate>
                                        @csrf
                                        <input name="_method" type="hidden" value="PUT">
                                        <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                            <div class="media">
                                                <img src="{{ asset(Auth::user()->avatar) }}" class="rounded mr-75" alt="profile image" height="120" width="120">
                                                <div class="media-body mt-75">
                                                    <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                        <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer" for="account-upload">Upload new photo</label>
                                                        <input type="file" id="account-upload"  @error('avatar') is-invalid @enderror name="avatar" hidden>
                                                            @error('avatar') <span class="text-danger">{{ $message }}</span>@enderror
                                                    </div>
                                                    <p class="text-muted ml-75 mt-50"><small>Allowed JPG, SVG or PNG. Max size of 5000kB</small></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="account-name">{{ __("Name") }}</label>
                                                            <input type="text" class="form-control @error('name') is-invalid @enderror"  name="name" value="{{$user->name}}" required data-validation-required-message="This name field is required">
                                                            @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="account-surname">{{ __("Surname") }}</label>
                                                            <input type="text" class="form-control" @error('surname') is-invalid @enderror name="surname" value="{{$user->surname}}" required data-validation-required-message="This surname field is required">
                                                            @error('surname') <span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="account-e-mail">{{ __("Email") }}</label>
                                                            <input type="email" class="form-control"  @error('email') is-invalid @enderror name="email" value="{{$user->email}}" required data-validation-required-message="This email field is required">
                                                            @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="account-company">{{ __("Mobile") }}</label>
                                                        <input type="text" class="form-control" @error('mobile') is-invalid @enderror name="mobile" value="{{$user->mobile ? $user->mobile:old('mobile')}}" required data-validation-required-message="This mobile field is required"">
                                                        @error('mobile') <span class="text-danger">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <a href="{{ route('home') }}" class="btn btn-outline-primary">{{ __("Back") }}</a>
                                                    <button type="submit" class="btn btn-primary float-right">{{ __("Save") }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- account setting page end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <!-- Form wizard with step validation section start -->
                <section id="validation">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{ __("Edit Profile") }}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form action="#" class="steps-validation wizard-circle">
                                            <!-- Step 1 -->
                                            <h6><i class="step-icon feather icon-user"></i>{{ __("Step 1") }}</h6>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">
                                                                {{ __("Name") }}
                                                            </label>
                                                            <input type="text" class="form-control required @error('name') is-invalid @enderror" id="name" name="name" value="{{$user->name}}">
                                                            @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="surname">
                                                                {{ __("Surname") }}
                                                            </label>
                                                            <input type="text" class="form-control required @error('surname') is-invalid @enderror" id="surname" name="surname" value="{{$user->surname}}">
                                                            @error('surname') <span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="email">
                                                                {{ __("Email") }}
                                                            </label>
                                                            <input type="email" class="form-control required @error('email') is-invalid @enderror" id="email" name="email" value="{{$user->email}}">
                                                            @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="mobile">
                                                                {{ __("Mobile") }}
                                                            </label>
                                                            <input type="text" class="form-control required @error('mobile') is-invalid @enderror" id="mobile" name="mobile" value="{{$user->mobile}}">
                                                            @error('mobile') <span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <!-- Step 2 -->
                                            <h6><i class="step-icon feather icon-briefcase"></i>{{ __("Step 2") }}</h6>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="position_hotel">
                                                            {{ __("Position in the hotel") }}
                                                        </label>
                                                        <select class="custom-select form-control" id="position_hotel" name="position_hotel">
                                                           <!-- <option value="Owner">{{ __("Owner") }}</option>
                                                            <option value="CEO">{{ __("CEO") }}</option>
                                                            <option value="General Manager">{{ __("General Manager") }}</option>
                                                            <option value="Revenue Manager">{{ __("Revenue Manager") }}</option>
                                                            <option value="Sales and Marketing">{{ __("Sales and Marketing") }}</option>
                                                            <option value="Front Office Manager">{{ __("Front Office Manager") }}</option>
                                                            <option value="Consultant">{{ __("Consultant") }}</option>
                                                            <option value="Asset Manager">In {{ __("Asset Manager") }}</option>
                                                            <option value="Other">{{ __("Other") }}</option>-->
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="short_description">{{ __("Short Description") }}</label>
                                                            <textarea name="short_description" id="short_description" rows="4" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <!-- Step 3 -->
                                            <h6><i class="step-icon feather icon-image"></i>{{ __("Step 3") }}</h6>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="eventName3">
                                                                Event Name
                                                            </label>
                                                            <input type="text" class="form-control required" id="eventName3" name="eventName">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="eventStatus3">
                                                                Event Status
                                                            </label>
                                                            <select class="custom-select form-control required" id="eventStatus3" name="eventStatus">
                                                                <option value="Planning">Planning</option>
                                                                <option value="In Progress">In Progress</option>
                                                                <option value="Finished">Finished</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Form wizard with step validation section end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

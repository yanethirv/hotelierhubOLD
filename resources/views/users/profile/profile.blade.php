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
                                                            <label for="account-name">{{ __("Full Name") }}</label>
                                                            <input type="text" class="form-control" @error('name') is-invalid @enderror name="name" value="{{$user->name}}" required data-validation-required-message="This name field is required">
                                                            @error('name') <span class="text-danger">{{ $message }}</span>@enderror
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
                                                        <input type="text" class="form-control" @error('mobile') is-invalid @enderror name="mobile" value="{{$user->mobile ? $user->mobile:old('mobile')}}">
                                                        @error('mobile') <span class="text-danger">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="name_hotel">{{ __("Name Hotel") }}</label>
                                                            <input type="text" class="form-control" @error('name_hotel') is-invalid @enderror name="name_hotel" value="{{$user->name_hotel ? $user->name_hotel:old('name_hotel')}}" required data-validation-required-message="This name field is required">
                                                            @error('name_hotel') <span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="description">{{ __("Description") }}</label>
                                                            <input type="text" class="form-control" @error('description') is-invalid @enderror name="description" value="{{$user->description ? $user->description:old('description')}}" required data-validation-required-message="This name field is required">
                                                            @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="instagram">{{ __("Instagram") }}</label>
                                                            <input type="text" class="form-control" @error('instagram') is-invalid @enderror name="instagram" value="{{$user->instagram ? $user->instagram:old('instagram')}}" required data-validation-required-message="This name field is required">
                                                            @error('instagram') <span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="facebook">{{ __("Facebook") }}</label>
                                                            <input type="text" class="form-control" @error('facebook') is-invalid @enderror name="facebook" value="{{$user->facebook ? $user->facebook:old('facebook')}}" required data-validation-required-message="This name field is required">
                                                            @error('facebook') <span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="linkedin">{{ __("LinkedIn") }}</label>
                                                            <input type="text" class="form-control" @error('linkedin') is-invalid @enderror name="linkedin" value="{{$user->linkedin ? $user->linkedin:old('linkedin')}}" required data-validation-required-message="This name field is required">
                                                            @error('linkedin') <span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="twitter">{{ __("Twitter") }}</label>
                                                            <input type="text" class="form-control" @error('twitter') is-invalid @enderror name="twitter" value="{{$user->twitter ? $user->twitter:old('twitter')}}" required data-validation-required-message="This name field is required">
                                                            @error('twitter') <span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="frontdesk_phone">{{ __("Front desk phone") }}</label>
                                                            <input type="text" class="form-control" @error('frontdesk_phone') is-invalid @enderror name="frontdesk_phone" value="{{$user->frontdesk_phone ? $user->frontdesk_phone:old('frontdesk_phone')}}" required data-validation-required-message="This name field is required">
                                                            @error('frontdesk_phone') <span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="reservations_phone">{{ __("Reservations phone") }}</label>
                                                            <input type="text" class="form-control" @error('reservations_phone') is-invalid @enderror name="reservations_phone" value="{{$user->reservations_phone ? $user->reservations_phone:old('reservations_phone')}}" required data-validation-required-message="This name field is required">
                                                            @error('reservations_phone') <span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="frontdesk_email">{{ __("Front desk email") }}</label>
                                                            <input type="text" class="form-control" @error('frontdesk_email') is-invalid @enderror name="frontdesk_email" value="{{$user->frontdesk_email ? $user->frontdesk_email:old('frontdesk_email')}}" required data-validation-required-message="This name field is required">
                                                            @error('frontdesk_email') <span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="reservations_email">{{ __("Reservations email") }}</label>
                                                            <input type="text" class="form-control" @error('reservations_email') is-invalid @enderror name="reservations_email" value="{{$user->reservations_email ? $user->reservations_email:old('reservations_email')}}" required data-validation-required-message="This name field is required">
                                                            @error('reservations_email') <span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="billing_email">{{ __("Billing email") }}</label>
                                                            <input type="text" class="form-control" @error('billing_email') is-invalid @enderror name="billing_email" value="{{$user->billing_email ? $user->billing_email:old('billing_email')}}" required data-validation-required-message="This name field is required">
                                                            @error('billing_email') <span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="location">{{ __("Location") }}</label>
                                                            <input type="text" class="form-control" @error('location') is-invalid @enderror name="location" value="{{$user->location ? $user->location:old('location')}}" required data-validation-required-message="This name field is required">
                                                            @error('location') <span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="floor_number">{{ __("Floor Number") }}</label>
                                                            <input type="text" class="form-control" @error('floor_number') is-invalid @enderror name="floor_number" value="{{$user->floor_number ? $user->floor_number:old('floor_number')}}" required data-validation-required-message="This name field is required">
                                                            @error('floor_number') <span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="amenities">{{ __("Amenities") }}</label>
                                                            <input type="text" class="form-control" @error('amenities') is-invalid @enderror name="amenities" value="{{$user->amenities ? $user->amenities:old('amenities')}}" required data-validation-required-message="This name field is required">
                                                            @error('amenities') <span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
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
@endsection

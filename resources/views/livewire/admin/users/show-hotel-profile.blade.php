@extends('layouts.vuexy')

@section('title')
{{ __("Show Hotel Profile") }}
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
                                    <li class="breadcrumb-item"><a href="{{url('users')}}">{{ __("Users") }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __("Show Hotel Profile") }}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="content-body">
                <!-- account setting page start -->
                <section id="page-account-settings">
                    <div class="row">
                        <!-- left menu section -->
                        <div class="col-md-3 mb-2 mb-md-0">
                            <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                        <i class="feather icon-globe mr-50 font-medium-3"></i>
                                        {{ __("General") }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                                        <i class="feather icon-twitter mr-50 font-medium-3"></i>
                                        {{ __("Social") }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-info" data-toggle="pill" href="#account-vertical-info" aria-expanded="false">
                                        <i class="feather icon-phone mr-50 font-medium-3"></i>
                                        {{ __("Contact") }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-social" data-toggle="pill" href="#account-vertical-social" aria-expanded="false">
                                        <i class="feather icon-map-pin mr-50 font-medium-3"></i>
                                        {{ __("Location") }}
                                    </a>
                                </li>
                                <br>
                                <li class="nav-item">
                                    <a href="{{ route("hotel-profile.downloadProfile", ["hotel" => $hotel->id]) }}" class="btn btn-warning ml-0 ml-md-1">
                                        <i class="feather icon-download"></i> {{ __("Download Profile") }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- right content section -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                                <form id="form_validation" method="POST" action="{{ route('hotel-profile.update',$hotel->id) }}" enctype="multipart/form-data" novalidate>
                                                    @csrf
                                                    <input name="_method" type="hidden" value="PUT">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="name">{{ __("Hotel Name") }}</label>
                                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $hotel->name }}" required data-validation-required-message="This field is required">
                                                                    @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="description">{{ __("Hotel Description") }}</label>
                                                                    <textarea class="form-control @error('description') is-invalid @enderror" style="height:150px" name="description" placeholder="description" required data-validation-required-message="This field is required">{{ $hotel->description }}</textarea>
                                                                    @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="stars">{{ __("Stars") }}</label>
                                                                    <input type="text" class="form-control @error('stars') is-invalid @enderror" name="stars" value="{{ $hotel->stars }}" required data-validation-required-message="This field is required">
                                                                    @error('stars') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="range_rooms">{{ __("Range of Rooms") }}</label>
                                                                <div class="input-group">
                                                                    <select id="range_rooms" name="range_rooms" class="form-control">
                                                                        <option {{ ($hotel->range_rooms) == '0' ? 'selected' : '' }}  value="0">Choose</option>
                                                                        <option {{ ($hotel->range_rooms) == '1-5' ? 'selected' : '' }}  value="1-5">1-5</option>
                                                                        <option {{ ($hotel->range_rooms) == '6-10' ? 'selected' : '' }}  value="6-10">6-10</option>
                                                                        <option {{ ($hotel->range_rooms) == '11-15' ? 'selected' : '' }}  value="11-15">11-15</option>
                                                                        <option {{ ($hotel->range_rooms) == '16-20' ? 'selected' : '' }}  value="16-20">16-20</option>
                                                                        <option {{ ($hotel->range_rooms) == '21-30' ? 'selected' : '' }}  value="21-30">21-30</option>
                                                                        <option {{ ($hotel->range_rooms) == '31-40' ? 'selected' : '' }}  value="31-40">31-40</option>
                                                                        <option {{ ($hotel->range_rooms) == '41-100' ? 'selected' : '' }}  value="41-100">41-100</option>
                                                                      </select>
                                                                </div>
                                                                @error('range_rooms') <span class="text-danger">{{ $message }}</span>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="opening_date">{{ __("Opening Date") }}</label>
                                                                    <input type="text" class="form-control @error('opening_date') is-invalid @enderror" name="opening_date" value="{{ $hotel->opening_date }}" required data-validation-required-message="This field is required">
                                                                    @error('opening_date') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="floor_number">{{ __("Floor Number") }}</label>
                                                                    <input type="text" class="form-control @error('floor_number') is-invalid @enderror" name="floor_number" value="{{ $hotel->floor_number }}" required data-validation-required-message="This field is required">
                                                                    @error('floor_number') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="property_type">{{ __("Property Type") }}</label>
                                                                <div class="input-group">
                                                                    <select id="property_type" name="property_type" class="form-control">
                                                                        <option {{ ($hotel->property_type) == '0' ? 'selected' : '' }}  value="0">Choose</option>
                                                                        <option {{ ($hotel->property_type) == 'Apartments' ? 'selected' : '' }}  value="Apartments">Apartments</option>
                                                                        <option {{ ($hotel->property_type) == 'Boutique' ? 'selected' : '' }}  value="Boutique">Boutique</option>
                                                                        <option {{ ($hotel->property_type) == 'Bungalows' ? 'selected' : '' }}  value="Bungalows">Bungalows</option>
                                                                        <option {{ ($hotel->property_type) == 'Chalet' ? 'selected' : '' }}  value="Chalet">Chalet</option>
                                                                        <option {{ ($hotel->property_type) == 'Condo Hotel' ? 'selected' : '' }}  value="Condo Hotel">Condo Hotel</option>
                                                                        <option {{ ($hotel->property_type) == 'Glamping' ? 'selected' : '' }}  value="Glamping">Glamping</option>
                                                                        <option {{ ($hotel->property_type) == 'Guesthouse' ? 'selected' : '' }}  value="Guesthouse">Guesthouse</option>
                                                                        <option {{ ($hotel->property_type) == 'Hostal' ? 'selected' : '' }}  value="Hostal">Hostal</option>
                                                                        <option {{ ($hotel->property_type) == 'Hotel' ? 'selected' : '' }}  value="Hotel">Hotel</option>
                                                                        <option {{ ($hotel->property_type) == 'Motel' ? 'selected' : '' }}  value="Motel">Motel</option>
                                                                        <option {{ ($hotel->property_type) == 'Lodge' ? 'selected' : '' }}  value="Lodge">Lodge</option>
                                                                        <option {{ ($hotel->property_type) == 'Resort' ? 'selected' : '' }}  value="Resort">Resort</option>
                                                                        <option {{ ($hotel->property_type) == 'Vacation Rentals' ? 'selected' : '' }}  value="Vacation Rentals">Vacation Rentals</option>
                                                                    </select>
                                                                </div>
                                                                @error('property_type') <span class="text-danger">{{ $message }}</span>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column ">
                                                            <div class="col-1 pb-2">
                                                                <a href="{{ route('users') }}" class="btn btn-outline-primary">{{ __("Back") }}</a>
                                                            </div>
                                                            <div class="col-11 pb-2">
                                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">{{ __("Save
                                                                    changes") }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade " id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                                                <form id="form_validation" method="POST" action="{{ route('hotel-profile.update',$hotel->id) }}" enctype="multipart/form-data" novalidate>
                                                    @csrf
                                                    <input name="_method" type="hidden" value="PUT">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="instagram">{{ __("Instagram") }}</label>
                                                                    <input type="text" class="form-control @error('instagram') is-invalid @enderror" name="instagram" value="{{ $hotel->instagram }}" required data-validation-required-message="This field is required">
                                                                    @error('instagram') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="facebook">{{ __("Facebook") }}</label>
                                                                    <input type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{ $hotel->facebook }}" required data-validation-required-message="This field is required">
                                                                    @error('facebook') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="linkedin">{{ __("LinkedIn") }}</label>
                                                                    <input type="text" class="form-control @error('linkedin') is-invalid @enderror" name="linkedin" value="{{ $hotel->linkedin }}" required data-validation-required-message="This field is required">
                                                                    @error('linkedin') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="youtube">{{ __("Youtube") }}</label>
                                                                    <input type="text" class="form-control @error('linkedin') is-invalid @enderror" name="youtube" value="{{ $hotel->youtube }}" required data-validation-required-message="This field is required">
                                                                    @error('youtube') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="twitter">{{ __("Twitter") }}</label>
                                                                    <input type="text" class="form-control @error('twitter') is-invalid @enderror" name="twitter" value="{{ $hotel->twitter }}" required data-validation-required-message="This field is required">
                                                                    @error('twitter') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column ">
                                                            <div class="col-1 pb-2">
                                                                <a href="{{ route('users') }}" class="btn btn-outline-primary">{{ __("Back") }}</a>
                                                            </div>
                                                            <div class="col-11 pb-2">
                                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">{{ __("Save
                                                                    changes") }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="account-vertical-info" role="tabpanel" aria-labelledby="account-pill-info" aria-expanded="false">
                                                <form id="form_validation" method="POST" action="{{ route('hotel-profile.update',$hotel->id) }}" enctype="multipart/form-data" novalidate>
                                                    @csrf
                                                    <input name="_method" type="hidden" value="PUT">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="frontdesk_phone">{{ __("Front Desk Phone") }}</label>
                                                                    <input type="text" class="form-control @error('frontdesk_phone') is-invalid @enderror" name="frontdesk_phone" value="{{ $hotel->frontdesk_phone }}" required data-validation-required-message="This field is required">
                                                                    @error('frontdesk_phone') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="reservation_phone">{{ __("Reservation Phone") }}</label>
                                                                    <input type="text" class="form-control @error('reservation_phone') is-invalid @enderror" name="reservation_phone" value="{{ $hotel->reservation_phone }}" required data-validation-required-message="This field is required">
                                                                    @error('reservation_phone') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="frontdesk_email">{{ __("Front Desk Email") }}</label>
                                                                    <input type="text" class="form-control @error('frontdesk_email') is-invalid @enderror" name="frontdesk_email" value="{{ $hotel->frontdesk_email }}" required data-validation-required-message="This field is required">
                                                                    @error('frontdesk_email') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="reservation_email">{{ __("Reservation Email") }}</label>
                                                                    <input type="text" class="form-control @error('reservation_email') is-invalid @enderror" name="reservation_email" value="{{ $hotel->reservation_email }}" required data-validation-required-message="This field is required">
                                                                    @error('reservation_email') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="billing_contact_email">{{ __("Billing Contact Email") }}</label>
                                                                    <input type="text" class="form-control @error('billingcontact_email') is-invalid @enderror" name="billingcontact_email" value="{{ $hotel->billingcontact_email }}" required data-validation-required-message="This field is required">
                                                                    @error('billingcontact_email') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column ">
                                                            <div class="col-1 pb-2">
                                                                <a href="{{ route('users') }}" class="btn btn-outline-primary">{{ __("Back") }}</a>
                                                            </div>
                                                            <div class="col-11 pb-2">
                                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">{{ __("Save
                                                                    changes") }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade " id="account-vertical-social" role="tabpanel" aria-labelledby="account-pill-social" aria-expanded="false">
                                                <form id="form_validation" method="POST" action="{{ route('hotel-profile.update',$hotel->id) }}" enctype="multipart/form-data" novalidate>
                                                    @csrf
                                                    <input name="_method" type="hidden" value="PUT">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="country">{{ __("Country") }}</label>
                                                                    <input type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ $hotel->country }}" required data-validation-required-message="This field is required">
                                                                    @error('country') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="state">{{ __("State") }}</label>
                                                                    <input type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ $hotel->state }}" required data-validation-required-message="This field is required">
                                                                    @error('state') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="city">{{ __("City") }}</label>
                                                                    <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $hotel->city }}" required data-validation-required-message="This field is required">
                                                                    @error('city') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="address">{{ __("Address") }}</label>
                                                                    <textarea class="form-control @error('address') is-invalid @enderror" style="height:150px" name="address" placeholder="Address" required data-validation-required-message="This field is required">{{ $hotel->address }}</textarea>
                                                                    @error('address') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column ">
                                                            <div class="col-1 pb-2">
                                                                <a href="{{ route('users') }}" class="btn btn-outline-primary">{{ __("Back") }}</a>
                                                            </div>
                                                            <div class="col-11 pb-2">
                                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">{{ __("Save
                                                                    changes") }}</button>
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
                    </div>
                </section>
                <!-- account setting page end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

@section('extra-script')
    <script src="{{ asset('vendors/js/tables/ag-grid/ag-grid-community.min.noStyle.js') }}"></script>
@endsection
                
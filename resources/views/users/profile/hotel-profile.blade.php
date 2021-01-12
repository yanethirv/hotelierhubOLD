@extends('layouts.vuexy')

@section('title')
{{ __("Edit Hotel Profile") }}
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
                                    <li class="breadcrumb-item active">{{ __("Edit Hotel Profile") }}
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
                            </ul>
                        </div>
                        <!-- right content section -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                                <form id="form_validation" method="POST" action="{{ route('hotel-profile.update',$user->id) }}" enctype="multipart/form-data" novalidate>
                                                    @csrf
                                                    <input name="_method" type="hidden" value="PUT">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="name">{{ __("Hotel Name") }}</label>
                                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" required data-validation-required-message="This field is required">
                                                                    @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="description">{{ __("Hotel Description") }}</label>
                                                                    <textarea class="form-control @error('description') is-invalid @enderror" style="height:150px" name="description" placeholder="description" required data-validation-required-message="This field is required">   </textarea>
                                                                    @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="starts">{{ __("Starts") }}</label>
                                                                    <input type="text" class="form-control @error('starts') is-invalid @enderror" name="starts" value="" required data-validation-required-message="This field is required">
                                                                    @error('starts') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="opening_date">{{ __("Opening Date") }}</label>
                                                                    <input type="text" class="form-control @error('opening_date') is-invalid @enderror" name="opening_date" value="" required data-validation-required-message="This field is required">
                                                                    @error('opening_date') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="floor_number">{{ __("Floor Number") }}</label>
                                                                    <input type="text" class="form-control @error('floor_number') is-invalid @enderror" name="floor_number" value="" required data-validation-required-message="This field is required">
                                                                    @error('floor_number') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="property_type">{{ __("Property Type") }}</label>
                                                                    <input type="text" class="form-control @error('property_type') is-invalid @enderror" name="property_type" value="" required data-validation-required-message="This field is required">
                                                                    @error('property_type') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                                changes</button>
                                                            <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade " id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                                                <form id="form_validation" method="POST" action="{{ route('hotel-profile.update',$user->id) }}" enctype="multipart/form-data" novalidate>
                                                    @csrf
                                                    <input name="_method" type="hidden" value="PUT">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="instagram">{{ __("Instagram") }}</label>
                                                                    <input type="text" class="form-control @error('instagram') is-invalid @enderror" name="instagram" value="" required data-validation-required-message="This field is required">
                                                                    @error('instagram') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="facebook">{{ __("Facebook") }}</label>
                                                                    <input type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="" required data-validation-required-message="This field is required">
                                                                    @error('facebook') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="linkedin">{{ __("LinkedIn") }}</label>
                                                                    <input type="text" class="form-control @error('linkedin') is-invalid @enderror" name="linkedin" value="" required data-validation-required-message="This field is required">
                                                                    @error('linkedin') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="youtube">{{ __("Youtube") }}</label>
                                                                    <input type="text" class="form-control @error('linkedin') is-invalid @enderror" name="youtube" value="" required data-validation-required-message="This field is required">
                                                                    @error('youtube') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="twitter">{{ __("Twitter") }}</label>
                                                                    <input type="text" class="form-control @error('twitter') is-invalid @enderror" name="twitter" value="" required data-validation-required-message="This field is required">
                                                                    @error('twitter') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                                changes</button>
                                                            <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="account-vertical-info" role="tabpanel" aria-labelledby="account-pill-info" aria-expanded="false">
                                                <form id="form_validation" method="POST" action="{{ route('hotel-profile.update',$user->id) }}" enctype="multipart/form-data" novalidate>
                                                    @csrf
                                                    <input name="_method" type="hidden" value="PUT">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="front_desk_phone">{{ __("Front Desk Phone") }}</label>
                                                                    <input type="text" class="form-control @error('front_desk_phone') is-invalid @enderror" name="front_desk_phone" value="" required data-validation-required-message="This field is required">
                                                                    @error('front_desk_phone') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="reservation_phone">{{ __("Reservation Phone") }}</label>
                                                                    <input type="text" class="form-control @error('reservation_phone') is-invalid @enderror" name="reservation_phone" value="" required data-validation-required-message="This field is required">
                                                                    @error('reservation_phone') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="front_desk_email">{{ __("Front Desk Email") }}</label>
                                                                    <input type="text" class="form-control @error('front_desk_email') is-invalid @enderror" name="front_desk_email" value="" required data-validation-required-message="This field is required">
                                                                    @error('front_desk_email') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="reservation_email">{{ __("Reservation Email") }}</label>
                                                                    <input type="text" class="form-control @error('reservation_email') is-invalid @enderror" name="reservation_email" value="" required data-validation-required-message="This field is required">
                                                                    @error('reservation_email') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="billing_contact_email">{{ __("Billing Contact Email") }}</label>
                                                                    <input type="text" class="form-control @error('billing_contact_email') is-invalid @enderror" name="billing_contact_email" value="" required data-validation-required-message="This field is required">
                                                                    @error('billing_contact_email') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                                changes</button>
                                                            <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade " id="account-vertical-social" role="tabpanel" aria-labelledby="account-pill-social" aria-expanded="false">
                                                <form id="form_validation" method="POST" action="{{ route('hotel-profile.update',$user->id) }}" enctype="multipart/form-data" novalidate>
                                                    @csrf
                                                    <input name="_method" type="hidden" value="PUT">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="country">{{ __("Country") }}</label>
                                                                    <input type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="" required data-validation-required-message="This field is required">
                                                                    @error('country') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="state">{{ __("State") }}</label>
                                                                    <input type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="" required data-validation-required-message="This field is required">
                                                                    @error('state') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="city">{{ __("City") }}</label>
                                                                    <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="" required data-validation-required-message="This field is required">
                                                                    @error('city') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="address">{{ __("Address") }}</label>
                                                                    <textarea class="form-control @error('address') is-invalid @enderror" style="height:150px" name="address" placeholder="Address" required data-validation-required-message="This field is required">   </textarea>
                                                                    @error('address') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                                changes</button>
                                                            <button type="reset" class="btn btn-outline-warning">Cancel</button>
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
    </div>
    <!-- END: Content-->
@endsection

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
                                                        <label class="btn btn-md btn-warning ml-50 mb-50 mb-sm-0 cursor-pointer" for="account-upload">{{ __("Upload new photo") }}</label>
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
                                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required data-validation-required-message="This name field is required">
                                                            @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="account-surname">{{ __("Surname") }}</label>
                                                            <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{$user->surname}}" required data-validation-required-message="This surname field is required">
                                                            @error('surname') <span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label for="account-e-mail">{{ __("Email") }}</label>
                                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required data-validation-required-message="This email field is required">
                                                            @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="account-company">{{ __("Mobile") }}</label>
                                                        <input type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{$user->mobile ? $user->mobile:old('mobile')}}" required data-validation-required-message="This mobile field is required"">
                                                        @error('mobile') <span class="text-danger">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="account-company">{{ __("Position in the Hotel") }}</label>
                                                        <select class="custom-select form-control" id="position_id" name="position_id">
                                                            @foreach ($positions as $position)
                                                                <option value="{{ $position->id }}"
                                                                    @if ($position->id === $user->position_id)
                                                                        selected
                                                                    @endif
                                                                >
                                                                {{ $position->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('position_id') <span class="text-danger">{{ $message }}</span>@enderror
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
@endsection

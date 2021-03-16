@extends('layouts.vuexy')

@section('title')
{{ __("Create Restaurant") }}
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
                                    <li class="breadcrumb-item"><a href="{{route('rooms')}}">{{ __("Restaurants") }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __("Create Restaurant") }}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-7 mx-auto">
                    <div class="bg-white rounded-lg shadow-sm p-5">
                        <h3 class="mb-4 text-center">{{ __("Create Restaurant") }}</h3>
                        <form action="{{ route('restaurant.store') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="hotel_id" value="{{ Auth::user()->hotel->id }}">
                            
                            <div class="form-group">
                                <label class="form-label">{{ __("Restaurant name") }}</label>
                                <input type="text" name="name" class="form-control" placeholder="" value="{{
                                    old('name') ? old('name') : ""
                                }}" required>
                                @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">{{ __("How many pax") }}</label>
                                <input type="text" name="pax" class="form-control" placeholder="" value="{{
                                    old('pax') ? old('pax') : ""
                                }}" required>
                                @error('pax') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">{{ __("Open time") }}</label>
                                <input type="text" name="open_time" class="form-control" placeholder="" value="{{
                                    old('open_time') ? old('open_time') : ""
                                }}" required>
                                @error('open_time') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">{{ __("Closing time") }}</label>
                                <input type="text" name="closing_time" class="form-control" placeholder="" value="{{
                                    old('closing_time') ? old('closing_time') : ""
                                }}" required>
                                @error('closing_time') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">{{ __("Restaurant theme") }}</label>
                                <input type="text" name="theme" class="form-control" placeholder="" value="{{
                                    old('theme') ? old('theme') : ""
                                }}" required>
                                @error('theme') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group">
                                <label for="type_room">{{ __("Type") }}</label>
                                <select class="custom-select form-control" id="typerestaurant_id" name="typerestaurant_id">
                                    @foreach ($typerestaurants as $typerestaurant)
                                        <option value="{{ $typerestaurant->id }}">
                                        {{ $typerestaurant->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('typerestaurant_id') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">{{ __("Included") }}</label>
                                <input type="text" name="included" class="form-control" placeholder="" value="{{
                                    old('included') ? old('included') : ""
                                }}" required>
                                @error('included') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group">
                                <label for="type_room">{{ __("Location") }}</label>
                                <select class="custom-select form-control" id="locationrestaurant_id" name="locationrestaurant_id">
                                    @foreach ($locationrestaurants as $locationrestaurant)
                                        <option value="{{ $locationrestaurant->id }}">
                                        {{ $locationrestaurant->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('locationrestaurant_id') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <a href="{{route('restaurants')}}" class="btn btn-outline-primary">{{ __("Back") }}</a>
                            <button class="btn btn-primary float-right" type="submit">{{ __("Save") }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

@section('extra-script')
    <script src="{{ asset('vendors/js/tables/ag-grid/ag-grid-community.min.noStyle.js') }}"></script>
@endsection
                
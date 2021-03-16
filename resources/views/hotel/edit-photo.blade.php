@extends('layouts.vuexy')

@section('title')
{{ __("Edit Photo") }}
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
                                    <li class="breadcrumb-item"><a href="{{ route('hotel-photos') }}">{{ __("Photos") }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __("Edit Photo") }}
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
                        <h3 class="mb-4 text-center">{{ __("Edit Photo") }}</h3>
                        <form action="{{ route('photo.update',$photo->id) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                            @method('PUT')
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="hotel_id" value="{{ Auth::user()->hotel->id }}">
                            
                            <div class="form-group">
                                <label class="form-label">{{ __("Name") }}</label>
                                <input type="text" name="name" class="form-control" placeholder="" value="{{ $photo->name }}">
                                @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">{{ __("Location") }}</label>
                                <select name="location_id" class="form-control">
                                     @foreach ($locations as $location)
                                        <option value="{{ $location->id }}"
                                            @if ($location->id ===  $photo->location_id)
                                                selected
                                            @endif
                                        >
                                            {{ $location->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('location_id') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">{{ __("Photo") }}</label><br>
                                <img class="card-img-top" style="height: 300px; width: 50%; display: block;" src="{{ asset($photo->photo) }}">
                                    <br><br>
                                    <input type="file" name="photo">
                                @error('photo') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group">
                                <label for="status">{{ __("Status") }}</label>
                                <div class="input-group">
                                    <select class="form-control" name="status">
                                        <option value="active"
                                        @if ($photo->status === 'active')
                                            selected
                                        @endif
                                        >Active</option>

                                        <option value="inactive"
                                        @if ($photo->status === 'inactive')
                                            selected
                                        @endif
                                        >Inactive</option>
                                    </select>
                                </div>
                                @error('status') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <a href="{{ route('hotel-photos') }}" class="btn btn-outline-primary">{{ __("Back") }}</a>
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
                

@extends('layouts.vuexy')

@section('title')
{{ __("Create Subscription") }}
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
                                <li class="breadcrumb-item"><a href="{{route('home')}}">{{ __("Dashboard") }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('suscriptions') }}">{{ __("Subscriptions") }}</a>
                                </li>
                                <li class="breadcrumb-item active">{{ __("Create Subscription") }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-7 mx-auto">
                @if(session('message'))
                    <div class="alert alert-{{ session('message')[0] }}">
                        {!! session('message')[1] !!}
                    </div>
                @endif
                <div class="bg-white rounded-lg shadow-sm p-5">
                    <h3 class="mb-4 text-center"><i class="fa fa-diamond"></i>
                        {{ __("Create Subscription") }}</h3>
                    <!-- End -->

                    <div class="tab-content">
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <form action="{{ route("plans.store") }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="plan_name">{{ __("Name") }}</label>
                                    <div class="input-group">
                                        <input
                                            type="text"
                                            name="plan_name"
                                            placeholder="{{ __("Name") }}"
                                            class="form-control"
                                            required
                                            value="{{
                                                old('plan_name') ? old('plan_name') : ""
                                            }}"
                                        />
                                    </div>
                                    @error('plan_name') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="plan_price">{{ __("Price") }}</label>
                                    <div class="input-group">
                                        <input
                                            type="text"
                                            name="plan_price"
                                            placeholder="{{ __("Price") }}"
                                            class="form-control"
                                            required
                                            value="{{
                                                old('plan_price') ? old('plan_price') : ""
                                            }}"
                                        />
                                    </div>
                                    @error('plan_price') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="plan_cost">{{ __("Cost") }}</label>
                                    <div class="input-group">
                                        <input
                                            type="text"
                                            name="plan_cost"
                                            placeholder="{{ __("Cost") }}"
                                            class="form-control"
                                            required
                                            value="{{
                                                old('plan_cost') ? old('plan_cost') : ""
                                            }}"
                                        />
                                    </div>
                                    @error('plan_cost') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">{{ __("Type") }}</label>
                                    <select name="type_id" class="form-control">
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('type_id') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group">
                                    <label for="status">{{ __("Status") }}</label>
                                    <div class="input-group">
                                        <select class="form-control" name="status">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                    @error('status') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="range_rooms">{{ __("Range of Rooms") }}</label>
                                    <div class="input-group">
                                        <select class="form-control" name="range_rooms">
                                            <option value="1-5">1-5</option>
                                            <option value="6-10">6-10</option>
                                            <option value="11-15">11-15</option>
                                            <option value="16-20">16-20</option>
                                            <option value="21-30">21-30</option>
                                            <option value="31-40">31-40</option>
                                            <option value="41-100">41-100</option>
                                        </select>
                                    </div>
                                    @error('range_rooms') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group">
                                    <label for="plan_description">{{ __("Description") }}</label>
                                    <div class="input-group">
                                        <input
                                            type="text"
                                            name="plan_description"
                                            placeholder="{{ __("Description") }}"
                                            class="form-control"
                                            required
                                            value="{{
                                                old('plan_description') ? old('plan_description') : ""
                                            }}"
                                        />
                                    </div>
                                    @error('plan_description') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{ __("Document") }}</label><br>
                                    <input type="file" name="document">
                                    @error('document') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <a href="{{ route('suscriptions') }}" class="btn btn-outline-primary">{{ __("Back") }}</a>
                                <button type="submit" class="btn btn-primary float-right">{{ __("Save") }}</button>
                            </form>
                        </div>
                        <!-- End -->
                    </div>
                    <!-- End -->
                </div>
            </div>
        </div>

    </div>
</div>
<!-- END: Content-->
@endsection

@section('extra-script')

@endsection
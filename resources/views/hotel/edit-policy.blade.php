@extends('layouts.vuexy')

@section('title')
{{ __("Edit Policy") }}
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
                                    <li class="breadcrumb-item"><a href="{{ route('policies') }}">{{ __("Policies") }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __("Edit Policy") }}
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
                        <h3 class="mb-4 text-center">{{ __("Edit Policy") }}</h3>
                        <form action="{{ route('policy.update',$policy->id) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                            @method('PUT')
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="hotel_id" value="{{ Auth::user()->hotel->id }}">
                            
                            <div class="form-group">
                                <div class="controls">
                                    <label for="description">{{ __("Policy") }}</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" style="height:100px" name="description" placeholder="description" required data-validation-required-message="This field is required">{{ $policy->description }}</textarea>
                                    @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="type">{{ __("Type") }}</label>
                                <div class="input-group">
                                    <select id="type" name="type" class="form-control">
                                        <option {{ ($policy->type) == 'cancellation' ? 'selected' : '' }}  value="cancellation">Cancellation</option>
                                        <option {{ ($policy->type) == 'guarantee' ? 'selected' : '' }}  value="guarantee">Guarantee</option>
                                    </select>
                                </div>
                                @error('type') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group">
                                <label for="status">{{ __("Status") }}</label>
                                <div class="input-group">
                                    <select class="form-control" name="status">
                                        <option value="active"
                                        @if ($policy->status === 'active')
                                            selected
                                        @endif
                                        >Active</option>

                                        <option value="inactive"
                                        @if ($policy->status === 'inactive')
                                            selected
                                        @endif
                                        >Inactive</option>
                                    </select>
                                </div>
                                @error('status') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <a href="{{ route('policies') }}" class="btn btn-outline-primary">{{ __("Back") }}</a>
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
                
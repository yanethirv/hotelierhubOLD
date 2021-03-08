@extends('layouts.vuexy')

@section('title')
{{ __("Create Resource") }}
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
                                    <li class="breadcrumb-item"><a href="{{route('documents-resources')}}">{{ __("Resources") }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __("Create Resource") }}
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
                        <h3 class="mb-4 text-center">{{ __("Create Resource") }}</h3>
                        <form action="{{ route('document-resource.store') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="form-label">{{ __("Name") }}</label>
                                <input type="text" name="name" class="form-control" placeholder="Name" value="{{
                                    old('name') ? old('name') : ""
                                }}" required>
                                @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">{{ __("Description") }}</label>
                                <textarea class="form-control" style="height:150px" name="description" placeholder="description"></textarea>
                                @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">{{ __("Document") }}</label><br>
                                <input type="file" name="document" required>
                                @error('document') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <a href="{{route('documents-resources')}}" class="btn btn-outline-primary">{{ __("Back") }}</a>
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
                
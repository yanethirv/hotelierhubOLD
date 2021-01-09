@extends('layouts.vuexy')

@section('title')
{{ __("Create Product") }}
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
                                    <li class="breadcrumb-item"><a href="{{ route('products') }}">{{ __("Products") }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __("Create Product") }}
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
                        <h3 class="mb-4 text-center">{{ __("Create Product") }}</h3>
                        <form action="{{ route('product.store') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">{{ __("Name") }}</label>
                                <input type="text" name="name" class="form-control" placeholder="Name" value="{{
                                    old('name') ? old('name') : ""
                                }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">{{ __("Price") }}</label>
                                <input type="number" name="price" class="form-control" placeholder="price" value="{{
                                    old('price') ? old('price') : ""
                                }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">{{ __("Cost") }}</label>
                                <input type="number" name="cost" class="form-control" placeholder="cost" value="{{
                                    old('cost') ? old('cost') : ""
                                }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">{{ __("Type") }}</label>
                                <select name="type_id" class="form-control">
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">{{ __("Status") }}</label>
                                <div class="input-group">
                                    <select class="form-control" name="status">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                                @error('status') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">{{ __("Description") }}</label>
                                <textarea class="form-control" style="height:150px" name="description" placeholder="description"></textarea>
                                @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">{{ __("Document") }}</label><br>
                                <input type="file" name="document">
                                @error('document') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <a href="{{ route('products') }}" class="btn btn-outline-primary">{{ __("Back") }}</a>
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
                
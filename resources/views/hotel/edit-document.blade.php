@extends('layouts.vuexy')

@section('title')
{{ __("Edit Document") }}
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
                                    <li class="breadcrumb-item"><a href="{{ route('documents-hotel') }}">{{ __("Documents") }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __("Edit Document") }}
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
                        <h3 class="mb-4 text-center">{{ __("Edit Document") }}</h3>
                        <form action="{{ route('documenthotel.update',$document->id) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                            @method('PUT')
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="hotel_id" value="{{ Auth::user()->hotel->id }}">
                            
                            <div class="form-group">
                                <label class="form-label">{{ __("Name") }}</label>
                                <input type="text" name="name" class="form-control" placeholder="" value="{{ $document->name }}">
                                @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">{{ __("Description") }}</label>
                                <textarea class="form-control" style="height:100px" name="description" placeholder="description">{{ $document->description }}</textarea>
                                @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">{{ __("Document") }}</label><br>
                                    <a class="btn btn-success" href="{{ asset($document->document) }}" target="_blank" rel="noopener noreferrer">{{ __("View Document") }}</a>
                                    <br><br>
                                    <input type="file" name="document">
                                @error('document') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group">
                                <label for="status">{{ __("Status") }}</label>
                                <div class="input-group">
                                    <select class="form-control" name="status">
                                        <option value="active"
                                        @if ($document->status === 'active')
                                            selected
                                        @endif
                                        >Active</option>

                                        <option value="inactive"
                                        @if ($document->status === 'inactive')
                                            selected
                                        @endif
                                        >Inactive</option>
                                    </select>
                                </div>
                                @error('status') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <a href="{{ route('documents-hotel') }}" class="btn btn-outline-primary">{{ __("Back") }}</a>
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
                
@extends('layouts.vuexy')

@section('title')
{{ __("Send massive message") }}
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
                                    <li class="breadcrumb-item"><a href="#">{{ __("Dashboard") }}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">{{ __("Notifications") }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __("Send massive message") }}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">

                <div class="row">
                    <div class="col-lg-7 mx-auto">
                        <div class="bg-white rounded-lg shadow-sm p-5">
                            <h3 class="mb-4 text-center">{{ __("Send massive message") }}</h3>
                            <form action="{{ route('massives.store') }}" method="POST">
                                @csrf
                                
                                <div class="form-group">
                                    <label class="form-label">{{ __("Subject") }}</label>
                                    <input type="text" name="subject" class="form-control" placeholder="Subject">
                                    @error('subject') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">{{ __("Message") }}</label>
                                    <textarea class="form-control" style="height:150px" name="body" placeholder="Message..."></textarea>
                                    @error('body') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                
                                
                                <button class="btn btn-primary float-right" type="submit">{{ __("Send") }}</button>
                            </form>
                        </div>
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
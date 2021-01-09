@extends('layouts.vuexy')

@section('title')
{{ __("Edit User") }}
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
                                    <li class="breadcrumb-item"><a href="{{url('users')}}">{{ __("Users") }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __("Edit User") }}
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
                        <h3 class="mb-4 text-center">{{ __("Edit User") }}</h3>
                        {!! Form::model($user, ['method' => 'PATCH','route' => ['user.update', $user->id]]) !!}
                            <input name="_method" type="hidden" value="PUT">
                            <div class="form-group ">
                                <label class="form-label">{{ __("Name") }}</label>
                                {!! Form::text('name', null, array('placeholder' => '','class' => 'form-control')) !!}
                                @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group ">
                                <label class="form-label">{{ __("Email") }}</label>
                                {!! Form::text('email', null, array('placeholder' => '','class' => 'form-control')) !!}
                                @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group ">
                                <label class="form-label">{{ __("Mobile") }}</label>
                                {!! Form::text('mobile', null, array('placeholder' => '','class' => 'form-control')) !!}
                                @error('mobile') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group ">
                                <label class="form-label">{{ __("Roles") }}</label>
                                {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control')) !!}
                                @error('roles') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group ">
                                <label class="form-label">{{ __("Status") }}</label>
                                {!! Form::select('status', [null => 'Select status'] + ['active' => 'active','inactive'=>'inactive'], null, ['class' => 'form-control']) !!}
                                @error('status') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <a href="{{ route('users') }}" class="btn btn-outline-primary">{{ __("Back") }}</a>
                            <button class="btn btn-primary float-right" type="submit">{{ __("Save") }}</button>
                        {!! Form::close() !!}
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
                
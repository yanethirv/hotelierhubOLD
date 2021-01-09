@extends('layouts.vuexy')

@section('title')
{{ __("Edit Rol") }}
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
                                    <li class="breadcrumb-item"><a href="">{{ __("Roles") }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __("Edit Role") }}
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
                        <h3 class="mb-4 text-center">{{ __("Edit Role") }}</h3>
                        {!! Form::model($role, ['method' => 'PATCH','route' => ['role.update', $role->id]]) !!}
                          <div class="form-group">
                            <label for="name">{{ __("Name") }}</label>
                            {!! Form::text('name', null, array('placeholder' => '','class' => 'form-control')) !!}
                            @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                          </div>
                          <div class="form-group">
                            <label class="form-label">{{ __("Permissions") }}</label>
                            <br/>
                            @foreach($permissions as $value)
                                <br/>
                                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                {{ $value->name }}</label>
                                <br/>
                             @endforeach
                             @error('permission') <span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <a href="{{url('roles')}}" class="btn btn-outline-primary">{{ __("Back") }}</a>
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
                
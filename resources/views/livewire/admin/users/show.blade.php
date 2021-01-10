@extends('layouts.vuexy')

@section('title')
{{ __("Show User") }}
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
                                    <li class="breadcrumb-item active">{{ __("Show User") }}
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
                        <h3 class="mb-4 text-center">{{ __("User Profile") }}</h3>
                        <div class="row">
                            <div class="users-view-image">
                                <img src="{{ asset(Auth::user()->avatar) }}" class="rounded mr-75" alt="profile image" height="200" width="200">
                            </div>
                            <div class="col-12 col-sm-9 col-md-6 col-lg-6">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="font-weight-bold">{{ __("Name") }}:&nbsp;</td>
                                            <td>{{ $user->name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">{{ __("Surame") }}:&nbsp;</td>
                                            <td>{{ $user->surname }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">{{ __("Email") }}:&nbsp;</td>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">{{ __("Assigned Role") }}:&nbsp;</td>
                                            <td>@foreach($user->roles()->pluck('name') as $role)
                                                {{ $role }}
                                            @endforeach</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">{{ __("Mobile") }}:&nbsp;</td>
                                            <td>{{ $user->mobile }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <a href="{{ route('change-password.edit',$user->id) }}" class="btn btn-warning">{{ __("Change Password") }}</a>
                            </div>
                            <div class="col-12 pt-2">
                                <a href="{{ route('users') }}" class="btn btn-outline-primary">{{ __("Back") }}</a>
                                <a href="{{ route('user.edit',$user->id) }}" class="btn btn-primary float-right">{{ __("Edit") }}</a>
                            </div>
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
                
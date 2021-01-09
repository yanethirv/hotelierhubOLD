@extends('layouts.vuexy')

@section('title')
{{ __("Notifications") }}
@endsection

@section('extra-css')

@endsection

@section('content')
<!-- BEGIN: Content-->
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
                                <li class="breadcrumb-item active">{{ __("Notifications") }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <section id="vertical-tabs">
                <div class="row match-height">
                    <div class="col-xl-6 col-lg-12">
                        <div class="card overflow-hidden">
                            <div class="card-header">
                                <h4 class="card-title">{{ __("Unread Notifications") }}</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <ul class="list-group">
                                        @foreach ($unreadNotifications as $unreadNotification)
                                            <li class="list-group-item">
                                                <a href="{{ $unreadNotification->data['link'] }} ">
                                                    {{ Carbon\Carbon::parse($unreadNotification->data['date'])->format('d-m-Y h:i:s') }} - {{ $unreadNotification->data['subject'] }}
                                                    
                                                </a>
                                                <form method="POST" action="{{ route('notifications.read', $unreadNotification->id) }}" class="pull-right">
                                                    @method('PATCH')
                                                    @csrf
                                                    <button class="btn btn-success btn-xs">{{ __("Mark as read") }}</button>
                                                </form>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-12">
                        <div class="card overflow-hidden">
                            <div class="card-header">
                                <h4 class="card-title">{{ __("Read Notifications") }}</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <ul class="list-group">
                                        @foreach ($readNotifications as $readNotification)
                                            <li class="list-group-item">
                                                <a href="{{ $readNotification->data['link'] }}">
                                                    {{ Carbon\Carbon::parse($readNotification->data['date'])->format('d-m-Y h:i:s') }} - {{ $readNotification->data['subject'] }}
                                                </a>
                                                <form method="POST" action="{{ route('notifications.destroy', $readNotification->id) }}" class="pull-right">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger btn-xs">{{ __("Delete") }}</button>
                                                </form>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection

@section('extra-script')

@endsection
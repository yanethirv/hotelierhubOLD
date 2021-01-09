@extends('layouts.vuexy')

@section('title')
{{ __("Message") }}
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
                                    <li class="breadcrumb-item"><a href="">{{ __("Notifications") }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __("Message") }}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">
                <div class="card px-1">
                    <div class="card-header email-detail-head ml-75">
                        <div class="user-details d-flex justify-content-between align-items-center flex-wrap">
                            <div class="avatar mr-75">
                                <img src="{{ asset('images/portrait/small/avatar-s-18.jpg') }}" alt="avatar img holder" width="61" height="61">
                            </div>
                            <div class="mail-items">
                                <h4 class="list-group-item-heading mb-0">{{ $message->sender->name }}</h4>
                                <div class="email-info-dropup dropdown">
                                    <span class="dropdown-toggle font-small-3" id="dropdownMenuButton200" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ $message->sender->email }}
                                    </span>
                                    <div class="dropdown-menu dropdown-menu-right p-50" aria-labelledby="dropdownMenuButton200">
                                        <div class="px-25 dropdown-item">From: <strong> {{ $message->sender->email }} </strong></div>
                                        <div class="px-25 dropdown-item">To: <strong> {{ Auth::user()->email }} </strong></div>
                                        <div class="px-25 dropdown-item">Date: <strong>{{ Carbon\Carbon::parse($message->created_at)->format('d-m-Y h:i:s') }}</strong></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mail-meta-item">
                            <div class="mail-time mb-1">{{ Carbon\Carbon::parse($message->created_at)->toTimeString() }}</div>
                            <div class="mail-date">{{ Carbon\Carbon::parse($message->created_at)->toFormattedDateString() }}</div>
                        </div>
                    </div>
                    <div class="card-body mail-message-wrapper pt-2 mb-0">
                        <div class="mail-message">
                            <p>{{ $message->body }}</p>
                            @if( !empty($message->document))
                            <a href="{{ route('message-document-download',$message->document) }}" class="btn btn-outline-success float-right waves-effect waves-light mb-2">{{ __("Download Attachment") }}</a>
                            @endif
                        </div>
                        <a href="{{ route('notifications.index') }}" class="btn btn-outline-primary mt-4">{{ __("Back") }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

@section('extra-script')
  
@endsection
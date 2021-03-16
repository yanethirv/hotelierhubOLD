@extends('layouts.vuexy')

@section('title')
{{ __("Create Rate") }}
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
                                    <li class="breadcrumb-item"><a href="{{route('rateplans-rooms')}}">{{ __("Rates") }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __("Create Rate") }}
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
                        <h3 class="mb-4 text-center">{{ __("Create Rate") }}</h3>
                        <form action="{{ route('rateplan-room.store') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="hotel_id" value="{{ Auth::user()->hotel->id }}">
                            
                            <div class="form-group">
                                <label for="room_id">{{ __("Room") }}</label>
                                <select class="custom-select form-control" id="room_id" name="room_id">
                                    @foreach ($rooms as $room)
                                        <option value="{{ $room->id }}">
                                        {{ $room->code }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('room_id') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group">
                                <label for="rateplan_id">{{ __("Rate Plan") }}</label>
                                <select class="custom-select form-control" id="rateplan_id" name="rateplan_id">
                                    @foreach ($rateplans as $rateplan)
                                        <option value="{{ $rateplan->id }}">
                                        {{ $rateplan->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('rateplan_id') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">{{ __("Rate") }}</label>
                                <input type="text" name="rate" class="form-control" placeholder="" value="{{
                                    old('rate') ? old('rate') : ""
                                }}" required>
                                @error('rate') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <a href="{{route('rateplans-rooms')}}" class="btn btn-outline-primary">{{ __("Back") }}</a>
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
                
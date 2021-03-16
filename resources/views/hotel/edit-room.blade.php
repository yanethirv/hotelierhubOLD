@extends('layouts.vuexy')

@section('title')
{{ __("Edit Room") }}
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
                                    <li class="breadcrumb-item"><a href="{{ route('rooms') }}">{{ __("Rooms") }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __("Edit Room") }}
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
                        <h3 class="mb-4 text-center">{{ __("Edit Room") }}</h3>
                        <form action="{{ route('room.update',$room->id) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                            @method('PUT')
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="hotel_id" value="{{ Auth::user()->hotel->id }}">
                            
                            <div class="form-group">
                                <label class="form-label">{{ __("Code") }}</label>
                                <input type="text" name="code" class="form-control" placeholder="" value="{{ $room->code }}">
                                @error('code') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                           
                            <div class="form-group">
                                <label class="form-label">{{ __("Type") }}</label>
                                <select name="typeroom_id" class="form-control">
                                     @foreach ($typerooms as $typeroom)
                                        <option value="{{ $typeroom->id }}"
                                            @if ($typeroom->id ===  $room->typeroom_id)
                                                selected
                                            @endif
                                        >
                                            {{ $typeroom->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('typeroom_id') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">{{ __("Number of rooms") }}</label>
                                <input type="text" name="number_rooms" class="form-control" placeholder="" value="{{ $room->number_rooms }}">
                                @error('number_rooms') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
     
                            <div class="form-group">
                                <label class="form-label">{{ __("Ocupancy per room") }}</label>
                                <input type="text" name="ocupancy" class="form-control" placeholder="ocupancy" value="{{ $room->ocupancy }}">
                                @error('ocupancy') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">{{ __("Description") }}</label>
                                <textarea class="form-control" style="height:100px" name="description" placeholder="description">{{ $room->description }}</textarea>
                                @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">{{ __("Extra person") }}</label>
                                <input type="text" name="extra_person" class="form-control" placeholder="" value="{{ $room->extra_person }}">
                                @error('extra_person') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">{{ __("Late check out") }}</label>
                                <input type="text" name="late_check_out" class="form-control" placeholder="" value="{{ $room->late_check_out }}">
                                @error('late_check_out') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">{{ __("Early check in") }}</label>
                                <input type="text" name="early_check_in" class="form-control" placeholder="" value="{{ $room->early_check_in }}">
                                @error('early_check_in') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">{{ __("Roll away bed") }}</label>
                                <input type="text" name="roll_away_bed" class="form-control" placeholder="" value="{{ $room->roll_away_bed }}">
                                @error('roll_away_bed') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">{{ __("Pet fee") }}</label>
                                <input type="text" name="pet_fee" class="form-control" placeholder="" value="{{ $room->pet_fee }}">
                                @error('pet_fee') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group">
                                <label for="status">{{ __("Status") }}</label>
                                <div class="input-group">
                                    <select class="form-control" name="status">
                                        <option value="active"
                                        @if ($room->status === 'active')
                                            selected
                                        @endif
                                        >Active</option>

                                        <option value="inactive"
                                        @if ($room->status === 'inactive')
                                            selected
                                        @endif
                                        >Inactive</option>
                                    </select>
                                </div>
                                @error('status') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <a href="{{ route('rooms') }}" class="btn btn-outline-primary">{{ __("Back") }}</a>
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
                
@extends('layouts.vuexy')

@section('title')
{{ __("My Hotel - General") }}
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
                                    <li class="breadcrumb-item">{{ __("My Hotel") }}
                                    </li>
                                    <li class="breadcrumb-item active">{{ __("General") }}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- account setting page start -->
                <section id="page-account-settings">
                    <div class="row">
                        <div class="col-lg-7 mx-auto">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <form id="form_validation" method="POST" action="{{ route('hotel-general.update',$hotel->id) }}" enctype="multipart/form-data" novalidate>
                                                    @csrf
                                                    <input name="_method" type="hidden" value="PUT">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="name">{{ __("Hotel Name") }}</label>
                                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $hotel->name }}" required data-validation-required-message="This field is required">
                                                                    @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="description">{{ __("Hotel Description") }}</label>
                                                                    <textarea class="form-control @error('description') is-invalid @enderror" style="height:150px" name="description" placeholder="description" required data-validation-required-message="This field is required">{{ $hotel->description }}</textarea>
                                                                    @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="stars">{{ __("Stars") }}</label>
                                                                    <input type="text" class="form-control @error('stars') is-invalid @enderror" name="stars" value="{{ $hotel->stars }}" required data-validation-required-message="This field is required">
                                                                    @error('stars') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="range_rooms">{{ __("Range of Rooms") }}</label>
                                                                <div class="input-group">
                                                                    <select id="range_rooms" name="range_rooms" class="form-control">
                                                                        <option {{ ($hotel->range_rooms) == '0' ? 'selected' : '' }}  value="0">Choose</option>
                                                                        <option {{ ($hotel->range_rooms) == '0' ? 'selected' : '' }}  value="0">Choose</option>
                                                                        <option {{ ($hotel->range_rooms) == '1-74' ? 'selected' : '' }}  value="1-74">1-74</option>
                                                                        <option {{ ($hotel->range_rooms) == '75-149' ? 'selected' : '' }}  value="75-149">75-149</option>
                                                                        <option {{ ($hotel->range_rooms) == '150-299' ? 'selected' : '' }}  value="150-299">150-299</option>
                                                                        <option {{ ($hotel->range_rooms) == '300-500' ? 'selected' : '' }}  value="300-500">300-500</option>
                                                                        <option {{ ($hotel->range_rooms) == '+500' ? 'selected' : '' }}  value="+500">Over 500</option>
                                                                      </select>
                                                                </div>
                                                                @error('range_rooms') <span class="text-danger">{{ $message }}</span>@enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="opening_date">{{ __("Opening Date") }}</label>
                                                                    <input type="text" class="form-control @error('opening_date') is-invalid @enderror" name="opening_date" value="{{ $hotel->opening_date }}" required data-validation-required-message="This field is required">
                                                                    @error('opening_date') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="floor_number">{{ __("Floor Number") }}</label>
                                                                    <input type="text" class="form-control @error('floor_number') is-invalid @enderror" name="floor_number" value="{{ $hotel->floor_number }}" required data-validation-required-message="This field is required">
                                                                    @error('floor_number') <span class="text-danger">{{ $message }}</span>@enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="property_type">{{ __("Property Type") }}</label>
                                                                <div class="input-group">
                                                                    <select id="property_type" name="property_type" class="form-control">
                                                                        <option {{ ($hotel->property_type) == '0' ? 'selected' : '' }}  value="0">Choose</option>
                                                                        <option {{ ($hotel->property_type) == 'Apartments' ? 'selected' : '' }}  value="Apartments">Apartments</option>
                                                                        <option {{ ($hotel->property_type) == 'Bead and Breaksfast' ? 'selected' : '' }}  value="Bead and Breaksfast">Bead and Breaksfast</option>
                                                                        <option {{ ($hotel->property_type) == 'Boutique' ? 'selected' : '' }}  value="Boutique">Boutique</option>
                                                                        <option {{ ($hotel->property_type) == 'Bungalows' ? 'selected' : '' }}  value="Bungalows">Bungalows</option>
                                                                        <option {{ ($hotel->property_type) == 'Condo Hotel' ? 'selected' : '' }}  value="Condo Hotel">Condo Hotel</option>
                                                                        <option {{ ($hotel->property_type) == 'Glamping' ? 'selected' : '' }}  value="Glamping">Glamping</option>
                                                                        <option {{ ($hotel->property_type) == 'Guesthouse' ? 'selected' : '' }}  value="Guesthouse">Guesthouse</option>
                                                                        <option {{ ($hotel->property_type) == 'Hostal' ? 'selected' : '' }}  value="Hostal">Hostal</option>
                                                                        <option {{ ($hotel->property_type) == 'Hostel' ? 'selected' : '' }}  value="Hostel">Hostel</option>
                                                                        <option {{ ($hotel->property_type) == 'Hotel' ? 'selected' : '' }}  value="Hotel">Hotel</option>
                                                                        <option {{ ($hotel->property_type) == 'Motel' ? 'selected' : '' }}  value="Motel">Motel</option>
                                                                        <option {{ ($hotel->property_type) == 'Lodge' ? 'selected' : '' }}  value="Lodge">Lodge</option>
                                                                        <option {{ ($hotel->property_type) == 'Resort' ? 'selected' : '' }}  value="Resort">Resort</option>
                                                                        <option {{ ($hotel->property_type) == 'Vacation Rentals' ? 'selected' : '' }}  value="Vacation Rentals">Vacation Rentals</option>
                                                                        <option {{ ($hotel->property_type) == 'Villa' ? 'selected' : '' }}  value="Villa">Villa</option>
                                                                    </select>
                                                                </div>
                                                                @error('property_type') <span class="text-danger">{{ $message }}</span>@enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Experiences:</label>
                                                                    @foreach($hotel->experience as $value)
                                                                        <p class="badge badge-success badge-md mr-1 mb-1 mb-50">{{$value}}</p>
                                                                    @endforeach
                                                                </label><br><br>
                                                                @foreach ($experienceslist as $cat => $valor)
                                                                    <label><input type="checkbox" name="experience[]" value="{{ $valor }}"> {{ $valor }}</label><br>
                                                                @endforeach
                                                            </div>  
                                                        </div> 

                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">{{ __("Save
                                                                changes") }}</button>
                                                        </div>
                                                    </div>
                                                </form>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- account setting page end -->

            </div>
            </div>
    </div>
    <!-- END: Content-->
@endsection
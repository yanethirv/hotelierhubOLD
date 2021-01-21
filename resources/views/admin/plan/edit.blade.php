@extends('layouts.vuexy')

@section('title')
{{ __("Edit Subscription") }}
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
                                <li class="breadcrumb-item"><a href="{{route('home')}}">{{ __("Dashboard") }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('suscriptions') }}">{{ __("Subscriptions") }}</a>
                                </li>
                                <li class="breadcrumb-item active">{{ __("Edit Subscription") }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-7 mx-auto">
                @if(session('message'))
                    <div class="alert alert-{{ session('message')[0] }}">
                        {!! session('message')[1] !!}
                    </div>
                @endif
                <div class="bg-white rounded-lg shadow-sm p-5">
                    <h3 class="mb-4 text-center"><i class="fa fa-diamond"></i>
                        {{ __("Edit Subscription") }}</h3>
                    <!-- End -->

                    <div class="tab-content">
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <form action="{{ route('plan.update',$suscription->id) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label class="form-label">{{ __("Name") }}</label>
                                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $suscription->nickname }}" disabled>
                                </div>
             
                                <div class="form-group">
                                    <label class="form-label">{{ __("Price") }}</label>
                                    <input type="number" name="price" class="form-control" placeholder="price" value="{{ $suscription->amount }}" disabled>
                                </div>
         
                                <div class="form-group">
                                    <label class="form-label">{{ __("Cost") }}</label>
                                    <input type="number" name="cost" class="form-control" placeholder="cost" value="{{ $suscription->cost }}" disabled>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">{{ __("Type") }}</label>
                                    <select name="type_id" class="form-control">
                                         @foreach ($types as $type)
                                            <option value="{{ $type->id }}"
                                                @if ($type->id ===  $suscription->type_id)
                                                    selected
                                                @endif
                                            >
                                                {{ $type->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="range_rooms">{{ __("Range of Rooms") }}</label>
                                    <div class="input-group">
                                        <select id="range_rooms" name="range_rooms" class="form-control">
                                            <option {{ ($suscription->range_rooms) == '0' ? 'selected' : '' }}  value="0">Choose</option>
                                            <option {{ ($suscription->range_rooms) == '1-74' ? 'selected' : '' }}  value="1-74">1-74</option>
                                            <option {{ ($suscription->range_rooms) == '75-149' ? 'selected' : '' }}  value="75-149">75-149</option>
                                            <option {{ ($suscription->range_rooms) == '150-299' ? 'selected' : '' }}  value="150-299">150-299</option>
                                            <option {{ ($suscription->range_rooms) == '300-500' ? 'selected' : '' }}  value="300-500">300-500</option>
                                            <option {{ ($suscription->range_rooms) == '+500' ? 'selected' : '' }}  value="+500">Over 500</option>
                                          </select>
                                    </div>
                                    @error('range_rooms') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">{{ __("Status") }}</label>
                                    <div class="input-group">
                                        <select class="form-control" name="status">
                                            <option value="active"
                                            @if ($suscription->status === 'active')
                                                selected
                                            @endif
                                            >Active</option>
    
                                            <option value="inactive"
                                            @if ($suscription->status === 'inactive')
                                                selected
                                            @endif
                                            >Inactive</option>
                                        </select>
                                    </div>
                                    @error('status') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{ __("Description") }}</label>
                                    <textarea class="form-control" style="height:150px" name="description" placeholder="description">{{ $suscription->description }}</textarea>
                                    @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">{{ __("Document") }}</label><br>
                                    @if(is_null($suscription->document))
                                    <input type="file" name="document">
                                    @else
                                        <a class="btn btn-warning" href="{{ asset($suscription->document) }}" target="_blank" rel="noopener noreferrer">{{ __("View Document") }}</a>
                                        <br><br>
                                        <input type="file" name="document">
                                    @endif
                                    @error('document') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
    
                                <a href="{{ route('suscriptions') }}" class="btn btn-outline-primary">{{ __("Back") }}</a>
                                <button type="submit" class="btn btn-primary float-right">{{ __("Save") }}</button>
                            </form>
                        </div>
                        <!-- End -->
                    </div>
                    <!-- End -->
                </div>
            </div>
        </div>

    </div>
</div>
<!-- END: Content-->
@endsection

@section('extra-script')

@endsection
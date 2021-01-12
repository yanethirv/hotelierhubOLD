@extends('layouts.vuexy')

@section('title')
{{ __("Edit Service") }}
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
                                    <li class="breadcrumb-item"><a href="{{ route('services') }}">{{ __("Services") }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __("Edit Services") }}
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
                        <h3 class="mb-4 text-center">{{ __("Edit Service") }}</h3>
                        <form action="{{ route('service.update',$product->id) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="form-label">{{ __("Name") }}</label>
                                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $product->name }}">
                            </div>
         
                            <div class="form-group">
                                <label class="form-label">{{ __("Price") }}</label>
                                <input type="number" name="price" class="form-control" placeholder="price" value="{{ $product->price }}">
                            </div>
     
                            <div class="form-group">
                                <label class="form-label">{{ __("Cost") }}</label>
                                <input type="number" name="cost" class="form-control" placeholder="cost" value="{{ $product->cost }}">
                            </div>
    
                            <div class="form-group">
                                <label class="form-label">{{ __("Type") }}</label>
                                <select name="type_id" class="form-control">
                                     @foreach ($types as $type)
                                        <option value="{{ $type->id }}"
                                            @if ($type->id ===  $product->type_id)
                                                selected
                                            @endif
                                        >
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">{{ __("Status") }}</label>
                                <div class="input-group">
                                    <select class="form-control" name="status">
                                        <option value="active"
                                        @if ($product->status === 'active')
                                            selected
                                        @endif
                                        >Active</option>

                                        <option value="inactive"
                                        @if ($product->status === 'inactive')
                                            selected
                                        @endif
                                        >Inactive</option>
                                    </select>
                                </div>
                                @error('status') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">{{ __("Description") }}</label>
                                <textarea class="form-control" style="height:150px" name="description" placeholder="description">{{ $product->description }}</textarea>
                            </div>

                            
                            <div class="form-group">
                                <label class="form-label">{{ __("Document") }}</label><br>
                                @if(is_null($product->document))
                                    <input type="file" name="document">
                                   <!-- <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter">
                                        {{ __("View Document") }}
                                    </button><br><br>
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-dialog-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">{{ __("View Document Product") }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-left">
                                                    <iframe src="{{ asset($product->document) }}" style="width: 500px; height: 500px"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                @else
                                    <a class="btn btn-warning" href="{{ asset($product->document) }}" target="_blank" rel="noopener noreferrer">{{ __("View Document") }}</a>
                                    <br><br>
                                    <input type="file" name="document">
                                @endif
                               
                                
                            </div>

                            
                            <a href="{{ route('services') }}" class="btn btn-outline-primary">{{ __("Back") }}</a>
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
                
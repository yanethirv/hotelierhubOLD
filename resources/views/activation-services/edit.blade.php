@extends('layouts.vuexy')

@section('title')
{{ __("Edit Status") }}
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
                                    <li class="breadcrumb-item"><a href="">{{ __("Activation Services Request") }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __("Edit Status") }}
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
                        <h3 class="mb-4 text-center">{{ __("Edit Status") }}</h3>

                        <form action="{{ route('activation.update',$activationService->id) }}" method="POST">
                            @csrf
                            <input name="_method" type="hidden" value="PUT">
                            <div class="form-group">
                              <label for="description">{{ __("Status") }}</label>
                              <div class="input-group">
                                  <select class="form-control" name="status">
                                      <option value="active"
                                      @if ($activationService->status === 'active')
                                          selected
                                      @endif
                                      >{{ __("Active") }}</option>

                                      <option value="inactive"
                                      @if ($activationService->status === 'inactive')
                                          selected
                                      @endif
                                      >{{ __("Inactive") }}</option>

                                      <option value="process"
                                      @if ($activationService->status === 'process')
                                          selected
                                      @endif
                                      >{{ __("In Process") }}</option>

                                      <option value="wait"
                                      @if ($activationService->status === 'wait')
                                          selected
                                      @endif
                                      >{{ __("On Wait") }}</option>
                                  </select>
                              </div>
                              @error('status') <span class="text-danger">{{ $message }}</span>@enderror
                          </div>
                            <div class="form-group">
                                <label class="form-label">{{ __("Comment") }}</label>
                                <textarea class="form-control" style="height:150px" name="comment" placeholder="comment">{{ $activationService->comment }}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('activations-request') }}" class="btn btn-outline-primary">{{ __("Back") }}</a>
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
                
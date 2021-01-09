@extends('layouts.vuexy')

@section('title')
	Servicios
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
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Servicios
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            @forelse($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card mh-100">
                        <div class="card-img">
                            <img src="{{ $product->picture_with_path }}" class="img-fluid" />
                        </div>
                        <div class="card-header">{{ $product->name }}</div>
                        <div class="card-body">
                            <p>{{ __("Precio") }}: {{ format_currency_helper($product->price) }}</p>
                        </div>
                        <div class="card-footer">
                            @if(!in_array($product->id, $coursesPurchased))
                                <form action="{{ route('product.add', ["id" => $product->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-info">
                                        <i class="fa fa-cart-plus"></i> {{ __("Añadir curso") }}
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('course.start', ["id" => $product->id]) }}" class="btn btn-dark">
                                    <i class="fa fa-check-circle"></i> {{ __("Ya has comprado este curso, ¡accede a él ahora!") }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-info text-center">No hay productos disponibles</div>
            @endforelse
        </div>

        <div class="row justify-content-center">
            {{ $products->links() }}
        </div>

        @include('shop.sidebar')

    </div>
</div>
<!-- END: Content-->
@endsection

@section('extra-script')

@endsection
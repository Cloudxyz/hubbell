@extends('layouts.horizontal-master')

@section('heading-content')

   @include('components.heading', [
        'label' => __('New'),
        'breadcrumbs' => [
            [
                'url' => route('products'),
                'label' => __('Products'),
            ],
        ]
    ])

    <!-- separator -->
    <div class="mb-4"></div>

@endsection

@section('main-content')


    <div class="container app-container-sm">
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('products.partials.form', ['row' => $product])
        </form>

    </div>


@endsection

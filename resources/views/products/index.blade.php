@extends('layouts.horizontal-master')

@section('heading-content')

    @include('components.heading', [
        'label' => __('Products'),
        'actions' => [
            [
                'label' => __('New'),
                'url' => route('products.create')
            ]
        ]
    ])

    <!-- separator -->
    <div class="mb-4"></div>

    @include('components.search', [
        'url' => route('products')
    ])

@endsection

@section('main-content')

    <!-- here the data is loaded -->
    @include('products.partials.table', [
        'label' => __('Products'),
        'rows' => $products
    ])

@endsection

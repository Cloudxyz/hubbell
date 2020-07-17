@extends('layouts.horizontal-master')

@section('heading-content')

    @include('components.heading', [
        'label' => __('Edit'),
        'breadcrumbs' => [
            [
                'url' => route('products'),
                'label' => __('Products'),
            ],
        ],
        'actions' => [
            [
                'label' => __('New'),
                'url' => route('products.create'),
            ]
        ]
    ])

    <!-- separator -->
    <div class="mb-4"></div>

@endsection

@section('main-content')

    <div class="container app-container-sm">
        <form action="{{ route('products.update', [$product->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('products.partials.form', [
                'row' => $product
            ])
        </form>
    </div>

@endsection

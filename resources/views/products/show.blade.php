@extends('layouts.horizontal-master')

@section('heading-content')

    @include('components.heading', [
        'label' => __('View'),
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
        <form action="" onsubmit="return false;" method="post">
            @include('products.partials.form', [
                'row' => $product,
                'disabled' => true
            ])        
        </form>
    </div>

@endsection

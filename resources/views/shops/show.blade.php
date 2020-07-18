@extends('layouts.horizontal-master')

@section('heading-content')

    @include('components.heading', [
        'label' => __('View'),
        'breadcrumbs' => [
            [
                'url' => route('shops'),
                'label' => __('Shops'),
            ],
        ],
        'actions' => [
            [
                'label' => __('New'),
                'url' => route('shops.create'),
            ]
        ]
    ])

    <!-- separator -->
    <div class="mb-4"></div>

@endsection

@section('main-content')

    <div class="container app-container-sm">
        <form action="" onsubmit="return false;" method="post">
            @include('shops.partials.form', [
                'row' => $shop,
                'disabled' => true
            ])        
        </form>
    </div>

@endsection

@extends('layouts.horizontal-master')

@section('heading-content')

    @include('components.heading', [
        'label' => __('Edit'),
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
        <form action="{{ route('shops.update', [$shop->id]) }}" method="post">
            @csrf
            @include('shops.partials.form', [
                'row' => $shop
            ])
        </form>
    </div>

@endsection

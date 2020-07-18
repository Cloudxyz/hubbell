@extends('layouts.horizontal-master')

@section('heading-content')

    @include('components.heading', [
        'label' => __('Shops'),
        'actions' => [
            [
                'label' => __('New'),
                'url' => route('shops.create')
            ]
        ]
    ])

    <!-- separator -->
    <div class="mb-4"></div>

    @include('components.search', [
        'url' => route('shops')
    ])

@endsection

@section('main-content')

    <!-- here the data is loaded -->
    @include('shops.partials.table', [
        'label' => __('Shops'),
        'rows' => $shops
    ])

@endsection

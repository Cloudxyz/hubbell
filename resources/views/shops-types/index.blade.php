@extends('layouts.horizontal-master')

@section('heading-content')

    @include('components.heading', [
        'label' => __('Shops Types'),
        'actions' => [
            [
                'label' => __('New'),
                'url' => route('shops-types.create')
            ]
        ]
    ])

    <!-- separator -->
    <div class="mb-4"></div>

    @include('components.search', [
        'url' => route('shops-types')
    ])

@endsection

@section('main-content')

    <!-- here the data is loaded -->
    @include('shops-types.partials.table', [
        'label' => __('Shops Types'),
        'rows' => $types
    ])

@endsection

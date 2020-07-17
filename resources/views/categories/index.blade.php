@extends('layouts.horizontal-master')

@section('heading-content')

    @include('components.heading', [
        'label' => __('Categories'),
        'actions' => [
            [
                'label' => __('New'),
                'url' => route('categories.create')
            ]
        ]
    ])

    <!-- separator -->
    <div class="mb-4"></div>

    @include('components.search', [
        'url' => route('categories')
    ])

@endsection

@section('main-content')

    <!-- here the data is loaded -->
    @include('categories.partials.table', [
        'label' => __('Categories'),
        'rows' => $categories
    ])

@endsection

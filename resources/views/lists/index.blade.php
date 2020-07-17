@extends('layouts.horizontal-master')

@section('heading-content')

    @include('components.heading', [
        'label' => __('Lists'),
        'actions' => [
            [
                'label' => __('New'),
                'url' => route('lists.create')
            ]
        ]
    ])

    <!-- separator -->
    <div class="mb-4"></div>

    @include('components.search', [
        'url' => route('lists')
    ])

@endsection

@section('main-content')

    <!-- here the data is loaded -->
    @include('lists.partials.table', [
        'label' => __('Lists'),
        'rows' => $lists
    ])

@endsection

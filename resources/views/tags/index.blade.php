@extends('layouts.horizontal-master')

@section('heading-content')

    @include('components.heading', [
        'label' => __('Tags'),
        'actions' => [
            [
                'label' => __('New'),
                'url' => route('tags.create')
            ]
        ]
    ])

    <!-- separator -->
    <div class="mb-4"></div>

    @include('components.search', [
        'url' => route('tags')
    ])

@endsection

@section('main-content')

    <!-- here the data is loaded -->
    @include('tags.partials.table', [
        'label' => __('Tags'),
        'rows' => $tags
    ])

@endsection

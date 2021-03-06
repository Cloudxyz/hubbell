@extends('layouts.horizontal-master')

@section('heading-content')

    @include('components.heading', [
        'label' => __('Posts'),
        'actions' => [
            [
                'label' => __('New'),
                'url' => route('posts.create')
            ]
        ]
    ])

    <!-- separator -->
    <div class="mb-4"></div>

    @include('components.search', [
        'url' => route('posts')
    ])

@endsection

@section('main-content')

    <!-- here the data is loaded -->
    @include('posts.partials.table', [
        'label' => __('Posts'),
        'rows' => $posts
    ])

@endsection

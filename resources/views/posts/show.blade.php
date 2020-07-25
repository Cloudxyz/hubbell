@extends('layouts.horizontal-master')

@section('heading-content')

    @include('components.heading', [
        'label' => __('View'),
        'breadcrumbs' => [
            [
                'url' => route('posts'),
                'label' => __('Posts'),
            ],
        ],
        'actions' => [
            [
                'label' => __('New'),
                'url' => route('posts.create'),
            ]
        ]
    ])

    <!-- separator -->
    <div class="mb-4"></div>

@endsection

@section('main-content')

    <div class="container app-container-sm">
        <form action="" onsubmit="return false;" method="post">
            @include('posts.partials.form', [
                'row' => $post,
                'disabled' => true
            ])        
        </form>
    </div>

@endsection

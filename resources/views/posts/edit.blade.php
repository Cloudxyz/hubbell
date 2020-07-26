@extends('layouts.horizontal-master')

@section('heading-content')

    @include('components.heading', [
        'label' => __('Edit'),
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
        <form action="{{ route('posts.update', [$post->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('posts.partials.form', [
                'row' => $post
            ])
        </form>
    </div>

@endsection

@extends('layouts.horizontal-master')

@section('heading-content')

   @include('components.heading', [
        'label' => __('New'),
        'breadcrumbs' => [
            [
                'url' => route('posts'),
                'label' => __('Posts'),
            ],
        ]
    ])

    <!-- separator -->
    <div class="mb-4"></div>

@endsection

@section('main-content')


    <div class="container app-container-sm">
        <form action="{{ route('posts.store') }}" method="post">
            @csrf
            @include('posts.partials.form', ['row' => $post])
        </form>
    </div>

@endsection

@extends('layouts.horizontal-master')

@section('heading-content')

    @include('components.heading', [
        'label' => __('Edit'),
        'breadcrumbs' => [
            [
                'url' => route('categories'),
                'label' => __('Categories'),
            ],
        ],
        'actions' => [
            [
                'label' => __('New'),
                'url' => route('categories.create'),
            ]
        ]
    ])

    <!-- separator -->
    <div class="mb-4"></div>

@endsection

@section('main-content')

    <div class="container app-container-sm">
        <form action="{{ route('categories.update', [$category->id]) }}" method="post">
            @csrf
            @include('categories.partials.form', [
                'row' => $category
            ])
        </form>
    </div>

@endsection

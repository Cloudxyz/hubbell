@extends('layouts.horizontal-master')

@section('heading-content')

    @include('components.heading', [
        'label' => __('View'),
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
        <form action="" onsubmit="return false;" method="post">
            @include('categories.partials.form', [
                'row' => $category,
                'disabled' => true
            ])        
        </form>
    </div>

@endsection

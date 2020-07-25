@extends('layouts.horizontal-master')

@section('heading-content')

    @include('components.heading', [
        'label' => __('View'),
        'breadcrumbs' => [
            [
                'url' => route('tags'),
                'label' => __('Tags'),
            ],
        ],
        'actions' => [
            [
                'label' => __('New'),
                'url' => route('tags.create'),
            ]
        ]
    ])

    <!-- separator -->
    <div class="mb-4"></div>

@endsection

@section('main-content')

    <div class="container app-container-sm">
        <form action="" onsubmit="return false;" method="post">
            @include('tags.partials.form', [
                'row' => $tag,
                'disabled' => true
            ])        
        </form>
    </div>

@endsection

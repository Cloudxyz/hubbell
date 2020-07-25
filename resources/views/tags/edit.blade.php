@extends('layouts.horizontal-master')

@section('heading-content')

    @include('components.heading', [
        'label' => __('Edit'),
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
        <form action="{{ route('tags.update', [$tag->id]) }}" method="post">
            @csrf
            @include('tags.partials.form', [
                'row' => $tag
            ])
        </form>
    </div>

@endsection

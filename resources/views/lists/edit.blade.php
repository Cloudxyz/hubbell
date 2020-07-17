@extends('layouts.horizontal-master')

@section('heading-content')

    @include('components.heading', [
        'label' => __('Edit'),
        'breadcrumbs' => [
            [
                'url' => route('lists'),
                'label' => __('Lists'),
            ],
        ],
        'actions' => [
            [
                'label' => __('New'),
                'url' => route('lists.create'),
            ]
        ]
    ])

    <!-- separator -->
    <div class="mb-4"></div>

@endsection

@section('main-content')

    <div class="container app-container-sm">
        <form action="{{ route('lists.update', [$list->id]) }}" method="post">
            @csrf
            @include('lists.partials.form', [
                'row' => $list
            ])
        </form>
    </div>

@endsection

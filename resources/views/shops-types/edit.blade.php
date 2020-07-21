@extends('layouts.horizontal-master')

@section('heading-content')

    @include('components.heading', [
        'label' => __('Edit'),
        'breadcrumbs' => [
            [
                'url' => route('shops-types'),
                'label' => __('Shops Types'),
            ],
        ],
        'actions' => [
            [
                'label' => __('New'),
                'url' => route('shops-types.create'),
            ]
        ]
    ])

    <!-- separator -->
    <div class="mb-4"></div>

@endsection

@section('main-content')
    <div class="container app-container-sm">
        <form action="{{ route('shops-types.update', [$type->id]) }}" method="post">
            @csrf
            @include('shops-types.partials.form', [
                'row' => $type
            ])
        </form>
    </div>

@endsection

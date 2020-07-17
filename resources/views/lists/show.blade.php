@extends('layouts.horizontal-master')

@section('heading-content')

    @include('components.heading', [
        'label' => __('View'),
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
        <form action="" onsubmit="return false;" method="post">
            @include('lists.partials.form', [
                'row' => $list,
                'disabled' => true
            ])        
        </form>
    </div>

@endsection

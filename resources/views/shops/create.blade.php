@extends('layouts.horizontal-master')

@section('heading-content')

   @include('components.heading', [
        'label' => __('New'),
        'breadcrumbs' => [
            [
                'url' => route('shops'),
                'label' => __('Shops'),
            ],
        ]
    ])

    <!-- separator -->
    <div class="mb-4"></div>

@endsection

@section('main-content')


    <div class="container app-container-sm">
        <form action="{{ route('shops.store') }}" method="post">
            @csrf
            @include('shops.partials.form', ['row' => $shop])
        </form>
    </div>

@endsection

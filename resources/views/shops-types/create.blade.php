@extends('layouts.horizontal-master')

@section('heading-content')

   @include('components.heading', [
        'label' => __('New'),
        'breadcrumbs' => [
            [
                'url' => route('shops-types'),
                'label' => __('Shops Types'),
            ],
        ]
    ])

    <!-- separator -->
    <div class="mb-4"></div>

@endsection

@section('main-content')


    <div class="container app-container-sm">
        <form action="{{ route('shops-types.store') }}" method="post">
            @csrf
            @include('shops-types.partials.form', ['row' => $type])
        </form>
    </div>

@endsection

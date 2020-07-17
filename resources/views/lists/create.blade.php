@extends('layouts.horizontal-master')

@section('heading-content')

   @include('components.heading', [
        'label' => __('New'),
        'breadcrumbs' => [
            [
                'url' => route('lists'),
                'label' => __('Lists'),
            ],
        ]
    ])

    <!-- separator -->
    <div class="mb-4"></div>

@endsection

@section('main-content')


    <div class="container app-container-sm">
        <form action="{{ route('lists.store') }}" method="post">
            @csrf
            @include('lists.partials.form', ['row' => $list])
        </form>
    </div>

@endsection

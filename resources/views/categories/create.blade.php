@extends('layouts.horizontal-master')

@section('heading-content')

   @include('components.heading', [
        'label' => __('New'),
        'breadcrumbs' => [
            [
                'url' => route('categories'),
                'label' => __('Categories'),
            ],
        ]
    ])

    <!-- separator -->
    <div class="mb-4"></div>

@endsection

@section('main-content')


    <div class="container app-container-sm">
        <form action="{{ route('categories.store') }}" method="post">
            @csrf
            @include('categories.partials.form', ['row' => $category])
        </form>
    </div>

@endsection

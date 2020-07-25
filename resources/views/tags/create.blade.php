@extends('layouts.horizontal-master')

@section('heading-content')

   @include('components.heading', [
        'label' => __('New'),
        'breadcrumbs' => [
            [
                'url' => route('tags'),
                'label' => __('Tags'),
            ],
        ]
    ])

    <!-- separator -->
    <div class="mb-4"></div>

@endsection

@section('main-content')


    <div class="container app-container-sm">
        <form action="{{ route('tags.store') }}" method="post">
            @csrf
            @include('tags.partials.form', ['row' => $tag])
        </form>
    </div>

@endsection

@extends('layouts.horizontal-master')

@section('heading-content')

   @include('components.heading', [
        'label' => __('New'),
        'breadcrumbs' => [
            [
                'url' => route('users'),
                'label' => __('Import Users'),
            ],
        ]
    ])

    <!-- separator -->
    <div class="mb-4"></div>

@endsection

@section('main-content')
    <div class="container app-container-sm">
        <form action="{{ route('import', 'users') }}" method="post" enctype="multipart/form-data">
            @csrf

            @include('partials.form-error-alert')

            <fieldset>

                <div class="card">
                    <div class="card-body">

                    <!-- csv -->
                    @include('components.form.csv', [
                        'group' => 'user',
                        'label' => __('CSV'),
                        'name' => 'csv'
                    ])

                    </div>
                </div>

                <!-- separator -->
                <div class="mb-4"></div>

                <button type="submit" class="btn  btn-primary m-1">
                    {{ __('Import') }}
                </button>

            </fieldset>   
        </form>
    </div>
@endsection
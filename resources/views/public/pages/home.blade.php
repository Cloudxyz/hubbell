@extends('layouts.auth-master')

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        
            <div class="card">

                <div class="card-body">

                    <p>
                        {{ __('Welcome to Hubbell, this site is under maintenance...') }}

                        <hr>

                        <a href="{{ route('dashboard') }}">
                            {{ __('Go to new dashboard') }}
                        </a>
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@extends('layouts.app')

@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container py-5">
            <h1 class="display-5 fw-bold text-center">
                Ciao {{ Auth::user()->name }}, bentornato su COUPICKR!
            </h1>
            <div class="text-center mt-4 ">
                <a href="{{ route('dashboard.home') }}" class="btn btn-primary main-button">Vai alla Dashboard</a>
            </div>
        </div>
    </div>
@endsection

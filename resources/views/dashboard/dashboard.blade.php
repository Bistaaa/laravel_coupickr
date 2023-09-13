@extends('layouts.app')

@section('content')
    <h1 class="text-center">DASHBOARD</h1>

    <div class="row card-container">
        @foreach ($categories as $category)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $category->img }}" class="card-img-top" alt="{{ $category->name }}">
                    <div class="card-body text-center"> <!-- Aggiunto text-center qui -->
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <a href="{{ route('category.show', $category->id) }}" class="btn btn-primary">Vai a
                            {{ $category->name }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

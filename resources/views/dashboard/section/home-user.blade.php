@extends('dashboard.dashboard')

@section('dashboardSection')
    <h1>HOME-USER</h1>

    <div class="category-cards">
        @foreach ($categories as $category)
            <div class="category-card">
                <h3>{{ $category->name }}</h3>
                <img src="{{ $category->img }}" alt="{{ $category->name }}">
                <a href="{{ route('category.show', $category->id) }}">Vai alla categoria</a>
            </div>
        @endforeach
    </div>
@endsection

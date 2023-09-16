@extends('layouts.app')

@section('content')
    <h1 class="text-center">DASHBOARD</h1>

    <div class="row card-container">
        @foreach ($categories as $category)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/images/' . $category->img) }}" class="card-img-top"
                        alt="{{ $category->name }}">
                    <div class="card-body text-center"> <!-- Aggiunto text-center qui -->
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <a href="{{ route('category.show', $category->id) }}" class="btn btn-primary">Vai a
                            {{ $category->name }}</a>
                        <div class="buttons-container">
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Modifica
                                Categoria</a>
                            <form action="{{ route('categories.toggleVisibility', $category->id) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="is_hidden_{{ $category->id }}">Nascondi Categoria</label>
                                    <input type="checkbox" id="is_hidden_{{ $category->id }}" name="is_hidden"
                                        {{ $category->is_hidden ? 'checked' : '' }} onchange="this.form.submit()">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

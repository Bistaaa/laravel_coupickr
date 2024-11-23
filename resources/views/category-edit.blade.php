@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>EDIT CATEGORIES</h1>
        <div class="row">
            <div class="col-md-6">
                <!-- Form per la modifica delle categorie -->
                <form method="POST" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Category</button>
                </form>
            </div>
            <div class="col-md-6">
                <!-- Elenco delle categorie attuali -->
                <h2>Current Categories</h2>
                <ul>
                    @foreach ($categories as $category)
                        <li>{{ $category->name }}</li>
                    @endforeach
                </ul>ç
            </div>
        </div>
    </div>
@endsection

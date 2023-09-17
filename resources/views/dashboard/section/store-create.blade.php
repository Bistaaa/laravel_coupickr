@extends('layouts.app')

@section('content')
    <h1 class="text-center m-4">Crea un nuovo negozio</h1>

    <form method="POST" action="{{ route('store.store', ['category_id' => $category_id]) }}" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="form-group">
            <label for="store_name">Nome del negozio:</label>
            <input type="text" class="form-control" id="store_name" name="store_name" required>
        </div>

        <div class="form-group">
            <label for="description">Descrizione:</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>

        <div class="form-group">
            <label for="link">Link:</label>
            <input type="url" class="form-control" id="link" name="link" required>
        </div>

        <div class="form-group">
            <label for="logo">Logo:</label>
            <input type="file" class="form-control" id="logo" name="logo">
        </div>

        <div class="form-group">
            <label for="affiliation_code">Codice d'affiliazione:</label>
            <input type="text" class="form-control" id="affiliation_code" name="affiliation_code">
        </div>

        <div class="form-group">
            <label for="discount">Sconto:</label>
            <input type="number" class="form-control" id="discount" name="discount" required>
        </div>

        <div class="form-group">
            <label for="commission">Commissione:</label>
            <input type="number" class="form-control" id="commission" name="commission" required>
        </div>

        <div class="form-check">
            <input type="checkbox" name="visibility" value="1">
            <label class="form-check-label" for="visibility">Nascondi Negozio</label>
        </div>

        <input type="hidden" name="category_id" value="{{ $category_id }}">

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Salva Negozio</button>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </form>
@endsection

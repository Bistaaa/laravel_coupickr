@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>EDIT STORES</h1>
        <div class="row">
            <div class="col-md-6">
                <!-- Form per la modifica dello store -->
                <form action="{{ route('store.update', $store->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <!-- Campo per il nome dello store -->
                    <div class="form-group">
                        <label for="store_name">Store Name</label>
                        <input type="text" name="store_name" class="form-control" value="{{ $store->store_name }}" required>
                    </div>

                    <!-- Campo per la descrizione dello store -->
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control">{{ $store->description }}</textarea>
                    </div>

                    <!-- Campo per il link dello store -->
                    <div class="form-group">
                        <label for="link">Link</label>
                        <input type="url" name="link" class="form-control" value="{{ $store->link }}" required>
                    </div>

                    <!-- Campo per l'ID della categoria dello store -->
                    <div class="form-group">
                        <label for="category_id">Category ID</label>
                        <input type="number" name="category_id" class="form-control" value="{{ $store->category_id }}"
                            required>
                    </div>

                    <!-- Campo per il logo dello store -->
                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <input type="text" name="logo" class="form-control" value="{{ $store->logo }}">
                    </div>

                    <!-- Campo per il codice di affiliazione -->
                    <div class="form-group">
                        <label for="affiliation_code">Affiliation Code</label>
                        <input type="text" name="affiliation_code" class="form-control"
                            value="{{ $store->affiliation_code }}">
                    </div>

                    <!-- Campo per lo sconto -->
                    <div class="form-group">
                        <label for="discount">Discount</label>
                        <input type="number" step="0.01" name="discount" class="form-control"
                            value="{{ $store->discount }}" required>
                    </div>

                    <!-- Campo per la commissione -->
                    <div class="form-group">
                        <label for="commission">Commission</label>
                        <input type="number" step="0.01" name="commission" class="form-control"
                            value="{{ $store->commission }}" required>
                    </div>

                    <!-- Bottone di invio del form -->
                    <button type="submit" class="btn btn-primary">Update Store</button>
                </form>
            </div>
            <div class="col-md-6">
                <!-- Elenco degli store attuali -->
                <h2>Nome del negozio</h2>
                <ul>
                    <li>{{ $store->store_name }}</li>
                </ul>
            </div>
        </div>
        <a href="{{ route('store.show', $category->id) }}" class="btn btn-warning">Torna alla lista dei negozi</a>
    </div>
@endsection

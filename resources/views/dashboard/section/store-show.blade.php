@extends('layouts.app')

@section('content')
    <h1 class="text-center">NEGOZI</h1>

    <div class="row store-container">
        @foreach ($stores as $store)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if (Str::startsWith($store->logo, 'uploads/'))
                        <img src="{{ asset('storage/' . $store->logo) }}" class="card-img-top" alt="{{ $store->store_name }}">
                    @else
                        <img src="{{ asset('storage/images/' . $store->logo) }}" class="card-img-top"
                            alt="{{ $store->store_name }}">
                    @endif
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $store->store_name }}</h5>
                        <p class="card-text">{{ $store->description }}</p>
                        <a href="{{ $store->link }}" class="btn btn-link" target="_blank">Vai al sito</a>
                        <p>Categoria ID: {{ $store->category_id }}</p>
                        <p>Codice di affiliazione: {{ $store->affiliation_code }}</p>
                        <p>Sconto: {{ $store->discount }}%</p>
                        <p>Commissione: {{ $store->commission }}%</p>
                    </div>

                    {{-- BUTTONS --}}
                    <div class="card-body text-center">

                        <div class="d-flex justify-content-evenly align-items-center mt-3">
                            <a href="{{ route('store.edit', ['category_id' => $store->category_id, 'store_id' => $store->id]) }}"
                                class="btn btn-warning">Modifica Negozio</a>

                            <form
                                action="{{ route('store.toggleVisibility', ['category_id' => $store->category_id, 'store_id' => $store->id]) }}"
                                method="post">
                                @csrf
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="is_hidden_{{ $store->id }}"
                                        name="is_hidden" {{ $store->is_hidden ? 'checked' : '' }}
                                        onchange="this.form.submit()">
                                    <label class="form-check-label" for="is_hidden_{{ $store->id }}">Nascondi
                                        Negozio</label>
                                </div>
                            </form>
                        </div>

                        <form id="delete-store-button" action="{{ route('store.delete', $store->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina Negozio</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

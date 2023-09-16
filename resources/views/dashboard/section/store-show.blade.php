@extends('layouts.app')

@section('content')
    <h1 class="text-center">NEGOZI</h1>

    <div class="row store-container">
        @foreach ($stores as $store)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if ($store->logo)
                        <img src="{{ asset('storage/' . $store->logo) }}" class="card-img-top" alt="{{ $store->store_name }}">
                    @endif
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $store->store_name }}</h5>
                        <p class="card-text">{{ $store->description }}</p>
                        <a href="{{ $store->link }}" class="btn btn-link" target="_blank">Vai al sito</a>
                        <p>Categoria ID: {{ $store->category_id }}</p>
                        <p>Codice di affiliazione: {{ $store->affiliation_code }}</p>
                        <p>Sconto: {{ $store->discount }}%</p>
                        <p>Commissione: {{ $store->commission }}%</p>

                        <!-- Aggiungi qui i bottoni per le azioni sul negozio, come modificare o eliminare -->
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

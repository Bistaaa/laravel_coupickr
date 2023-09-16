@extends('layouts.app')

@section('content')
    <h1 class="text-center m-4">
        Crea una nuova categoria
    </h1>

    <div class="w-75 border-2 border border-secondary m-auto my-2 p-2">
        <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">

            @csrf
            @method('POST')

            <div class="m-3">
                <label for="name">Nome Categoria</label>
                <input type="text" required minlength="2" maxlength="64" name="name" id="name">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>

            <div class="m-3">
                <label for="img">Immagine</label>
                <input type="file" maxlength="255" name="img" id="img">
                @error('img')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>

            <div class="m-3">
                <label for="visibility">Visibilità</label>
                <select name="visibility" required id="visibility">
                    <option value="1">Visibile</option>
                    <option value="0">Non Visibile</option>
                </select>

            </div>


            <div class="m-auto">
                <input class="m-3 px-3 py-1" type="submit" value="Crea">
                <a href="{{ route('dashboard.home') }}" class="btn btn-secondary">Indietro</a>
            </div>
        </form>
    </div>
@endsection

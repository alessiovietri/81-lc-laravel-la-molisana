@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="card-title">Crea un prodotto</h1>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <form action="{{ route('pastas.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" class="form-control" name="title" id="title" required maxlength="255" placeholder="Inserisci il titolo...">
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Tipo</label>
                        <select class="form-select" name="type" id="type" required>
                            <option selected>Seleziona un tipo</option>
                            <option value="lunga">Lunga</option>
                            <option value="corta">Corta</option>
                            <option value="cortissima">Cortissima</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="cooking_time" class="form-label">Tempo di cottura</label>
                        <input type="number" class="form-control" name="cooking_time" id="cooking_time" required min="1" placeholder="Inserisci il tempo di cottura...">
                    </div>
                    <div class="mb-3">
                        <label for="weight" class="form-label">Peso</label>
                        <input type="number" class="form-control" name="weight" id="weight" required min="1" placeholder="Inserisci il peso...">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Inserisci una descrizione..."></textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success">
                            Salva
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

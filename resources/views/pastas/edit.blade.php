@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <h1 class="card-title">Modifica il prodotto {{ $pasta->id }}</h1>

                <a href="{{ route('pastas.index') }}" class="btn btn-primary">
                    Torna indietro
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('pastas.update', $pasta->id) }}" method="POST">
                    @csrf

                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo *</label>
                        <input
                            type="text"
                            class="form-control"
                            name="title"
                            id="title"
                            value="{{ old('title', $pasta->title) }}"
                            required
                            maxlength="255"
                            placeholder="Inserisci il titolo...">
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Tipo *</label>
                        <select class="form-select" name="type" id="type" required>
                            <option>Seleziona un tipo</option>
                            <option value="lunga" {{ old('type', $pasta->type) == 'lunga' ? 'selected' : '' }}>Lunga</option>
                            <option value="corta" {{ old('type', $pasta->type) == 'corta' ? 'selected' : '' }}>Corta</option>
                            <option value="cortissima" {{ old('type', $pasta->type) == 'cortissima' ? 'selected' : '' }}>Cortissima</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="cooking_time" class="form-label">Tempo di cottura *</label>
                        <input
                            type="number"
                            class="form-control"
                            name="cooking_time"
                            id="cooking_time"
                            value="{{ old('cooking_time', $pasta->cooking_time) }}"
                            required
                            min="1"
                            placeholder="Inserisci il tempo di cottura...">
                    </div>
                    <div class="mb-3">
                        <label for="weight" class="form-label">Peso *</label>
                        <input
                            type="number"
                            class="form-control"
                            name="weight"
                            id="weight"
                            value="{{ old('weight', $pasta->weight) }}"
                            required
                            min="100"
                            placeholder="Inserisci il peso...">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Inserisci una descrizione...">{{ old('description', $pasta->description) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <p>
                            I campi contrassegnati con * sono <strong>obbligatori</strong>
                        </p>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-warning">
                            Aggiorna
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <h1>Tutti i prodotti</h1>

                <a href="{{ route('pastas.create') }}" class="btn btn-success">
                    Crea prodotto
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Titolo</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Tempo di cottura</th>
                            <th scope="col">Peso</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pastas as $pasta)
                            <tr>
                                <th scope="row">{{ $pasta->id }}</th>
                                <td>{{ $pasta->title }}</td>
                                <td>{{ $pasta->type }}</td>
                                <td>{{ $pasta->cooking_time }} min.</td>
                                @if ($pasta->weight < 1000)
                                    <td>{{ $pasta->weight }} gr.</td>
                                @else
                                    <td>{{ ($pasta->weight / 1000) }} kg</td>
                                @endif
                                <td>
                                    <a href="{{ route('pastas.show', $pasta->id) }}" class="btn btn-primary">
                                        Vedi
                                    </a>
                                    <a href="{{ route('pastas.edit', $pasta->id) }}" class="btn btn-warning">
                                        Aggiorna
                                    </a>
                                    <form
                                        action="{{ route('pastas.destroy', $pasta->id) }}"
                                        method="POST">
                                        @csrf

                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">
                                            Elimina
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

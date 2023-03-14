@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Tutti i prodotti</h1>

                <a href="{{ route('pastas.create') }}" class="btn btn-success">
                    Crea prodotto
                </a>
            </div>
        </div>
        <div class="row g-3">
            @foreach ($pastas as $pasta)
                <div class="col-4 mb-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h2 class="card-title">{{ $pasta->title }}</h2>

                            <a href="{{ route('pastas.show', $pasta->id) }}" class="btn btn-primary">
                                Vedi dettagli
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

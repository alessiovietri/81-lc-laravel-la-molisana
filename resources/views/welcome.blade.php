@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col text-center">

                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">La Molisana</h1>

                        <a href="{{ route('pastas.index') }}" class="btn btn-primary">
                            Vedi tutti i prodotti
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

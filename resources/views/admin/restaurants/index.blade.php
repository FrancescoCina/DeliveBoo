@extends('layouts.app')

@section('content')

    @if($restaurant)

    <h2 class="text-success my-3 text-center restaurant-title" > {{$restaurant->name}}</h2>
    <div class="container mt-5">
        <div class="row">
            <div class="col-8 mt-5">
                <ul class="restaurant-info">
                    <li>
                        <strong>ID</strong>: {{$restaurant->id}}
                    </li>
                    <li>
                        <strong>Indirizzo</strong>: {{$restaurant->address}}
                    </li>
                    <li>
                        <strong>Numero di Telefono</strong>: {{$restaurant->phone}}
                    </li>
                    <li>
                        <strong>Orario di Apertura</strong>: {{$restaurant->hours}}
                    </li>
                    <li>
                        <strong>Tipologie</strong>:                         
                        @forelse($restaurant->types as $type)
                            {{ $type->name }}
                        @empty
                            Nessuna Tipologia
                        @endforelse
                    </li>
                </ul>
                <hr class="custom-divider">
            </div>
            <div class="col-4">
                <img src="{{$restaurant->logo}}" alt="{{$restaurant->name}}">
            </div>
        </div>
    </div>

    @else
    <h2 class="text-secondary mt-5 text-center" > Non c'è un ristorante associato al tuo profilo</h2>
    <div class="d-flex justify-content-center">
        <a class="btn btn-warning my-5" href="{{ route('admin.restaurants.create') }}">Crea il Tuo Ristorante!</a>
    </div>
        
    @endif
@endsection
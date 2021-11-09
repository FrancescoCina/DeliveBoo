@extends('layouts.app')

@section('content')

@if($restaurant)

    <h2 class="text-danger mt-5 text-center">C'è gia un ristorante associato al tuo profilo!</h2>


@else
<form method="POST" action="{{ route('admin.restaurants.store') }}">
        @csrf
        <div>
            <label for="name">Nome Ristorante</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="logo">URL Logo</label>
            <input type="text" name="logo" id="logo">
        </div>
        <div>
            <label for="address">Indirizzo</label>
            <input type="text" name="address" id="address">
        </div>
        <div>
            <label for="vat_number">PIVA</label>
            <input type="text" name="vat_number" id="vat_number">
        </div>
        <div>
            <label for="phone">Numero di Telefono</label>
            <input type="text" name="phone" id="phone">
        </div>
        <div>
            <label for="hours">Orari</label>
            <input type="text" name="hours" id="hours">
        </div>
        <div>
            <label for="type_id">Tipologie Ristorante</label>
            <div>
                @foreach($types as $type)
                    <label for="'type' . '-' . {{$loop->iteration}}">{{$type->name}}</label>
                    <input type="checkbox" name="type" id="'type' . '-' . {{$loop->iteration}}">
                @endforeach
            </div>
        </div>

        <button type="submit">Crea</button>
    </form>
    @endif
@endsection
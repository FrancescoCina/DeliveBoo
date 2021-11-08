@extends('layouts.app')

@section('content')

    @if($restaurant)
    <ul>
        <li>
            {{ $restaurant->name }}
        </li>
        <li>
            <img src="{{ $restaurant->logo }}" alt="Logo">
        </li>
        <li>
            {{ $restaurant->address }}
        </li>
        <li>
            {{ $restaurant->vat_number }}
        </li>
        <li>
            {{ $restaurant->phone }}
        </li>
        <li>
            {{ $restaurant->hours }}
        </li>
        @foreach($restaurant->types as $type)

            <p>{{ $type->name }}</p>
            <p>{{ $type-> color }}</p>

        @endforeach
    </ul>

    @else
        <a href="{{ route('admin.restaurants.create') }}">Crea il Tuo Ristorante!</a>
    @endif
@endsection
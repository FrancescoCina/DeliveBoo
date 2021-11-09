@extends('layouts.app')

@section('content')

    @if($restaurant)

    <div class="container mt-5">
        <h1 class="text-center text-success my-5">Il Tuo Ristorante</h1>
        <table class="table table-secondary container">
            <thead >
                <tr class="bg-secondary text-white text-center ">
                    <th scope="col">Id</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Indirizzo</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Orari</th>
                    <th scope="col">PIVA</th>
                    <th scope="col">Tipologie</th>

                </tr>
            </thead>
            <tbody >
                <tr class="text-center">
                    <td class="align-middle py-5">{{$restaurant->id}}</td>
                    <td class="align-middle py-5"><img class="img-fluid w-25" src="{{$restaurant->logo}}" alt="{{$restaurant->name}}"></td>
                    <td class="align-middle py-5">{{$restaurant->name}}</td>
                    <td class="align-middle py-5">{{$restaurant->address}}</td>
                    <td class="align-middle py-5">{{$restaurant->phone}}</td>
                    <td class="align-middle py-5">{{$restaurant->hours}}</td>
                    <td class="align-middle py-5">{{$restaurant->vat_number}}</td>
                    <td class="align-middle py-5">
                        @forelse($restaurant->types as $type)
                            {{ $type->name }}
                        @empty
                            Nessuna Tipologia
                        @endforelse
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    @else
        <a href="{{ route('admin.restaurants.create') }}">Crea il Tuo Ristorante!</a>
    @endif
@endsection
@extends('layouts.app')
@section('content')

<div class="container">
    <table class="table table-secondary container">
            <a class="btn btn-success container" href="{{route('admin.plates.create')}}">INSERISCI UN NUOVO PIATTO</a>
            <thead >
                <tr class="bg-secondary text-white">
                    <th scope="col">Id</th>
                    <th scope="col"></th>
                    <th scope="col">Name</th>
                    <th scope="col">Portata</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Prezzo</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($plates as $plate)
                <tr>
                    <td>{{$plate->id}}</td>
                    <td><img class="img-fluid w-25" src="{{$plate->image}}" alt="{{$plate->name}}"></td>
                    <td>{{$plate->name}}</td>
                    <td>{{$plate->serving}}</td>

                    <td> 
                        @if ($plate->category)
                        <span class=" badge badge-pill badge-dark">{{$plate->category->name}}</span>
                        @else - 
                        @endif
                    </td>
                    <td>{{$plate->price}} £</td>
                    <td class="d-flex justify-content-end">
                        <a href="{{route('admin.plates.show', $plate->id)}}" class="btn btn-primary ml-2">Vai</a>
                        <a href="{{route('admin.plates.edit', $plate->id)}}" class="btn btn-warning ml-2">Modifica</a>
                        <form action="{{route('admin.plates.destroy', $plate->id)}}" method="post" class="delete-button">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ml-2">Elimina</button>
                        </form>
                    </td>
                </tr>
                    
                @empty
                    <tr>
                        <td colspan="3" class="text-center">
                            Non ci sono post da visualizzare
                        </td>
                    </tr>
                    
                @endforelse
            </tbody>
        </div>
    </table>
@endsection
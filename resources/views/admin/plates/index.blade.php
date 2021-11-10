@extends('layouts.app')
@section('content')

<div class="container">
    @if (!$restaurant)
        <h2 class="text-center text-danger">Inserisci prima un ristorante</h2>
    @else
        <table class="table table-secondary container">
                <a class="btn btn-success container p-3 mb-2" href="{{route('admin.plates.create')}}">INSERISCI UN NUOVO PIATTO</a>
                <thead >
                    <tr class="bg-secondary text-white text-center ">
                        <th scope="col">Id</th>
                        <th scope="col">Anteprima</th>
                        <th scope="col">Name</th>
                        <th scope="col">Portata</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody >
                    @forelse ($plates as $plate)
                     <tr class="text-center">
                        <td class="align-middle">{{$plate->id}}</td>
                        <td><img class="img-fluid w-25" src="{{$plate->image}}" alt="{{$plate->name}}"></td>
                        <td class="align-middle">{{$plate->name}}</td>
                        <td class="align-middle">{{$plate->serving}}</td>
                        <td class="align-middle"> 
                            @forelse ($plate->categories as $category)
                             <span class="badge bg-primary">{{$category->name}}</span>
                            @empty
                            - 
                            @endforelse
                        </td>
                        <td class="align-middle">{{$plate->price}} £</td>
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
                                Non ci sono piatti da visualizzare
                            </td>
                        </tr>
                        
                    @endforelse
                </tbody>
            </div>
        </table>
        <div class="d-flex justify-content-center">{{$plates->links()}}</div>
    @endif
    
@endsection
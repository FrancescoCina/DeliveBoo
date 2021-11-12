@extends('layouts.app')
@section('content')

<div class="container">
    @if (!$restaurant)
        <h2 class="text-center text-danger">Inserisci prima un ristorante</h2>
    @else

        <h1 class="text-success mb-4 text-center" > I Tuoi Piatti</h1>
        <a class="btn btn-success container p-3 mb-2" href="{{route('admin.plates.create')}}">INSERISCI UN NUOVO PIATTO</a>
        <div class="d-flex justify-content-around flex-wrap">

        @forelse ($plates as $plate)
            <div class="card mx-1 my-4" style="width: 18rem;">
                <img src="{{asset('storage/'.$plate->image)}}" alt="{{$plate->name}}" class="card-img-top card-img-custom">
                <div class="card-body">
                    <h5 class="card-title">{{$plate->name}}</h5>
                    <ul class="plates-card-list">
                        <li>
                            <strong>Portata</strong>: {{$plate->serving}}
                        </li>
                        <li>
                            <strong>Prezzo</strong>: {{$plate->price}}&euro;
                        </li>
                        <li>
                            <strong>Categorie</strong>: 

                            @forelse ($plate->categories as $category)
                             <span class="badge" style="background-color: {{$category->color}}">{{$category->name}}</span>
                            @empty
                            Nessuna 
                            @endforelse
                        </li>
                    </ul>
                    <div class="d-flex">
                        <a href="{{route('admin.plates.show', $plate->id)}}" class="btn btn-primary ml-2">Vai</a>
                        <a href="{{route('admin.plates.edit', $plate->id)}}" class="btn btn-warning ml-2">Modifica</a>
                        <form action="{{route('admin.plates.destroy', $plate->id)}}" method="post" class="delete-button">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ml-2">Elimina</button>
                        </form>
                    </div>
                </div>
            </div>

        @empty
            <p class="text-secondary text-center my-3">Non ci sono piatti da visualizzare</p>        
        @endforelse
        </div>
        
        <div class="d-flex justify-content-center">{{$plates->links()}}</div>
    @endif
    
@endsection
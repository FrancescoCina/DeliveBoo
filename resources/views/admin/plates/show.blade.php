@extends('layouts.app')

@section('content')


<div class="container mt-5">
        <div class="row restaurant-card">
            <div class="col-md-7 col-sm-12 ">
                <img class="cover img-fluid" src="{{asset('storage/'.$plate->image)}}" alt="{{$plate->name}}">
            </div>
            <div class="col-md-5 col-sm-12 restaurant-info-container">
            <h2 class="text-white mt-3 mb-5 restaurant-title text-center" > {{$plate->name}}</h2>
            <ul class="text-white restaurant-info ">
                    <h5 class="mb-3" >{{$plate->description}}</h5>
            <h6>Portata: <b>{{$plate->serving}}</b></h6>
            <h6>Prezzo: <b>{{$plate->price}} &euro;</b></h6>
            <h6>Categorie: <b>
               @forelse ($plate->categories as $category)
                <span class="badge" style="background-color: {{$category->color}}">{{$category->name}} </span>
               @empty
               Nessuna
               @endforelse </b></h6>
                </ul>
            </div>
        </div>
    </div>    
    <div class="container d-flex justify-content-center mt-5">
      <a href="{{ route('admin.plates.index')}}"><button class="btn btn-primary" type="submit" value="Torna alla lista">Torna ai tuoi piatti</button></a>
      <a href="{{route('admin.plates.edit', $plate->id)}}" class="btn btn-warning ml-2">Modifica</a>
        <form action="{{route('admin.plates.destroy', $plate->id)}}" method="post" class="delete-button">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger ml-2">Elimina</button>
        </form>
    </div>      
    @endsection


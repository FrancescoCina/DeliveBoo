@extends('layouts.app')
@section('content')

<section id="form" class="container">
  @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <ul>
              <li>{{$error}}</li>
            </ul>
        @endforeach
    </div>
@endif
    
    @if ($plate->id)
        <h1 class="text-center">Modifica Piatto</h1>
        <form class="w-75 mx-auto" method="POST" action="{{route('admin.plates.update',$plate->id)}}">
        @method('PATCH')
    @else
       <h1 class="text-center">Crea Piatto</h1>
       <form class="w-75 mx-auto" method="POST" action="{{route('admin.plates.store')}}">
    @endif
        @csrf
       <div class="form-group">
         <label for="name">Nome del piatto</label>
         <input type="text" class="form-control" id="name" name='name' placeholder="Inserisci il nome del piatto" value="{{$plate->name}}">
       </div>
       <div class="form-group">
          <label for="image">Immagine</label>
          <input type="file" class="form-control" id="image" name='image' value="{{$plate->image}}">
        </div>
        <div class="form-group">
          <label for="Description">Descrizione</label>
          <textarea class="form-control" id="Description" name="description" >{{$plate->description}}</textarea>
        </div>
        <div class="form-group">
          <label for="price">Prezzo</label>
          <input type="text" class="form-control" id="price" name='price' placeholder="Inserisci il prezzo del piatto" value="{{$plate->price}}">
        </div>
        <div class="form-group">
          <label for="serving">Portata</label>
          <select class="form-control" id="serving" name="serving">
            <option value="ANT">ANT</option>
            <option value="PRI">PRI</option>
            <option value="SEC">SEC</option>
            <option value="DOL">DOL</option>
          </select>
        </div>  
        <div class="d-flex my-2">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="is_available" id="is_available" value="true">
            <label class="form-check-label" for="is_available">
              Disponibile
            </label>
          </div>
          <div class="form-check ml-2">
            <input class="form-check-input" type="radio" name="is_available" id="is_available" value="false">
            <label class="form-check-label" for="is_available">
              Non disponibile
            </label>
          </div>
        </div>
 
        @foreach ($categories as $category) 
          <div class="form-check form-check-inline">
             <input class="form-check-input" type="checkbox" id="{{$category->id}}" value="{{$category->id}}" name="categories[]" @if(in_array($category->id , old('category', $categoriesIds ?? []))) checked @endif>
             <label class="form-check-label" for="{{$category->id}}" >{{$category->name}}</label>
          </div>   
       @endforeach
       <div class="my-2 d-flex justify-content-between">
         <button class='btn btn-success'type="submit">Salva</button>
         <a class='btn btn-outline-secondary' href="{{route('admin.plates.index')}}">Indietro</a>
       </div>
       
      

     </form>
   </section>   
@endsection
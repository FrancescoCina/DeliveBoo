@extends('layouts.app')
@section('content')
<section id="form" class="container">
    
    @if ($plate->id)
        <h1 class="text-center">Modifica Piatto</h1>
        <form class="w-75 mx-auto" method="POST" action="{{route('admin.plates.edit')}}">
        @method('PATCH')
    @else
       <h1 class="text-center">Crea Piatto</h1>
       <form class="w-75 mx-auto" method="POST" action="{{route('admin.plates.store')}}">
    @endif
        @csrf
       <div class="form-group">
         <label for="name">Nome del piatto</label>
         <input type="text" class="form-control" id="name" name='name' placeholder="Inserisci il nome del piatto">
       </div>
       <div class="form-group">
          <label for="image">Immagine</label>
          <input type="file" class="form-control" id="image" name='image'>
        </div>
        <div class="form-group">
          <label for="Description">Descrizione</label>
          <textarea class="form-control" id="Description" name="description" ></textarea>
        </div>
        <div class="form-group">
          <label for="price">Prezzo</label>
          <input type="text" class="form-control" id="price" name='price' placeholder="Inserisci il prezzo del piatto">
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
 
        @foreach ($categories as $category) 
          <div class="form-check form-check-inline">
             <input class="form-check-input" type="checkbox" id="{{$category->id}}" value="option1">
             <label class="form-check-label" for="{{$category->id}}" name="categories[]" @if(in_array($category->id , old('category', $categoryId ?? []))) checked @endif>{{$category->name}}</label>
          </div>   
       @endforeach
         
     </form>
   </section>   
@endsection
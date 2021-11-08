@extends('layouts.app')
@section('content')
  <section id="form" class="container">
   <form class="w-75 mx-auto">
      <div class="form-group">
        <label for="name">Nome del piatto</label>
        <input type="text" class="form-control" id="name" name='name' placeholder="Inserisci il nome del piatto">
      </div>
      <div class="form-group">
         <label for="image"></label>
         <input type="file" class="form-control" id="image" name='image'>
       </div>
       <div class="form-group">
         <label for="exampleFormControlTextarea1">Descrizione</label>
         <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
       </div>
       <div class="form-group">
         <label for="price">Prezzo</label>
         <input type="text" class="form-control" id="price" name='price' placeholder="Inserisci il prezzo del piatto">
       </div>
       <div class="form-group">
         <label for="serving">Portata</label>
         <select class="form-control" id="serving" name="serving">
           <option value="">1</option>
           <option value="">2</option>
           <option value="">3</option>
           <option value="">4</option>
           <option value="">5</option>
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
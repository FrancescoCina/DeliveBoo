@extends('layouts.app')

@section('content')
    




<div class="container d-flex justify-content-center align-items-center">
    <div class="card my-5 py-3 font-size-2" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Ordine n° {{ $order->id }}</h5>
          {{-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> --}}
          <p class="card-text"><strong>Nome Cliente: </strong>{{ $order->customer_name }}</p>
          <p class="card-text"><strong>Cognome Cliente: </strong>{{ $order->customer_lastname }}</p>
          <p class="card-text"><strong>Indirizzo Cliente: </strong>{{ $order->customer_address }}</p>
          <p class="card-text"><strong>Email Cliente: </strong>{{ $order->customer_email }}</p>
          <p class="card-text"><strong>Prezzo: </strong> € {{ $order->amount }}</p>
          <p class="card-text"><strong>Pagato: </strong>  
            @if($order->is_payed)
            <span class="badge badge-pill badge-success">Pagato</span>
            @else
            <span class="badge badge-pill badge-danger">Da pagare</span>
            @endif
        </p>
          <form method="POST" action="{{ route('admin.orders.destroy', $order->id) }}">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit">Elimina</button>
          </form>
      
    
            

          
   


    
         {{-- Bottone per softDelete --}}
    
        </div>
      </div>
</div>


{{-- Ingrandire font size??? --}}
{{-- Modificare parametro dinamico in web.php da plate ad order --}}
{{-- Devo modificare web.php con l'inserimento della rotta destroy e trash --}}
{{-- 
    

    Route::delete('/orders/{order}', 'OrderController@destroy')->name('orders.destroy');
    Route::get('/orders/trash, OrderController@trash')->name('orders.trash');  
    Route::patch('/orders/{order}/restore, OrderController@restore')->name('orders.restore');  

    
    
        --}}











@endsection
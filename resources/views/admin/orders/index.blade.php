@extends('layouts.app')

@section('content')
    <section id="orders" class="container">

        @if(session('alert-msg'))

        <div class="alert alert-{{session('alert-type')}}" role="alert">
            {{ session('alert-msg') }}
          </div>

        @endif


        @if(!$restaurant)
        @include('includes.alert_restaurant')
        @else  

          <a href="{{ route('admin.orders.statistics.index') }}" class="btn btn-success">Vai alle statistiche</a>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Amount</th>
                <th scope="col">Paid</th>
                <th scope="col"></th>
                <th scope="col"></th>

              </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)  
                <tr>
                    <td>{{ $order->id }}</td>
                    <td> € {{ $order->amount }}</td>
                    <td>
                        @if($order->is_payed)
                        <span class="badge badge-pill badge-success">Pagato</span>
                        @else
                        <span class="badge badge-pill badge-danger">Da pagare</span>
                        @endif
                    </td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->customer_address }}</td>

                    <td><a class="btn btn-primary" href="{{ route('admin.orders.show', $order->id) }}">Dettagli</a></td>
                    <td>
                        <form class="delete-button" method="POST" action="{{ route('admin.orders.destroy', $order->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Elimina</button>
                        </form>
                    </td>
                   

                </tr>
                @endforeach
            </tbody>
            <tfoot>                
                    <a class="btn btn-info" href="{{ route('admin.orders.trash') }}">Vai agli ordini eliminati</a>
               

                <div class="d-flex justify-content-end">
                    {{ $orders->links() }}
                </div>


            </tfoot>
          </table>

    </section>
    @endif
@endsection

@extends('layouts.app')

@section('content')
    <section id="orders" class="container">
  
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Amount</th>
                <th scope="col">Paid</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)  
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->amount }}</td>
                    <td>{{ $order->is_payed }}</td>
                    <form action="POST" action="{{ route('admin.orders.restore', $order->id) }}">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-success" type="submit">Ripristina</button>
                    </form>
                </tr>
                @endforeach
            </tbody>
          </table>

    </section>
@endsection

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function index()
    {
        $restaurant = Restaurant::where('user_id', Auth::user()->id)->first();
        $orders = Order::paginate(5);
        // $orders = Order::all();
        return view('admin.orders.index', compact('orders', 'restaurant'));
    }


    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->with('alert-type', 'success')->with('alert-msg', "Ordine n° $order->id eliminato con successo");
    }


    public function trash()
    {
        $orders = Order::onlyTrashed()->get();
        return view('admin.orders.trash', compact('orders'));
    }

    public function restore($id)
    {
        $order = Order::withTrashed()->find($id);
        $order->restore();
        return redirect()->route('admin.orders.index')->with('alert-type', 'success')->with('alert-msg', "Ordine n° $order->id ripristinato con successo");
    }
}

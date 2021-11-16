<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();
        $order = new Order();
        $order->name = $data['customer_name'];
        $order->surname = $data['customer_lastname'];
        $order->address = $data['customer_address'];
        $order->mail = $data['customer_mail'];
        $order->amount = $data['amount'];
        $order->is_payed = $data['isPayed'];
        $order->save();

        foreach ($data['order_plate'] as $key => $detail) {
            $order->plates()->attach($key, ['quantity' => $detail]);
        }

        return response()->json([
            'Message' => 'Order was successfully created',
            'Order_number' => $order->id
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

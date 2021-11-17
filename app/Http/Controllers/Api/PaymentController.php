<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;
use Illuminate\Http\Request;
use Braintree\Gateway;
use App\Models\Order;


class PaymentController extends Controller
{
    public function generate(Gateway $gateway)
    {
        // dd($gateway);
        $clientToken = $gateway->clientToken()->generate();
        // dd($clientToken);
        return response()->json([
            'clientToken' => $clientToken,
            'message' => 'Success'
        ], 200);
    }

    public function makepayment(OrderRequest $request, Gateway $gateway)
    {
        $order = Order::find($request->id);

        $result = $gateway->transaction()->sale([
            'amount' => $order->total,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            $data = [
                'email' => $order->mail,
                'amount' => $order->total,
                'order_number' => $order->id,
                'success' => true,
                'message' => 'Transazione avvenuta con successo'
            ];
            return response()->json(compact('data'), 200);
        } else {
            $data = [
                'success' => false,
                'message' => 'Transazione Fallita'
            ];
            return response()->json(compact('data'), 401);
        }
    }
}

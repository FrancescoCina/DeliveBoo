<?php

namespace App\Http\Controllers\Api;

use Braintree\Gateway;

class PaymentController extends Controller
{
    public function getToken(Gateway $gateway)
    { {
            $clientToken = $gateway->clientToken()->generate();
            return response()->json([
                'clientToken' => $clientToken
            ]);
        }
    }
}

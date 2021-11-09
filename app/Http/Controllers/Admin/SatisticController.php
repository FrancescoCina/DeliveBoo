<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SatisticController extends Controller
{
    public function index()
    {
        return view('admin.orders.statistics.index');  // Mandare alla view dati per grafici con compact
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Redirect, Response;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ChartController extends Controller
{
    public function index()
    {
        $TotOrders = Order::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"), DB::raw("MONTH(created_at) as month"))
            ->where('created_at', '<', Carbon::today())
            ->groupBy('month_name', 'month')
            ->orderBy('month')
            ->get();





        $data = [];

        foreach ($TotOrders as $row) {
            $data['label'][] = $row->month_name;
            $data['data'][] = (int)$row->count;
        };


        /*    $data = [

            [
                'label' => ['Prova1', 'prova2', 'prova3', 'prova4'],
                'data' => [10, 20, 30, 40],
            ],
        ]; */

        $data['chart_data'] = json_encode($data);
        return view('admin.orders.statistics.index', $data);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Restaurant;

use Illuminate\Support\Facades\Auth;

use App\User;

class RestaurantController extends Controller
{
    public function index()
    {
        $newRestaurant = Restaurant::where('user_id', Auth::user()->id)->first();

        return view('admin.restaurants.index', compact('newRestaurant'));

    }
}

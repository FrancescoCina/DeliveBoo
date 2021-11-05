<?php

use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use App\User;
use Illuminate\Support\Arr;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $resturants=[
            [
                'name' => "Silver Spurs",
                'address' => "Corso Laguardia,30 RM 10012",
                'vat_number'=>'09234567891',
                'phone'=>"0688016055",
                'hours'=>"Giornaliero: 6am-11pm",
            ],
            [
                'name' => "Bakeri",
                'address' => " Via Roma,150, RM 10012",
                'vat_number'=>'09234567671',
                'phone'=>"0689016055",
                'hours'=>"Giornaliero: 8am-7pm",
            ],
            [
                'name' => "Pizzeria da Desy",
                'address' => " Via Milano,15 RM 10012",
                'vat_number'=>'09238567671',
                'phone'=>"0688987055",
                'hours'=>"Giornaliero: 11am-12:30am",
            ],
            [
                'name' => "Pizzeria Civico 38",
                'address' => " Via Venezia,38,RM 10012",
                'vat_number'=>'09238569811',
                'phone'=>"0688987099",
                'hours'=>"Lun-Gio: 10am-10pm Ven: 10am-12am Sab: 12pm-12am Dom: 12pm-10pm",
            ],
            [
                'name' => "Porto Fluviale Ristorante Pizzeria",
                'address' => " Via del Porto Fluviale, 22, RM 00154",
                'vat_number'=>'11389961001',
                'phone'=>"06 574 3199",
                'hours'=>"Lun-Dom: 10:30AM–2AM",
            ],
        
         
        ];

        $user_ids= User::select('id')->pluck('id')->toArray();
        
        foreach($resturants as $resturant){
            $newRestaurant = new Restaurant();
            $newRestaurant->name= $resturant['name'];
            $newRestaurant->address= $resturant['address'];
            $newRestaurant->vat_number= $resturant['vat_number'];
            $newRestaurant->phone= $resturant['phone'];
            $newRestaurant->hours= $resturant['hours'];

            $newRestaurant->user_id=Arr::random($user_ids);
        
            $newRestaurant->save();
        };
    }
}

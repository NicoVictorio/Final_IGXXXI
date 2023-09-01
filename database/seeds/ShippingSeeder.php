<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shipping = [
            [
                'name' => 'Daging',
                'volume' => '0.61',
                'quantity' => '32',
                'weight' => '2',
                'city' => 'Thailand',
                'container' => 'Refrigerated Container',
                'period_id' => '1',
            ],
        ];
        DB::table('shipping_container')->insert($shipping);
    }
}

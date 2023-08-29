<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $container = [
            [
                'name' => 'General Container',
                'volume' => '33.2',
                'min_volume' => '0',
                'max_volume' => '33.2',
                'weight' => '25000',
                'min_weight' => '0',
                'max_weight' => '25000',
                'size' => '20ft',
            ],
            [
                'name' => 'General Container',
                'volume' => '67.8',
                'min_volume' => '0',
                'max_volume' => '67.8',
                'weight' => '27000',
                'min_weight' => '0',
                'max_weight' => '27000',
                'size' => '40ft',
            ],
            [
                'name' => 'Refrigerated Container',
                'volume' => '27.3',
                'min_volume' => '0',
                'max_volume' => '27.3',
                'weight' => '27470',
                'min_weight' => '0',
                'max_weight' => '27470',
                'size' => '20ft',
            ],
            [
                'name' => 'Refrigerated Container',
                'volume' => '64.9',
                'min_volume' => '0',
                'max_volume' => '64.9',
                'weight' => '29300',
                'min_weight' => '0',
                'max_weight' => '29300',
                'size' => '40ft',
            ],
            [
                'name' => 'Fantainer/Ventilation',
                'volume' => '33.2',
                'min_volume' => '0',
                'max_volume' => '33.2',
                'weight' => '25000',
                'min_weight' => '0',
                'max_weight' => '25000',
                'size' => '20ft',
            ],
            [
                'name' => 'Fantainer/Ventilation',
                'volume' => '67.8',
                'min_volume' => '0',
                'max_volume' => '67.8',
                'weight' => '27000',
                'min_weight' => '0',
                'max_weight' => '27000',
                'size' => '40ft',
            ],
            [
                'name' => 'Tank Container',
                'volume' => '21000',
                'min_volume' => '16800',
                'max_volume' => '19950',
                'weight' => '32350',
                'min_weight' => '0',
                'max_weight' => '32350',
                'size' => '21000L',
            ],
            [
                'name' => 'Tank Container',
                'volume' => '24000',
                'min_volume' => '19200',
                'max_volume' => '22800',
                'weight' => '32270',
                'min_weight' => '0',
                'max_weight' => '32270',
                'size' => '24000L',
            ],
            [
                'name' => 'Tank Container',
                'volume' => '25000',
                'min_volume' => '20000',
                'max_volume' => '23750',
                'weight' => '32100',
                'min_weight' => '0',
                'max_weight' => '32100',
                'size' => '25000L',
            ],
            [
                'name' => 'Tank Container',
                'volume' => '26000',
                'min_volume' => '20800',
                'max_volume' => '24700',
                'weight' => '31940',
                'min_weight' => '0',
                'max_weight' => '31940',
                'size' => '26000L',
            ],
        ];
        DB::table('containers')->insert($container);
    }
}

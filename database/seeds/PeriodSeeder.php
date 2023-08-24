<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $period = [
            [
                'name' => 'Depo Agent',
                'status' => 'active',
            ],
            [
                'name' => 'Container Agent',
                'status' => 'standby',
            ],
            [
                'name' => 'Shipping Agent',
                'status' => 'standby',
            ],
        ];
        DB::table('periods')->insert($period);
    }
}

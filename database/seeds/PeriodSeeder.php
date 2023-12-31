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
                'name' => 'export',
                'status' => 'standby',
            ],
            [
                'name' => 'import',
                'status' => 'standby',
            ],
        ];
        DB::table('periods')->insert($period);
    }
}

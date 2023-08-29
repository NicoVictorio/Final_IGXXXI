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
                'name' => 'Export',
                'status' => 'Depo-Agent',
            ],
            [
                'name' => 'Export',
                'status' => 'Container-Agent',
            ],
            [
                'name' => 'Export',
                'status' => 'Shipping-Agent',
            ],
            [
                'name' => 'Import',
                'status' => 'Depo-Agent',
            ],
            [
                'name' => 'Import',
                'status' => 'Container-Agent',
            ],
            [
                'name' => 'Import',
                'status' => 'Shipping-Agent',
            ],
            [
                'name' => 'ExportImport',
                'status' => 'Depo-Agent',
            ],
            [
                'name' => 'ExportImport',
                'status' => 'Container-Agent',
            ],
            [
                'name' => 'ExportImport',
                'status' => 'Shipping-Agent',
            ],
        ];
        DB::table('periods')->insert($period);
    }
}

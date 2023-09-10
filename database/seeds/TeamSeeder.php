<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = [
            [
                'name' => 'Tim Edu',
            ],
            [
                'name' => 'Smala',
            ],
            [
                'name' => 'Paseo',
            ],
            [
                'name' => 'Klein and Friends',
            ],
            [
                'name' => 'Clavenfore',
            ],
            [
                'name' => 'Durian Musangking',
            ],
            [
                'name' => 'Hokay',
            ],
            [
                'name' => 'Free Willy',
            ],
            [
                'name' => 'Tim Pehh',
            ],
            [
                'name' => 'Sinlucky',
            ],
            [
                'name' => 'Tim Nico',
            ],
        ];
        DB::table('teams')->insert($teams);
    }
}

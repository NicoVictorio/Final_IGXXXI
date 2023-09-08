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
                'name' => 'Tim 1',
            ],
            [
                'name' => 'Tim 2',
            ],
            [
                'name' => 'Tim 3',
            ],
            [
                'name' => 'Tim 4',
            ],
            [
                'name' => 'Tim 5',
            ],
            [
                'name' => 'Tim 6',
            ],
            [
                'name' => 'Tim 7',
            ],
            [
                'name' => 'Tim 8',
            ],
            [
                'name' => 'Tim 9',
            ],
            [
                'name' => 'Tim 10',
            ],
            [
                'name' => 'Tim Nico',
            ],
        ];
        DB::table('teams')->insert($teams);
    }
}

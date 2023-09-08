<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'username' => 'tim1',
                'password' => Hash::make('tim1'),
                'role'=>'player',
                'team_id'=>1,
            ],
            [
                'username' => 'tim2',
                'password' => Hash::make('tim2'),
                'role'=>'player',
                'team_id'=>2,
            ],
            [
                'username' => 'tim3',
                'password' => Hash::make('tim3'),
                'role'=>'player',
                'team_id'=>3,
            ],
            [
                'username' => 'tim4',
                'password' => Hash::make('tim4'),
                'role'=>'player',
                'team_id'=>4,
            ],
            [
                'username' => 'tim5',
                'password' => Hash::make('tim5'),
                'role'=>'player',
                'team_id'=>5,
            ],
            [
                'username' => 'tim6',
                'password' => Hash::make('tim6'),
                'role'=>'player',
                'team_id'=>6,
            ],
            [
                'username' => 'tim7',
                'password' => Hash::make('tim7'),
                'role'=>'player',
                'team_id'=>7,
            ],
            [
                'username' => 'tim8',
                'password' => Hash::make('tim8'),
                'role'=>'player',
                'team_id'=>8,
            ],
            [
                'username' => 'tim9',
                'password' => Hash::make('tim9'),
                'role'=>'player',
                'team_id'=>9,
            ],
            [
                'username' => 'tim10',
                'password' => Hash::make('tim10'),
                'role'=>'player',
                'team_id'=>10,
            ],
            [
                'username' => 'timNico',
                'password' => Hash::make('timNico'),
                'role'=>'player',
                'team_id'=>10,
            ],
            [
                'username' => 'penpos',
                'password' => Hash::make('12345678'),
                'role'=>'penpos',
                'team_id'=>null,
            ],
        ];
        DB::table('users')->insert($users);
    }
}

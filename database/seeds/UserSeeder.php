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
        // $users = [
        //     [
        //         'username' => 'tim1',
        //         'password' => Hash::make('12345678'),
        //         'role'=>'player',
        //         'team_id'=>1,
        //     ],
        //     [
        //         'username' => 'penpos',
        //         'password' => Hash::make('12345678'),
        //         'role'=>'penpos',
        //         'team_id'=>null,
        //     ],
        // ];
        // DB::table('users')->insert($users);
    }
}

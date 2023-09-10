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
                'username' => 'timedu',
                'password' => Hash::make('tu07'),
                'role'=>'player',
                'team_id'=>1,
            ],
            [
                'username' => 'smala',
                'password' => Hash::make('sa24'),
                'role'=>'player',
                'team_id'=>2,
            ],
            [
                'username' => 'paseo',
                'password' => Hash::make('po10'),
                'role'=>'player',
                'team_id'=>3,
            ],
            [
                'username' => 'kleinandfriends',
                'password' => Hash::make('ks19'),
                'role'=>'player',
                'team_id'=>4,
            ],
            [
                'username' => 'clavenfore',
                'password' => Hash::make('ce23'),
                'role'=>'player',
                'team_id'=>5,
            ],
            [
                'username' => 'durianmusangking',
                'password' => Hash::make('dg28'),
                'role'=>'player',
                'team_id'=>6,
            ],
            [
                'username' => 'hokay',
                'password' => Hash::make('hy18'),
                'role'=>'player',
                'team_id'=>7,
            ],
            [
                'username' => 'freewilly',
                'password' => Hash::make('fy20'),
                'role'=>'player',
                'team_id'=>8,
            ],
            [
                'username' => 'timpehh',
                'password' => Hash::make('th06'),
                'role'=>'player',
                'team_id'=>9,
            ],
            [
                'username' => 'sinlucky',
                'password' => Hash::make('sy15'),
                'role'=>'player',
                'team_id'=>10,
            ],
            [
                'username' => 'timNico',
                'password' => Hash::make('timNico'),
                'role'=>'player',
                'team_id'=>11,
            ],
            [
                'username' => 'penpos1',
                'password' => Hash::make('indomie1'),
                'role'=>'penpos',
                'team_id'=>null,
            ],
            [
                'username' => 'penpos2',
                'password' => Hash::make('indomie2'),
                'role'=>'penpos',
                'team_id'=>null,
            ],
            [
                'username' => 'penpos3',
                'password' => Hash::make('indomie3'),
                'role'=>'penpos',
                'team_id'=>null,
            ],
            [
                'username' => 'penpos4',
                'password' => Hash::make('indomie4'),
                'role'=>'penpos',
                'team_id'=>null,
            ],
            [
                'username' => 'penpos5',
                'password' => Hash::make('indomie5'),
                'role'=>'penpos',
                'team_id'=>null,
            ],
            [
                'username' => 'penpos6',
                'password' => Hash::make('indomie6'),
                'role'=>'penpos',
                'team_id'=>null,
            ],
            [
                'username' => 'lo-final',
                'password' => Hash::make('yangbuatnelly'),
                'role'=>'lo',
                'team_id'=>null,
            ],
            [
                'username' => 'admin',
                'password' => Hash::make('yangbuatrara'),
                'role'=>'admin',
                'team_id'=>null,
            ],
        ];
        DB::table('users')->insert($users);
    }
}

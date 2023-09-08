<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScoringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $scoring = [
            [
                'period_id' => '1',
                'team_id' => '1',
                'stowage_plan' => null,
                'docking_duration' => null,
                'teus' => null,
                'lateness' => null,
                'completion_time' => null,
                'acceptance' => null,
            ],
            [
                'period_id' => '2',
                'team_id' => '1',
                'stowage_plan' => null,
                'docking_duration' => null,
                'teus' => null,
                'lateness' => null,
                'completion_time' => null,
                'acceptance' => null,
            ],
            [
                'period_id' => '1',
                'team_id' => '2',
                'stowage_plan' => null,
                'docking_duration' => null,
                'teus' => null,
                'lateness' => null,
                'completion_time' => null,
                'acceptance' => null,
            ],
            [
                'period_id' => '2',
                'team_id' => '2',
                'stowage_plan' => null,
                'docking_duration' => null,
                'teus' => null,
                'lateness' => null,
                'completion_time' => null,
                'acceptance' => null,
            ],
            [
                'period_id' => '1',
                'team_id' => '3',
                'stowage_plan' => null,
                'docking_duration' => null,
                'teus' => null,
                'lateness' => null,
                'completion_time' => null,
                'acceptance' => null,
            ],
            [
                'period_id' => '2',
                'team_id' => '3',
                'stowage_plan' => null,
                'docking_duration' => null,
                'teus' => null,
                'lateness' => null,
                'completion_time' => null,
                'acceptance' => null,
            ],
            [
                'period_id' => '1',
                'team_id' => '4',
                'stowage_plan' => null,
                'docking_duration' => null,
                'teus' => null,
                'lateness' => null,
                'completion_time' => null,
                'acceptance' => null,
            ],
            [
                'period_id' => '2',
                'team_id' => '4',
                'stowage_plan' => null,
                'docking_duration' => null,
                'teus' => null,
                'lateness' => null,
                'completion_time' => null,
                'acceptance' => null,
            ],
            [
                'period_id' => '1',
                'team_id' => '5',
                'stowage_plan' => null,
                'docking_duration' => null,
                'teus' => null,
                'lateness' => null,
                'completion_time' => null,
                'acceptance' => null,
            ],
            [
                'period_id' => '2',
                'team_id' => '5',
                'stowage_plan' => null,
                'docking_duration' => null,
                'teus' => null,
                'lateness' => null,
                'completion_time' => null,
                'acceptance' => null,
            ],
            [
                'period_id' => '1',
                'team_id' => '6',
                'stowage_plan' => null,
                'docking_duration' => null,
                'teus' => null,
                'lateness' => null,
                'completion_time' => null,
                'acceptance' => null,
            ],
            [
                'period_id' => '2',
                'team_id' => '6',
                'stowage_plan' => null,
                'docking_duration' => null,
                'teus' => null,
                'lateness' => null,
                'completion_time' => null,
                'acceptance' => null,
            ],
            [
                'period_id' => '1',
                'team_id' => '7',
                'stowage_plan' => null,
                'docking_duration' => null,
                'teus' => null,
                'lateness' => null,
                'completion_time' => null,
                'acceptance' => null,
            ],
            [
                'period_id' => '2',
                'team_id' => '7',
                'stowage_plan' => null,
                'docking_duration' => null,
                'teus' => null,
                'lateness' => null,
                'completion_time' => null,
                'acceptance' => null,
            ],
            [
                'period_id' => '1',
                'team_id' => '8',
                'stowage_plan' => null,
                'docking_duration' => null,
                'teus' => null,
                'lateness' => null,
                'completion_time' => null,
                'acceptance' => null,
            ],
            [
                'period_id' => '2',
                'team_id' => '8',
                'stowage_plan' => null,
                'docking_duration' => null,
                'teus' => null,
                'lateness' => null,
                'completion_time' => null,
                'acceptance' => null,
            ],
            [
                'period_id' => '1',
                'team_id' => '9',
                'stowage_plan' => null,
                'docking_duration' => null,
                'teus' => null,
                'lateness' => null,
                'completion_time' => null,
                'acceptance' => null,
            ],
            [
                'period_id' => '2',
                'team_id' => '9',
                'stowage_plan' => null,
                'docking_duration' => null,
                'teus' => null,
                'lateness' => null,
                'completion_time' => null,
                'acceptance' => null,
            ],
            [
                'period_id' => '1',
                'team_id' => '10',
                'stowage_plan' => null,
                'docking_duration' => null,
                'teus' => null,
                'lateness' => null,
                'completion_time' => null,
                'acceptance' => null,
            ],
            [
                'period_id' => '2',
                'team_id' => '10',
                'stowage_plan' => null,
                'docking_duration' => null,
                'teus' => null,
                'lateness' => null,
                'completion_time' => null,
                'acceptance' => null,
            ],
        ];
        DB::table('scorings')->insert($scoring);
    }
}

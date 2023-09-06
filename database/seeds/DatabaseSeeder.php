<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(TeamSeeder::class);
        // $this->call(ContainerSeeder::class);
        // $this->call(PeriodSeeder::class);
        // $this->call(DemandSeeder::class);
        // $this->call([ScoringSeeder::class]);
        $this->call(ShippingSeeder::class);
        // $this->call([TeamProductSeeder::class]);
        // $this->call(UserSeeder::class);
    }
}

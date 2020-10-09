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
        $this->call(AirportSeeder::class);
        $this->call(TransporterSeeder::class);
        $this->call(TicketSeeder::class);
    }
}

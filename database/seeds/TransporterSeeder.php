<?php

use App\Models\Transporter;
use Illuminate\Database\Seeder;

class TransporterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Transporter::class, 500)->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Hostel;
use Illuminate\Database\Seeder;

class HostelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Hostel::factory()->count(10)->create();
    }
}

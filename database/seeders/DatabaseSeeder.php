<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Booking;
use App\Models\Hostel;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        //        $this->call([
        //            HostelSeeder::class,
        //            RoomSeeder::class,
        //            BookingSeeder::class,
        //        ]);

        Hostel::factory()->count(50)->create()->each(function ($hostel) {
            // Each hostel has 100 rooms
            Room::factory()->count(100)->for($hostel)->create()->each(function ($room) use ($hostel) {
                // Each room has a booking by a user
                Booking::factory()->for(User::factory())->for($room)->for($hostel)->create();
            });
        });
    }
}

<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reservation = new Reservation();
$reservation->check_in = '2025-07-10';
$reservation->check_out = '2025-07-15';
$reservation->number_guests = 2;
$reservation->price = 350.00; 
$reservation->user_id = 1;
$reservation->hotel_id = 1; 
$reservation->room_id = 1;
$reservation->save();

$reservation = new Reservation;
$reservation->check_in = '2025-08-05';
$reservation->check_out = '2025-08-12';
$reservation->number_guests = 2;
$reservation->price = 500.00;
$reservation->user_id = 1;
$reservation->hotel_id = 2; 
$reservation->room_id = 4; 
$reservation->save();

    }
}

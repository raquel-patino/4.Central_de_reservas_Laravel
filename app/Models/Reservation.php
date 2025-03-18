<?php

namespace App\Models;

use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;


class Reservation extends Model
{
    protected $table= 'reservations';

    public function user(){

        return $this->belongsTo(User::class, 'user_id');
    }

    public function hotel(){

        return $this->belongsTo(Hotel::class, 'hotel_id');
    }

   public static function createReservation($checkin, $checkout, $guests, $roomId, $hotelId){
        $user= Auth::id();
        $room= Room::find($roomId);

        $reservation= new Reservation();
        $reservation->check_in=$checkin;
        $reservation->check_out=$checkout;
        $reservation->number_guests= $guests;
        $reservation->room_id=$roomId;
        $reservation->user_id= $user;
        $reservation->price= $room->price;
        $reservation->hotel_id=$hotelId;

        $reservation->save();
    }

}

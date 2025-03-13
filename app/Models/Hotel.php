<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table ='hotels';

    public function bookings(){

        return $this->hasMany(Reservation::class, 'hotel_id');
    }


    static function searchHotels($place){
        if (!Hotel::whereCountry($place)->exists()){
            return null;
        }

        return Hotel::whereCountry($place)->get();
    }

    public function rooms(){

        return $this->hasMany(Room::class, 'hotel_id');
    }
}

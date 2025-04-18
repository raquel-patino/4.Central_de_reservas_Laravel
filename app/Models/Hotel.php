<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table ='hotels';

    public function reservations(){

        return $this->hasMany(Reservation::class, 'hotel_id');
    }


    static function searchHotels($place)
{
    if (!Hotel::whereCountry($place)->exists()) {
        return null;
    }

    return Hotel::whereCountry($place)
                ->with('reservations')
                ->get();
}


    public function rooms(){

        return $this->hasMany(Room::class, 'hotel_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table ='hotels';

    public function bookings(){

        return $this->hasMany(Reservation::class, 'hotel_id');
    }
}

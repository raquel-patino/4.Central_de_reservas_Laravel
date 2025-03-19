<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{

    protected $table= 'rooms';

    public function hotels(){
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }

    public function reservations(){
        return $this->hasMany(Reservation::class, 'room_id');
    }
}

<?php

namespace App\Models;

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

}

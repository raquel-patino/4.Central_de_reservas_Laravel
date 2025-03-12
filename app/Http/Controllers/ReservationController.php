<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function showReservations(){

        $reservations= Auth::user()->reservations;

        return view('private', compact('reservations'));
    }

    public function searchReservation(Request $request){

       $checkIn= $request->input('check_in');
       $checkOut= $request->input ('check_out');
       $place= $request->input('place');

       $hotels= Hotel::searchHotels($place);
       
       return view('search', compact('hotels'));
    }
}

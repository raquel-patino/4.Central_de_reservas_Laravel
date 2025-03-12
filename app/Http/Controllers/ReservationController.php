<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ReservationController extends Controller
{
    public function showReservations(){

        $reservations= Auth::user()->reservations;

        return view('private', compact('reservations'));
    }

    public function searchReservation(Request $request){

       $checkIn= $request->input('check_in');
       $checkOut= $request->input ('check_out');
       
    }
}

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

       //$checkIn= $request->input('check_in');
       //$checkOut= $request->input ('check_out');

       $request->validate([
        'check_in'  => ['required', 'date', 'after_or_equal:today'],
        'check_out' => ['required', 'date', 'after:check_in'],
        'place'     => ['required', 'string'],
    ], [
        'check_out.after' => 'La fecha de salida debe ser posterior a la de entrada.'
    ]);
    
       $place= $request->input('place');

       $hotels= Hotel::searchHotels($place);

       if($hotels=== null){
        return redirect()->back()->withErrors(["place"=> "No tenemos disponibilidad para este filtro"]);
       }
       
       return view('search', compact('hotels'));
    }

    public function showForm($hotelId){
        
        return view('reservation', [$hotelId=>'hotel_id']);
    }
}

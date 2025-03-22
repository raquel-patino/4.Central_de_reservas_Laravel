<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Hotel;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Cache\RedisTaggedCache;

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
        return redirect()->back()->withErrors(["place"=> "No tenemos disponibilidad para $place "]);
       }
       
       return view('search', compact('hotels'));
    }

    public function showForm(Request $request){

            $hotelId = $request->query('hotel_id');
    
            $hotel = Hotel::find($hotelId);

        return view('reservation', compact('hotel'));
    }

    /*public function makeReservation(Request $request){
    

    Reservation::create([
        'check_in'=> $request->input('check_in'),
        'check_out'=> $request->input('check_out'),
        'number_guests'=> $request->input('number_guests'),
        'hotel_id'=>

    ]);
    $hotelId= $request->query('hotel_id');
    $checkIn=$request->input('check_in');
    $checkOut= $request->input('check_out');
    $guests= $request->input('number_guests');
    $roomId=$request->input('room_id');

    Reservation::createReservation($checkIn,$checkOut,$guests,$roomId,$hotelId);
    return redirect()->route('private');
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
*/
    public function confirmDelete($reservationId){
        $reservation= Reservation::find($reservationId);

        return view('delete-confirmation', compact('reservation'));
    }

    public function destroy($reservationId){
       
        $reservation=Reservation::find($reservationId);
        $reservation->delete();
        //aqui siempre da success, cambiarlo
        return redirect()->route('private')->with('success', 'La reserva se ha cancelado correctamente');

    }
    
    public function updateReservation($reservationId){
        
        $reservation= Reservation::find($reservationId);

        return view('update-form', compact('reservation'));
    }

    public function modifyReservation (Request $request, $reservationId){
    
        $request->validate([
            'check_in'  => ['required', 'date', 'after_or_equal:today'],
            'check_out' => ['required', 'date', 'after:check_in'],
            'number_guests' =>['required', 'lte:3']
        ],[
            'check_out.after' => 'La fecha de salida debe ser posterior a la de entrada.',
            'check_in.after_or_equal' => 'La fecha de entrada debe ser igual o posterior a hoy'
        ]);
        
        $reservation =Reservation::find($reservationId);
        
        if ($reservation){
            $reservation->check_in= $request->check_in;
            $reservation->check_out= $request->check_out;
            $reservation->number_guests= $request->number_guests;
            $reservation->room->type= $request->room_type;
            $reservation->price= $this->calculateReservationPrice($reservation,$request);
            $reservation->save();
            
        return view('modified-reservation', compact('reservation'))->with('success', 'La reserva se ha modificado correctamente');

        }else {
            return redirect()->back()->with('error', 'La reserva no se ha encontrado');
        }
        

        
    }


    private function calculateReservationPrice(Reservation $reservation, Request $request){
        
        $checkIn= Carbon::parse($request->check_in);
        $checkOut= Carbon::parse($request->check_out);
        $dias = $checkIn->diffInDays($checkOut);
        $totalPrice = $reservation->room->price * ($dias);
        
        return $totalPrice;
    }

}
<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Hotel;
use App\Models\Reservation;
use App\Models\Room;
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

    public function makeReservation(Request $request){
      
        $room= Room::find($request->input('room_id'));
        $price= $room->price;
        [$rules, $messages] = $this->validateData();
        $validatedData = $request->validate($rules, $messages);
    

        $reservation= Reservation::create([
        'check_in'=> $validatedData['check_in'],
        'check_out'=> $validatedData['check_out'],
        'number_guests'=> $request->input('number_guests'),
        'hotel_id'=> $request->input('hotel_id'),
        'user_id'=> Auth::id(),
        'room_id'=> $request->input('room_id'),
        'price'=> $price
    ]);
    
    
    $reservation->price= $this->calculateReservationPrice($reservation->id,$request);
    $reservation->save();

     return redirect()->route('private')->with('success', 'Su reserva se ha realizado con éxito');
    }

    public function confirmDelete($reservationId){
        $reservation= Reservation::find($reservationId);

        return view('delete-confirmation', compact('reservation'));
    }

    public function destroy($reservationId){
       
        $reservation=Reservation::find($reservationId);
        if($reservation->delete()){
            return redirect()->route('private')->with('success', 'La reserva se ha cancelado correctamente');
        } else{
            return redirect()->route('private')->with('error', 'La reserva no se ha podido cancelar');
        }
    }
    
    public function updateReservation($reservationId){
        
        $reservation= Reservation::find($reservationId);

        return view('update-form', compact('reservation'));
    }

    public function modifyReservation (Request $request, $reservationId){
      
        [$rules, $messages] = $this->validateData();
        $validatedData = $request->validate($rules, $messages);
        $reservation =Reservation::find($reservationId);
        
        if ($reservation){
            $reservation->check_in= $validatedData ['check_in'];
            $reservation->check_out= $validatedData ['check_out'];
            $reservation->number_guests= $request->input('number_guests');
            $reservation->room_id= $request->input('room_id');
            $reservation->price= $this->calculateReservationPrice($reservationId,$request);
            $reservation->save();
            
        return view('modified-reservation', compact('reservation'))->with('success', 'La reserva se ha modificado correctamente');

        }else {
            return redirect()->back()->with('error', 'La reserva no se ha encontrado');
        }
        
    }

    private function calculateReservationPrice($reservationId, Request $request){
        
        $checkIn= Carbon::parse($request->check_in);
        $checkOut= Carbon::parse($request->check_out);
        $dias = $checkIn->diffInDays($checkOut);
        $reservation= Reservation::find($reservationId);
        $totalPrice = $reservation->room->price * ($dias);
        
        return $totalPrice;
    }

    private function validateData() {
        return [[
            'check_in'  => ['required', 'date', 'after_or_equal:today'],
            'check_out' => ['required', 'date', 'after:check_in'],
        ], [
            'check_in.after_or_equal'=> 'La fecha de entrada debe ser posterior a hoy',
            'check_out.after' => 'La fecha de salida debe ser posterior a la de entrada.'
        ]];
    }
    
  

}
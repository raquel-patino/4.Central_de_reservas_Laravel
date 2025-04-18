<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Hotel;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReservationController extends Controller
{
    public function showReservations(){

        $reservations= Auth::user()->reservations;

        return view('private', compact('reservations'));
    }

    public function searchReservation(Request $request)
    {
        $place = $request->input('place');
        $checkIn = $request->input('check_in');
    
        $hotels = Hotel::searchHotels($place);
    
        if ($hotels->isEmpty()) {
            return redirect()->back()->withErrors([
                "place" => "No tenemos disponibilidad para $place"
            ]);
        }
    
        $roomsIds = $this->getOccupiedRoomIds($hotels, $request->input('check_in'), $request->input('check_out'));
        $hotelIds = $hotels->pluck('id');
        $roomsFiltered = $this->getAvailableRoomsGroupedByHotel($hotelIds, $roomsIds);
    
        return view('search', [
            'hotels' => $hotels,
            'roomsFiltered' => $roomsFiltered
        ]);
    }
    
    private function getOccupiedRoomIds($hotels, $checkIn, $checkOut)
{
    $occupiedRoomIds = [];

    $userCheckIn = \Carbon\Carbon::parse($checkIn);
    $userCheckOut = \Carbon\Carbon::parse($checkOut);

    foreach ($hotels as $hotel) {
        foreach ($hotel->reservations as $reservation) {
            $resCheckIn = \Carbon\Carbon::parse($reservation->check_in);
            $resCheckOut = \Carbon\Carbon::parse($reservation->check_out);

            // Verificar si las fechas se solapan
            if ($userCheckIn < $resCheckOut && $userCheckOut > $resCheckIn) {
                $occupiedRoomIds[] = $reservation->room_id;
            }
        }
    }

    return $occupiedRoomIds;
}

    
    
    private function getAvailableRoomsGroupedByHotel($hotelIds, $roomsIds)
    {
        if (empty($roomsIds)) {
            $rooms = Room::whereIn('hotel_id', $hotelIds)->get();
        } else {
            $rooms = Room::whereIn('hotel_id', $hotelIds)
                         ->whereNotIn('id', $roomsIds)
                         ->get();
        }
    
        $grouped = [];
    
        foreach ($rooms as $room) {
            $grouped[$room->hotel_id][] = $room;
        }
    
        return $grouped;
    }
    

    public function showForm(Request $request)
    {
        $hotelId = $request->query('hotel_id');
        $roomId = $request->query('room_id');
    
        $hotel = Hotel::findOrFail($hotelId);
        $room = Room::findOrFail($roomId);
    
        return view('reservation', compact('hotel', 'room'));
    }
    

    public function makeReservation(Request $request)
    {
        [$rules, $messages] = $this->validateData();
    
     
        $validatedData = $request->validate($rules, $messages);
    
        $room = Room::find($request->input('room_id'));
    
        
        if (!$this->isRoomAvailable(
                $room->id,
                $validatedData['check_in'],
                $validatedData['check_out']
            )) {
            return redirect()->back()->withErrors([
                'room_id' => 'Esta habitación ya está ocupada en las fechas seleccionadas.'
            ])->withInput();
        }
    
        
        $price = $room->price;
    
       
        $reservation = Reservation::create([
            'check_in' => $validatedData['check_in'],
            'check_out' => $validatedData['check_out'],
            'number_guests' => $request->input('number_guests'),
            'hotel_id' => $request->input('hotel_id'),
            'user_id' => Auth::id(),
            'room_id' => $room->id,
            'price' => $price
        ]);
    
        
        $reservation->price = $this->calculateReservationPrice($reservation->id, $request);
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

    public function modifyReservation(Request $request, $reservationId)
    {
        [$rules, $messages] = $this->validateData();
        $validatedData = $request->validate($rules, $messages);
        
        $reservation = Reservation::find($reservationId);
        
        if ($reservation) {
    
            if (!$this->isRoomAvailable($request->input('room_id'), $validatedData['check_in'], $validatedData['check_out'], $reservationId)) {
                return redirect()->back()->withErrors([
                    'room_id' => 'Esa habitación ya está ocupada en las fechas seleccionadas.'
                ])->withInput();
            }
    
            $reservation->check_in = $validatedData['check_in'];
            $reservation->check_out = $validatedData['check_out'];
            $reservation->number_guests = $request->input('number_guests');
            $reservation->room_id = $request->input('room_id');
            $reservation->price = $this->calculateReservationPrice($reservationId, $request);
            $reservation->save();
            
            return view('modified-reservation', compact('reservation'))->with('success', 'La reserva se ha modificado correctamente');
        } else {
            return redirect()->back()->with('error', 'La reserva no se ha encontrado');
        }
    }
    

    private function isRoomAvailable($roomId, $checkIn, $checkOut, $excludedReservationId = null)
{
    return !Reservation::where('room_id', $roomId)
        ->where('id', '!=', $excludedReservationId)
        ->where(function ($query) use ($checkIn, $checkOut) {
            $query->where(function ($q) use ($checkIn, $checkOut) {
                $q->where('check_in', '<', $checkOut)
                  ->where('check_out', '>', $checkIn);
            });
        })
        ->exists();
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
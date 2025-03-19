<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update form</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="p-6 mt-10 bg-white shadow-md rounded-lg w-full max-w-lg">
        <h2 class=" mt-6 text-2xl font-bold text-center mb-4 ">Modificar reserva</h2>
        <form method="POST" action="')}}">
            @csrf
            @method ('put')
            <div class="flex flex-col justify-between">
                <div class="mb-4">
                    <label class="block text-gray-700">Check-in</label>
                    <input type="date" name="check_in" value="{{$reservation->check_in}}" 
                    class="w-full p-2 border border-gray-300 rounded mt-1">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Check-out</label>
                    <input type="date" name="check_out" value="{{$reservation->check_out}}" class="w-full p-2 border border-gray-300 rounded mt-1">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Huéspedes</label>
                    <input type="number" name="number_guests" value="{{$reservation->number_guests}}" class="w-full p-2 border border-gray-300 rounded mt-1">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Habitación seleccionada:</label>
                    <input type="text" name="selected_room" value="{{$reservation->room->type}}" disabled class="w-full p-2 rounded mt-1 font-bold">
                </div>
            <div class="mb-4">
                <label class="block text-gray-700">Selecciona otra habitación</label>
                <select name="room_type" id="room_type">
                @foreach($reservation->hotel->rooms as $room)
                <option value="{{$room->type}}">{{$room->type}}</option>
                    @endforeach
                <button type="submit"> Modificar</button>
            </div>
        </div>
        </form>
    </div>
</body>
</html>
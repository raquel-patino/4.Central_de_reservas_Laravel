<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="p-6 mt-10 bg-white shadow-md rounded-lg w-full max-w-lg">
        <h2 class=" mt-6 text-2xl font-bold text-center mb-4 ">Nueva Reserva</h2>
        <form method="GET" action="{{route ('new-reservation', ['hotel_id' => $hotel->id])}}">
            <div class="flex flex-col justify-between">
                <div class="mb-4">
                    <label class="block text-gray-700">Check-in</label>
                    <input type="date" name="check_in" class="w-full p-2 border border-gray-300 rounded mt-1">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Check-out</label>
                    <input type="date" name="check_out" class="w-full p-2 border border-gray-300 rounded mt-1">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Huéspedes</label>
                    <input type="number" name="number_guests" class="w-full p-2 border border-gray-300 rounded mt-1">
                </div>
            <div class="mb-4 w-1/4">
                <label class="block text-gray-700">Tipo de habitación</label>
                <select name="room_id">
                    @foreach ($hotel->rooms as $room)
                    <option value= "{{ $room->id }}">{{ $room->type }}</option>
                @endforeach
                </select>
                <input type="hidden" name="hotel_id" value="{{$hotel->id}}">
                <button type="submit"> Reservar</button>

            </div>
        </div>
    </div>
</body>
</html>
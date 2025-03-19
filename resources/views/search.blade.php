<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css') 
</head>
<body class= "flex flex-col items-center justify-center min-h-screen">
    <h2>Hoteles disponibles</h2>
    <div class="flex flex-col justify-center items-center p-5 w-full max-w-lg bg-gray-100 shadow-md rounded-lg">
        @if ($hotels->isEmpty())
            <p>No existen hoteles disponibles.</p>
        @else
            <ul class="w-full space-y-4">
                @foreach ($hotels as $hotel)
                    <li class="p-4 border border-gray-300 rounded-md shadow-sm w-full flex justify-between items-center">
                        <div>
                            <strong>Hotel:</strong> {{ $hotel->name }}<br>
                            <strong>Teléfono:</strong> {{ $hotel->telephone_number }}<br>
                            <strong>Descripción:</strong> {{ $hotel->description }}<br>
    
                            @if ($hotel->rooms->count() > 0)
                                <strong>Habitaciones:</strong> 
                                <ul class="pl-5 list-disc">
                                    @foreach ($hotel->rooms as $room)
                                        <li>Tipo: {{ $room->type }} - Precio: {{ $room->price }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <strong>Este hotel no tiene habitaciones disponibles</strong>
                            @endif
                        </div>
                <!-- Botón de Reservar con Formulario -->
         <form action="{{ route('reservation', ['hotel_id' => $hotel->id]) }}" method="GET">
                <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">
             <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
             Reservar
            </button>
        </form>
</li>
@endforeach
</ul>
@endif
</div>
    
    
</body>
</html>
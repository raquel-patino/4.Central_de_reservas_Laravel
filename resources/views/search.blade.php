<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoteles Disponibles</title>
    @vite('resources/css/app.css') 
</head>
<body class="bg-[#260101] text-white min-h-screen flex flex-col items-center">

    <header class="py-10">
        <h2 class="text-5xl font-cinzel text-[#f5e8d6]">Hoteles Disponibles</h2>
    </header>

    <div class="w-full max-w-6xl px-4">
        @if ($hotels->isEmpty())
            <div class="text-center bg-[#561f0c] p-6 rounded-md shadow-md text-[#EAC696]">
                No existen hoteles disponibles.
            </div>
        @else
            @foreach ($hotels as $hotel)
                <div class="mb-12 bg-[#561f0c] p-6 rounded-lg shadow-xl">
                    <!-- Info del hotel -->
                    <div class="mb-6">
                        <h3 class="text-4xl font-cinzel text-[#EAC696] text-center font-semibold">{{ $hotel->name }}</h3>
                        <p class="mt-1">
                            <span class="text-[#EAC696] font-semibold">Descripción:</span>
                            <span class="text-[#f5e8d6]">{{ $hotel->description }}</span>
                        </p>
                        <p class="mt-2">
                            <span class="text-[#EAC696] font-semibold">Contacto:</span>
                            <span class="text-[#f5e8d6]">{{ $hotel->telephone_number }}</span>
                        </p>
                    </div>

                    @if ($hotel->rooms->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            @foreach ($hotel->rooms as $room)
                                <div class="bg-[#EAC696] text-[#561f0c] rounded-lg shadow-md overflow-hidden flex flex-col justify-between">
                                    <img src="{{ asset('images/rooms/' . $room->type . '.jpg') }}"
                                         alt="{{ $room->type }}"
                                         class="w-full h-48 object-cover">
                                    <div class="p-4 flex-1 flex flex-col justify-between">
                                        <h4 class="text-xl font-semibold font-cinzel mb-2">{{ $room->type }}</h4>
                                        <p class="mb-4"><strong>Precio:</strong> ${{ $room->price }}</p>
                                        <!-- Botón de Reservar -->
                                        <form action="{{ route('reservation', ['hotel_id' => $hotel->id, 'room_id' => $room->id]) }}" method="GET">
                                            <button type="submit"
                                                    class="bg-[#260101] text-[#EAC696] px-4 py-2 rounded-md hover:bg-[#BF4904] transition w-full font-cinzel">
                                                Reservar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-[#C0C0C0] text-center mt-4">Este hotel no tiene habitaciones disponibles.</p>
                    @endif
                </div>
            @endforeach
        @endif
    </div>

</body>
</html>

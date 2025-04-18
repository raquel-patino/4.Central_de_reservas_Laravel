<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Reserva</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#260101] text-white min-h-screen flex flex-col">

    <!-- Header Estilo Luxury -->
    <header class="relative w-full">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <img src="https://www.thetimes.com/imageserver/image/%2Fmethode%2Ftimes%2Fprod%2Fweb%2Fbin%2F60591094-a176-4463-a2df-0bef829e93b4.jpg?crop=2560%2C1705%2C0%2C0"
             alt="Luxury Hotel Booking"
             class="w-full h-[450px] object-cover">
        <div class="absolute inset-0 flex flex-col justify-center items-center text-white">
            <h1 class="text-8xl font-cinzel drop-shadow-lg">Luxury Hotels</h1>
            <p class="text-2xl font-cinzel mt-2 drop-shadow-md">Modificar Reserva</p>
        </div>
        <div class="absolute top-4 right-6 flex gap-4">
            <details class="relative">
                <summary class="cursor-pointer bg-[#EAC696] text-[#591902] font-cinzel px-4 py-2 rounded-md shadow-md hover:bg-[#C89D60] transition">
                    Mi Perfil
                </summary>
                <div class="absolute right-0 mt-2 w-48 bg-[#EAC696] rounded-md shadow-lg z-50">
                    <a href="{{ route('show-profile') }}"
                       class="block px-4 py-2 text-sm text-[#591902] hover:bg-[#C89D60] transition">
                        Modificar Perfil
                    </a>
                    <form action="{{ route('destroy-user') }}" method="POST" onsubmit="return confirm('¿Estás seguro que deseas eliminar tu perfil?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="w-full text-left px-4 py-2 text-sm text-red-700 hover:bg-red-200 transition">
                            Eliminar Perfil
                        </button>
                    </form>
                </div>
            </details>
            <form method="GET" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="bg-red-600 text-white px-4 py-2 rounded-md shadow-md hover:bg-red-800 transition">
                    Cerrar Sesión
                </button>
            </form>
        </div>
    </header>

    <!-- Formulario de Modificación -->
    <main class="flex-grow flex items-center justify-center mt-5 px-4">
        <div class="bg-[#561f0c] p-8 rounded-lg shadow-lg w-full max-w-lg">
            <h2 class="text-4xl font-cinzel text-[#EAC696] text-center mb-6">Modificar Reserva</h2>

            <form method="POST" action="{{ route('modify', $reservation->id) }}" class="space-y-6">
                @csrf

                <!-- Check-in -->
                <div>
                    <label class="block text-[#EAC696] font-cinzel text-lg">Check-in</label>
                    <input type="date" name="check_in" value="{{ $reservation->check_in }}"
                           class="w-full p-3 bg-[#EAC696] text-[#260101] border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696]">
                    @error('check_in')
                        <p class="text-red-500 text-sm mt-1 font-cinzel">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Check-out -->
                <div>
                    <label class="block text-[#EAC696] font-cinzel text-lg">Check-out</label>
                    <input type="date" name="check_out" value="{{ $reservation->check_out }}"
                           class="w-full p-3 bg-[#EAC696] text-[#260101] border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696]">
                    @error('check_out')
                        <p class="text-red-500 text-sm mt-1 font-cinzel">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Huéspedes -->
                <div>
                    <label class="block text-[#EAC696] font-cinzel text-lg">Huéspedes</label>
                    <input type="number" name="number_guests" value="{{ $reservation->number_guests }}"
                           class="w-full p-3 bg-[#EAC696] text-[#260101] border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696]">
                </div>

                <!-- Habitación actual -->
                <div>
                    <label class="block text-[#EAC696] font-cinzel text-lg">Habitación reservada</label>
                    <input type="text" name="selected_room" value="{{ $reservation->room->type }}" disabled
                           class="w-full p-3 bg-[#EAC696] text-[#260101] border border-[#EAC696] rounded cursor-not-allowed">
                </div>

                <!-- Cambiar tipo de habitación -->
                <div>
                    <label class="block text-[#EAC696] font-cinzel text-lg">Modifica el tipo de habitación</label>
                    <select name="room_id" id="room_id"
                    class="w-full p-3 bg-[#EAC696] text-[#260101] border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696]">
                    @foreach($reservation->hotel->rooms as $room)
                        <option value="{{ $room->id }}" {{ old('room_id', $reservation->room_id) == $room->id ? 'selected' : '' }}>
                            {{ $room->type }}: {{ $room->price }} /noche
                        </option>
                    @endforeach
                </select>
                
                @error('room_id')
                    <p class="text-red-500 text-sm mt-1 font-cinzel">{{ $message }}</p>
                @enderror
                
                </div>

                <!-- Botón -->
                <div class="text-center">
                    <button type="submit"
                            class="bg-[#EAC696] text-[#260101] font-cinzel font-semibold px-6 py-3 rounded-md shadow-md hover:bg-[#C89D60] transition">
                        Modificar
                    </button>
                </div>
            </form>
        </div>
    </main>

</body>
</html>

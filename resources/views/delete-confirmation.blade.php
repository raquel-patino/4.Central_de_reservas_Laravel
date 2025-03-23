<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Cancelación</title>
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
            <p class="text-2xl font-cinzel mt-2 drop-shadow-md">Confirmar Cancelación</p>
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

    <!-- Contenido principal -->
    <main class="flex-grow flex items-center justify-center px-4 mt-5">
        <div class="bg-[#561f0c] p-8 rounded-lg shadow-lg w-full max-w-lg">
            <h2 class="text-4xl font-cinzel text-[#EAC696] text-center mb-6">Confirmar Cancelación</h2>

            <p class="text-center text-gray-300 mb-4 font-cinzel">¿Estás seguro de que quieres cancelar tu reserva?</p>

            <!-- Información de la Reserva -->
            <div class="border border-[#EAC696] p-4 rounded-md mb-6 space-y-2">
                <p class="text-lg font-cinzel"><span class="text-[#EAC696] font-semibold">Hotel:</span> {{ $reservation->hotel->name }}</p>
                <p class="text-lg font-cinzel"><span class="text-[#EAC696] font-semibold">Check-in:</span> {{ $reservation->check_in }}</p>
                <p class="text-lg font-cinzel"><span class="text-[#EAC696] font-semibold">Check-out:</span> {{ $reservation->check_out }}</p>
                <p class="text-lg font-cinzel"><span class="text-[#EAC696] font-semibold">Habitación:</span> {{ $reservation->room->type }}</p>
                <p class="text-lg font-cinzel"><span class="text-[#EAC696] font-semibold">Precio:</span> ${{ $reservation->price }}</p>
            </div>

            <!-- Botones -->
            <div class="flex justify-between">
                <!-- Volver -->
                <a href="{{ route('private') }}" class="bg-green-700 text-white font-cinzel px-4 py-2 rounded shadow-md hover:bg-gray-700 transition">
                    Volver
                </a>

                <!-- Cancelar Reserva -->
                <form method="POST" action="{{ route('reservation-destroy', $reservation->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white font-cinzel px-4 py-2 rounded shadow-md hover:bg-red-700 transition">
                        Sí, Cancelar
                    </button>
                </form>
            </div>
        </div>
    </main>

</body>
</html>


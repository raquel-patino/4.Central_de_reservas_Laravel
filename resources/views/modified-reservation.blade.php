<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva Modificada</title>
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
            <p class="text-2xl font-cinzel mt-2 drop-shadow-md">Reserva Modificada</p>
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
    <main class="flex-grow flex items-center justify-center mt-5 px-4">
        <div class="bg-[#561f0c] p-8 rounded-lg shadow-lg w-full max-w-lg">
            <h2 class="text-4xl font-cinzel text-[#EAC696] text-center mb-6">Reserva Modificada</h2>

            <!-- Mensajes de sesión -->
            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded font-cinzel">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded font-cinzel">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Detalles de la reserva -->
            <div class="space-y-4 text-[#EAC696] font-cinzel">
                <div>
                    <p class="text-lg font-semibold">Check-in</p>
                    <p>{{ $reservation->check_in }}</p>
                </div>
                <div>
                    <p class="text-lg font-semibold">Check-out</p>
                    <p>{{ $reservation->check_out }}</p>
                </div>
                <div>
                    <p class="text-lg font-semibold">Huéspedes</p>
                    <p>{{ $reservation->number_guests }}</p>
                </div>
                <div>
                    <p class="text-lg font-semibold">Habitación reservada</p>
                    <p>{{ $reservation->room->type }}</p>
                </div>
                <div>
                    <p class="text-lg font-semibold">Precio reserva</p>
                    <p>{{ $reservation->price }} €</p>
                </div>
            </div>

            <!-- Botón de volver o siguiente acción (si quieres agregar uno más adelante) -->
            <div class="mt-6 text-center">
                <a href="{{ route('private') }}" class="bg-[#EAC696] text-[#260101] font-cinzel font-semibold px-6 py-3 rounded-md shadow-md hover:bg-[#C89D60] transition inline-block">
                    Volver a Mis Reservas
                </a>
            </div>
        </div>
    </main>

</body>
</html>

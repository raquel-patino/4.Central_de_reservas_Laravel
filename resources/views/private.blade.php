<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de Hoteles</title>
    @vite('resources/css/app.css') 
</head>

<body class="bg-[#260101] text-white min-h-screen flex flex-col items-center overflow-auto">

    <!-- Encabezado con fondo oscuro -->
    <header class="relative w-full">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <img src="https://www.thetimes.com/imageserver/image/%2Fmethode%2Ftimes%2Fprod%2Fweb%2Fbin%2F60591094-a176-4463-a2df-0bef829e93b4.jpg?crop=2560%2C1705%2C0%2C0"
             alt="Luxury Hotel Booking"
             class="w-full h-[450px] object-cover">
        <div class="absolute inset-0 flex flex-col justify-center items-center text-white">
            <h1 class="text-8xl font-cinzel drop-shadow-lg">Luxury Hotels</h1>
            <p class="text-2xl font-cinzel mt-2 drop-shadow-md">Encuentra tu escapada perfecta</p>
        </div>
        <div class="absolute top-4 right-6 flex gap-4">
            <!-- Botón "Mi Perfil" -->
            <a href="{{route('show-profile')}}"
               class="bg-[#EAC696] text-[#591902] font-playfair px-4 py-2 rounded-md shadow-md hover:bg-[#C89D60] transition">
                Mi Perfil
            </a>
    
            <!-- Botón de Cerrar Sesión -->
            <form method="GET" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="bg-red-600 text-white px-4 py-2 rounded-md shadow-md hover:bg-red-800 transition">
                    Cerrar Sesión
                </button>
            </form>
        </div>
    </header>

    <div class="relative -mt-12 w-full flex justify-center">
        <div class="bg-[#561f0c] p-4 shadow-xl rounded-lg w-[95%] max-w-5xl">
            <form action="{{ route('search') }}" method="GET" class="flex flex-wrap md:flex-nowrap items-center gap-2">
                <div class="relative w-[180px]">
                    <label for="check_in" class="absolute left-3 top-2 text-[#561f0c] text-sm pointer-events-none">
                        Check-in
                    </label>
                    <input type="date" id="check_in" name="check_in"
                           class="p-2 pt-6 bg-[#EAC696] text-[#561f0c] border rounded-md focus:outline-none focus:ring-2 focus:ring-[#EAC696] w-full">
                </div>
                <div class="relative w-[180px]">
                    <label for="check_out" class="absolute left-3 top-2 text-[#561f0c] text-sm pointer-events-none">
                        Check-out
                    </label>
                    <input type="date" id="check_out" name="check_out"
                           class="p-2 pt-6 bg-[#EAC696] text-[#561f0c] border rounded-md focus:outline-none focus:ring-2 focus:ring-[#EAC696] w-full">
                </div>
                 
            <div class="relative w-[160px]">
                <label for="guests" class="absolute left-3 top-2 text-[#561f0c] text-sm pointer-events-none">
                    Huéspedes
                </label>
                <select id="guests" name="guests"
                        class="p-2 pt-6 bg-[#EAC696] text-[#561f0c] border rounded-md focus:outline-none focus:ring-2 focus:ring-[#EAC696] w-full">
                    <option value="1">1 Huésped</option>
                    <option value="2">2 Huéspedes</option>
                </select>
            </div>
            <div class="relative w-[200px]">
                <label for="place" class="absolute left-3 top-2 text-[#561f0c] text-sm pointer-events-none">
                    Destino
                </label>
                <select id="place" name="place"
                        class="p-2 pt-6 bg-[#EAC696] text-[#561f0c] border rounded-md focus:outline-none focus:ring-2 focus:ring-[#EAC696] w-full">
                    <option value="Finlandia">Finlandia</option>
                    <option value="Maldivas">Maldivas</option>
                </select>
            </div>
                <button type="submit"
                        class="ml-3 bg-[#260101] text-[#EAC696] font-cinzel text-pretty font-semibold px-8 py-4 rounded-md shadow-md hover:bg-[#BF4904] transition w-auto">
                    Buscar Habitación
                </button>
            </form>
        </div>
    </div>

    <!-- Contenedor Principal -->
    <div class="container mx-auto mt-10 p-2 bg-[#561f0c] shadow-xl rounded-lg max-w-4xl">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

    <!-- Sección Mis Reservas -->
    <div class="container mx-auto mt-4 p-6 bg-[#561f0c] shadow-xl rounded-lg max-w-4xl">
        <h2 class="text-5xl font-cinzel font-semibold text-[#EAC696] text-center mb-6">Mis Reservas</h2>
        @if ($reservations->isEmpty())
            <p class="text-center text-gray-400">No tienes reservas registradas.</p>
        @else
            <div class="space-y-6">
                @foreach ($reservations as $reservation)
                    <div class="bg-[#EAC696] p-4 rounded-lg shadow-lg flex flex-col md:flex-row items-center border border-[#260101]">
                        <div class="flex-1">
                            <h3 class="text-2xl font-semibold font-cinzel text-[#561f0c]">{{ $reservation->hotel->name }}</h3>
                            <p class="text-[#561f0c]"><strong>Entrada:</strong> {{ $reservation->check_in }}</p>
                            <p class="text-[#561f0c]"><strong>Salida:</strong> {{ $reservation->check_out }}</p>
                            <p class="text-[#561f0c]"><strong>Habitación:</strong> {{ $reservation->room->type }}</p>
                            <p class="text-[#561f0c]"><strong>Precio:</strong> ${{ $reservation->price }}</p>
                            <div class="flex flex-row mt-4 space-x-2">
                                <a href="{{ route('confirm-delete', $reservation->id) }}"
                                   class="bg-red-600 text-[#EAC696] px-3 py-2 rounded-md shadow-md hover:bg-[#BF4904] transition w-auto inline-flex">
                                    Cancelar reserva
                                </a>
                                <a href="{{route('update', $reservation->id)}}"
                                   class="bg-[#561f0c] text-[#EAC696] px-3 py-2 rounded-md shadow-md hover:bg-[#BF4904] transition w-auto inline-flex">
                                    Modificar reserva
                                </a>
                            </div>
                        </div>
                        <div class="ml-4">
                            <img src="{{ $reservation->room->image_url ?? 'https://via.placeholder.com/150' }}"
                                 alt="Habitación reservada"
                                 class="w-[150px] h-[100px] object-cover rounded-md shadow-md">
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</body>

</html>






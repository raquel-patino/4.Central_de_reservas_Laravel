<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de Hoteles</title>
    @vite('resources/css/app.css') {{-- Asegúrate de tener Vite configurado --}}
</head>
<body class="bg-[#1B1B1B] text-white min-h-screen flex flex-col items-center overflow-auto">

    <!-- Encabezado con fondo oscuro -->
    <header class="relative w-full">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <img src="https://www.thetimes.com/imageserver/image/%2Fmethode%2Ftimes%2Fprod%2Fweb%2Fbin%2F60591094-a176-4463-a2df-0bef829e93b4.jpg?crop=2560%2C1705%2C0%2C0" 
             alt="Luxury Hotel Booking" 
             class="w-full h-[450px] object-cover">
        <div class="absolute inset-0 flex flex-col justify-center items-center text-white">
            <h1 class="text-5xl font-bold font-serif drop-shadow-lg">Luxury Hotel Booking</h1>
            <p class="text-lg mt-2 drop-shadow-md">Encuentra tu escapada perfecta</p>
        </div>
    </header>

    <!-- Contenedor Principal -->
    <div class="container mx-auto mt-10 p-6 bg-[#2A2A2A] shadow-xl rounded-lg max-w-4xl">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <!-- Título -->
        <h2 class="text-3xl font-bold text-[#EAC696] text-center mb-6">Reserva tu Habitación</h2>

        <!-- Barra de Búsqueda -->
        <form action="{{ route('search') }}" method="GET" class="space-y-4">
            <div class="flex flex-col sm:flex-row gap-4">
                <input type="date" name="check_in" class="p-3 w-full bg-[#3A3A3A] text-white border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#EAC696]">
                <input type="date" name="check_out" class="p-3 w-full bg-[#3A3A3A] text-white border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#EAC696]">
            </div>
            <div class="flex flex-col sm:flex-row gap-4">
                <select name="guests" class="p-3 w-full bg-[#3A3A3A] text-white border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#EAC696]">
                    <option value="1">1 Huésped</option>
                    <option value="2">2 Huéspedes</option>
                    <option value="3">3 Huéspedes</option>
                    <option value="4">4 Huéspedes</option>
                </select>
                <select name="place" class="p-3 w-full bg-[#3A3A3A] text-white border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#EAC696]">
                    <option value="Finlandia">Finlandia</option>
                    <option value="Maldivas">Maldivas</option>
                </select>
                <button type="submit" class="bg-[#EAC696] text-black px-6 py-3 rounded-md shadow-md hover:bg-[#C89D60] transition">
                    Buscar Habitación
                </button>
            </div>
        </form>

    </div>

    <!-- Mis Reservas -->
    <div class="container mx-auto mt-10 p-6 bg-[#2A2A2A] shadow-xl rounded-lg max-w-4xl">
        <h2 class="text-3xl font-bold text-[#EAC696] text-center mb-6">Mis Reservas</h2>

        @if ($reservations->isEmpty())
            <p class="text-center text-gray-400">No tienes reservas registradas.</p>
        @else
            <div class="space-y-6">
                @foreach ($reservations as $reservation)
                    <div class="bg-[#3A3A3A] p-4 rounded-lg shadow-lg flex flex-col md:flex-row items-center border border-[#EAC696]">
                        <!-- Información de la reserva -->
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-[#EAC696]">{{ $reservation->hotel->name }}</h3>
                            <p class="text-gray-300"><strong>Entrada:</strong> {{ $reservation->check_in }}</p>
                            <p class="text-gray-300"><strong>Salida:</strong> {{ $reservation->check_out }}</p>
                            <p class="text-gray-300"><strong>Habitacion:</strong> {{ $reservation->room->type }}</p>
                            <p class="text-gray-300"><strong>Precio:</strong> ${{ $reservation->price }}</p>
                            <div class="flex flex-row mt-4 space-x-2">
                                <!-- Botón Cancelar -->
                                <a href="{{ route('confirm-delete', $reservation->id) }}" 
                                    class="bg-[#EAC696] text-black px-3 py-2 rounded-md shadow-md hover:bg-[#C89D60] transition w-auto inline-flex">
                                    Cancelar reserva
                                </a>
                            
                                <!-- Botón Modificar -->
                                <a href=", $reservation->id) }}" 
                                    class="bg-[#EAC696] text-black px-3 py-2 rounded-md shadow-md hover:bg-[#C89D60] transition w-auto inline-flex">
                                    Modificar reserva
                                </a>
                            </div>
                
                        </div>

                        <!-- Imagen de la habitación -->
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

    <!-- Botón de Logout -->
    <form method="GET" action="{{ route('logout') }}" class="mt-10">
        @csrf
        <button type="submit" class="bg-red-600 text-white px-6 py-3 rounded-md shadow-md hover:bg-red-800 transition">
            Cerrar Sesión
        </button>
    </form>

</body>
</html>



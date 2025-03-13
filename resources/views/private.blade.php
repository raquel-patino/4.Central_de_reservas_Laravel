<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de Hoteles</title>
    @vite('resources/css/app.css') {{-- Asegúrate de tener Vite configurado --}}
</head>
<body class="bg-gradient-to-b from-[#593A28] to-[#F2E2C4] min-h-screen flex flex-col items-center overflow-auto">

    <!-- Imagen Superior -->
    <header class="w-full">
        <img src="https://wallpapers.com/images/featured/maldives-23wyvlaqa7aydqny.jpg" 
             alt="Playa y naturaleza" 
             class="w-full h-[300px] object-cover rounded-xl border-4 border-[#F2E2C4] shadow-2xl drop-shadow-lg">
    </header>

    <!-- Contenedor Principal -->
    <div class="container mx-auto mt-10 p-6 bg-white shadow-xl rounded-lg max-w-4xl">
        
        <!-- Título -->
    <h1 class="text-3xl font-bold text-[#3F9BA6] text-center mb-6">Reserva tu Habitación</h1>
    <!--Agrega error si el checkout es erroneo"-->
    @error('check_out')
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @enderror
    <!--Errores si no se encuentra 'place'-->
        @if ($errors->has('place'))
    <div class="alert alert-danger">
        {{ $errors->first('place') }}
    </div>
        @endif
        <!-- Barra de Búsqueda -->
        <form action="{{route('search')}}" method="GET" class="space-y-4">
            <div class="flex flex-col sm:flex-row gap-4">
                <input type="date" name="check_in" class="p-3 w-full border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#A67B5B]">
                <input type="date" name="check_out" class="p-3 w-full border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#A67B5B]">
            </div>
            <div class="flex flex-col sm:flex-row gap-4">
                <select name="guests" class="p-3 w-full border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#A67B5B]">
                    <option value="1">1 Huésped</option>
                    <option value="2">2 Huéspedes</option>
                    <option value="3">3 Huéspedes</option>
                    <option value="4">4 Huéspedes</option>
                </select>
                <div class="flex flex-col sm:flex-row gap-4">
                    <select name="place" class="p-3 w-full border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#A67B5B]">
                        <option value="Finlandia">Finlandia</option>
                        <option value="Maldivas">Maldivas</option>
                    </select>
                </div>
                <button type="submit" class="bg-[#6B4226] text-white px-6 py-3 rounded-md shadow-md hover:bg-[#A67B5B] transition">
                    Buscar Habitación
                </button>
            </div>
        </form>

    </div>
    <h2>Mis Reservas</h2>

    @if ($reservations->isEmpty())
        <p>No tienes reservas registradas.</p>
    @else
        <ul>
            @foreach ($reservations as $reservation)
                <li>
                    <strong>Hotel:</strong> {{ $reservation->hotel->name }}<br>
                    <strong>Entrada:</strong> {{ $reservation->check_in }}<br>
                    <strong>Entrada:</strong> {{ $reservation->check_out }}<br>
                    <strong>Precio:</strong> {{ $reservation->price }}<br>
                </li>
                <hr>
            @endforeach
        </ul>
    @endif
    <form method="GET" action="{{route('logout')}}" >
        @csrf
        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Logout</button>
    </form>
</div>
</body>
</html>

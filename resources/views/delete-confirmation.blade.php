<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Cancelación</title>
    @vite('resources/css/app.css')
</head>
<body class="h-screen flex items-center justify-center bg-[#1B1B1B] text-white">

    <div class="bg-[#2A2A2A] p-8 rounded-lg shadow-lg w-full max-w-lg">
        <h2 class="text-3xl font-bold text-[#EAC696] text-center mb-6 font-elegant">Confirmar Cancelación</h2>

        <p class="text-center text-gray-300 mb-4">¿Estás seguro de que quieres cancelar tu reserva?</p>

        <!-- Información de la Reserva -->
        <div class="border border-[#EAC696] p-4 rounded-md mb-6">
            <p class="text-lg"><span class="text-[#EAC696] font-semibold">Hotel:</span> {{ $reservation->hotel->name }}</p>
            <p class="text-lg"><span class="text-[#EAC696] font-semibold">Check-in:</span> {{ $reservation->check_in }}</p>
            <p class="text-lg"><span class="text-[#EAC696] font-semibold">Check-out:</span> {{ $reservation->check_out }}</p>
            <p class="text-lg"><span class="text-[#EAC696] font-semibold">Habitación:</span> {{ $reservation->room->type }}</p>
            <p class="text-lg"><span class="text-[#EAC696] font-semibold">Precio:</span> ${{ $reservation->price }}</p>
        </div>

        <!-- Botones de Acción -->
        <div class="flex justify-between">
            <!-- Botón para Cancelar la acción -->
            <a href="{{ route('private') }}" class="bg-gray-500 text-white px-4 py-2 rounded shadow-md hover:bg-gray-600 transition">
                Volver
            </a>

            <!-- Formulario para Confirmar la Cancelación -->
            <form method="POST" action="{{ route('reservation-destroy', $reservation->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded shadow-md hover:bg-red-600 transition">
                    Sí, Cancelar
                </button>
            </form>
        </div>
    </div>

</body>
</html>

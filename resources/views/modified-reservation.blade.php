<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modified reservation</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="p-6 mt-10 bg-white shadow-md rounded-lg w-full max-w-lg">
        <h2 class=" mt-6 text-2xl font-bold text-center mb-4 ">Reserva modificada</h2>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @else
        <div class="alert alert-success">
            {{ session('error') }}
        </div>
    @endif
            <div class="flex flex-col justify-between">
                <div class="mb-4">
                    <p class="block text-gray-700">Check-in</p>
                    <p>{{$reservation->check_in}}</p>
                </div>
                <div class="mb-4">
                    <p class="block text-gray-700">Check-out</p>
                    <p>{{$reservation->check_out}}</p>
                </div>
                <div class="mb-4">
                    <p class="block text-gray-700">Huéspedes</p>
                    <p>{{$reservation->number_guests}}</p>
                </div>
                <div class="mb-4">
                    <p class="block text-gray-700">Habitación reservada</p>
                    <p>{{$reservation->room->type}}</p>
                </div>
            <div class="mb-4">
                <div class="mb-4">
                    <p class="block text-gray-700">Precio reserva</p>
                    <p></p>
                </div>
                <button type="submit" class="bg-red-400 px-3 py-2 rounded-md center w-auto inline-block "> Modificar</button>
        </div>
        </form>
    </div>
</body>
</html>
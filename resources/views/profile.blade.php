<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Perfil</title>
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
            <p class="text-2xl font-cinzel mt-2 drop-shadow-md">Encuentra tu escapada perfecta</p>
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

    <!-- Contenedor de formulario -->
    <main class="flex-grow flex items-center justify-center mt-5 px-4">
        <div class="bg-[#561f0c] p-8 rounded-lg shadow-lg w-full max-w-lg">
            <h2 class="text-4xl font-cinzel text-[#EAC696] text-center mb-6">Actualizar Perfil</h2>

            <form method="POST" action="{{route('update-user')}}" class="space-y-4">
                @csrf

                <!-- Nombre y Apellido -->
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <label class="block text-[#EAC696] font-cinzel text-lg">Nombre</label>
                        <input type="text" name="name" value="{{$user->name}}" class="w-full p-3 bg-[#EAC696] text-[#260101] border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696]" required>
                    </div>
                    <div class="flex-1">
                        <label class="block text-[#EAC696] font-cinzel text-lg">Apellido</label>
                        <input type="text" name="surname" value="{{$user->surname}}" class="w-full p-3 bg-[#EAC696] text-[#260101] border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696]" required>
                    </div>
                </div>

                <!-- Username y Correo -->
                <div>
                    <label class="block text-[#EAC696] font-cinzel text-lg">Username</label>
                    <input type="text" name="username" value="{{$user->username}}" class="w-full p-3 bg-[#EAC696] text-[#260101] border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696]" required>
                </div>
                <div>
                    <label class="block text-[#EAC696] font-zincel text-lg">Correo Electrónico</label>
                    <input type="email" name="email" value="{{$user->email}}" class="w-full p-3 bg-[#EAC696] text-[#260101] border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696]" required>
                </div>

                <div class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <label class="block text-[#EAC696] font-cinzel text-lg">Tipo de via</label>
                        <input type="text" name="street_type" value="{{$user->street_type}}" class="w-full p-3 bg-[#EAC696] text-[#260101] border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696]">
                    </div>
                    <div class="flex-1">
                        <label class="block text-[#EAC696] font-cinzel text-lg">Calle</label>
                        <input type="text" name="street_name" value="{{$user->street_name}}" class="w-full p-3 bg-[#EAC696] text-[#260101] border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696]">
                    </div>
                </div>
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <label class="block text-[#EAC696] font-cinzel text-lg">Número</label>
                        <input type="text" name="number" value="{{$user->number}}" class="w-full p-3 bg-[#EAC696] text-[#260101] border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696]" >
                    </div>
                    <div class="flex-1">
                        <label class="block text-[#EAC696] font-cinzel text-lg">Código postal</label>
                        <input type="text" name="postcode" value="{{$user->postcode}}" class="w-full p-3 bg-[#EAC696] text-[#260101] border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696]">
                    </div>
                </div>
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <label class="block text-[#EAC696] font-cinzel text-lg">Ciudad</label>
                        <input type="text" name="city" value="{{$user->city}}" class="w-full p-3 bg-[#EAC696] text-[#260101] border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696]">
                    </div>
                    <div class="flex-1">
                        <label class="block text-[#EAC696] font-cinzel text-lg">País</label>
                        <input type="text" name="country" value="{{$user->country}}" class="w-full p-3 bg-[#EAC696] text-[#260101] border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696]">
                    </div>
                </div>
                <!-- Teléfono -->
                <div>
                    <label class="block text-[#EAC696] font-cinzel text-lg">Teléfono</label>
                    <input type="text" name="telephone" value="{{$user->telephone}}" class="w-full p-3 bg-[#EAC696] text-[#260101] border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696]" required>
                </div>

                <!-- Botón de Registro -->
                <button type="submit" class="w-full font-cinzel bg-[#EAC696] text-[#260101] p-3 rounded-md shadow-md hover:bg-[#C89D60] transition font-semibold">
                    Guardar Cambios
                </button>
            </form>

            <!-- Enlace para iniciar sesión -->
            <p class="mt-4 text-center font-cinzel text-gray-300">
                ¿Ya tienes cuenta?
                <a href="{{route('login')}}" class="text-[#EAC696] hover:underline  font-cinzel font-semibold">Inicia sesión</a>
            </p>
        </div>
    </main>

</body>
</html>


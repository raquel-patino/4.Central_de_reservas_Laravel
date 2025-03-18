<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css') {{-- Asegúrate de tener Vite configurado --}}
</head>
<body class="h-screen flex bg-[#1B1B1B] text-white">

    <!-- Lado izquierdo: Imagen -->
    <div class="hidden md:flex w-1/2 items-center justify-center">
        <img src="https://source.unsplash.com/800x600/?hotel,luxury" 
             alt="Luxury Hotel" 
             class="w-full h-full object-cover">
    </div>

    <!-- Lado derecho: Formulario de login -->
    <div class="w-full md:w-1/2 flex items-center justify-center p-8">
        <div class="bg-[#2A2A2A] p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-3xl font-bold text-[#EAC696] text-center mb-6">Iniciar Sesión</h2>

            @if (session()->has('error'))
                <div class="text-red-400 text-center mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <!-- Correo Electrónico -->
                <div>
                    <label class="block text-[#EAC696]">Correo Electrónico</label>
                    <input type="email" name="email" class="w-full p-3 bg-[#3A3A3A] text-white border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696]" required>
                </div>

                <!-- Contraseña -->
                <div>
                    <label class="block text-[#EAC696]">Contraseña</label>
                    <input type="password" name="password" class="w-full p-3 bg-[#3A3A3A] text-white border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696]" required>
                </div>

                <!-- Botón de Login -->
                <button type="submit" class="w-full bg-[#EAC696] text-black p-3 rounded-md shadow-md hover:bg-[#C89D60] transition">
                    Entrar
                </button>
            </form>

            <!-- Enlace para registrarse -->
            <p class="mt-4 text-center text-gray-300">
                ¿No tienes cuenta? 
                <a href="{{ route('register') }}" class="text-[#EAC696] hover:underline">Regístrate</a>
            </p>
        </div>
    </div>

</body>
</html>


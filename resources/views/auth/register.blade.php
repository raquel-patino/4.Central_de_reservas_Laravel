<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    @vite('resources/css/app.css') 
</head>
<body class="h-screen flex items-center justify-center bg-[#1B1B1B] text-white">

    <div class="bg-[#2A2A2A] p-8 rounded-lg shadow-lg w-full max-w-lg">
        <h2 class="text-3xl font-bold text-[#EAC696] text-center mb-6 font-elegant">Registro</h2>

        <form method="POST" action="{{route('register-new')}}" class="space-y-4">
            @csrf

            <!-- Nombre y Apellido -->
            <div class="flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                    <label class="block text-[#EAC696] font-playfair text-lg">Nombre</label>
                    <input type="text" name="name" class="w-full p-3 bg-[#3A3A3A] text-white border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696] font-modern" required>
                </div>
                <div class="flex-1">
                    <label class="block text-[#EAC696] font-elegant text-lg">Apellido</label>
                    <input type="text" name="surname" class="w-full p-3 bg-[#3A3A3A] text-white border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696] font-modern" required>
                </div>
            </div>

            <!-- Username y Correo -->
            <div>
                <label class="block text-[#EAC696] font-elegant text-lg">Username</label>
                <input type="text" name="username" class="w-full p-3 bg-[#3A3A3A] text-white border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696] font-modern" required>
            </div>
            <div>
                <label class="block text-[#EAC696] font-elegant text-lg">Correo Electrónico</label>
                <input type="email" name="email" class="w-full p-3 bg-[#3A3A3A] text-white border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696] font-modern" required>
            </div>

            <!-- Contraseña -->
            <div>
                <label class="block text-[#EAC696] font-elegant text-lg">Contraseña</label>
                <input type="password" name="password" class="w-full p-3 bg-[#3A3A3A] text-white border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696] font-modern" required>
            </div>
            <div>
                <label class="block text-[#EAC696] font-elegant text-lg">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" class="w-full p-3 bg-[#3A3A3A] text-white border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696] font-modern" required>
            </div>

            <!-- Teléfono -->
            <div>
                <label class="block text-[#EAC696] font-elegant text-lg">Teléfono</label>
                <input type="text" name="telephone" class="w-full p-3 bg-[#3A3A3A] text-white border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696] font-modern" required>
            </div>

            <!-- Botón de Registro -->
            <button type="submit" class="w-full bg-green-500 text-white p-3 rounded-md shadow-md hover:bg-green-600 transition font-modern">
                Registrarse
            </button>
        </form>

        <!-- Enlace para iniciar sesión -->
        <p class="mt-4 text-center text-gray-300">
            ¿Ya tienes cuenta? 
            <a href="{{ route('login') }}" class="text-[#EAC696] hover:underline font-elegant">Inicia sesión</a>
        </p>
    </div>

</body>


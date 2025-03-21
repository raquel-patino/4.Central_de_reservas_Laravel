<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css') {{-- Asegúrate de tener Vite configurado --}}
</head>
<body class="h-screen flex bg-[#441402] text-white">

    <!-- Lado izquierdo: 3 Imágenes en columna -->
    <div class="hidden md:flex w-1/2 flex-col">
        <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/1c/19/dd/ff/grand-water-villas-with.jpg?w=1200&h=-1&s=1" 
             alt="Hotel Lobby" 
             class="w-full h-1/3 object-cover">
        <img src="https://media.cnn.com/api/v1/images/stellar/prod/220113025747-23-new-maldives-resorts-2022.jpg?q=h_2046,w_3000,x_0,y_0" 
             alt="Habitación de Hotel" 
             class="w-full h-1/3 object-cover">
        <img src="https://www.antler.co.uk/cdn/shop/articles/maldives-hero.jpg?v=1642695812&width=533" 
             alt="Piscina de Hotel" 
             class="w-full mb-2 h-1/3 object-cover">
    </div>

    <div class="w-full md:w-1/2 flex flex-col items-center justify-center p-8">
    
        <!-- Título principal FUERA del formulario -->
        <h1 class="text-white font-cinzel text-7xl mb-10 text-center">Luxury Hotels</h1>
    
        <!-- Contenedor del formulario -->
        <div class="bg-[#D99748] p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-3xl font-cinzel font-bold text-[#591902] text-center mb-6">Iniciar Sesión</h2>
    
            @if (session()->has('error'))
                <div class="text-red-400 text-center mb-4">
                    {{ session('error') }}
                </div>
            @endif
    
            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf
    
                <!-- Correo Electrónico -->
                <div>
                    <label class="block font-cinzel font-semibold text-[#591902]">Correo Electrónico</label>
                    <input type="email" name="email"
                           class="w-full p-3 bg-[#EAC696] text-[#591902] border border-[#591902] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696]"
                           required>
                </div>
    
                <!-- Contraseña -->
                <div>
                    <label class="block font-cinzel font-semibold text-[#591902]">Contraseña</label>
                    <input type="password" name="password"
                           class="w-full p-3 bg-[#EAC696] text-[#591902] border border-[#591902] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696]"
                           required>
                </div>
    
                <!-- Botón de Login -->
                <button type="submit"
                        class="w-full font-cinzel font-semibold bg-[#591902] text-[#EAC696] p-3 rounded-md shadow-md hover:bg-[#BF4904] transition">
                    Entrar
                </button>
            </form>
    
            <!-- Enlace para registrarse -->
            <p class="mt-4 text-center text-[#591902]">
                ¿No tienes cuenta? 
                <a href="{{ route('register') }}" class="text-[#591902] font-bold hover:underline">Regístrate</a>
            </p>
        </div>
    </div>
</body>
</html>

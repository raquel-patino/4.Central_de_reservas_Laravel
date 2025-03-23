<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
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
       
    </header>

    <!-- Formulario de Registro -->
    <main class="flex-grow flex items-center justify-center mt-5 px-4">
        <div class="bg-[#561f0c] p-8 rounded-lg shadow-lg w-full max-w-5xl">
            <h2 class="text-4xl font-cinzel text-[#EAC696] text-center mb-6">Registro</h2>

            <form method="POST" action="{{ route('register-new') }}" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @csrf

                <!-- Nombre -->
                <div>
                    <label class="block text-[#EAC696] font-cinzel text-lg">Nombre *</label>
                    <input type="text" name="name" class="w-full p-3 bg-[#EAC696] text-[#260101] border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696]" required>
                </div>

                <!-- Apellido -->
                <div>
                    <label class="block text-[#EAC696] font-cinzel text-lg">Apellido *</label>
                    <input type="text" name="surname" class="w-full p-3 bg-[#EAC696] text-[#260101] border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696]" required>
                </div>

                <!-- Username -->
                <div>
                    <label class="block text-[#EAC696] font-cinzel text-lg">Username *</label>
                    <input type="text" name="username" class="w-full p-3 bg-[#EAC696] text-[#260101] border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696]" required>
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-[#EAC696] font-cinzel text-lg">e-mail *</label>
                    <input type="email" name="email" class="w-full p-3 bg-[#EAC696] text-[#260101] border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696]" required>
                </div>

                <!-- Contraseña -->
                <div>
                    <label class="block text-[#EAC696] font-cinzel text-lg">Contraseña *</label>
                    <input type="password" name="password" class="w-full p-3 bg-[#EAC696] text-[#260101] border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696]" required>
                </div>

                <!-- Confirmar Contraseña -->
                <div>
                    <label class="block text-[#EAC696] font-cinzel text-lg">Confirmar Contraseña *</label>
                    <input type="password" name="password_confirmation" class="w-full p-3 bg-[#EAC696] text-[#260101] border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696]" required>
                </div>

                <!-- Teléfono -->
                <div>
                    <label class="block text-[#EAC696] font-cinzel text-lg">Teléfono *</label>
                    <input type="text" name="telephone" class="w-full p-3 bg-[#EAC696] text-[#260101] border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696]" required>
                </div>

                <!-- Tipo de vía -->
                <div>
                    <label class="block text-[#EAC696] font-cinzel text-lg">Tipo de Vía</label>
                    <input type="text" name="street_type" class="w-full p-3 bg-[#EAC696] text-[#260101] border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696]">
                </div>

                <!-- Dirección -->
                <div>
                    <label class="block text-[#EAC696] font-cinzel text-lg">Dirección</label>
                    <input type="text" name="street_name" class="w-full p-3 bg-[#EAC696] text-[#260101] border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696]">
                </div>

                <!-- Número -->
                <div>
                    <label class="block text-[#EAC696] font-cinzel text-lg">Número</label>
                    <input type="text" name="number" class="w-full p-3 bg-[#EAC696] text-[#260101] border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696]">
                </div>

                <!-- Código Postal -->
                <div>
                    <label class="block text-[#EAC696] font-cinzel text-lg">Código Postal</label>
                    <input type="text" name="postcode" class="w-full p-3 bg-[#EAC696] text-[#260101] border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696]">
                </div>

                <!-- Ciudad -->
                <div>
                    <label class="block text-[#EAC696] font-cinzel text-lg">Ciudad</label>
                    <input type="text" name="city" class="w-full p-3 bg-[#EAC696] text-[#260101] border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696]">
                </div>

                <!-- País -->
                <div>
                    <label class="block text-[#EAC696] font-cinzel text-lg">País</label>
                    <input type="text" name="country" class="w-full p-3 bg-[#EAC696] text-[#260101] border border-[#EAC696] rounded focus:outline-none focus:ring-2 focus:ring-[#EAC696]">
                </div>

                <!-- Botón de registro -->
                <div class="md:col-span-2">
                    <button type="submit" class="w-full font-cinzel bg-[#EAC696] text-[#260101] p-3 rounded-md shadow-md hover:bg-[#C89D60] transition font-semibold">
                        Registrarse
                    </button>
                </div>
            </form>
        </div>
    </main>

</body>
</html>

    
    



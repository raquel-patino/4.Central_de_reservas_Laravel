<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="w-96 p-6 bg-white shadow-md rounded-lg">
        <h2 class="text-2xl font-bold text-center mb-4">Registro</h2>
        <form method="POST" action="{{route('register-new')}}">
            @csrf
            <div class="mb-2">
                <label class="block text-gray-700">Nombre</label>
                <input type="text" name="name" class="w-full p-2 border border-gray-300 rounded mt-1" required>
            </div>
            <div class="mb-2">
                <label class="block text-gray-700">Apellido</label>
                <input type="text" name="surname" class="w-full p-2 border border-gray-300 rounded mt-1" required>
            </div>
            <div class="mb-2">
                <label class="block text-gray-700">Username</label>
                <input type="text" name="username" class="w-full p-2 border border-gray-300 rounded mt-1" required>
            </div>
            <div class="mb-2">
                <label class="block text-gray-700">Correo Electrónico</label>
                <input type="email" name="email" class="w-full p-2 border border-gray-300 rounded mt-1" required>
            </div>
            <div class="mb-2">
                <label class="block text-gray-700">Contraseña</label>
                <input type="password" name="password" class="w-full p-2 border border-gray-300 rounded mt-1" required>
                @error('password')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
    
            </div>
            <div class="mb-2">
                <label class="block text-gray-700">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" class="w-full p-2 border border-gray-300 rounded mt-1" required>
            </div>
            <div class="flex flex-row justify-between">
            <div class="mb-4 w-1/4">
                <label class="block text-gray-700">Calle</label>
                <input type="text" name="street_type" class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4 w-1/4">
                <label class="block text-gray-700">Nombre de la calle</label>
                <input type="text" name="street_name" class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Numero</label>
                <input type="text" name="number" class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Codigo postal</label>
                <input type="text" name="postcode" class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Ciudad</label>
                <input type="text" name="city" class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Pais</label>
                <input type="text" name="country" class="w-full p-2 border border-gray-300 rounded mt-1">
            </div>
        </div>
            <div class="mb-4">
                <label class="block text-gray-700">Telefono</label>
                <input type="text" name="telephone" class="w-full p-2 border border-gray-300 rounded mt-1" required>
            </div>
            <button type="submit" class="w-full bg-green-500 text-white p-2 rounded hover:bg-green-600">Registrarse</button>
        </form>
        <p class="mt-4 text-center">¿Ya tienes cuenta? <a href="{{route ('login')}}" class="text-blue-500">Inicia sesión</a></p>
    </div>
</body>
</html>
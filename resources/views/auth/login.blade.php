<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    @if (session()->has('error'))
        <div class="text-red-600">
            {{session('error')}}
        </div>
    @endif
    <div class="w-96 p-6 bg-white shadow-md rounded-lg">
        <h2 class="text-2xl font-bold text-center mb-4">Iniciar Sesión</h2>
        <form method="POST" action="{{route ('login')}}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Correo Electrónico</label>
                <input type="email" name="email" class="w-full p-2 border border-gray-300 rounded mt-1" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Contraseña</label>
                <input type="password" name="password" class="w-full p-2 border border-gray-300 rounded mt-1" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Entrar</button>
        </form>
        <p class="mt-4 text-center">¿No tienes cuenta? <a href="{{route('register')}}" class="text-blue-500">Regístrate</a></p>
    </div>
</body>
</html>

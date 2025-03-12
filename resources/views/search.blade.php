<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Mis Reservas</h2>

    @if ($hotels->isEmpty())
        <p>No existen hoteles disponibles.</p>
    @else
        <ul>
            @foreach ($hotels as $hotel)
                <li>
                    <strong>Hotel:</strong> {{ $hotel->name }}<br>
                    <strong>Hotel:</strong> {{ $hotel->telephone_number }}<br>
                    <strong>Hotel:</strong> {{ $hotel->description }}<br>
                    @if ($hotel->rooms->count() > 0)
                    <strong>Habitaciones:</strong> <br>
                    <ul>
                        @foreach ($hotel->rooms as $room)
                            <li>Tipo: {{ $room->type }}</li>
                        @endforeach
                    </ul>
                @else
                    <strong>Este hotel no tiene habitaciones disponibles</strong>
                @endif     
                </li>
                <hr>
            @endforeach
        </ul>
    @endif
    
</body>
</html>
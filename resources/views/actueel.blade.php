<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>eWeather - Actueel</title>
</head>

<body>
    <h1>Actuele metingen</h1>

    <ul>
        @foreach ($stations as $station)
            <li>{{ $station['station'] }}</li>
        @endforeach
    </ul>
</body>

</html>
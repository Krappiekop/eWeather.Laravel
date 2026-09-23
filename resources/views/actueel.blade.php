<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>eWeather - Actueel</title>
</head>

<body>
    <h1>Actuele metingen</h1>

    <table>
        <tr>
            <th>Regio</th>
            <th>Temperature</th>
            <th>Feel temperature</th>
            <th>Ground temperature</th>
        </tr>
        @foreach ($stations as $station)
        <tr>
            <td>{{ $station['regio'] }}</td>
            <td>{{ $station['temperature'] }}</td>
            <td>{{ $station['feelTemperature'] }}</td>
            <td>{{ $station['groundTemperature'] }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>
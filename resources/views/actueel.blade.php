@extends('layouts.app')

@section('title', 'Actueel')

@section('content')
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
@endsection
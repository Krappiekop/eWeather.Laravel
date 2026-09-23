<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/actueel', function (Request $request) {
    $foutmelding = null;
    $stations = collect();

    try {
        $response = Http::get('http://localhost:5075/weerdata/actueel');
        $stations = collect($response->json());
    } catch (\Exception $e) {
        $foutmelding = 'De backend is niet bereikbaar.';
    }

    $gekozenStation = $request->query('GekozenWeerStation');
    $gekozenPlek = $stations->firstWhere('station', $gekozenStation);

    return view('actueel', [
        'stations' => $stations,
        'foutmelding' => $foutmelding,
        'gekozenStation' => $gekozenStation,
        'gekozenPlek' => $gekozenPlek,
    ]);
});
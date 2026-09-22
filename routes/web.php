<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/actueel', function () {
    $response = Http::get('http://localhost:5075/weerdata/actueel');
    $stations = $response->json();

    return view('actueel', ['stations' => $stations]);
});
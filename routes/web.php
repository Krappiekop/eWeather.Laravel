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
})->name('actueel');

Route::get('/geschiedenis', function (Request $request) {
    $foutmelding = null;
    $stations = collect();

    try {
        $response = Http::get('http://localhost:5075/weerdata/actueel');
        $stations = collect($response->json());
    } catch (\Exception $e) {
        $foutmelding = 'De gegevens van /weerdata/actueel konden niet worden opgehaald. Check of de backend draait en probeer het later opnieuw.';
    }

    $gekozenStation = $request->query('GekozenWeerStation');
    $startDate = $request->query('StartDate');
    $endDate = $request->query('EndDate');

    $periodeData = collect();

    if (!empty($gekozenStation) && !empty($startDate)) {
        try {
            $query = [
                'StartDate' => $startDate,
                'Station' => $gekozenStation,
            ];
            if (!empty($endDate)) {
                $query['EndDate'] = $endDate;
            }

            $periodeResponse = Http::get('http://localhost:5075/weerdata', $query);
            $periodeData = collect($periodeResponse->json());
        } catch (\Exception $e) {
            $foutmelding = 'De gegevens van /weerdata konden niet worden opgehaald. Probeer het later opnieuw.';
        }
    }

    return view('geschiedenis', [
        'stations' => $stations,
        'foutmelding' => $foutmelding,
        'gekozenStation' => $gekozenStation,
        'startDate' => $startDate,
        'endDate' => $endDate,
        'periodeData' => $periodeData,
    ]);
})->name('geschiedenis');
//controler maken van route naar /actueel
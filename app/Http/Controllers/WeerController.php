<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class WeerController extends Controller
{
    private function haalActueleStations() : Collection
    {
        $response = Http::get('http://localhost:5075/weerdata/actueel');
        return collect($response->json());
    }

    public function actueel(Request $request)
    {
        $foutmelding = null;
        $stations = collect();

        try {
            $stations = $this->haalActueleStations();
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
    }

    public function geschiedenis(Request $request)
    {
        $foutmelding = null;
        $stations = collect();

        try {
            $stations = $this->haalActueleStations();
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
    }
}

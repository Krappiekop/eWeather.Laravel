@extends('layouts.app')

@section('title', 'Actueel')

@section('content')

@if ($foutmelding)
    <p class="fout">{{ $foutmelding }}</p>
@endif

@if ($stations->isNotEmpty())
    <form method="get" class="form-stad">
        <div class="stad-zoeker">
            <input type="text" id="stadInput" placeholder="{{ $gekozenStation ?? 'Kies een weerstation' }}" autocomplete="off">
            <input type="hidden" id="stadHidden" name="GekozenWeerStation" value="{{ $gekozenStation }}">
            <ul id="stadLijst" class="stad-opties"></ul>
        </div>
    </form>

    @if ($gekozenStation)
        @if ($gekozenPlek)
            <div class="cards-container">
                <div class="card-outer">
                    <i class="fa-solid fa-temperature-full"></i>
                    <div class="card-inner">
                        <span class="card-waarde">{{ $gekozenPlek['temperature'] }}</span>
                        <span class="card-label">Actuele temperatuur</span>
                    </div>
                </div>
                <div class="card-outer">
                    <i class="fa-solid fa-temperature-high"></i>
                    <div class="card-inner">
                        <span class="card-waarde">{{ $gekozenPlek['feelTemperature'] }}</span>
                        <span class="card-label">Gevoelstemperatuur</span>
                    </div>
                </div>
                <div class="card-outer">
                    <i class="fa-solid fa-temperature-low"></i>
                    <div class="card-inner">
                        <span class="card-waarde">{{ $gekozenPlek['groundTemperature'] }}</span>
                        <span class="card-label">Grond temperatuur</span>
                    </div>
                </div>
                <div class="card-outer">
                    <i class="fa-solid fa-sun"></i>
                    <div class="card-inner">
                        <span class="card-waarde">{{ $gekozenPlek['sunPower'] }}</span>
                        <span class="card-label">Zonnekracht</span>
                    </div>
                </div>
                <div class="card-outer">
                    <i class="fa-solid fa-droplet"></i>
                    <div class="card-inner">
                        <span class="card-waarde">{{ $gekozenPlek['rainFallLastHour'] }}</span>
                        <span class="card-label">Regen laatste uur (mm)</span>
                    </div>
                </div>
                <div class="card-outer">
                    <i class="fa-solid fa-wind"></i>
                    <div class="card-inner">
                        <span class="card-waarde">{{ $gekozenPlek['windDirection'] }}</span>
                        <span class="card-label">Windrichting</span>
                    </div>
                </div>
            </div>
        @else
            <div class="mainContent">
                <p>Geen actuele metingen beschikbaar voor het gekozen weerstation. Check de beschikbare weerstations.</p>
            </div>
        @endif
    @else
        <div class="mainContent">
            <p>Kies een regio om de actuele metingen te zien.</p>
        </div>
    @endif
@endif

@endsection

@section('scripts')
    @if ($stations->isNotEmpty())
        <script>
            initStadZoeker(@json($stations->values()));
        </script>
    @endif
@endsection
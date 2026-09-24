@extends('layouts.app')

@section('title', 'Geschiedenis')

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

        <div>
            <label for="StartDate">Van:</label>
            <input type="date" id="StartDate" name="StartDate" value="{{ $startDate }}">

            <label for="EndDate">Tot:</label>
            <input type="date" id="EndDate" name="EndDate" value="{{ $endDate }}">
        </div>
    </form>

    @if ($periodeData->isNotEmpty())
        <div class="grafiek-container"><canvas id="temperatuurGrafiek"></canvas></div>
    @else
        <div class="mainContent">
            <p>Kies een regio om de afgelopen metingen te zien.</p>
        </div>
    @endif
@endif

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    @if ($stations->isNotEmpty())
        initStadZoeker(@json($stations->values()));
    @endif

    @if ($periodeData->isNotEmpty())
        const periodeData = @json($periodeData->values());
        const ctx = document.getElementById('temperatuurGrafiek');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: periodeData.map(d => {
                    const stukken = d.tijdstip.split('T');
                    const datum = stukken[0].slice(5);
                    const tijd = stukken[1].slice(0, 5);
                    return `${datum} ${tijd}`;
                }),
                datasets: [
                    { label: 'Temperatuur', data: periodeData.map(d => d.temperature) },
                    { label: 'Gevoels Temperatuur', data: periodeData.map(d => d.feelTemperature) },
                    { label: 'Grond Temperatuur', data: periodeData.map(d => d.groundTemperature) }
                ]
            },
            options: {
                maintainAspectRatio: false,
                scales: { y: { min: 0, max: 30 } }
            }
        });
    @endif
});
</script>
@endsection
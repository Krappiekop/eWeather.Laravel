<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - eWeather</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    @vite(['resources/css/site.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

@php
    $huidigStation = request()->query('GekozenWeerStation');
@endphp

<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light mb-3">
            <div class="container">
                <a class="navbar-brand" href="{{ route('actueel', $huidigStation ? ['GekozenWeerStation' => $huidigStation] : []) }}">
                    <img class="logo" src="{{ asset('images/eweather-logo.png') }}" alt="eWeather logo">
                </a>
                <ul class="navbar-nav flex-grow-1">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('actueel', $huidigStation ? ['GekozenWeerStation' => $huidigStation] : []) }}">Actueel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('geschiedenis', $huidigStation ? ['GekozenWeerStation' => $huidigStation] : []) }}">Geschiedenis</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container">
        <main role="main" class="pb-3">
            @yield('content')
        </main>
    </div>

    <footer class="border-top footer text-muted">
        <div class="container">
            &copy; {{ date('Y') }} - <a href="https://www.buienradar.nl">BuienRadar</a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @vite(['resources/js/stad-zoeker.js'])

    @yield('scripts')
</body>
</html>
## Laravel Frontend - To Do

### 1. Projectopzet
- [x] Laravel project aangemaakt (composer create-project laravel/laravel eWeather.Laravel)
- [x] Backend koppeling getest via de Http facade (/weerdata/actueel)
- [x] Basis Blade view met tabel van alle stations (actueel.blade.php)

### 2. Gedeelde layout
- [x] Layout Blade template (navbar, CSS variabelen merkkleuren, fonts, Buienradar attributie)
- [x] Statische assets overzetten (logo, fonts, FontAwesome via CDN)
- [x] CSS custom properties voor de vier merkkleuren
- [x] Responsive grid en card layout basis

### 3. Zoekveld (stad zoeker.js equivalent)
- [x] JS bestand met filterlogica op Regio
- [x] Toon alle stations bij focus op het veld
- [x] Verberg lijst bij klik buiten het component
- [x] Submit formulier met gekozen Station bij klik op een optie
- [x] Herbruikbare functie (bijvoorbeeld initStadZoeker(stations)) zodat beide pagina's hem kunnen gebruiken
- [x] .js en .css in recourses zetten ipv public.

### 4. Hoofdpagina (Index)
- [x] Route die /weerdata/actueel ophaalt
- [x] Zoekveld geintegreerd
- [x] Kaarten met temperatuur, gevoelstemperatuur, grondtemperatuur, zonkracht, regen laatste uur, windrichting
- [x] Foutafhandeling als de Backend niet bereikbaar is
- [x] Foutafhandeling als het gekozen station geen data heeft

### 5. Geschiedenispagina
- [x] Route die /weerdata/actueel ophaalt voor de stationlijst
- [x] Route die /weerdata ophaalt met Station, StartDate en EndDate
- [x] Zoekveld hergebruikt
- [x] Datumvelden Van en Tot plus een submit knop
- [x] Tabel met tijdstip, temperatuur, gevoelstemperatuur, grondtemperatuur
- [x] Chart.js lijngrafiek met drie lijnen, y as vast van 0 tot 30, x as labels in MM DD HH mm formaat
- [x] Losse foutafhandeling per aanroep, actueel data apart van periode data

### 6. Navigatie en afronding
- [ ] Navbar link tussen hoofdpagina en geschiedenispagina
- [ ] Gelijktijdig starten van Backend (dotnet run) en Frontend (php artisan serve) vastleggen, eventueel via VS Code taken
- [ ] Poorten vastleggen: Backend 5075, Frontend Laravel (standaard 8000, te bevestigen)
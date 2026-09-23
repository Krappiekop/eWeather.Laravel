## Laravel Frontend - To Do

### 1. Projectopzet
- [x] Laravel project aangemaakt (composer create-project laravel/laravel eWeather.Laravel)
- [x] Backend koppeling getest via de Http facade (/weerdata/actueel)
- [x] Basis Blade view met tabel van alle stations (actueel.blade.php)

### 2. Gedeelde layout
- [ ] Layout Blade template (navbar, CSS variabelen merkkleuren, fonts, Buienradar attributie)
- [ ] Statische assets overzetten (logo, fonts, FontAwesome via CDN)
- [ ] CSS custom properties voor de vier merkkleuren
- [ ] Responsive grid en card layout basis

### 3. Zoekveld (stad zoeker.js equivalent)
- [ ] JS bestand met filterlogica op Regio
- [ ] Toon alle stations bij focus op het veld
- [ ] Verberg lijst bij klik buiten het component
- [ ] Submit formulier met gekozen Station bij klik op een optie
- [ ] Herbruikbare functie (bijvoorbeeld initStadZoeker(stations)) zodat beide pagina's hem kunnen gebruiken

### 4. Hoofdpagina (Index)
- [ ] Route die /weerdata/actueel ophaalt
- [ ] Zoekveld geintegreerd
- [ ] Kaarten met temperatuur, gevoelstemperatuur, grondtemperatuur, zonkracht, regen laatste uur, windrichting
- [ ] Foutafhandeling als de Backend niet bereikbaar is
- [ ] Foutafhandeling als het gekozen station geen data heeft

### 5. Geschiedenispagina
- [ ] Route die /weerdata/actueel ophaalt voor de stationlijst
- [ ] Route die /weerdata ophaalt met Station, StartDate en EndDate
- [ ] Zoekveld hergebruikt
- [ ] Datumvelden Van en Tot plus een submit knop
- [ ] Tabel met tijdstip, temperatuur, gevoelstemperatuur, grondtemperatuur
- [ ] Chart.js lijngrafiek met drie lijnen, y as vast van 0 tot 30, x as labels in MM DD HH mm formaat
- [ ] Losse foutafhandeling per aanroep, actueel data apart van periode data

### 6. Navigatie en afronding
- [ ] Navbar link tussen hoofdpagina en geschiedenispagina
- [ ] Gelijktijdig starten van Backend (dotnet run) en Frontend (php artisan serve) vastleggen, eventueel via VS Code taken
- [ ] Poorten vastleggen: Backend 5075, Frontend Laravel (standaard 8000, te bevestigen)
function initStadZoeker(stations) {
    const stadInput = document.getElementById("stadInput");
    const stadHidden = document.getElementById("stadHidden");
    const stadLijst = document.getElementById("stadLijst");

    function toonOpties(lijst) {
        stadLijst.innerHTML = "";

        lijst.forEach(s => {
            const item = document.createElement("li");
            item.textContent = s.regio;
            item.addEventListener("click", () => {
                stadInput.value = s.regio;
                stadHidden.value = s.station;
                stadLijst.innerHTML = "";
                stadLijst.style.display = "none";
                stadInput.form.submit();
            });
            stadLijst.appendChild(item);
        });

        stadLijst.style.display = lijst.length > 0 ? "block" : "none";
    }

    stadInput.addEventListener("focus", () => {
        toonOpties(stations);
    });

    stadInput.addEventListener("input", () => {
        const zoekterm = stadInput.value.toLowerCase();
        const gefilterd = stations.filter(s => s.regio.toLowerCase().includes(zoekterm));
        toonOpties(gefilterd);
    });

    document.addEventListener("click", (event) => {
        const zoeker = document.querySelector(".stad-zoeker");

        if (!zoeker.contains(event.target)) {
            stadLijst.style.display = "none";
        }
    });
}

window.initStadZoeker = initStadZoeker;
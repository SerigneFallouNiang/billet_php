
function updatePrice() {
    var prixInput = document.getElementById("prix");
    var trajetSelect = document.getElementById("trajet");
    var trajetPrix = {
        "Dakar-Paris": 600000,
        "Dakar-NewYork": 800000,
        "Dakar-Casablanca": 200000,
        "Dakar-Madrid": 500000,
        "Dakar-Londres": 600000,
        "Dakar-Bruxelles": 500000,
        "Dakar-Montréal": 1000000,
        "Dakar-Berlin": 600000,
        "Dakar-Rome": 600000,
        "Dakar-Pékin": 1000000
    };
    var selectedOption = trajetSelect.options[trajetSelect.selectedIndex].value;
    var prix = trajetPrix[selectedOption];
    prixInput.value = prix;
}

// Appel initial pour définir le prix au chargement de la page
updatePrice();
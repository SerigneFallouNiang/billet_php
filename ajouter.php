<?php
include "connexion.php";
include "header.php";

if(isset($_POST['submit'])){
    if(empty(trim($_POST['date_reservation'])) || empty(trim($_POST['prix'])) || empty(trim($_POST['heure'])) || empty(trim($_POST['trajet'])) ||  empty(trim($_POST['statut']))){
        $mess = 'Remplissez tous les champs';
    } else {
        include "connexion.php";
        $stmt = $con->prepare("INSERT INTO billets(date_reservation, prix, heure, trajet, statut,client_id) VALUES (?, ?,?, ?, ?,?)");
        $stmt->bind_param("sssssi", $_POST['date_reservation'], $_POST['prix'], $_POST['heure'], $_POST['trajet'], $_POST['statut'], $_POST['client_id']);
        if ($stmt->execute()) {
            header('Location: index.php');
            exit();
        } else {
            $message = 'Une erreur s\'est produite lors de l\'insertion dans la base de données.';
        }
    }
}

?>
  <div class="container">
    <div class="plan">
        <h1>Plan a tour today</h1>
        <h2>Just How you want</h2>
        <div class="coolinput">
<form action="" method="POST">
    <label for="input">Date         :</label><br>
    <input type="date" name="date_reservation"  class="input"     required><br>
    <label for="">Prix :</label><br>
    <input type="number" name="prix" id="prix"   class="input" required><br>
    <label for="">Heure :</label><br>
    <input type="time" name="heure"  class="input"  required><br><br>
    <select name="trajet" id="trajet" onchange="updatePrice()">
    <option value="">Selectionner  le  trajet  que  vous souhaiter faire</option>
        <option value="Dakar-Paris">Dakar → Paris (France)</option>
        <option value="Dakar-NewYork">Dakar → New York (États-Unis)</option>
        <option value="Dakar-Casablanca">Dakar → Casablanca (Maroc)</option>
        <option value="Dakar-Madrid">Dakar → Madrid (Espagne)</option>
        <option value="Dakar-Londres">Dakar → Londres (Royaume-Uni)</option>
        <option value="Dakar-Bruxelles">Dakar → Bruxelles (Belgique)</option>
        <option value="Dakar-Montréal">Dakar → Montréal (Canada)</option>
        <option value="Dakar-Berlin">Dakar → Berlin (Allemagne)</option>
        <option value="Dakar-Rome">Dakar → Rome (Italie)</option>
        <option value="Dakar-Pékin">Dakar → Pékin (Chine)</option>
    </select><br>

    <label for="">Client_id :</label><br>
    <input type="number" name="client_id"   class="input" required><br>
    <label for="">Statut :</label><br>
    <select name="statut" id="statuts" class="form-control" required>
    <option value="1">En attente</option>
    <option value="2">Confirmer</option>
    </select><br>
    <input type="submit" name="submit" value="Ajouter">
</form>
</div>
</div>

<div class="img">
<img src="images/reservation-de-vol-et-billets-avion.jpg" alt="">
</div>
<script>
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
</script>
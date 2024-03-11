<?php
    include "header.php";

    include "connexion.php";
    if(isset($_GET["id"]) &&  !empty($_GET["id"])) {
        $id = $_GET["id"];
        $stmt = $con->prepare("SELECT * FROM billets WHERE id = ?");
        $stmt->bind_param("i", $id);
        if($stmt->execute()){
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
        }
    } 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $stmt = $con->prepare("UPDATE billets SET date_reservation=?, prix=?, heure=?,trajet=?, statut=?   WHERE id = ?");
        $stmt->bind_param("sssssi", $_POST['date_reservation'], $_POST['prix'], $_POST['heure'], $_POST['trajet'],$_POST['statut'],  $id);
        if($stmt->execute()){
            header('location: index.php');
            exit;
        }
    }
    ?>
      <div class="container">
    <div class="plan">
    <form method="POST" action="">
        <input type="date" name="date_reservation" value="<?=$row['date_reservation'];?>"><br><br>
        <input type="number" name="prix"  id="prix"  value="<?=$row['prix'] ;?>"><br><br>

        <input type="time" name="heure" value="<?=$row['heure'];?>"><br><br>
        <select name="trajet" id="trajet"   value="<?=$row['trajet'];?> onchange="updatePrice()">
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
        <input type="text" name="statut" value="<?=htmlspecialchars($row['statut'] );?>"><br>
        <input type="submit" name="submit" value="modifier">
    </form>
    </div>
<div class="img">
<img src="images/changement-de-destination.webp" alt="">
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
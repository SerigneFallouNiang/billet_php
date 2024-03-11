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
        $stmt = $con->prepare("UPDATE billets SET date_reservation=?, prix=?, heure=?, depart=? ,destination=?, statut=?   WHERE id = ?");
        $stmt->bind_param("ssssssi", $_POST['date_reservation'], $_POST['prix'], $_POST['heure'], $_POST['depart'],$_POST['destination'],$_POST['statut'],  $id);
        if($stmt->execute()){
            header('location: index.php');
            exit;
        }
    }
    ?>
      <div class="container">
    <div class="plan">
    <form method="POST" action="">
        <input type="date" name="date_reservation" value="<?=$row['date_reservation'] ?? '';?>"><br><br>
        <input type="number" name="prix" value="<?=$row['prix'] ?? '';?>"><br><br>
        <input type="time" name="heure" value="<?=$row['heure'] ?? '';?>"><br><br>
        <input type="text" name="depart" value="<?=htmlspecialchars($row['depart'] ?? '');?>"><br><br>
        <input type="text" name="destination" value="<?=htmlspecialchars($row['destination'] ?? '');?>"><br><br>
        <input type="text" name="statut" value="<?=htmlspecialchars($row['statut'] ?? '');?>"><br>
        <input type="submit" name="submit" value="modifier">
    </form>
    </div>
<div class="img">
<img src="images/changement-de-destination.webp" alt="">
</div>
<?php
include "connexion.php";
include "header.php";

if(isset($_POST['submit'])){
    if(empty(trim($_POST['date_reservation'])) || empty(trim($_POST['prix'])) || empty(trim($_POST['heure'])) || empty(trim($_POST['depart'])) || empty(trim($_POST['destination'])) || empty(trim($_POST['statut']))){
        $mess = 'Remplissez tous les champs';
    } else {
        include "connexion.php";
        $stmt = $con->prepare("INSERT INTO billets(date_reservation, prix, heure, depart, destination, statut,client_id) VALUES (?, ?, ?, ?, ?, ?,?)");
        $stmt->bind_param("ssssssi", $_POST['date_reservation'], $_POST['prix'], $_POST['heure'], $_POST['depart'], $_POST['destination'], $_POST['statut'], $_POST['client_id']);
        if ($stmt->execute()) {
            header('Location: liste.php');
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
<form action="" method="POST">
    <label for="">Date         :</label><br>
    <input type="date" name="date_reservation" required><br>
    <label for="">Prix :</label><br>
    <input type="number" name="prix" required><br>
    <label for="">time :</label><br>
    <input type="time" name="heure" required><br>
    <label for="">Depart :</label><br>
    <input type="text" name="depart" required><br>
    <label for="">Description :</label><br>
    <input type="text" name="destination" required><br>
    <label for="">Client_id :</label><br>
    <input type="number" name="client_id" required><br>
    <label for="">Statut :</label><br>
    <input type="number" name="statut" required><br>
    <input type="submit" name="submit" value="Ajouter">
</form>
</div>
<div class="img">
<img src="images/reservation-de-vol-et-billets-avion.jpg" alt="">
</div>

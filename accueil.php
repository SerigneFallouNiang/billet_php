<?php 

$id=$_GET['id'];
                include_once "connexion.php";
                include "header.php";
                $req = mysqli_query($con , "SELECT * ,billets.id AS idB FROM billets JOIN client ON billets.client_id=client.id WHERE client_id=$id");
                if(mysqli_num_rows($req) == 0){
                    echo "Il n'y a pas encore de billet ajouter !" ;
                }else {
            $row=mysqli_fetch_assoc($req)
                        ?>
            <div class="container">
    <div class="plan">
        <h1>Plan a tour today</h1>
        <h2>Just How you want</h2>
        <ul>
            <li> BILLET D'AVION</li>
            <li>Nom du passager : <?=$row['prenom']?> <?=$row['nom']?></li>
            <li>Numéro Telephone :<?=$row['numero_tel']?></li>
            <li>Date de reservation : <?=$row['date_reservation']?></li>
            <li>Trajet : : <?=$row['trajet']?></li>
            <li>Prix du biellet  : <?=$row['prix']?></li>
            <li>Heure de reservation : <?=$row['heure']?></li>
            <li>Statut : <?=$row['statut']?></li>
            </ul>
            <p>Veuillez vérifier toutes les informations avec attention. Bon voyage!</p>
            <button class="modifier"><a href="modifier.php?id=<?=$row['idB']?>">Modifier</a></button>
            <button class="annuler"><a href="supprimer.php?id=<?=$row['id']?>">Annuler</a></button>
    </div>
<div class="img">
<img src="images/logo.jpg" alt="">
</div>
    </div>
         <?php
                    } 
                    include "footer.php";
            ?>

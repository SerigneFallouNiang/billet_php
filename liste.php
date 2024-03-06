
<?php 
                include_once "connexion.php";
                include "header.php";
                $req = mysqli_query($con , "SELECT * FROM billets JOIN client ON billets.client_id=client.id");
                if(mysqli_num_rows($req) == 0){
                    echo "Il n'y a pas encore de billet ajouter !" ;
   
                }else {
                    while($row=mysqli_fetch_assoc($req)){
                        ?>
            <div class="container1">
            <p>Client:<?=$row['prenom']?><?=$row['nom']?></p>     
            <p>prix billet :<?=$row['prix']?>, De <?=$row['depart']?> ,Vers <?=$row['destination']?></p>       
            <a href="accueil.php?id=<?=$row['id']?>">Detail</a>
            </div>
                        <?php
                    }
                    
                }
            ?>
              



<?php 
                include_once "connexion.php";
                include "header.php";
                $req = mysqli_query($con , "SELECT * FROM billets JOIN client ON billets.client_id=client.id");
                if(mysqli_num_rows($req) == 0){
                    echo "Il n'y a pas encore de billet ajouter !" ;
   
                }else {
                    while($row=mysqli_fetch_assoc($req)){
                        ?>
 <div class="projcard-container">
    
    <div class="projcard projcard-blue">
      <div class="projcard-innerbox">
        <img class="projcard-img" src="https://picsum.photos/800/600?image=1041" />
        <div class="projcard-textbox">
          <div class="projcard-title">Client: <?=$row['prenom']?><?=$row['nom']?></div>
          <div class="projcard-subtitle">Prix du billet : <?=$row['prix']?></div>
          <div class="projcard-bar"></div>
          <div class="projcard-description">Nous sommes ravis de vous accueillir à bord de notre vol de <?=$row['trajet']?>. Votre aventure commence le <?=$row['date_reservation'] ?>, et nous sommes impatients de faire partie de votre voyage. Préparez-vous à vivre une expérience de vol exceptionnelle avec nous.

Bon voyage,</div>
          <div class="projcard-tagbox">
          </div>
          <span class="projcard-tag"><a href="accueil.php?id=<?=$row['id']?>">Detail</a></span>
        </div>
      </div>
    </div>
    </div>
                        <?php
                    }
                    
                }
                include'footer.php';
            ?>
              


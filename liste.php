
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
              

<section class="info">
  <img src="https://codetheweb.blog/assets/img/icon2.png">
  <h1>Learn HTML &mdash; <a href="https://codetheweb.blog/" target="_blank">Code The Web</a></h1>
</section>
<section class="cards-wrapper">
  <div class="card-grid-space">
    <div class="num">01</div>
    <a class="card" href="https://codetheweb.blog/2017/10/06/html-syntax/" style="--bg-img: url(https://images1-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&resize_w=1500&url=https://codetheweb.blog/assets/img/posts/html-syntax/cover.jpg)">
      <div>
        <h1>HTML Syntax</h1>
        <p>The syntax of a language is how it works. How to actually write it. Learn HTML syntax…</p>
        <div class="date">6 Oct 2017</div>
        <div class="tags">
          <div class="tag">HTML</div>
        </div>
      </div>
    </a>
  </div>
  <div class="card-grid-space">
    <div class="num">02</div>
    <a class="card" href="https://codetheweb.blog/2017/10/09/basic-types-of-html-tags/" style="--bg-img: url('https://images1-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&resize_w=1500&url=https://codetheweb.blog/assets/img/posts/basic-types-of-html-tags/cover.jpg')">
      <div>
        <h1>Basic types of HTML tags</h1>
        <p>Learn about some of the most common HTML tags…</p>
        <div class="date">9 Oct 2017</div>
        <div class="tags">
          <div class="tag">HTML</div>
        </div>
      </div>
    </a>
  </div>
  <div class="card-grid-space">
    <div class="num">03</div>
    <a class="card" href="https://codetheweb.blog/2017/10/14/links-images-about-file-paths/" style="--bg-img: url('https://images1-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&resize_w=1500&url=https://codetheweb.blog/assets/img/posts/links-images-about-file-paths/cover.jpg')">
      <div>
        <h1>Links, images and about file paths</h1>
        <p>Learn how to use links and images along with file paths…</p>
        <div class="date">14 Oct 2017</div>
        <div class="tags">
          <div class="tag">HTML</div>
        </div>
      </div>
    </a>
  </div>
  <!-- https://images.unsplash.com/photo-1520839090488-4a6c211e2f94?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=38951b8650067840307cba514b554ba5&auto=format&fit=crop&w=1350&q=80 -->
</section>




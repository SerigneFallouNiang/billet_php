
<?php
include "connexion.php";
$id=$_GET['id'];
mysqli_query($con , "DELETE FROM billets WHERE client_id= $id");
header("location: liste.php");
?>

<link rel="stylesheet" href="css/login.css">
<center>


<h1>Gestion Des Tâches</h1><img src="img/check-list.png"width="50px" alt="">
<div class="connec">


<?php
session_start();
$id = mysqli_connect("127.0.0.1:3307", "root", "", "tache");
mysqli_query($id, "SET NAMES utf8");
$pseudo = $_SESSION["email"];
if(isset($pseudo)){ 
    echo "<h1><br> $pseudo Date invalide...Merci de choisir une nouvelle date</br></h1>";
    header("refresh:2;url=add+.php");
    
}else{
    header("refresh:4;url=index.php");
}?>
</div>
</center>
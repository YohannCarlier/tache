<link rel="stylesheet" href="css/login.css">
<center>


<h1>Chargement .....</h1><img src="img/check-list.png"width="50px" alt="">
<div class="connec">


<?php
session_start();
$id = mysqli_connect("localhost:3306","root","","tache");
mysqli_query($id, "SET NAMES utf8");
$pseudo = $_SESSION["email"];
if(isset($pseudo)){ 
    echo "<h1><br> $pseudo vous allez être redirigé sur notre plateforme pour ajouter une tâche</br></h1>";
    header("refresh:2; url=add+.php"); 
}else{
    header("refresh:3;url=index.php");
}?>
</div>
</center>
<?php
session_start();
$idtache = $_GET["idtache"];
$id= mysqli_connect("127.0.0.1:3307","root","","tache");
$req= mysqli_query($id,"update liste set etat='Validé' where idtache=$idtache");
header("location:acceuil.php");

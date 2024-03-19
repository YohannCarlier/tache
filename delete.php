<?php
session_start();

if(!isset($_SESSION["pseudo"])){ 
    header("location:index.php"); 
}
$idtache = $_GET["idtache"];

$id= mysqli_connect("127.0.0.1:3307","root","","tache");
$req= mysqli_query($id,"delete from liste where idtache=$idtache");

header("location:acceuil.php")
?>
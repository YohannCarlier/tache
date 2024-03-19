<?php
session_start();
if(!isset($_SESSION["idu"])){ 
    header("location:index.php"); 
}
if(isset($_POST["envoi"]))
{   
    $actu = date("Y-m-d");
    $pseudo=$_SESSION["email"];
    $nature = $_POST["nature"];
    $commentaire = $_POST["commentaire"];
    $date = $_POST["date"];
    $idu = $_SESSION["idu"];
    echo $date ;?><br><br><?php
    echo $actu ;
    if(($date) > ($actu)){
        $id = mysqli_connect("127.0.0.1:3307","root","","tache");
        $req= mysqli_query($id,"insert into liste (idtache, nature, commentaire,date,idu) value (null,'$nature','$commentaire','$date',$idu )");
        header("location:acceuil.php");
    }else{
        header('location:invalide.php');
    }
     
    
}

$pseudo=$_SESSION["email"];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>tache</title>
    <link rel="stylesheet" href="css/add+.css">
</head>
<body>
    <center>
    <h1>Gestionnaire De Tâches</h1><img src="img/check-list.png"width="50px" alt="">
    <div class="connec">
    <form action='' method=POST>
        <div class="form-group">
            <br>
            <label for="select-probleme">Importance de la tache</label><br><br>
            <select name="nature" class="nature">
                <?php
                    $id3 = mysqli_connect("127.0.0.1:3307", "root","","tache");
                    $req3 = "select distinct nature from utile"; 
                    $resultat3= mysqli_query($id3,$req3);

                    while($ligne=mysqli_fetch_assoc($resultat3))
                    {
                        echo "<option ' value='".$ligne["nature"]."'> ".$ligne["nature"]." </option>";
                    }
                ?>  
            </select>
        </div>
        <br><br>
        <div class="form-group">
            <label for="textarea-descirption">Déscriptif:</label><br><br>
            <textarea  class="nature" name="commentaire" placeholder="Ecrivez la tache ici..." required></textarea>
            Date d'échéance : <br><br>
            <input class="nature" type="date" name="date" required>
        </div>
        <br><br>
        <button type="submit" name="envoi">Valider la tache</button><br><br><br>
    </form>
    <a href="acceuil.php"><img src="img/arrow.png" width="50px" alt=""></a>
    </div>
    </center>
</body>
</html>
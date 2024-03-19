<?php
    session_start();
    if(!isset($_SESSION["idu"]))
    {
        header("location:accueil.php");
    }
    $pseudo = $_SESSION['email'];
    $id = mysqli_connect("localhost:3306","root","","tache");
    mysqli_query($id,"SET NAMES utf8");
    $req = "select * from utilisateur where email='$pseudo'";
    ?>
    <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="css/login.css">
        </head>
        <body>
        <center>
        <h1>Gestion De Taches</h1><img src="img/check-list.png"width="50px" alt="">
        <div class="connec">
            <p class="message"> <span>Mes informations</span></p>
            <?php
                $res = mysqli_query($id,$req);
                while($ligne = mysqli_fetch_assoc($res))
                {
                    $email=$ligne["email"];
                    $mdp=$ligne["mdp"];
                    $idu=$ligne["idu"];
                    echo "Mail:&nbsp&nbsp&nbsp
                        $email";?><br><br><?php
                    echo "Mot de passe:&nbsp&nbsp&nbsp
                     $mdp";?><br><br><?php
                    echo "Id utilisateur:&nbsp&nbsp&nbsp
                     $idu"; ?><br><br><?php
                    
                }
            ?><br><br>
        <a href="acceuil.php"><img src="img/arrow.png" width=50px alt=""></a><br><br>
        <a href="logout.php" class="inscription"> Se deconnecter ??</a>
        </div>
        </center>
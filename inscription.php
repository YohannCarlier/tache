<?php
    session_start();
    if(isset($_POST["bouton"]))
    {     
        $id = mysqli_connect("127.0.0.1:3307","root","","tache");
        mysqli_query($id,"SET NAMES utf8");
        $email = $_POST["email"];
        $mdp = $_POST["mdp"];
        $req = "INSERT INTO utilisateur (email, mdp)
        VALUES ('$email','$mdp')";
        $resultat = mysqli_query($id, $req);
        header("location:index.php");  
    }
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
        <div class="formulaire"> 
        <p class="message"> <span>Inscription !!</span></p>
            <form action="" method="post">
                <input type="text" name="email" placeholder="Adresse mail:" required><br>
                <input type="password" name="mdp" placeholder="Mot de passe:" required><br><br>
                <button type="submit" name="bouton">S'incrire</button><br><br><br>
                <a href="index.php" class="inscription">Vous avez deja un compte ?</a>
            </form>
        </div>
        </div>
    </center>
</body>
</html>
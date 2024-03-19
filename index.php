<?php
session_start();

if (isset($_POST["connexion"]))
{
    extract($_POST);
    $id = mysqli_connect("127.0.0.1:3307", "root","","tache");
    $req = "select * from utilisateur where email='$email' and mdp='$mdp'";
    $resultat = mysqli_query($id, $req);
    $ligne=mysqli_fetch_assoc($resultat);
    
    if(mysqli_num_rows($resultat)>0)
    {
        $_SESSION["email"] = $ligne["email"];
        $_SESSION["mdp"] = $ligne["mdp"];
        $_SESSION["idu"] = $ligne["idu"];
        $email = $ligne["email"];
        $mdp = $ligne["mdp"];
        $idu = $ligne["idu"];
        header("location:acceuil.php");       
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portail authentification</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
</head>
<body>
    <center>
    <form action="" method="post">
        <h1>Gestionnaires De Tâchesj</h1><img src="img/check-list.png"width="50px" alt="">
        <div class="connec">

        
        <p class="message"> <span>Connexion</span></p>

        <div class="inputs">
            <input type="email" name="email" placeholder="Adresse mail" required><br>
            <input type="password" name="mdp" placeholder="Mot de passe" required><br><br>
        </div>
        
        <div align="center">
            <button type="submit" name="connexion">Se connecter</button><br><br><br>
            <a href="inscription.php" class="inscription">Vous n'avez pas encore de compte ?</a>
        </div>
            <br>
            <?php
                if (isset($_POST["connexion"]))
                {
                    extract($_POST);
                    $id = mysqli_connect("127.0.0.1:3307", "root","","tache");
                    $req = "select * from utilisateur where email='$email' and mdp='$mdp'";
                    $resultat = mysqli_query($id, $req);
                    $ligne=mysqli_fetch_assoc($resultat);
                    
                    if(mysqli_num_rows($resultat)>0)
                    {
                        $_SESSION["email"] = $email;
                        $_SESSION["mdp"] = $mdp;
                        $_SESSION["idu"] = $ligne["idu"];
                        
                        header("location:acceuil.php");       
                    }else{ 
                        echo "<h3>/!\ Compte inexistant ou erreur d'identifiant ou de mot de passe /!\</h3>";
                    }
                }
                ?>
        </div>
    </form>  
    </center>  
</body>
</html>
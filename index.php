<?php
session_start();

if (isset($_POST["connexion"])) {
    // Récupération des données du formulaire
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    // Connexion à la base de données
    $id = mysqli_connect("localhost:3306", "root", "", "tache");

    // Préparation de la requête
    $req = "SELECT * FROM utilisateur WHERE email=? AND mdp=?";
    $stmt = mysqli_prepare($id, $req);

    // Liaison des paramètres
    mysqli_stmt_bind_param($stmt, "ss", $email, $mdp);

    // Exécution de la requête
    mysqli_stmt_execute($stmt);

    // Récupération des résultats
    $resultat = mysqli_stmt_get_result($stmt);

    // Vérification des résultats
    if(mysqli_num_rows($resultat) > 0) {
        $ligne = mysqli_fetch_assoc($resultat);
        
        // Stockage des données de session
        $_SESSION["email"] = $ligne["email"];
        $_SESSION["mdp"] = $ligne["mdp"];
        $_SESSION["idu"] = $ligne["idu"];

        // Redirection vers la page d'accueil
        header("location:acceuil.php");
        exit(); // Assurez-vous de terminer le script après une redirection
    } else { 
        // Si les identifiants sont incorrects, afficher un message d'erreur
        echo "<h3>/!\ Compte inexistant ou erreur d'identifiant ou de mot de passe /!\</h3>";
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
        <h1>Gestionnaires De Tâches</h1><img src="img/check-list.png"width="50px" alt="">
        <div class="connec">
            <p class="message"> <span>Connexion</span></p>
            <div class="inputs">
                <input type="text" name="email" placeholder="Adresse mail"><br>
                <input type="password" name="mdp" placeholder="Mot de passe"><br><br>
            </div>
            <div align="center">
                <button type="submit" name="connexion">Se connecter</button><br><br><br>
                <a href="inscription.php" class="inscription">Vous n'avez pas encore de compte ?</a>
            </div>
            <br>
        </div>
    </form>  
    </center>  
</body>
</html>
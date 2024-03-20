<?php
session_start();



if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Initialisation des tentatives de connexion et du temps de blocage si non défini
if (!isset($_SESSION['tentatives_connexion'])) {
    $_SESSION['tentatives_connexion'] = 0;
    $_SESSION['temps_deblocage'] = time();
}

if (isset($_POST["connexion"])) {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('La validation CSRF a échoué.');
    }

     // Vérification du blocage après 3 tentatives
     if ($_SESSION['tentatives_connexion'] >= 3 && time() < $_SESSION['temps_deblocage']) {
        die("Trop de tentatives de connexion. Veuillez attendre 1 minute avant de réessayer.");
    }
    

    // Récupération des données du formulaire
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    // Crypter le mot de passe avec MD5
    $mdp_md5 = md5($mdp);

    // Connexion à la base de données
    $id = mysqli_connect("localhost:3306", "root", "", "tache");

    // Préparation de la requête
    $req = "SELECT * FROM utilisateur WHERE email=? AND mdp=?";
    $stmt = mysqli_prepare($id, $req);

    // Liaison des paramètres
    mysqli_stmt_bind_param($stmt, "ss", $email, $mdp_md5);

    // Exécution de la requête
    mysqli_stmt_execute($stmt);

    // Récupération des résultats
    $resultat = mysqli_stmt_get_result($stmt);

    // Vérification des résultats
    if(mysqli_num_rows($resultat) > 0) {

        $_SESSION['tentatives_connexion'] = 0;

        $ligne = mysqli_fetch_assoc($resultat);
        
        // Stockage des données de session
        $_SESSION["email"] = $ligne["email"];
        $_SESSION["mdp"] = $mdp_md5; // Stockage du mot de passe crypté en MD5
        $_SESSION["idu"] = $ligne["idu"];

        // Redirection vers la page d'accueil
        header("location:acceuil.php");
        exit(); // Assurez-vous de terminer le script après une redirection
    } else { 
        $_SESSION['tentatives_connexion'] += 1;
        if ($_SESSION['tentatives_connexion'] >= 3) {
            $_SESSION['temps_deblocage'] = time() + 60; // On bloque pendant 1 minute
            echo "Trop de tentatives de connexion. Veuillez attendre 1 minute avant de réessayer.";
        } else {
            echo "<h3>/!\ Compte inexistant ou erreur d'identifiant ou de mot de passe /!\</h3>";
        }
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
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
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
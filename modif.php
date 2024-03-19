<?php
session_start();
    $idtache = $_GET["idtache"];
    $id = mysqli_connect("localhost:3306","root","","tache");
    mysqli_query($id,"SET NAMES utf8"); 
    $req = "select * from liste where idtache=$idtache";
    $res= mysqli_query($id,$req);
    while($ligne=mysqli_fetch_assoc($res))
    {
        $commentaire=$ligne["commentaire"];
        $nature = $ligne['nature'];
        $date = $ligne['date'];
        $pseudo = $_SESSION["email"];
        $idu = $_SESSION['idu'];
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
    <link rel="stylesheet" href="css/modfi.css">
</head>
<body>
    <center>
    <h1>Modifier votre tache</h1><a href="acceuil.php"><img src="img/check-list.png"width="50px" alt=""></a>
    <div class="connec">        
    <form action="" method="post">
        <br><br>
        Saisir la nouvelle tache
        <br><br>
        <input type="text" name="commentaire" value="<?php echo $commentaire?>"> &nbsp;
        <input type="date" name="date" value="<?php echo $date ?>"><br>
        <select name="nature" class="nature">
                <?php
                    $id3 = mysqli_connect("localhost:3306","root","","tache");
                    $req3 = "select distinct nature from utile"; 
                    $resultat3= mysqli_query($id3,$req3);

                    while($ligne=mysqli_fetch_assoc($resultat3))
                    {
                        echo "<option $nature ' value='".$ligne["nature"]."'> ".$ligne["nature"]." </option>";
                    }
                ?>  
        </select>
        <br><br><br><br>
        <button type="submit" name="bouton">Modifier</button>
    </form>
    </div>
    </center> 
</body>
</html>
<?php
    if(isset($_POST["bouton"]))
    {
        $commentaire=mysqli_real_escape_string($id,$_POST["commentaire"]);//sert a de pas recup le commentaire du post juste au dessus
        $nature=mysqli_real_escape_string($id,$_POST["nature"]);
        $date=mysqli_real_escape_string($id,$_POST["date"]);
        $req = "delete from liste where idtache=$idtache";
        $res = mysqli_query($id,$req);
        $req = "insert into liste(commentaire,nature,date,idu) value('$commentaire','$nature','$date','$idu')";
        $res=mysqli_query($id,$req);
        header("refresh:2;url=acceuil.php");
    }
?>
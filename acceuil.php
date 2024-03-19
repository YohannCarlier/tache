<?php
    session_start();
    if(isset($_SESSION["idu"]))
    {
    ?>  
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>To do list</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <link rel="stylesheet" href="css/acceuil.css">
        </head>
        <body>
        <header>
            <div class="logo">
                <a title='Gestionnaire de Tâches' href="acceuil.php"><img src="img/check-list.png" width=50px alt="Logo du site"></a>
            </div>
            <div class="user-info">
                <a href="add.php"><img src="img/add.png" width=50px alt="" title="Ajouter une tâche"></a>
                <a href="user.php"><img src="img/user.png" width=40pxpx alt="compte" title="Mon compte"></a>
            </div>
            <a href="logout.php"><img src="img/logout.png" width=50px alt="logout" title="Déconnexion"></a>       
        </header><br><br>
        <a href="" class="date">Nous somme le <?php echo date('d/m/y') ?> </a>
        <table class="table">
        <thead>
            <tr>
                <th scope="col">@email</th>
                <th scope="col">Nature</th>
                <th scope="col">Commentaire(s)</th>
                <th scope="col">Echeance(s)</th>
                <th scope="col">Etat</th>
                <th scope="col">Actions</th>
                
            </tr>
        </thead>
        <style>
            .date{
                text-decoration: none;
                font-weight: 700;
                font-family: "Open Sans";
                font-size: 16px;
                color: #046690;
                line-height: 22px;
                min-width: 226px;
            }
        </style>

        
        <?php
        $id = mysqli_connect("127.0.0.1:3307","root","","tache");
        $idu = $_SESSION['idu'];
        $pseudo = $_SESSION['email'];
        $actu = date("Y-m-d");
        $req= mysqli_query($id,"select * from liste WHERE idu=$idu");

        while($ligne=mysqli_fetch_assoc($req)){
            if(($ligne["date"]) <= ($actu)){
                echo "<tr>
                <th scope='row'>".$pseudo."</th>
                <td>".$ligne["nature"]."</td>
                <td>".$ligne["commentaire"]."</td>
                <td>".$ligne["date"]."</td>
                <td>".$ligne["etat"]."</td>
                <td>";

                
                echo "<a title='Time OUT' href='timeout.php?idtache=".$ligne["idtache"]."'><img src='img/sablier.png' width=30></a>";
                


                echo "
                <a title='valider' href='valider.php?idtache=".$ligne["idtache"]."'><img src='img/valider.png' width=30></a>
                <a title='supprimer' href='delete.php?idtache=".$ligne["idtache"]."'><img src='img/supprimer.png' width=30></a>
                <a title='modifier' href='modif.php?idtache=".$ligne["idtache"]."'><img src='img/modif.png' width=30></a>
                    </td>
                </tr>";


            }else{
                echo "<tr>
                <th scope='row'>".$pseudo."</th>
                <td>".$ligne["nature"]."</td>
                <td>".$ligne["commentaire"]."</td>
                <td>".$ligne["date"]."</td>
                <td>".$ligne["etat"]."</td>
                <td>";

                if($ligne["etat"] == "En attente"){
                    echo "<a title='commencer' href='encours.php?idtache=".$ligne["idtache"]."'><img src='img/play.png' width=30></a>";
                }else if($ligne["etat"]=="En cours"){
                    echo "<a title='mettre en pause' href='pause.php?idtache=".$ligne["idtache"]."'><img src='img/pause.png' width=30></a>";
                }

                echo "
                <a title='valider' href='valider.php?idtache=".$ligne["idtache"]."'><img src='img/valider.png' width=30></a>
                <a title='supprimer' href='delete.php?idtache=".$ligne["idtache"]."'><img src='img/supprimer.png' width=30></a>
                <a title='modifier' href='modif.php?idtache=".$ligne["idtache"]."'><img src='img/modif.png' width=30></a>
                    </td>
                </tr>";

            }
            
        }
        ?> 
    </table>
        </body>
        </html>
    <?php
    }
    else
    {
    ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>pas co</title>
            <link rel="stylesheet" href="css/acceuil.css">
        </head>
        <body>
        <header>
            <div class="logo">
                <a href="acceuil.php"><img src="img/check-list.png" width=50px alt="Logo du site"></a>
            </div>
            <div class="user-info">
                <a href="user.php"><img src="user.png" width="50px" alt="Photo de l'utilisateur"></a>
                <a href="add.php"><img src="img/add.png" width="50px" alt="Bulle de conversation"></a>
            </div>
            <a href="index.php"><img src="img/login.png" width=80px alt="login"></a>       
        </header>
        </html>
    <?php
    }
    ?>

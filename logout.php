<link rel="stylesheet" href="css/login.css">

<center>
<h1>Gestion De Taches</h1><img src="img/check-list.png"width="50px" alt="">
<div class="connec">
<?php
session_start();
echo "<h1>Vous êtes déconnecté, redirection.....</h1>";
session_destroy();
header("refresh:3;url=index.php");
?>

</div>
</center>
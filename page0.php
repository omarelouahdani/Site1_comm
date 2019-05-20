<?php

	try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=gestion_net;charset=utf8', 'root', 'rootroot');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table jeux_video
	$nom=$_POST['nm'];
	$pw=$_POST['pw'];
	
	
  
$reponse2 = $bdd->query('SELECT * FROM users');
 while ($et= $reponse2->fetch()) { 
	  $cookie_name=$et['Email'];
	  $cookie_value=$et['password'];
 }
 setcookie($cookie_name,$cookie_value,time() + (3600 * 8 ));
 if($cookie_name==$nom && $pw==$cookie_value)
 {
	
 }
  else {       echo "tu es pas user ";
               header("location:index.php");
 }
		
		
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background-image:url('s.jpg');background-repeat:no-repeat;">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Gestion </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li >
          <a  href="afficher_client.php">client </a>
         
        </li>
        <li><a href="afficher_commande.php">commande</a></li>
        <li><a href="afficher_produit.php">produit</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="authentification.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        
      </ul>
    </div>
  </div>
</nav>
  


</body>
</html>

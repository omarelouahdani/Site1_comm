<?php
 
	try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=gestion_net;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table jeux_video
$reponse = $bdd->query('SELECT * FROM commande order by numCommande');

$reponse1 = $bdd->query("select numClient from client ");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background-image:url('l.jpg');background-repeat:no-repeat;color:white;font-weight:bold;font-size:15px;">
 <a  href="a.php" title="retour "> <img width="40cm" height="40cm" src="img12.gif" />  </a>
<div class="container">
  <table class="table">
    <thead>
      <tr>
        <th>numCommande</th>
        <th>numClient</th>
        <th>dateCommande</th>
		
      </tr>
    </thead>
    <tbody>
      
      <?php while ($em = $reponse->fetch()) {  ?>
	<tr>  <td>   <?php echo $em['numCommande'] ?> </td>
		<td>   <?php echo $em['numClient']  ?> </td>
				<td>   <?php echo $em['dateCommande']  ?> </td>
				<td>  <a  href="supprimer_commande.php?code=<?php echo $em['numCommande'] ?>" title="supprimer commande"> <img width="25cm" height="25cm" src="img10.png" />  </a> </td>
				<td>  <a  href="modifier_commandee.php?code=<?php echo $em['numCommande'] ?>" title="modifier commande"> <img width="25cm" height="25cm" src="img11.png" />  </a> </td>
			
				
				
	  <?php }  ?>
    </tbody>
  </table>
</div>
<div style="size:10cm">

<div class="container" style="float:left;width:30cm;">
  <h2>Gestion</h2>
  <form class="form-horizontal" action="ajouter_commande.php" method="POST">

    <div class="form-group">
      <label class="control-label col-sm-2" for="email"> num commande :</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" name="num" style="width:6cm;" placeholder="num commande " />
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="email"> num client :</label>
      <div class="col-sm-10">
        <select name="numm" size="1cm" style="width:6cm;margin-bottom:1cm;color:black;" > 
			<?php while ($ej= $reponse1->fetch()) { ?>
			<option><?php echo $ej['numClient'] ?></option>
	  
 <?php } ?></select>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="email"> date commande :</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" name="date" style="width:6cm;" placeholder="date commande " />
      </div>
    </div>
	</div>
	<div style="float:right;">  
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
      <table><tr>   <input type="submit" class="btn btn-secondary btn-lg" style="width:4cm;margin-right:10cm;margin-top:-08cm;color:blue;" value="ajouter">  </form></tr> 
		<tr>  <form action="actualiser_commande.php" method="POST"></tr> 
       </tr> <input type="submit" class="btn btn-primary btn-lg" style="width:4cm;margin-right:10cm;margin-top:-06cm;" value=" actualiser"/></form> </tr></table>
      </div>
    </div>
	 </div>
 
     

 

</div>

</body>
</html>

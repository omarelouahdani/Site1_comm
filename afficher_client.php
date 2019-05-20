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
$reponse = $bdd->query('SELECT * FROM client order by numClient');


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
        <th>numclient</th>
        <th>nomclient</th>
        <th>raisonSocial</th>
		<th>adresseclient</th>
        <th>villeclient</th>
        <th>pays</th>
		 <th>telephone</th>
      </tr>
    </thead>
    <tbody>
      
      <?php while ($ett = $reponse->fetch()) {  ?>
	<tr>  <td>   <?php echo $ett['numClient'] ?> </td>
		<td>   <?php echo $ett['nomClient']  ?> </td>
				<td>   <?php echo $ett['raisonSocial']  ?> </td>
				<td>   <?php echo $ett['adresseClient']  ?> </td>
				<td>   <?php echo $ett['VilleClient']  ?> </td>
				<td>   <?php echo $ett['pays']  ?> </td>
				<td>   <?php echo $ett['telephone']  ?> </td>
			<td>  <a  href="supprimer_client.php?code=<?php echo $ett['numClient'] ?>" title="supprimer client"> <img width="25cm" height="25cm" src="img10.png" />  </a> </td>
			<td>  <a  href="modifier_clientt.php?code=<?php echo $ett['numClient'] ?>" title="modifier client"> <img width="25cm" height="25cm" src="img11.png" />  </a> </td>	
				
	  <?php }  ?>
    </tbody>
  </table>
</div>
<div style="size:10cm">

<div class="container" style="float:left;width:21cm;">
  <h2>Gestion</h2>
  <form class="form-horizontal" action="ajouter_client.php" method="POST">
  <div class="form-group">
      <label class="control-label col-sm-2" for="email">numero Client:</label>
      <div class="col-sm-10">
        <input type="text" style="width:6cm;" class="form-control" name="num" placeholder="Enter numero" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">nom Client:</label>
      <div class="col-sm-10">
        <input type="text" style="width:6cm;" class="form-control" name="nom" placeholder="Enter nom" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">raison Social :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" style="width:6cm;" name="raison" placeholder="raison social " />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email"> adresse client :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="adresse" style="width:6cm;" placeholder="adresse client " />
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="email"> ville client :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="ville" style="width:6cm;" placeholder="ville client " />
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="email"> pays :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="pays" style="width:6cm;" placeholder="pays " />
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="email">telephone :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="telephone"  style="width:6cm;" placeholder="telephone " />
      </div>
    </div>
	</div>
	<div style="float:right;">  
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <table> <tr>  <input type="submit" class="btn btn-secondary btn-lg" style="width:4cm;margin-right:10cm;margin-top:-17cm;color:blue;" value="ajouter">  </form></tr>
		 <form action="actualiser_client.php" method="POST">
		<tr>  </tr>
       <tr> <input type="submit"  class="btn btn-primary btn-lg" style="width:4cm;margin-right:10cm;margin-top:-15cm;" value=" actualiser"/></form> </tr></table>
      </div>
    </div>
  </form>
   </div>

</div>



</body>
</html>

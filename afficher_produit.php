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
$reponse = $bdd->query('SELECT * FROM produit order by refProduit');


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
        <th>refProduit</th>
        <th>nomProduit</th>
        <th>prixUnitaire</th>
		 <th>qteStockee</th>
        <th>indisponibile</th>
        
		
      </tr>
    </thead>
    <tbody>
      
     <?php while ($es = $reponse->fetch()) {  ?>
	<tr>  <td>   <?php echo $es['refProduit'] ?> </td>
		<td>   <?php echo $es['nomProduit']  ?> </td>
				<td>   <?php echo $es['prixUnitaire']  ?> </td>
				<td>   <?php echo $es['qteStockee']  ?> </td>
				<td>   <?php echo $es['indisponible']  ?> </td>
				<td>  <a  href="supprimer_produit.php?code=<?php echo $es['refProduit'] ?>" title="supprimer produit"> <img width="25cm" height="25cm" src="img10.png" />  </a> </td>
				<td>  <a  href="modifier_produitt.php?code=<?php echo $es['refProduit'] ?>" title="modifier produit"> <img width="25cm" height="25cm" src="img11.png" />  </a> </td>
				
				
	  <?php }  ?>
    </tbody>
  </table>
</div>
<div style="size:10cm">

<div class="container" style="float:left;width:21cm;">
  <h2>Gestion</h2>
  <form class="form-horizontal" action="ajouter_produit.php" method="POST">
  <div class="form-group">
      <label class="control-label col-sm-2" for="email">ref produit:</label>
      <div class="col-sm-10">
        <input type="text" style="width:6cm;" class="form-control" name="ref" placeholder="ref produit" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">nom produit:</label>
      <div class="col-sm-10">
        <input type="text" style="width:6cm;" class="form-control" name="nomp" placeholder="nom produit" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">prix unitaire :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" style="width:6cm;" name="prix" placeholder="prix unitaire " />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email"> qte stockee :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="qte" style="width:6cm;" placeholder="qte stockee" />
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="email"> indisponible :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="indis" style="width:6cm;" placeholder="indisponible " />
      </div>
    </div>
	</div>
	<div style="float:right;">  
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <table> <tr>   <input type="submit" class="btn btn-secondary btn-lg" style="width:4cm;margin-right:10cm;margin-top:-8cm;color:blue;" value="ajouter">  </form> </tr> 
		<tr>  <form action="actualiser_produit.php" method="POST"></tr>
		
       </tr> <input type="submit" class="btn btn-primary btn-lg" style="width:4cm;margin-right:10cm;margin-top:-6cm;" value=" actualiser"/></form></tr></table>
      </div>
    </div>
	 </div>


</div>

</body>
</html>

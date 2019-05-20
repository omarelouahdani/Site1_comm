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
	$code=$_GET['code'];
	$reponse = $bdd->query("select * from produit where (refProduit=$code) ");
    $ed = $reponse->fetch();


?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>authentification</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <style type="text/css">
      body{
        background-image: url(d.jpg);
        background-size: cover;
        color: white;
        background-repeat: no-repeat;
        background-position: center; 
        background-attachment: fixed;
      }
      form{
        background: rgba(45, 45, 125, 0.58);
        color: white;
        padding: 40px;
        margin-top: 180px;
        padding-bottom: 60px;
        box-shadow: 10px 10px 5px rgba(6, 1, 1, 0.43)
      }
      h1{
        text-align: center;
      }
      .btn{
        width: 100%;
        border-radius: 0px;
        
      }
      .form-control{
        border-radius: 0px;
        background-color: rgba(23, 3, 3, 0.48);
        color: white;
        border-radius:1px solid #291212
      }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   
  </head>
  <body>
    

      <div class="container" >
        <div class="row" >
         <div class="container" style="width:24cm;">
            <form action="modifier_produit.php" method="POST">
			<h1> modification : </h1>
            <div class="form-group">
      <label class="control-label col-sm-2" for="email">ref produit:</label>
      <div class="col-sm-10">
        <input type="text" style="width:6cm;" class="form-control" name="ref" value="<?php echo($ed['refProduit']) ?>" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">nom produit:</label>
      <div class="col-sm-10">
        <input type="text" style="width:6cm;" class="form-control" name="nomp" value="<?php echo($ed['nomProduit']) ?>" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">prix unitaire :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" style="width:6cm;" name="prix" value="<?php echo($ed['prixUnitaire']) ?>" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email"> qte stockee :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="qte" style="width:6cm;" value="<?php echo($ed['qteStockee']) ?>" />
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-2" for="email"> indisponible :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="indis" style="width:6cm;" value="<?php echo($ed['indisponible']) ?>" />
      </div>
    </div>
			  <br>
			  
              <br>
              
              <input type="submit" style="margin-top:4cm;width:12cm;" class="btn btn-primary btn-block" style="color:blue;font-weight:bold;font-size:30px;" value="modifier" />
            </form>
          </div>
        </div>
      </div>


  </body>
</html>
<?php

	$bdd = mysql_connect("localhost","root","") or die (mysql_error());
	mysql_select_db("gestion_net",$bdd) or die (mysql_error());
	$code=$_POST['ref'];
	$nom=$_POST['nomp'];
	$prix=$_POST['prix'];
	$qte=$_POST['qte'];
	$indis=$_POST['indis'];
	
    $req=" update  produit set nomProduit='$nom',prixUnitaire='$prix',qteStockee='$qte',indisponible='$indis'  where refProduit=$code";
mysql_query($req) or die(mysql_error());
header("location:afficher_produit.php");
?>

<?php

	$bdd = mysql_connect("localhost","root","") or die (mysql_error());
	mysql_select_db("gestion_net",$bdd) or die (mysql_error());
	$ref=$_POST['ref'];
	$nom=$_POST['prx_N'];
	$prix=$_POST['prix'];
	$qte=$_POST['qte'];
	$indis=$_POST['indis'];
	
    $req=" insert into produit (refProduit,nomProduit,prixUnitaire,qteStockee,indisponible) values ('$ref','$nom','$prix','$qte','$indis')";
mysql_query($req) or die(mysql_error());
header("location:afficher_produit.php");
?>

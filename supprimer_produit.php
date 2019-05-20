<?php

	$bdd = mysql_connect("localhost","root","") or die (mysql_error());
	mysql_select_db("gestion_net",$bdd) or die (mysql_error());
	$code=$_GET['code'];
	
    $req="delete from produit where (refProduit=$code) ";
mysql_query($req) or die(mysql_error());
header("location:afficher_produit.php");
require_once("afficher_produit.php");
?>
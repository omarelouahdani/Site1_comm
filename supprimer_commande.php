<?php

	$bdd = mysql_connect("localhost","root","") or die (mysql_error());
	mysql_select_db("gestion_net",$bdd) or die (mysql_error());
	$code=$_GET['code'];
	
    $req="delete from commande where (numCommande=$code) ";
mysql_query($req) or die(mysql_error());
header("location:afficher_commande.php");
require_once("afficher_commande.php");
?>
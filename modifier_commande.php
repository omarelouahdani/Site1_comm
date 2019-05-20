<?php

	$bdd = mysql_connect("localhost","root","") or die (mysql_error());
	mysql_select_db("gestion_net",$bdd) or die (mysql_error());
	$code=$_POST['num'];
	$numm=$_POST['numm'];
	$da=$_POST['date'];
	$req=" update  commande set numCommande='$code', numClient='$numm' ,dateCommande='$da' where numCommande='$code' ";
mysql_query($req) or die(mysql_error());
header("location:afficher_commande.php");
?>
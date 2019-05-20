<?php

	$bdd = mysql_connect("localhost","root","") or die (mysql_error());
	mysql_select_db("gestion_net",$bdd) or die (mysql_error());
	$numc=$_POST['num'];
	$num=$_POST['numm'];
	$dt=$_POST['date'];
    $req=" insert into commande (numCommande,numClient,dateCommande) values ('$numc','$num','$dt')";
mysql_query($req) or die(mysql_error());
header("location:afficher_commande.php");
?>

<?php

	$bdd = mysql_connect("localhost","root","") or die (mysql_error());
	mysql_select_db("gestion_net",$bdd) or die (mysql_error());
	$num=$_POST['num'];
	$nom=$_POST['nom'];
	$raison=$_POST['raison'];
	$adresse=$_POST['adresse'];
	$ville=$_POST['ville'];
	$pays=$_POST['pays'];
	$telephone=$_POST['telephone'];
    $req=" update  client set nomClient='$nom',raisonSocial='$raison',adresseClient='$adresse',VilleClient='$ville',pays='$pays',telephone='$telephone'  where numClient=$num ";

mysql_query($req) or die(mysql_error());
header("location:afficher_client.php");
?>


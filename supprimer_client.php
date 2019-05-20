<?php

	$bdd = mysql_connect("localhost","root","rootroot") or die (mysql_error());
	mysql_select_db("gestion_net",$bdd) or die (mysql_error());
	$code=$_GET['code'];
	
    $req="delete from client where (numClient=$code) ";
mysql_query($req) or die(mysql_error());
header("location:afficher_client.php");
require_once("afficher_client.php");
?>
<?php
	include('connectionDB.php');

	$lid = $_POST['lid'];
	$nom = $_POST['nom'];
	
	$nomupper = strtoupper($nom);
	
	$sql = "UPDATE CMS_".$nomupper." SET ".$nom."_valide = 0 WHERE ".$nom."_id=".$lid."";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
	mysql_close();
?>
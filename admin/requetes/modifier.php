<?php
	include('connectionDB.php');

	$lid = $_POST['lid'];
	$nom = $_POST['nom'];
	
	$nomupper = strtoupper($nom);
	
	$sql = 'SELECT '.$nom.'_id, '.$nom.'_nom as lenom FROM T_'.$nomupper.' WHERE '.$nom.'_valide = 1 and '.$nom.'_id = '.$lid;
	$reponse = mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
	
	$row=mysql_fetch_array($reponse);
	
	echo $row[lenom];
	
	mysql_close();
?>
<?php
	include('connectionDB.php');
	$elementid = $_POST['actuid'];
	$elementnom = $_POST['elementnom'];
	$elementnomupper = strtoupper($elementnom);
	
	if(isset($_POST['nomFichier'])) {
		$nom = trim($_POST['nomFichier']);
		$sql = 'UPDATE CMS_'.$elementnomupper.' SET '.$elementnomupper.'_CONTENU = "'.$nom.'", '.$elementnomupper.'_LIBELLE = "'.$nom.'" WHERE '.$elementnomupper.'_ID = '. $elementid .'';
		mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
		mysql_close();
	}
	header('Location: ../cms.php');
?>
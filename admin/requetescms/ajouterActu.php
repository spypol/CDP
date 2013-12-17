<?php
	include('connectionDB.php');

	if(isset($_POST['nomContenu'])) {

		$nomContenu = trim($_POST['nomContenu']);
		
		$sql = 'INSERT INTO CMS_ACTUALITE (ACTUALITE_CONTENU, ACTUALITE_LIBELLE, ACTUALITE_VALIDE) VALUES ("'.$nomContenu.'", "'.$nomContenu.'", "1")';		
	
		mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
		mysql_close();
	}
	header('Location: ../cms.php');
?>
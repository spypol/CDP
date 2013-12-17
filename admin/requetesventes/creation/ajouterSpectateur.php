<?php
	include('../../connectionDB.php');

	if(isset($_POST['nomSpectateur'])) {

		$nomSpectateur = trim($_POST['nomSpectateur']);
		$prenomSpectateur = trim($_POST['prenomSpectateur']);
		$mailSpectateur = $_POST['mailSpectateur'];
		$telSpectateur = $_POST['telSpectateur'];

		if(isset($_POST['spectateurid']) && $_POST['spectateurid'] != ''){
			$sql = 'UPDATE T_SPECTATEUR SET SPECTATEUR_NOM ="'.$nomSpectateur.'", SPECTATEUR_PRENOM = "'.$prenomSpectateur.'", SPECTATEUR_MAIL = "'.$mailSpectateur.'", SPECTATEUR_TEL = "'.$telSpectateur.'" WHERE SPECTATEUR_ID = "'.$_POST['spectateurid'].'"';
		}else{
			$sql = 'INSERT INTO T_SPECTATEUR (SPECTATEUR_NOM, SPECTATEUR_PRENOM, SPECTATEUR_MAIL, SPECTATEUR_TEL) VALUES ("'.$nomSpectateur.'", "'.$prenomSpectateur.'", "'.$mailSpectateur.'", "'.$telSpectateur.'")';
		}
		
		mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
		mysql_close();
	}
	header('Location: ../../vente.php');
?>
<?php
	include('../../connectionDB.php');

	if(isset($_POST['nomSalle'])) {

		$nomSalle = trim($_POST['nomSalle']);
		$capaciteSalle = trim($_POST['capaciteSalle']);
		$adresseSalle = $_POST['adresseSalle'];
		$telSalle = $_POST['telSalle'];

		if(isset($_POST['salleid']) && $_POST['salleid'] != ''){
			$sql = 'UPDATE T_SALLE SET SALLE_NOM ="'.$nomSalle.'", SALLE_CAPACITE = "'.$capaciteSalle.'", SALLE_ADRESSE = "'.$adresseSalle.'", SALLE_TEL = "'.$telSalle.'" WHERE SALLE_ID = "'.$_POST['salleid'].'"';
		}else{
			$sql = 'INSERT INTO T_SALLE (SALLE_NOM, SALLE_CAPACITE, SALLE_ADRESSE, SALLE_TEL) VALUES ("'.$nomSalle.'", "'.$capaciteSalle.'", "'.$adresseSalle.'", "'.$telSalle.'")';
		}
		
		mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
		mysql_close();
	}
	header('Location: ../../vente.php');
?>
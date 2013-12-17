<?php
	include('../../connectionDB.php');

	function switchDate($frenchDate){
		$frenchDate = explode('/', $frenchDate);
		$dates = $frenchDate[2].'-'.$frenchDate[1].'-'.$frenchDate[0];
		return $dates;
	}

	if(isset($_POST['nomSalle'])) {

		$idSalle = trim($_POST['nomSalle']);
		$dateSeance = trim($_POST['dateSeance']);
		$heureSeance = trim($_POST['heureSeance']);
		$minuteSeance = trim($_POST['minuteSeance']);
		
		$sql = 'INSERT INTO T_SEANCE (SEANCE_SALLE_ID, SEANCE_DATE, SEANCE_HEURE) VALUES ('.$idSalle.', "'.trim(switchDate($dateSeance)).'", "'.$heureSeance.':'.$minuteSeance.'")';
		mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
		mysql_close();
	}
	header('Location: ../../vente.php');
?>
<?php
	include('../../connectionDB.php');

	function switchDate($frenchDate){
		$frenchDate = explode('/', $frenchDate);
		$dates = $frenchDate[2].'-'.$frenchDate[1].'-'.$frenchDate[0];
		return $dates;
	}

	if(isset($_POST['nomSalle'])) {

		$idSalle = trim($_POST['nomSalle']);
        $idSpectacle = trim($_POST['nomSpectacle']);
		$dateSeance = trim($_POST['dateSeance']);
		$heureSeance = trim($_POST['heureSeance']);
		$minuteSeance = trim($_POST['minuteSeance']);
		
		$sql = 'INSERT INTO T_SEANCE (SEANCE_SALLE_ID, SEANCE_DATE, SEANCE_HEURE, SEANCE_SPECTACLE_ID) VALUES ('.$idSalle.', "'.trim($dateSeance).'", "'.$heureSeance.':'.$minuteSeance.'", "'.$idSpectacle.'")';
		mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
		mysql_close();
	}
	header('Location: ../../vente.php');
?>
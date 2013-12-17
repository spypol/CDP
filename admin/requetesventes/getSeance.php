<?php
	include('./connectionDB.php');

	$sqlseances = 'SELECT SEANCE_ID as id, SEANCE_DATE as ladate, SEANCE_HEURE as heure, SALLE_NOM as sallenom, SEANCE_COMPLETE as complete FROM T_SEANCE, T_SALLE WHERE SEANCE_SALLE_ID = SALLE_ID';
	$reponseSeances = mysql_query ($sqlseances) or die ('Erreur SQL !'.$sqlseances.'<br />'.mysql_error());

	mysql_close();
?>
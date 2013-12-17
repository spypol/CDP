<?php
	include('./connectionDB.php');

	$sqlseances = 'SELECT CD_ID as id, FROM T_SEANCE, T_SALLE WHERE SEANCE_SALLE_ID = SALLE_ID';
	$reponseSeances = mysql_query ($sqlseances) or die ('Erreur SQL !'.$sqlseances.'<br />'.mysql_error());

	mysql_close();
?>
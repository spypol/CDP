<?php
	include('connectionDB.php');

	$listupper = strtoupper($list);

	$sql = 'SELECT spectateur_mail as mail FROM T_SPECTATEUR, T_PLACE WHERE Place_achete =1 AND Place_spectateur_id = spectateur_id';
	$reponse = mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());

	while ($row=mysql_fetch_array($reponse)){
		echo $row['mail'].', ';
	}
	mysql_close();
?>
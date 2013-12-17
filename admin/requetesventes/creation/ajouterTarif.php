<?php
	include('../../connectionDB.php');

	if(isset($_POST['nomTarif'])) {

		$nomTarif = trim($_POST['nomTarif']);

		if(isset($_POST['tarifid']) && $_POST['tarifid'] != ''){
			$sql = 'UPDATE T_TARIF SET TARIF_NOM ="'.$nomTarif.'" WHERE TARIF_ID = "'.$_POST['tarifid'].'"';
		}else{
			$sql = 'INSERT INTO T_TARIF (TARIF_NOM) VALUES ("'.$nomTarif.'")';
		}
		mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
		mysql_close();
	}
	header('Location: ../../vente.php');
?>
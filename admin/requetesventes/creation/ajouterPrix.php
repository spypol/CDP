<?php
	include('../../connectionDB.php');

	if(isset($_POST['prix'])) {

		$prix = trim($_POST['prix']);
		$idSalle = trim($_POST['nomSalle']);
		$idTarif = trim($_POST['nomTarif']);

		$sql = 'SELECT PRIX_ID FROM T_PRIX WHERE PRIX_SALLE_ID = '.$idSalle.' AND PRIX_TARIF_ID = '.$idTarif.'';
		$reponsePrix = mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
		
		$leprix = mysql_fetch_array($reponsePrix);
		
		if($leprix['PRIX_ID'] != ''){
			$sql = 'UPDATE T_PRIX SET PRIX_VALEUR = ' .$prix. ' WHERE PRIX_SALLE_ID = '.$idSalle.' AND PRIX_TARIF_ID = '.$idTarif.'';
			mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
			mysql_close();
		} else {
			$sql = 'INSERT INTO T_PRIX (PRIX_VALEUR, PRIX_SALLE_ID, PRIX_TARIF_ID) VALUES ('.$prix.', '.$idSalle.', '.$idTarif.')';
			mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
			mysql_close();
		}
	}
	header('Location: ../../vente.php');
?>
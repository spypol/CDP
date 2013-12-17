<?php
	include('../../connectionDB.php');
	
	$lid = $_POST['lid'];
	
	$sql = 'SELECT SALLE_ID as id, SALLE_NOM as nom, SALLE_CAPACITE as capacite, SALLE_ADRESSE as adresse, SALLE_TEL as tel FROM T_SALLE WHERE SALLE_ID = '. $lid;
	$reponse = mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
        $row = mysql_fetch_array($reponse);
		$nom = utf8_encode($row['nom']);
		$adresse = utf8_encode($row['adresse']);
		
		echo $row['id'] . '_' . $nom . '_' . $row['capacite'] . '_' . $adresse . '_' . $row['tel'];
	mysql_close();
?>
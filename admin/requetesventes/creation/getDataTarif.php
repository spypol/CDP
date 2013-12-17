<?php
	include('../../connectionDB.php');
	
	$lid = $_POST['lid'];
	
	$sql = 'SELECT TARIF_ID as id, TARIF_NOM as nom FROM T_TARIF WHERE TARIF_ID = '. $lid;
	$reponse = mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
        $row = mysql_fetch_array($reponse);
		$nom = utf8_encode($row['nom']);
		echo $row['id'] . '_' . $nom;
	mysql_close();
?>
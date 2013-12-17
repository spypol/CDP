<?php
	include('../../connectionDB.php');
	
	$lid = $_POST['lid'];
	
	$sql = 'SELECT SPECTATEUR_ID as id, SPECTATEUR_NOM as nom, SPECTATEUR_MAIL as mail, SPECTATEUR_PRENOM as prenom, SPECTATEUR_TEL as tel FROM T_SPECTATEUR WHERE SPECTATEUR_ID = '. $lid;
	$reponse = mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
      $row = mysql_fetch_array($reponse);
		$nom = utf8_encode($row['nom']);
		$prenom = utf8_encode($row['prenom']);
		echo $row['id'] . '_' . $nom . '_' . $prenom . '_' . $row['mail'] . '_' . $row['tel'];
	mysql_close();
?>
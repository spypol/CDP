<?php
	include('../../connectionDB.php');

	if(isset($_POST['idseance'])) {

		$idseance = trim($_POST['idseance']);
		
		$sqlseance = 'SELECT SEANCE_COMPLETE as complete FROM T_SEANCE WHERE SEANCE_ID = '.$idseance .'';
		$reponseSeance = mysql_query ($sqlseance) or die ('Erreur SQL !'.$sqlseance.'<br />'.mysql_error());
		
		$row=mysql_fetch_array($reponseSeance);
		$complete = $row['complete'];
		
		if ($complete == 1){
			
			$sql = 'UPDATE T_SEANCE SET SEANCE_COMPLETE = 0 WHERE SEANCE_ID = '.$idseance .''; 
			echo '0';
		} else {
		
			$sql = 'UPDATE T_SEANCE SET SEANCE_COMPLETE = 1 WHERE SEANCE_ID = '.$idseance .''; 
			echo '1';
		}
		
		mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
		mysql_close();
	}
?>
<?php
	include('../../connectionDB.php');
	
	$sqlsalles = 'SELECT SALLE_ID as id, SALLE_NOM as nom FROM T_SALLE';
	$reponseSalles = mysql_query ($sqlsalles) or die ('Erreur SQL !'.$sqlsalles.'<br />'.mysql_error());
	
	$sqltarifs = 'SELECT TARIF_ID as id, TARIF_NOM as nom FROM T_TARIF';
	$reponseTarifs = mysql_query ($sqltarifs) or die ('Erreur SQL !'.$sqltarifs.'<br />'.mysql_error());
?>
	<style>
		#tableprix{
			border-width:0px; 
			border-style:none; 
			border-color:black;
			width:310px;
		}

		.tdprix{ 
			border-width:1px;
			border-style:solid; 
			border-color:#666;
			width:50%;
		}
	</style>
<?php	
	echo "<table id='tableprix'>";
	echo "<tr><td class='tdprix'></td>";
	while ($row1=mysql_fetch_array($reponseSalles)){ 
		echo '<td class="tdprix">'.$row1['nom'].'</td>';
    }
	echo "</tr>";
	
	while ($row2=mysql_fetch_array($reponseTarifs)){ 
		echo '<tr><td class="tdprix">'.$row2['nom'].'</td>';
		$sqlsalles = 'SELECT SALLE_ID as id, SALLE_NOM as nom FROM T_SALLE';
		$reponseSalles = mysql_query ($sqlsalles) or die ('Erreur SQL !'.$sqlsalles.'<br />'.mysql_error());
		while ($row3=mysql_fetch_array($reponseSalles)){
			$sql = 'SELECT PRIX_ID, PRIX_VALEUR as valeur FROM T_PRIX WHERE PRIX_SALLE_ID = '.$row3['id'].' AND PRIX_TARIF_ID = '.$row2['id'].'';
			$reponsePrix = mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
			$row=mysql_fetch_array($reponsePrix);
			echo '<td class="tdprix">'.$row['valeur'].'</td>';
   		}
		echo "</tr>";
    }
	echo "</table>";
?>
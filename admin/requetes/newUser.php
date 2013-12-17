<?php
	include('connectionDB.php');

	$sql = 'SELECT user_id, user_nom, user_prenom FROM T_USER WHERE user_valide = 0';
	$reponse = mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());

	if(mysql_num_rows($reponse) > 0){
		echo "<span style='font-size:10px;'>Utilisateurs &agrave; valider</span><br />";
	}

	while ($row=mysql_fetch_array($reponse)){
	?>
		<span id="<?php echo $row[user_id]; ?>" class="" style="font-size:9px;">
			<?php echo $row[user_nom]." ".$row[user_prenom]; ?>
			<img src="images/valid.png" name="valider" width="9" class="user_a_valider" id="<?php echo $row[user_id]; ?>" style="cursor:pointer;"/>
			<br />
		</span>

	<?php
	}

	mysql_close();
?>
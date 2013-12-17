<?php
	include('connectionDB.php');

	$listupper = strtoupper($list);

	$sql = 'SELECT '.$list.'_id as id, '.$list.'_nom as nom, '.$list.'_lien as lien FROM T_'.$listupper.' WHERE '.$list.'_valide = 1 order by '.$list.'_nom desc';
	$reponse = mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());

	while ($row=mysql_fetch_array($reponse)){
	?>
	<li id="<?php echo $list.'_'.$row['id']; ?>" class="survol">
		<a href="<?php echo $row['lien']; ?>" target="_blank"><?php echo $row['nom']; ?></a>
		
		<?php if($isAdmin == 1){ ?>
			<img src="images/crayon.png" name="modifier" alt="modifier" width="10" style="cursor:pointer; display:none;" class="modifier" id="<?php echo 'modifier_'.$list.'_'.$row['id']; ?>"/>
			<img src="images/delete.gif" name="supprimer" alt="supprimer" width="10" style="cursor:pointer; display:none;" class="delete" id="<?php echo 'delete_'.$list.'_'.$row['id']; ?>"/>
		<?php } ?>
	</li>
	<?php
	}
	mysql_close();
?>
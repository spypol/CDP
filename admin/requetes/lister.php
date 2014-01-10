<?php
	include('connectionDB.php');
	
	$listupper = strtoupper($list);

	$sql = 'SELECT '.$list.'_id as id, '.$list.'_nom as nom, '.$list.'_lien as lien, '.$list.'_cat as cat, '.$list.'_fichier as fichier FROM T_'.$listupper.' WHERE '.$list.'_valide = 1';
	$reponse = mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());

	while ($row=mysql_fetch_array($reponse)){
	?>
	<li id="<?php echo $list.'_'.$row['id']; ?>" class="survol">
		<?php if($row['cat'] == 1){ 
			/*$http = strpos($row[lien], 'http');
			if($http == false){
				$lien = 'http://' . $row[lien];
			}else{*/
				$lien = $row['lien'];
			/*}*/
		?>
			<a href="<?php echo $lien; ?>" target="_blank"><?php echo $row['nom']; ?></a>
		<?php }else{ ?>
			<a href="<?php echo $row['fichier']; ?>" target="_blank"><?php echo $row['nom']; ?></a>
		<?php } ?>
		<?php if($isAdmin == 1){ ?>
			<!--<img src="images/crayon.png" name="modifier" alt="modifier" width="10" style="cursor:pointer; display:none;" class="modifier" id="--><?php //echo 'modifier_'.$list.'_'.$row['id']; ?><!--"/>-->
			<img src="images/delete.gif" name="supprimer" alt="supprimer" width="10" style="cursor:pointer; display:none;" class="delete" id="<?php echo 'delete_'.$list.'_'.$row['id']; ?>"/>
		<?php } ?>
	</li>
	<?php
	}
	mysql_close();
?>
<?php

include('connectionDB.php');
$sqlseances = 'SELECT SEANCE_ID as seanceid, SEANCE_DATE as ladate, SEANCE_HEURE as heure, SALLE_NOM as sallenom FROM T_SEANCE, T_SALLE WHERE SEANCE_SALLE_ID = SALLE_ID ORDER BY SEANCE_DATE';
$reponseSeances = mysql_query ($sqlseances) or die ('Erreur SQL !'.$sqlseances.'<br />'.mysql_error());

$sqlPrixAdulte = 'SELECT PRIX_VALEUR FROM T_PRIX WHERE PRIX_TARIF_ID = 1 AND PRIX_SALLE_ID = 2';
$prixAdulte = mysql_query ($sqlPrixAdulte) or die ('Erreur SQL !'.$sqlPrixAdulte.'<br />'.mysql_error());
$prixAdulte = mysql_fetch_array($prixAdulte);
$prixAdulte = $prixAdulte['PRIX_VALEUR'];

$sqlPrixReduit = 'SELECT PRIX_VALEUR FROM T_PRIX WHERE PRIX_TARIF_ID = 4 AND PRIX_SALLE_ID = 2';
$prixReduit = mysql_query ($sqlPrixReduit) or die ('Erreur SQL !'.$sqlPrixReduit.'<br />'.mysql_error());
$prixReduit = mysql_fetch_array($prixReduit);
$prixReduit = $prixReduit['PRIX_VALEUR'];

$sqlPrixEnfant = 'SELECT PRIX_VALEUR FROM T_PRIX WHERE PRIX_TARIF_ID = 2 AND PRIX_SALLE_ID = 2';
$prixEnfant = mysql_query ($sqlPrixEnfant) or die ('Erreur SQL !'.$sqlPrixEnfant.'<br />'.mysql_error());
$prixEnfant = mysql_fetch_array($prixEnfant);
$prixEnfant = $prixEnfant['PRIX_VALEUR'];

?>

<!--- FORM D'AJOUT DE PLACE ACHETEES -->
<form action="requetesventes/creation/ajouterPlace.php" class='venteForm' method="post" id="ajouterPlaceAchetee" enctype="multipart/form-data" style="background-color:#DDD; width:400px;">
     <img src="images/delete.gif" name="fermer" alt="Fermer" width="15" class="closeBox"/>
	<h3 class="titreform">Ajouter une place</h3>

	<div class="ligne">
		<label for="nomSpectateur">Nom : </label><input type="text" name="nomSpectateur" size="40" id="nomSpectateur" value=""/>
	</div>
	<div class="ligne">
		<label for="prenomSpectateur">Pr&eacute;nom : </label><input type="text" name="prenomSpectateur" size="40" id="prenomSpectateur" value=""/>
	</div>
	<div class="ligne">
		<label for="mailSpectateur">Mail : </label><input type="text" name="mailSpectateur" size="40" id="mailSpectateur" value=""/>
	</div>
	<div class="ligne">
		<label for="telSpectateur">T&eacute;l&eacute;phone : </label><input type="text" name="telSpectateur" size="40" id="telSpectateur" value=""/>
	</div>
	<div class="ligne">
		<label for="nbtarifadulte" style="width:230px; padding-right:10px;"> Nombre de places adulte : </label>
		<select name="nbtarifadulte" id="nbtarifadulte">
			<option value="0">0</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
		</select>
		<?php echo 'x '.$prixAdulte.' &euro;'; ?>
	</div>
	<div class="ligne">
		<label for="nbtarifreduit" style="width:230px; padding-right:10px;"> Nombre de places r&eacute;duit : </label>
		<select name="nbtarifreduit" id="nbtarifreduit">
			<option value="0">0</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
		</select>
		<?php echo 'x '.$prixReduit.' &euro;'; ?>
	</div>
	<div class="ligne">
		<label for="nbtarifenfant" style="width:230px; padding-right:10px;"> Nombre de places enfant (-12 ans) : </label>
		<select name="nbtarifenfant" id="nbtarifenfant">
			<option value="0">0</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
		</select>
		<?php echo 'x '.$prixEnfant.' &euro;'; ?>
	</div>
	<div class="ligne">
		<label for="nbtarifinvitation" style="width:230px; padding-right:10px;"> Nombre de places Invitation : </label>
		<select name="nbtarifinvitation" id="nbtarifinvitation">
			<option value="0">0</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
		</select>
		<?php echo 'x 0 &euro;'; ?>
	</div>
	<div class="ligne">
		<label for="idseance" style="float:left; width:230px; padding-right:10px;"> S&eacute;ance au Th&eacute;&acirc;tre Clavel &agrave; 19h30 : </label>
		<select name="idseance" id="idseance" style="float:left;">
		<?php

			while ($row=mysql_fetch_array($reponseSeances)){ 
				$sallenom = utf8_encode($row['sallenom']);
				$heure = $row['heure'];
				$ladate = switchDate($row['ladate']);
				$seanceid = $row['seanceid'];
				
				
				$sqlNbPlace = ' SELECT SUM( place_nombre ) AS nbplaces FROM T_PLACE WHERE place_achete =1 AND place_seance_id = ' . $seanceid;
				$nbPlace = mysql_query ($sqlNbPlace) or die ('Erreur SQL !'.$sqlNbPlace.'<br />'.mysql_error());
				$nbPlace = mysql_fetch_array($nbPlace);
				$nbPlace = $nbPlace['nbplaces'];
				
				
				if($nbPlace <= 110){
					echo '<option value="'.$seanceid.'">'.$ladate.'</option>';
				}
				
			}
			
			mysql_close();
			
		?>
		</select>
	</div>
	
	
     <div class="ligne" style="text-align:right;">
         <button type='submit'>Enregistrer</button>
     </div>
</form>
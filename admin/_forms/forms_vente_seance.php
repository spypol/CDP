<!--- FORM D'AJOUT SEANCE -->
<?php
include('connectionDB.php');

function switchDate($usDate){
	$usDate = explode('-', $usDate);
	$dates = $usDate[2].'/'.$usDate[1].'/'.$usDate[0];
	return $dates;
}

$sqlsalles = 'SELECT SALLE_ID as id, SALLE_NOM as nom FROM T_SALLE';
$reponseSalles = mysql_query ($sqlsalles) or die ('Erreur SQL !'.$sqlsalles.'<br />'.mysql_error());

$sqlseances = 'SELECT SEANCE_ID as id, SEANCE_DATE as ladate, SEANCE_HEURE as heure, SALLE_NOM as sallenom, SEANCE_COMPLETE as complete FROM T_SEANCE, T_SALLE WHERE SEANCE_SALLE_ID = SALLE_ID';
$reponseSeances = mysql_query ($sqlseances) or die ('Erreur SQL !'.$sqlseances.'<br />'.mysql_error());

?>
<form action="requetesventes/seance/ajouterSeance.php" class='venteForm' method="post" id="ajouterseance" enctype="multipart/form-data" >
     <img src="images/delete.gif" name="fermer" alt="Fermer" width="15" class="closeBox"/>
	<h3 class="titreform">Ajouter une s&eacute;ance</h3>
     <div class="ligne">
     	<label for="nomSalle">Choisir une salle : </label>
		<select name="nomSalle" id="nomSalle" style="margin-left:15px;">
        <?php 
        	while ($row1=mysql_fetch_array($reponseSalles)){ 
				$nom = utf8_encode($row1['nom']);
				echo '<option value="'.$row1['id'].'">'.$nom.'</option>';
        	}
		?>
		</select>
     </div>
     <div class="ligne">
     	<label for="datePicker">Choisir une date : </label><input type="text" id="datepicker" name="dateSeance">
     </div>
     <div class="ligne">
     	<label for="horaireSeance">Choisir un horaire : </label>
		<select name="heureSeance" id="heureSeance" style="margin-left:15px; float:left;">
			<?php
				for($i=9 ; $i<=22 ; $i++){
					echo '<option value="'.$i.'">'.$i.'</option>'; 
				}
			?>
		</select>h
		<select name="minuteSeance" id="minuteSeance" style="margin-left:5px;">
				<option value="00">00</option><option value="15">15</option><option value="30">30</option><option value="45">45</option>
		</select>m
     </div>
     
	  <input type="hidden" name="seanceid" id="seanceid" value="" />
     <div class="ligne" style="text-align:right;">
         <button type='submit'>Enregistrer</button>
     </div>
</form>
 
<!-- BOX DE MODIFICATION -->
<div class='venteDiv' id="consulterseance">
    <img src="images/delete.gif" name="fermer" alt="Fermer" width="15" class="closeBox"/>
	<h3 id="titreDiv"></h3>
    <ul id="listeseance">
    	 <?php 
        	while ($row=mysql_fetch_array($reponseSeances)){ 
				$sallenom = utf8_encode($row['sallenom']);
				$id = $row['id'];
				$ladate = switchDate($row['ladate']);
				$heure = $row['heure'];
				$complete = $row['complete'];
				echo '<li id="'.$id.'"><strong>'.$sallenom.'</strong> '.$ladate.' &agrave; '.$heure.'';
				if($complete == 1){
					echo '<img src="images/complet.png" name="seancecomplete" alt="Seance Complete" width="15" id="'.$id.'_s" class="completer" style="padding-left:5px; cursor:pointer;"/></li>';
				} else {
					echo '<img src="images/valid.png" name="seancelibre" alt="Seance Libre" width="15" id="'.$id.'_s" class="completer" style="padding-left:5px; cursor:pointer;"/></li>';
				}
        	}
		?>
    </ul>
</div>
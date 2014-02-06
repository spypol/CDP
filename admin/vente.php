<?php
	session_start();
	if(!isset($_SESSION['login'])) {
		header('Location: index.php');
	}
	header("Content-Type: text/html; charset=iso-8859-1");
	$isAdmin = $_SESSION['isAdmin'];
	$isVente = $_SESSION['isVente'];
	$userData = $_SESSION['userData'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

	<link rel="shortcut icon" href="/images/favicon.ico" />
	<link href="images/logos/peter.png" rel="apple-touch-icon" />
	<link href="_css/style.css" rel="stylesheet" type="text/css" media="screen" />
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" /> 

	<title>Administration - Souviens-toi Pan !</title>

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
	<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/jquery-ui.min.js'></script>
	<script src='http://www.kelvinluck.com/assets/jquery/datePicker/v2/demo/scripts/jquery.datePicker.js'></script>
	
	<script type="text/javascript" src="_js/iutil.js"></script> 
	<script type="text/javascript" src="_js/idrag.js"></script>
	
	<script type="text/javascript" src="_js/admin.js"></script>
	<script type="text/javascript" src="_js/vente.js"></script>
</head>

<body id="accueil">
	
	<!--- LES FORMS DE CREATION -->
	<?php include('_forms/forms_vente_creation.php') ?> 
	<!--- LES FORMS DE SEANCE -->
	<?php include('_forms/forms_vente_seance.php') ?>
	<!--- LE FORM DE PlACE ACHETEE-->
	<?php include('_forms/forms_vente_creationplace.php') ?>

	<!-- MISE EN PAGE -->
	<img src="../img/logo_compote_de_prod.png" border="0" width="350" style="float:none;" />

	<div id="title" style="position:absolute; top:5px; right:5px;float:left;color:#EEE;font-size:30px; text-align:right;">
		VENTE<br />
		<?php if($isAdmin == 1){ ?><span style="font-size:16px;"><a href="accueil.php" style="color:#CCC; text-decoration:none;">Intranet</a></span><?php } ?>
	</div>
	<span id="date" style="position:absolute; top:5px; right:165px; float:right;color:#EEE;font-size:10px;">
		<?php
			echo "Bienvenue " . $userData . " - ";
			$date = date("d-m-Y");
			Print("$date");
		?>
	- 	<a href="deconnect.php" style="color:#CCC;">D&eacute;connexion</a>
	</span>

	<div class="formulaire" id="formVideo">
		Test
	</div>

   <div align="center">
		<!--LA GESTION DES ELEMENTS DE REFERENCE -->
		<?php if($isAdmin == 1){ ?>
			 <div class="box" id="box_gestion" style="width:170px; height:120px; min-height:120px;">
				<img src="images/vente.png" name="AdministrationReferences" style="float:left; margin:3px 0 0 3px;" width="32"/>
				<h1 style="float:left;">Cr&eacute;ation</h1>
				<br /><br /><br />
				<ul>
					<li>
						Les salles 
						<img src="images/crayon.png" name="modifier" alt="modifier" width="10" style="cursor:pointer;" class="lister" id="salle"/>
						<img src="images/add.png" name="ajouter" alt="ajouter" width="10" style="cursor:pointer;" class="ajout" id="ajoutersalle"/>
					</li>
					<li>
						Les tarifs 
						<img src="images/crayon.png" name="modifier" alt="modifier" width="10" style="cursor:pointer;" class="lister" id="tarif"/>
						<!--<img src="images/add.png" name="ajouter" alt="ajouter" width="10" style="cursor:pointer;" class="ajout" id="ajoutertarif"/>-->
					</li>
					<li>
						Les spectateurs 
						<img src="images/crayon.png" name="modifier" alt="modifier" width="10" style="cursor:pointer;" class="lister" id="spectateur"/>
						<img src="images/add.png" name="ajouter" alt="ajouter" width="10" style="cursor:pointer;" class="ajout" id="ajouterspectateur"/>
					</li>
					<li>
						<span id="afficherprix"><strong>Les prix </strong></span>
						<img src="images/crayon.png" name="modifier" alt="modifier" width="10" style="cursor:pointer;" class="pricer" id="ajouterprix"/>
					</li>
				</ul>
	      </div>
		<?php } ?>
		
		<!--LA GESTION DES SEANCES -->
		<?php if($isAdmin == 1){ ?>
			<div class="box" id="box_gestion" style="width:190px; height:120px; min-height:120px;">
				<img src="images/vente.png" name="AdministrationSeances" style="float:left; margin:3px 0 0 3px;" width="32"/>
				<h1 style="float:left;">S&eacute;ances</h1>
				<br /><br /><br />
				<ul>
					<li id="ajouterseance" class="ajout survol">
						Cr&eacute;er une s&eacute;ance 
					</li>
					<li id="consulterseance" class="ajout survol">
						Consulter les s&eacute;ances 
					</li>
				</ul>
	      </div>
		<?php } ?>
		
		<!--LA GESTION DES VENTES -->
		<?php 
			if($isAdmin == 1){ 
				include('requetesventes/getSeance.php');
		?>
			<div class="box" id="box_gestion" style="width:490px; height:120px; min-height:120px;">
				<img src="images/vente.png" name="AdministrationSeances" style="float:left; margin:3px 0 0 3px;" width="32"/>
				<h1 style="float:left;">Afficher les ventes</h1>
				<br /><br /><br />
				<form action="" method="post" id="ajouterseance" enctype="multipart/form-data" >
					<select name="laseance" id="laseance">
						<option value="0"><strong>Toutes les s&eacute;ances</strong></option>
			      	<?php 
			       		while ($row=mysql_fetch_array($reponseSeances)){ 
								$sallenom = utf8_encode($row['sallenom']);
								$id = $row['id'];
								$ladate = switchDate($row['ladate']);
								$heure = $row['heure'];
								echo '<option value="'.$id.'"><strong>'.$sallenom.'</strong> '.$ladate.' &agrave; '.$heure.'</option>';
							}
						?>
					</select>
					<input type="hidden" name="placeutilise" value="0" />
					<!---<label for="reservation">place reserv&eacute;e</label><input type="radio" name="reservation" id="reservation" value="0">--->
					<!---<label for="achete">place achet&eacute;e</label><input type="radio" name="reservation" id="achete" checked="checked" value="1">--->
					<input type="submit" name="valider" value="valider">
				</form>
				
				<form action="" method="post" id="ajouterseance" enctype="multipart/form-data" >
					Les spectateurs d&eacute;j&agrave; venus avant le
					<select name="laseance" id="laseance">
			      	<?php 
						include('requetesventes/getSeance.php');
			       		while ($row2=mysql_fetch_array($reponseSeances)){ 
								$id = $row2['id'];
								$ladate = switchDate($row2['ladate']);
								$lavraiedate = $row2['ladate'];
								echo '<option value="'.$lavraiedate.'">'.$ladate.'</option>';
							}
						?>
					</select>
					<input type="hidden" name="placeutilise" value="1" />
					<input type="submit" name="valider" value="valider">
				</form>
				
				<br />
				<div id="chart">
					<a href="/admin/chart" target="_blank" style="text-decoration:none;">
						<img src="images/chart.png" name="chart" style="margin-left:170px; margin-bottom:10px; float:left;"/>
						<p style="float:left; margin:3px 0 0 3px;">Visualiser le graphique</p>
					</a>
				</div>
	      </div>
		<?php } ?>
		
		<!--L'AJOUT DE PLACE A LA MAIN -->
		<?php  if($isVente == 1){ //include('requetesventes/getSeance.php'); ?>
			<div class="box" id="box_gestion" style="width:38px; height:38px; min-height:30px;">
				<img src="images/add.png" name="AdministrationSeances" style="float:left; margin:3px; cursor:pointer;" width="32" id="ajouterUnePlace"/>
				<br /><br /><br />
			</div>
		<?php } ?>
		
		
		<!--LISTER LES VENTES -->
		<style>
			table {
				border-width:1px; 
				border-style:none; 
				border-color:black;
				width:900px;
			}
			
			th {
				background-color:#AEAEAE;
				border-width:1px;
				border-style:solid; 
				border-color:#666;
			}
			
			td { 
				border-width:1px;
				border-style:solid; 
				border-color:#666;
				text-align:center;
			}
		</style>
		<?php
			if(isset($_POST['laseance'])){
				
				$laseanceid = $_POST['laseance'];
				$listeplaceachete = $_POST['placeutilise'];
				//$reservation = $_POST['reservation'];
				
				$reservation = 1;
				
				include('./connectionDB.php');
				
				if($listeplaceachete == 1){
					$sqlplace = 'SELECT SPECTATEUR_NOM, SPECTATEUR_MAIL, SPECTATEUR_ID, SPECTATEUR_PRENOM, PLACE_NOMBRE, PLACE_ACHETE, PLACE_CASH, PRIX_VALEUR, PLACE_ID, TARIF_ID, SEANCE_DATE
						FROM T_PLACE, T_SPECTATEUR, T_PRIX, T_SEANCE, T_TARIF
						WHERE PLACE_ACHETE = '.$reservation.'
						AND PLACE_SEANCE_ID = SEANCE_ID
						AND PLACE_SPECTATEUR_ID = SPECTATEUR_ID
						AND PRIX_TARIF_ID = PLACE_TARIF_ID
						AND PRIX_SALLE_ID = SEANCE_SALLE_ID
						AND PLACE_TARIF_ID = TARIF_ID
						AND SEANCE_DATE <= "'.$laseanceid.'"
                        ORDER BY SEANCE_DATE ASC';
				} else{
					if($laseanceid == 0){
						$sqlplace = 'SELECT SPECTATEUR_NOM, SPECTATEUR_MAIL, SPECTATEUR_ID, SPECTATEUR_PRENOM, PLACE_NOMBRE, PLACE_ACHETE, PLACE_CASH, PRIX_VALEUR, PLACE_ID, TARIF_ID, SEANCE_DATE
						FROM T_PLACE, T_SPECTATEUR, T_PRIX, T_SEANCE, T_TARIF
						WHERE PLACE_ACHETE = '.$reservation.'
						AND PLACE_SEANCE_ID = SEANCE_ID
						AND PLACE_SPECTATEUR_ID = SPECTATEUR_ID
						AND PRIX_TARIF_ID = PLACE_TARIF_ID
						AND PRIX_SALLE_ID = SEANCE_SALLE_ID
						AND PLACE_TARIF_ID = TARIF_ID
                        ORDER BY SEANCE_DATE ASC';
					} else {
						$sqlplace = 'SELECT SPECTATEUR_NOM, SPECTATEUR_MAIL, SPECTATEUR_ID, SPECTATEUR_PRENOM, PLACE_NOMBRE, PLACE_ACHETE, PLACE_CASH, PRIX_VALEUR, PLACE_ID, TARIF_ID, SEANCE_DATE
						FROM T_PLACE, T_SPECTATEUR, T_PRIX, T_SEANCE, T_TARIF
						WHERE PLACE_SEANCE_ID =  '.$laseanceid.'
						AND PLACE_ACHETE = '.$reservation.'
						AND PLACE_SEANCE_ID = SEANCE_ID
						AND PLACE_SPECTATEUR_ID = SPECTATEUR_ID
						AND PRIX_TARIF_ID = PLACE_TARIF_ID
						AND PRIX_SALLE_ID = SEANCE_SALLE_ID
						AND PLACE_TARIF_ID = TARIF_ID
                        ORDER BY SEANCE_DATE ASC';
					}
				}
				$reponsePlace = mysql_query ($sqlplace) or die ('Erreur SQL !'.$sqlplace.'<br />'.mysql_error());
				
				$sqlseanceDate = 'SELECT SEANCE_DATE FROM T_SEANCE WHERE SEANCE_ID =  '.$laseanceid;
				$reponseSeanceDate = mysql_query ($sqlseanceDate) or die ('Erreur SQL !'.$sqlseanceDate.'<br />'.mysql_error());
				$rowDate=mysql_fetch_array($reponseSeanceDate);
				$laDateSeance = switchDate($rowDate['SEANCE_DATE']);
		?>
		
		<div class="box" id="box_gestion" style="width:960px; min-height:300px;">
			<img src="images/vente.png" name="listerPlaceseances" style="float:left; margin:3px 0 0 3px;" width="32"/>
			<h1 style="float:left;">
				<?php
					if($laseanceid != 0){
						echo 'S&eacute;ance du ';
						echo $laDateSeance;
					}else{
						echo 'Toutes les s&eacute;ances';
					}
				?>
			</h1>
			<br /><br /><br />		
			<table>
				<tr>
					<th>No de r&eacute;servation</th>
					<th>Paiement</th>
                    <th>Date</th>
					<th>Spectateur</th>
					<th>Email</th>
					<th>Tarif adulte</th>
					<th>Tarif r&eacute;duit</th>
					<th>Tarif enfant</th>
					<th>Total</th>
					
				</tr>
				<?php
					$totalTotal = 0;
					$i = 0;
					$emails = '';
					while ($row=mysql_fetch_array($reponsePlace)){
						$SPECTATEUR_NOM = $row['SPECTATEUR_NOM'];
						$SPECTATEUR_PRENOM = $row['SPECTATEUR_PRENOM'];
						$SPECTATEUR_MAIL = $row['SPECTATEUR_MAIL'];
						$PLACE_NOMBRE = $row['PLACE_NOMBRE'];
						$PLACE_ACHETE = $row['PLACE_ACHETE'];
						$PLACE_CASH = $row['PLACE_CASH'];
						$PRIX_VALEUR = $row['PRIX_VALEUR'];
						$PLACE_ID = $row['PLACE_ID'];
                        $SEANCE_DATE = $row['SEANCE_DATE'];
						echo '<tr>';
						echo '<td>'.$PLACE_ID.'</td>';
						if($PLACE_CASH == 0){
							echo '<td>Paypal</td>';
						}else{
							echo '<td>Ch&egrave;que</td>';
						}
                        echo '<td>'.switchDate($SEANCE_DATE).'</td>';
						echo '<td>'.$SPECTATEUR_NOM.' '.$SPECTATEUR_PRENOM.'</td>';
						echo '<td>'.$SPECTATEUR_MAIL.'</td>';
						if($row['TARIF_ID'] == 1) {
							echo '<td>'.$PLACE_NOMBRE.'</td>';
							$total = $PLACE_NOMBRE * $PRIX_VALEUR;
							$totalAdulte = $totalAdulte + $PLACE_NOMBRE;
						} else {
					 		//echo '<td>0</td>';
							if($row['TARIF_ID'] == 3){
								echo '<td>'.$PLACE_NOMBRE.'</td>';
								$total = 0;
							}else{
								echo '<td>0</td>'; 
						}
						}
						if($row['TARIF_ID'] == 4){
							echo '<td>'.$PLACE_NOMBRE.'</td>';
							$total = $PLACE_NOMBRE * $PRIX_VALEUR;
							$totalReduit = $totalReduit + $PLACE_NOMBRE;
						}else{
							echo '<td>0</td>'; 
						}
                        
						if($row['TARIF_ID'] == 2){
							echo '<td>'.$PLACE_NOMBRE.'</td>';
							$total = $PLACE_NOMBRE * $PRIX_VALEUR;
							$totalEnfant = $totalEnfant + $PLACE_NOMBRE;
						}else{
							echo '<td>0</td>'; 
						}
						
						echo '<td>'.$total.'</td>';
						echo '</tr>';
						
						$totalTotal = $totalTotal + $total;
						$i++;
						$emails .= $SPECTATEUR_MAIL.', ';
					}
				?>
				<tr>	
					<th></th>
					<th></th>
					<th><?php echo $i; ?></th>
					<th></th>
                    <th></th>
					<th><?php echo $totalAdulte; ?></th>
					<th><?php echo $totalReduit; ?></th>
					<th><?php echo $totalEnfant; ?></th>
					<th><?php echo $totalTotal; ?></th>
				</tr>
				<tr>
					<th colspan="9"><a href="mailto:<?php echo $emails; ?>">Envoyer un email &agrave; la liste</a></th>
				</tr>
			</table>
      </div>
		<?php
		 		mysql_close();
			}
		?>
		
		
	<!-- LISTER LES VENTES DE CD -->
	<?php
		
				$reservation = 1;
				
				include('./connectionDB.php');
				
				$sqlcd = 'SELECT SPECTATEUR_NOM, SPECTATEUR_MAIL, SPECTATEUR_ID, SPECTATEUR_PRENOM, SPECTATEUR_ADRESSE, SPECTATEUR_TEL, CD_ACHETE, CD_ID, CD_NOMBRE
					FROM T_CD, T_SPECTATEUR
					WHERE CD_ACHETE = '.$reservation.'
					AND CD_SPECTATEUR_ID = SPECTATEUR_ID';
						
				$reponseCD = mysql_query ($sqlcd) or die ('Erreur SQL !'.$sqlcd.'<br />'.mysql_error());
		?>
		
		<div class="box" id="box_gestion" style="width:960px; min-height:300px;">
			<img src="images/vente.png" name="listerPlaceseances" style="float:left; margin:3px 0 0 3px;" width="32"/>
			<h1 style="float:left;">
				<?php
					if($laseanceid != 0){
						echo 'S&eacute;ance du ';
						echo $laDateSeance;
					}else{
						echo 'Toutes les s&eacute;ances';
					}
				?>
			</h1>
			<br /><br /><br />		
			<table>
				<tr>
					<th>ID d'achat </th>
					<th>Paiement</th>
					<th>Spectateur</th>
					<th>Email</th>
					<th>Adresse</th>
					<th>Nombre</th>
					<th>Total</th>
					
				</tr>
				<?php
					$totalTotal = 0;
					$totalCD = 0;
					$i = 0;
					$emails = '';
					while ($row=mysql_fetch_array($reponseCD)){
						$SPECTATEUR_NOM = $row['SPECTATEUR_NOM'];
						$SPECTATEUR_PRENOM = $row['SPECTATEUR_PRENOM'];
						$SPECTATEUR_MAIL = $row['SPECTATEUR_MAIL'];
						$SPECTATEUR_ADRESSE = $row['SPECTATEUR_ADRESSE'];
						$SPECTATEUR_TEL = $row['SPECTATEUR_TEL'];
						$CD_NOMBRE = $row['CD_NOMBRE'];
						$CD_ACHETE = $row['CD_ACHETE'];
						$CD_ID = $row['CD_ID'];
						echo '<tr>';
						echo '<td>'.$CD_ID.'</td>';
						echo '<td>Paypal</td>';
						echo '<td>'.$SPECTATEUR_NOM.' '.$SPECTATEUR_PRENOM.'</td>';
						echo '<td>'.$SPECTATEUR_MAIL.'</td>';
						echo '<td>'.$SPECTATEUR_ADRESSE.'</td>';
						echo '<td>'.$CD_NOMBRE.'</td>';
						$total = $CD_NOMBRE * 8.9;
						echo '<td>'.$total.'</td>';
						echo '</tr>';
						
						$totalCD = $totalCD + $CD_NOMBRE;
						
						$totalTotal = $totalTotal + $total;
						$i++;
						$emails .= $SPECTATEUR_MAIL.', ';
					}
				?>
				<tr>	
					<th></th>
					<th></th>
					<th><?php echo $i; ?></th>
					<th></th>
					<th><?php ?></th>
					<th><?php echo $totalCD ?></th>
					<th><?php echo $totalTotal; ?></th>
				</tr>
				<tr>
					<th colspan="7"><a href="mailto:<?php echo $emails; ?>">Envoyer un email &agrave; la liste</a></th>
				</tr>
			</table>
      </div>
		<?php
		 		mysql_close();
		?>
  </div>


</body>
</html>
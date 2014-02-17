<?php
	include('../../connectionDB.php');

	/*-------------------------------------------------------------*/
	/*---------------Fonction d'envoi du mail----------------------*/
	/*-------------------------------------------------------------*/
	function envoiMail($iduser){
	
		include('../../connectionDB.php');

		$sqlSpectateur = 'SELECT SPECTATEUR_NOM, SPECTATEUR_PRENOM, SPECTATEUR_MAIL, SPECTATEUR_TEL FROM T_SPECTATEUR WHERE SPECTATEUR_ID =' .$iduser. '';
		$donneesSpectateur = mysql_query ($sqlSpectateur) or die ('Erreur SQL !'.$sqlSpectateur.'<br />'.mysql_error());
		$donneesSpectateur = mysql_fetch_array($donneesSpectateur);

		$sqlPlace = 'SELECT SEANCE_DATE, SEANCE_HEURE, SALLE_NOM, TARIF_NOM, PRIX_VALEUR, PLACE_NOMBRE 
		FROM T_PLACE, T_TARIF, T_SEANCE, T_SALLE, T_PRIX
		WHERE PLACE_SPECTATEUR_ID =' .$iduser. '
		AND TARIF_ID = PLACE_TARIF_ID
		AND SEANCE_ID = PLACE_SEANCE_ID
		AND SEANCE_SALLE_ID = SALLE_ID
		AND TARIF_ID = PRIX_TARIF_ID
		AND PRIX_SALLE_ID = SALLE_ID';
		$donneesAchat = mysql_query ($sqlPlace) or die ('Erreur SQL !'.$sqlPlace.'<br />'.mysql_error());

		$tableauRecap = '';
		$prixTotal = 0;

		while ($da = mysql_fetch_array($donneesAchat)){
			$tableauRecap .= '<tr>';
			$tableauRecap .= '<td>'.$da[PLACE_NOMBRE].'</td>';
			$tableauRecap .= '<td>'.$da[SEANCE_DATE].' &agrave; '.$da[SEANCE_HEURE].'</td>';
			$tableauRecap .= '<td>'.$da[TARIF_NOM].'</td>';
			$tableauRecap .= '<td>'.$da[PRIX_VALEUR].' &euro;</td>';
			$tableauRecap .= '<td>'.$da[PLACE_NOMBRE]*$da[PRIX_VALEUR].' &euro;</td>';
			$tableauRecap .= '<tr>';
			$prixTotal = $prixTotal + $da[PLACE_NOMBRE]*$da[PRIX_VALEUR];
		}

		$destinataires = "compotedeprod@gmail.com,". $donneesSpectateur[SPECTATEUR_MAIL];
	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: contact@compotedeprod.com' . "\r\n";

	$message = "
		<html>
		<head>
		  <title>Compote de Prod - Vous venez d&rsquo;acheter vos places !</title>
		</head>
		<body>
			<table>
				<tr>
					<td colspan='5' style='font-size:14px;font-weight:bold;font-family: Arial, Helvetica,sans-serif;'>
						<img src='http://www.compotedeprod.com/img/logo-mail.png' name='cdp' alt='Compote de Prod' width='300' />
					</td>
				</tr>
				<tr><td colspan='5'>Billet &eacute;lectronique</td></tr>
				<tr><td colspan='5'>_______________________________________________________________________</td></tr>
				<tr>
					<td colspan='5'>
						$donneesSpectateur[SPECTATEUR_PRENOM] $donneesSpectateur[SPECTATEUR_NOM]<br /><br />

						L&rsquo;&eacute;quipe <b>Compote de Prod</b> vous remercie pour votre achat fait sur www.compotedeprod.com<br /><br />

						Merci d&rsquo;imprimer cet email et de le pr&eacute;senter &agrave; l&rsquo;entr&eacute;e du th&eacute;&acirc;tre afin d&rsquo;acc&eacute;der &agrave; votre place (le placement &eacute;tant libre). Merci &eacute;galement d'apporter, le cas &eacute;ch&eacute;ant, les documents justifiants vos droits &agrave; un tarif r&eacute;duit.<br /><br />

						Votre num&eacute;ro de r&eacute;servation est le $iduser. Conservez-le pr&eacute;cieusement.<br />
						Vous en aurez besoin pour toute demande concernant votre commande.<br /><br />

						Voici les d&eacute;tails de votre achat :
					</td>
				</tr>
				<tr><td colspan='5'>_______________________________________________________________________</td></tr>
				<tr>
					<td colspan='5'>
						Informations personnelles :<br />                                   
						$donneesSpectateur[SPECTATEUR_NOM] $donneesSpectateur[SPECTATEUR_PRENOM]<br />                                  
						$donneesSpectateur[SPECTATEUR_MAIL]<br />                                        
						$donneesSpectateur[SPECTATEUR_TEL] <br /><br />
						Mode de paiement : virement paypal
					</td>
				</tr>
				<tr>
					<td>Nombre de place</td>
					<td>Date</td>
					<td>Type de place</td>
					<td>Tarif unitaire</td>
					<td>Total</td>
				</tr>
				<tr><td colspan='5'>_______________________________________________________________________</td></tr>
				$tableauRecap
				<tr><td colspan='5'>_______________________________________________________________________</td></tr>
				<tr>
					<td colspan='3'></td>
					<td>Total</td>
					<td>$prixTotal &euro;</td>
				</tr>
				<tr><td colspan='5'>_______________________________________________________________________</td></tr>
					<tr>
						<td colspan='5'>
							Vous pouvez retrouver sur notre site les Mentions l&eacute;gales conform&eacute;ment &agrave; la Loi n&deg;2004-575 du 21 juin 2004 pour la confiance dans l&rsquo;&eacute;conomie num&eacute;rique.
		<br /><br />
							Nous vous remercions de votre visite sur notre site www.compotedeprod.com<br />
						</td>
					</tr>
			</table>
		</body>
		</html>

	";

	echo $message;

	mail($destinataires,'Compote de Prod - Votre recu', $message, $headers);

	mysql_close();
		
	}

	/*-------------------------------------------------------------*/
	/*---------------Fonction d'envoi du mail invitation----------------------*/
	/*-------------------------------------------------------------*/
	function envoiMailInvitation($iduser){
	
		include('../../connectionDB.php');

		$sqlSpectateur = 'SELECT SPECTATEUR_NOM, SPECTATEUR_PRENOM, SPECTATEUR_MAIL, SPECTATEUR_TEL FROM T_SPECTATEUR WHERE SPECTATEUR_ID =' .$iduser. '';
		$donneesSpectateur = mysql_query ($sqlSpectateur) or die ('Erreur SQL !'.$sqlSpectateur.'<br />'.mysql_error());
		$donneesSpectateur = mysql_fetch_array($donneesSpectateur);

		$sqlPlace = 'SELECT SEANCE_DATE, SEANCE_HEURE, SALLE_NOM, TARIF_NOM, PRIX_VALEUR, PLACE_NOMBRE 
		FROM T_PLACE, T_TARIF, T_SEANCE, T_SALLE, T_PRIX
		WHERE PLACE_SPECTATEUR_ID =' .$iduser. '
		AND TARIF_ID = PLACE_TARIF_ID
		AND SEANCE_ID = PLACE_SEANCE_ID
		AND SEANCE_SALLE_ID = SALLE_ID
		AND TARIF_ID = PRIX_TARIF_ID
		AND PRIX_SALLE_ID = SALLE_ID';
		$donneesAchat = mysql_query ($sqlPlace) or die ('Erreur SQL !'.$sqlPlace.'<br />'.mysql_error());

		$tableauRecap = '';
		$prixTotal = 0;

		while ($da = mysql_fetch_array($donneesAchat)){
			$tableauRecap .= '<tr>';
			$tableauRecap .= '<td>'.$da[PLACE_NOMBRE].'</td>';
			$tableauRecap .= '<td>'.$da[SEANCE_DATE].' &agrave; '.$da[SEANCE_HEURE].'</td>';
			$tableauRecap .= '<td>'.$da[TARIF_NOM].'</td>';
			$tableauRecap .= '<td>'.$da[PRIX_VALEUR].' &euro;</td>';
			$tableauRecap .= '<td>'.$da[PLACE_NOMBRE]*$da[PRIX_VALEUR].' &euro;</td>';
			$tableauRecap .= '<tr>';
			$prixTotal = $prixTotal + $da[PLACE_NOMBRE]*$da[PRIX_VALEUR];
		}

		$destinataires = "compotedeprod@gmail.com,". $donneesSpectateur[SPECTATEUR_MAIL];
	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: contact@compotedeprod.com' . "\r\n";

	$message = "
		<html>
		<head>
		  <title>Compote de Prod - Votre invitation !</title>
		</head>
		<body>
			<table>
				<tr>
					<td colspan='5' style='font-size:14px;font-weight:bold;font-family: Arial, Helvetica,sans-serif;'>
						<img src='http://www.compotedeprod.com/img/logo-mail.png' name='cdp' alt='Compote de Prod' width='300' />
					</td>
				</tr>
				<tr><td colspan='5'>Billet &eacute;lectronique</td></tr>
				<tr><td colspan='5'>_______________________________________________________________________</td></tr>
				<tr>
					<td colspan='5'>
						$donneesSpectateur[SPECTATEUR_PRENOM] $donneesSpectateur[SPECTATEUR_NOM]<br /><br />

						L&rsquo;&eacute;quipe <b>Compote de Prod</b> vous remercie pour votre achat fait sur www.compotedeprod.com<br /><br />

						Merci d&rsquo;imprimer cet email et de le pr&eacute;senter &agrave; l&rsquo;entr&eacute;e du th&eacute;&acirc;tre afin d&rsquo;acc&eacute;der &agrave; votre place (le placement &eacute;tant libre). Merci &eacute;galement d'apporter, le cas &eacute;ch&eacute;ant, les documents justifiants vos droits &agrave; un tarif r&eacute;duit.<br /><br />

						Votre num&eacute;ro de r&eacute;servation est le $iduser. Conservez-le pr&eacute;cieusement.<br />
						Vous en aurez besoin pour toute demande concernant votre commande.<br /><br />

						Voici les d&eacute;tails de votre achat :
					</td>
				</tr>
				<tr><td colspan='5'>_______________________________________________________________________</td></tr>
				<tr>
					<td colspan='5'>
						Informations personnelles :<br />                                   
						$donneesSpectateur[SPECTATEUR_NOM] $donneesSpectateur[SPECTATEUR_PRENOM]<br />                                  
						$donneesSpectateur[SPECTATEUR_MAIL]<br />                                        
						$donneesSpectateur[SPECTATEUR_TEL] <br /><br />
						Mode de paiement : virement paypal
					</td>
				</tr>
				<tr>
					<td>Nombre de place</td>
					<td>Date</td>
					<td>Type de place</td>
					<td>Tarif unitaire</td>
					<td>Total</td>
				</tr>
				<tr><td colspan='5'>_______________________________________________________________________</td></tr>
				$tableauRecap
				<tr><td colspan='5'>_______________________________________________________________________</td></tr>
				<tr>
					<td colspan='3'></td>
					<td>Total</td>
					<td>$prixTotal &euro;</td>
				</tr>
				<tr><td colspan='5'>_______________________________________________________________________</td></tr>
					<tr>
						<td colspan='5'>
							Vous pouvez retrouver sur notre site les Mentions l&eacute;gales conform&eacute;ment &agrave; la Loi n&deg;2004-575 du 21 juin 2004 pour la confiance dans l&rsquo;&eacute;conomie num&eacute;rique.
		<br /><br />
							Nous vous remercions de votre visite sur notre site www.compotedeprod.com<br />
						</td>
					</tr>
			</table>
		</body>
		</html>

	";

	echo $message;

	mail($destinataires,'Compote de Prod - Votre recu', $message, $headers);

	mysql_close();
		
	}

	/*------------------------------------------------------------------*/
	/*---------------------INSERTION EN BASE----------------------------*/
	/*------------------------------------------------------------------*/

	if(isset($_POST['nomSpectateur'])) {

		$montantTotal = 0;

		$nomSpectateur = $_POST['nomSpectateur'];
		$prenomSpectateur = $_POST['prenomSpectateur'];
		$mailSpectateur = $_POST['mailSpectateur'];
		$telSpectateur = $_POST['telSpectateur'];

		$nbtarifadulte = $_POST['nbtarifadulte'];
		$nbtarifenfant = $_POST['nbtarifenfant'];
		$nbtarifinvitation = $_POST['nbtarifinvitation'];

		$idseance = $_POST['idseance'];

		$sqlSpectateur = 'INSERT INTO T_SPECTATEUR (SPECTATEUR_NOM, SPECTATEUR_PRENOM, SPECTATEUR_MAIL, SPECTATEUR_TEL) VALUES ("'.$nomSpectateur.'", "'.$prenomSpectateur.'", "'.$mailSpectateur.'", "'.$telSpectateur.'")';

		$sqlMaxId = 'SELECT MAX(SPECTATEUR_ID) as maxId from T_SPECTATEUR';

		mysql_query ($sqlSpectateur) or die ('Erreur SQL !'.$sqlSpectateur.'<br />'.mysql_error());
		$maxId = mysql_query ($sqlMaxId) or die ('Erreur SQL !'.$sqlMaxId.'<br />'.mysql_error());
		$maxId = mysql_fetch_array($maxId);
		$maxId = $maxId['maxId'];

		if($nbtarifadulte != 0){
			$sqlPlaceAdulte = 'INSERT INTO T_PLACE (PLACE_SPECTATEUR_ID, PLACE_SEANCE_ID, PLACE_TARIF_ID, PLACE_NOMBRE, PLACE_ACHETE, PLACE_CASH) VALUES ("'.$maxId.'", "'.$idseance.'", 1, '.$nbtarifadulte.', 1, 1)';
			mysql_query ($sqlPlaceAdulte) or die ('Erreur SQL !'.$sqlPlaceAdulte.'<br />'.mysql_error());
			
			$sqlPrixAdulte = 'SELECT PRIX_VALEUR FROM T_PRIX, T_SEANCE WHERE PRIX_TARIF_ID = 1 AND SEANCE_ID = '.$idseance.' AND PRIX_SALLE_ID = SEANCE_SALLE_ID';
			$prixAdulte = mysql_query ($sqlPrixAdulte) or die ('Erreur SQL !'.$sqlPrixAdulte.'<br />'.mysql_error());
			$prixAdulte = mysql_fetch_array($prixAdulte);
			$prixAdulte = $prixAdulte['PRIX_VALEUR'];
			
			$montantTotal = $montantTotal + $prixAdulte * $nbtarifadulte;
		}

		if($nbtarifenfant != 0){
			$sqlPlaceEnfant = 'INSERT INTO T_PLACE (PLACE_SPECTATEUR_ID, PLACE_SEANCE_ID, PLACE_TARIF_ID, PLACE_NOMBRE, PLACE_ACHETE, PLACE_CASH) VALUES ("'.$maxId.'", "'.$idseance.'", 2, '.$nbtarifenfant.', 1, 1)';
			mysql_query ($sqlPlaceEnfant) or die ('Erreur SQL !'.$sqlPlaceEnfant.'<br />'.mysql_error());
			
			$sqlPrixEnfant = 'SELECT PRIX_VALEUR FROM T_PRIX, T_SEANCE WHERE PRIX_TARIF_ID = 2 AND SEANCE_ID = '.$idseance.' AND PRIX_SALLE_ID = SEANCE_SALLE_ID';
			$prixEnfant = mysql_query ($sqlPrixEnfant) or die ('Erreur SQL !'.$sqlPrixEnfant.'<br />'.mysql_error());
			$prixEnfant = mysql_fetch_array($prixEnfant);
			$prixEnfant = $prixEnfant['PRIX_VALEUR'];
			
			$montantTotal = $montantTotal + $prixEnfant * $nbtarifenfant;
		}
		
		if($nbtarifinvitation != 0){
			$sqlPlaceInvitation = 'INSERT INTO T_PLACE (PLACE_SPECTATEUR_ID, PLACE_SEANCE_ID, PLACE_TARIF_ID, PLACE_NOMBRE, PLACE_ACHETE, PLACE_CASH) VALUES ("'.$maxId.'", "'.$idseance.'", 3, '.$nbtarifinvitation.', 1, 1)';
			mysql_query ($sqlPlaceInvitation) or die ('Erreur SQL !'.$sqlPlaceInvitation.'<br />'.mysql_error());
			
			$sqlPrixInvitation = 'SELECT PRIX_VALEUR FROM T_PRIX, T_SEANCE WHERE PRIX_TARIF_ID = 3 AND SEANCE_ID = '.$idseance.' AND PRIX_SALLE_ID = SEANCE_SALLE_ID';
			$prixInvitation = mysql_query ($sqlPrixInvitation) or die ('Erreur SQL !'.$sqlPrixInvitation.'<br />'.mysql_error());
			$prixInvitation = mysql_fetch_array($prixInvitation);
			$prixInvitation = $prixInvitation['PRIX_VALEUR'];
			
			$montantTotal = $montantTotal + $prixInvitation * $nbtarifinvitation;
		}
		
		mysql_close();	
		
		if($nbtarifinvitation != 0){
			envoiMailInvitation($maxId);
		}else{
			envoiMail($maxId);
		}
	
	}	
	header('Location: ../../vente.php');
?>
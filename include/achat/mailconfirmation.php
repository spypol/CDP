<?php

	$iduser = $_GET['iduser'];
	
	include('connectionDB.php');

	$sqlSpectateur = 'SELECT SPECTATEUR_NOM, SPECTATEUR_PRENOM, SPECTATEUR_MAIL, SPECTATEUR_TEL, SPECTATEUR_ADRESSE FROM T_SPECTATEUR WHERE SPECTATEUR_ID =' .$iduser. '';
	$donneesSpectateur = mysql_query ($sqlSpectateur) or die ('Erreur SQL !'.$sqlSpectateur.'<br />'.mysql_error());
	$donneesSpectateur = mysql_fetch_array($donneesSpectateur);

	$sqlCD = 'SELECT CD_NOMBRE 
	FROM T_CD
	WHERE CD_SPECTATEUR_ID =' .$iduser;
	
	$donneesAchat = mysql_query ($sqlCD) or die ('Erreur SQL !'.$sqlCD.'<br />'.mysql_error());

	$tableauRecap = '';
	$prixTotal = 0;

	while ($da = mysql_fetch_array($donneesAchat)){
		$tableauRecap .= '<tr>';
		$tableauRecap .= '<td>'.$da[CD_NOMBRE].'</td>';
		$tableauRecap .= '<td>8.9 €</td>';
		$tableauRecap .= '<td>'.$da[CD_NOMBRE]*8.9 .' €</td>';
		$tableauRecap .= '<tr>';
		$prixTotal = $prixTotal + $da[CD_NOMBRE]*8.9;
	}

	$destinataires = $donneesSpectateur[SPECTATEUR_MAIL];
	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: contact@souvienstoipan.com' . "\r\n";

	$message = "
		<html>
		<head>
		  <title>Souviens-toi Pan ! Vous venez d'acheter votre CD !</title>
		</head>
		<body>
			<table>
				<tr>
					<td colspan='3' style='font-size:14px;font-weight:bold;font-family: Arial, Helvetica,sans-serif;'>
						<img src='http://www.souvienstoipan.com/_images/titre.png' name='stp' alt='Souviens-toi Pan !' width='300' />
					</td>
				</tr>
				<tr><td colspan='3'>Facture électronique</td></tr>
				<tr><td colspan='3'>_______________________________________________________________________________________________________________</td></tr>
				<tr>
					<td colspan='3'>
						$donneesSpectateur[SPECTATEUR_PRENOM] $donneesSpectateur[SPECTATEUR_NOM]<br /><br />

						L’équipe Souviens-toi, Pan ! vous remercie pour votre achat fait sur www.souvienstoipan.com<br /><br />

						Voici les détails de votre achat :
					</td>
				</tr>
				<tr><td colspan='3'>_______________________________________________________________________________________________________________</td></tr>
				<tr>
					<td colspan='3'>
						Informations personnelles :<br />                                   
						$donneesSpectateur[SPECTATEUR_NOM] $donneesSpectateur[SPECTATEUR_PRENOM]<br />                                  
						$donneesSpectateur[SPECTATEUR_MAIL]<br />                                        
						$donneesSpectateur[SPECTATEUR_TEL] <br />
						$donneesSpectateur[SPECTATEUR_ADRESSE] <br /><br />
						Mode de paiement : virement paypal
					</td>
				</tr>
				<tr>
					<td>Nombre de CD</td>
					<td>Tarif unitaire</td>
					<td>Total</td>
				</tr>
				<tr><td colspan='3'>_______________________________________________________________________________________________________________</td></tr>
				$tableauRecap
				<tr><td colspan='3'>_______________________________________________________________________________________________________________</td></tr>
					<tr>
						<td colspan='3'>
							Vous pouvez retrouver sur notre site les Mentions légales conformément à la Loi n°2004-575 du 21 juin 2004 pour la confiance dans l'économie numérique.
		<br /><br />
							Nous vous remercions de votre visite sur notre site www.souvienstoipan.com<br />
						</td>
					</tr>
			</table>
		</body>
		</html>

	";

	echo $message;

	mail($destinataires,'Souviens-toi Pan ! - Votre reçu', $message, $headers);

	mysql_close();

?>
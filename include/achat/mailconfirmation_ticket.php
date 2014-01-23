<?php

include('connectionDB.php');

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
	$tableauRecap .= '<td>'.$da[SEANCE_DATE].' à '.$da[SEANCE_HEURE].'</td>';
	$tableauRecap .= '<td>'.$da[TARIF_NOM].'</td>';
	$tableauRecap .= '<td>'.$da[PRIX_VALEUR].' €</td>';
	$tableauRecap .= '<td>'.$da[PLACE_NOMBRE]*$da[PRIX_VALEUR].' €</td>';
	$tableauRecap .= '<tr>';
	$prixTotal = $prixTotal + $da[PLACE_NOMBRE]*$da[PRIX_VALEUR];
}

$destinataires = 'paulpinier@gmail.com';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: contact@souvienstoipan.com' . "\r\n";

$message = "
	<html>
	<head>
	  <title>Souviens-toi Pan ! Vous venez d'acheter vos places !</title>
	</head>
	<body>
		<table>
			<tr>
				<td colspan='5' style='font-size:14px;font-weight:bold;font-family: Arial, Helvetica,sans-serif;'>
					<img src='http://www.souvienstoipan.com/_images/titre.png' name='stp' alt='Souviens-toi Pan !' width='300' />
				</td>
			</tr>
			<tr><td colspan='5'>Billet électronique</td></tr>
			<tr><td colspan='5'>_______________________________________________________________________</td></tr>
			<tr>
				<td colspan='5'>
					$donneesSpectateur[SPECTATEUR_PRENOM] $donneesSpectateur[SPECTATEUR_NOM]<br /><br />

					L’équipe Souviens-toi, Pan ! vous remercie pour votre achat fait sur www.souvienstoipan.com<br /><br />
					
					Merci d'imprimer cet email et de le présenter à l'entrée du théâtre afin d'accéder à votre place (le placement étant libre).<br /><br />

					Votre numéro de réservation est le $iduser. Conservez-le précieusement.<br />
					Vous en aurez besoin pour toute demande concernant votre commande.<br /><br />

					Voici les détails de votre achat :
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
				<td>$prixTotal €</td>
			</tr>
			<tr><td colspan='5'>_______________________________________________________________________</td></tr>
				<tr>
					<td colspan='5'>
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
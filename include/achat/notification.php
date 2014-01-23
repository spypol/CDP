<?php

/*-------Ce fichier sert à récupérer le message de notifaction------*/
/*-------envoyé par Paypal avec l'ensmeble des données client-------*/
/*-------plus l'envoie d'un mail et la mise à jour ne BDD-----------*/

/*-------------------------------------------------------------*/
/*----------------------Fonction d'erreur----------------------*/
/*-------------------------------------------------------------*/
function gestionErreur($codeErreur, $mesErreur) {
	$sqlErreur = 'INSERT INTO T_ERREUR (ERREUR_LIBELLE, ERREUR_CONTENU) VALUES ("'.$codeErreur.'", "'.$mesErreur.'")';
	mysql_query ($sqlErreur) or die ('Erreur SQL !'.$sqlErreur.'<br />'.mysql_error());	 
}

/*-------------------------------------------------------------*/
/*---------------Fonction d'envoi du mail----------------------*/
/*-------------------------------------------------------------*/
function envoiMail($iduser){
	
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

	$destinataires = "compotedeprod@gmail.com,". $donneesSpectateur[SPECTATEUR_MAIL];
	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: contact@compotedeprod.com' . "\r\n";

	$message = "
		<html>
		<head>
		  <title>Compote de Prod - Vous venez d'acheter vos places !</title>
		</head>
		<body>
			<table>
				<tr>
					<td colspan='5' style='font-size:14px;font-weight:bold;font-family: Arial, Helvetica,sans-serif;'>
						<img src='http://www.compotedeprod.com/img/logo-mail.png' name='stp' alt='Compote de Prod' width='300' />
					</td>
				</tr>
				<tr><td colspan='5'>Billet électronique</td></tr>
				<tr><td colspan='5'>_______________________________________________________________________</td></tr>
				<tr>
					<td colspan='5'>
						$donneesSpectateur[SPECTATEUR_PRENOM] $donneesSpectateur[SPECTATEUR_NOM]<br /><br />

						L’équipe <b>Compote de Prod</b> vous remercie pour votre achat fait sur www.compotedeprod.com<br /><br />

						Merci d'imprimer cet email et de le présenter à l'entrée du théâtre afin d'accéder à votre place (le placement étant libre). Merci également d'apporter, le cas échéant, les documents justifiants vos droits à un tarif réduit.<br /><br />

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
							Nous vous remercions de votre visite sur notre site www.compotedeprod.com<br />
						</td>
					</tr>
			</table>
		</body>
		</html>

	";

	echo $message;

	mail($destinataires,'Compote de Prod - Votre reçu', $message, $headers);

	mysql_close();
	
}


include('connectionDB.php');

/*-------------------------------------------------------------*/
/*---------------Récupération des données Paypal---------------*/
/*-------------------------------------------------------------*/
// lire le formulaire provenant du système PayPal et ajouter 'cmd'
$req = 'cmd=_notify-validate';
foreach ($_POST as $key => $value) {
	$value = urlencode(stripslashes($value));
	$req .= "&$key=$value";
}

// renvoyer au système PayPal pour validation
$header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
$fp = fsockopen ('www.paypal.com', 80, $errno, $errstr, 30);

$item_name = $_POST['item_name'];
$item_number = $_POST['item_number'];
$payment_status = $_POST['payment_status'];
$payment_amount = $_POST['mc_gross'];
$payment_currency = $_POST['mc_currency'];
$txn_id = $_POST['txn_id'];
$receiver_email = $_POST['receiver_email'];
$payer_email = $_POST['payer_email'];
$id_user = $_POST['custom'];

gestionErreur("Entree Fichier", "A :'.$payment_amount.' mp:'.$payer_email.' id : '.$id_user.'");


/*-------------------------------------------------------------*/
/*-------------------Traitement des infos----------------------*/
/*-------------------------------------------------------------*/
if (!$fp) {
	// ERREUR HTTP
	gestionErreur("Erreur HTTP", "Erreur HTTP");
} else {
	fputs ($fp, $header . $req);
	while (!feof($fp)) {
		$res = fgets ($fp, 1024);
		if (strcmp ($res, "VERIFIED") == 0) {
			// transaction valide
			gestionErreur("Transaction Valide 1", "Statut '.$payment_status.'");
			
			// vérifier que payment_status a la valeur Completed
			if ( $payment_status == "Completed" || $payment_status == "Pending") {
				gestionErreur("Transaction Valide 2", "Statut Completed");
				
				// vérifier que txn_id n'a pas été précédemment traité: Créez une fonction qui va interroger votre base de données
				//if (VerifIXNID($txn_id) == 0) {
					// vérifier que receiver_email est votre adresse email PayPal principale
					if ( "compotedeprod@gmail.com" == $receiver_email) {
						gestionErreur("Transaction Valide 3", "Mail de receiver OK, txn_id = '.$txn_id.'");
						// vérifier que payment_amount et payment_currency sont corrects
						//$sqlVerifTotal = 'SELECT  FROM T_PLACE WHERE PLACE_SPECTATEUR_ID =' .$id_user. '';
						//mysql_query ($sqlVerifTotal) or die ('Erreur SQL !'.$sqlVerifTotal.'<br />'.mysql_error());	
						
						// traiter le paiement
						$sqlPlace = 'UPDATE T_PLACE SET PLACE_ACHETE = 1 WHERE PLACE_SPECTATEUR_ID =' .$id_user;
						mysql_query ($sqlPlace) or die ('Erreur SQL !'.$sqlPlace.'<br />'.mysql_error());
						mysql_close();
						
						envoiMail($id_user);
						gestionErreur("Transaction Valide 4", "Mail envoye");
						//$iduser = $id_user;
						//include('mailConfirmation.php');
					} else {
						// Mauvaise adresse email paypal
						gestionErreur("Transaction Non Valide 1", "Mauvaise adresse email Paypal ".$receiver_email);
					}
				//} else {
				// ID de transaction déjà utilisé
				//}
			} else {
				gestionErreur("Transaction Non Valide 2", "Echec de paiement");
				// Statut de paiement: Echec
			}
		}
		else if (strcmp ($res, "INVALID") == 0) {
			// Transaction invalide      
			gestionErreur("Transaction Non Valide 3", "Transaction invalide");     
		}

	}
	fclose ($fp);
}

?>
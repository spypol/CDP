<?php

/*------------------------------------------------------------------*/
/*---------------------INSERTION EN BASE----------------------------*/
/*------------------------------------------------------------------*/
$montantTotal = 0;

$nomSpectateur = $_GET['nomSpectateur'];
$prenomSpectateur = $_GET['prenomSpectateur'];
$mailSpectateur = $_GET['mailSpectateur'];
$telSpectateur = $_GET['telSpectateur'];

$nbtarifadulte = $_GET['nbtarifadulte'];
$nbtarifreduit = $_GET['nbtarifreduit'];
$nbtarifenfant = $_GET['nbtarifenfant'];

$idseance = $_GET['idseance'];

include('connectionDB.php');

$sqlSpectateur = 'INSERT INTO T_SPECTATEUR (SPECTATEUR_NOM, SPECTATEUR_PRENOM, SPECTATEUR_MAIL, SPECTATEUR_TEL) VALUES ("'.$nomSpectateur.'", "'.$prenomSpectateur.'", "'.$mailSpectateur.'", "'.$telSpectateur.'")';

$sqlMaxId = 'SELECT MAX(SPECTATEUR_ID) as maxId from T_SPECTATEUR';

mysql_query ($sqlSpectateur) or die ('Erreur SQL !'.$sqlSpectateur.'<br />'.mysql_error());
$maxId = mysql_query ($sqlMaxId) or die ('Erreur SQL !'.$sqlMaxId.'<br />'.mysql_error());
$maxId = mysql_fetch_array($maxId);
$maxId = $maxId['maxId'];

if($nbtarifadulte != 0){
	$sqlPlaceAdulte = 'INSERT INTO T_PLACE (PLACE_SPECTATEUR_ID, PLACE_SEANCE_ID, PLACE_TARIF_ID, PLACE_NOMBRE, PLACE_ACHETE) VALUES ("'.$maxId.'", "'.$idseance.'", 1, '.$nbtarifadulte.', 0)';
	mysql_query ($sqlPlaceAdulte) or die ('Erreur SQL !'.$sqlPlaceAdulte.'<br />'.mysql_error());
	
	$sqlPrixAdulte = 'SELECT PRIX_VALEUR FROM T_PRIX, T_SEANCE WHERE PRIX_TARIF_ID = 1 AND SEANCE_ID = '.$idseance.' AND PRIX_SALLE_ID = SEANCE_SALLE_ID';
	$prixAdulte = mysql_query ($sqlPrixAdulte) or die ('Erreur SQL !'.$sqlPrixAdulte.'<br />'.mysql_error());
	$prixAdulte = mysql_fetch_array($prixAdulte);
	$prixAdulte = $prixAdulte['PRIX_VALEUR'];
	
	$montantTotal = $montantTotal + $prixAdulte * $nbtarifadulte;
}

if($nbtarifreduit != 0){
	$sqlPlaceReduit = 'INSERT INTO T_PLACE (PLACE_SPECTATEUR_ID, PLACE_SEANCE_ID, PLACE_TARIF_ID, PLACE_NOMBRE, PLACE_ACHETE) VALUES ("'.$maxId.'", "'.$idseance.'", 4, '.$nbtarifreduit.', 0)';
	mysql_query ($sqlPlaceReduit) or die ('Erreur SQL !'.$sqlPlaceReduit.'<br />'.mysql_error());
	
	$sqlPlaceReduit = 'SELECT PRIX_VALEUR FROM T_PRIX, T_SEANCE WHERE PRIX_TARIF_ID = 4 AND SEANCE_ID = '.$idseance.' AND PRIX_SALLE_ID = SEANCE_SALLE_ID';
	$prixReduit = mysql_query ($sqlPlaceReduit) or die ('Erreur SQL !'.$sqlPlaceReduit.'<br />'.mysql_error());
	$prixReduit = mysql_fetch_array($prixReduit);
	$prixReduit = $prixReduit['PRIX_VALEUR'];
	
	$montantTotal = $montantTotal + $prixReduit * $nbtarifreduit;
}

if($nbtarifenfant != 0){
	$sqlPlaceEnfant = 'INSERT INTO T_PLACE (PLACE_SPECTATEUR_ID, PLACE_SEANCE_ID, PLACE_TARIF_ID, PLACE_NOMBRE, PLACE_ACHETE) VALUES ("'.$maxId.'", "'.$idseance.'", 2, '.$nbtarifenfant.', 0)';
	mysql_query ($sqlPlaceEnfant) or die ('Erreur SQL !'.$sqlPlaceEnfant.'<br />'.mysql_error());
	
	$sqlPrixEnfant = 'SELECT PRIX_VALEUR FROM T_PRIX, T_SEANCE WHERE PRIX_TARIF_ID = 2 AND SEANCE_ID = '.$idseance.' AND PRIX_SALLE_ID = SEANCE_SALLE_ID';
	$prixEnfant = mysql_query ($sqlPrixEnfant) or die ('Erreur SQL !'.$sqlPrixEnfant.'<br />'.mysql_error());
	$prixEnfant = mysql_fetch_array($prixEnfant);
	$prixEnfant = $prixEnfant['PRIX_VALEUR'];
	
	$montantTotal = $montantTotal + $prixEnfant * $nbtarifenfant;
}

mysql_close();

/*------------------------------------------------------------------*/
/*---------------------CHIFFREMENT----------------------------------*/
/*------------------------------------------------------------------*/
/* Charge un chiffrement */
$td = mcrypt_module_open('rijndael-256', '', 'ofb', '');

/* Crée le VI et détermine la taille de la clé */
$iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_DEV_RANDOM);
$ks = mcrypt_enc_get_key_size($td);

/* Crée la clé */
$key = substr(md5('code2319'), 0, $ks);

/* Intialise le chiffrement */
mcrypt_generic_init($td, $key, $iv);

/* Chiffre les données */
$donneeAencoder = $montantTotal.'+'.$maxId;
$encrypted = mcrypt_generic($td, $donneeAencoder);

/* Libère le gestionnaire de chiffrement */
mcrypt_generic_deinit($td);

$variableEncode = urlencode($encrypted);


/*------------------------------------------------------------------*/
/*---------------------FORMULAIRE PAYPAL----------------------------*/
/*------------------------------------------------------------------*/
?>
<section>
<h2>Réservez vos tickets !</h2>
<?php echo 'Le montant total à payer est le suivant : <strong>'.$montantTotal.'€</strong>'; ?>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
	 <input type="hidden" name="hosted_button_id" value="HL2L8ZJYWUHBL">  
    <input type="hidden" name="cmd" value="_xclick"> 
    <input type="hidden" name="business" value="compotedeprod@gmail.com">  
    <input type="hidden" name="item_name" value="Billets de la comedie musicale Alice">  
    <input type="hidden" name="amount" value="<?php echo $montantTotal; ?>">  
    <input type="hidden" name="no_note" value="1">  
	 <input name="lc" type="hidden" value="FR" />
	 <input name="custom" type="hidden" value="<?php echo $maxId; ?>" />
    <input type="hidden" name="currency_code" value="EUR">  
    <input type="hidden" name="return" value="http://www.compotedeprod.com/_achat/validation.php?c=<?php echo $variableEncode; ?>">
	 <input name="cancel_return" type="hidden" value="http://www.compotedeprod.com/include/annulation.php" />
	 <input name="notify_url" type="hidden" value="http://www.compotedeprod.com/include/notification.php" />
    <input type="image" id="imagePaypal" src="https://www.paypal.com/fr_FR/FR/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - la solution de paiement en ligne la plus simple et la plus sécurisée !">
	<img alt="" border="0" src="https://www.paypal.com/fr_FR/i/scr/pixel.gif" width="1" height="1" class="paypalsmall"> 
</form>

<div id="mentionsLegales">
	Mentions légales conformément à la <strong>Loi n°2004-575 du 21 juin 2004 pour la confiance dans l'économie numérique.</strong>
<br /><br />
	Nous vous remercions de votre visite sur notre site www.compotedeprod.com<br />
	Vous trouverez, ci-dessous, les informations légales concernant le site que vous venez de visiter. En réservant vos places sur ce site, vous êtes présumé, en votre qualité d'utilisateur, connaître les conditions d'usage figurant ci-après et les conditions spécifiques relatives à certains services de ce site et en accepter les termes.<br />
	Les présentes conditions générales de vente définissent les droits et obligations des parties dans le cadre des ventes effectuées via le site www.compotedeprod.com.
	<br /><br />
	<strong>INFORMATIONS LEGALES</strong>
	Nom de l’Association : Compote de Prod
	Adresse :
	Code postal
	Commune
	N° de Siren
	Contacts : contacts@compotedeprod.com
<br /><br />
	  <strong> 1- Informatique et libertés (CNIL)</strong>
	<br />
	L’association s'engage à respecter votre vie privée et à protéger les informations que vous lui communiquez, qui sont principalement destinées à la bonne réservation de vos places de spectacles
	<br />
	  <strong> 2- Droit d'auteur / Copyright</strong>
	<br />
	L'accès au site www.compotedeprod.com vous confère un droit d'usage privé et non exclusif de ce site. L'ensemble des informations présentes sur ce site peuvent être téléchargées, reproduites, imprimées sous réserve de :<br />
	* n'utiliser de telles informations qu'à des fins personnelles et en aucune manière à des fins commerciales ;<br />
	* ne pas modifier de telles informations ;<br />
	* reproduire sur toutes copies la mention des droits d'auteur ("le copyright") .<br />
	Toute autre utilisation non expressément autorisée est strictement interdite sans autorisation préalable et écrite de l’association Compote de Prod
	L'utilisation frauduleuse du nom de l’association ou de tout autre contenu du site internet est totalement interdite. L’association sera de ses droits de propriété intellectuelle pour engager des poursuites si nécessaire.<br />
	  <strong> 3- Responsabilité</strong><br />
	L’association est responsable de l'exactitude, des erreurs et des omissions contenues sur ce site, mais ne donne aucune garantie, explicite ou implicite, et n'assume aucune responsabilité relative à l'utilisation de ces informations. L'utilisateur est seul responsable de l'utilisation qu'il en fait. L’association réserve le droit de modifier à tout moment les présentes informations notamment en actualisant ce site.<br />
	L'utilisateur s'engage à ne transmettre sur ce site aucune information pouvant entraîner une responsabilité civile ou pénale et s'engage à ce titre à ne pas divulguer via ce site des informations illégales, contraires à l'ordre public ou diffamatoires.<br />
	 <strong>  4- Responsabilité</strong><br />
	Des liens vers d'autres sites peuvent vous faire sortir du site www.compotedeprod.com. Nous n'acceptons aucune responsabilité pour la forme, le contenu, la véracité des informations et la fonction de ces sites. Ces liens sont établis de bonne foi et nous ne pouvons être tenus pour responsables du contenu de ces sites.<br />
	   <strong>5- Indisponibilité du site www.compotedeprod.com</strong><br />
	L’association s'engage à faire ses meilleurs efforts pour assurer aux utilisateurs une accessibilité du site à tout moment. Compote de Prod ne pourra être tenu responsable, en cas d'indisponibilité du site, pour quelque cause que ce soit.<br />
</div>
</section>
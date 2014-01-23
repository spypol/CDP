<?php
/* Charge un chiffrement */
$td = mcrypt_module_open('rijndael-256', '', 'ofb', '');

/* Crée le VI et détermine la taille de la clé */
$iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_DEV_RANDOM);
$ks = mcrypt_enc_get_key_size($td);

/* Crée la clé */
$key = substr(md5('code2319'), 0, $ks);

//$encrypted = urldecode($_GET['c']);
$encrypted = urldecode("a");

/* Initialise le module de chiffrement pour le déchiffrement */
mcrypt_generic_init($td, $key, $iv);

/* Déchiffre les données */
$decrypted = mdecrypt_generic($td, $encrypted);

/* Libère le gestionnaire de déchiffrement, et ferme le module */
mcrypt_generic_deinit($td);
mcrypt_module_close($td);

/* Affiche la chaîne */
//echo trim($decrypted);

?>

<?php include('include/head.php'); ?>
		<?php include('include/slider.php'); ?>
        <div class="main-container">
            <div class="main wrapper clearfix">
				
				<?php include('include/menu.php'); ?>
				
				<div id="articles">
					<!-------------------------- ***************** -------------------------->
					<!-------------------------- VALIDATION COLUMN -------------------------->
					<!-------------------------- ***************** -------------------------->
					<article id="contact">
						<section>
							<h1>Vous venez de finaliser votre achat</h1>
                                <p>Votre achat a bien &eacute;t&eacute; pris en compte. <br />
                                Vous recevrez un mail très prochainement. <br />
                                Merci !</p>
						</section>
					</article>		
                </div>
            </div> <!-- #main -->
        </div> <!-- #main-container -->
<?php include('include/footer.php'); ?>

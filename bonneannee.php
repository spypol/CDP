<?php
	$nom = '';
	$prenom = '';
	$email = '';
	$daterep = '';
	$entreprise = '';
	$code = '';
	$human = '';

    $today = date("Y-m-d");

	if (isset($_POST['nom'])) { $nom = $_POST['nom']; }
	if (isset($_POST['prenom'])) { $prenom = $_POST['prenom']; }
	if (isset($_POST['email'])) { $email = $_POST['email']; }
	if (isset($_POST['daterep'])) { $daterep = $_POST['daterep']; }
	if (isset($_POST['entreprise'])) { $entreprise = $_POST['entreprise']; }
	if (isset($_POST['code'])) { $code = $_POST['code']; }
    
    //Mail for CDP admin
    $from = 'From: contact@compotedeprod.com'; 
    $to = 'contact@compotedeprod.com'; 
    $subject = 'Demande de Tickets Bonne Année !';

    $body = "$prenom $nom a envoyé une demande de tickets 'Bonne Année' :\n
            Date : $daterep\n
            Email : $email\n
            Entreprise: $entreprise\n
            Code: $code";
    
    //Mail for Client
    $fromClient = 'From: contact@compotedeprod.com'; 
    $toClient = $email; 
    $subjectClient = 'Demande de Tickets Bonne Année !';

    $bodyClient = "Bonjour $prenom $nom,\n\n Nous avons bien reçu votre demande de tickets, nous vous répondrons très prochainement.\n\n Merci,\n L'équipe Compote de Prod";
?>



<?php include('include/head.php'); ?>

		<?php include('include/slider.php'); ?>

        <div class="main-container">
            <div class="main wrapper clearfix">
				
				<?php include('include/menu.php'); ?>
				
				<div id="articles">
							
					<!-------------------------- ************** -------------------------->
					<!--------------------------  BONNE ANNEE   -------------------------->
					<!-------------------------- ************** -------------------------->
					<article id="contact">
						<section>
							<h1>Bonne année !</h1>
							
							<form method="post" action="bonneannee">
                                
                                <label for="nom" class="lt-ie9 label-ticket">*Nom</label>
								<input name="nom" type="text" placeholder="Nom" value="<?php echo $nom; ?>">
                                <label for="prenom" class="lt-ie9 label-ticket">*Prénom</label>
								<input name="prenom" type="text" placeholder="Prénom" value="<?php echo $prenom; ?>">
                                <label for="email" class="lt-ie9 label-ticket">*Email</label>
								<input name="email" type="email" placeholder="Email" value="<?php echo $email; ?>">
                                
                                <div class="dropdowns">
                                    <label for="daterep" class="lt-ie9 label-ticket">Date de la représentation*</label>
                                    <select name="daterep" id="daterep">
                                        <option value="0">Date de la représentation</option>
                                        <option value="21 Janvier 2015">21 Janvier 2015</option>
                                        <option value="28 Janvier 2015">28 Janvier 2015</option>
                                    </select>
                                </div>
                                
                                <label for="entreprise" class="lt-ie9 label-ticket">*Entreprise</label>
								<input name="entreprise" type="text" placeholder="Entreprise Invitante" value="<?php echo $entreprise; ?>">
								<label for="code" class="lt-ie9 label-ticket">*Code</label>
                                <input name="code" type="text" placeholder="Code de réservation" value="<?php echo $code; ?>">
									
								<input id="submit" class="bouton-rouge" name="submit" type="submit" value="ENVOYER">
								
							</form>
							
							<?php
								if (isset($_POST['submit'])) {
									if ($email !='' && $nom !='' && $prenom !='' && $email !='' && $daterep !='' && $entreprise != '' && $code !='') {
                                        if (mail($to, $subject, $body, $from)) {
											echo "<span class='message_vert'>Votre message a bien &eacute;t&eacute; envoy&eacute; !</span>";
                                            mail($toClient, $subjectClient, $bodyClient, $fromClient);
                                        } else {
                                            echo "<span class='message_rouge'>Oops, nous avons eu un probl&egrave;me, essayez d'envoyer directement un message &agrave; contact@compotedeprod.com !</span>"; }
									} else {
										echo "<span class='message_rouge'>Vous devez remplir tous les champs, merci !</span>";
									}
								}
							?>
							
						</section>
					</article>
					
					
									
			</div>	
				
				
            </div> <!-- #main -->
        </div> <!-- #main-container -->
		
<?php include('include/footer.php'); ?>
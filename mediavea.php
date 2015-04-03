<?php
	$nom = '';
	$prenom = '';
	$email = '';
	$daterep = '';
	$entreprise = 'mediavea';
	$code = '';
	$human = '';

    $today = date("Y-m-d");

	if (isset($_POST['nom'])) { $nom = $_POST['nom']; }
	if (isset($_POST['prenom'])) { $prenom = $_POST['prenom']; }
	if (isset($_POST['email'])) { $email = $_POST['email']; }
	if (isset($_POST['daterep'])) { $daterep = $_POST['daterep']; }
	/*if (isset($_POST['entreprise'])) { $entreprise = $_POST['entreprise']; }*/
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
    $subjectClient = 'Demande de Tickets Mediavea Bonne Année !';

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
						<section id="branding">
                            <img src="img/logos/HD-MV-logo-Media.jpg" class="logo-entreprise"/>
							<h1>vous souhaite une Bonne Année !</h1>
                            <p>Entrez vos données si dessous et votre code de réservation pour recevoir vos tickets.</p>
							
							<form method="post" action="mediavea">
                                
                                <label for="nom" class="lt-ie9 label-ticket">*Nom</label>
								<input name="nom" type="text" placeholder="Nom" value="<?php echo $nom; ?>">
                                <label for="prenom" class="lt-ie9 label-ticket">*Prénom</label>
								<input name="prenom" type="text" placeholder="Prénom" value="<?php echo $prenom; ?>">
                                <label for="email" class="lt-ie9 label-ticket">*Email</label>
								<input name="email" type="email" placeholder="Email" value="<?php echo $email; ?>">
                                
                                <div class="dropdowns">
                                    <label for="daterep" class="lt-ie9 label-ticket">Date de la représentation*</label>
                                    <select name="daterep" id="daterep">
                                        <option value="">Date de la représentation</option>
                                        <option value=" Jeudi 30 Avril 2015 à 19h30">Jeudi 30 Avril 2015 à 19h30</option>
<option value="Vendredi 1er Mai 2015 à 19h30">Vendredi 1er Mai 2015 à 19h30</option>
<option value="Samedi 2 Mai 2015 à 19h30">Samedi 2 Mai 2015 à 19h30</option>
<option value="Dimanche 3 Mai 2015 à 15h">Dimanche 3 Mai 2015 à 15h</option>
<option value=" Jeudi 7 Mai 2015 à 19h30">Jeudi 7 Mai 2015 à 19h30</option>
<option value="Vendredi 8 Mai 2015 à 19h30">Vendredi 8 Mai 2015 à 19h30</option>
<option value="Samedi 9 Mai 2015 à 19h30">Samedi 9 Mai 2015 à 19h30</option>
<option value="Dimanche 10 Mai 2015 à 15h">Dimanche 10 Mai 2015 à 15h</option>
<option value=" Jeudi 14 Mai 2015 à 19h30">Jeudi 14 Mai 2015 à 19h30</option>
<option value="Vendredi 15 Mai 2015 à 19h30">Vendredi 15 Mai 2015 à 19h30</option>
<option value="Samedi 16 Mai 2015 à 19h30">Samedi 16 Mai 2015 à 19h30</option>
<option value="Dimanche 17 Mai 2015 à 15h">Dimanche 17 Mai 2015 à 15h</option>
<option value=" Jeudi 21 Mai 2015 à 19h30">Jeudi 21 Mai 2015 à 19h30</option>
<option value="Vendredi 22 Mai 2015 à 19h30">Vendredi 22 Mai 2015 à 19h30</option>
<option value="Samedi 23 Mai 2015 à 19h30">Samedi 23 Mai 2015 à 19h30</option>
<option value="Dimanche 24 Mai 2015 à 15h">Dimanche 24 Mai 2015 à 15h</option>
<option value=" Jeudi 28 Mai 2015 à 19h30">Jeudi 28 Mai 2015 à 19h30</option>
<option value="Vendredi 29 Mai 2015 à 19h30">Vendredi 29 Mai 2015 à 19h30</option>
<option value="Samedi 30 Mai 2015 à 19h30">Samedi 30 Mai 2015 à 19h30</option>
<option value="Dimanche 31 Mai 2015 à 15h">Dimanche 31 Mai 2015 à 15h</option>
<option value=" Jeudi 4 Juin 2015 à 19h30">Jeudi 4 Juin 2015 à 19h30</option>
<option value="Vendredi 5 Juin 2015 à 19h30">Vendredi 5 Juin 2015 à 19h30</option>
<option value="Samedi 6 Juin 2015 à 19h30">Samedi 6 Juin 2015 à 19h30</option>
<option value="Dimanche 7 Juin 2015 à 15h">Dimanche 7 Juin 2015 à 15h</option>
<option value=" Jeudi 11 Juin 2015 à 19h30">Jeudi 11 Juin 2015 à 19h30</option>
<option value="Vendredi 12 Juin 2015 à 19h30">Vendredi 12 Juin 2015 à 19h30</option>
<option value="Samedi 13 Juin 2015 à 19h30">Samedi 13 Juin 2015 à 19h30</option>
<option value="Dimanche 14 Juin 2015 à 15h">Dimanche 14 Juin 2015 à 15h</option>

                                    </select>
                                </div>
                                
                                <!--<label for="entreprise" class="lt-ie9 label-ticket">*Entreprise</label>
								<input name="entreprise" type="text" placeholder="Entreprise Invitante" value="<?php echo $entreprise; ?>">-->
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
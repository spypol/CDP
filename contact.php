<?php
	$name = '';
	$email = '';
	$message = '';
	$human = '';

	if (isset($_POST['name'])) { $name = $_POST['name']; }
	if (isset($_POST['email'])) { $email = $_POST['email']; }
	if (isset($_POST['message'])) { $message = $_POST['message']; }
	if (isset($_POST['human'])) { $human = $_POST['human']; }
    
    $from = 'From: compotedeprod.com'; 
    $to = 'contact@compotedeprod.com'; 
    $subject = 'Demande de Contact';

    $body = "Envoyé de la part de : $name\n E-Mail: $email\n Message:\n $message";
?>



<?php include('include/head.php'); ?>

		<?php include('include/slider.php'); ?>

        <div class="main-container">
            <div class="main wrapper clearfix">
				
				<?php include('include/menu.php'); ?>
				
				<!--<div id="audioplayer">
					<?php include('include/musicplayer.php'); ?>
				</div>-->
				
				<div id="articles">
							
					<!-------------------------- ************** -------------------------->
					<!-------------------------- CONTACT COLUMN -------------------------->
					<!-------------------------- ************** -------------------------->
					<article id="contact">
						<section>
							<h1>Contactez-nous</h1>
							
							<form method="post" action="contact.php">
        
								<input name="name" type="text" placeholder="Nom" value="<?php echo $name; ?>">
										
								<input name="email" type="email" placeholder="Email" value="<?php echo $email; ?>">
										
								<textarea name="message" placeholder="Message"><?php echo $message; ?></textarea>
									
								<input id="submit" class="bouton-rouge" name="submit" type="submit" value="ENVOYER">
								
								<input id="human" name="human" placeholder="Combien font 2+2 ? (Anti-spam)" value="<?php echo $human; ?>">
								
							</form>
							
							<?php
								if (isset($_POST['submit'])) {
									if ($name != '' && $email != '') {
										if ($human == '4') {				 
											if (mail ($to, $subject, $body, $from)) { 
											echo "<span class='message_vert'>Votre message a bien &eacute;t&eacute; envoy&eacute; !</span>";
										} else { 
											echo "<span class='message_rouge'>Oops, nous avons eu un probl&egrave;me, essayez d'envoyer directement un message &agrave; contact@compotedeprod.com !</span>"; 
										} 
									} else if ($_POST['submit'] && $human != '4') {
										echo "<span class='message_rouge'>Vous n'avez pas v&eacute;rifi&eacute; la question anti-spam !</span>";
									}
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
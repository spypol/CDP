<?php
	$email = '';

	if (isset($_POST['email'])) { $email = $_POST['email']; }
    
    $from = 'From: compotedeprod.com'; 
    $to = 'paulpinier@gmail.com'; 
    $subject = 'Réservation CD Alice';

    $body = "$email\n vient de réserver un CD Alice";
?>

<?php include('include/head.php'); ?>

		<?php include('include/slider.php'); ?>

        <div class="main-container">
            <div class="main wrapper clearfix">
				
				<?php include('include/menu.php'); ?>
				
				<!--<div id="audioplayer">
					<?php include('include/musicplayer.php'); ?>
				</div>-->
				
				<div id="articles" style="margin-bottom:140px;">
							
					<!-------------------------- ************** -------------------------->
					<!-------------------------- CD STP COLUMN -------------------------->
					<!-------------------------- ************** -------------------------->
					<article id="acheter-cd-stp">
						<section>
							<h1>Achetez votre CD Souviens-toi Pan !</h1>
                            
                            <p>Afin de découvrir l'univers de "Souviens-toi, Pan!", achetez le CD live de la comédie musicale !</p>
                            <img src="img/cd-stp.png" title="CD Souviens toi Pan" />
                            
                            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" id="paypal">
                                <input type="hidden" name="cmd" value="_s-xclick">
                                <input type="hidden" name="hosted_button_id" value="DA7MM57C4M2EA">
                                <table>
                                <tr><td><input type="hidden" name="on0" value="Nombre de CD">Nombre de CD</td></tr><tr><td><select name="os0">
                                    <option value="1 CD">1 CD €8,90 EUR</option>
                                    <option value="2 CDs">2 CDs €15,00 EUR</option>
                                    <option value="3 CDs">3 CDs €20,00 EUR</option>
                                </select> </td></tr>
                                </table>
                                <input type="hidden" name="currency_code" value="EUR">
                                <input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - la solution de paiement en ligne la plus simple et la plus sécurisée !">
                                <img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
                            </form>

                          
						</section>
					</article>
                    
                    <!-------------------------- *************** -------------------------->
					<!-------------------------- CD ALICE COLUMN -------------------------->
					<!-------------------------- *************** -------------------------->
					<article id="acheter-cd-alice">
						<section>
							<h1>Bientôt le CD 2 titres de Alice !</h1>
                            
                            <p>Comme Alice, laissez-vous guider par la Chat du Cheshire et la Chenille, jazzy et sensuelle. Saurez-vous reconnaitre et attraper le Lapin Blanc ? Pour le savoir acheter le CD 2 titres de la comédie musicale "Alice" et découvrez les toutes premières chansons interprétées par la troupe.</p>
                            <img src="img/cd-alice.png" title="CD Alice" id="cd-alice" />
                            
                            <?php
								if (isset($_POST['submit'])) {
									if ($email != '') {			 
                                         if (mail ($to, $subject, $body, $from)) { 
                                             echo "<span class='message_vert'>Votre r&eacute;servation a bien &eacute;t&eacute; envoy&eacute;e !</span>";
                                         } else { 
                                             echo "<span class='message_rouge'>Oops, nous avons eu un probl&egrave;me, essayez d'envoyer directement un message &agrave; contact@compotedeprod.com !</span>"; 
                                         }
									} else {
										echo "<span class='message_rouge'>Vous devez remplir tous les champs, merci !</span>";
									}
								} else {?>
                            
                                    <p><i>Envoyer nous votre email pour rester au courant de la sortie du CD</i></p>
                            
                                    <form method="post" action="acheter-cd.php">
                                                
                                        <input name="email" type="email" placeholder="Email" value="<?php echo $email; ?>">
                                                
                                        <input id="submit" class="bouton-rouge" name="submit" type="submit" value="ENVOYER">
                                        
                                    </form>
                            
                                <?php }
							?>
							
						</section>
					</article>
					
					
									
			</div>	
				
				
            </div> <!-- #main -->
        </div> <!-- #main-container -->
		
<?php include('include/footer.php'); ?>
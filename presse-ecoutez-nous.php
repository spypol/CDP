<?php
	$code = '';

	if (isset($_POST['code'])) { $code = strtoupper($_POST['code']); }

?>



<?php include('include/head-alice.php'); ?>

		<?php include('include/slider-alice.php'); ?>

        <div class="main-container">
            <div class="main wrapper clearfix">
				
				<?php include('include/menu.php'); ?>
				
				<!--<div id="audioplayer">
					<?php include('include/musicplayer.php'); ?>
				</div>-->
				
				<div id="articles">
							
					<!-------------------------- ************** -------------------------->
					<!-------------------------- PRESSE COLUMN -------------------------->
					<!-------------------------- ************** -------------------------->
					<article id="contact">
						<section>
							<h1>Écoutez-nous !</h1>
							
							
							<?php
								if (isset($_POST['submit'])) {
									if ($code != 'FREEPRESSE2014') {
                                        
                                        ?>
                                            <p>Entrez le code qui vous a été envoyé pour écouter cinq chansons extraites de la comédie musicale Alice !</p>
                                            <form method="post" action="presse-ecoutez-nous">
                        
                                                <input name="code" type="text" placeholder="CODE" id="code" value="<?php echo $code; ?>">
                                                        
                                                <input id="ecouter" class="bouton-rouge" name="submit" type="submit" value="ECOUTER">
                                                
                                            </form>
                                        <?php
                                        
								        echo "<span class='message_rouge' id='code_rouge'>Code invalide</span>";
									} else {
                                       ?>
                                        <!-- PLAYER-->
                                        <p>Vous trouverez ci-dessous cinq chansons intégrales de la comédie musicale Alice !</p>
                            
                                        <div class="responsive-audio progression-small responsive-wrapper" style="max-width:99%;">
                                            <audio class="progression-playlist-presse progression-skin progression-default-dark progression-audio-player" controls="controls" preload="none">
                                                
                                                <source src="media/presse/musiques/01 - La pour Chat.mp3" title="Là pour Chat !" type="audio/mp3"/>
                                                <source src="media/presse/musiques/02 - Le Poeme du Crocodile.mp3" title="Le Poème du Crocodile" type="audio/mp3"/>
                                                <source src="media/presse/musiques/05---2014.02.16---Mix-v2.1.mp3" title="En retard !" type="audio/mp3"/>
                                                <source src="media/presse/musiques/14---2014.03.16---mix-v1.mp3" title="Les jardins de la Reine de Cœur" type="audio/mp3"/>
                                                <source src="media/presse/musiques/17---2014.03.19---mix-v1.2.mp3" title="Riche de temps" type="audio/mp3"/>
                                            </audio>
                                        </div>
                                        
                                        <?php
                                    }
								} else {
                                    ?>
                                        <p>Entrez le code qui vous a été envoyé pour écouter cinq chansons extraites de la comédie musicale Alice !</p>
                                        <form method="post" action="presse-ecoutez-nous">
                    
                                            <input name="code" type="text" placeholder="CODE" id="code" value="<?php echo $code; ?>">
                                                    
                                            <input id="ecouter" class="bouton-rouge" name="submit" type="submit" value="ECOUTER">
                                            
                                        </form>
                                    <?php
                                }
							?>
							
						</section>
					</article>
					
					
									
			</div>	
				
				
            </div> <!-- #main -->
        </div> <!-- #main-container -->
		
<?php include('include/footer.php'); ?>
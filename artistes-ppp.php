<?php include('include/head-ppp.php'); ?>

		<?php include('include/slider-ppp.php'); ?>

        <div class="main-container">
            <div class="main wrapper clearfix">
				
				<?php include('include/menu.php'); ?>
			
							
				<!-------------------------- *********************** -------------------------->
				<!-------------------------- MAIN STP ARTISTS COLUMN -------------------------->
				<!-------------------------- *********************** -------------------------->
                <div id="articles">
                    <article id="photo-vignettes" class="div-laptop">					
                        <h1>Les Com&eacute;diens</h1>
                        
                        <img src="_photos/troupe/ppp/avatars/charline.jpg" class="vignette artistes-ppp " id="charline" title="Charline Abanades" />
                        <img src="_photos/troupe/ppp/avatars/jessy.jpg" class="vignette artistes-ppp " id="jessy" title="Jessy Roussel" />
                        <img src="_photos/troupe/ppp/avatars/emma.jpg" class="vignette artistes-ppp " id="emma" title="Emma Brazeilles" />
                        <img src="_photos/troupe/ppp/avatars/alain.jpg" class="vignette artistes-ppp " id="alain" title="Alain Tournay" />
                    </article>
                    
                    <article id="photo-vignettes" class="div-laptop">
                        <h1>La Cr&eacute;ation</h1>
                        <img src="_photos/troupe/ALICE/avatars/juliengoetz.jpg" class="vignette artistes-ppp" id="julien" title="Julien Goetz"/>
                        <img src="_photos/troupe/STP/170/rita.jpg" class="vignette artistes-ppp" id="rita" title="Rita Lalle"/>
                        <img src="_photos/troupe/STP/170/greg.jpg" class="vignette artistes-ppp" id="greg" title="Gregory Pennaneac'h"/>
                        <img src="_photos/troupe/STP/170/patrick.jpg" class="vignette artistes-ppp" id="patrick" title="Patrick Bernard"/>
                    </article>
                    
                    
                    <div id="details" class="div-laptop">
                        <?php include('include/artistes/charline.php'); ?>
                    </div>
                    
                    
                    <!-------------------------- Smartphone -------------------------->
                    <div id="details-smartphone">
                        <h1>Les Com&eacute;diens</h1>
                        <article id="artiste-details">
                            <?php include('include/artistes/charline.php'); ?>
                        </article>
                        <article id="artiste-details">
                            <?php include('include/artistes/jessy.php'); ?>
                        </article>
                        <article id="artiste-details">
                            <?php include('include/artistes/emma.php'); ?>
                        </article>
                        <article id="artiste-details">
                            <?php include('include/artistes/alain.php'); ?>
                        </article>
                        
                        <h1>La Cr&eacute;ation</h1>
                        
                        <article id="artiste-details">
                            <?php include('include/artistes/julien.php'); ?>
                        </article> 
                        <article id="artiste-details">
                            <?php include('include/artistes/rita.php'); ?>
                        </article>
                        <article id="artiste-details">
                            <?php include('include/artistes/greg.php'); ?>
                        </article>
                        <article id="artiste-details">
                            <?php include('include/artistes/patrick.php'); ?>
                        </article>
                        <article id="artiste-details">
                    </div>
                </div>    
            </div> <!-- #main -->
        </div> <!-- #main-container -->
		
<?php include('include/footer.php'); ?>
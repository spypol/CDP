<?php include('include/head-alice.php'); ?>

		<?php include('include/slider-alice.php'); ?>
		
        <div class="main-container">
            <div class="main wrapper clearfix">
				
				<?php include('include/menu.php'); ?>
							
				<!-------------------------- ************** -------------------------->
				<!-------------------------- MENU HORIZONTAL-------------------------->
				<!-------------------------- ************** -------------------------->
				<!--<div id="menu">
					<ul>
						<li><a href="#histoire">L'histoire</a></li>
						<li><a href="#spectacle">Le Spectacle</a></li>
						<li><a href="#troupe">La troupe</a></li>
						<li><a href="#photos">Photos</a></li>
						<li><a href="#goodies">Goodies</a></li>
					</ul>
				</div>-->
				
				<div id="audioplayer">
					<?php include('include/musicplayer-alice.php'); ?>
                    <!--<h3><a href="/acheter-cd">Achetez votre CD</a></h3>-->
				</div>
			
				<!-------------------------- ***************** -------------------------->
				<!-------------------------- MAIN ALICE COLUMN -------------------------->
				<!-------------------------- ***************** -------------------------->
                <div id="articles-left">
					
					<!-------------------------- ******************* -------------------------->
					<!-------------------------- LEFT         COLUMN -------------------------->
					<!-------------------------- ******************* -------------------------->
					<article id="alice">
						<section>
							<h1 class="homepage">Alice</h1>
							<!--<img src="img/ALICE_affiche.jpg" class="img_header" />-->
							
							<p>
								Alice est une petite fille bien curieuse, qui a soif de grandir ! Apr&egrave;s tout, elle connait ses le&ccedil;ons, a bien appris sa po&eacute;sie, alors pourquoi ne serait-elle pas adulte ? Elle veut tout voir, tout conna&icirc;tre, parcourir le monde et devenir &agrave; son tour une grande personne.   
							</p>
							<p>
								Notre h&eacute;ro&iuml;ne va alors plonger dans un monde fantastique, d&eacute;nu&eacute; de toute logique : le Pays des Merveilles. Alice explore ce nouvel univers tant&ocirc;t fabuleux, tant&ocirc;t inqui&eacute;tant, peupl&eacute; de personnages loufoques.
							</p>
							<p>
								Dans cet univers comme nulle part ailleurs, Alice rencontre tour &agrave; tour un lapin blanc, une chenille, un chat, une m&eacute;chante Reine de C&oelig;ur&hellip; et gr&acirc;ce &agrave; ces personnages fantastiques et d&eacute;lirants sortis tout droit de l&rsquo;imaginaire d&rsquo;Alice, notre narrateur va lui faire prendre conscience &agrave; travers diff&eacute;rentes &eacute;preuves qu&rsquo;il n&rsquo;est jamais bon de grandir trop vite ... 
							</p>
						</section>
						
						<footer>
							<a href="https://www.facebook.com/pages/Alice-la-com%C3%A9die-musicale/159036774295626" title="Alice sur Facebook" target="_blank"><i class="fa fa-facebook fa-2x cdp-social"></i></a>
							<a href="https://twitter.com/SouviensToiPan" title="Alice sur Twitter" target="_blank"><i class="fa fa-twitter fa-2x cdp-social"></i></a>
						</footer>
					</article>
					
					<?php include('include/social-alice.php'); ?>
				
				</div>
				<div id="articles-right">
				
					<!-------------------------- *************** -------------------------->
					<!-------------------------- RIGH     COLUMN -------------------------->
					<!-------------------------- *************** -------------------------->
					<article id="photos">
						<section>
							<h1 class="homepage">Photos</h1>
														
							<div class="slider-wrapper theme-default gallery gallery-alice-wrapper">
                                <div id="photos-alice-enregistrement" class="gallery-alice">
                                    <h4>La Création d'Alice</h4>
                                    <?php include('include/galleries/alice-debut.php'); ?>
                                </div>
							</div>

                            <div class="slider-wrapper theme-default gallery gallery-alice-wrapper">
								<div id="photos-alice-premiere" class="gallery-alice">
                                    <h4>Alice au Théâtre Clavel</h4>
                                    <?php include('include/galleries/alice-clavel.php'); ?>
							     </div>
							</div>
                            
                            <div class="slider-wrapper theme-default gallery gallery-alice-wrapper">
								<div id="photos-alice-premiere" class="gallery-alice">
                                    <h4>Alice au Vingtième Théâtre</h4>
                                    <?php include('include/galleries/alice-vingtieme.php'); ?>
							     </div>
							</div>
                            
						</section>
					</article>
					
					<article id="video">
						<section>
							<h1>Vid&eacute;os</h1>
                            <iframe width="500" height="281" src="//www.youtube.com/embed/D9JfjfCNPKs" frameborder="0" allowfullscreen></iframe>
							<iframe class="playerVimeo" src="//player.vimeo.com/video/96253334?title=0&amp;byline=0&amp;portrait=0" width="650" height="400" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
						</section>
					</article>
					
				</div>
            </div> <!-- #main -->
        </div> <!-- #main-container -->
		
<?php include_once('include/footer.php');

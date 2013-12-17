<?php
	session_start();
	if(!isset($_SESSION['login'])) {
		header('Location: index.php');
	}
	header("Content-Type: text/html; charset=iso-8859-1");
	$isAdmin = $_SESSION['isAdmin'];
	$userData = $_SESSION['userData'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

	<link rel="shortcut icon" href="/images/favicon.ico" />
	<link href="images/logos/peter.png" rel="apple-touch-icon" />
	<link href="_css/style.css" rel="stylesheet" type="text/css" media="screen" />
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" /> 
	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
	<script type="text/javascript" src="_js/iutil.js"></script> 
	<script type="text/javascript" src="_js/idrag.js"></script>
	<script type="text/javascript" src="_js/cms.js"></script>
	
	<title>Administration - Souviens-toi Pan !</title>
</head>

<body id="accueil">
	
	<!--- LES FORMS DE CREATION -->
	<?php include('_forms/forms_cms_creation.php') ?>

	<form action="requetescms/modifierform.php" class='puForm' method="post" id="modifierform" enctype="multipart/form-data" style="width:450px;">
		<img src="images/delete.gif" name="fermer" alt="Fermer" width="15" class="closeBox"/>
			<h3 class="titreform"></h3>

		<div id="contact">
			<input type="hidden" name="elementnom" id="elementnom" value="">
			<input type="hidden" name="actuid" id="actuid" value="">
			<textarea name="nomFichier" cols="70" rows="3" id="nomFichier"></textarea>
		</div>
		<div style="float:right;">
			<button type='submit'>Enregistrer</button>
		</div>
    </form>
	
	<!-- MISE EN PAGE -->
	<img src="images/titreback.png" border="0" width="350" style="float:none;" />

	<div id="title" style="position:absolute; top:5px; right:5px;float:left;color:#EEE;font-size:30px; text-align:right;">
		CMS<br />
		<?php if($isAdmin == 1){ ?><span style="font-size:16px;"><a href="vente.php" style="color:#CCC; text-decoration:none;">Ventes</a></span><?php } ?><br />
		<?php if($isAdmin == 1){ ?><span style="font-size:16px;"><a href="accueil.php" style="color:#CCC; text-decoration:none;">Intranet</a></span><?php } ?>
	</div>
	<span id="date" style="position:absolute; top:5px; right:165px; float:right;color:#EEE;font-size:10px;">
		<?php
			echo "Bienvenue " . $userData . " - ";
			$date = date("d-m-Y");
			Print("$date");
		?>
	- 	<a href="deconnect.php" style="color:#CCC;">D&eacute;connexion</a>
	</span>

	<div class="formulaire" id="formVideo">
		Test
	</div>

   <div align="center">
		<?php if($isAdmin == 1){ ?>
			<!--LES ACTUALITES -->
	    	<div class="box" id="box_actualite">
				<img src="images/actualites.png" name="Actualites" style="float:left; margin:3px 0 0 3px;" width="32"/><h1 style="float:left;">Actualit&eacute;s</h1>
				<?php if($isAdmin == 1){ ?>
					<span class="ajout" id="actualiteform">
						<img src="images/add.png" name="addActu" alt="Ajouter doc" width="20" style="cursor:pointer; float:right; padding: 4px 7px 0 0; border:0px;">
					</span>
				<?php } ?>
				<br /><br /><br />
				<ul>
					<?php 
						$list = 'actualite';
						include("requetescms/lister.php"); 
					?>
				</ul>
	      </div>

			<!-- LA VIDEO -->
			<div class="box" id="box_video_accueil" style="display:none;">
				<img src="images/video.png" name="Videos" style="float:left; margin:3px 0 0 3px;" width="32px;"/><h1 style="float:left;">Vid&eacute;o</h1>
				<?php if($isAdmin == 1){ ?>
					<span class="ajout" id="videoform">
						<img src="images/add.png" name="addvideo" alt="Ajouter vid&eacute;o" width="20" style="cursor:pointer; float:right; padding: 4px 7px 0 0; border:0px;">
					</span>
				<?php } ?>
				<br /><br /><br />
				<ul>
					<?php
						$list = 'video';
						include("requetescms/lister.php"); 
					?>
				</ul>
	      </div>

	  		<!--LES MUSIQUES -->
			<div class="box" id="box_musique" style="display:none;">
				<img src="images/musique.png" name="Musiques" style="float:left; margin:3px 0 0 3px;" width="32"/><h1 style="float:left;">Musiques</h1>
				<?php if($isAdmin == 1){ ?>
					<span class="ajout" id="musiqueform">
						<img src="images/add.png" name="ajouterMusic" alt="Ajouter musique" width="20" style="cursor:pointer; float:right; padding: 4px 7px 0 0; border:0px;">
					</span>
				<?php } ?>
				<br /><br /><br />
				<ul>
					<?php
						$list = 'musique';
						include("requetescms/lister.php"); 
					?>
				</ul>
	      </div>

			<!--LES RUBRIQUES -->
			<div class="box" id="box_rubrique" style="display:none;">
				<img src="images/rubriques.png" name="Rubriques" style="float:left; margin:3px 0 0 3px;" width="32"/><h1 style="float:left;">Rubriques</h1>
				<?php if($isAdmin == 1){ ?>
					<span class="ajout" id="rubriqueform">
						<img src="images/add.png" name="ajouterChanson" alt="Ajouter parole" width="20" style="cursor:pointer; float:right; padding: 4px 7px 0 0; border:0px;">
					</span>
				<?php } ?>
				<br /><br /><br />
				<ul>
					<?php
						$list = 'rubrique';
						include("requetescms/lister.php"); 
					?>
				</ul>
	      </div>

			<!--LE MENU -->
			<div class="box" id="box_menu" style="display:none;">
				<img src="images/menu.png" name="Menu" style="float:left; margin:3px 0 0 3px;" width="32"/><h1 style="float:left;">Menu</h1>
				<?php if($isAdmin == 1){ ?>
					<span class="ajout" id="menuform">
						<img src="images/add.png" name="ajouterMenu" alt="Ajouter photos" width="20" style="cursor:pointer; float:right; padding: 4px 7px 0 0; border:0px;">
					</span>
				<?php } ?>
				<br /><br /><br />
				<ul>
					<?php
						$list = 'menu';
						include("requetescms/lister.php"); 
					?>
				</ul>
	      </div>

	      <!--LE SOCIAL-->
			<div class="box" id="box_social" style="display:none;">
				<img src="images/social.png" name="social" style="float:left; margin:3px 0 0 3px;" width="32"/><h1 style="float:left;">Social</h1>
					<span class="ajout" id="socialform">
						<img src="images/add.png" name="ajouterSocial" alt="Ajouter social" width="20" style="cursor:pointer; float:right; padding: 4px 7px 0 0; border:0px;">
					</span>
				<br /><br /><br />
				<ul>
					<?php
						$list = 'web2';
						include("requetescms/lister.php"); 
					?>
				</ul>
	      </div>
			
		<?php } ?>
		
		<div style="float:left; color:#DDD; height:30px; text-align:left; width:800px;">
		<?
			include('requetes/newUser.php');
		?>
		<br />
		
	</div>
  </div>


</body>
</html>
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
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<link rel="shortcut icon" href="/images/favicon.ico" />
	<link href="images/logos/peter.png" rel="apple-touch-icon" />
	<link href="_css/style.css" rel="stylesheet" type="text/css" media="screen" />

	<title>Administration - Souviens-toi Pan !</title>

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
	<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/jquery-ui.min.js'></script>
	<script type="text/javascript" src="_js/iutil.js"></script> 
	<script type="text/javascript" src="_js/idrag.js"></script>
	
	<script type="text/javascript" src="_js/admin.js"></script>
</head>

<body id="accueil">
	
	<!--- LES FORMS CACHES -->
	<!--- FORM DE MODIFICATION -->
	<form action="/admin/requetes/modifierform.php" class='puForm' method="post" id="modifierform" enctype="multipart/form-data" >
	        <img src="images/delete.gif" name="fermer" alt="Fermer" width="15" class="closeBox"/>
				<h3 class="titreform"></h3>

	        <div id="contact">
				<input type="hidden" name="elementid" id="elementid" value="">
				<input type="hidden" name="elementnom" id="elementnom" value="">
	        	<label>Nom :<input type="text" name="nomFichier" size="40" id="nomFichier" value=""/></label>
				Lien<input type="radio" name="lienactif" value="1" id="lienselecteddocument" checked> ou Fichier<input type="radio" name="lienactif" id="fichierselecteddocument" value="0">
	
	 			<label id="lienDocument" style="display:block;">Lien :&nbsp;<input type="text" name="nomLien" size="40"/></label>
	        	<label id="fichierDocument" style="display:none;">Fichier :<input type="file" name="lienFichier" id="lienFichier" /></label>
	        </div>
	        <div style="float:right;">
	            <button type='submit'>Enregistrer</button>
	        </div>
    </form>

	<!--- LES DOCUMENTS -->
	<form action="/admin/requetes/ajoutDoc.php" class='puForm' method="post" id="documentform" enctype="multipart/form-data" >
	        <img src="images/delete.gif" name="fermer" alt="Fermer" width="15" class="closeBox"/>
				<h3>Ajouter un document</h3>

	        <div id="contact">
	        	<label>Nom :<input type="text" name="nomFichier" size="40" id="nomFichier"/></label>
				Lien<input type="radio" name="lienactif" value="1" id="lienselecteddocument" checked> ou Fichier<input type="radio" name="lienactif" id="fichierselecteddocument" value="0">
	
	 			<label id="lienDocument" style="display:block;">Lien :&nbsp;<input type="text" name="nomLien" size="40"/></label>
	        	<label id="fichierDocument" style="display:none;">Fichier :<input type="file" name="lienFichier" id="lienFichier" /></label>
	        </div>
	        <div style="float:right;">
	            <button type='submit'>Enregistrer</button>
	        </div>
    </form>
	<!--- LES PHOTOS -->
	<form action="/admin/requetes/ajoutPhoto.php" class='puForm' method="post" id="photoform" enctype="multipart/form-data" >
	        <img src="images/delete.gif" name="fermer" alt="Fermer" width="15" class="closeBox"/>
				<h3>Ajouter un fichier photo</h3>

	        <div id="contact">
	        	<label>Nom :<input type="text" name="nomFichier" size="40" id="nomFichier"/></label>
	        	<label>Fichier :<input type="file" name="lienFichier" id="lienFichier" /></label>
	        </div>
	        <div style="float:right;">
	            <button type='submit'>Enregistrer</button>
	        </div>
    </form>
    <!--- LES CHANSONS -->
	<form action="/admin/requetes/ajoutChanson.php" class='puForm' method="post" id="chansonform" enctype="multipart/form-data" >
	        <img src="images/delete.gif" name="fermer" alt="Fermer" width="15" class="closeBox"/>
				<h3>Ajouter des paroles</h3>

	        <div id="contact">
	        	<label>Nom :<input type="text" name="nomFichier" size="40" id="nomFichier"/></label>
	        	<label>Fichier :<input type="file" name="lienFichier" id="lienFichier" /></label>
	        </div>
	        <div style="float:right;">
	            <button type='submit'>Enregistrer</button>
	        </div>
    </form>
    <!--- LA GESTION -->
	<form action="/admin/requetes/ajoutGestion.php" class='puForm' method="post" id="gestionform" enctype="multipart/form-data" >
	        <img src="images/delete.gif" name="fermer" alt="Fermer" width="15" class="closeBox"/>
				<h3>Ajouter un document de gestion</h3>

	        <div id="contact">
	        	<label>Nom :<input type="text" name="nomFichier" size="40" id="nomFichier"/></label>
				Lien<input type="radio" name="lienactif" value="1" id="lienselectedgestion" checked> ou Fichier<input type="radio" name="lienactif" id="fichierselectedgestion" value="0">
	
	 			<label id="lienGestion" style="display:block;">Lien :&nbsp;<input type="text" name="nomLien" size="40"/></label>
	        	<label id="fichierGestion" style="display:none;">Fichier :<input type="file" name="lienFichier" id="lienFichier" /></label>
	        </div>
	        <div style="float:right;">
	            <button type='submit'>Enregistrer</button>
	        </div>
    </form>
    <!--- LA COMMUNICATION -->
	<form action="/admin/requetes/ajoutCommunication.php" class='puForm' method="post" id="communicationform" enctype="multipart/form-data" >
	        <img src="images/delete.gif" name="fermer" alt="Fermer" width="15" class="closeBox"/>
				<h3>Ajouter un document de communication</h3>

	        <div id="contact">
	        	<label>Nom :<input type="text" name="nomFichier" size="40" id="nomFichier"/></label>
				Lien<input type="radio" name="lienactif" value="1" id="lienselectedcommunication" checked> ou Fichier<input type="radio" name="lienactif" id="fichierselectedcommunication" value="0">
	
	 			<label id="lienCommunication" style="display:block;">Lien :&nbsp;<input type="text" name="nomLien" size="40"/></label>
	        	<label id="fichierCommunication" style="display:none;">Fichier :<input type="file" name="lienFichier" id="lienFichier" /></label>
	        </div>
	        <div style="float:right;">
	            <button type='submit'>Enregistrer</button>
	        </div>
    </form>
    <!--- LA CULTURE -->
	<form action="/admin/requetes/ajoutCulture.php" class='puForm' method="post" id="cultureform" enctype="multipart/form-data" >
	        <img src="images/delete.gif" name="fermer" alt="Fermer" width="15" class="closeBox"/>
				<h3>Ajouter un lien ou un doc</h3>

	        <div id="contact">
	        	<label>Nom :<input type="text" name="nomFichier" size="40" id="nomFichier" /></label>
				Lien<input type="radio" name="lienactif" value="1" id="lienselectedculture" checked> ou Fichier<input type="radio" name="lienactif" id="fichierselectedculture" value="0">
	
	 			<label id="lienCulture" style="display:block;">Lien :&nbsp;<input type="text" name="nomLien" size="40"/></label>
	        	<label id="fichierCulture" style="display:none;">Fichier :<input type="file" name="lienFichier" id="lienFichier" /></label>
	        </div>
	        <div style="float:right;">
	            <button type='submit'>Enregistrer</button>
	        </div>
    </form>
    <!--- LES VIDEOS -->
	<form action="/admin/requetes/ajoutVideo.php" class='puForm' method="post" id="videoform">
			<img src="images/delete.gif" name="fermer" alt="Fermer" width="15" class="closeBox"/>
        <h3>Ajouter une vid&eacute;o</h3>

        <div id="contact">
        	<label>Nom :<input type="text" name="nomvideo" id="nomFichier" /></label>
        	<label>Lien :<input type="text" name="lienvideo" size="40"/></label>
        	<label>Commentaire</label>
			<textarea rows='4' cols="47" name='commentaire'></textarea>
        </div>

        <div style="float:right;">
            <button type='submit'>Enregistrer</button>
        </div>
    </form>
    <!--- LES MUSIQUES -->
	<form action="/admin/requetes/ajoutMusic.php" class='puForm' method="post" id="musiqueform" enctype="multipart/form-data" >
	        <img src="images/delete.gif" name="fermer" alt="Fermer" width="15" class="closeBox"/>
			<h3>Ajouter une musique</h3>

	        <div id="contact">
	        	<label>Nom :<input type="text" name="nomMusique" size="40"/></label>
	        	<label>Fichier :<input type="file" name="lienMusique" id="lienMusique" /></label>
	        </div>
	        <div style="float:right;">
	            <button type='submit'>Enregistrer</button>
	        </div>
    </form>

	<!-- MISE EN PAGE -->
	<img src="images/titreback.png" border="0" width="350" style="float:none;">

	<div id="title" style="position:absolute; top:5px; right:5px;float:left;color:#EEE;font-size:30px; text-align:right;">
		INTRANET<br />
		<?php if($isAdmin == 1){ ?><span style="font-size:16px;"><a href="vente.php" style="color:#CCC; text-decoration:none;">Ventes</a></span><?php } ?><br />
		<?php if($isAdmin == 1){ ?><span style="font-size:16px;"><a href="cms.php" style="color:#CCC; text-decoration:none;">CMS</a></span><?php } ?>
	</div>
	<span id="date" style="position:absolute; top:5px; right:160px;float:right;color:#EEE;font-size:10px;">
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
	
		<!--LES DOCUMENTS -->
    	<div class="box" id="box_doc">
			<img src="images/document.png" name="Documents" style="float:left; margin:3px 0 0 3px;" width="32"/><h1 style="float:left;">Documents</h1>
			<?php if($isAdmin == 1){ ?>
				<span class="ajout" id="documentform">
					<img src="images/add.png" name="addDoc" alt="Ajouter doc" width="20" style="cursor:pointer; float:right; padding: 4px 7px 0 0; border:0px;">
				</span>
			<?php } ?>
			<br /><br /><br />
			<ul>
				<?php 
					$list = 'document';
					include("requetes/lister.php"); 
				?>
			</ul>
      </div>

		<!-- LES VIDEOS -->
		<div class="box" id="box_video">
			<img src="images/video.png" name="Photos" style="float:left; margin:3px 0 0 3px;" width="32px;"/><h1 style="float:left;">Vid&eacute;os</h1>
			<?php if($isAdmin == 1){ ?>
				<span class="ajout" id="videoform">
					<img src="images/add.png" name="addvideo" alt="Ajouter vid&eacute;o" width="20" style="cursor:pointer; float:right; padding: 4px 7px 0 0; border:0px;">
				</span>
			<?php } ?>
			<br /><br /><br />
			<ul>
					<?php
						$list = 'video';
						include("requetes/listerLien.php"); 
					?>
			</ul>
      </div>

  		<!--LES MUSIQUES -->
		<div class="box" id="box_musique">
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
						include("requetes/listerLien.php"); 
					?>
			</ul>
      </div>

		<!--LES CHANSONS -->
		<div class="box" id="box_chanson">
			<img src="images/parole.png" name="Paroles" style="float:left; margin:3px 0 0 3px;" width="32"/><h1 style="float:left;">Paroles</h1>
			<?php if($isAdmin == 1){ ?>
				<span class="ajout" id="chansonform">
					<img src="images/add.png" name="ajouterChanson" alt="Ajouter parole" width="20" style="cursor:pointer; float:right; padding: 4px 7px 0 0; border:0px;">
				</span>
			<?php } ?>
			<br /><br /><br />
			<ul>
				<?php
					$list = 'chanson';
					include("requetes/listerFichier.php"); 
				?>
			</ul>
      </div>

		<!--LES PHOTOS -->
		<div class="box" id="box_photo">
			<img src="images/photo.png" name="Photos" style="float:left; margin:3px 0 0 3px;" width="32"/><h1 style="float:left;">Photos</h1>
			<?php if($isAdmin == 1){ ?>
				<span class="ajout" id="photoform">
					<img src="images/add.png" name="ajouterPhoto" alt="Ajouter photos" width="20" style="cursor:pointer; float:right; padding: 4px 7px 0 0; border:0px;">
				</span>
			<?php } ?>
			<br /><br /><br />
			<ul>
				<?php
					$list = 'photo';
					include("requetes/listerFichier.php"); 
				?>
			</ul>
      </div>
      
      <!--LA CULTURE-->
		<div class="box" id="box_photo">
			<img src="images/culture.png" name="Culture" style="float:left; margin:3px 0 0 3px;" width="32"/><h1 style="float:left;">Culture</h1>
				<span class="ajout" id="cultureform">
					<img src="images/add.png" name="ajouterCulture" alt="Ajouter culture" width="20" style="cursor:pointer; float:right; padding: 4px 7px 0 0; border:0px;">
				</span>
			<br /><br /><br />
			<ul>
				<?php
					$list = 'culture';
					include("requetes/lister.php"); 
				?>
			</ul>
      </div>

		<!--LA GESTION -->
		<?php if($isAdmin == 1){ ?>
			<div class="box" id="box_gestion">
				<img src="images/gestion.png" name="Gestion" style="float:left; margin:3px 0 0 3px;" width="32"/><h1 style="float:left;">Gestion</h1>
					<span class="ajout" id="gestionform">
						<img src="images/add.png" name="ajouterGestion" alt="Ajouter gestion" width="20" style="cursor:pointer; float:right; padding: 4px 7px 0 0; border:0px;">
					</span>
				<br /><br /><br />
				<ul>
					<?php 
						$list = 'gestion';
						include("requetes/lister.php"); 
					?>
				</ul>
	      </div>
		<?php } ?>
		
		<!--LA COMMUNCATION -->
		<?php if($isAdmin == 1){ ?>
			<div class="box" id="box_gestion">
				<img src="images/communication.png" name="Communication" style="float:left; margin:3px 0 0 3px;" width="32"/><h1 style="float:left;">Communication</h1>
					<span class="ajout" id="communicationform">
						<img src="images/add.png" name="ajouterCommunication" alt="Ajouter communication" width="20" style="cursor:pointer; float:right; padding: 4px 7px 0 0; border:0px;">
					</span>
				<br /><br /><br />
				<ul>
					<?php 
						$list = 'communication';
						include("requetes/lister.php"); 
					?>
				</ul>
	      </div>
		<?php } ?>
		
		<!--LA GESTION DES PLACES -->
		<!--<?php if($isAdmin == 1){ ?>
			<div class="box" id="box_gestion">
				<img src="images/vente.png" name="Administration Places" style="float:left; margin:3px 0 0 3px;" width="32"/><h1 style="float:left;">Administration Vente</h1>
					<span class="ajout" id="communicationform">
						<img src="images/add.png" name="ajouterCommunication" alt="Ajouter communication" width="20" style="cursor:pointer; float:right; padding: 4px 7px 0 0; border:0px;">
					</span>
				<br /><br /><br />
				<ul>
					<li>
						<a href="vente.php" >Acc&egrave;der à l'interface de gestion des places</a>
					</li>
				</ul>
	      </div>
		<?php } ?>-->
		
  </div>

  <div style="float:left; color:#DDD; height:30px; text-align:left; width:800px;">
		<?
			include('requetes/newUser.php');
		?>
		<br />
		Intranet de la com&eacute;die musicale Souviens-toi Pan!
	</div>

</body>
</html>
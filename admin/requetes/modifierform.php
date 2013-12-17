<?php
	include('connectionDB.php');
	
	//test du bouton radio
	$isLien = $_POST['lienactif'];
	$elementid = $_POST['elementid'];
	$elementnom = $_POST['elementnom'];
	$elementnomupper = strtoupper($elementnom);
	
	if($isLien == 0){
	
		//traitement du fichier joint
		$tempFile = $_FILES['lienFichier']['tmp_name'];
		$target_path = $_SERVER['DOCUMENT_ROOT'] . "/admin/".$elementnom."/";

		//$targetFile =  str_replace('//','/',$target_path) . $_FILES['Filedata']['name'];

		$currentFile = $_FILES['lienFichier']['name'];
		$elementsChemin = pathinfo($currentFile);
		$extensionFichier = $elementsChemin['extension'];
	
		$nomFichierLien = strtr($currentFile, ' ְֱֲֳִֵַָֹÊֻֽֿ־ּׁ׃ׂװײױÚÙÛÜÝ', '-AAAAAACEEEEEIIIINOOOOOUUUUY');
		$nomFichierLien = strtr($nomFichierLien, 'באגהדוחיטךכםלמןסףעפצץתשûü‎ÿ', 'aaaaaaceeeeiiiinooooouuuuyy');

		$targetFile =  str_replace('//','/',$target_path) . $nomFichierLien;

		if(move_uploaded_file($tempFile, $targetFile)) {
		  	header('Location: /admin/accueil.php');
		} else{
		    echo "Il y a eu une erreur lors de la sauvegarde du document, veuillez r&eacute;essayer.";	
		}
	
	}else{
		if(isset($_POST['nomLien'])){
			$nomFichierLien = trim($_POST['nomLien']);
		}else{
			$nomFichierLien = '';
		}
		header('Location: /admin/accueil.php');
	}
	
	if(isset($_POST['nomFichier'])) {

		$nom = trim($_POST['nomFichier']);
		if($nomFichierLien != ''){
			if($isLien == 0){
				$lien = 'http://www.souvienstoipan.com/admin/'.$elementnom.'/' . $nomFichierLien;
				$sql = 'UPDATE T_'.$elementnomupper.' SET '.$elementnomupper.'_NOM = "'.$nom.'", '.$elementnomupper.'_FICHIER = "'.$lien.'", '.$elementnomupper.'_CAT = 0 WHERE '.$elementnomupper.'_ID = '. $elementid .'';
			}else{
				$lien = $nomFichierLien;
				$sql = 'UPDATE T_'.$elementnomupper.' SET '.$elementnomupper.'_NOM = "'.$nom.'", '.$elementnomupper.'_LIEN = "'.$lien.'", '.$elementnomupper.'_CAT = 1 WHERE '.$elementnomupper.'_ID = '. $elementid .'';
			}
		}else{
			$sql = 'UPDATE T_'.$elementnomupper.' SET '.$elementnomupper.'_NOM = "'.$nom.'" WHERE '.$elementnomupper.'_ID = '. $elementid .'';
		}
		mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
		mysql_close();
	}
?>
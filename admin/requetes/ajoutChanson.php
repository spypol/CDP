<?php
	include('connectionDB.php');
	
	//traitement du fichier joint
	$tempFile = $_FILES['lienFichier']['tmp_name'];
	$target_path = $_SERVER['DOCUMENT_ROOT'] . "/admin/chanson/";;

	//$targetFile =  str_replace('//','/',$target_path) . $_FILES['Filedata']['name'];

	$currentFile = $_FILES['lienFichier']['name'];
	$elementsChemin = pathinfo($currentFile);
	$extensionFichier = $elementsChemin['extension'];
	
	$nomFichierLien = strtr($currentFile, ' ÁÀÂÄÃÅÇÉÈÊËÍÏÎÌÑÓÒÔÖÕÚÙÛÜÝ', '-AAAAAACEEEEEIIIINOOOOOUUUUY');
	$nomFichierLien = strtr($nomFichierLien, 'áàâäãåçéèêëíìîïñóòôöõúùûüýÿ', 'aaaaaaceeeeiiiinooooouuuuyy');

	$targetFile =  str_replace('//','/',$target_path) . $nomFichierLien;

	if(move_uploaded_file($tempFile, $targetFile)) {
	  	header('Location: /admin/accueil.php');
	} else{
	    echo "Il y a eu une erreur lors de la sauvegarde du document, veuillez r&eacute;essayer.";	}
	
	if(isset($_POST['nomFichier'])) {

		$nom = trim($_POST['nomFichier']);
		$lien = 'http://www.souvienstoipan.com/admin/chanson/' . $nomFichierLien;

		$sql = 'INSERT INTO T_CHANSON (CHANSON_NOM, CHANSON_FICHIER, CHANSON_VALIDE) VALUES ("'.$nom.'", "'.$lien.'", 1)';
		mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
		mysql_close();

		//ENVOI DU MAIL DAJOUT
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: contact@souvienstoipan.com' . "\r\n";
		$destinataires = 'paulpinier@gmail.com, julien.iscache@gmail.com, goetz.julien@gmail.com, gregory.pennaneach@gmail.com, rita.lalle@gmail.com, nicolas.laustriat@gmail.com, patrickbernardster@gmail.com, annesophie.chanu@yahoo.fr';
		$destinatairesTest = 'paulpinier@gmail.com';

		$message = "<html>
		<head>
		  <title>[Souviens-toi Pan !] Nouvelles paroles uploadée sur l'intranet</title>
		</head>
		<body>
		  <table>
		  	<tr><td></td></tr>
		    <tr>
		      <td style='font-size:12px;font-weight:bold;font-family: Arial, Helvetica,sans-serif;'>
		      	De nouvelles paroles ont été uploadées sur l'intranet :<br />
				<a href='$lien' name='$nom' style='font-size:12px;font-weight:normal;font-family: Arial, Helvetica,sans-serif;'>$nom</a>
				<br />
				<br />
		      </td>
		    </tr>
		  </table>
		</body>
		</html>";

		mail($destinataires,"[Souviens-toi Pan !] Nouvelles paroles ajoutées à l'intranet", $message, $headers);
	}
?>
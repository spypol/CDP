<?php
	include('connectionDB.php');

	if(isset($_POST['nomvideo'])) {

		$nom = trim($_POST['nomvideo']);
		$lien = trim($_POST['lienvideo']);
		$commentaire = $_POST['commentaire'];
		$commentaire = stripslashes($commentaire);

		$sql = 'INSERT INTO T_VIDEO (VIDEO_NOM, VIDEO_LIEN, VIDEO_DESC, VIDEO_VALIDE) VALUES ("'.$nom.'", "'.$lien.'", "'.$commentaire.'", 1)';
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
		  <title>[Souviens-toi Pan !] Nouvelle vid�o upload�e sur l'intranet</title>
		</head>
		<body>
		  <table>
		  	<tr><td></td></tr>
		    <tr>
		      <td style='font-size:12px;font-weight:bold;font-family: Arial, Helvetica,sans-serif;'>
		      	Nicolas a upload� une nouvelle vid�o sur l'intranet :<br />
				<a href='$lien' name='$nom' style='font-size:12px;font-weight:normal;font-family: Arial, Helvetica,sans-serif;'>$nom</a>
				<br />
				<br />
		      </td>
		    </tr>
		    <tr>
		    	<td style='font-size:12px;font-style:italic;font-family: Arial, Helvetica,sans-serif;'>
					$commentaire
		    	</td>
		    </tr>
		  </table>
		</body>
		</html>";

		mail($destinataires,"[Souviens-toi Pan !] Nouvelle video sur l'intranet", $message, $headers);
	}
	header('Location: /admin/accueil.php');
?>
<?
	if(isset($_POST['email'])) {
		include('connectionDB.php');

		$email = trim($_POST['email']);

		$sql = 'SELECT user_id, user_nom, user_password, user_prenom, user_email FROM T_USER WHERE user_email = "' . $email . '"';
		$reponse = mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
		
		$row=mysql_fetch_array($reponse);
		
		if($row[user_email] != ''){
			//ENVOI DU MAIL DAJOUT
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: contact@compotedeprod.com' . "\r\n";
			$destinataires = $email;
			$destinatairesTest = 'paulpinier@gmail.com';

			$message = "<html>
			<head>
			  <title>[CDP] Votre mot de passe</title>
			</head>
			<body>
			  <table>
			  	<tr><td></td></tr>
			    <tr>
			      <td style='font-size:12px;font-weight:bold;font-family: Arial, Helvetica,sans-serif;'>
			      	Votre mot de passe pour accéder à l'intranet est :<br />
						$row[user_password]
					<br />
					<br />
			      </td>
			    </tr>
			  </table>
			</body>
			</html>";

			mail($destinataires,'[CDP] Votre mot de passe', $message, $headers);
			Header("Location: index.php");
		}else{
			Header("Location: mdp.php?ok=0");
		}
		
		mysql_close();

		/*Header("Location: index.php");*/
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<link rel="shortcut icon" href="/images/favicon.ico" />
	<link href="images/logos/peter.png" rel="apple-touch-icon" />
	<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
	<title>Administration - Souviens-toi Pan !</title>

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){

			$("#bouton").click(function(event){
				var mail = $("input#mail").val();

				if(mail == ''){
					$("#message").html("Entrez votre email");
				}else{
					$("#form1").submit();
				}
				return false;
			});
		 });
	</script>

</head>

<body onload="document.form1.login.focus()" id="accueil">
    <div align="center">
    	<div id="box_identification" style="height:200px;">
    		<img src="images/titreback.png" border="0" width="250">
    		<br><br>

            <form name="form1" id="form1" action="mdp.php" method="post">
				<table border="0" align="center">
					<tr>
						<td>&nbsp;</td>
						<?php
							$ok = $_GET[ok];
							if($ok == ''){$ok=1;}
							if($ok == 0){
						?>
							<td class="txtgras" style="color:red;">Votre email (login) n'existe pas, r&eacute;essayez</td>
						<?php }else{?>
							<td class="txtgras" style="color:#333;">Entrez votre email (login) et vous recevrez votre mot de passe</td>
						<?php } ?>
					</tr>
					<tr>
						<td colspan="2" class="txtgras"><input name="email" type="text" size="37" maxlength="50" class="email" id="email"></td>
					</tr>
					<tr>
						<td colspan="2">
							<input class="plat" id="bouton" type="submit">
						</td>
					</tr>
					<tr><td colspan=2></td></tr>
				</table>
            </form>
        </div>
    </div>

</body>
</html>
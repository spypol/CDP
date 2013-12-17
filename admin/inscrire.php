<?
	if(isset($_POST['email'])) {
		include('connectionDB.php');

		$nom = trim($_POST['nom']);
		$prenom = trim($_POST['prenom']);
		$email = trim($_POST['email']);
		$pass = trim($_POST['pass']);

		$sql = 'INSERT INTO T_USER (USER_NOM, USER_PRENOM, USER_EMAIL, USER_PASSWORD, USER_VALIDE, USER_PROFIL) VALUES ("'.$nom.'", "'.$prenom.'", "'.$email.'", "'.$pass.'", 0, 1)';
		mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
		mysql_close();

		Header("Location: accueil.php");
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
				var login = $("input#login").val();
				var pass = $("input#pass").val();

				if(login == '' || pass == ''){
					$("#message").html("Entrez votre login et mot de passe");
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
    	<div id="box_identification" style="height:270px;">
    		<img src="images/titreback.png" border="0" width="250">
    		<br><br>

            <form name="form1" id="form1" action="inscrire.php" method="post">
				<table border="0" align="center">
					<tr>
						<td class="txtgras">Nom :</td>
						<td><input name="nom" type="text" size="20" maxlength="25" class="nom" id="nom"></td>
					</tr>
					<tr>
						<td class="txtgras">Pr&eacute;nom :</td>
						<td><input name="prenom" type="text" size="20" maxlength="25" class="prenom" id="prenom"></td>
					</tr>
					<tr>
						<td class="txtgras">Email (login) :</td>
						<td><input name="email" type="text" size="20" maxlength="50" class="email" id="email"></td>
					</tr>
					<tr>
						<td class="txtgras">Password :</td>
						<td><input name="pass" type="password" size="20" maxlength="20" class="pass" id="pass"></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>
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
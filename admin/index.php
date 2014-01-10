<?
session_start();
if(isset($_SESSION['login'])) {
	header('Location: accueil.php');
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<link rel="shortcut icon" href="/images/favicon.ico" />
	<link href="images/logos/peter.png" rel="apple-touch-icon" />
	<link href="_css/style.css" rel="stylesheet" type="text/css" media="screen" />
	<title>Administration - Compote de Prod</title>

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

			if(event.keyCode==13){
				var login = $("input#login").val();
				var pass = $("input#pass").val();

				if(login == '' || pass == ''){
					$("#message").html("Entrez votre login et mot de passe");
				}else{
					$("#form1").submit();
				}
				return false;
			}
		 });
	</script>

</head>

<body onload="document.form1.login.focus()" id="accueil">
    <div align="center">
    	<div id="box_identification">
    		<img src="../img/logo_compote_de_prod.png" border="0" width="250">
    		<br><br>

            <form name="form1" id="form1" action="login.php" method="post">
                <table border="0" align="center">
                  <tr>
                	<td class="txtgras">Login :</td>
                	<td><input name="login" type="text" size="20" maxlength="100" class="login" id="login"></td>
                  </tr>
                  <tr>
                	<td class="txtgras">Password :</td>
                	<td><input name="pass" type="password" size="20" maxlength="25" class="login" id="pass"></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>
			<!---<span class="plat" id="bouton" style="cursor:pointer; color:#EEE; font-weight:bold;">Valider</span>--->
			<input class="plat" id="bouton" type="submit" value="Valider">
                    </td>
                  </tr>
			<tr><td colspan=2></td></tr>
			<tr>
				<!--<td colspan=2 align=center class="txt" style="color:red; font-size:12px;" id="message">
					Mauvaise identification
				</td>-->
				<td colspan=2 align=center class="txt" id="message">
					Veuillez vous identifier
				</td>
			</tr>
			<tr><td colspan=2></td></tr>
			<tr>
				<td colspan=2 align=center class="txt" id="message">
					<a href="mdp.php" style="color:#CCC; font-size:9px;">Mot de passe oubli&eacute; ?</a> - 
					<a href="inscire.php" style="color:#CCC; font-size:9px;">Cr&eacute;er un compte</a>
				</td>
			</tr>
			<tr><td colspan=2><br /></td></tr>
                </table>
            </form>
        </div>
    </div>

</body>
</html>
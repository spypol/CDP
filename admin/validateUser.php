<?

include('connectionDB.php');

$userid = $_GET['userid'];

$sql = "UPDATE T_USER SET user_valide = 1 WHERE user_id=".$userid."";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());


?>
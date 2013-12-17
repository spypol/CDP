<?php
include('connectionDB.php');

if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['pass'])) {
  extract($_POST);
  $sql = "select user_password, user_admin, user_vente, user_prenom, user_nom from T_USER where user_valide = 1 and user_email='".$login."'";
  $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

  $data = mysql_fetch_assoc($req);

  if($data['user_password'] != $pass) {
    include('index.php'); // On inclut le formulaire d'identification
    exit;
  }
  else {
    session_start();
    $_SESSION['login'] = $login;
    $_SESSION['isAdmin'] = $data['user_admin'];
    $_SESSION['isVente'] = $data['user_vente'];
    $_SESSION['userData'] = $data['user_prenom'] . " " . $data['user_nom'];
    header('Location: accueil.php');
  }
}
else {
   header('Location: index.php');
   exit;
}


?>
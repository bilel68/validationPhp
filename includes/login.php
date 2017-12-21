<?php

$login_valide = "BylToByl";
$pwd_valide = "lemien";

if (isset($_POST['login']) && isset($_POST['pwd']))  {

  if ($login_valide == $_POST['login'] && $pwd_valide == $_POST['pwd']) {
    session_start();
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['pwd'] = $_POST['pwd'];

    header('location: /Tp3/accueil.php');

  }
  else{
    echo '<body onLoad="alert(\'Membre non reconnu...\')">';
    echo '<meta http-equiv="refresh" content="0"; URL=/Tp3/index.php">';
  }
}

<?php

if (isset($_GET['controller'])) {
  //  echo("<br>***********test rest htaccess*********************");
  // echo ("<br>".$_GET['controller']);
  // die();

  //  if (isset($_GET['action']))echo "<br>".$_GET['action'];
  //   if (isset($_GET['id']))echo "<br>".$_GET['id']."<br>";

  //  echo("********************************<br>");

  $nomC = 'controller';
  $nomC .= $_GET['controller'];
  $nomC .= '.php';

  require_once($nomC);
} else {
  require_once("controllerLieu.php");
} // controller par défaut

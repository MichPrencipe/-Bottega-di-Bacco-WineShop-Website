<?php
  require_once("setup.php");
  if(!isset($_REQUEST["idNotifica"]) || !isUserLoggedIn()){
    header("Location: index.php");
  }
  $idNotifica=$_REQUEST["idNotifica"];
  $dbh->eliminaNotifica($idNotifica);
?>

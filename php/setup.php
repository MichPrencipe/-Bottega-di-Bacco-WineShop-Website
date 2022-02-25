<?php
  session_start();
  define("IMG_LOGO_DIR", "./img/");
  define("IMG_BANNER_DIR", "./img/banner/");  
  define("IMG_ARTICOLI_DIR", "./img/articoli/");  
  define("IMG_CONTATTI_DIR", "./img/contatti/");
  define("IMG_CATEGORIE_DIR", "./img/categorie/");  
  define("IMG_CANTINE_DIR", "./img/cantine/");    
  require_once("utils/functions.php");
  require_once("./db/database.php");
  $templateParams["js"]=array("js/inserisciCarrello.js","js/alert.js","js/modalOption.js");
  $dbh= new DatabaseHelper("localhost", "root","", "enoteca-online" , 3306);
  $templateParams["categorie"]=$dbh->getCategoriaName();
  $templateParams["cantine"]=$dbh->getCantine();


  if(isUserLoggedIn()){
    $nuoveNotifiche=$dbh->getNumNuoveNotificheByUtente($_SESSION["id"]);
    if($nuoveNotifiche>0){
      $templateParams["numNuoveNotifiche"]=$nuoveNotifiche;
    }
  }
 ?>
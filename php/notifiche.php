<?php
    require_once("setup.php");

    if(!isUserLoggedIn()){
        header("location: login.php");
    }

    $templateParams["nome"]="pagina-notifiche.php";
    $templateParams["titolo"] = "Bottega di Bacco - Notifiche"; 
    $templateParams["js"] = array("js/notifiche.js");
    

    $templateParams["notifiche"] = $dbh->getNotificheByUtente($_SESSION["id"]);
    
    require 'template/base.php';
?>
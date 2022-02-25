<?php
    require_once("setup.php");

    
    $templateParams["nome"]="pagina-venditore.php";
    $templateParams["titolo"] = "Bottega di Bacco - Venditore";
    if(isUserAdmin()){
        $idVenditore = $_SESSION["id"];     
        $venditore = $dbh->getVenditorebyId($idVenditore);
        $venditoreSel = $venditore[0];
    }

    $numProdotti=$dbh->getNumProdottiByVenditore($_SESSION["id"]);


    if(isset($_GET["message"])){
        $messsaggioCorretto= "Inserimento riuscito con successo";
    }
    
    require 'template/base.php';
?>
<?php
    require_once("setup.php");

    $templateParams["nome"] = "pagina-cantina.php";

    define("MAX_ELEMENTI_PAGINA",8);

    if (isset($_GET["idCantina"])) {
        $idCantina = $_GET["idCantina"];
        $cantina = $dbh->getCantinaById($idCantina);        
        if (count($cantina) == 0) {
            header("Location: index.php");
        }
        $cantinaSelezionata = $cantina[0];
        $templateParams["titolo"] = "La Bottega di Bacco - " . $cantinaSelezionata["nome"];
        $templateParams["prodotti"] = $dbh->getProdottiByCantina($idCantina);
    }if(isset($_GET["pagina"]) && is_numeric($_GET["pagina"])){
        $pagina=$_GET["pagina"];
    } else {
        $pagina=1;
    }

    $numProdotti=$dbh->getNumProdottiByCantina($idCantina);
    list($paginaCorrente,$offset,$pagineTotali)=getPageOffsetTotalPage($pagina,MAX_ELEMENTI_PAGINA,$numProdotti);

    $templateParams["prodotti"]= $dbh->getProdottiByCantine($idCantina,MAX_ELEMENTI_PAGINA,$offset);
    $templateParams["parametriRicerca"]="idCantina=".$idCantina;
    $templateParams["numRisultati"]=$numProdotti;
    $templateParams["paginaCorrente"]=$paginaCorrente;
    $templateParams["pagineTotali"]=$pagineTotali;

    require 'template/base.php';
?>
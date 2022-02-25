<?php
    require_once("setup.php");
    
    $templateParams["nome"]="pagina-prodotti-inseriti.php";
    $templateParams["titolo"] = "Bottega di Bacco - Prodotti Inseriti";
    $idVenditore = $_SESSION["id"];
    $templateParams["prodotti"] = $dbh->getProdottiByVenditore($idVenditore);   
    

    define("MAX_ELEMENTI_PAGINA",8);


    if(isset($_GET["pagina"]) && is_numeric($_GET["pagina"])){
        $pagina=$_GET["pagina"];
      } else {
        $pagina=1;
      }

      $numProdotti=$dbh->getNumProdottiByVenditore($_SESSION["id"]);

      list($paginaCorrente,$offset,$pagineTotali)=getPageOffsetTotalPage($pagina,MAX_ELEMENTI_PAGINA,$numProdotti);

    $templateParams["prodotti"]= $dbh->getPagProdottiByVenditore($_SESSION["id"],MAX_ELEMENTI_PAGINA,$offset);
    $templateParams["parametriRicerca"]="idVenditore=".$_SESSION["id"];
    $templateParams["numRisultati"]=$numProdotti;
    $templateParams["paginaCorrente"]=$paginaCorrente;
    $templateParams["pagineTotali"]=$pagineTotali;

    
    require 'template/base.php';
?>
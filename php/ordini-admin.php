<?php
require_once("setup.php");
define("MAX_ELEMENTI_PAGINA", 4);
  if(isset($_GET["pagina"]) && is_numeric($_GET["pagina"])){
    $pagina=$_GET["pagina"];
  } else {
    $pagina=1;
  }



if(isset($_POST["spedisci"])){  
    $dbh->spedisciRigaOrdine($_POST["spedisci"]);
    $ordine = $dbh->getOrdineByRiga($_POST["spedisci"]);
    $righeOrdine = $dbh->getRigheByOrdine($ordine["id"]);
    $numRighe = count($righeOrdine);
    $numRigheSpedito = 0;
    foreach($righeOrdine as $rigaOrdine){
      if($rigaOrdine["stato_riga"] == "spedito"){
        $numRigheSpedito++;
      }
    }

    if($numRigheSpedito == $numRighe){
      $dbh->aggiornaStatoOrdine($ordine["id"]); 
      $dbh->notificaSpedizioneOrdine($ordine["idCliente"], $ordine["id"]);              
    }

    header("location: ordini-admin.php?message=l'ordine è stato spedito con successo");
  }
$numOrdini=$dbh->getNumOrdiniAdmin($_SESSION["id"]);
list($paginaCorrente,$offset,$pagineTotali)=getPageOffsetTotalPage($pagina,MAX_ELEMENTI_PAGINA,$numOrdini);


$ordiniAdmin = $dbh->getOrdiniByAdmin($_SESSION["id"], MAX_ELEMENTI_PAGINA,$offset);

$templateParams["titolo"]="La Bottega di Bacco - Ordini Admin";
$templateParams["nome"]="pagina-ordini-admin.php";
$templateParams["numRisultati"]=$numOrdini;
$templateParams["paginaCorrente"]=$paginaCorrente;
$templateParams["pagineTotali"]=$pagineTotali;


require 'template/base.php';
?>
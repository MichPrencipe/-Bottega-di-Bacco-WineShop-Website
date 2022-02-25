<?php
require_once("setup.php");

  if(isset($_POST["ricevuto"])){  
    $dbh->ricevutoOrdine($_POST["ricevuto"]);
    $dbh->notificaOrdineRicevuto($_SESSION["id"], $_POST["ricevuto"]);    
    header("location: ordini.php?message=Grazie per aver confermato la ricezione dell'ordine");
  }

  define("MAX_ELEMENTI_PAGINA", 4);
  if(isset($_GET["pagina"]) && is_numeric($_GET["pagina"])){
    $pagina=$_GET["pagina"];
  } else {
    $pagina=1;
  }

  
$numOrdini=$dbh->getNumOrdini($_SESSION["id"]);
list($paginaCorrente,$offset,$pagineTotali)=getPageOffsetTotalPage($pagina,MAX_ELEMENTI_PAGINA,$numOrdini);

$ordini = $dbh->getOrdiniByUtente($_SESSION["id"],MAX_ELEMENTI_PAGINA,$offset);

$templateParams["titolo"]="La Bottega di Bacco - Ordini";
$templateParams["nome"]="pagina-ordini.php";
$templateParams["numRisultati"]=$numOrdini;
$templateParams["paginaCorrente"]=$paginaCorrente;
$templateParams["pagineTotali"]=$pagineTotali;




require 'template/base.php';
?>
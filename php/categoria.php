<?php
require_once("setup.php");

$templateParams["nome"] = "pagina-categoria.php";

define("MAX_ELEMENTI_PAGINA",8);

if (isset($_GET["idCategoria"])) {
    $idCategoria = $_GET["idCategoria"];
    $categoria = $dbh->getCategoriaById($idCategoria);        
    if (count($categoria) == 0) {
        header("Location: index.php");
    }
    $categoriaSelezionata = $categoria[0];
    $templateParams["titolo"] = "La Bottega di Bacco - " . $categoriaSelezionata["nome"];
    $templateParams["prodotti"] = $dbh->getProdottiByCategorie($idCategoria);
}

if(isset($_GET["pagina"]) && is_numeric($_GET["pagina"])){
    $pagina=$_GET["pagina"];
  } else {
    $pagina=1;
  }

  $numProdotti=$dbh->getNumProdottiByCategoria($idCategoria);
  list($paginaCorrente,$offset,$pagineTotali)=getPageOffsetTotalPage($pagina,MAX_ELEMENTI_PAGINA,$numProdotti);

  $templateParams["prodotti"]= $dbh->getProdottiByCategoria($idCategoria,MAX_ELEMENTI_PAGINA,$offset);
  $templateParams["parametriRicerca"]="idCategoria=".$idCategoria;
  $templateParams["numRisultati"]=$numProdotti;
  $templateParams["paginaCorrente"]=$paginaCorrente;
  $templateParams["pagineTotali"]=$pagineTotali;

require 'template/base.php';

?>
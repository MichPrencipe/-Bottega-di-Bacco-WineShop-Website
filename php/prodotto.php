<?php
    require_once("setup.php");

    $templateParams["nome"]="pagina-prodotto.php";

    if (isset($_GET["idProdotto"])) {
        $idProdotto = $_GET["idProdotto"];
        $prodotto = $dbh->getProdottoById($idProdotto);    
         
        if (count($prodotto) == 0) {
            header("Location: index.php");
        }
        $prodottoSelezionato = $prodotto[0];
        $templateParams["titolo"] = "La Bottega di Bacco - " . $prodottoSelezionato["nome"];
        $categoriaProdotto = $dbh->getCategoriaById( $prodottoSelezionato["idCategoria"] ); 
        $categoriaProdottoSelezionato = $categoriaProdotto[0];
        $cantinaProdotto = $dbh->getCantinaById( $prodottoSelezionato["idCantina"] ); 
        $cantinaProdottoSelezionato = $cantinaProdotto[0];
    }

    require 'template/base.php';
?>
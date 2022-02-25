
<?php
require_once("setup.php");



$nome = '';

if (isset($_GET["nome"])) {
    $nome = $_GET["nome"];
}

$risultati = $dbh->ricercaAutocomplete($nome);
$templateParams["nome"] = "pagina-risultati.php";
$templateParams["titolo"] = "Bottega di Bacco - Risultati";
$templateParams["prodotti"] = $risultati;


require 'template/base.php';


?>
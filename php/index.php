<?php

require_once("setup.php");

$templateParams["nome"] = "main.php";
$templateParams["titolo"] = "Bottega di Bacco - Home";
$templateParams["js"] = array("js/carosello.js","js/inserisciCarrello.js");


if (isUserLoggedIn()) {
    $datiUtente = $dbh->getDatiUtente($_SESSION["id"]);
}


$templateParams["ultimi-prodotti"]=$dbh->getUltimiProdotti();  
$templateParams["prodotti-random"]=$dbh->getRandomProducts();

require("template/base.php");
?>
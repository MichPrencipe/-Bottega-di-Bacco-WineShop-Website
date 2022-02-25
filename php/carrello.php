<?php
require_once("setup.php");


if (!isUserLoggedIn()) {
  setcookie("login-carrello", "true", time() + (60 * 60 * 24), "/");
  header("Location: login.php");
} else {
  if (isUserAdmin()) {
  }
}

$carrello = $dbh->getCarrello($_SESSION["id"]);
$numRighe = count($carrello);
$templateParams["carrello"] = array();
$subtotale = 0;
foreach ($carrello as $idProdotto => $quantita) {
  $prodotto = $dbh->getProdottoById($idProdotto)[0];  
  $categoriaProdotto = $dbh->getCategoriaById( $prodotto["idCategoria"] ); 
  $categoriaProdottoSelezionato = $categoriaProdotto[0];
  $cantinaProdotto = $dbh->getCantinaById( $prodotto["idCantina"] ); 
  $cantinaProdottoSelezionato = $cantinaProdotto[0];
  $quantita=min($quantita,$prodotto["quantitàDisponibile"]);
  if ($quantita == 0) {
    $dbh->rimuoviProdotto($_SESSION["id"], $idProdotto);
  } else {
    $dbh->modificaQuantitaProdotto($quantita, $_SESSION["id"], $idProdotto);
    $prodotto["quantità"] = $quantita;
    $subtotale += $prodotto["prezzo"] * $quantita;
    array_push($templateParams["carrello"], $prodotto);
  }
}
$templateParams["subtotale"] = number_format($subtotale, 2, ".", " ");

$templateParams["titolo"] = "Bottega di Bacco - Carrello";
$templateParams["js"] = array("js/modificaCarrello.js");
$templateParams["nome"] = "pagina-carrello.php";


require 'template/base.php';
?>
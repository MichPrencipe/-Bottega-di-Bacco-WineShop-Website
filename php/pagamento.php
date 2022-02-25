<?php
require_once("setup.php");
$templateParams["titolo"] = "Bottega di Bacco - pagamento";
$templateParams["nome"] = "pagina-pagamento.php";
$templateParams["js"] = array("js/pagamento.js");
$datiUtente = $dbh->getDatiUtente($_SESSION["id"]);


$carrello = $dbh->getCarrello($_SESSION["id"]);
$numRighe = count($carrello);
$templateParams["carrello"] = array();
$subtotale = 0;
foreach ($carrello as $idProdotto => $quantita) {
  $prodotto = $dbh->getProdottoById($idProdotto)[0];
  $quantita = min($quantita, $prodotto["quantitàDisponibile"]);
  $prodotto["quantità"] = $quantita;
  $subtotale += $prodotto["prezzo"] * $quantita;
  array_push($templateParams["carrello"], $prodotto);
}
$templateParams["subtotale"] = number_format($subtotale, 2, ".", " ");



if (
  isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["indirizzo"])
  && isset($_POST["stato"]) && isset($_POST["provincia"])
  && isset($_POST["cap"]) && isset($_POST["città"]) && isset($_POST["cc-nome"]) && isset($_POST["cc-numero"])&& isset($_POST["cc-mese"])&& isset($_POST["cc-anno"])
){
  $dbh->svuotaCarrello($_SESSION["id"]);
  $data = date('Y-m-d H:m:s');  
  $idOrdine = $dbh->inserisciOrdine($_SESSION["id"],$data,"confermato");
  foreach ($carrello as $idProdotto => $quantita) {
    $prodotto = $dbh->getProdottoById($idProdotto)[0];    
    $dbh->notificaNuovoOrdine($prodotto["idVenditore"],$idOrdine);
    $totale = $prodotto["prezzo"]*$quantita;
    $dbh->aggiornaQuantità($idProdotto, $quantita);
    $stato = "confermato";
    if($prodotto["quantitàDisponibile"] - $quantita==0){
      $dbh->notificaBottigliaEsaurita($prodotto["idVenditore"],$idProdotto);            
    }    
    $dbh->inserisciRigaOrdine($idOrdine,$quantita,$idProdotto,$totale,$stato);
  }
  
  $dbh->notificaConfermaOrdine($_SESSION["id"],$idOrdine);
  header("location: index.php");
}


require 'template/base.php';
?>
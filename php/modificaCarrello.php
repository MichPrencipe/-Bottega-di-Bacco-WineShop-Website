<?php
  require("utils/functions.php");
  require_once("setup.php");


  if(!(isset($_REQUEST["idProdotto"])) || !(isset($_REQUEST["action"]))
        || ($_REQUEST["action"]!=="modifica" && $_REQUEST["action"]!=="rimuovi")
        || !isUserLoggedIn()){
  }

  $idProdotto=$_REQUEST["idProdotto"];
  if($_REQUEST["action"]==="modifica"){
    if (isset($_REQUEST["quantity"])) {
      $tmpQuantita=$_REQUEST["quantity"];
    } else {
    }
  }

  if($_REQUEST["action"]==="modifica"){
    $dbh->modificaQuantitaProdotto($tmpQuantita,$_SESSION["id"],$idProdotto);
  } else {
    $dbh->rimuoviProdotto($_SESSION["id"], $idProdotto);
  }

  $carrello=$dbh->getCarrello($_SESSION["id"]);
  $subtotale=0;
  foreach ($carrello as $idProdotto => $quantita){
    $prodotto=$dbh->getProdottoById($idProdotto)[0];
    $subtotale+=$prodotto["prezzo"]*$quantita;
  }


  echo json_encode(array("numProdotti" => getNumProdottiCarrello(), "subtotale"=>number_format($subtotale,2,"."," ")));
  if($_GET["action"]=="modifica"){
    header("location: carrello.php");
  }
 ?>


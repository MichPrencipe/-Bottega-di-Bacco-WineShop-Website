<?php
  require("utils/functions.php");
  require_once("setup.php");

  if(!isset($_REQUEST["idProdotto"]) || !isset($_POST["quantity"])){

  }
  

  $idProdotto=$_REQUEST["idProdotto"];
  $quantita=$_POST["quantity"];
  $prodotto = $dbh->getProdottoById($idProdotto)[0];
  if(isUserLoggedIn()){
    $dbh->aggiungiAlCarrello($idProdotto,$quantita,$_SESSION["id"],$prodotto["quantitàDisponibile"]);    
    $carrello=$dbh->getCarrello($_SESSION["id"]);
  } else{
    $cookie_name="carrello";
    if (!isset($_COOKIE[$cookie_name])) {  
      $carrello=array($idProdotto => $quantita);
    } else {
      $carrello=json_decode($_COOKIE[$cookie_name],true);
      if(array_key_exists($idProdotto,$carrello)){
        $carrello[$idProdotto]+=$quantita;
      } else {
        $carrello[$idProdotto]= $quantita;
      }
    }
    setcookie($cookie_name,json_encode($carrello),time() + (60 * 60 * 24 * 30),"/");
  }
  
   echo json_encode(array('numProdottiCarrello' => array_reduce(array_values($carrello),"sum")));
 ?>
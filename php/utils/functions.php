<?php

  function isActive($pagename){
    if(basename($_SERVER['PHP_SELF'])==$pagename){
        echo " class='active' ";
    }
  }

  function logout(){
    session_start();
    session_unset();
  }

  function isUserLoggedIn(){
      return !empty($_SESSION["id"]);
  }

  function registerLoggedUser($id,$ruolo){
      $_SESSION["id"] = $id;
      $_SESSION["ruolo"] = $ruolo;
  }

  function isUserAdmin(){
    return $_SESSION["ruolo"]==="venditore";
  }

  function uploadImage($path, $image){
      $imageName = basename($image["name"]);
      $fullPath = $path.$imageName;

      $maxKB = 500;
      $acceptedExtensions = array("jpg", "jpeg", "png", "gif");
      $result = 0;
      $msg = "";
      //Controllo se immagine è veramente un'immagine
      $imageSize = getimagesize($image["tmp_name"]);
      if($imageSize === false) {
          $msg .= "File caricato non è un'immagine! ";
      }
      //Controllo dimensione dell'immagine < 500KB
      if ($image["size"] > $maxKB * 1024) {
          $msg .= "File caricato pesa troppo! Dimensione massima è $maxKB KB. ";
      }

      //Controllo estensione del file
      $imageFileType = strtolower(pathinfo($fullPath,PATHINFO_EXTENSION));
      if(!in_array($imageFileType, $acceptedExtensions)){
          $msg .= "Accettate solo le seguenti estensioni: ".implode(",", $acceptedExtensions);
      }

      //Controllo se esiste file con stesso nome ed eventualmente lo rinomino
      if (file_exists($fullPath)) {
          $i = 1;
          do{
              $i++;
              $imageName = pathinfo(basename($image["name"]), PATHINFO_FILENAME)."_$i.".$imageFileType;
          }
          while(file_exists($path.$imageName));
          $fullPath = $path.$imageName;
      }

      //Se non ci sono errori, sposto il file dalla posizione temporanea alla cartella di destinazione
      if(strlen($msg)==0){
          if(!move_uploaded_file($image["tmp_name"], $fullPath)){
              $msg.= "Errore nel caricamento dell'immagine.";
          }
          else{
              $result = 1;
              $msg = $imageName;
          }
      }
      return array($result, $msg);
  }

  function getPageOffsetTotalPage($page,$maxItem,$numItem){
    $totalPage=ceil($numItem/$maxItem);
    if($page>0 && $page<=$totalPage){
      $currentPage=$page;
    } else {
      $currentPage=1;
    }
    $offset=($currentPage-1)*$maxItem;
    return array($currentPage, $offset, $totalPage);
  }

  function getNumProdottiCarrello(){
    global $dbh;
    $carrello=array();
    if(isUserLoggedIn()){
      $carrello=$dbh->getCarrello($_SESSION["id"]);
    } else {
      if(isset($_COOKIE["carrello"])){
        $carrello=json_decode($_COOKIE["carrello"],true);
      }
    }
    return array_reduce(array_values($carrello),"sum");
  }

  function getNumOrdini(){
    global $dbh;
    return count($dbh->getOrdini());
  }

  function salvaCarrello(){
    global $dbh;
    if(!isUserAdmin()){
      if(isset($_COOKIE["carrello"])){
        $carrello=json_decode($_COOKIE["carrello"],true);
        $quantitàDisponibile = 0;
        $dbh->inserisciCarrello($carrello,$_SESSION["id"],$quantitàDisponibile);
      }
    }
    setcookie("carrello",json_encode($carrello),time() - 100,"/");
  }


  function sum($v1,$v2){
    return $v1+$v2;
  }

  function getAction($action){
    $result = "";
    switch($action){
        case 1:
            $result = "Inserisci";
            break;
        case 2:
            $result = "Modifica";
            break;
        case 3:
            $result = "Cancella";
            break;
    }

    return $result;
}

?>
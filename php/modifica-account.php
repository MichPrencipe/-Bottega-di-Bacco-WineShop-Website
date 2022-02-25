<?php 
  require_once("setup.php");

    
  $datiUtente = $dbh->getDatiUtente($_SESSION["id"]);
  $templateParams["nome"] = "pagina-modifica-account.php";
  $templateParams["titolo"] ="Bottega di Bacco - modifica account";
  $templateParams["js"] = array("js/datiUtente.js");

  
  if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["indirizzo"]) && isset($_POST["CAP"]) && isset($_POST["città"]) && isset($_POST["provincia"]) && isset($_POST["cell"])){
    $hashed_password =  sha1($_POST["password"]);         


    //risultato è il nuovo id creato dell'utente
    $result=$dbh->modificaUtente($_POST["username"],$hashed_password,$_POST["nome"],$_POST["cognome"], $_POST["indirizzo"], $_POST["nazione"],$_POST["CAP"],$_POST["città"], $_POST["provincia"],$_POST["cell"],$_SESSION["id"]);
        
    header("location: login.php?message=modificato correttamente");
}

  require 'template/base.php';
 ?>
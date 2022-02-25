<?php
    require_once("setup.php");

    if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["indirizzo"]) && isset($_POST["CAP"]) && isset($_POST["città"]) && isset($_POST["provincia"]) && isset($_POST["cell"])){
        $hashed_password =  sha1($_POST["password"]);         

        //risultato è il nuovo id creato dell'utente
        $result=$dbh->inserisciUtente($_POST["username"],$hashed_password,$_POST["ruolo"] ,$_POST["nome"],$_POST["cognome"], $_POST["indirizzo"], $_POST["nazione"],$_POST["CAP"],$_POST["città"], $_POST["provincia"],$_POST["cell"]);
        if($result == false){
            header("location: registrazione.php?errore=errore inserimento dati");
          }
          else{
              registerLoggedUser($result,"cliente");
              $dbh->notificaRegistrazione($_SESSION["id"]);
              header("location: index.php");
        }
    }


    $templateParams["nome"]="pagina-registrazione.php";
    $templateParams["titolo"] = "Bottega di Bacco - Registrazione";
    $templateParams["js"] = array("js/datiUtente.js");
    
    
    require 'template/base.php';
?>
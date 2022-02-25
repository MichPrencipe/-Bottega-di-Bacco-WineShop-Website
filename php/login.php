<?php
    require_once("setup.php");    

    if(isset($_POST["username"]) && isset($_POST["password"])){
        $hashed_password =  sha1($_POST["password"]);
        $login_result = $dbh->checkLogin($_POST["username"],$hashed_password);
        if(count($login_result)==0){
          $templateParams["erroreLogin"] = "Credenziali errate!";
        }
        else{          
          registerLoggedUser($login_result[0]["id"],$login_result[0]["ruolo"]);
          salvaCarrello();
          if(isUserAdmin()){
            header("location: venditore.php");
          }
          else{
            header("location:index.php");
          }
        }
      }
    
    
    if(isUserLoggedIn()){
        $templateParams["nome"] = "mio-account.php";
        $templateParams["titolo"] = "Bottega di Bacco - Account";
        $datiUtente = $dbh->getDatiUtente($_SESSION["id"]);
    }
    else{
      $templateParams["nome"]="pagina-login.php";    
      $templateParams["titolo"] = "Bottega di Bacco - Login";
      $templateParams["js"] = array("js/datiUtente.js");
    }
    require 'template/base.php';
?>
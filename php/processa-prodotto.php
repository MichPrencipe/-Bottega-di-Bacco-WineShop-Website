<?php
require_once("setup.php");

$templateParams["nome"] = "gestisci-prodotto.php";
$templateParams["titolo"] = "Bottega di Bacco - " . getAction($_GET["action"]);
$templateParams["js"] = array("js/upload_file.js");

//aggiunta
if ($_REQUEST["action"] == 1) {
    if (
        isset($_POST["nome"]) && isset($_POST["prezzo"]) && isset($_POST["litri"])
        && isset($_POST["annata"]) && isset($_POST["descrizione"])
        && isset($_POST["categoria"]) && isset($_POST["marca"]) && isset($_POST["quantità"])
    ) {
        $nome = $_POST["nome"];
        $prezzo = $_POST["prezzo"];
        $litri = $_POST["litri"];
        $annata = $_POST["annata"];
        $descrizione = $_POST["descrizione"];
        $idCategoria = $_POST["categoria"];
        $idCantina = $_POST["marca"];
        $quantità = $_POST["quantità"];
        $idVenditore = $_SESSION["id"];


        if ($_FILES['immagine']['size'] > 0 && $_FILES["immagine"]["error"] == 0) {
            list($result, $msg) = uploadImage(IMG_ARTICOLI_DIR, $_FILES["immagine"]);
            if ($result == 1) {
                $immagine = $msg;
            } else {
                header("location: prodotti-inseriti.php?error=errore inserimento dati");
            }
        }

        $result = $dbh->inserisciProdotto($nome, $prezzo, $litri, $annata, $descrizione, $idCantina, $immagine, $idCategoria, $idVenditore, $quantità);

        if (count($result) == 0) {
            header("location: prodotti-inseriti.php?error=errore in inserimento");
        } else {
            $msg = "Prodotto inserito correttamente!";
            header("location: prodotti-inseriti.php?message=" . $msg);
        }
    }
}


//modifica
if ($_REQUEST["action"] == 2) {
    if (isset($_GET["idProdotto"])) {

        $idProdotto = $_GET["idProdotto"];
        $prodotto = $dbh->getProdottoById($idProdotto);
        $prodottoSelezionato = $prodotto[0];
        if (
            isset($_POST["nuovoNome"]) && isset($_POST["nuovoPrezzo"]) && isset($_POST["nuovoLitri"])
            && isset($_POST["nuovoAnnata"]) && isset($_POST["nuovoDescrizione"])
            && isset($_POST["nuovoIdCategoria"]) && isset($_POST["nuovoIdCantina"]) && isset($_POST["nuovoQuantità"])
        ) {

            if ($_FILES['nuovoImmagine']['size'] > 0 && $_FILES["nuovoImmagine"]["error"] == 0) {
                list($result, $msg) = uploadImage(IMG_ARTICOLI_DIR, $_FILES["nuovoImmagine"]);
                if ($result == 1) {
                    $nuovoImmagine = $msg;
                } else {
                    header("location: prodotti-inseriti.php?error=errore");
                }
            }

            $result = $dbh->modificaProdotto($prodottoSelezionato["id"], $_POST["nuovoNome"], $_POST["nuovoPrezzo"], $_POST["nuovoLitri"], $_POST["nuovoAnnata"], $_POST["nuovoDescrizione"], $nuovoImmagine, $_POST["nuovoIdCategoria"], $_POST["nuovoIdCantina"], $prodottoSelezionato["idVenditore"], $_POST["nuovoQuantità"]);
            header("location: prodotti-inseriti.php?message=prodotto modificato correttamente");
        }
    }
}


//cancellazione
if ($_REQUEST["action"] == 3) {
    if (isset($_GET["idProdotto"])) {
        $dbh->deleteProdotto($_GET["idProdotto"]);
        $idVenditore = $_SESSION["id"];
        $msg = " Prodotto eliminato correttamente!";  //si potrebbe verificare controllando il return della query se è stato cancellato correttamente
        header("location:  prodotti-inseriti.php?message=" . $msg);
    }
}



require 'template/base.php';
?>
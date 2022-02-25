<?php

class DatabaseHelper
{
  protected $db;

  public function __construct($servername, $username, $password, $dbname, $port)
  {
    $this->db = new mysqli($servername, $username, $password, $dbname, $port);
    if ($this->db->connect_error) {
      die("Connection failed");
    }
  }

  protected function executeSelect($statement)
  {
    $statement->execute();
    $result = $statement->get_result();

    return $result->fetch_all(MYSQLI_ASSOC);
  }


  public function checkLogin($username, $password)
  {
    $query = "SELECT id,username, nome, ruolo, password FROM utenti WHERE username = ? AND password = ?";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param('ss', $username, $password);
    return $this->executeSelect($stmt);
  }

  public function inserisciUtente($username, $password, $ruolo, $nome, $cognome, $indirizzo, $nazione, $CAP, $città, $provincia, $cell)
  {
    $stmt = $this->db->prepare("INSERT INTO utenti (username,password,ruolo,nome,cognome,indirizzo,nazione, CAP,città ,provincia, cellulare) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param('sssssssssss', $username, $password, $ruolo, $nome, $cognome, $indirizzo, $nazione, $CAP, $città, $provincia, $cell);
    $stmt->execute();

    return $stmt->insert_id;
  }

  public function getCategoriaById($idCategoria)
  {
    $stmt = $this->db->prepare("SELECT * FROM categorie WHERE id = ?");
    $stmt->bind_param('i', $idCategoria);

    return $this->executeSelect($stmt);
  }

  public function getCategoriaName()
  {
    $stmt = $this->db->prepare("SELECT * FROM categorie");
    return $this->executeSelect($stmt);
  }

  public function inserisciProdotto($nome, $prezzo, $litri, $annata, $descrizione, $idCantina, $immagine, $idCategoria, $idVenditore, $quantità)
  {
    $stmt = $this->db->prepare("INSERT INTO bottiglie (nome, prezzo, litri, annata, descrizione, idCantina, immagine, idCategoria, idVenditore, quantitàDisponibile)
    VALUES(?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param('sddssisiii', $nome, $prezzo, $litri, $annata, $descrizione, $idCantina, $immagine, $idCategoria, $idVenditore, $quantità);
    $stmt->execute();
    return $stmt->insert_id;
  }

  public function getProdottiByCategorie($idCategoria)
  {
    $stmt = $this->db->prepare("SELECT * FROM bottiglie WHERE idCategoria = ?");
    $stmt->bind_param("i", $idCategoria);
    return $this->executeSelect($stmt);
  }

  public function getProdottiByCategoria($idCategoria, $numElementi = 25, $offset = 0)
  {
    $stmt = $this->db->prepare("SELECT *
                                  FROM bottiglie
                                  WHERE idCategoria=? 
                                  LIMIT ?,?");
    $stmt->bind_param('iii', $idCategoria, $offset, $numElementi);
    return $this->executeSelect($stmt);
  }

  public function getCantine()
  {
    $stmt = $this->db->prepare("SELECT DISTINCT * FROM cantine ORDER BY RAND()");
    return $this->executeSelect($stmt);
  }

  public function getProdottoById($idProdotto)
  {
    $stmt = $this->db->prepare("SELECT * FROM bottiglie WHERE id = ?");
    $stmt->bind_param("i", $idProdotto);
    return $this->executeSelect($stmt);
  }

  public function getProdotto()
  {
    $stmt = $this->db->prepare("SELECT * FROM bottiglie");
    return $this->executeSelect($stmt);
  }

  public function getUltimiProdotti(){
    $stmt = $this->db->prepare("SELECT * FROM bottiglie ORDER BY id DESC LIMIT 4");
    return $this->executeSelect($stmt);
  }
  
  public function getRandomProducts (){
    $stmt = $this->db->prepare("SELECT * FROM bottiglie WHERE quantitàDisponibile > 0 ORDER BY RAND() LIMIT 4");
    return $this->executeSelect($stmt);
  }

  public function getCantinaById($idCantina)
  {
    $stmt = $this->db->prepare("SELECT * FROM cantine WHERE id = ?");
    $stmt->bind_param('i', $idCantina);

    return $this->executeSelect($stmt);
  }

  public function getProdottiByCantina($idCantina)
  {
    $stmt = $this->db->prepare("SELECT * FROM bottiglie WHERE idCantina = ?");
    $stmt->bind_param("i", $idCantina);
    return $this->executeSelect($stmt);
  }

  public function getNumProdottiByCategoria($idCategoria)
  {
    $stmt = $this->db->prepare("SELECT COUNT(*) as numProdotti
                                  FROM bottiglie
                                  WHERE idCategoria=? ");
    $stmt->bind_param('i', $idCategoria);
    return $this->executeSelect($stmt)[0]["numProdotti"];
  }

  public function getNumProdottiByCantina($idCantina)
  {
    $stmt = $this->db->prepare("SELECT COUNT(*) as numProdotti
                                  FROM bottiglie
                                  WHERE idCantina=? ");
    $stmt->bind_param('i', $idCantina);
    return $this->executeSelect($stmt)[0]["numProdotti"];
  }

  public function getProdottiByCantine($idCantina, $numElementi = 25, $offset = 0)
  {
    $stmt = $this->db->prepare("SELECT *
                                  FROM bottiglie
                                  WHERE idCantina=? 
                                  LIMIT ?,?");
    $stmt->bind_param('iii', $idCantina, $offset, $numElementi);
    return $this->executeSelect($stmt);
  }

  public function ricercaAutocomplete($parola)
  {
    $stmt = $this->db->prepare("SELECT *
                                  FROM bottiglie
                                  WHERE nome 
                                  LIKE ?
                                  ORDER BY nome");
    $nome = $parola . '%';
    $stmt->bind_param('s', $nome);
    return $this->executeSelect($stmt);
  }

  public function getProdottiByVenditore($idVenditore)
  {
    $stmt = $this->db->prepare("SELECT * FROM bottiglie WHERE idVenditore = ?");
    $stmt->bind_param("i", $idVenditore);
    return $this->executeSelect($stmt);
  }

  public function getVenditorebyId($idVenditore)
  {
    $stmt = $this->db->prepare("SELECT * FROM utenti WHERE id = ? AND ruolo = 'venditore'");
    $stmt->bind_param("i", $idVenditore);
    return $this->executeSelect($stmt);
  }

  public function deleteProdotto($idProdotto)
  {
    $stmt = $this->db->prepare("DELETE FROM righe_ordine WHERE idBottiglia = ?");
    $stmt->bind_param("i", $idProdotto);
    $stmt->execute();

    $stmt = $this->db->prepare("DELETE FROM notifiche WHERE idBottiglia = ?");
    $stmt->bind_param("i", $idProdotto);
    $stmt->execute();

    $stmt = $this->db->prepare("DELETE FROM carrello WHERE idBottiglia = ?");
    $stmt->bind_param("i", $idProdotto);
    $stmt->execute();

    $stmt = $this->db->prepare("DELETE FROM bottiglie WHERE id = ?");
    $stmt->bind_param("i", $idProdotto);
    $stmt->execute();
  }

  public function modificaUtente($username, $password, $nome, $cognome, $indirizzo, $nazione, $CAP, $città, $provincia, $cell, $id){
    $stmt = $this->db->prepare("UPDATE `utenti` SET `username`= ? ,`password`=? ,`nome`=? ,`cognome`=?,`indirizzo`= ? ,`nazione`=? ,`CAP`=?,`città`=?,`provincia`= ?, cellulare = ? WHERE id = ?");
    $stmt->bind_param('ssssssssssi', $username, $password, $nome, $cognome, $indirizzo, $nazione, $CAP, $città, $provincia, $cell,$id);
    $stmt->execute();

    return $stmt->insert_id;
  }

  public function modificaProdotto($idProdotto, $nuovoNome, $nuovoPrezzo, $nuovoLitri, $nuovoAnnata, $nuovoDescrizione, $nuovoImmagine, $nuovoIdCategoria, $nuovoIdCantina, $idVenditore, $nuovoQuantità)
  {
    $stmt = $this->db->prepare("UPDATE bottiglie SET nome = ?, prezzo = ? , litri = ?, annata = ?, descrizione = ?, immagine = ?, idCategoria = ?, `idCantina` = ?, idVenditore = ?, quantitàDisponibile = ? WHERE id = ?;");
    $stmt->bind_param('sddsssiiiii', $nuovoNome, $nuovoPrezzo, $nuovoLitri, $nuovoAnnata, $nuovoDescrizione, $nuovoImmagine, $nuovoIdCategoria, $nuovoIdCantina, $idVenditore, $nuovoQuantità, $idProdotto);
    $stmt->execute();
    return $stmt->id;
  }

  public function getDatiUtente($id)
  {
    $stmt = $this->db->prepare("SELECT *
                                  FROM utenti
                                  WHERE id=?");
    $stmt->bind_param('i', $id);
    return $this->executeSelect($stmt)[0];
  }

  public function inserisciCarrello($carrello, $idCliente, $quantitàDisponibile)
  {
    foreach ($carrello as $idBottiglia => $quantità) {
      $this->aggiungiAlCarrello($idBottiglia, $quantità, $idCliente, $quantitàDisponibile);
    }
  }

  public function aggiungiAlCarrello($idBottiglia, $quantità, $idCliente, $quantitàDisponibile)
  {
    $stmt = $this->db->prepare("SELECT idBottiglia, quantità
                                  FROM carrello
                                  WHERE idCliente=? AND idBottiglia=? AND quantità < ?");
    $stmt->bind_param('iis', $idCliente, $idBottiglia, $quantitàDisponibile);
    $result = $this->executeSelect($stmt);
    if (count($result) > 0) {
      $stmt = $this->db->prepare("UPDATE carrello
                                    SET quantità= quantità + ?
                                    WHERE idCliente=? AND idBottiglia=?");
      $stmt->bind_param('iii', $quantità, $idCliente, $idBottiglia);
    } else {
      $stmt = $this->db->prepare("INSERT INTO carrello (idBottiglia,idCliente,quantità)
                                  VALUES (?,?,?)");
      $stmt->bind_param('iii', $idBottiglia, $idCliente, $quantità);
    }
    $stmt->execute();
  }

  public function getCarrello($idCliente)
  {
    $stmt = $this->db->prepare("SELECT idBottiglia,quantità
                                  FROM carrello
                                  WHERE idCliente=?");
    $stmt->bind_param('i', $idCliente);
    $result = $this->executeSelect($stmt);
    $carrello = array();
    foreach ($result as $riga) {
      $carrello[$riga["idBottiglia"]] = $riga["quantità"];
    }
    return $carrello;
  }



  public function svuotaCarrello($idCliente)
  {
    $stmt = $this->db->prepare("DELETE
                                  FROM carrello
                                  WHERE idCliente=?");
    $stmt->bind_param('i', $idCliente);
    $stmt->execute();
  }

  public function modificaQuantitaProdotto($quantità, $idCliente, $idBottiglia)
  {
    $stmt = $this->db->prepare("UPDATE carrello
                                  SET quantità= ?
                                  WHERE idCliente=? AND idBottiglia=?");
    $stmt->bind_param('iii', $quantità, $idCliente, $idBottiglia);
    $stmt->execute();
  }

  public function rimuoviProdotto($idCliente, $idBottiglia)
  {
    $stmt = $this->db->prepare("DELETE
                                  FROM carrello
                                  WHERE idCliente=? AND idBottiglia=?");
    $stmt->bind_param('ii', $idCliente, $idBottiglia);
    $stmt->execute();
  }

  public function getNumProdottiByVenditore($idVenditore)
  {
    $stmt = $this->db->prepare("SELECT COUNT(*) as numProdotti
                                  FROM bottiglie
                                  WHERE idVenditore=? ");
    $stmt->bind_param('i', $idVenditore);
    return $this->executeSelect($stmt)[0]["numProdotti"];
  }

  public function getPagProdottiByVenditore($idCantina, $numElementi = 25, $offset = 0)
  {
    $stmt = $this->db->prepare("SELECT *
                                  FROM bottiglie
                                  WHERE idVenditore=? 
                                  LIMIT ?,?");
    $stmt->bind_param('iii', $idCantina, $offset, $numElementi);
    return $this->executeSelect($stmt);
  }



  public function getNotificheByUtente($idUtente)
  {
    $stmt = $this->db->prepare("SELECT *
                                  FROM notifiche
                                  WHERE idCliente=?
                                  ORDER BY data DESC,visualizzata");
    $stmt->bind_param('i', $idUtente);
    return $this->executeSelect($stmt);
  }

  public function inserisciOrdine($idCliente, $data, $stato)
  {
    $stmt = $this->db->prepare("INSERT INTO ordini(idCliente,data,stato) VALUES(?,NOW(),?)");
    $stmt->bind_param('is', $idCliente, $stato);
    $stmt->execute();
    return $stmt->insert_id;
  }

  public function aggiornaQuantità($idProdotto, $quantita)
  {

    $stmt = $this->db->prepare("UPDATE `bottiglie` SET `quantitàDisponibile`= quantitàDisponibile - ?  WHERE id=?");
    $stmt->bind_param('ii', $quantita, $idProdotto);
    $stmt->execute();
  }

  public function inserisciRigaOrdine($idOrdine, $quantita, $idProdotto, $totale, $stato)
  {
    $stmt = $this->db->prepare("INSERT INTO righe_ordine(idOrdine,quantità,idBottiglia,totale, stato_riga) VALUES(?,?,?,?, ?)");
    $stmt->bind_param('iiids', $idOrdine, $quantita, $idProdotto, $totale, $stato);
    $stmt->execute();
    return $stmt->insert_id;
  }



  public function getOrdiniByUtente($idCliente, $numElementi = 25, $offset = 0)
  {
    $stmt = $this->db->prepare("SELECT * FROM ordini WHERE idCliente = ? ORDER BY data DESC LIMIT ?,?");
    $stmt->bind_param("iii", $idCliente, $offset, $numElementi);
    return $this->executeSelect($stmt);
  }

  public function getRigheByOrdine($idOrdine)
  {
    $stmt = $this->db->prepare("SELECT * FROM righe_ordine WHERE idOrdine = ?");
    $stmt->bind_param("i", $idOrdine);
    return $this->executeSelect($stmt);
  }

  public function getOrdiniByAdmin($idVenditore,$numElementi=25,$offset=0)
  {
    $stmt = $this->db->prepare("("."SELECT ro.id as idRigaOrdine , o.id as idOrdine, ro.quantità as quantitàRigaOrdine, o.data, ro.stato_riga,o.idCliente,ro.idBottiglia FROM righe_ordine ro, bottiglie b , ordini o WHERE b.idVenditore = ? AND ro.idOrdine = o.id AND ro.idBottiglia = b.id ORDER BY o.data DESC) LIMIT ?,?");
    $stmt->bind_param("iii", $idVenditore,$offset,$numElementi);
    return  $this->executeSelect($stmt);
  }

  public function spedisciRigaOrdine($idRigaOrdine)
  {
    $stmt = $this->db->prepare("UPDATE righe_ordine SET stato_riga = 'spedito'
                                WHERE id = ?");
    $stmt->bind_param('i', $idRigaOrdine);
    $stmt->execute();
  }

  public function getOrdini()
  {
    $stmt = $this->db->prepare("SELECT * FROM ordini");
    return $this->executeSelect($stmt);
  }

  public function ricevutoOrdine($idOrdine)
  {
    $stmt = $this->db->prepare("UPDATE ordini SET stato = 'consegnato' , dataConsegna = NOW() 
                                WHERE id = ?");
    $stmt->bind_param('i', $idOrdine);
    $stmt->execute();
  }

  public function getStatoByRiga($idRigaOrdine)
  {
    $stmt = $this->db->prepare("SELECT stato_riga FROM righe_ordine
                                WHERE id = ?");
    $stmt->bind_param("i", $idRigaOrdine);
    return  $this->executeSelect($stmt);
  }

  public function aggiornaStatoOrdine($idOrdine)
  {
    $stmt = $this->db->prepare("UPDATE ordini SET stato = 'in viaggio'
                                WHERE id = ?");
    $stmt->bind_param('i', $idOrdine);
    $stmt->execute();
  }

  private function notifica($idNotifica, $idUtente, $idOrdine, $idProdotto)
  {
    $stmt = $this->db->prepare("INSERT INTO notifiche (idTipoNotifica,data, idCliente,idOrdine,idBottiglia)
                                  VALUES (?,NOW(), ? ,?,?)");
    $stmt->bind_param('iiii', $idNotifica, $idUtente, $idOrdine, $idProdotto);
    $stmt->execute();
  }

  public function notificaConfermaOrdine($idUtente, $idOrdine)
  {
    $this->notifica(1, $idUtente, $idOrdine, null);
  }

  public function notificaSpedizioneOrdine($idUtente, $idOrdine)
  {
    $this->notifica(2, $idUtente, $idOrdine, null);
  }


  public function notificaOrdineRicevuto($idUtente, $idOrdine)
  {
    $this->notifica(3, $idUtente, $idOrdine, null);
  }


  public function notificaBottigliaEsaurita($idUtente, $idBottiglia)
  {
    $this->notifica(4, $idUtente, null, $idBottiglia);
  }

  public function notificaNuovoOrdine($idUtente, $idOrdine)
  {
    $this->notifica(5, $idUtente, $idOrdine, null);
  }

  public function notificaRegistrazione($idUtente){
    $this->notifica(6, $idUtente, null, null);
  }

  public function eliminaNotifica($idNotifica)
  {
    $stmt = $this->db->prepare("DELETE
                                  FROM notifiche
                                  WHERE id=?");
    $stmt->bind_param('i', $idNotifica);
    $stmt->execute();
  }

  public function getNumNuoveNotificheByUtente($idUtente)
  {
    $stmt = $this->db->prepare("SELECT COUNT(*) as num
                                    FROM notifiche
                                    WHERE idCliente=? AND visualizzata=false");
    $stmt->bind_param('i', $idUtente);
    return $this->executeSelect($stmt)[0]["num"];
  }

  public function setNotificaVisualizzata($idNotifica)
  {
    $stmt = $this->db->prepare("UPDATE notifiche
                                  SET visualizzata=true
                                  WHERE id=?");
    $stmt->bind_param('i', $idNotifica);
    $stmt->execute();
  }

  public function getTipoNotificaById($idTipo)
  {
    $stmt = $this->db->prepare("SELECT *
                                    FROM tipo_notifica
                                    WHERE id=?");
    $stmt->bind_param('i', $idTipo);
    return $this->executeSelect($stmt)[0];
  }

  public function getNotificheByOrdini($idOrdine)
  {
    $stmt = $this->db->prepare("SELECT *
                                FROM notifiche
                                WHERE idOrdine=?
                                AND idTipoNotifica = 3");
    $stmt->bind_param('i', $idOrdine);
    return $this->executeSelect($stmt)[0];
  }

  public function getOrdineById($id){
    $stmt = $this->db->prepare("SELECT *
                                FROM ordini
                                WHERE id = ?");
    $stmt->bind_param('i', $id);
    return $this->executeSelect($stmt)[0];
  }

  public function getOrdineByRiga($idRigaOrdine){
    $stmt = $this->db->prepare("SELECT o.id, o.idCliente
                                FROM ordini o , righe_ordine ro
                                WHERE o.id = ro.idOrdine
                                AND ro.id = ?");
    $stmt->bind_param('i', $idRigaOrdine);
    return $this->executeSelect($stmt)[0];
  }

  public function getNumOrdiniAdmin($idVenditore){
    $stmt = $this->db->prepare("SELECT COUNT(*) AS numOrdini, ro.id as idRigaOrdine , o.id as idOrdine, ro.quantità as quantitàRigaOrdine, o.data, ro.stato_riga,o.idCliente,ro.idBottiglia FROM righe_ordine ro, bottiglie b , ordini o WHERE b.idVenditore = ? AND ro.idOrdine = o.id AND ro.idBottiglia = b.id ORDER BY o.data DESC");
    $stmt->bind_param("i",$idVenditore);
    return $this->executeSelect($stmt)[0]["numOrdini"];
  }

  public function getNumOrdini($idCliente){
    $stmt = $this->db->prepare("SELECT COUNT(*) AS numOrdini FROM ordini WHERE idCliente = ?");
    $stmt->bind_param("i",$idCliente);
    return $this->executeSelect($stmt)[0]["numOrdini"];
  }



}

?>
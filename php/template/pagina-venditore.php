<section>
  <h2 class="text-center text-uppercase mt-1 mb-4" style="font-weight: bold;"> BENTORNATO <?php echo $venditoreSel["nome"] ?></h2>
  <div class="album py-3 mt-5">
    <div class="row text-center">
      <div class="col-2 col-md-2"></div>
      <div style="cursor: pointer;" class="card col-4 col-md-4 mb-4 shadow-sm d-flex flex-fill text-center mr-2">
        <a href="./prodotti-inseriti.php" style="color:black; text-decoration:none;">
          <h3 style="font-weight: bold;" class="mt-2">PRODOTTO INSERITI</h3>
          <br>
          <p style="font-weight: bold; font-size: large;"><?php echo $numProdotti." prodotti inseriti"; ?></p>
        </a>
      </div>
      <div class="card col-4 col-md-4 mb-4 shadow-sm d-flex flex-fill text-center ml-2">
        <a href="./ordini-admin.php" style="color:black; text-decoration:none;">
          <h3 style="font-weight: bold;" class="mt-2">VISUALIZZA ORDINI</h3>
          <br>
          <p style="font-weight: bold; font-size: large;"><?php echo $dbh->getNumOrdiniAdmin($_SESSION["id"])." ordini da visualizzare"; ?></p>
        </a>
      </div>
    </div>
    <div class="row text-center">
      <div class="col-12 col-md-12 mt-2">
        <a role="button" href="./processa-prodotto.php?action=1" name="inserisciProdotto" style="font-weight: bold;" class="py-2 btn btn-primary" id="inserisci">INSERISCI PRODOTTO</a>
      </div>
    </div>
  </div>

</section>
<section>
  <h2 style="font-weight: bold;" class="text-center text-uppercase py-4">Notifiche</h2>
  <div class="row justify-content-center">
    <?php if (count($templateParams["notifiche"]) == 0) : ?>
      <div class="mt-4 mb-3">
        <span class="alert alert-danger" role="alert">
          non hai notifiche al momento, torna più tardi
        </span>
      </div>
    <?php else : ?>
      <?php $i=0;foreach ($templateParams["notifiche"] as $notifica) : ?>
        <div class="card border-dark col-10 col-md-10 bg-white mb-4 card-notifica">
          <div class="notifica-intestazione">
            <?php if (!$notifica["visualizzata"]) : ?>
              <span class="alert col-2 col-md-2 alert-warning text-dark justify-content-center d-flex badge-notifica px-0 mt-1" style="font-weight: bold;">Nuova Notifica</span>
            <?php endif; ?>
            <p class="small text-uppercase mb-2 mt-2 " style="font-weight: bold;"><?php echo $notifica["data"] ?></p>
            <p class="mt-3 text-center text-uppercase" style="font-weight: bold;"><?php echo $dbh->getTipoNotificaById($notifica["idTipoNotifica"])["nome"]; ?></p>
            <p class="mb-3 text-center"><?php echo $dbh->getTipoNotificaById($notifica["idTipoNotifica"])["descrizione"]; ?></p>
            <div class="d-flex flex-row-reverse">

              <form class="form elimina col-2 mb-2" action="eliminaNotifica.php" method="post">
                <input type="hidden" name="idNotifica" value="<?php echo $notifica["id"]; ?>" />
                <button type="submit" class="btn btn-danger" aria-label="Close"><i class="fa fa-trash"></i></button>
              </form>
              <form class="form visualizza mb-2" action="visualizzaNotifica.php" method="post">
                <input type="hidden" name="idNotifica" value="<?php echo $notifica["id"]; ?>" />
                <button type="<?php echo ($notifica["visualizzata"]) ? "button" : "submit"; ?>" class="btn btn-outline-secondary text-dark visualizza-notifica"><i class="fa fa-eye"></i></button>
              </form>
            </div>
          </div>
          <div class="dettaglio-notifica">
            <?php if (isUserLoggedIn()) : ?>
              <?php if (!isUserAdmin()) : ?>
                <?php $righeOrdine = $dbh->getRigheByOrdine($notifica["idOrdine"]); ?>
                <?php foreach ($righeOrdine as $rigaOrdine) : ?>
                  <?php $idProdotto = $rigaOrdine["idBottiglia"];
                  $prodotto = $dbh->getProdottoById($idProdotto)[0]; ?>
                  <div class="row">
                    <div class="col-md-5 col-lg-3 col-xl-3">
                      <a href="prodotto.php?idProdotto=<?php echo $prodotto["id"] ?>">
                        <img class="img-fluid w-100" style="max-height:150px;max-width:75px; " src="<?php echo IMG_ARTICOLI_DIR . $prodotto["immagine"] ?>" alt="immagine-notifica">
                      </a>
                    </div>
                    <div class="col-md-7 col-lg-9 col-xl-9">
                      <div>
                        <div>
                          <div>
                            <h5><?php echo $prodotto["nome"] ?></h5>
                          </div>
                        </div>
                        <div class="mt-4">
                          <p><strong> Quantità: </strong><?php echo $rigaOrdine["quantità"]; ?> </p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                          <p class="mb-0"><span><strong> Prezzo per unità: </strong><?php echo $prodotto["prezzo"] . "€" ?></span></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr>
                <?php endforeach; ?>
              <?php else : ?>
                <?php if (isset($notifica["idBottiglia"])) : ?>
                  <?php $idProdotto = $notifica["idBottiglia"];
                  $prodotto = $dbh->getProdottoById($idProdotto)[0]; ?>
                  <div class="row mb-2">
                    <div class="col-md-5 col-lg-3 col-xl-3">
                      <a href="prodotto.php?idProdotto=<?php echo $prodotto["id"] ?>">
                        <img class="img-fluid w-100" style="max-height:150px;max-width:75px; " src="<?php echo IMG_ARTICOLI_DIR . $prodotto["immagine"] ?>" alt="immagine-notifica">
                      </a>
                    </div>
                    <div class="col-md-7 col-lg-9 col-xl-9">
                      <div>
                        <div>
                          <div>
                            <h5><?php echo $prodotto["nome"] ?></h5>
                          </div>
                        </div>
                        <div class="mt-4">
                          <p><span class="fa fa-exclamation-triangle text-danger me-2"></span>Prodotto esaurito</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                          <p class="mb-0"><span><strong> Prezzo per unità: </strong><?php echo $prodotto["prezzo"] . "€" ?></span></p>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php else :  ?>    
                <?php endif; ?>

              <?php endif; ?>
            <?php endif; ?>
          </div>
        </div>
      <?php $i++;endforeach; ?>
    <?php endif; ?>
  </div>
</section>
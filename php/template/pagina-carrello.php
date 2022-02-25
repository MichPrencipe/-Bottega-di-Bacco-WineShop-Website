<!--Section: Block Content-->
<section class="mt-4">

  <!--Grid row-->
  <div class="row">

    <!--Grid column-->
    <div class="col-lg-8">
      <!-- Card -->
      <div class="mb-3 ">
        <div class="card-body py-0">
          <?php if (count($templateParams["carrello"]) == 0) : ?>
            <div class="py-4 ">
              <span class="alert alert-danger" role="alert">
                Non sono presenti prodotti nel carrello!
              </span>
            </div>
          <?php else : ?>
            <h5 class="mb-4">Carrello: </h5>
            <?php $i = 0;
            foreach ($templateParams["carrello"] as $prodotto) : ?>
              <div class="mb-4 riga-carrello card py-3 px-3">
                <div class="row">
                  <div class="col-md-5 col-lg-3 col-xl-3">
                    <a href="prodotto.php?idProdotto=<?php echo $prodotto["id"] ?>">
                      <img class="img-fluid w-100" style="max-height:150px;max-width:75px; " src="<?php echo IMG_ARTICOLI_DIR . $prodotto["immagine"] ?>" alt="immagine-carrello">
                    </a>
                  </div>
                  <div class="col-md-7 col-lg-9 col-xl-9">
                    <div>
                      <div class="d-flex justify-content-between">
                        <div>
                          <h5><?php echo $prodotto["nome"] ?></h5>
                          <p class="mb-3 text-muted text-uppercase small">Cantina: <?php echo $cantinaProdottoSelezionato["nome"] ?></p>
                          <p class="mb-2 text-muted text-uppercase small">Categoria: <?php echo $categoriaProdottoSelezionato["nome"] ?></p>
                          <p class="mb-3 text-muted text-uppercase small"><?php echo $prodotto["litri"] ?>L</p>
                        </div>
                        <div>
                          <div class="def-number-input number-input safari_only mb-0">
                            <form class="form modifica" name="modifica" id="modifica_<?php echo $i ?>" action="modificaCarrello.php?action=modifica" method="post">
                              <div class="row">
                                <label for="quantity_carrello_<?php echo $prodotto["id"] ?>" class="form-label col-7 mt-3">Quantità:</label>
                                <input type="hidden" name="idProdotto" id="quantity_<?php echo $prodotto["id"] ?>" value="<?php echo $prodotto["id"] ?>">
                                <div class="col-md-7 col-lg-5">
                                  <div class="input-group">
                                    <input type="number" id="quantity_carrello_<?php echo $prodotto["id"] ?>" name="quantity" class="form-control input-number count" value="<?php echo $prodotto["quantità"] ?>" min="1" max="<?php echo $prodotto["quantitàDisponibile"] ?>">
                                  </div>
                                </div>
                              </div>
                              <button type="submit" class="btn btn-light btn-md mr-1 mb-2 waves-effect waves-light mt-2"><i class="fas fa-spinner pr-2"></i>Aggiorna Quantità</button>
                            </form>
                            </span>
                          </div>
                          <small class="form-text text-muted text-center">
                            <?php echo $prodotto["quantitàDisponibile"] ?> rimasti in magazzino.
                          </small>
                        </div>
                      </div>
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <form class="form rimuovi" action="modificaCarrello.php?action=rimuovi" method="post">
                            <input type="hidden" name="idProdotto" value="<?php echo $prodotto["id"] ?>" />
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash me-2"></i> Rimuovi</a>
                          </form>
                        </div>
                        <p class="mb-0"><span><strong><?php echo $prodotto["prezzo"] . "€" ?></strong></span></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php $i++; ?>
            <?php endforeach; ?>
          <?php endif; ?>
          <!-- Card -->
          <!--Grid column-->

        </div>

      </div>
    </div>
    <!--Grid column-->
    <div class="col-lg-4">

      <!-- Card -->
      <div class="card mb-3 mt-5">
        <div class="card-body">

          <h5 class="mb-3">Riassunto</h5>

          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
              Temporaneo
              <span id="subtotal"><?php echo $templateParams["subtotale"] . "€" ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
              CONSEGNA
              <span>Gratis</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
              <div>
                <strong>TOTALE</strong>
                
                  <p class="mb-0"><strong>(IVA inclusa)</strong></p>
              </div>
              <span><strong id="subtotale"><?php echo $templateParams["subtotale"] . "€"; ?></strong></span>
            </li>
          </ul>
          <?php if (count($templateParams["carrello"]) == 0) : ?>
            <button type="button" class="btn btn-primary btn-block waves-effect waves-light" disabled="disabled">PROCEDI AL PAGAMENTO</button>
          <?php else : ?>
            <a href="./pagamento.php" role="button" class="btn btn-primary btn-block waves-effect waves-light">PROCEDI AL PAGAMENTO</a>
          <?php endif; ?>
        </div>
        <!-- Card -->



      </div>
      <!--Grid column-->

    </div>
    <!--Grid row-->
  </div>
</section>
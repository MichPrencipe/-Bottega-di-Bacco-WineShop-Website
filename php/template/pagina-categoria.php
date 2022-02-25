 
  <section class="mt-4">
    <h2 class="text-center text-uppercase" style="font-weight: bold;"><?php echo $categoriaSelezionata["nome"] ?></h2>
    <div class="col-12 col-md-12">
      <div class="col-12 col-md-12 text-center">
        <img class="img-fluid img-fit-product product-img text-center" src="<?php echo IMG_CATEGORIE_DIR . $categoriaSelezionata["immagine"] ?>" alt="immagine-categoria">
      </div>
    </div>
    <hr class="col-8 col-md-8 mb-4 mt-4">
    <div class="album container-fluid">
      <div class="row text-center">
        <?php foreach ($templateParams["prodotti"] as $prodotto) : ?>
          <div class="col-6 col-sm-6 col-xl-3 d-flex align-self-stretch mt-4">
            <div class="card shadow-sm d-flex flex-fill col-12 col-md-12 container-img">
              <header id="header-prodotto_<?php echo $prodotto["id"]?>" class="ratio ratio-4x3 position-relative mt-4">
                <img class="img-fluid img-fit-product product-img" src="<?php echo IMG_ARTICOLI_DIR . $prodotto["immagine"] ?>" alt="immagine-prodotto">
                <div class="middle">
                  <a href="./prodotto.php?idProdotto=<?php echo $prodotto["id"]; ?>"><i class="fa fa-search" style="color:black;font-size:30px;"></i></a>
                </div>
                <a href="./prodotto.php?idProdotto=<?php echo $prodotto["id"]; ?>" class="text-reset text-decoration-none">
                  <h3 class="card-title fs-4"><?php echo $prodotto["nome"] ?></h3>
                </a>
              </header>
              <div class="card-body mt-4">
                <p><?php echo "Anno: ".$prodotto["annata"] ?> </p>
                <p> <?php echo "Litri: ".$prodotto["litri"] . "L" ?> </p>
                <strong><?php echo $prodotto["prezzo"] . "€" ?></strong>
                <?php if (isUserLoggedIn()) : ?>
                  <?php if (!isUserAdmin()) : ?>
                    <form class="form carrello" action="inserimentoAlCarrello.php" method="post">
                      <input type="hidden" name="idProdotto" value="<?php echo $prodotto["id"] ?>">
                      <div class="info mt-2">
                        <?php if ($prodotto["quantitàDisponibile"] != 0) : ?>
                          <p><span class="fa fa-check-circle text-success me-2"></span>Prodotto disponibile</p>
                        <?php else : ?>
                          <p><span class="fa fa-exclamation-triangle text-danger me-2"></span>Prodotto esaurito</p>
                        <?php endif; ?>
                      </div>
                      <div class="row justify-content-center">
                        <label for="quantity_<?php echo $prodotto["id"] ?>" class="form-label inline-block mr-2" style="height: 30px;">Quantità: </label>
                        <input style="height: 25px; width: 60px;" type="number" id="quantity_<?php echo $prodotto["id"] ?>" name="quantity" class="form-control input-number text-right" min="1" max="<?php echo $prodotto["quantitàDisponibile"]; ?>" value="1" />
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-danger text-align-center align-items-center mt-2"><span class="fa fa-shopping-cart me-2"></span>Aggiungi al carrello</a>
                      </div>
                    </form>
                  <?php endif; ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <?php require_once("paginazione.php"); ?>
  </section>
  </div>
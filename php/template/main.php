<div id="carousel-1" id="carousel-1" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-1" data-slide-to="1"></li>
    <li data-target="#carousel-1" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?php echo IMG_BANNER_DIR . "cantina.jpg" ?>" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo IMG_BANNER_DIR . "migliori-vini.jpg" ?>" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo IMG_BANNER_DIR . "tappi.jpg" ?>" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<section>
  <h2 class="text-center font-weight-bold text-uppercase mt-4 mb-4">CONSIGLIATI PER TE</h2>
  <div class="album container-fluid">
    <div class="row text-center">
      <?php foreach ($templateParams["prodotti-random"] as $prodotto) : ?>
        <div class="col-6 col-sm-6 col-xl-3 d-flex align-self-stretch mt-4">
            <div class="card shadow-sm d-flex flex-fill col-12 col-md-12 container-img">
              <header id="header-prodotto<?php echo $prodotto["id"]?>" class="ratio ratio-4x3 position-relative mt-4">
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
  </div>
</section>
<section>
  <hr class="col-8 col-md-8 mb-4">
  <h2 class="text-center text-uppercase font-weight-bold mb-4">Ultimi Arrivi</h2>
  <div class="album container-fluid">
    <div class="row text-center">
      <?php foreach ($templateParams["ultimi-prodotti"] as $prodotto) : ?>
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
  </div>
</section>
<section>
  <hr class="col-8 col-md-8 mb-4">
  <h2 class="text-center text-uppercase font-weight-bold mb-4">Vetrina Cantine</h2>
  <div class="row">
    <div class="col-md-1"></div>
    <div id="carousel-2" class="carousel slide col-12 col-md-10" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carousel-2" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-2" data-slide-to="1"></li>
        <li data-target="#carousel-2" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active container-fluid">
          <div class="row justify-content-center">
            <?php for ($i = 0; $i < 4; $i++) : $cantina = $templateParams["cantine"][$i] ?>
              <div class="col-3 col-md-3">
                <div class="col-12 col-md-12">
                  <a href="./cantina.php?idCantina=<?php echo $cantina["id"]; ?>"><img src="<?php echo IMG_CANTINE_DIR . $cantina["immagine"] ?>" class="img-fluid" alt="immagine-prodotto"></a>
                </div>
              </div>
            <?php endfor; ?>
          </div>
        </div>
        <div class="carousel-item container-fluid">
          <div class="row justify-content-center">
            <?php for ($i = 4; $i < 8; $i++) : $cantina = $templateParams["cantine"][$i] ?>
              <div class="col-3 col-md-3">
                <div class="col-12 col-md-12">
                  <a href="./cantina.php?idCantina=<?php echo $cantina["id"]; ?>"><img src="<?php echo IMG_CANTINE_DIR . $cantina["immagine"] ?>" class="img-fluid" alt="immagine-prodotto"></a>
                </div>
              </div>
            <?php endfor; ?>
          </div>
        </div>
        <div class="carousel-item container-fluid">
          <div class="row justify-content-center">
            <?php for ($i = 8; $i < 12; $i++) : $cantina = $templateParams["cantine"][$i] ?>
              <div class="col-3 col-md-3">
                <div class="col-12 col-md-12">
                  <a href="./cantina.php?idCantina=<?php echo $cantina["id"]; ?>"><img src="<?php echo IMG_CANTINE_DIR . $cantina["immagine"] ?>" class="img-fluid" alt="immagine-cantina"></a>
                </div>
              </div>
            <?php endfor; ?>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carousel-2" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" style="background-color: black" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carousel-2" role="button" data-slide="next">
        <span class="carousel-control-next-icon" style="background-color: black" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</section>
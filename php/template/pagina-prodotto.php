<main class="col-12 col-md-12 mt-4">
    <section class="mb-5">

        <div class="row">
            <div class="col-md-3 col-3 mb-4 mb-md-0 text-center">
                <div class="mdb-lightbox" data-pswp-uid="1">

                    <div class="row product-gallery mx-1">

                        <div class="col-12 mb-0">
                            <figure class="view overlay rounded z-depth-1 mt-2 main-img">
                                <a href="#" data-size="710x823">
                                    <img src="<?php echo IMG_ARTICOLI_DIR . $prodottoSelezionato["immagine"] ?>" alt="immagine-prodotto" class="img-fluid z-depth-1" style="transform-origin: center center; transform: scale(1);">
                                </a>
                            </figure>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-9 col-9">
                <h3 style="font-weight: bold;"><?php echo $prodottoSelezionato["nome"] ?></h3>
                <p class="mb-2 text-muted text-uppercase small">Vini Rossi</p>
                <p><span class="mr-1"><strong><?php echo $prodottoSelezionato["prezzo"] . "€" ?></strong></span></p>
                <p class="pt-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit dolorum nam nesciunt, mollitia repellendus labore veniam corrupti. Culpa maxime, nisi quam accusamus quidem nobis ut, iste suscipit ipsa amet ducimus! </p>
                <div class="table-responsive">
                    <table class="table table-sm table-borderless mb-0">
                        <tbody>
                            <tr>
                                <th class="pl-0 w-25" scope="row"><strong>Annata:</strong></th>
                                <td><?php echo $prodottoSelezionato["annata"] ?></td>
                            </tr>
                            <tr>
                                <th class="pl-0 w-25" scope="row"><strong>Litri:</strong></th>
                                <td><?php echo $prodottoSelezionato["litri"] . "L" ?></td>
                            </tr>
                            <tr>
                                <th class="pl-0 w-25" scope="row"><strong>Cantina:</strong></th>
                                <td><?php echo $cantinaProdottoSelezionato["nome"] ?></td>
                            </tr>
                            <tr>
                                <th class="pl-0 w-25" scope="row"><strong>Provenienza:</strong></th>
                                <td><?php echo $cantinaProdottoSelezionato["regione"] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr>

                <?php if (isUserLoggedIn()) : ?>
                    <?php if (!isUserAdmin()) : ?>
                        <?php if ($prodottoSelezionato["quantitàDisponibile"] != 0) : ?>
                            <form class="form carrello" action="inserimentoAlCarrello.php" method="post">
                                <div class="row">
                                    <label for="quantita_<?php echo $prodottoSelezionato["id"] ?>" class="form-label col-5 mt-3">Quantità:</label>
                                    <input type="hidden" name="idProdotto" value="<?php echo $prodottoSelezionato["id"] ?>">
                                    <div class="col-lg-2">
                                        <div class="input-group">
                                            <input type="number" id="quantity" name="quantity" class="form-control input-number count" value="1" min="1" max="<?php echo $prodottoSelezionato["quantitàDisponibile"] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <button type="submit" class="btn btn-light btn-md mr-1 mb-2 waves-effect waves-light"><i class="fas fa-shopping-cart pr-2"></i>Aggiungi al Carrello</button>
                                </div>
                            </form>
                        <?php else : ?>
                            <div class="mt-2">
                                <p><span class="fa fa-check-circle text-danger me-2"></span>Prodotto non disponibile</p>
                            </div>
                        <?php endif ?>
                    <?php endif ?>
                <?php endif ?>
            </div>
        </div>
    </section>
</main>
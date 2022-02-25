<section>
    <?php if (isset($_GET["message"])) : ?>
        <div class="row justify-content-center"><span class="alert alert-success delay-alert mt-2 p-0 text-uppercase" role="alert"><?php echo $_GET["message"]; ?></span></div>
    <?php endif; ?>
    <?php if (isset($_GET["error"])) : ?>
        <div class="row justify-content-center"><span class="alert alert-danger delay-alert mt-2 p-0 text-uppercase" role="alert"><?php echo $_GET["error"]; ?></span></div>
    <?php endif; ?>
    <h2 class="text-center text-uppercase mt-3" style="font-weight: bold;">PRODOTTI IN VENDITA</h2>
    <div class="album container-fluid">
        <div class="row text-center">
            <?php foreach ($templateParams["prodotti"] as $prodotto) : ?>
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
                            <input type="hidden" name="idProdotto" value="<?php echo $prodotto["id"] ?>">
                            <div class="info mt-2">
                                <?php if ($prodotto["quantitàDisponibile"] != 0) : ?>
                                    <p><span class="fa fa-check-circle text-success me-2"></span>Prodotto disponibile</p>
                                <?php else : ?>
                                    <p><span class="fa fa-exclamation-triangle text-danger me-2"></span>Prodotto esaurito</p>
                                <?php endif; ?>
                            </div>


                            <a role="button" href="processa-prodotto.php?action=2&idProdotto=<?php echo $prodotto["id"]; ?>" class="btn btn-primary">Modifica</a>
                            <a role="button" href="processa-prodotto.php?action=3&idProdotto=<?php echo $prodotto["id"]; ?>" class="btn btn-danger ml-3">Cancella</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php require_once("paginazione.php"); ?>
</section>
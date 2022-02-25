<section>
    <h2 style="font-weight: bold;" class="text-center text-uppercase py-4">ORDINI:</h2>
    <?php if (isset($_GET["message"])) : ?>
            <div class="row justify-content-center text-center"><span class="alert alert-success delay-alert mt-2 p-0 text-uppercase" role="alert"><?php echo $_GET["message"]; ?></span></div>
    <?php endif; ?>
    <div class="row justify-content-center">
        <div class="mt-4 mb-3">
        </div>
        <?php foreach ($ordiniAdmin as $ordine) : ?>
            <div class="col-8 col-md-8  mt-4 mb-4" style="cursor: pointer;">
                <div class="card border-dark">
                    <div class="card-header bg-secondary fw-b border-dark">
                        <strong><?php echo "Codice ordine: " . $ordine["idRigaOrdine"] ?></strong>
                    </div>
                    <div class="card-body border-dark">
                        <?php $idProdotto = $ordine["idBottiglia"];
                        $prodotto = $dbh->getProdottoById($idProdotto)[0]; ?>
                        <div class="row">
                            <div class="col-md-5 col-lg-3 col-xl-3">
                                <a href="prodotto.php?idProdotto=<?php echo $prodotto["id"] ?>">
                                    <img class="img-fluid w-100" style="min-width:75px;min-height:150px;max-height:150px;max-width:75px; " src="<?php echo IMG_ARTICOLI_DIR . $prodotto["immagine"] ?>" alt="immagine-prodotto">
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
                                        <p><strong> Quantità: </strong><?php echo $ordine["quantitàRigaOrdine"]; ?> </p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="mb-0"><span><strong> Prezzo per unità: </strong><?php echo $prodotto["prezzo"] . "€" ?></span></p>
                                    </div>
                                    <div class="mt-4">
                                        <p><strong> Cliente: </strong><?php echo $ordine["idCliente"]; ?> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="card-footer bg-secondary fw-b border-dark">
                        <div class="row justify-content-between">
                            <p><strong>Ordine effettuato il: <?php echo $ordine["data"]; ?></strong></p>
                            <?php if ($ordine["stato_riga"] == "confermato") : ?>
                                <form class="form col-10 col-md-3 mt-4 offset-md-1 p-0" action="#" method="POST">
                                    <input type="hidden" name="spedisci" value="<?php echo $ordine["idRigaOrdine"] ?>" />
                                    <button type="submit"  class="btn btn-danger border-dark col-12" style="font-weight:bold">Spedisci</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>        
</section>
<?php require_once("paginazione.php");?>
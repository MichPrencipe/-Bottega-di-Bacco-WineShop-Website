<section>
    <h2 style="font-weight: bold;" class="text-center text-uppercase py-4">I MIEI ORDINI:</h2>
    <?php if (isset($_GET["message"])) : ?>
            <div class="row justify-content-center text-center"><span class="alert alert-success delay-alert mt-2 p-0 text-uppercase" role="alert"><?php echo $_GET["message"]; ?></span></div>
    <?php endif; ?>
    <div class="row justify-content-center">
        <?php $i=0; ?>
        <?php foreach ($ordini as $ordine) : ?>
            <div class="col-8 col-md-8  mt-4 mb-4" style="cursor: pointer;">
                <div class="card border-dark">
                    <div class="card-header bg-secondary fw-b border-dark">
                        <strong><?php echo "Codice ordine: " . $ordine["id"] ?></strong>
                    </div>
                    <div class="card-body border-dark">
                        <?php $righeOrdine = $dbh->getRigheByOrdine($ordine["id"]); ?>
                        <?php foreach ($righeOrdine as $rigaOrdine) : ?>
                            <?php $idProdotto = $rigaOrdine["idBottiglia"];
                            $prodotto = $dbh->getProdottoById($idProdotto)[0]; ?>
                            <div class="row">
                                <div class="col-md-5 col-lg-3 col-xl-3">
                                    <a href="prodotto.php?idProdotto=<?php echo $prodotto["id"] ?>">
                                        <img class="img-fluid w-100" style="max-height:150px;max-width:75px; " src="<?php echo IMG_ARTICOLI_DIR . $prodotto["immagine"] ?>" alt="immagine-articolo">
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
                    </div>
                    <div class="tracking">
                        <div class="title offset-1 offset-md-1 bg-light" style="font-weight:bold;" >Traccia il mio ordine:</div>
                    </div>
                    <div class="container-fluid">
                        <div class="track">
                            <div class="step <?php if (($ordine["stato"] == "confermato") || ($ordine["stato"] == "spedito") || ($ordine["stato"] == "in viaggio") || ($ordine["stato"] == "consegnato")) {
                                                    echo "active";
                                                } ?>"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Confermato</span> </div>
                            <div class="step <?php if (($ordine["stato"] == "consegnato") || ($ordine["stato"] == "in viaggio") || ($ordine["stato"] == "spedito")) {
                                                    echo "active";
                                                } ?>"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Spedito</span> </div>
                            <div class="step <?php if (($ordine["stato"] == "consegnato") || ($ordine["stato"] == "in viaggio")) {
                                                    echo "active";
                                                } ?>"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> In viaggio </span> </div>
                            <div class="step <?php if (($ordine["stato"] == "consegnato")) {
                                                    echo "active";
                                                } ?>"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Consegnato</span> </div>
                        </div>
                    </div>
                    <div id="card-ordine<?php echo $i?>" class="card-footer bg-secondary fw-b border-dark">
                        <div class="row justify-content-between">
                            <strong>Ordine effettuato il: <?php echo $ordine["data"]; ?></strong>
                            <?php if ($ordine["stato"] == "consegnato") : ?>
                                <strong>Ordine consegnato il: <?php echo $ordine["dataConsegna"] ?></strong>
                            <?php else : ?>
                                <?php if ($ordine["stato"] == "in viaggio") : ?>
                                    <form id="<?php echo[$i]?>" class="form col-10 col-md-3 mt-4 offset-md-1 p-0" action="#" method="POST">
                                        <input type="hidden" name="ricevuto" id="<?php echo $ordine["id"] ?>" value="<?php echo $ordine["id"] ?>" />
                                        <button type="submit" class="btn btn-danger border-dark col-12" style="font-weight:bold">Ricevuto</button>
                                    </form>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php $i++; ?>
        <?php endforeach; ?>
</section>
<?php require_once("paginazione.php");?>
<div class="container mt-5" style="margin-left:auto;margin-right:auto; width:100%">
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted text-uppercase">Carrello:</span>
                <span class="badge badge-secondary badge-pill"><?php echo getNumProdottiCarrello() ?></span>
            </h4>
            <ul class="list-group mb-3">
                <?php foreach ($templateParams["carrello"] as $prodotto) : ?>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0"><?php echo $prodotto["nome"] ?></h6>
                            <small class="text-muted"><?php echo "x" . $prodotto["quantità"] ?></small>
                        </div>
                        <span class="text-muted"><?php $prezzo = number_format($prodotto["prezzo"] * $prodotto["quantità"], 2, ".", " ");
                                                    echo $prezzo . "€" ?></span>
                    </li>
                <?php endforeach; ?>
                <li class="list-group-item d-flex justify-content-between">
                    <span><strong>Totale(IVA inclusa): </strong></span>
                    <strong><?php echo $templateParams["subtotale"] . "€" ?></strong>
                </li>
            </ul>
        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Dati di fatturazione:</h4>
            <form id="pagamento" class="needs-validation" action="pagamento.php" method="post" >
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Nome:</label>
                        <input name="nome" type="text" class="form-control" id="firstName" placeholder="" value="<?php echo $datiUtente["nome"] ?>" required="">

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Cognome:</label>
                        <input name="cognome" type="text" class="form-control" id="lastName" placeholder="" value="<?php echo $datiUtente["cognome"] ?>" required="">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">Indirizzo</label>
                    <input name="indirizzo" type="text" class="form-control" id="address" value="<?php echo $datiUtente["indirizzo"] ?>" required="">
                </div>

                <div class="mb-3">
                    <label for="address2">Città</label>
                    <input name ="città" type="text" class="form-control" id="address2" placeholder="Apartment or suite" value="<?php echo $datiUtente["città"] ?>">
                </div>

                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="stato">Stato</label>
                        <input name="stato" type="text" class="form-control" id="stato" placeholder="" required="" value="<?php echo $datiUtente["nazione"] ?>">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="provincia">Provincia</label>
                        <input name="provincia" type="text" class="form-control" id="provincia" placeholder="" required="" value="<?php echo $datiUtente["provincia"] ?>">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="cap">CAP</label>
                        <input name="cap" type="text" class="form-control" id="cap" placeholder="" required="" value="<?php echo $datiUtente["CAP"] ?>">
                    </div>
                </div>
                <hr class="mb-4">

                <h4 class="mb-3">Pagamento:</h4>

                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                        <label class="custom-control-label" for="credit">Carta di Credito</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
                        <label class="custom-control-label" for="debit">Paypal</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
                        <label class="custom-control-label" for="paypal">Mastercard</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 mb-3">
                        <label for="cc-name">Nome Proprietario</label>
                        <input name="cc-nome" type="text" class="form-control" id="cc-name" placeholder="" required="">
                        <small class="text-muted">Nome del proprietario della carta</small>
                    </div>
                    <div class="col-12 col-12 col-md-6 mb-3">
                        <label for="cc-number">Numero carta</label>
                        <input name="cc-numero" type="text" class="form-control" id="cc-number" placeholder="" required="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-3 mb-3 ml-3">
                        <div class="row">
                            <label>Data di scadenza</label>
                        </div>
                        <div class="row" id="cc-data">
                            <input name="cc-mese" type="text" class="form-control col-4 col-md-5 mr-1" id="cc-mese" placeholder="MM" required="">
                            <input name="cc-anno" type="text" class="form-control col-4 col-md-5 ml-1" id="cc-anno" placeholder="AA" required="">
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="cc-cvv">CVV</label>
                        <input name="cvv" type="password" class="form-control" id="cc-cvv" placeholder="" required="">
                    </div>
                </div>
                <hr class="mb-4">
                <button  class="btn btn-primary btn-lg btn-block" type="submit">CONFERMA PAGAMENTO</button>
            </form>
        </div>
    </div>
</div>
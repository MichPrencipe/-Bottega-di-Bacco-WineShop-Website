<?php if (isset($templateParams["errore"])) : ?>
    <div class="row justify-content-center"><span class="alert alert-danger delay-alert p-0" role="alert">Inserimento Fallito! Dati non conformi</span></div>
<?php endif; ?>

<?php if ($_REQUEST["action"] == 3) : ?>
    <span class="alert alert-success delay-alert p-0" role="alert">Prodotto cancellato</span>
<?php endif; ?>

<?php if ($_REQUEST["action"] == 1) : ?>
    <div class="container-fluid col-8 col-md-8 mt-4">
        <form id="inserisci" action="#" method="POST" enctype="multipart/form-data">
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-wine-bottle"></i> </span>
                </div>
                <input name="nome" class="form-control" placeholder="Inserisci nome prodotto:" type="text" required>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-euro-sign mr-1"></i> </span>
                </div>
                <input name="prezzo" class="form-control" placeholder="Inserisci prezzo:" type="text" required>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-sort-numeric-up mr-1"></i> </span>
                </div>
                <input name="litri" class="form-control" placeholder="Inserisci litri:" type="text" required>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-calendar-alt"></i> </span>
                </div>
                <select name="annata" class="custom-select" required>
                    <option hidden="" disabled="disabled" selected="selected" value="">Inserisci annata: </option>
                    <option value="1990">1990</option>
                    <option value="1991">1991</option>
                    <option value="1992">1992</option>
                    <option value="1993">1993</option>
                    <option value="1994">1994</option>
                    <option value="1995">1995</option>
                    <option value="1996">1996</option>
                    <option value="1997">1997</option>
                    <option value="1998">1998</option>
                    <option value="1999">1999</option>
                    <option value="2000">2000</option>
                    <option value="2001">2001</option>
                    <option value="2002">2002</option>
                    <option value="2003">2003</option>
                    <option value="2004">2004</option>
                    <option value="2005">2005</option>
                    <option value="2006">2006</option>
                    <option value="2007">2007</option>
                    <option value="2008">2008</option>
                    <option value="2009">2009</option>
                    <option value="2010">2010</option>
                    <option value="2011">2011</option>
                    <option value="2012">2012</option>
                    <option value="2013">2013</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                </select>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-sort-numeric-up-alt"></i> </span>
                </div>
                <input name="quantità" class="form-control" placeholder="Inserisci quantità:" type="text" required>
            </div>
            <div class="form-group input-group">
                <textarea name="descrizione" class="form-control" placeholder="Inserisci descrizione:" required></textarea>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-tags"></i> </span>
                </div>
                <select name="categoria" class="custom-select">
                    <option value="1" selected="selected">Vini Rossi</option>
                    <option value="2">Vini Bianchi</option>
                    <option value="3">Vini Rosè</option>
                    <option value="4">Gin</option>
                </select>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-warehouse"></i> </span>
                </div>
                <select name="marca" class="custom-select" required>
                    <option value="" disabled hidden selected>Inserisci Cantina:</option>
                    <?php foreach ($templateParams["cantine"] as $cantina) : ?>
                        <option value="<?php echo $cantina["id"]; ?>"><?php echo $cantina["nome"]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-images"></i></span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="immagine" name="immagine">
                    <label class="custom-file-label" for="immagine">Inserisci Immagine:</label>
                </div>
            </div>
            <div class="form-group text-center">
                <button name="submit" type="submit" class="btn btn-primary"> Invia </button>
            </div>
        </form>

        <div class="text-right">
            <a href="./venditore.php" role="button" class="btn btn-danger">Indietro</a>
        </div>
    </div>
<?php endif; ?>


<?php if ($_REQUEST["action"] == 2) : ?>
    <div class="container-fluid col-8 col-md-8 mt-4">
        <form id="modifica" action="#" method="POST" enctype="multipart/form-data">
            <div class="form-group input-group mb-2 py-3">
                <div class="col-md-3 col-12 mb-4 mb-md-0 text-center">
                    <div class="mdb-lightbox" data-pswp-uid="1">
                        <div class="row product-gallery mx-1">
                            <div class="col-12 mb-0">
                                <figure class="view overlay rounded z-depth-1 mt-2 main-img">
                                    <a href="#" data-size="710x823">
                                        <img src="<?php echo IMG_ARTICOLI_DIR . $prodottoSelezionato["immagine"] ?>" class="img-fluid z-depth-1" style="transform-origin: center center; transform: scale(1);" alt="">
                                    </a>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-12 col-md-9 px-0 mt-2">
                    <div class="custom-file inline-block">
                        <input type="file" style="cursor: pointer;" class="custom-file-input" id="nuovoImmagine" name="nuovoImmagine" required>
                        <label class="custom-file-label" for="nuovoImmagine">Inserisci Immagine:</label>
                        <div class="form-group input-group mt-3">
                            <label class="col-md-12 col-12 text-left px-0">Inserisci una descrizione:</label>
                            <textarea name="nuovoDescrizione" class="form-control" value="<?php echo $prodottoSelezionato["descrizione"] ?>" required></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group input-group mt-5">
                <label class="col-md-12 col-12 text-left px-0 mb-0">Inserisci il nome del prodotto:</label>
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-wine-bottle"></i> </span>
                </div>
                <input name="nuovoNome" class="form-control" value="<?php echo $prodottoSelezionato["nome"] ?>" type="text" required>
            </div>
            <div class="form-group input-group">
                <label class="col-md-12 col-12 text-left px-0 mb-0">Inserisci il prezzo del prodotto:</label>
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-euro-sign mr-1"></i> </span>
                </div>
                <input name="nuovoPrezzo" class="form-control" value="<?php echo $prodottoSelezionato["prezzo"] ?>" type="text" required>
            </div>
            <div class="form-group input-group">
                <label class="col-md-12 col-12 text-left px-0 mb-0">Inserisci i litri del prodotto:</label>
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-sort-numeric-up mr-1"></i> </span>
                </div>
                <input name="nuovoLitri" class="form-control" value="<?php echo $prodottoSelezionato["litri"] ?>" type="text" required>
            </div>
            <div class="form-group input-group">
                <label class="col-md-12 col-12 text-left px-0 mb-0">Inserisci l'annata del prodotto:</label>
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-calendar-alt"></i> </span>
                </div>
                <select name="nuovoAnnata" class="custom-select">
                    <option hidden="" disabled="disabled" selected="selected" value="">Inserisci annata: </option>
                    <option value="1990">1990</option>
                    <option value="1991">1991</option>
                    <option value="1992">1992</option>
                    <option value="1993">1993</option>
                    <option value="1994">1994</option>
                    <option value="1995">1995</option>
                    <option value="1996">1996</option>
                    <option value="1997">1997</option>
                    <option value="1998">1998</option>
                    <option value="1999">1999</option>
                    <option value="2000">2000</option>
                    <option value="2001">2001</option>
                    <option value="2002">2002</option>
                    <option value="2003">2003</option>
                    <option value="2004">2004</option>
                    <option value="2005">2005</option>
                    <option value="2006">2006</option>
                    <option value="2007">2007</option>
                    <option value="2008">2008</option>
                    <option value="2009">2009</option>
                    <option value="2010">2010</option>
                    <option value="2011">2011</option>
                    <option value="2012">2012</option>
                    <option value="2013">2013</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                </select>
            </div>
            <div class="form-group input-group">
                <label class="col-md-12 col-12 text-left px-0 mb-0">Inserisci la quantità del prodotto:</label>
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-sort-numeric-up-alt"></i> </span>
                </div>
                <input name="nuovoQuantità" class="form-control" value="<?php echo $prodottoSelezionato["quantitàDisponibile"] ?>" type="text" required>
            </div>
            <div class="form-group input-group">
                <label class="col-md-12 col-12 text-left px-0 mb-0">Inserisci la categoria del prodotto:</label>
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-tags"></i> </span>
                </div>
                <select name="nuovoIdCategoria" class="custom-select">
                    <option value="1" selected="selected">Vini Rossi</option>
                    <option value="2">Vini Bianchi</option>
                    <option value="3">Vini Rosè</option>
                    <option value="4">Gin</option>
                </select>
            </div>
            <div class="form-group input-group">
                <label class="col-md-12 col-12 text-left px-0 mb-0">Inserisci la cantina:</label>
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-warehouse"></i> </span>
                </div>
                <select name="nuovoIdCantina" class="custom-select" required>
                    <option value="" disabled hidden selected>Inserisci Cantina:</option>
                    <?php foreach ($templateParams["cantine"] as $cantina) : ?>
                        <option value="<?php echo $cantina["id"]; ?>"><?php echo $cantina["nome"]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group text-center">
                <button name="submit" type="submit" class="btn btn-primary"> Invia </button>
            </div>
        </form>

        <div class="text-right">
            <a href="./prodotti-inseriti.php" role="button" class="btn btn-danger">Indietro</a>
        </div>
    </div>

<?php endif; ?>
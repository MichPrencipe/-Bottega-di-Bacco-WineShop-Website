<div class="row mt-md-5">
    <div class="col-1 col-md1"></div>
    <div class="col-10 col-md-10">

        <?php if (isset($_GET["message"])) : ?>
            <div class="row justify-content-center"><span class="alert alert-success delay-alert mt-2 p-0 text-uppercase" role="alert"><?php echo $_GET["message"] ?></span></div>
        <?php endif; ?>
        <h2 class="text-center mt-2 mb-4 text-uppercase" style="font-weight: bold;">I miei dati</h2>
        <form class="row" action="modifica-account.php" method="POST" enctype="multipart/form-data">
            <div class="col-12 col-md-6 offset-md-3">
                <label for="nome" class="form-label mb-0">Nome:</label>
                <input type="text" class="form-control py-0" id="nome" name="nome" value="<?php echo $datiUtente["nome"] ?>" readonly/>
            </div>
            <div class="col-12 col-md-6 offset-md-3 mt-3">
                <label for="cognome" class="form-label mb-0">Cognome:</label>
                <input type="text" class="form-control py-0" id="cognome" name="cognome" value="<?php echo $datiUtente["cognome"] ?>" readonly/>
            </div>
            <div class="col-12 col-md-6 offset-md-3 mt-3">
                <label for="username" class="form-label mb-0">Email address:</label>
                <input type="text" class="form-control py-0" name="username" value="<?php echo $datiUtente["username"] ?>" readonly id="username" />
            </div>
            <div class="col-12 col-md-6 offset-md-3 mt-3">
                <label for="nazione" class="form-label mb-0">Nazione</label>
                <input type="text" class="form-control py-0" name="nazione" value="<?php echo $datiUtente["nazione"] ?>" readonly id="nazione" />
            </div>
            <div class="col-12 col-md-6 offset-md-3 mt-3">
                <label for="città" class="form-label mb-0">Città</label>
                <input type="text" class="form-control py-0" name="città" value="<?php echo $datiUtente["città"] ?>" readonly id="città" />
            </div>
            <div class="col-12 col-md-6 offset-md-3 mt-3">
                <label for="indirizzo" class="form-label mb-0">Indirizzo</label>
                <input type="text" class="form-control py-0" name="indirizzo" value="<?php echo $datiUtente["indirizzo"] ?>" readonly id="indirizzo" />
            </div>
            <div class="col-12 col-md-6 offset-md-3 mt-3">
                <label for="provincia" class="form-label mb-0">Provincia</label>
                <input type="text" class="form-control py-0" name="provincia" value="<?php echo $datiUtente["provincia"] ?>" readonly id="provincia" />
            </div>
            <div class="col-12 col-md-6 offset-md-3 mt-3">
                <label for="cap" class="form-label mb-0">CAP</label>
                <input type="text" class="form-control py-0" name="cap" value="<?php echo $datiUtente["CAP"] ?>" readonly id="cap" />
            </div>
            <div class="col-12 col-md-6 offset-md-3 mt-3">
                <label for="cell" class="form-label mb-0">Cellulare</label>
                <input type="text" class="form-control py-0" name="cell" value="<?php echo $datiUtente["cellulare"] ?>" readonly id="cell" />
            </div>
            <input type="hidden" name="modifica" value="si" />
            <a role="button" href="modifica-account.php" class="offset-3 btn btn-primary mt-4 col-6 px-0 col-md-4 offset-md-4">Modifica</a>
        </form>
        <div class="col-12 col-md-12 text-center mt-3">

            <div class="container">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal"><i class="fa fa-sign-out-alt"></i> Logout</button>

                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header" style="max-height:50px">
                                <button type="button" class="close btn-danger btn-sm" style="max-height:50px" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <h5>Sei sicuro di voler uscire?</h5>
                            </div>
                            <div class="modal-footer py-2">
                                <a role="button" href="./logout.php" class="btn btn-danger"><i class="fa fa-sign-out-alt"></i>Logout</a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<main class="col-12 col-md-12 mt-4">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <section>
                        <h2 class="text-center mb-4">Nuovo cliente</h2>
                        <p>Registrandoti dichiari di aver letto e accetti integralmente le nostre Condizioni generali di uso e vendita. Prendi visione della nostra Informativa sulla privacy, della nostra Informativa sui Cookie e della nostra Informativa sulla Pubblicità definita in base agli interessi.</p>
                        <div class="text-center">
                            <a class="btn btn-primary mt-4" href="./registrazione.php">Crea account</a>
                        </div>
                    </section>
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Accedi</h3>
                                <p class="mb-4">Accedendo al tuo account dichiari di aver letto e accetti le nostre Condizioni generali di uso e vendita. </p>
                            </div>
                            <form id="loginForm" action="#" method="POST">
                                <div class="form-group first">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" id="username">
                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password">
                                </div>
                                <div class="d-flex mb-5 align-items-center">
                                    <label class="control control--checkbox mb-0"><span class="caption">Ricorda
                                            </span>
                                        <input type="checkbox" checked="checked">
                                    </label>
                                    <span class="ml-auto"><a href="https://mail.google.com" class="forgot-pass">Password Dimenticata
                                    </a></span>
                                </div>
                                <input type="submit" value="Invia" name="submitButton" class="btn btn-block btn-primary">
                            </form>
                            <?php if (isset($templateParams["erroreLogin"])) : ?>
                                <span class="alert alert-danger delay-alert mt-2 p-0" role="alert"><?php echo $templateParams["erroreLogin"]; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
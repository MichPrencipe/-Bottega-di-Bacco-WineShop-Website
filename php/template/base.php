<!DOCTYPE html>
<html lang="it">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/style.css">

  <!-- Your custom styles (optional) -->
  <title><?php echo $templateParams["titolo"]; ?></title>
</head>

<body class="bg-light">
  <div class="container-fluid">
    <header>
      <div class="row">
        <div class="col-3 col-md-3">
          <div class="text-center py-3">
            <a class="navbar-brand" href="./index.php"><img class="img-fluid" src="<?php echo IMG_LOGO_DIR . "logo.png"; ?>" alt="logo"></a>
          </div>
        </div>
        <div class="col-6 col-md-6 text-center px-0">
          <div class="row col-12 col-md-12 mt-3">
            <h1 class="text-white col-12 col-md-12">La Bottega di Bacco</h1>
          </div>
          <div class="row col-12 col-md-12 mt-4 mb-3">
            <form class="d-flex col-12 px-0 col-md-12" action="./ricerca.php" method="get">
              <label for="ricerca"></label>
              <input name="nome" id="ricerca" class="form-control col-11 col-md-11" type="search" placeholder="Cerca Prodotto..." aria-label="Search">
              <button class="btn btn-dark ml-2" type="submit"><i class="fa fa-search" style="font-size:20px;"></i>
              </button>
            </form>
          </div>
        </div>
        <div class="col-3 col-md-3">          
          <div class="row justify-content-center mt-3 ml-2">
            <div class="col-12 col-md-3 mt-2">
              <ul class="nav">
                <li class="nav-item dropdown">
                  <div class="dropdown show">
                    <a class="btn btn-dark dropdown-toggle" href="./notifiche.php" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-bell"></i>
                      <?php if (isUserLoggedIn()) : ?>
                        <span class="badge top-0 start-100 bg-danger translate-middle" id="badge-notifiche"><?php if (isset($templateParams["numNuoveNotifiche"])) {
                                                                                                              echo $templateParams["numNuoveNotifiche"];
                                                                                                            } ?></span>
                      <?php endif; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                      <a class="dropdown-item" href="notifiche.php">Vai a notifiche</a>
                    </div>
                  </div>
                </li>
              </ul>        
            </div>
            <div class="col-12 col-md-3 mt-2">
              <ul class="nav">
                <li class="nav-item <?php if (isset($templateParams["numNuoveNotifiche"]))?> dropdown">
                  <div class="dropdown show" style="max-width: 10px;">
                    <a class="btn btn-dark dropdown-toggle" href="./login.php" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-user"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                      <?php if (!isUserLoggedIn()) : ?>
                        <a class="dropdown-item" href="./login.php">Login</a>
                      <?php else : ?>
                        <a class="dropdown-item" href="./login.php">Mio Account</a>
                        <?php if (isUserAdmin()) : ?>
                          <a class="dropdown-item" href="./venditore.php">Dati Venditore</a>
                          <a class="dropdown-item" href="./ordini-admin.php">Ordini</a>
                        <?php else : ?>
                          <a class="dropdown-item" href="./ordini.php">I miei Ordini</a>
                        <?php endif; ?>
                        <a class="dropdown-item" href="./logout.php">Logout</a>
                      <?php endif; ?>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <div class="col-12 col-md-3 mt-2">
              <?php if (!(isUserLoggedIn() && isUserAdmin())) : ?>
              <ul class="nav">
                <li class="nav-item dropdown">
                  <div class="dropdown show">
                    <a class="btn btn-dark dropdown-toggle" href="./carrello.php" role="button" id="dropdownMenuLink3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-shopping-cart"></i>
                      <?php if (isUserLoggedIn()) : ?>
                        <span class="badge top-0 start-100 bg-danger translate-middle" id="badge-carrello"><?php if (getNumProdottiCarrello() > 0) {
                                                                                                              echo getNumProdottiCarrello();
                                                                                                            } ?></span>
                      <?php endif; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink3">
                      <a class="dropdown-item" href="./carrello.php">Vai al Carrello</a>
                    </div>
                  </div>                  
                </li>
              </ul>              
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </header>
    <nav>
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-12 col-md-10">
          <ul class="nav">
            <li class="nav-item col-6 col-md-2 my-2">
              <a class="nav-link bg-light text-dark text-center" href="./index.php">Home</a>
            </li>
            <?php foreach ($templateParams["categorie"] as $categoria) : ?>
              <li class="nav-item col-6 col-md-2 my-2"><a class="nav-link bg-light text-dark text-center" href="./categoria.php?idCategoria=<?php echo $categoria["id"]; ?>"><?php echo $categoria["nome"]; ?></a></li>
            <?php endforeach; ?>
            <li class="nav-item col-6 col-md-2 my-2">
              <a class="nav-link bg-light text-dark text-center" href="./contatti.php">Contatti</a>
            </li>
          </ul>
        </div>
        <div class="col-md-1"></div>
      </div>
    </nav>

    <?php if (isset($templateParams["nome"])) {
      require($templateParams["nome"]);
    }
    ?>

    <hr class="col-8 col-md-8 mb-4">
    <div class="container">
      <div class="row justify-content-center">
        <h3 class="text-uppercase font-weight-bold mt-5">Paga con:</h3>
      </div>
      <div class="row justify-content-center">
        <ul class="list-unstyled nav navbar navbar-left d-flex d-inline-flex">
          <li class="nav-item d-inline-flex  align-items-center mr-2"><i class="fab fa-cc-paypal" style="color:black;font-size:48px;"></i></li>
          <li class="nav-item d-inline-flex  align-items-center mr-2"><i class="fab fa-cc-mastercard" style="color:black;font-size:48px;"></i></li>
          <li class="nav-item d-inline-flex  align-items-center mr-2"><i class="fas fa-credit-card" style="color:black;font-size:48px;"></i></li>
        </ul>
      </div>
    </div>
    <footer class="page-footer font-small text-white mt-5" style="background-color:rgb(128,0,0);">
      <div class="container-fluid">
        <div class="row justify-content-center py-5">
          <div class="col-12 col-md-4 text-center">
            <ul class="list-unstyled">
              <li class="location"> <span class="col-1 fa fa-map-marker"></span>Via Niccolò Machiavelli 20</li>
              <li class="">47521, Cesena </li>
              <li class="">Forlì-Cesena </li>
            </ul>
          </div>
          <div class="col-12 col-md-4 text-center">
            <ul class="list-unstyled">
              <li class="location"> <span class="col-1 fa fa-phone"></span> 0547 304062 </li>
              <li class="location"> <span class="col-1 fa fa-envelope"></span>info@bottegadibacco.com </li>
            </ul>
          </div>
          <div class="col-4 col-md-4 text-center">
            <div class="row justify-content-center">
              <a href="https://www.twitter.com/" class="ms-4 social" style="text-decoration:none" aria-label="Twitter">
                <span class="fa fa-twitter"></span>
                <i class="fab fa-twitter" style="color:white;font-size:48px"></i>
              </a>
              <a href="https://www.facebook.com/" class="ms-4 social" style="text-decoration:none" aria-label="Facebook">
                <span class="fa fa-facebook"></span>
                <i class="fab fa-facebook" style="color:white;font-size:48px"></i>
              </a>
              <a href="https://www.instagram.com/" class="ms-4 social" style="text-decoration:none" aria-label="Instagram">
                <span class="fa fa-instagram"></span>
                <i class="fab fa-instagram" style="color:white;font-size:48px"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="footer-copyright text-white text-center py-3">
          <p>© 2020 Copyright</p>
        </div>
      </div>
    </footer>
    <!-- Bootstrap JQuery and JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

    <?php
    if (isset($templateParams["js"])) :
      foreach ($templateParams["js"] as $script) :
    ?>
        <script src="<?php echo $script; ?>"></script>
    <?php
      endforeach;
    endif;
    ?>
  </div>
</body>

</html>
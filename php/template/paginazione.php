<nav aria-label="Navigazione pagine prodotti">
  <ul class="pagination justify-content-center pg-blue mt-4" >
    <li class="page-item <?php if($templateParams["paginaCorrente"] <= 1){ echo 'disabled'; } ?>">
      <?php
        $stringa="";
        if (isset($templateParams["parametriRicerca"])){
          $stringa = "?".$templateParams["parametriRicerca"]."&pagina=".($templateParams["paginaCorrente"] - 1);
        } else {
          $stringa = "?pagina=".($templateParams["paginaCorrente"] - 1);
        }
      ?>
      <a class="page-link link-success" href="<?php if($templateParams["paginaCorrente"] <= 1){ echo '#'; } else { echo $stringa;} ?>" aria-label="Precedente">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php for ($i=1; $i <=$templateParams["pagineTotali"] ; $i++):
      if (isset($templateParams["parametriRicerca"])){
        $stringa = "?".$templateParams["parametriRicerca"]."&pagina=".$i;
      } else{
        $stringa = "?pagina=".$i;
      }
    ?>
    <li class="page-item"><a class="page-link link-success" href="<?php echo $stringa?>"><?php echo $i; ?></a></li>
    <?php endfor; ?>
    <li class="page-item <?php if($templateParams["paginaCorrente"] >= $templateParams["pagineTotali"]){ echo 'disabled'; } ?>">
    <?php
      if (isset($templateParams["parametriRicerca"])){
        $stringa = "?".$templateParams["parametriRicerca"]."&pagina=".($templateParams["paginaCorrente"] + 1);
      } else {
        $stringa = "?pagina=".($templateParams["paginaCorrente"] + 1);
      }
    ?>
    <a class="page-link link-success" href="<?php if($templateParams["paginaCorrente"] >= $templateParams["pagineTotali"]){ echo '#'; } else { echo $stringa;} ?>" aria-label="Successiva">
      <span aria-hidden="true">&raquo;</span>
    </a>
    </li>
  </ul>
</nav>
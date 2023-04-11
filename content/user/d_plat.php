<?php

include("dao.php");

$tab = detail_plat($_REQUEST['p_id']);

?>
<main>
  <h3 class="d-flex justify-content-center mt-3"><?= $tab->libelle ?></h3>
  <hr class="w-75 mx-auto mt-0 mb-3">
  <div class="d-flex justify-content-center flex-wrap mt-3">
    <div class="card mb-3 border-0 shd text-white" style="max-width:33%;">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="asset/img/food/<?= $tab->image ?>" class="img-fluid rounded-start" alt="<?= $tab->image ?>">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title"><?= $tab->libelle ?></h5>
            <p class="card-text"><?= $tab->description ?></p>
            <br>
            <div class="d-flex justify-content-end align-bottom">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-plus mx-3" viewBox="0 0 16 16">
                <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z" />
                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
              </svg>
              <p class="card-text">
                <?= $tab->prix ?>€
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr class="w-75 mx-auto mt-0 mb-3">
</main>
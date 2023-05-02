<?php

include("dao.php");

$tab = all_plat();

?>
<main>
    <h3 class="d-flex justify-content-center mt-3">Tout nos plats</h3>
    <hr class="w-75 mx-auto mt-0 mb-3">
    <?php foreach ($tab as $plat) : ?>
        <div class="d-flex justify-content-around flex-wrap mt-3">
            <div class="card mb-3 border-0 shd text-white" style="max-width:45%;">
                <div class="row g-0">
                    <div class="col-md-6 imgof">
                        <img src="asset/img/food/<?= $plat->image ?>" class="img-fluid rounded-start" alt="<?= $plat->image ?>">
                    </div>
                    <div class="card-body h-100 col-md-6 align-items-center">
                        <h5 class="card-title d-flex justify-content-center"><?= $plat->libelle ?></h5>
                        <hr class="w-50 mx-auto mt-0 mb-3">
                        <p class="card-text text-justify"><?= $plat->description ?></p>
                        <hr class="w-50 mx-auto mt-0 mb-3">
                        <div class="d-flex justify-content-center">
                            <p class="card-text">
                                <?= $plat->prix ?>€
                            </p>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="?page=commande&id_plat=<?= $plat->id_plat ?>">
                                <button type="button" class="btn-light btn-sm text-black mb-3 mt-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                        <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z" />
                                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                    </svg>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <hr class="w-75 mx-auto mt-0 mb-3">
</main>
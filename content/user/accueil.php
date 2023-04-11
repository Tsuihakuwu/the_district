<main>
<h1 class="d-none d-md-flex justify-content-center mt-2">Catégories</h1>
<hr class="w-75 mx-auto mt-0 mb-3">

<?php

include("dao.php");

$tab = disp_cat();

$tab2 = mp_plat();

$tab3 = all_plat();

?>


<div class="justify-content-around row d-none d-md-flex">

    <?php

    foreach ($tab as $categorie) : ?>

        <div class="card mb-3 mx-3 border-0 p-0 shd text-white col-3">
            <h5 class="card-header"><?= $categorie->libelle ?></h5>
            <div class="imgof">
                <img src="asset/img/category/<?= $categorie->image ?>" class="card-img-bottom" alt="<?= $categorie->image ?>">
            </div>
        </div>

    <?php endforeach; ?>

    <hr class="w-75 mx-auto mt-0 mb-3">
</div>

<h3 class="d-none d-md-flex justify-content-center">Nos plats les plus populaires</h3>
<div class="d-none d-md-flex justify-content-around flex-wrap mt-3">

    <?php foreach ($tab2 as $plat_sample) : ?>

        <div class="card mb-3 border-0 shd text-white">
            <a href="/?page=detail&p_id=<?= $plat_sample->id_plat ?>">
                <h5 class="card-header"><?= $plat_sample->libelle ?></h5>
                <div class="imgof">
                    <img src="asset/img/food/<?= $plat_sample->image ?>" class="card-img-bottom" alt="<?= $categorie->image ?>">
                </div>
            </a>
        </div>

    <?php endforeach; ?>

    <hr class="w-75 mx-auto mt-0 mb-1">
</div>

<h3 class="d-flex d-md-none justify-content-center">Tout nos plats</h3>
<div class="d-flex d-md-none justify-content-around flex-wrap mt-3">

    <?php foreach ($tab3 as $plat_all) : ?>

        <div class="card mb-3 border-0 shd text-white">
            <a href="/?page=detail&p_id=<?= $plat_all->id_plat ?>">
                <h5 class="card-header"><?= $plat_all->libelle ?></h5>
                <div class="imgof">
                    <img src="asset/img/food/<?= $plat_all->image ?>" class="card-img-bottom" alt="<?= $plat_all->image ?>">
                </div>
            </a>
        </div>

    <?php endforeach; ?>

</div>
</main>
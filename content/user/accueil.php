<h1 class="d-flex justify-content-center mt-2">Catégories</h1>
<hr class="w-75 mx-auto mt-0 mb-3">

<div class="d-flex justify-content-around flex-wrap">

<?php

include("db.php");

$tab = disp_cat();

$tab2 = rd_plat();

foreach ($tab as $categorie): ?>

<div class="card mb-3 border-0 shd text-white">
    <h5 class="card-header"><?= $categorie->libelle ?></h5>
    <div class="imgcat">
        <img src="asset/img/category/<?= $categorie->image ?>" class="card-img-bottom" alt="<?= $categorie->image ?>">
    </div>
</div>

<?php endforeach; ?>

<hr class="w-75 mx-auto mt-0 mb-3">
</div>

<h3 class="d-flex justify-content-center mt-2">Et pourquoi pas ?</h3>
<div class="d-flex justify-content-around flex-wrap">

<?php foreach ($tab2 as $plat_sample): ?>

<div class="card mb-3 border-0 shd text-white">
    <h5 class="card-header"><?= $plat_sample->libelle ?></h5>
    <div class="imgcat">
        <img src="asset/img/category/<?= $plat_sample->image ?>" class="card-img-bottom" alt="<?= $categorie->image ?>">
    </div>
</div>

<?php endforeach; ?>

<hr class="w-75 mx-auto mt-0 mb-1">
</div>
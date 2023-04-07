<h1 class="d-flex justify-content-center mt-2">Catégories</h1>
<hr class="w-75 mx-auto mt-0 mb-3">

<?php 

include("DAO.php");

$tab = disp_cat();

$tab2 = mp_plat();

?>


<div class="d-flex justify-content-around row">

<?php

foreach ($tab as $categorie): ?>

<div class="card mb-3 mx-3 border-0 p-0 shd text-white col-3">
    <h5 class="card-header"><?= $categorie->libelle ?></h5>
    <div class="imgcat">
        <img src="asset/img/category/<?= $categorie->image ?>" class="card-img-bottom" alt="<?= $categorie->image ?>">
    </div>
</div>

<?php endforeach; ?>

<hr class="w-75 mx-auto mt-0 mb-3">
</div>

<h3 class="d-flex justify-content-center">Les plus populaires</h3>
<div class="d-flex justify-content-around flex-wrap mt-3">

<?php foreach ($tab2 as $plat_sample): ?>

<div class="card mb-3 border-0 shd text-white">
    <h5 class="card-header"><?= $plat_sample->libelle ?></h5>
    <div class="imgcat">
        <img src="asset/img/food/<?= $plat_sample->image ?>" class="card-img-bottom" alt="<?= $categorie->image ?>">
    </div>
</div>

<?php endforeach; ?>

<hr class="w-75 mx-auto mt-0 mb-1">
</div>
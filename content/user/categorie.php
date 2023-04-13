<main>
    <h1 class="d-flex justify-content-center mt-2">Toutes nos catégories</h1>
    <hr class="w-75 mx-auto mt-0 mb-3">

    <?php

    include("dao.php");

    $tab = all_cat();

    ?>


    <div class="d-flex justify-content-around flex-wrap mt-3">

        <?php
        foreach ($tab as $categorie) : ?>
            <a href="/?page=detail&c_id=<?= $categorie->id_categorie ?>">
                <div class="card mb-3 border-0 shd text-white">
                    <h5 class="card-header"><?= $categorie->libelle ?></h5>
                    <div class="imgof">
                        <img src="asset/img/category/<?= $categorie->image ?>" class="card-img-bottom" alt="<?= $categorie->image ?>">
                    </div>
                </div>
            </a>
        <?php endforeach; ?>

        <hr class="w-75 mx-auto mt-0 mb-3">
    </div>
</main>
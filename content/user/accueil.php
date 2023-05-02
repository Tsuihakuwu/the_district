<main class="mt-4">

    <div class="mx-3 mt-5 mb-4 p-3 rounded mnb">
        <form action="#" method="GET">
            <div class="d-flex justify-content-center">
                <input type="text" name="search" id="search" placeholder="Votre recherche" class="mx-3">
                <input type="submit" value="Rechercher">
            </div>
        </form>
    </div>

    <?php if (!isset($_GET['search'])) : ?>

        <?php
        include("dao.php");
        $tab = disp_cat();
        $tab2 = mp_plat();
        $tab3 = all_plat(); ?>

        <h1 class="d-none d-md-flex justify-content-center mt-2">Catégories</h1>
        <hr class="w-75 mx-auto mt-0 mb-3">
        <div class="justify-content-around row d-none d-md-flex">

            <?php foreach ($tab as $categorie) : ?>

                <div class="card mb-3 mx-3 border-0 p-0 shd text-white col-3">
                    <a href="/?page=detail&c_id=<?= $categorie->id_categorie ?>">
                        <h5 class="card-header"><?= $categorie->libelle ?></h5>
                        <div class="imgof">
                            <img src="asset/img/category/<?= $categorie->image ?>" class="card-img-bottom" alt="<?= $categorie->image ?>">
                        </div>
                    </a>
                </div>

            <?php endforeach; ?>

            <hr class="w-75 mx-auto mt-0 mb-3">
        </div>

        <h3 class="d-none d-md-flex justify-content-center">Nos plats les plus populaires</h3>
        <div class="d-none d-md-flex justify-content-around flex-wrap mt-3">

            <?php foreach ($tab2 as $plat_sample) : ?>

                <div class="card mb-3 border-0 shd text-white">
                    <h5 class="card-header d-flex justify-content-between">
                        <div>
                            <?= $plat_sample->libelle ?>
                        </div>
                        <div class="d-flex">
                            <p class="card-text">
                                <?= $plat_sample->prix ?>€
                            </p>
                        </div>
                    </h5>
                    <div class="imgof">
                        <img src="asset/img/food/<?= $plat_sample->image ?>" class="card-img-bottom" alt="<?= $categorie->image ?>">
                    </div>
                    <div class="d-flex align-items-center">
                        <a href="?page=commande&id_plat=<?= $plat_sample->id_plat ?>">
                            <button type="button" class="btn-light btn-sm text-black mb-3 mt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                    <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z" />
                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg>
                            </button>
                        </a>
                    </div>
                </div>

            <?php endforeach; ?>

            <hr class="w-75 mx-auto mt-0 mb-1">
        </div>

        <h3 class="d-flex d-md-none justify-content-center">Tout nos plats</h3>
        <div class="d-flex d-md-none justify-content-around flex-wrap mt-3">

            <?php foreach ($tab3 as $plat_all) : ?>

                <div class="card mb-3 border-0 shd text-white">
                    <h5 class="card-header"><?= $plat_all->libelle ?></h5>
                    <div class="imgof">
                        <img src="asset/img/food/<?= $plat_all->image ?>" class="card-img-bottom" alt="<?= $plat_all->image ?>">
                    </div>
                    <div class="d-flex justify-content-center my-2">
                        <p class="card-text">
                            <?= $plat_all->prix ?>€
                        </p>
                    </div>
                    <div class="d-flex align-items-center">
                        <button type="button" class="btn-light btn-sm text-black mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z" />
                                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                            </svg>
                        </button>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>

    <?php else :
        $search = $_GET['search'];
        include('dao.php');
        $result_cat = search_cat($search);
        $result_plat = search_plat($search);
    ?>

        <h2 class="d-none d-md-flex justify-content-center mt-2">Résultats catégorie</h2>
        <hr class="w-75 mx-auto mt-0 mb-3">
        <div class="justify-content-around d-none d-md-flex">
            <?php if (empty($result_cat)) : ?>
                <h5>Aucun résultat dans les catégories !</h5>
            <?php else : ?>
                <?php foreach ($result_cat as $search_cat) : ?>
                    <div class="card mb-3 mx-3 border-0 p-0 shd text-white col-3">
                        <a href="/?page=detail&c_id=<?= $search_cat->id_categorie ?>">
                            <h5 class="card-header"><?= $search_cat->libelle ?></h5>
                            <div class="imgof">
                                <img src="asset/img/category/<?= $search_cat->image ?>" class="card-img-bottom" alt="<?= $search_cat->image ?>">
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endif ?>
        </div>

        <h2 class="d-none d-md-flex justify-content-center mt-2">Résultats plats</h2>
        <hr class="w-75 mx-auto mt-0 mb-3">
        <div class="d-none d-md-flex justify-content-around flex-wrap mt-3">
            <?php if (empty($result_plat)) : ?>
                <h5>Aucun résultat dans les plats !</h5>
            <?php else : ?>
                <?php foreach ($result_plat as $search_plat) : ?>
                    <div class="card mb-3 border-0 shd text-white">
                        <h5 class="card-header d-flex justify-content-between">
                            <div>
                                <?= $search_plat->libelle ?>
                            </div>
                            <div class="d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-plus mx-3" viewBox="0 0 16 16">
                                    <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z" />
                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg>
                                <p class="card-text">
                                    <?= $search_plat->prix ?>€
                                </p>
                            </div>
                        </h5>
                        <div class="imgof">
                            <img src="asset/img/food/<?= $search_plat->image ?>" class="card-img-bottom" alt="<?= $search_plat->image ?>">
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif ?>
        </div>
    <?php endif ?>
</main>
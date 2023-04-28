<?php if (session_status() !== PHP_SESSION_ACTIVE) session_start(); ?>

<?php if (isset($_SESSION['login'])) : ?>
    <main>
        <h1 class="text-center my-5">Panneau d'administration</h1>
        <hr>
        <div class="d-flex row mt-5 mb-5 rounded mnb">
            <ul class="navbar-nav ms-md-auto me-md-5">
                <li class="nav-item mx-4 d-flex justify-content-center">
                    <a class="nav-link text-white" href="?page=admin&gest=cat">Gestion catégories</a>
                </li>
                <li class="nav-item mx-4 d-flex justify-content-center">
                    <a class="nav-link text-white" href="?page=admin&gest=plat">Gestion plats</a>
                </li>
                <li class="nav-item mx-4 d-flex justify-content-center">
                    <a class="nav-link text-white" href="?page=admin&gest=com">Gestion commandes</a>
                </li>
                <li class="nav-item mx-4 d-flex justify-content-center">
                    <a class="nav-link text-white" href="?page=admin&gest=usr">Gestion utilisateurs</a>
                </li>
            </ul>
        </div>
    </main>
<?php else : header("Location:/index.php"); endif; ?>
<header>
    <nav class="navbar navbar-expand-md rounded p-0 mnb">
        <div id="menu_container" class="container-fluid">
            <a class="navbar-brand col-4 col-md-2 mx-4 my-3" href="index.php">
                <img src="asset/img/the_district_brand/logo_transparent_sm.png" alt="responsive_logo_the_district" class="img-fluid logo_rt">
            </a>
            <button class="navbar-toggler mx-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" class="bi" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"></path>
                    </svg>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-md-auto me-md-5">
                    <li class="nav-item mx-4">
                        <a class="nav-link text-white" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item mx-4">
                        <a class="nav-link text-white" href="index.php?page=categorie">Catégorie</a>
                    </li>
                    <li class="nav-item mx-4">
                        <a class="nav-link text-white" href="index.php?page=plat">Plats</a>
                    </li>
                    <li class="nav-item mx-4 mb-4 mb-md-0">
                            <a class="nav-link text-white" href="index.php?page=contact">Contact</a>
                    </li>
                    <?php if (!isset($_SESSION['login'])) : ?>
                        <li class="nav-item mx-4 mb-4 mb-md-0">
                            <a class="nav-link text-white" href="index.php?page=c">Connexion</a>
                        </li>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['login'])) :  ?>
                        <li class="nav-item mx-4 mb-4 mb-md-0">
                            <a class="nav-link text-white" href="index.php?page=admin">Administration</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <?php if (isset($_SESSION['login'])) :  ?>
                    <span class="text-white mx-3">Connecté en tant que : <b><?= $_SESSION["login"] ?></b></span>
                    <a href="content/script/s_deconnexion.php"><input type="button" class="btn btn-secondary btn-sm" value="Deconnexion"></input></a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>
<main>
    <?php if(session_status() !== PHP_SESSION_ACTIVE) session_start(); ?>
    <div class="d-flex justify-content-center form-container mt-5 mb-5 rounded mnb">
        <form name="connec" id="connec" method="post" action="/content/script/s_connexion.php" enctype="multipart/form-data">
            <div class="input-row">
                <label class="pt-1" for="email">Email : </label><span id="userEmail-info" class="info"></span><br /> <input type="text" class="input-field" name="userEmail" id="userEmail" />
            </div>
            <div class="input-row">
                <label class="pt-1">Mot de passe : </label> <span id="userPassword-info" class="info"></span><br />
                <input type="password" class="input-field" name="userPassword" id="userPassword" />
            </div>
            <div>
                <input type="submit" class="btn-submit my-2" value="Envoyer" />
            </div>
            <?php if(isset($_SESSION['error_login'])){
                switch($_SESSION['error_login']){
                    case (0):
                        echo '';
                        break;
                    case (1):
                        echo '<small class="text-danger">erreur1</small>';
                        break;
                    case (2):
                        echo '<small class="text-danger">erreur2</small>';
                        break;
                }
            } ?>
        </form>
    </div>
</main>
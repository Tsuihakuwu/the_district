<?php
require_once 'dao.php';
$user = o_display_usr($_GET['id']);
?>

<main>
    <div class="container my-5 mnb rounded">
        <h2 class="text-center mb-4">Modifier l'utilisateur</h2>
        <form action="/content/admin/update_user_script.php" method="post">
            <input type="hidden" name="id_utilisateur" value="<?= $user->id_utilisateur ?>">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom" value="<?= $user->nom ?>" required>
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" name="prenom" value="<?= $user->prenom ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?= $user->email ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
</main>
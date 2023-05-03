<?php include_once('dao.php');
$user = o_display_usr($_REQUEST['id']);
?>

<main>
    <div class="container mt-5">
        <h1>Confirmation de suppression</h1>
        <p>Êtes-vous sûr de vouloir supprimer l'utilisateur <?= $user->nom ?> <?= $user->prenom ?> ? Cette action est irréversible.</p>
        <form method="post" action="/content/admin/delete_user_script.php">
            <input type="hidden" name="id_utilisateur" value="<?= $user->id_utilisateur ?>">
            <button type="submit" class="btn btn-light btn-sm text-black mb-3">Supprimer</button>
            <a href="?page=admin&gest=usr" class="btn btn-light btn-sm text-black mb-3">Annuler</a>
        </form>
    </div>
</main>
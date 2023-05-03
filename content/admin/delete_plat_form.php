<?php

include_once('session.php');
include_once('dao.php');

$plat = o_display_plat($_GET['id_plat']);

if (!$plat) {
    echo "<h1>Plat not found</h1>";
    exit();
}

?>

<main>
    <div class="container mnb">
        <h1>Supprimer le plat</h1>

        <p>Etes-vous sûr de vouloir supprimer le plat "<?php echo $plat->libelle; ?>"?</p>

        <form method="post" action="/content/admin/delete_plat_script.php">
            <input type="hidden" name="id_plat" value="<?php echo $plat->id_plat; ?>">
            <button class="btn btn-light btn-sm text-black mb-3" type="submit" name="delete">Supprimer</button>
            <a class="btn btn-light btn-sm text-black mb-3" href="?page=admin&gest=plat">Annuler</a>
        </form>
    </div>
</main>
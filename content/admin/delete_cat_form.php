<?php 

include_once('session.php');
include_once('dao.php');

$categorie = o_display_cat($_GET['id_categorie']);

if (!$categorie) {
    echo "<h1>Catégorie non existante</h1>";
    exit();
}

?>

<main>
    <div class="container mnb">
        <h1>Supprimer la catégorie</h1>

        <p>Etes-vous sûr de vouloir supprimer la catégorie "<?php echo $categorie->libelle; ?>"?</p>

        <form method="post" action="/content/admin/delete_cat_script.php">
            <input type="hidden" name="id_cat" value="<?php echo $categorie->id_categorie; ?>">
            <button class="btn btn-danger" type="submit" name="delete">Supprimer</button>
            <a class="btn btn-secondary" href="?page=admin&gest=cat">Annuler</a>
        </form>
    </div>
</main>
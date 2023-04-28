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
    <h1 class="text-center mb-5">Supprimer la catégorie</h1>
    <hr>
    <div class="container my-5 mnb-nm rounded">
        <form method="post" action="/content/admin/delete_cat_script.php" class="pt-3 text-center">
            <p>Etes-vous sûr de vouloir supprimer la catégorie "<?php echo $categorie->libelle; ?>"?</p>
            <input type="hidden" name="id_cat" value="<?php echo $categorie->id_categorie; ?>">
            <button class="btn btn-light btn-sm text-black mb-3" type="submit" name="delete">Supprimer</button>
            <a class="btn btn-light btn-sm text-black mb-3" href="?page=admin&gest=cat">Annuler</a>
        </form>
    </div>
</main>
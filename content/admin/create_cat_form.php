<main>
    <h2 class="text-center mb-5">Ajouter une catégorie</h2>
    <hr>
    <div class="container my-5 rounded mnb-nm">
        <form action="/content/admin/create_cat_script.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nom_categorie" class="mt-3 mb-1">Nom de la catégorie</label>
                <input type="text" class="form-control mb-4" name="nom_categorie" id="nom_categorie" required>
            </div>
            <div class="form-group">
                <label for="image" class="mt-1 mb-1">Image de la catégorie</label>
                <input type="file" class="form-control-file mb-4" name="image_cat" id="image_cat" accept="image/*" required>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-light btn-sm text-black mt-1 mb-3" name="submit">Ajouter la catégorie</button>
                <a href="/?page=admin&gest=cat" class="btn btn-light btn-sm text-black mt-1 mb-3">Retour</a>
            </div>
        </form>
    </div>
</main>
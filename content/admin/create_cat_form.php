<main>
    <div class="container my-5 mnb rounded">
        <h2 class="text-center mb-5">Ajouter une catégorie</h2>
        <form action="/content/admin/create_cat_script.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nom_categorie">Nom de la catégorie</label>
                <input type="text" class="form-control" name="nom_categorie" id="nom_categorie" required>
            </div>
            <div class="form-group">
                <label for="image">Image de la catégorie</label>
                <input type="file" class="form-control-file" name="image_cat" id="image_cat" accept="image/*" required>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary" name="submit">Ajouter la catégorie</button>
                <a href="/?page=admin&gest=cat" class="btn btn-secondary">Retour</a>
            </div>
        </form>
    </div>
</main>
<main>
  <div class="container mnb rounded">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h2 class="my-4">Créer un utilisateur</h2>
        <form method="post" action="/content/admin/create_user_script.php">
          <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
          </div>
          <div class="form-group">
            <label for="prenom">Prénom:</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required>
          </div>
          <div class="form-group">
            <label for="email">Adresse email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="password">Mot de passe:</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <div class="form-group">
            <label for="password_verify">Vérification du mot de passe:</label>
            <input type="password" class="form-control" id="password_verify" name="password_verify" required>
          </div>
          <button type="submit" class="btn btn-primary">Créer</button>
        </form>
      </div>
    </div>
  </div>
</main>
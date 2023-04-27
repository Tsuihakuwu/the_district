<main>
  <div class="container mnb">
    <h2>Delete Command</h2>
    <p>Are you sure you want to delete this command?</p>
    <form action="/content/admin/delete_command_script.php" method="post">
      <input type="hidden" name="id_commande" value="<?= $_GET['id_com'] ?>">
      <button class="btn btn-danger" type="submit" name="delete">Delete</button>
      <a href="/?page=admin&gest=com" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
</main>
<?php

        include('db.php');
        
        $db = connexionBase();
        
        $query = $db->query('SELECT * FROM categorie');
        $tab = $query->fetchAll(PDO::FETCH_OBJ);
        $query->closeCursor();
?>

<table class='table table-dark justify-content-center d-flex w-100 mt-3 trlighter'>

<?php foreach ($tab as $categorie): ?>

<tr>
    <td><?= $categorie->libelle ?></td>
    <td><?= $categorie->image ?></td>
</tr>

<?php endforeach; ?>

</table>
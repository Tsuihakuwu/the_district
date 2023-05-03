<?php include("dao.php");
$plats = all_plat();
?>
<div class="container my-5 p-3 mnb-nm rounded">
    <h1 class="text-center">Passer une commande</h1>
    <form method="POST" action="order_script.php">
        <div class="d-flex column justify-content-around">
            <div class="col-6">
                <div class="form-group my-1">
                    <label for="nom">Nom et prénom:</label>
                    <input type="text" class="form-control" id="nom" name="nom" required>
                </div>
                <div class="form-group my-1">
                    <label for="tel">Numéro de téléphone:</label>
                    <input type="tel" class="form-control" id="tel" name="tel" required>
                </div>
                <div class="form-group my-1">
                    <label for="email">Email contact:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group my-1">
                    <label for="adresse">Adresse de livraison:</label>
                    <textarea class="form-control" id="adresse" name="adresse" required></textarea>
                </div>
            </div>
            <div class="col-5">
                <div class="form-group my-1 my-1">
                    <label for="plat">Plat:</label><br>
                    <select class="w-100 form-select" name="plat" id="plat">
                        <?php foreach ($plats as $plat) { ?>
                            <option value="<?= $plat->id_plat ?>" <?php if (isset($_GET['id_plat']) && $_GET['id_plat'] == $plat->id_plat) echo "selected"; ?>>
                                <?= $plat->libelle ?> - <?= $plat->prix ?>€
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantite">Quantité:</label>
                    <input type="number" class="form-control" id="quantite" name="quantite" required>
                </div>
                <div class="mt-4">
                    <span id="recap">
                        
                    </span>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-light btn-sm text-black mb-1 mt-3">Passer la commande</button>
        </div>
    </form>
</div>

<script>
    quantite.addEventListener("input", function () { total(parseInt(document.getElementById('quantite').value)) });

    function total(input_quantite){
        document.getElementById('recap').innerHTML = "";
        if(!isNaN(input_quantite)){
            let price = 0;
            let regex = /(\d+\.\d+)/;
            let matches = regex.exec(document.getElementById('plat').innerHTML);
            if (matches) {
            price = matches[0];
            }
            let total = input_quantite * price;
            document.getElementById('recap').innerHTML = "<div class='border border-white mt-1 p-3'><p class='text-center m-0'>Total de votre commande :</p>"+"<p class='text-center m-0'>"+total+"€</p></div>";
        }
        else{
        document.getElementById('recap').innerHTML = "";}
    }

</script>
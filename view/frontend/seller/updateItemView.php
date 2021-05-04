<?php $title = "Modifier un article"; ?>
<?php ob_start(); ?>

<?php
    if (isset($_GET['submit-update']) && $_GET['submit-update'] == 'success') {
        echo '<p id="success" class="alert alert-dismissible alert-success text-center col-6 mx-auto h6 mb-4">Votre article a bien été mis à jour !</p>';
    } 
?>

<section id="updateItem" class="mx-auto">
    <p class="returnLink text-center mx-auto pt-2"><a href="index.php?action=dashboardSeller">Retour au menu</a></p>
    <div class="jumbotron bg-primary">
        <h1 class="text-center text-white">Modifier un article</h1>
    </div>
    <div class="mx-auto">

        <div id="updateBlock">
            <form class="d-flex flex-column" action="index.php?action=submitUpdate&amp;id=<?= intval($item['id']); ?>"
                method="POST">

                <label for="ref">Référence</label>
                <input type="text" class="mb-2 col-4" name="ref" id="ref"
                    value="<?= htmlspecialchars($item['ref']); ?>" />

                <label for="name">Nom du produit : </label>
                <input class="mb-2 col-8" type="text" name="nameItem"
                    value="<?= htmlspecialchars($item['nameItem']); ?>" />

                <label for="description">Description </label>
                <textarea name="descriptionItem" rows="20" cols="40" class="mb-3"
                    id="descriptionItemUpdate"><?= htmlspecialchars($item['descriptionItem']); ?></textarea>

                <div class="infos d-flex">
                    <label for="price" class="mr-2">Prix</label>
                    <input class="mb-2 col-2 mr-2" type="number" name="price" id="price"
                        value="<?= htmlspecialchars($item['price']); ?>" />

                    <label for="size" class="mr-2">Taille</label>
                    <input class="mb-2 col-2 mr-2" type="text" name="size" id="size"
                        value="<?= htmlspecialchars($item['size']); ?>" />

                    <label for="stock" class="mr-2">Stock</label>
                    <input class="mb-2 col-2 mr-2" type="number" name="stock" id="stock"
                        value="<?= htmlspecialchars($item['stock']); ?>" />
                </div>

                <button class="btn btn-primary mb-4 mx-auto text-white" type="submit" value="Modifier">Modifier</button>
            </form>
        </div>
    </div>
</section>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
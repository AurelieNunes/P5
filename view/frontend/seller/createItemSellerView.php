<?php $title = "Ajouter un article"; ?>

<?php ob_start(); ?>

<?php
    if (isset($_GET['new-item']) && $_GET['new-item'] == 'success') {
        echo '<p id="success" class="alert alert-dismissible alert-success text-center col-6 mx-auto h6 mb-4">Votre article a été publié</p>';
    } 
?>

<section id="createItem" class="mx-auto">
    <p class="returnLink text-center mx-auto pt-2"><a href="index.php?action=dashboardSeller">Retour au menu</a></p>
    <div class="jumbotron-dashboard bg-primary">
        <h1 class="text-center text-white">Ajout Article</h1>
    </div>
    <div id="managerBlock" class="m-auto">

        <div id="addBlock">
            <form class="d-flex flex-column" id="addItem" action="index.php?action=newItem" method="POST"
                enctype="multipart/form-data">

                <label for="ref">Référence</label>
                <input class="mb-2 col-2" name="ref" id="ref" />

                <label for="name">Nom du produit : </label>
                <input class="mb-2 col-6" type="text" name="nameItem" id="nameItem" />

                <label for="description">Description </label>
                <textarea name="descriptionItem" rows="10" cols="40" class="mb-3"></textarea>

                <div class="infos d-flex align-items-center justify-content-center mx-auto">
                    <label for="price" class="mr-2">Prix</label>
                    <input class="mb-2 col-2 mr-2" type="number" name="price" id="price" />

                    <label for="size" class="mr-2">Taille</label>
                    <input class="mb-2 col-2 mr-2" type="text" name="size" id="size" />

                    <label for="stock" class="mr-2">Stock</label>
                    <input class="mb-2 col-2 mr-2" type="number" name="stock" id="stock" />
                </div>
                <div class="img&category col-12 align-center justify-content-between align-items-center mx-auto mb-4">
                    <div>
                        <label for="img" class="mt-5">Importer une image</label>
                        <input type="file" class="mb-3" name="picture" />
                    </div>
                    <div class="bloc">
                        <div class="select col-8 mx-auto">
                            <select name='categories'>
                                <option value="">Choisissez la catégorie</option>
                                <?php 
                                    foreach($categories as $category)
                                    {
                                ?>
                                <option value='<?= $category['id']; ?>'><?= $category['category_Name'];?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
        </div>

        <button class="mb-5 col-4 mx-auto d-flex justify-content-center btn btn-primary btn-lg active" role="button"
            aria-pressed="true" type="submit" value="Ajouter">Ajouter</button>
        </form>
    </div>
    </div>
</section>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
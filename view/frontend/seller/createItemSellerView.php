<?php $title = "Ajouter un article"; ?>

<?php ob_start(); ?>

<section id="createItem" class="mx-auto">
    <p class="returnLink-seller text-center mx-auto pt-2"><a href="index.php?action=dashboardSeller">Retour au menu</a></p>
    <div class="jumbotron-dashboard bg-primary">
        <h1 class="text-center text-white">Ajout Article</h1>
    </div>
    <div id="managerBlock" class="m-auto col-10">

        <div id="addBlock">
            <form class="d-flex flex-column" id="addNewItem" action="index.php?action=newItem" method="POST" enctype="multipart/form-data">

                <label for="ref">Référence</label>
                <input class="mb-2 col-4" name="ref" id="ref" />

                <label for="nameItem">Nom du produit : </label>
                <input class="mb-2 col-8" type="text" name="nameItem" id="nameItem" />

                <label for="descriptionItem">Description </label>
                <textarea name="descriptionItem" id="descriptionItem" rows="10" cols="40" class="mb-3"></textarea>

                <div class="infos d-flex flex-column align-items-center mx-auto">
                    <label for="price" class="mr-2">Prix</label>
                    <input class="mb-2 col-8 mr-2" type="number" name="price" id="price" />

                    <label for="size" class="mr-2">Taille</label>
                    <input class="mb-2 col-8 mr-2" type="text" name="size" id="size" />

                    <label for="stock" class="mr-2">Stock</label>
                    <input class="mb-2 col-8 mr-2" type="number" name="stock" id="stock" />
                </div>
                <div class="imgcategory col-12 align-center justify-content-between align-items-center mx-auto mb-4">
                    <div>
                        <label for="img" class="mt-5">Importer une image</label>
                        <input type="file" class="mb-3" name="picture" id="img" />
                    </div>
                    <div class="bloc">
                        <div class="select col-8 mx-auto">
                            <select name='categories'>
                                <option value="">Choisissez la catégorie</option>
                                <?php
                                foreach ($categories as $category) {
                                ?>
                                    <option value='<?= $category['id']; ?>'><?= $category['category_Name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <button class="mb-5 col-4 mx-auto d-flex justify-content-center btn btn-primary btn-lg active" role="button" aria-pressed="true" type="submit" value="Ajouter">Ajouter</button>
            </form>
        </div>
    </div>
</section>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
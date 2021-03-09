<?php $title = "Modifier un article"; ?>
<?php ob_start(); ?>

<section id="updateItem" class="mx-auto pt-5">
	<h1 class="text-center">Modifier un article</h1>
	<div id="managerBlock" class="mx-auto">
		<p class="returnLink"><a href="index.php?action=dashboardSeller">Retour au menu</a></p>
		<div id="updateBlock">
			<form class="d-flex flex-column" id="updateItem" action="index.php?action=submitUpdate" method="POST">
                
                <label for="ref">Référence</label>
                <input type="text" class="mb-2 col-2" name="ref" id="ref" value="<?= htmlspecialchars($item['ref']); ?>"/>

				<label for="name">Nom du produit : </label>
                <input class="mb-2 col-6" type="text" name="nameItem" id="nameItem" value="<?= htmlspecialchars($item['nameItem']); ?>"/>

                <label for="description">Description </label>
				<textarea name="descriptionItem" rows="20" cols="40" class="mb-3" id="descriptionItemUpdate"><?= htmlspecialchars($item['descriptionItem']); ?></textarea>

                <div class="infos d-flex">
                    <label for="price" class="mr-2">Prix</label>
                    <input class="mb-2 col-2 mr-2" type="number" name="price" id="price" value="<?= htmlspecialchars($item['price']); ?>"/>

                    <label for="size" class="mr-2">Taille</label>
                    <input class="mb-2 col-2 mr-2" type="text" name="size" id="size" value="<?= htmlspecialchars($item['size']); ?>"/>

                    <label for="stock" class="mr-2">Stock</label>
                    <input class="mb-2 col-2 mr-2" type="number" name="stock" id="stock" value="<?= htmlspecialchars($item['stock']); ?>"/>
                </div>

                <!-- <label for="img" class="mt-5">Importer une image</label>
                <input type="file" class="mb-3" name="img" />
                <input type="submit" value="Envoyer le fichier" /> -->

				<button class="mb-5 col-4 mx-auto" type="submit" value="Modifier">Modifier</button>
			</form>
		</div>
	</div>
</section>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
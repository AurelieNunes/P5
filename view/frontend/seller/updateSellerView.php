<?php $title = "Modifier mes informations"; ?>
<?php ob_start(); ?>

<section id="updateSeller" class="mx-auto">
	<p class="returnLink-seller text-center mx-auto pt-2"><a href="index.php?action=dashboardSeller">Retour au menu</a></p>
	<div class="jumbotron-dashboard">
		<h1 class="text-center text-white bg-primary">Modifier mes informations</h1>
	</div>
	<div class="mx-auto">

		<div id="updateAccountSeller">
			<form class="d-flex flex-column col-10 m-auto"
				action="index.php?action=submitUpdateSeller&amp;id=<?=intval($_SESSION['id']); ?>" method="POST"
				enctype="multipart/form-data">

				<label for="description">Description de ma boutique </label>
				<textarea name="descriptionShop" rows="10" cols="40" class="mb-3"></textarea>

				<div class="col-6 img-upload">
					<label for="img" class="mt-5">Importer une image</label>
					<input type="file" class="mb-3" name="pictureShop" />
				</div>

				<label for="ref">Adresse</label>
				<input type="text" class="mb-2 col-8" name="addressSeller"
					value="<?= htmlspecialchars($seller['addressSeller']); ?>" />

				<label for="cp">Code postal</label>
				<input class="mb-2 col-4" type="number" name="cpSeller"
					value="<?= htmlspecialchars($seller['cpSeller']); ?>" />

				<label for="citySeller">Ville</label>
				<input class="mb-2 col-6" type="text" name="citySeller"
					value="<?= htmlspecialchars($seller['citySeller']); ?>" />

				<label for="tel" class="mr-2">Téléphone</label>
				<input class="mb-2 col-6 mr-2" type="number" name="telSeller"
					value="<?= htmlspecialchars($seller['telSeller']); ?>">

				<div class="deleteAccount mb-4">
					<a href="index.php?action=deleteAccountSeller">Supprimer mon compte</a>
				</div>
				<button class="btn btn-primary mb-4 mx-auto text-white" type="submit" value="Modifier">Modifier</button>
			</form>
		</div>
	</div>
</section>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
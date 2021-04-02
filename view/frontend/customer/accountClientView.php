<?php $title = "Modifier mes informations"; ?>
<?php ob_start(); ?>

<section id="updateCustomer" class="mx-auto pt-5">
	<h1 class="text-center">Modifier mes informations</h1>
	<div class="mx-auto">
		<p class="returnLink"><a href="index.php?action=home">Retour au menu</a></p>
		<div id="updateAccountCustomer">
			<form class="d-flex flex-column"
				action="index.php?action=submitUpdateCustomer&amp;id=<?=intval($_SESSION['id']); ?>" method="POST">

				<label for="ref">Adresse</label>
				<input type="text" class="mb-2 col-6" name="addressCustomer"
					 />

				<label for="cp">Code postal</label>
				<input class="mb-2 col-2" type="number" name="cpCustomer"
				/>

				<label for="citySeller">Ville</label>
				<input class="mb-2 col-6" type="text" name="cityCustomer"
				/>

				<label for="tel" class="mr-2">Téléphone</label>
				<input class="mb-2 col-2 mr-2" type="number" name="telCustomer"
				/>

				<div class="deleteAccount">
					<a href="index.php?action=deleteAccountCustomer">Supprimer mon compte</a>
				</div>
				<button class="mb-5 col-4 mx-auto" type="submit" value="Modifier">Modifier</button>
			</form>
		</div>
	</div>
</section>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
<?php $title = "Mettre à jour mes informations"; ?>
<?php ob_start(); ?>
	
    
    	<div id="updateAccountCustomer">
			<form class="d-flex flex-column w-50 mx-auto"
				action="index.php?action=submitUpdateCustomer&amp;id=<?=intval($_SESSION['id']); ?>" method="POST">

				<label for="ref">Adresse</label>
				<input type="text" class="mb-2 col-4" name="addressCustomer" />

				<label for="cp">Code postal</label>
				<input class="mb-2 col-2" type="number" name="cpCustomer" />

				<label for="citySeller">Ville</label>
				<input class="mb-2 col-4" type="text" name="cityCustomer" />

				<label for="tel" class="mr-2">Téléphone</label>
				<input class="mb-2 col-2 mr-2" type="number" name="telCustomer" />

				<button class="mb-5 col-2 mx-auto" type="submit" value="Modifier">Modifier</button>
			</form>
		</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
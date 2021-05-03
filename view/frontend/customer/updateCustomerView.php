<?php $title = "Mettre à jour mes informations"; ?>
<?php ob_start(); ?>

<?php
    if (isset($_GET['submit-update-customer']) && $_GET['submit-update-customer'] == 'success') {
        echo '<p id="success" class="alert alert-dismissible alert-success text-center col-6 mx-auto h6 mb-4">Votre compte a bien été mis à jour !</p>';
    } 

	if(isset($_GET['delete-account']) && $_GET['delete-account'] == 'success') {
		echo '<p id="success" class="alert alert-dismissible alert-success text-center col-6 mx-auto h6 mb-4">Votre compte a bien été supprimé !</p>';
	}
?>

<p class="returnLink w-50 mx-auto"><a class="h6 text-primary" href="index.php?action=home">Retour au menu</a></p>
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
<?php $title = "Mes informations"; ?>
<?php ob_start(); ?>

<section id="updateCustomer" class="mx-auto pt-5">
	<h1 class="text-center">Mes informations</h1>
	<div class="mx-auto">
		<p class="returnLink w-50 mx-auto"><a href="index.php?action=home">Retour au menu</a></p>
		<div class="infoCustomer">
			<ul>
				<?php   
					foreach($customers as $customer){ 
				// var_dump($sellers);
				// die();
				?>
				<li class="card d-flex flex-row w-25 mx-auto mb-3 mt-3 list-group-item justify-content-around align-items-center">
					<div class="info-customer w-50">
						<p><?= $sellers['company']; ?></p>
						<p><?= $sellers['addressSeller']; ?></p>
						<p><?= $sellers['cpSeller']; ?>
						<?= $sellers['citySeller']; ?></p>
						<p><?= $sellers['telSeller']; ?></p>
					</div>
				</li>
				<?php 
					}
				?>
			</ul>
		</div>

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

				<div class="deleteAccount">
					<a href="index.php?action=deleteAccountCustomer">Supprimer mon compte</a>
				</div>
				<button class="mb-5 col-2 mx-auto" type="submit" value="Modifier">Modifier</button>
			</form>
		</div>
	</div>
</section>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
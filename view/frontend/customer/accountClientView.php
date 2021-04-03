<?php $title = "Mes informations"; ?>
<?php ob_start(); ?>

<section id="accountCustomer" class="mx-auto pt-5">
	<h1 class="text-center">Mes informations</h1>
	<div class="mx-auto">
		<p class="returnLink w-50 mx-auto"><a href="index.php?action=home">Retour au menu</a></p>
		<div class="infoCustomer">
		<a href="index.php?action=getCustomer&amp;id=<?=intval($_SESSION['id']); ?>"></a>
			<ul>
				<li class="card d-flex flex-row w-25 mx-auto mb-3 mt-3 list-group-item justify-content-around align-items-center">
					<div class="info-customer w-50" >
						<p>Nom : <?= $customerCo['lastName']; ?></p>
						<p>Prénom : <?= $customerCo['firstName']; ?></p>
						<p>Adresse : <?= $customerCo['addressCustomer']; ?></p>
						<p>Code Postal : <?= $customerCo['cpCustomer']; ?>
						<p>Ville : <?= $customerCo['cityCustomer']; ?></p>
						<p>Tel : <?= $customerCo['telCustomer']; ?></p>
						<p>Mail : <?= $customerCo['mail']; ?></p>
					</div>
				</li>
			</ul>
			<p class="update-link">
                <a href="index.php?action=displayAccountCustomer&amp;id=<?= $customerCo['id']; ?>">Modifier mes informations</a>
            </p>
            <p class="delete-link">
                <a href="index.php?action=deleteAccountCustomer&amp;id=<?= $customerCo['id']; ?>">Supprimer mon compte</a>
            </p>
		</div>
	</div>
</section>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
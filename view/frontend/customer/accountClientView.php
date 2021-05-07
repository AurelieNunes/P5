<?php $title = "Mes informations"; ?>
<?php ob_start(); ?>

<section id="accountCustomer">
	<h1 class="h2 text-center bg-primary pt-2 pb-2 white col-12">Mes informations</h1>
	<div class="infoCustomer">
		<a href="index.php?action=getCustomer&amp;id=<?=intval($_SESSION['id']); ?>"></a>
		<ul>
			<li class="card-customer d-flex flex-row mx-auto list-group-item justify-content-around align-items-center">
				<div class="info-customer">
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
		<p class="update-link text-center">
			<a href="index.php?action=displayUpdateCustomer&amp;id=<?= $customerCo['id']; ?>">Modifier mes
				informations</a>
		</p>
		<p class="delete-link text-center">
			<a href="index.php?action=deleteAccountCustomer&amp;id=<?= $customerCo['id']; ?>">Supprimer mon
				compte</a>
		</p>
	</div>
</section>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
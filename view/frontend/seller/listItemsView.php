<?php $title = "Produits en Ligne"; ?>
<?php ob_start(); ?>

<!-- Gestion des Artciles -->
<section id="listItems" class="mx-auto pt-2">
	<div id="managerBlockItems" class="mx-auto">
		<p class="returnLink-seller text-center mx-auto pt-2">
			<a href="index.php?action=dashboardSeller">Retour au menu</a>
		</p>
		<div class="jumbotron bg-primary">
			<h1 class="text-center text-white">Produits en Ligne</h1>
		</div>

		<div class="listItems mx-auto">
			<ul class="list-group">
				<?php
				foreach($items as $item) 
					{
						if (!empty($items)) {
					?>
				<div class="card border-primary mb-2 text-center">
					<li class="list-group-item justify-content-between align-items-center">
						<div class="card-header">
							<p class="text-center"><?= $item['nameItem'];?></p>
						</div>
						<p class="pt-4">Référence : <?= $item['ref'];?></p>
						<p><u>Prix :</u> <?= $item['price'];?> €</p>
						<p>Stock : <?= $item['stock'];?></p>
						<div class="link-ReadMore">
							<a class="nav-link" href="index.php?action=item&amp;id=<?= $item['id']; ?>">Lire la suite ...</a>
						</div>
					</li>
				</div>
			</ul>
			<?php
						}
				}	
		?>
		</div>
	</div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
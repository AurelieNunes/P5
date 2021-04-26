<?php $title = "Produits en Ligne"; ?>
<?php ob_start(); ?>

<link href="../../../public/css/style.css" rel="stylesheet">

<!-- Gestion des Artciles -->
<section id="listItems" class="mx-auto pt-5">
	<div id="managerBlock" class="mx-auto">
		<p class="returnLink">
			<a href="index.php?action=dashboardSeller">Retour au menu</a>
		</p>
		<div class="jumbotron bg-primary">
			<h1 class="text-center text-white">Produits en Ligne</h1>
		</div>

		<div class="listItems col-10 mx-auto">
			<ul class="list-group">
				<?php
				foreach($items as $item) 
					{
						if (!empty($items)) {
					?>
				<div class="card border-primary mb-2 text-center">
					<li class="list-group-item d-flex justify-content-between align-items-center">
						<div class="card-header">
							<p class="text-center"><?= $item['nameItem'];?></p>
						</div>
						<p>Référence : <?= $item['ref'];?></p>
						<p>Prix : <?= $item['price'];?> €</p>
						<p>Stock : <?= $item['stock'];?></p>
						<div class="link-ReadMore">
							<a class="nav-link" href="index.php?action=item&amp;id=<?= $item['id']; ?>">Lire la suite
								...</a>
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
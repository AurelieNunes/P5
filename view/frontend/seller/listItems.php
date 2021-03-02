<?php $title = "Liste des Produits"; ?>
<?php ob_start(); ?>

<link href="../../../public/css/style.css" rel="stylesheet">

<!-- Gestion des Artciles -->
<section id="listItems" class="mx-auto pt-5">
	<!-- <a href="index.php?action=listItemsSeller"></a> -->

	<div id="managerBlock" class="mx-auto">
		<p class="returnLink">
			<a href="index.php?action=dashboardSeller">Retour au menu</a>
		</p>
		
		<h1 class="text-center">Liste des Articles</h1>
		<div class="listItems">
			<ul class="list-group">
			<?php
				foreach($items as $item) 
					{
						// var_dump($items);
						// die();
						if (!empty($items)) {
					?>
				<li class="list-group-item d-flex justify-content-between align-items-center">
					<?= $item['nameItem']; ?>
				</li>
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
<?php
$title = "Panel d'administration"; ?>

<?php ob_start(); ?>

<section id="admin">
	<div class="jumbotron">
		<h1 class="text-center">
			<p class="text-center"> Panel d'administration </p>
		</h1>
	</div>

<!-- TOUS LES ARTICLES -->




<!-- TOUS LES VENDEURS -->




<!-- TOUS LES CLIENTS -->


<?php $content = ob_get_clean(); ?>
<?php require ('template.php'); ?>
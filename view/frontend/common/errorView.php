<?php
$title = "Erreur"; ?>
<?php ob_start(); ?>

<section class="page_404">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 ">
				<div class="col-sm-10 col-sm-offset-1  text-center">
					<div class="four_zero_four_bg">
						<h1 class="text-center text-primary">OOPS !</h1>


					</div>

					<div class="contant_box_404">
						<h2>
							Vous semblez perdu...
						</h2>

						<p class="h4">La page que vous recherchez n'est pas disponible!</p>

						<a href="index.php?action=home" class="link_404 h5">Retourner à l'accueil... C'est plus prudent !</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
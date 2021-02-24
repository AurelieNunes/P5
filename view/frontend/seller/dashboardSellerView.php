<?php $title = "Tableau de Bord"; ?>

<?php ob_start(); ?>
    <div class="container-fluid d-flex">
    <a href="index.php?action=sellerPanel"></a>
    <section id="adminPanel" class="col-12"> 
	<div class="jumbotron mb-0 pb-5 bg-primary">
		<h1 class="text-center">
			<p class="text-center">Tableau de Bord</p>
		</h1>
	</div>

	<!--Ecrire Article -->
	<div class="headPost mb-4 text-center">
		<h3>Ajouter un produit</h3>
		<button class="btn btn-primary" id="writePost"><a class=" text-white" href="index.php?action=createItem">Ajouter</a></button>
	</div>


      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <span data-feather="home"></span>
                  Ajouter un produit<span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file"></span>
                  Commandes
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="shopping-cart"></span>
                  Produits
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="users"></span>
                  Clients
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  Stocks
                </a>
              </li>
              <li class="nav-item">
                <a href="loginSellerView.php">
                  <span data-feather="account"></span>
                  Mon Compte
                </a>
              </li>
            </ul>
      <div class="board">
        <h1>Tableau de Bord</h1>
      </div>
    </div>
    <?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

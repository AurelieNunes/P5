<?php $title = "Tableau de Bord"; ?>

<?php ob_start(); ?>
<div class="container-fluid d-flex">
  <a href="index.php?action=dashboardSeller"></a>
  <section id="adminPanel" class="col-12">
    <div class="jumbotron mb-5 pb-5 bg-primary">
      <h1 class="text-center">
        <p class="text-center text-white">Tableau de Bord</p>
      </h1>
    </div>

    <!-- Ajouter un produit -->
    <div class="headPost mb-4 text-center">
      <h3>Ajouter un produit</h3>
      <button class="btn btn-primary" id="addItem"><a class="text-white"
          href="index.php?action=createItem">Ajouter</a></button>
    </div>

    <!-- Liste des Produits -->
    <div class="headPost mb-4 text-center">
      <h3>Produits en Ligne</h3>

      <button class="btn btn-primary" id="listItems"><a class="text-white" href="index.php?action=listItemsSeller">Liste
          des
          produits</a></button>
    </div>

    <!-- Mon compte -->
    <div class="headPost mb-4 text-center">
      <h3>Mon compte</h3>
      <button class="btn btn-primary" id="accountSeller"><a class="text-white"
          href="index.php?action=displayUpdateSeller">Mon compte</a></button>
    </div>

    <?php $content = ob_get_clean(); ?>

    <?php require('template.php'); ?>
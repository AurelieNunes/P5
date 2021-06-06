<?php $title = "Tableau de Bord"; ?>

<?php ob_start(); ?>
<div class="container-fluid d-flex">
  <a href="index.php?action=dashboardSeller"></a>
  <section id="adminSeller" class="col-12">
    <div class="jumbotron-dashboard bg-primary pt-2 pb-2">
      <h1 class="text-center white">Tableau de Bord</h1>
    </div>

    <?php
    if (isset($_GET['submit-update']) && $_GET['submit-update'] == 'success') {
      echo '<p id="success" class="alert alert-dismissible alert-success text-center col-12 m-auto h6 mb-4 mt-4 p-0">Votre article a bien été mis à jour !</p>';
    }

    if (isset($_GET['submit-update-seller']) && $_GET['submit-update-seller'] == 'success') {
      echo '<p id="success" class="alert alert-dismissible alert-success text-center col-12 m-auto h6 mb-4 mt-4 p-0">Votre compte a bien été mis à jour !</p>';
    }

    if (isset($_GET['delete-account']) && $_GET['delete-account'] == 'success') {
      echo '<p id="success" class="alert alert-dismissible alert-success text-center col-12 m-auto h6 mb-4 mt-4 p-0">Votre compte a bien été supprimé !</p>';
    }

    if (isset($_GET['new-item']) && $_GET['new-item'] == 'success') {
      echo '<p id="success" class="alert alert-dismissible alert-success text-center col-12 m-auto h6 mb-4 mt-4 p-0">Votre article a bien été publié</p>';
    }
    ?>

    <!-- Ajouter un produit -->
    <div class="headPost text-center">
      <h3>Ajouter un produit</h3>
      <button class="btn btn-primary" id="addItem"><a class="text-white" href="index.php?action=createItem">Ajouter</a></button>
    </div>

    <!-- Liste des Produits -->
    <div class="headPost text-center">
      <h3>Produits en Ligne</h3>
      <button class="btn btn-primary" id="listItems"><a class="text-white" href="index.php?action=listItemsSeller">Liste des produits</a></button>
    </div>

    <!-- Mon compte -->
    <div class="headPost text-center">
      <h3>Mon compte</h3>
      <button class="btn btn-primary" id="accountSeller"><a class="text-white" href="index.php?action=displayUpdateSeller">Mon compte</a></button>
    </div>
  </section>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
<?php
$title = "Panel d'administration"; ?>

<?php ob_start(); ?>

<section id="adminPanel">
  <div class="jumbotron-admin">
    <h1 class="text-center bg-orange text-white mb-5">
      Panel d'administration
    </h1>
  </div>

  <!-- TOUS LES VENDEURS -->
  <div class="card text-center">
    <div class="card-sellers text-primary h3">
      Vendeurs
    </div>
    <div class="card-body">
      <h6 class="card-title">Gérer tous les vendeurs</h6>
      <a href="index.php?action=manageSellers" class="btn btn-primary">Voir</a>
    </div>
    <div class="card-footer text-muted">
    </div>
  </div>

  <!-- TOUS LES ARTICLES -->
  <div class="card text-center">
    <div class="card-sellers text-primary h3">
      Articles en ligne
    </div>
    <div class="card-body">
      <h6 class="card-title">Gérer tous les articles en ligne</h6>
      <a href="index.php?action=manageItems" class="btn btn-primary">Voir</a>
    </div>
    <div class="card-footer text-muted">
    </div>
  </div>

  <!-- TOUS LES CLIENTS -->
  <div class="card text-center">
    <div class="card-sellers text-primary h3">
      Clients
    </div>
    <div class="card-body">
      <h6 class="card-title">Gérer tous les clients actifs</h6>
      <a href="index.php?action=manageCustomers" class="btn btn-primary">Voir</a>
    </div>
    <div class="card-footer text-muted">
    </div>
  </div>

</section>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
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

    <!-- Ajouter un produit -->
    <div class="headPost mb-4 text-center">
      <h3>Ajouter un produit</h3>
      <button class="btn btn-primary" id="addItem"><a class="text-white"
          href="index.php?action=createItem">Ajouter</a></button>
    </div>

    <!-- Liste des Produits -->
    <div class="headPost mb-4 text-center">
      <h3>Liste des produits</h3>
      <button class="btn btn-primary" id="listItems"><a class="text-white" href="index.php?action=listItemsSeller">Liste des
          produits</a></button>
    </div>

    <!-- Modifier un Produit -->
    <div class="headPost mb-4 text-center">
      <h3>Modifier un produit</h3>
      <button class="btn btn-primary" id="updateItem"><a class="text-white"
          href="index.php?action=updateItem">Modifier</a></button>
    </div>

    <!-- Supprimer un Produit -->
    <div class="headPost mb-4 text-center">
      <h3>Supprimer</h3>
      <button class="btn btn-primary" id="deleteItem"><a class="text-white"
          href="index.php?action=deleteItem">Supprimer</a></button>
    </div>

    <div class="row">
      <nav class="d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="index.php?action=createItem">
                Ajouter un produit
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?action=listItems">
                Liste des Produits
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?action=updateItem">
                Mettre à jour
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                Supprimer un article
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?action=deleteItem">
                Stock
              </a>
            </li>
            <li class="nav-item ml-3">
              <a href="index.php?action=accountSeller">
                Mon Compte
              </a>
            </li>
          </ul>
        </div>
        <?php $content = ob_get_clean(); ?>

        <?php require('template.php'); ?>
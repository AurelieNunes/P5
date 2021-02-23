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

  <?php
// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['img']) AND $_FILES['img']['error'] == 0)
{
 // Testons si le fichier n'est pas trop gros
  if ($_FILES['img']['size'] <= 1000000)
  {
      $infosfichier = pathinfo($_FILES['img']['name']);
      $extension_upload = $infosfichier['extension'];
      $extension_upload = $infosfichier['extension'];
      $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
        if (in_array($extension_upload, $extensions_autorisees))
          {
          // On peut valider le fichier et le stocker définitivement
            move_uploaded_file($_FILES['img']['tmp_name'], 'uploads/' . basename($_FILES['img']['name']));
              echo "L'envoi a bien été effectué !";
          }
  }
}
?>

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

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Saved reports</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Mois en cours
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Mois dernier
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Année complète
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      <div class="board">
        <h1>Tableau de Bord</h1>
      </div>
    </div>
    <?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

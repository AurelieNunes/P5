<?php $title = "Produit"; ?>
<?php ob_start(); ?>

<link href="../../../public/css/style.css" rel="stylesheet">

<section id="viewItem">
    <div class="jumbotron bg-primary">
        <p class="returnLink">
            <a class="h6 text-white" href="index.php?action=dashboardSeller">Retour au menu</a>
        </p>
        <h1 class="text-center text-white">Vos produits en Ligne</h1>
    </div>
    <div class="card border-primary mb-3 text-center">
        <div class="card-header h4"><?= $item['nameItem']; ?></div>

        <div class="card-body">
            <h4 class="card-title h6"><?= $item['ref']; ?></h4>
            <p class="card-text"><?= $item['descriptionItem']; ?></p>
            <p>Prix : <?= $item['price']; ?>€</p>
            <p>Taille : <?= $item['size']; ?></p>
            <p>En stock : <?= $item['stock']; ?></p>
            <p class="update-link">
                <a href="index.php?action=displayUpdateItem&amp;id=<?= $item['id']; ?>">Modifier cet article</a>
            </p>
            <p class ="delete-link">
                <a href="index.php?action=deleteItem&amp;id=<?= $item['id']; ?>">Supprimer cet article</a>
            </p>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
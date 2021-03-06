<?php $title = "Produit"; ?>
<?php ob_start(); ?>

<link href="../../../public/css/style.css" rel="stylesheet">

<section id="viewItem">
    <p class="returnLink">
        <a href="index.php?action=dashboardSeller">Retour au menu</a>
    </p>
    <h1 class="text-center">Produits en Ligne</h1>

    <div class="card border-primary mb-3" style="max-width: 20rem;">
        <div class="card-header"><?= $item['nameItem']; ?></div>
        
        <div class="card-body">
            <h4 class="card-title"><?= $item['ref']; ?></h4>
            <p class="card-text"><?= $item['descriptionItem']; ?></p>
            <p><?= $item['price']; ?>€</p>
            <p><?= $item['size']; ?></p>
            <p><?= $item['stock']; ?></p>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
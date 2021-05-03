<?php $title = "Produit"; ?>
<?php ob_start(); ?>

<link href="../../../public/css/style.css" rel="stylesheet">

<section id="viewItem">
    <p class="returnLink">
        <a class="h6 text-primary" href="index.php?action=dashboardSeller">Retour au menu</a>
    </p>
    <div class="jumbotron bg-primary">
        <h1 class="text-center text-white">Modifier mon article</h1>
    </div>
    <div class="card border-primary mb-3 text-center">
        <div class="card-header h4"><?= $item['nameItem']; ?></div>

        <div class="card-body">

            <div class="img-item">
                <img class="card-img-top " src="<?= $item['url_img']; ?>" alt="Card image cap">
            </div>
            <div class="info-item m-auto">
                <p class="card-title">Ref : <?= $item['ref']; ?></p>
                <p class="card-text"><?= $item['descriptionItem']; ?></p>
                <p class="price"><u>Prix</u>: <?= $item['price']; ?>€</p>
                <?php
                    if(!empty($item['size']))
                    {
                ?>
                <p class="size">Taille : <?= $item['size']; ?></p>
                <?php
                    }
                ?>
                <p class="mb-4">En stock : <?= $item['stock']; ?></p>

                <p class="update-link">
                    <a class="h6 text-primary"
                        href="index.php?action=displayUpdateItem&amp;id=<?= $item['id']; ?>">Modifier cet article</a>
                </p>
                <p class="delete-link">
                    <a class="h6 text-primary" href="index.php?action=deleteItem&amp;id=<?= $item['id']; ?>">Supprimer
                        cet article</a>
                </p>
            </div>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
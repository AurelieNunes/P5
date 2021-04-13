<?php
$title = "Gérer tous les articles"; ?>

<?php ob_start(); ?>

<section id="manageAllItems">
    <div class="jumbotron">
        <h1 class="text-center">
            <p class="text-center">Gérer les articles</p>
        </h1>
    </div>
    <?php
    foreach($item as $items)
    { 
?>
    <div class="card mb-2">
        <div class="card-header h4 text-center">
            <?= $items['nameItem'];?>
        </div>
        <div class="card-body d-flex justify-content-around mx-auto">
            <div class="description">
                <p><?= $items['descriptionItem'];?></p>
                <p>Référence : <?= $items['ref'];?></p>
                <p>Prix : <?= $items['price'];?> €</p>
                <p>Stock : <?= $items['stock'];?></p>
            </div>
            <p class="col-4 img"><img class="col-12" src="<?= $items['url_img'];?>"></p>
        </div>
        <div class="card-footer text-muted">
            <p class="delete-link text-center">
                <a href="index.php?action=deleteItemByAdmin&amp;id=<?= $items['id']; ?>">Supprimer cet article</a>
            </p>
        </div>
    </div>
    <?php
    }
    ?>

</section>
<?php $content = ob_get_clean(); ?>
<?php require ('template.php'); ?>
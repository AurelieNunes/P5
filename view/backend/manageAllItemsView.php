<?php
$title = "Gérer tous les articles"; ?>

<?php ob_start(); ?>

<section id="manageAllItems">
<p class="returnLink text-center text-primary h4"><a href="index.php?action=admin">Retour</a></p>
    <div class="jumbotronAllItems bg-orange white">
        <h1 class="text-center">Gérer les articles</h1>
    </div>
    <?php
    foreach($item as $items)
    { 
?>
    <div class="card mb-2">
        <div class="card-header text-primary h2 text-center">
            <?= $items['nameItem'];?>
        </div>
        <div class="card-body">
            <p class="col-6 m-auto img"><img class="col-12" src="<?= $items['url_img'];?>"></p>
            <div class="description text-center mt-4">
                <p><?= $items['descriptionItem'];?></p>
                <p>Référence : <?= $items['ref'];?></p>
                <p>Prix : <?= $items['price'];?> €</p>
                <p>Stock : <?= $items['stock'];?></p>
            </div>
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
<?php
$title = "Gérer tous les articles"; ?>

<?php ob_start(); ?>

<section id="manageAllItems">
    <p class="returnLink-admin text-center text-primary h4"><a href="index.php?action=admin">Retour</a></p>
    <div class="jumbotronAllItems bg-orange white">
        <h1 class="text-center">Gérer les articles</h1>
    </div>
    <?php
    foreach ($item as $items) {
    ?>
        <div class="card mb-2">
            <div class="card-header text-primary h2 text-center">
                <?= $items['nameItem']; ?>
            </div>
            <div class="card-body">
                <p class="col-6 m-auto img"><img class="col-12" src="<?= $items['url_img']; ?>"></p>
                <div class="description text-center mt-4">
                    <p><?= $items['descriptionItem']; ?></p>
                    <p>Référence : <?= $items['ref']; ?></p>
                    <p>Prix : <?= $items['price']; ?> €</p>
                    <p>Stock : <?= $items['stock']; ?></p>
                </div>
            </div>
            <div class="modalContent m-auto">
                <button class="btnModal btn btn-secondary bg-primary">Supprimer cet article</button>
            </div>

            <div class="modal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Supprimer</h5>
                        </div>
                        <div class="modal-body">
                            <p>Voulez-vous vraiment supprimer <?= $items['nameItem']; ?>?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">
                                <a class="text-white" href="index.php?action=deleteItemByAdmin&amp;id=<?= $items['id']; ?>">Oui</a></button>
                            <button type="button" class="btn btn-secondary closeBtn" data-dismiss="close">Non</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

</section>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
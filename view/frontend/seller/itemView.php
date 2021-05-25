<?php $title = "Produit"; ?>
<?php ob_start(); ?>

<section id="viewItem">
    <p class="returnLink-seller text-center mx-auto pt-2">
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

                <div class="modalContent m-auto">
                    <button class="btn btn-secondary bg-primary mb-4"><a class="text-decoration-none h6 white" href="index.php?action=displayUpdateItem&amp;id=<?= $item['id']; ?>">Modifier cet article</a>
                    </button>
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
                                <p>Voulez-vous vraiment supprimer <?= $item['nameItem']; ?>?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary">
                                    <a class="text-white" href="index.php?action=deleteItem&amp;id=<?= $item['id']; ?>">Oui</a></button>
                                <button type="button" class="btn btn-secondary closeBtn" data-dismiss="close">Non</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
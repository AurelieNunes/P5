<?php
$title = "Gérer tous les vendeurs"; ?>

<?php ob_start(); ?>

<section id="manageAllSellers">
    <p class="returnLink-admin text-center text-primary h4"><a href="index.php?action=admin">Retour</a></p>
    <div class="jumbotron">
        <h1 class="text-center bg-orange white">
            Gérer les vendeurs
        </h1>
    </div>

    <?php
    foreach ($allSellers as $sellers) {
    ?>
        <div class="card text-center mb-2">
            <div class="card-header h3 text-primary">
                <?= $sellers['company']; ?>
            </div>
            <div class="card-body">
                <p>Adresse :<?= $sellers['addressSeller']; ?></p>
                <p><?= $sellers['cpSeller']; ?><?= $sellers['citySeller']; ?></p>
                <p>Tel : <?= $sellers['telSeller']; ?></p>
                <p>Mail : <?= $sellers['mail']; ?></p>
            </div>
            <div class="modalContent m-auto">
                <button class="btnModal btn btn-secondary bg-primary">Supprimer ce vendeur</button>
            </div>

            <div class="modal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Supprimer</h5>
                        </div>
                        <div class="modal-body">
                            <p>Voulez-vous vraiment supprimer <?= $sellers['company']; ?> ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">
                                <a class="text-white" href="index.php?action=deleteSeller&amp;id=<?= $sellers['id']; ?>">Oui</a></button>
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
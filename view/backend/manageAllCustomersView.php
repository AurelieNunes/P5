<?php
$title = "Gérer tous les clients"; ?>

<?php ob_start(); ?>

<section id="manageAllCustomers">
    <p class="returnLink-admin text-center text-primary h4"><a href="index.php?action=admin">Retour</a></p>
    <div class="jumbotronAllItems">
        <h1 class="text-center bg-orange white">Gérer les clients</h1>
    </div>
    <?php
    foreach ($customer as $customers) {
    ?>
        <div class="card mb-2">
            <div class="card-header text-primary h2 text-center">
                <?= $customers['lastName']; ?> <?= $customers['firstName']; ?>
            </div>
            <div class="card-body d-flex justify-content-around mx-auto">
                <div class="description">
                    <p>Adresse :<?= $customers['addressCustomer']; ?></p>
                    <p><?= $customers['cpCustomer']; ?><?= $customers['cityCustomer']; ?></p>
                    <p>Tel : <?= $customers['telCustomer']; ?> </p>
                    <p>Mail : <?= $customers['mail']; ?></p>
                </div>
            </div>
            <div class="modalContent m-auto">
                <button class="btnModal btn btn-secondary bg-primary">Supprimer ce client</button>
            </div>

            <div class="modal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Supprimer</h5>
                        </div>
                        <div class="modal-body">
                            <p>Voulez-vous vraiment supprimer <?= $customers['firstName']; ?>?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">
                                <a class="text-white" href="index.php?action=deleteCustomer&amp;id=<?= $customers['id']; ?>">Oui</a></button>
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
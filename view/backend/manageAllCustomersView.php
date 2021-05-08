<?php
$title = "Gérer tous les clients"; ?>

<?php ob_start(); ?>

<section id="manageAllCustomers">
    <p class="returnLink-admin text-center text-primary h4"><a href="index.php?action=admin">Retour</a></p>
    <div class="jumbotronAllItems">
        <h1 class="text-center bg-orange white">Gérer les clients</h1>
    </div>
    <?php
        foreach($customer as $customers)
        {
    ?>
    <div class="card mb-2">
        <div class="card-header text-primary h2 text-center">
            <?= $customers['lastName'];?> <?= $customers['firstName'];?>
        </div>
        <div class="card-body d-flex justify-content-around mx-auto">
            <div class="description">
                <p>Adresse :<?= $customers['addressCustomer'];?></p>
                <p><?= $customers['cpCustomer'];?><?= $customers['cityCustomer'];?></p>
                <p>Tel : <?= $customers['telCustomer'];?> </p>
                <p>Mail : <?= $customers['mail'];?></p>
            </div>
        </div>
        <div class="card-footer text-muted">
            <p class="delete-link text-center">
                <a href="index.php?action=deleteCustomer&amp;id=<?= $customers['id']; ?>">Supprimer ce client</a>
            </p>
        </div>
    </div>
    <?php
        }
    ?>

</section>
<?php $content = ob_get_clean(); ?>
<?php require ('template.php'); ?>
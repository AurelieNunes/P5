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
        foreach($allSellers as $sellers){ 
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
        <div class="card-footer text-muted">
            <p class="delete-link">
                <a href="index.php?action=deleteSeller&amp;id=<?= $sellers['id']; ?>">Supprimer ce vendeur</a>
            </p>
        </div>
    </div>

    <?php
        }
        ?>
</section>
<?php $content = ob_get_clean(); ?>
<?php require ('template.php'); ?>
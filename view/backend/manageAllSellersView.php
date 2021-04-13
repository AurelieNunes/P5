<?php
$title = "Gérer tous les vendeurs"; ?>

<?php ob_start(); ?>

<section id="manageAllSellers">
    <div class="jumbotron">
        <h1 class="text-center">
            <p class="text-center">Gérer les vendeurs</p>
        </h1>
    </div>

    <?php   
        foreach($allSellers as $sellers){ 
            // var_dump($sellers);
            // die();
        ?>

    <div class="card text-center mb-2">
        <div class="card-header h4">
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
<?php $title = "liste des commerçants"; ?>

<?php ob_start(); ?>
<p class="returnLink w-50 mx-auto"><a class="h6 text-primary" href="index.php?action=home">Retour au menu</a></p>
<section id="listingSellers">

    <h1 class="text-center mt-5 mb-5 pt-5 pb-5 bg-primary text-white col-8 mx-auto">Liste des commerçants</h1>

    <ul class="list-group ">
        <?php   
        foreach($allSellers as $sellers)
        { 
            if ($sellers['isAdmin'] != '1'){
        ?>
        <li class="card col-6 mx-auto mb-4">
            <p class="link-seller h2">
                <a class="nav-link h2 text-primary text-center"
                    href="index.php?action=cardSeller&amp;id_seller= <?= $sellers['id']; ?>"><?= $sellers['company']; ?></a>
            </p>
            <div class="infoCard d-flex justify-content-around col-12">
                <div class="img-seller col-6">
                    <img src="<?= $sellers['url_pathShop']; ?>" class="card-img-top" alt="image boutique">
                </div>
                <div class="info-seller col-6 text-center">
                    <p class="h5 text-primary">Où nous trouver ?</p>
                    <p class="h6"><?= $sellers['addressSeller']; ?></p>
                    <p class="h6"><?= $sellers['cpSeller']; ?>
                        <?= $sellers['citySeller']; ?></p>
                    <p class="h6">Tel : <?= $sellers['telSeller']; ?></p>
                    <p class="h5 text-primary">Nous contacter : </p>
                    <p class="h6"><?= $sellers['mail']; ?></p>
                    <p class="link-ReadMore text-center">
                        <a class="nav-link h4"
                            href="index.php?action=cardSeller&amp;id_seller=<?= $sellers['id']; ?>">Voir tous les
                            articles</a>
                    </p>
                </div>
            </div>
        </li>
    </ul>
    <?php 
        }
    }
    ?>
</section>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
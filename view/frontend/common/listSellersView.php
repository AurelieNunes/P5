<?php $title = "liste des commerçants"; ?>

<?php ob_start(); ?>

<section id="listingSellers">

    <h1 class="text-center list-sellers bg-primary text-white mx-auto pb-2 pt-2 pr-2 pl-2">Tous les commerçants</h1>

    <ul class="list-group ">
        <?php   
        foreach($allSellers as $sellers)
        { 
            if ($sellers['isAdmin'] != '1'){
        ?>
        <li class="card mx-auto mb-4">
            <p class="link-seller h2">
                <a class="nav-link h3 orange text-center"
                    href="index.php?action=cardSeller&amp;id_seller= <?= $sellers['id']; ?>"><?= $sellers['company']; ?></a>
            </p>
            <div class="infoCard d-flex justify-content-around">
                <div class="img-seller align-items-center m-auto">
                    <img src="<?= $sellers['url_pathShop']; ?>" class="card-img-top" alt="image boutique">
                </div>
                <div class="info-seller text-center m-auto">
                    <p class="text-primary mb-0">Où nous trouver ?</p>
                    <p class="mb-0"><?= $sellers['addressSeller']; ?></p>
                    <p class="mb-0"><?= $sellers['cpSeller']; ?>
                        <?= $sellers['citySeller']; ?></p>
                    <p class="text-primary mb-0">Nous contacter : </p>
                    <p class="mb-0">Tel : <?= $sellers['telSeller']; ?></p>
                    <p><a class="nav-link"
                            href="mailto:<?= $sellers['mail'];?>?subject=Informations&body=Bonjour,"><?= $sellers['mail']; ?></a>
                    </p>
                    <p class="link-ReadMore text-center">
                        <a class="nav-link pt-0"
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
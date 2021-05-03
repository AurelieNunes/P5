<?php $title = "Catégories"; ?>

<?php ob_start(); ?>
<p class="returnLink w-50 mx-auto"><a class="h6 text-primary" href="index.php?action=home">Retour à l'accueil</a></p>

<section id="categoryList">
    <h1 class="text-center list-categories bg-primary text-white mx-auto">Toutes les catégories</h1>

    <div class="listing mx-auto d-flex flex-wrap justify-content-around align-items-center">
        <?php 
            foreach($categories as $category)
                {
        ?>
        <div class="card mr-2 ml-2 mb-2 text-center">
            <img class="card-img-top mx-auto" src="<?= $category['path_cat']; ?>" alt="<?= $category['url_path']; ?>">
            <div class="card-body">
                <h5 class="card-title text-primary"><?= $category['category_Name']; ?></h5>
                <a href="index.php?action=displayItemsByCategory&amp;category_id=<?= $category['id']; ?>"
                    class="btn btn-primary text-white">Aller voir</a>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('./view/frontend/customer/template.php'); ?>
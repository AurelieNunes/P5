<?php $title = "Articles par catégories"; ?>

<?php ob_start(); ?>
<section class="category text-center col-12 mx-auto">
    <div class="jumbotron">
        <?php 
        foreach($categories as $category)
            {
        ?>
        <div class="card col-3 mr-2 ml-2 mb-2">
            <img class="card-img-top col-10 mx-auto" src="<?= $category['path_cat']; ?>"
                alt="<?= $category['url_path']; ?>">
            <h1 class="display-4"><?= $category['category_Name']; ?></h1>
        <?php
            }
        ?>
            <p class="lead"></p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        </div>

    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('./view/frontend/customer/template.php'); ?>
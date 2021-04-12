<?php $title = "Catégories"; ?>

<?php ob_start(); ?>
<section class="category text-center col-12 mx-auto">
    <div class="listing col-10 mx-auto d-flex flex-wrap align-items-center">

    <?php 
        foreach($categories as $category)
            {
    ?>
        <div class="card col-3 mr-2 ml-2 mb-2">
            <img class="card-img-top col-10 mx-auto" src="<?= $category['path_cat']; ?>" alt="<?= $category['url_path']; ?>">
            <div class="card-body">
                <h5 class="card-title h6"><?= $category['category_Name']; ?></h5>
                <a href="index.php?action=displayItemsByCategory&amp;category_id=<?= $category['id']; ?>" class="btn btn-primary">Aller voir</a>
            </div>
        </div>
    <?php
        }
    ?>

    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('./view/frontend/customer/template.php'); ?>
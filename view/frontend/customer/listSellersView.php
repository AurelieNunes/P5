<?php $title = "liste des commerçants"; ?>

<?php ob_start(); ?>

<section id="listSellers">
    <h1 class="text-center">Liste des commerçants</h1>
    <?php
    foreach($seller as $sellers) 
    {   var_dump($sellers);
        die();
        if (!empty($seller)) {
    ?>
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <p><?= $seller['ref']; ?></p>
                <p><?= $seller['nameItem']; ?></p>
            </li>
        </ul>
    <?php
        } else {
            echo "<p>Pas d'articles !</p>";
        }
    }
    $seller->closeCursor();
    ?>
</section>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
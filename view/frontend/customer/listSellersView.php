<?php $title = "liste des commerçants"; ?>

<?php ob_start(); ?>

<section id="listingSellers">

    <h1 class="text-center mt-5 mb-5 pt-5 pb-5 bg-primary text-white col-8 mx-auto">Liste des commerçants</h1>

    <ul class="list-group ">
        <?php   
        foreach($allSellers as $sellers){ 
            // var_dump($sellers);
            // die();
        ?>
        <li
            class="card d-flex flex-row w-25 mx-auto mb-3 mt-3 list-group-item justify-content-around align-items-center">
            <div class="img-seller w-50">
                <img src="..." class="card-img-top" alt="...">
            </div>
            <div class="info-seller w-50">
                <p><?= $sellers['company']; ?></p>
                <p><?= $sellers['addressSeller']; ?></p>
                <p><?= $sellers['cpSeller']; ?>
                    <?= $sellers['citySeller']; ?></p>
                <p><?= $sellers['telSeller']; ?></p>
            </div>
        </li>
    </ul>
    <?php 
}
?>
</section>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
<?php
$title = "Boutique"; ?>

<?php ob_start(); ?>
<p class="returnLink w-50 mx-auto"><a class="h6 text-primary" href="index.php?action=listSellers">Retour à la liste des commerçants</a></p>
<!-- START THE FEATURETTES -->
<div class="row featurette mx-auto col-6 mb-5">
    <h2 class="text-center h6 col-12 mt-3 featurette-heading ">Bienvenue sur ma boutique</h2>
    <div class="presentation d-flex col-12 align-items-center justify-center mb-4 mt-4">
        
        <p class="lead text-justify col-6"><?= $sellerAllInfo['descriptionShop'];?></p>
        <div class="img-logo col-4">
            <!--img boutique-->
            <img class="img-presentation img-fluid mx-auto" src="<?= $sellerAllInfo['url_pathShop'];?>"/>
        </div>
    </div>
</div>

<!-- SELECTION PRODUCT OF THE WEEK -->
<section class="selectionWeek">
    <h1 class="text-center mt-5 mb-5 pt-5 pb-5 bg-primary text-white col-8 mx-auto">Mes Produits</h1>
    <div class="productWeek row">
        <?php
            foreach ($allItems as $allItem) {
        ?>
        <div class="featurette-product-seller mt-5 text-center mx-auto">
            <div class="img-product-seller mx-auto mt-5">
            <h5 class="title-product mb-4"><?= $allItem['nameItem'];?></h5>
                <img class="img-product1" src="<?= $allItem['url_img'];?>" />
                <div class="product">
                    <p><?= $allItem['ref'];?></p>
                    <p class="description-product h6"><?= $allItem['descriptionItem'];?></p>
                    <p class="price h6"><u>Prix :</u> <?= $allItem['price'];?>€</p>
                    <p class="stock h6 mb-4">En stock :
                        <?= $allItem['stock'];?>
                    </p>
                    <?php
                        if(!empty($allItem['size']))
                        {
                    ?>
                    <p class="size h6 mb-4">Taille : <?= $allItem['size'];?></p>
                    <?php
                        }
                    ?>
                    <button class="btn btn-primary mb-4"><a class="nav-link text-white" href="mailto:<?= $sellerAllInfo['mail'];?>?subject=Informations<?= $allItem['ref'];?>&body=Bonjour,">Contacter le vendeur</a></button> 
                </div>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
</section>
<hr class="featurette-divider mb-5 mt-5">

<!-- CLIENT REVIEWS -->

<section class="reviews">
    <h1 class="text-center mt-5 mb-5 pt-5 pb-5 bg-primary text-white col-8 mx-auto">Avis clients</h1>
    <div class="container col-12">
        <ul class="hash-list cols-12 cols-1-xs pad-30-all align-center text-sm d-flex justify-content-around">
            <li class="col-2">
                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="wpx-100 img-round mgb-20" title=""
                    alt="" data-edit="false" data-editor="field"
                    data-field="src[Image Path]; title[Image Title]; alt[Image Alternate Text]">
                <p class="fs-110 font-cond-l" contenteditable="false">" Sed ut perspiciatis unde omnis iste natus error
                    sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae. "</p>
                <h5 class="font-cond mgb-5 fg-text-d fs-130" contenteditable="false">Martha Stewart</h5>
                <small class="font-cond case-u lts-sm fs-80 fg-text-l" contenteditable="false">Business Woman - New
                    York</small>
            </li>
            <li class="col-2">
                <img src="https://bootdey.com/img/Content/avatar/avatar4.png" class="wpx-100 img-round mgb-20" title=""
                    alt="" data-edit="false" data-editor="field"
                    data-field="src[Image Path]; title[Image Title]; alt[Image Alternate Text]">
                <p class="fs-110 font-cond-l" contenteditable="false">" Sed ut perspiciatis unde omnis iste natus error
                    sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae. "</p>
                <h5 class="font-cond mgb-5 fg-text-d fs-130" contenteditable="false">Ariana Menage</h5>
                <small class="font-cond case-u lts-sm fs-80 fg-text-l" contenteditable="false">Recording Artist - Los
                    Angeles</small>
            </li>
            <li class="col-2">
                <img src="https://bootdey.com/img/Content/avatar/avatar5.png" class="wpx-100 img-round mgb-20" title=""
                    alt="" data-edit="false" data-editor="field"
                    data-field="src[Image Path]; title[Image Title]; alt[Image Alternate Text]">
                <p class="fs-110 font-cond-l" contenteditable="false">" Sed ut perspiciatis unde omnis iste natus error
                    sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae. "</p>
                <h5 class="font-cond mgb-5 fg-text-d fs-130" contenteditable="false">Sean Carter</h5>
                <small class="font-cond case-u lts-sm fs-80 fg-text-l" contenteditable="false">Fund Manager -
                    Chicago</small>
            </li>
        </ul>
    </div>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('./view/frontend/customer/template.php'); ?>
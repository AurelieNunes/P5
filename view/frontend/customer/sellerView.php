<?php

$title = "Boutique"; ?>

<?php ob_start(); ?>

<!-- START THE FEATURETTES -->
<div class="row featurette mx-auto col-6 mb-5">
    <h2 class="text-center h6 col-12 mt-3 featurette-heading ">Bienvenue sur ma boutique</h2>
    <div class="presentation d-flex col-12 align-items-center justify-center">
        <p class="lead text-justify col-6">Lorem ipsum dolor sit amet consectetur adipisicing Dolorum praesentium
            veniam, adipisci accusantium ad distinctio dignissimos dolor</p>
        <div class="img-logo col-4">
            <!--img boutique-->
            <img class="img-presentation img-fluid mx-auto" src="../../../public/img/logo.png" alt="logo web" />
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
        <div class="featurette-product-seller mt-5">
            <div class="img-product-seller mx-auto mt-5">
                <img class="img-product1" src="<?= $allItem['url_img'];?>" />
                <div class="product">
                    <p class="title-product"><?= $allItem['nameItem'];?></p>
                    <p><?= $allItem['ref'];?></p>
                    <p class="description-product">Description : <?= $allItem['descriptionItem'];?></p>
                    <p class="price">Prix : <?= $allItem['price'];?></p>
                    <p class="stock">En stock : <? $allItem['stock'];?></p>
                    <p class="size"><?= $allItem['size'];?></p>
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
          <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="wpx-100 img-round mgb-20" title="" alt="" data-edit="false" data-editor="field" data-field="src[Image Path]; title[Image Title]; alt[Image Alternate Text]">
          <p class="fs-110 font-cond-l" contenteditable="false">" Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae. "</p>
          <h5 class="font-cond mgb-5 fg-text-d fs-130" contenteditable="false">Martha Stewart</h5>
          <small class="font-cond case-u lts-sm fs-80 fg-text-l" contenteditable="false">Business Woman - New York</small>
        </li>
        <li class="col-2">
          <img src="https://bootdey.com/img/Content/avatar/avatar4.png" class="wpx-100 img-round mgb-20" title="" alt="" data-edit="false" data-editor="field" data-field="src[Image Path]; title[Image Title]; alt[Image Alternate Text]">
          <p class="fs-110 font-cond-l" contenteditable="false">" Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae. "</p>
          <h5 class="font-cond mgb-5 fg-text-d fs-130" contenteditable="false">Ariana Menage</h5>
          <small class="font-cond case-u lts-sm fs-80 fg-text-l" contenteditable="false">Recording Artist - Los Angeles</small>
        </li>
        <li class="col-2">
          <img src="https://bootdey.com/img/Content/avatar/avatar5.png" class="wpx-100 img-round mgb-20" title="" alt="" data-edit="false" data-editor="field" data-field="src[Image Path]; title[Image Title]; alt[Image Alternate Text]">
          <p class="fs-110 font-cond-l" contenteditable="false">" Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae. "</p>
          <h5 class="font-cond mgb-5 fg-text-d fs-130" contenteditable="false">Sean Carter</h5>
          <small class="font-cond case-u lts-sm fs-80 fg-text-l" contenteditable="false">Fund Manager - Chicago</small>
        </li>
      </ul>
</div>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('./view/frontend/common/template.php'); ?>
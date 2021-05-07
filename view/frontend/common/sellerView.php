<?php
$title = "Boutique"; ?>

<?php ob_start(); ?>

<section id="cardSeller">
    <!-- START THE FEATURETTES -->
    <div class="featurette-seller-expand-lg mx-auto mb-5 col-10">
        <h2 class="title-welcome text-center bg-primary white m-auto pt-4 pb-4 mb-4">Bienvenue sur ma boutique</h2>
        <div class="presentation-shop-expand-lg justify-center mb-4">
            <div class="img-shop col-12 mb-4">
                <!--img boutique-->
                <img class="img-presentation img-fluid mx-auto col-12" src="<?= $sellerAllInfo['url_pathShop'];?>" />
            </div>
            <p class="lead-description-shop text-center"><?= $sellerAllInfo['descriptionShop'];?></p>

        </div>
    </div>

    <!-- ALL PRODUCT OF THE SELLER -->
    <section class="allProduct">
        <h1 class="text-center mt-5 mb-5 pt-5 pb-5 bg-orange text-white m-auto">Mes Produits</h1>
        <div class="productSeller">
            <?php
            foreach ($allItems as $allItem) {
        ?>
            <article class="featurette-product-seller mt-5 text-center m-auto">
                <h5 class="title-product orange mb-4 mt-4"><?= $allItem['nameItem'];?></h5>
                <div class="img-product-seller mx-auto mt-2 col-10">
                    <img class="img-product1 col-12" src="<?= $allItem['url_img'];?>" />
                </div>
                <div class="product">
                    <p><?= $allItem['ref'];?></p>
                    <p class="description-product pr-2 pl-2"><?= $allItem['descriptionItem'];?></p>
                    <p class="price "><u>Prix :</u> <?= $allItem['price'];?>€</p>
                    <p class="stock mb-4">En stock :
                        <?= $allItem['stock'];?>
                    </p>
                    <?php
                        if(!empty($allItem['size']))
                        {
                    ?>
                    <p class="size mb-4">Taille : <?= $allItem['size'];?></p>
                    <?php
                        }
                    ?>
                    <button class="btn btn-primary mb-4"><a class="nav-link text-white"
                            href="mailto:<?= $sellerAllInfo['mail'];?>?subject=Informations<?= $allItem['ref'];?>&body=Bonjour,">Contacter
                            le vendeur</a></button>
                </div>
            </article>
            <?php
            }
        ?>
        </div>
    </section>

    <!-- CLIENT REVIEWS -->
    <section id="reviews">
        <h1 class="text-center mt-2 mb-2 pt-2 pb-2 bg-orange white col-8 mx-auto">Avis clients</h1>
        <div class="container col-12">
            <ul class="hash-list list-group cols-10 cols-1-xs pad-30-all align-items-center">
                <li class="col-8 mb-4">
                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                        class="wpx-100 img-round mgb-20 col-12" title="" alt="" data-edit="false" data-editor="field"
                        data-field="src[Image Path]; title[Image Title]; alt[Image Alternate Text]">
                    <p class="fs-110 font-cond-l" contenteditable="false">" Sed ut perspiciatis unde omnis iste natus
                        error
                        sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae. "</p>
                    <h5 class="font-cond mgb-5 fg-text-d fs-130" contenteditable="false">Martha Stewart</h5>
                    <small class="font-cond case-u lts-sm fs-80 fg-text-l" contenteditable="false">Business Woman - New
                        York</small>
                </li>
                <li class="col-8 mb-4">
                    <img src="https://bootdey.com/img/Content/avatar/avatar4.png"
                        class="wpx-100 img-round mgb-20 col-12" title="" alt="" data-edit="false" data-editor="field"
                        data-field="src[Image Path]; title[Image Title]; alt[Image Alternate Text]">
                    <p class="fs-110 font-cond-l" contenteditable="false">" Sed ut perspiciatis unde omnis iste natus
                        error
                        sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae. "</p>
                    <h5 class="font-cond mgb-5 fg-text-d fs-130" contenteditable="false">Ariana Menage</h5>
                    <small class="font-cond case-u lts-sm fs-80 fg-text-l" contenteditable="false">Recording Artist -
                        Los
                        Angeles</small>
                </li>
                <li class="col-8 mb-4">
                    <img src="https://bootdey.com/img/Content/avatar/avatar5.png"
                        class="wpx-100 img-round mgb-20 col-12" title="" alt="" data-edit="false" data-editor="field"
                        data-field="src[Image Path]; title[Image Title]; alt[Image Alternate Text]">
                    <p class="fs-110 font-cond-l" contenteditable="false">" Sed ut perspiciatis unde omnis iste natus
                        error
                        sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae. "</p>
                    <h5 class="font-cond mgb-5 fg-text-d fs-130" contenteditable="false">Sean Carter</h5>
                    <small class="font-cond case-u lts-sm fs-80 fg-text-l" contenteditable="false">Fund Manager -
                        Chicago</small>
                </li>
            </ul>
        </div>
    </section>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
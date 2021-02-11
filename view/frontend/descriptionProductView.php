<?php

$title = "Description Produit"; ?>

<?php ob_start(); ?>

<h1 class="h5 text-center mb-5">Description produit</h1>
<div class="featurette-product-seller d-flex w-100">
    <div class="img-product-seller mx-auto mt-5 pl-5 pr-5">
        <img class="img-product1" src="../../public/img/narbonne.jpg" />
    
    <div class="small-img d-flex ">
    <div class="more-img">
        <img class="mini-img" src="../../public/img/logo2.png"/>
    </div>
    <div class="more-img">
        <img class="mini-img" src="../../public/img/logo2.png"/>
    </div>
    <div class="more-img">
        <img class="mini-img" src="../../public/img/logo2.png"/>
    </div>
    </div>
    </div>
        <div class="product mt-5 mr-5 w-50">
            <p class="title-product">Pull manches courtes</p>
            <p class="more-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo dolorum rem quisquam fuga quibusdam deleniti nesciunt</p>
            <p class="price">Prix : 25€</p>
            <p class="link">Vendeur : la Maison du Pull</p>
        </div>
   
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
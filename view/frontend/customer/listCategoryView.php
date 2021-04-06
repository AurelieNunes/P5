<?php $title = "Catégories"; ?>

<?php ob_start(); ?>
<section class="category text-center">
    <div class="listing">
        <ol>
            <li>
                <a href="#"><i class="fas fa-chair mr-2"></i>Ameublement</a>
            </li>
            <li>
                <a href="#"><i class="fas fa-ring mr-2"></i>Bijouterie</a>
            </li>
            <li>
                <a href="#"><i class="fas fa-wine-bottle mr-2"></i>Caviste</a>
            </li>
            <li>
                <a href="#">Cosmétique</a>
            </li>
            <li>
                <a href="#">Décoration</a>
            </li>
            <li>
                <a href="#"><i class="fas fa-utensils mr-2"></i>Epicerie fine</a>
            </li>
            <li>
                <a href="#"><i class="fas fa-book mr-2"></i>Librairie</a>
            </li>
            <li>
                <a href="#"><i class="fas fa-shopping-bag mr-2"></i>Maroquinerie</a>
            </li>
            <li>
                <a href="#">Mercerie</a>
            </li>
            <li>
                <a href="#"><i class="fas fa-gem mr-2"></i>Minéraux</a>
            </li>
            <li>
                <a href="#"><i class="fas fa-tshirt mr-2"></i>Mode</a>
            </li>
            <li>
                <a href="#"><i class="fas fa-baby mr-2"></i>Puériculture</a>
            </li>
            <li>
                <a href="#">Souvenirs</a>
            </li>
        </ol>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('./view/frontend/common/template.php'); ?>
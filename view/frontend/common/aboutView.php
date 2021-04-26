<?php $title = "Qui se cache derrière ce projet ?";?>

<?php ob_start();?>
<p class="returnLink w-50 mx-auto"><a class="h6 text-primary" href="index.php?action=home">Retour au menu</a></p>
<section class="mt-5 mb-5 col-8 mx-auto" id="About">
    <div class="picture mx-auto text-center mb-4 col-6">
        <img class="col-12" src="./public/img/logo.png" alt="Logo ressemblant à une boutique sur laquelle on clique avec la souris de l'ordinateur" />
    </div>
    <div class="pb-4 text-center" id="AboutMe">
        <h3 class="text-primary"><u>Qui suis-je ?</u></h3>
        <p class="h6">Passionnée par le développement web, je souhaite aider les petits commerces du centre ville qui ont beaucoup souffert à cause de la situation actuelle.
        J'avais un projet à réaliser afin d'obtenir mon diplôme de développeur web chez OpenClassroom alors je me suis dis... Pourquoi ne pas joindre l'utile à l'agréable :D
        </p>
    </div>

    <div class="pb-4 text-center" id="MyProjects">
        <h3 class="text-primary"><u>Mes Autres Projets</u></h3>
        <ul class="list-group">
            <li class="list-group-item"><a class="h6" href="http://aurelie-nunes.fr">WebAgency</a></li>
            <li class="list-group-item"><a class="h6" href="http://p2ireki.aurelie-nunes.fr">Office de Toursime d'Ireki</a></li>
            <li class="list-group-item"><a class="h6" href="http://p3-enroueslibres.aurelie-nunes.fr">En Roues LIbres</a></li>
            <li class="list-group-item"><a class="h6" href="http://p4-leblog.aurelie-nunes.fr">Jean Forteroche, le blog !</a></li>
        </ul>
    </div>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
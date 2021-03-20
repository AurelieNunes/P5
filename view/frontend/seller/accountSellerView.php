<?php $title = "Mon compte"; ?>

<?php ob_start(); ?>

<!-- Custom styles for this template -->
<link href="../../../public/css/style.css" rel="stylesheet">

<section class="form-registration-seller">
    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="public/img/logo2.png" alt="logo" width="80" height="80">
            <h2>Détails du compte</h2>
        </div>

        <div class="col-md-7 col-lg-8 mx-auto">
            <h4 class="h5 mb-3">Informations</h4>

            <form action="index.php?action=dashboardSeller&addInfoSeller=success" class="needs-validation" method="POST">
                <div class="row g-3">

                    <h4 class="h6 w-100 mx-auto mt-5 mb-3 text-center">Adresse</h4>

                    <div class="col-12">
                        <label for="address" class="form-label">Adresse</label>
                        <input type="text" class="form-control" id="addressSeller" name="addressSeller">
                    </div>

                    <div class="col-md-4">
                        <label for="cp" class="form-label">Code Postal</label>
                        <input type="text" class="form-control" id="CP" placeholder="CP" name="cp">
                    </div>

                    <div class="col-md-8">
                        <label for="city" class="form-label">Ville</label>
                        <input type="text" class="form-control" id="citySeller" placeholder="Ville" name="citySeller">
                    </div>

                    <div class="col-md-4">
                        <label for="tel" class="form-label">N° de téléphone</label>
                        <input type="text" class="form-control" id="tel" name="telSeller">
                    </div>
                </div>

                <hr class="my-4">

                <h4 class="h6 mb-3 text-center changePassword">Changer mon mot de passe</h4>
                <div class="password mb-5">
                    <label for="inputPassword" class="visually-hidden">Mot de passe</label>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password">
                    <label for="pass_confirm" class="visually-hidden">Confirmez votre mot de passe</label>
                    <input class="form-control" type="password" name="pass_confirm" id="pass_confirm"
                        placeholder="Password"/>
                </div>

                <hr class="my-4">
                

                <button class="w-100 btn btn-primary btn-lg" type="submit">Enregister les modifications</button>
                <div class="deleteAccount">
                    <a href="#">Supprimer mon compte</a>
                </div>
            </form>
        </div>
    </div>
</section>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
<?php $title = "Créer mon compte"; ?>

<?php ob_start(); ?>

<!-- Custom styles for this template -->
<link href="../../public/css/registration-client.css" rel="stylesheet">

<section class ="form-registration-client">
<div class="container">
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="../../public/img/logo.png" alt="" width="72" height="57">
      <h2>Détails du compte</h2>
    </div>

      <div class="col-md-7 col-lg-8 mx-auto">
        <h4 class="h5 mb-3">Informations</h4>
        <form class="needs-validation" novalidate>
          <div class="row g-3">

            <div class="col-sm-6">
              <label for="firstName" class="form-label">Nom</label>
              <input type="text" class="form-control" id="firstName">
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Prénom</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="">
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email </label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com">
            </div>

            <h4 class="h6 w-100 mx-auto mt-5 mb-3 text-center">Adresse de livraison</h4>

            <div class="col-12">
              <label for="address" class="form-label">Adresse</label>
              <input type="text" class="form-control" id="address">
            </div>

            <div class="col-12">
              <label for="address2" class="form-label">Adresse 2<span class="text-muted">(Facultatif)</span></label>
              <input type="text" class="form-control" id="address2">
            </div>

            <div class="col-md-4">
              <label for="cp" class="form-label">Code Postal</label>
              <input type="text" class="form-control" id="CP" placeholder="CP">
            </div>

            <div class="col-md-8">
              <label for="city" class="form-label">Ville</label>
              <input type="text" class="form-control" id="city" placeholder="Ville">
            </div>

            <div class="col-md-4">
              <label for="tel" class="form-label">N° de téléphone</label>
              <input type="text" class="form-control" id="tel">
            </div>
          </div>

          <hr class="my-4">

        
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="same-address">
            <label class="form-check-label" for="same-address">L'adresse de facturation est la même que l'adresse de livraison</label>
            <input type="checkbox" class="form-check-input d-flex" id="no-same-address">
            <label class="form-check-label" for="no-same-address">L'adresse de facturation est différente de l'adresse de livraison</label>
          </div>

          <hr class="my-4">
          <h4 class="h6 w-100 mx-auto mt-5 mb-5 text-center">Adresse de facturation</h4>
          <form class="needs-validation" novalidate>
          <div class="row g-3">

            <div class="col-sm-6">
              <label for="firstName" class="form-label">Nom</label>
              <input type="text" class="form-control" id="firstName" value="">
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Prénom</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="">
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email </label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com">
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Adresse</label>
              <input type="text" class="form-control" id="address">
            </div>

            <div class="col-12">
              <label for="address2" class="form-label">Adresse 2<span class="text-muted">(Facultatif)</span></label>
              <input type="text" class="form-control" id="address2">
            </div>

            <div class="col-md-4">
              <label for="cp" class="form-label">Code Postal</label>
              <input type="text" class="form-control" id="CP" placeholder="CP">
            </div>

            <div class="col-md-8">
              <label for="city" class="form-label">Ville</label>
              <input type="text" class="form-control" id="city" placeholder="Ville">
            </div>

            <div class="col-md-4 mb-5">
              <label for="tel" class="form-label">N° de téléphone</label>
              <input type="text" class="form-control" id="tel">
            </div>
          </div>

          <h4 class="h6 mb-3 text-center changePassword">Changer mon mot de passe</h4>
          <div class="password mb-5">
          <label for="inputPassword" class="visually-hidden">Mot de passe</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <label for="pass_confirm" class="visually-hidden">Confirmez votre mot de passe</label>
        <input class="form-control" type="password" name="pass_confirm" id="pass_confirm" placeholder="Password"
          required />
          </div>
          <h4 class="h6 mb-3 text-center">Mode de paiement préféré</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input">
              <label class="form-check-label" for="credit">CB</label>
            </div>
            <div class="form-check">
              <input id="debit" name="paymentMethod" type="radio" class="form-check-input">
              <label class="form-check-label" for="debit">Espèces</label>
            </div>
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" class="form-check-input">
              <label class="form-check-label" for="paypal">PayPal</label>
            </div>
          </div>

          <div class="row gy-3">
            <div class="col-md-6">
              <label for="cc-name" class="form-label">Nom</label>
              <input type="text" class="form-control" id="cc-name" placeholder="">
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">Numéro de carte</label>
              <input type="text" class="form-control" id="cc-number" placeholder="">
            </div>

            <div class="col-md-3">
              <label for="cc-expiration" class="form-label">Date d'expiration</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="">
            </div>

            <div class="col-md-3">
              <label for="cc-cvv" class="form-label">Cryptogramme visuel</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="">
            </div>
          </div>

          <hr class="my-4">
          <div class="deleteAccount">
            <a href="#">Supprimer mon compte</a>
          </div>

          <button class="w-100 btn btn-primary btn-lg" type="submit">Enregister les modifications</button>
        </form>
      </div>
    </div>
</section>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
<?php $title = "Inscrivez-vous"; ?>

<?php ob_start(); ?>

<?php 
if (isset($_GET['error']) && $_GET['error'] == 'invalidUsername') {
	echo '<p id="error" class="alert alert-dismissible alert-danger text-center col-6 m-auto h6 mb-4">Nom déjà utilisé</p>';
}

if (isset($_GET['error']) && $_GET['error'] == 'invalidMail') {
	echo '<p id="error" class="alert alert-dismissible alert-danger text-center col-6 mx-auto h6 mb-4">Adresse email déjà utilisée</p>';
}
?>

<section id="subscribeFrame" class="mx-auto">

  <div class="mx-auto mb-4">
    <p class="text-center mx-auto mb-0">
      <img class="col-4" src="public/img/logo2.png" alt="logo site"></p>
    <h1 class="h4 mb-3 fw-normal text-center text-white bg-primary mx-auto pt-2 pb-2">Inscription</h1>
  </div>

  <div class="subscribes-expand-lg mx-auto text-center">

    <div id="subscribeForms" class="text-center">

      <div id="subscribe-Seller" class="mx-auto">
        <h1 class="h5 text-center text-primary">Vous êtes un professionnel ? </h1>
        <form class="subscribe-formSeller d-flex flex-column col-8 m-auto" action="index.php?action=addSeller"
          method="POST">
          <label for="companySeller" class="visually-hidden">Nom de la société</label>
          <input type="text" id="companySeller" class="form-controlSeller" placeholder="Nom de la société"
            name="companySeller" required autofocus>
          <label for="inputEmailSeller" class="visually-hidden mt-2">Adresse email</label>
          <input type="email" id="mailSeller" class="form-controlSeller" placeholder="Email" name="mailSeller" required
            autofocus>
          <label for="inputPasswordSeller" class="visually-hidden mt-2">Mot de passe</label>
          <input type="password" id="inputPasswordSeller" class="form-controlSeller" placeholder="Mot de passe"
            name="passSeller" required>
          <label for="pass_confirm" class="visually-hidden mt-2">Confirmez votre mot de passe</label>
          <input class="form-controlSeller" type="password" name="pass_confirmSeller" id="pass_confirmSeller"
            placeholder="Mot de Passe" name="pass_confirmSeller" required />
          <label for="siret" class="visually-hidden mt-2">N° de Siret</label>
          <input class="form-controlSeller mb-4" type="siret" name="siret" id="siret" placeholder="00000000000000"
            name="siret" required />
          <button class="btn btn-lg btn-primary m-auto text-center d-flex justify-content-center text-white"
            type="submit" value="S'inscrire">S'inscrire </button>
        </form>
      </div>


      <div id="subscribe-customer" class="mx-auto text-center mt-4">
        <h1 class="h5 text-primary">Vous êtes un particulier ?</h1>
        <form class="subscribe-formCustomer d-flex flex-column col-8 m-auto" action="index.php?action=addCustomer"
          method="POST">

          <label for="lastName" class="visually-hidden">Nom</label>
          <input type="text" id="lastName" class="form-controlCustomer" placeholder="Nom" name="lastName" required
            autofocus>

          <label for="firstName" class="visually-hidden mt-2">Prénom</label>
          <input type="text" id="firstName" class="form-controlCustomer" placeholder="Prénom" name="firstName" required
            autofocus>

          <label for="mailCustomer" class="visually-hidden mt-2">Adresse email</label>
          <input type="email" id="mailCustomer" class="form-controlCustomer" placeholder="Email" name="mailCustomer"
            required>
          <label for="passCustomer" class="visually-hidden mt-2">Mot de passe</label>
          <input type="password" id="passCustomer" class="form-controlCustomer" placeholder="Mot de passe"
            name="passCustomer" required>
          <label for="pass_confirmCustomer" class="visually-hidden mt-2">Confirmez votre mot de passe</label>
          <input class="pass_confirmCustomer mb-4" type="password" name="pass_confirmCustomer" id="pass_confirmCustomer"
            placeholder="Confirmer mot de passe" name="pass_confirmCustomer" required />
          <button class="btn btn-lg btn-primary m-auto text-center d-flex justify-content-center text-white"
            type="submit" value="S'inscrire">S'inscrire </button>
        </form>
      </div>
    </div>
    <div class="submit text-center mt-4">
      <a class="text-center text-primary h6" href="index.php?action=loginCustomer">Se connecter</a>
    </div>
  </div>
  <p class="mt-2 mb-3 text-muted text-center">&copy; 2021-2025</p>
</section>



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
<?php $title = "Inscrivez-vous"; ?>

<?php ob_start(); ?>
<link rel="stylesheet" href="../../public/css/style.css" />

<!-- <script src="https://www.google.com/recaptcha/api.js"></script> -->


<section id="subscribeFrame" class="col-6 mx-auto">
  <?php 
if (isset($_GET['error']) && $_GET['error'] == 'invalidUsername') {
	echo '<p id="error" class="alert alert-dismissible alert-danger text-center mx-auto">Nom déjà utilisé</p>';
}

if (isset($_GET['error']) && $_GET['error'] == 'invalidMail') {
	echo '<p id="error" class="alert alert-dismissible alert-danger text-center mx-auto">Adresse email déjà utilisée</p>';
}

// if (isset($_GET['error']) && $_GET['error'] == 'google-recaptcha') {
// 	echo '<p id="error" class="alert alert-dismissible alert-danger text-center mx-auto">Vous devez cocher la case du captcha.</p>';
// }

?>
  <div class="col-6 mx-auto">
    <p class="text-center col-6 mx-auto">
      <img class="col-10" src="public/img/logo2.png" alt="logo site"></p>
    <h1 class="h4 mb-3 fw-normal text-center">Inscription</h1>
  </div>
  <div class="subscribes col-12 mx-auto">

    <div id="subscribeForms" class="d-flex col-12 justify-content-around">

      <div id="subscribe-Seller" class="mx-auto">
        <h1 class="h5">Vous êtes un professionnel ? </h1>
        <form class="subscribe-formSeller mx-auto d-flex flex-column col-12 align-items-center"
          action="index.php?action=addSeller" method="POST">
          <label for="companySeller" class="visually-hidden">Nom de la société</label>
          <input type="text" id="companySeller" class="form-controlSeller col-8" placeholder="Nom de la société"
            name="companySeller" required autofocus>
          <label for="inputEmailSeller" class="visually-hidden">Adresse email</label>
          <input type="email" id="mailSeller" class="form-controlSeller col-8" placeholder="Email" name="mailSeller"
            required autofocus>
          <label for="inputPasswordSeller" class="visually-hidden">Mot de passe</label>
          <input type="password" id="inputPasswordSeller" class="form-controlSeller col-8" placeholder="Mot de passe"
            name="passSeller" required>
          <label for="pass_confirm" class="visually-hidden">Confirmez votre mot de passe</label>
          <input class="form-controlSeller col-8" type="password" name="pass_confirmSeller" id="pass_confirmSeller"
            placeholder="Mot de Passe" name="pass_confirmSeller" required />
          <label for="siret" class="visually-hidden">N° de Siret</label>
          <input class="form-controlSeller col-8 mb-3" type="siret" name="siret" id="siret" placeholder="00000000000000"
            name="siret" required />
          <button class="w-50 btn btn-lg btn-primary mx-auto text-center d-flex justify-content-center" type="submit"
            value="S'inscrire">S'inscrire </button>
        </form>
      </div>


      <div id="subscribe-customer" class="mx-auto">
        <h1 class="h5">Vous êtes un particulier ?</h1>
        <form class="subscribe-formCustomer mx-auto d-flex flex-column align-items-center col-12"
          action="index.php?action=addCustomer" method="POST">
         
          <label for="lastName" class="visually-hidden">Nom</label>
          <input type="text" id="lastName" class="form-controlCustomer col-8" placeholder="Nom"
            name="lastName" required autofocus>
          
          <label for="firstName" class="visually-hidden">Prénom</label>
          <input type="text" id="firstName" class="form-controlCustomer col-8" placeholder="Prénom"
            name="firstName" required autofocus>

          <label for="mailCustomer" class="visually-hidden">Adresse email</label>
          <input type="email" id="mailCustomer" class="form-controlCustomer col-8" placeholder="Email"
            name="mailCustomer" required>
          <label for="passCustomer" class="visually-hidden">Mot de passe</label>
          <input type="password" id="passCustomer" class="form-controlCustomer col-8" placeholder="Mot de passe"
            name="passCustomer" required>
          <label for="pass_confirmCustomer" class="visually-hidden">Confirmez votre mot de passe</label>
          <input class="pass_confirmCustomer col-8 mb-3" type="password" name="pass_confirmCustomer"
            id="pass_confirmCustomer" placeholder="Confirmer mot de passe" name="pass_confirmCustomer" required />
          <button class="w-50 btn btn-lg btn-primary mx-auto text-center d-flex justify-content-center" type="submit"
            value="S'inscrire">S'inscrire </button>
        </form>
      </div>
    </div>
    <div class="submit text-center">
      <div class="checkbox mb-3 text-center">
        <label>
          <input type="checkbox" value="remember-me"> Se souvenir de moi
        </label>
      </div>
      <a class="text-center text-primary h6" href="index.php?action=subscribeCustomer">Pas encore inscrit ? C'est
        ici</a>
    </div>
  </div>
  <p class="mt-5 mb-3 text-muted text-center">&copy; 2021-2025</p>
</section>



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
<!-- <script>
  function onSubmit(token) {
    document.getElementById("form").submit();
  }
</script> -->
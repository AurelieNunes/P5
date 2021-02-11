<?php $title = "Inscrivez-vous"; ?>

<?php ob_start(); ?>
<link rel="stylesheet" href="../../public/css/style.css">

<!-- <script src="https://www.google.com/recaptcha/api.js"></script> -->


<section id="subscribeFrame">
  <?php 
if (isset($_GET['error']) && $_GET['error'] == 'invalidUsername') {
	echo '<p id="error" class="alert alert-dismissible alert-danger text-center mx-auto">Pseudo déjà utilisé</p>';
}

if (isset($_GET['error']) && $_GET['error'] == 'invalidMail') {
	echo '<p id="error" class="alert alert-dismissible alert-danger text-center mx-auto">Adresse email déjà utilisée</p>';
}

// if (isset($_GET['error']) && $_GET['error'] == 'google-recaptcha') {
// 	echo '<p id="error" class="alert alert-dismissible alert-danger text-center mx-auto">Vous devez cocher la case du captcha.</p>';
// }

?>
  <div>
    <h1 class="h4 mb-3 fw-normal text-center">Inscription</h1>
    <p class="text-center">
      <img class="mb-4" src="../../public/img/logo2.png" alt="logo site" width="72" height="57"></p>
  </div>
<!-- <div class="subscribes">
  <div id="subscribeForms">
    <div id="subscribe-Seller">
      <h1 class="h5">Vous êtes un professionnel ? </h1>
      <form class="subscribe-formSeller mx-auto" action="index.php?action=addSeller">
        <label for="inputEmailSeller" class="visually-hidden">Adresse email</label>
        <input type="email" id="inputEmailSeller" class="form-controlSeller" placeholder="Email" name="mailSeller" required autofocus>
        <label for="inputPasswordSeller" class="visually-hidden">Mot de passe</label>
        <input type="password" id="inputPasswordSeller" class="form-controlSeller" placeholder="Mot de passe" name="passwordSeller" required>
        <label for="pass_confirm" class="visually-hidden">Confirmez votre mot de passe</label>
        <input class="form-controlSeller" type="password" name="pass_confirmSeller" id="pass_confirmSeller" placeholder="Mot de Passe" name="pass_confirmSeller"
          required />
        <label for="siret" class="visually-hidden">N° de Siret</label>
        <input class="form-controlSeller" type="siret" name="siret" id="siret" placeholder="00000000000000" name="siret" required />
      </form>
    </div> -->


    <div id="subscribe-customer">
      <h1 class="h5">Vous êtes un particulier ?</h1>
      <form class="subscribe-formCustomer mx-auto" action="index.php?action=addCustomer" method="post">
        <label for="pseudoCustomer" class="visually-hidden">Pseudo</label>
        <input type="text" id="pseudoCustomer" class="form-controlCustomer" placeholder="Pseudo" name="pseudoCustomer" required autofocus>
        <label for="mailCustomer" class="visually-hidden">Adresse email</label>
        <input type="email" id="mailCustomer" class="form-controlCustomer" placeholder="Email" name="mailCustomer" required>
        <label for="passCustomer" class="visually-hidden">Mot de passe</label>
        <input type="password" id="passCustomer" class="form-controlCustomer" placeholder="Mot de passe" name="passCustomer" required>
        <label for="pass_confirmCustomer" class="visually-hidden">Confirmez votre mot de passe</label>
        <input class="pass_confirmCustomer" type="password" name="pass_confirmCustomer" id="pass_confirmCustomer" placeholder="Confirmer mot de passe" name="pass_confirmCustomer"
          required />
      </form>
    </div>
  </div>
  <div class="checkbox mb-3 text-center">
      <label>
        <input type="checkbox" value="remember-me"> Se souvenir de moi
      </label>
    </div>
	  <input type="submit" value="S'inscrire" />
  <p class="mt-5 mb-3 text-muted text-center">&copy; 2021-2025</p>
<!-- </div> -->
</section>



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
<!-- <script>
  function onSubmit(token) {
    document.getElementById("form").submit();
  }
</script> -->
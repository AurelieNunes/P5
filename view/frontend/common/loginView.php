<?php $title = "Connexion"; ?>
<?php ob_start(); ?>
<link rel="stylesheet" href="/public/css/style.css" />
<?php
if (isset($_GET['account-status']) && $_GET['account-status'] == 'unsuccess-login') {
	echo '<p id="error" class="alert alert-dismissible alert-danger text-center col-6 m-auto h6">Mauvais identifiant ou mot de passe !<p>';
} ?>

<section class="form-signin col-6 mx-auto">


  <div class="col-6 mx-auto mb-4">
    <p class="text-center col-6 mx-auto mb-0">
      <img class="col-10" src="public/img/logo2.png" alt="logo site"></p>
    <h1 class="h4 mb-3 fw-normal text-center text-white bg-primary col-6 mx-auto pt-2 pb-2">Connexion</h1>
  </div>

  <div class="login-submit col-12 mx-auto">
    <div id="loginForms" class="d-flex col-12 justify-content-around">
      <div id="login-Seller" class="mx-auto">
        <h1 class="h5 text-center">Professionnel </h1>
        <form action="index.php?action=loginSubmitSeller" class="d-flex flex-column col-12 mx-auto" method="POST">
          <label for="mailSubmit" class="visually-hidden h6">Mail</label>
          <input type="text" id="mailSubmitSeller" class="form-control mb-4" name="mailSubmitSeller" placeholder="Email"
            required autofocus>
          <label for="passSubmitSeller" class="visually-hidden h6">Mot de passe</label>
          <input type="password" id="passSubmitSeller" class="form-control" placeholder="Password"
            name="passSubmitSeller" required>
          <button class="col-12 mx-auto test-center d-flex justify-content-center btn btn-lg btn-primary text-white"
            type="submit">Se connecter</button>
        </form>
      </div>

      <!-- <div class="login-submit"> -->
      <div id="loginForms" class="mx-auto">
        <h1 class="h5 text-center">Particulier</h1>
        <form action="index.php?action=loginSubmitCustomer" class="d-flex flex-column col-12 mx-auto" method="POST">
          <label for="mailSubmit" class="visually-hidden h6">Mail</label>
          <input type="text" id="mailSubmitCustomer" class="form-control mb-4" name="mailSubmitCustomer" placeholder="Email"
            required autofocus>
          <label for="inputPassword" class="visually-hidden h6">Mot de passe</label>
          <input type="password" id="passSubmitCustomer" class="form-control" placeholder="Mot de Passe"
            name="passSubmitCustomer" required>
          <button class="col-12 mx-auto btn btn-lg btn-primary text-center d-flex justify-content-center text-white"
            type="submit">Se connecter</button>
        </form>
      </div>
    </div>

    <div class="submit text-center mt-4">
      <a class="text-center text-primary h6" href="index.php?action=subscribeCustomer">Pas encore inscrit ? C'est
        ici</a>
    </div>
  </div>

  <p class="mt-2 mb-3 text-muted text-center">&copy; 2021-2025</p>
</section>



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
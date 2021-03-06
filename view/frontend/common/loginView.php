<?php $title = "Connexion"; ?>
<?php ob_start(); ?>

<section class="form-signin-expand-lg mx-auto">
  <?php
  if (isset($_GET['account-status']) && $_GET['account-status'] == 'unsuccess-login') {
    echo '<p id="error" class="alert alert-dismissible alert-danger text-center col-12 m-auto h6">Mauvais identifiant ou mot de passe !<p>';
  }

  if (isset($_GET['success']) && $_GET['success'] == 'account-successfully-created') {
    echo '<p id="success" class="alert alert-dismissible alert-success text-center col-12 mx-auto h6 mb-4">Votre compte a bien été créé, veuillez vous connecter !</p>';
  } ?>

  <div class="login-submit mx-auto text-center">
    <div class="mx-auto mb-4">
      <p class="text-center mx-auto mb-0">
        <img class="col-4" src="public/img/logo2.png" alt="logo site">
      </p>
      <h1 class="h4 mb-3 fw-normal text-center text-white bg-primary mx-auto pt-2 pb-2">Connexion</h1>
    </div>
    <div id="loginForms" class="mx-auto text-center">
      <div id="login-Seller" class="mx-auto">
        <h1 class="h5 text-center orange">Professionnel </h1>
        <form action="index.php?action=loginSubmitSeller" class="d-flex flex-column col-8 m-auto" method="POST">
          <label for="mailSubmitSeller" class="visually-hidden">Mail</label>
          <input type="text" id="mailSubmitSeller" class="mb-2 form-control" name="mailSubmitSeller" placeholder="Email" required>
          <label for="passSubmitSeller" class="visually-hidden">Mot de passe</label>
          <input type="password" id="passSubmitSeller" class="form-control" placeholder="Password" name="passSubmitSeller" required>
          <button class="mt-4 m-auto test-center d-flex justify-content-center btn btn-lg btn-primary text-white" type="submit">Se connecter</button>
        </form>
      </div>

      <div id="loginCustomer" class="mx-auto text-center mt-4">
        <h1 class="h5 text-center orange">Particulier</h1>
        <form action="index.php?action=loginSubmitCustomer" class="d-flex flex-column col-8 mx-auto" method="POST">
          <label for="mailSubmitCustomer" class="visually-hidden">Mail</label>
          <input type="text" id="mailSubmitCustomer" class="form-control mb-2" name="mailSubmitCustomer" placeholder="Email" required>
          <label for="passSubmitCustomer" class="visually-hidden">Mot de passe</label>
          <input type="password" id="passSubmitCustomer" class="form-control" placeholder="Mot de Passe" name="passSubmitCustomer" required>
          <button class="mt-4 m-auto btn btn-lg btn-primary text-center d-flex justify-content-center text-white" type="submit">Se connecter</button>
        </form>
      </div>
    </div>

    <div class="submit text-center mt-4">
      <a class="text-center text-primary h6" href="index.php?action=subscribeCustomer">Pas encore inscrit ? C'est ici</a>
    </div>
  </div>

  <p class="mt-2 mb-3 text-muted text-center m-auto">&copy; 2021-2025</p>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
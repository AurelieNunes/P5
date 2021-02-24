<?php $title = "Connexion"; ?>
<?php ob_start(); ?>
<link rel="stylesheet" href="/public/css/style.css" />


<section class="form-signin col-6 mx-auto">
  <?php
if (isset($_GET['account-status']) && $_GET['account-status'] == 'unsuccess-login') {
	echo '<p id="error" class="alert alert-dismissible alert-danger text-center">Mauvais identifiant ou mot de passe !<p>';
} ?>

  <div class="col-6 mx-auto">
    <p class="text-center col-6 mx-auto">
      <img class="col-10" src="public/img/logo2.png" alt="logo site"></p>
    <h1 class="h4 mb-3 fw-normal text-center">Connexion</h1>
  </div>

  <div class="login-submit col-12 mx-auto">
    <div id="loginForms" class="d-flex col-12 justify-content-around">
      <div id="login-Seller" class="mx-auto">
        <h1 class="h5 text-center">Professionnel </h1>
        <form action="index.php?action=loginSubmitSeller" class="d-flex flex-column col-12 mx-auto" method="POST">
          <label for="mailSubmit" class="visually-hidden">Mail</label>
          <input type="text" id="mailSubmitSeller" class="form-control" name="mailSubmitSeller"
            placeholder="Email" required autofocus>
          <label for="passSubmitSeller" class="visually-hidden">Mot de passe</label>
          <input type="password" id="passSubmitSeller" class="form-control" placeholder="Password"
            name="passSubmitSeller" required>
          <a class="forgetPass text-center mb-3" href="#">J'ai oublié mon mot de passe</a>
          <button class="col-12 mx-auto test-center d-flex justify-content-center btn btn-lg btn-primary " type="submit">Se connecter</button>
        </form>
      </div>

      <!-- <div class="login-submit"> -->
        <div id="loginForms" class="mx-auto">
          <h1 class="h5 text-center">Particulier</h1>
          <form action="index.php?action=loginSubmitCustomer"
            class="d-flex flex-column col-12 mx-auto" method="POST">
            <label for="mailSubmit" class="visually-hidden">Mail</label>
          <input type="text" id="mailSubmitCustomer" class="form-control" name="mailSubmitCustomer"
            placeholder="Email" required autofocus>
            <label for="inputPassword" class="visually-hidden">Mot de passe</label>
            <input type="password" id="passSubmitCustomer" class="form-control" placeholder="Mot de Passe"
              name="passSubmitCustomer" required>
            <a class="forgetPass text-center mb-3" href="#">J'ai oublié mon mot de passe</a>
            <button class="col-12 mx-auto btn btn-lg btn-primary text-center d-flex justify-content-center" type="submit">Se connecter</button>
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
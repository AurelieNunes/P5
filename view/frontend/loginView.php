<?php $title = "Connexion"; ?>

<?php ob_start(); ?>

<section class="form-signin ">
<?php
if (isset($_GET['account-status']) &&  $_GET['account-status'] == 'unsuccess-login') {
	
	echo '<p id="error" class="alert alert-dismissible alert-danger text-center">Mauvais identifiant ou mot de passe !<p>';
} ?>

  <div>
    <h1 class="h4 mb-3 fw-normal text-center">Connexion</h1>
    <p class="text-center">
      <img class="mb-4" src="public/img/logo2.png" alt="logo site" width="72" height="57"></p>
  </div>

  <div id="loginForms">
    
    <div id="login-pro">
      <h1 class="h5">Vous êtes un professionnel ? </h1>
      <form action="index.php?action=loginSubmitSeller" class="subscribe-form mx-auto">
        <label for="inputEmail" class="visually-hidden">Adresse email</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="visually-hidden">Mot de passe</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Se souvenir de moi
          </label>
        </div>
        <a class="forgetPass" href="#">J'ai oublié mon mot de passe</a>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Se connecter</button>
      </form>
    </div>


    <div id="login-personnel">
      <h1 class="h5">Vous êtes un particulier ?</h1>
      <form action="index.php?action=loginSubmitCustomer" class="subscribe-form mx-auto">
        <label for="inputEmail" class="visually-hidden">Adresse email</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="visually-hidden">Mot de passe</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Se souvenir de moi
          </label>
        </div>
        <a class="forgetPass" href="#">J'ai oublié mon mot de passe</a>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Se connecter</button>
        
      </form>
    </div>
  </div>
  <a href="index.php?action=subscribe">Pas encore inscrit? C'est ici</a>
  <p class="mt-5 mb-3 text-muted text-center">&copy; 2021-2025</p>
</section>



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
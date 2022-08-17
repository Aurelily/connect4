<?php $title="S'enregistrer" ?>
<?php require_once('Model/User.php');?>
<?php require_once('Controller/userController.php');?>



<?php ob_start(); ?>
<main>
          <!-- Particules animées en fond -->
          <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <div id="spirit1"></div>
<div id="spirit2"></div>

    <div>
        <form class="formRegister glassEffect" action="" method="POST">
        
        <label for="login">Pseudo :</label>
        <input type="text" name="login" placeholder="Pseudo"/>
        <label for="password1">Mot de passe :</label>
        <input id="password" type="password" name="password1" placeholder="Mot de passe" onkeyup="checkPassSecurity(event)" />
        <div id="securityPass">
            <p>Doit contenir 8 caractères minimum</p>
            <p>Doit contenir au moins 1 majuscule</p>
            <p>Doit contenir au moins 1 minuscule</p>
            <p>Doit contenir au moins 1 nombre</p>
            <p>Doit contenir au moins 1 caractère spécial</p>
        </div>

        <label for="password2">Confirmation:</label>
        <input type="password" name="password2" placeholder="Confirmation mot de passe"/>
        <button class="glassEffect" type="submit" name="submit_register">S'enregistrer</button>
        <!-- Affichage des erreurs -->
        <?php 
            if (isset($_SESSION['errors']) && count($_SESSION['errors']) > 0) : ?>
                <div>
                    <?php foreach ($_SESSION['errors'] as $error) : ?>
                        <h5 class="text-error"><?= $error ?></h5>
                    <?php endforeach ?>
                </div>
            <?php  endif; ?>
        </form>

        <section class="stage">
        <img src="./Media/titre.png">
        <figure class="ball bubble"></figure>
        </section>
    </div>
</main>
<!-- FONCTION QUI TESTE EN LIVE LE MOT DE PASSE DU USER QUI S'ENREGISTRE
----------------------------------------------------------- -->
<script>function checkPassSecurity(event) {
    //Je cible le champ password de la page d'inscription
    const inputPassword = document.getElementById("password");
    //je cible les conditions de sécurités du mot de passe
    const arraySecu = document.querySelectorAll("#securityPass > p");

    let regexIsDigit = /[0-9]/; // Au moins un nombre digit
    let regexIsUpper = /[A-Z]/; // Au moins une majuscule
    let regexIsLower = /[a-z]/; // Au moins une minuscule
    let regexIsSpecial = /[!@#$%^&*-]/; /// Au moins un caractère special

    if (inputPassword.value.length >= 8) {
      arraySecu[0].setAttribute("class", "matchColor");
    }else{
        arraySecu[0].removeAttribute("class", "matchColor");
    }
    if (inputPassword.value.match(regexIsUpper)) {
      arraySecu[1].setAttribute("class", "matchColor");

    }else{
        arraySecu[1].removeAttribute("class", "matchColor");
    }
    if (inputPassword.value.match(regexIsLower)) {
      arraySecu[2].setAttribute("class", "matchColor");

    }else{
        arraySecu[2].removeAttribute("class", "matchColor");
    }
    if (inputPassword.value.match(regexIsDigit)) {
      arraySecu[3].setAttribute("class", "matchColor");

    }else{
        arraySecu[3].removeAttribute("class", "matchColor");
    }
    if (inputPassword.value.match(regexIsSpecial)) {
      arraySecu[4].setAttribute("class", "matchColor");

    }else{
        arraySecu[4].removeAttribute("class", "matchColor");
    }}</script>



<?php $content = ob_get_clean(); ?>

<?php require_once ('View/layout.php')?>
<?php $title="Connexion" ?>
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
        <form class="forms login" action="" method="POST">
            <label for="login">Pseudo :</label>
            <input type="text" name="login" placeholder="Pseudo"/>
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" placeholder="Mot de passe"/>
            <button class="glassEffect" type="submit" name="submit_connect">Se connecter</button>
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
<?php $content = ob_get_clean(); ?>

<?php require_once ('View/layout.php')?>
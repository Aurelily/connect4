<?php $title="register" ?>
<?php session_start(); ?>
<?php require_once('Model/User.php');?>
<?php require_once('Controller/userController.php');?>
<?php require_once('Model/Game.php');?>
<?php require_once('Controller/gameController.php');?>



<?php ob_start(); ?>
<div class="home">
<form class="forms createGame" method="POST" action="">
    <label for="game_name">Nom de la partie :</label>
    <input type="text" name="game_name" placeholder="Nom de la partie"/>
    <button type="submit" name="submit_game" >Créer une partie</button>
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
    <figure class="ball bubble"></figure>
</section>
</div>



<?php $content = ob_get_clean(); ?>

<?php require_once ('View/layout.php')?>
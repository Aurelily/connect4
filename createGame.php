<?php $title="register" ?>
<?php session_start(); ?>
<?php require_once('Model/User.php');?>
<?php require_once('Controller/userController.php');?>
<?php require_once('Model/Game.php');?>
<?php require_once('Controller/gameController.php');?>



<?php ob_start(); ?>
<?php var_dump($_SESSION); ?>
<form method="POST">
    <input type="text" name="game_name" placeholder="Nom de la partie"/>
    <button type="submit" name="submit_game" >Créer une partie</button>
</form>

<?php $content = ob_get_clean(); ?>

<?php require_once ('View/layout.php')?>
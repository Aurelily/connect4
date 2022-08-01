<?php $title="login" ?>
<?php require_once('Model/User.php');?>
<?php require_once('Controller/userController.php');?>



<?php ob_start(); ?>

<form action="" method="POST">
    <label for="login">Pseudo :</label>
    <input type="text" name="login" placeholder="Pseudo"/>
    <label for="password">Mot de passe :</label>
    <input type="password" name="password" placeholder="Mot de passe"/>
    <button type="submit" name="submit_connect">Se connecter</button>

</form>

<?php $content = ob_get_clean(); ?>

<?php require_once ('View/layout.php')?>
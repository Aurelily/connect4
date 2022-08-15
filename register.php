<?php $title="register" ?>
<?php require_once('Model/User.php');?>
<?php require_once('Controller/userController.php');?>



<?php ob_start(); ?>

<div class="home">
<form action="" method="POST">
    <label for="login">Pseudo :</label>
    <input type="text" name="login" placeholder="Pseudo"/>
    <label for="password1">Mot de passe :</label>
    <input type="password" name="password1" placeholder="Mot de passe"/>
    <label for="password2">Confirmez votre mot de passe :</label>
    <input type="password" name="password2" placeholder="Confirmation mot de passe"/>
    <button type="submit" name="submit_register">S'enregistrer</button>
</form>

    <section class="stage">
      <figure class="ball bubble"></figure>
    </section>
</div>




<?php $content = ob_get_clean(); ?>

<?php require_once ('View/layout.php')?>
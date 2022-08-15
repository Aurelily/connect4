<?php $title="Welcome" ?>
<?php session_start(); ?>
<?php require_once('Model/User.php');?>
<?php require_once('Controller/userController.php');?>
<?php require_once('Model/Game.php');?>
<?php require_once('Controller/gameController.php');?>



<?php ob_start();?>

<main>

<div class="home">
<a class="connectButton" href="./login.php">Veuillez vous connecter pour jouer !</a> 
    <section class="stage">
      <figure class="ball bubble"></figure>
      <a  href="./register.php">Si vous n'avez pas de compte,</br> enregistrez vous ici.</a> 
    </section>
</div>


</main>

<?php $content = ob_get_clean(); ?>


<?php require_once ('View/layout.php')?>
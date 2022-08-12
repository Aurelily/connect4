<?php $title="Welcome" ?>
<?php session_start(); ?>
<?php require_once('Model/User.php');?>
<?php require_once('Controller/userController.php');?>
<?php require_once('Model/Game.php');?>
<?php require_once('Controller/gameController.php');?>



<?php ob_start();?>

<main>
    <div>
    <?php var_dump($_SESSION);?>
    </div>
</main>

<?php $content = ob_get_clean(); ?>


<?php require_once ('View/layout.php')?>
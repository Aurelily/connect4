<?php $title="Welcome" ?>
<?php session_start(); ?>
<?php require_once('Model/User.php');?>
<?php require_once('Controller/userController.php');?>
<?php require_once('Model/Game.php');?>
<?php require_once('Controller/gameController.php');?>



<?php ob_start(); var_dump($_SESSION);?>

<main>
    <div>
        <img src="Media/bear.gif" id="myImg" alt="J'ai disparu !">
    </div>
</main>

<?php $content = ob_get_clean(); ?>


<?php require_once ('View/layout.php')?>
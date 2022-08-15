<?php $title="Welcome" ?>
<?php session_start(); ?>
<?php require_once('Model/User.php');?>
<?php require_once('Controller/userController.php');?>
<?php require_once('Model/Game.php');?>
<?php require_once('Controller/gameController.php');?>





<?php ob_start();?>

<main>
    <div>

    <form method="POST">
        <input type="text" name="game_name" placeholder="Nom de la partie"/>
        <button type="submit" name="submit_game" >Créer une nouvelle partie</button>
    </form> 

        
    <h1>Recap parties jouées :</h1>
    <?php
    $games = Game::getGames();
    echo('<pre>');
    var_dump($games);
    echo('<pre/>');
    ?>
    </div>
    <hr>
    <div>
    <h1>Classement :</h1>
    <?php
    $users = User::getAllUsers();
    echo('<pre>');
    var_dump($users);
    echo('<pre/>');
    ?>
    </div>



</main>

<?php $content = ob_get_clean(); ?>


<?php require_once ('View/layout.php')?>
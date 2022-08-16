<?php $title="Welcome" ?>
<?php session_start(); ?>
<?php require_once('Model/User.php');?>
<?php require_once('Controller/userController.php');?>
<?php require_once('Model/Game.php');?>
<?php require_once('Controller/gameController.php');?>





<?php ob_start();?>

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
    <div class="formContainer">

    <form class="formClassement" action ="" method="POST">
        <label for="game_name">Nom de la partie :</label>
        <input type="text" name="game_name" placeholder="Nom de la partie"/>
        <button type="submit" name="submit_game" >Créer une nouvelle partie</button>
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

    </div>
    <div class="statContainer">
         <div class="winnersStats">
             <h2>Classement :</h2>
             <table class="tableStat">
                <thead>
                    <tr>
                        <th>Pseudo</th>
                        <th>Parties gagnées</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $users = User::getAllUsers();
                    foreach($users as $user){
                        echo ('<tr><td>'.$user['login'].'</td><td>'.$user['win_games'].'</td></tr>');
                    }
                    ?>
                </tbody>
             </table>
        
       </div>
        <div class="recapStats">
            <h2>Dernières parties jouées :</h2>

            <table class="tableStat">
                <thead>
                    <tr>
                        <th>Partie n°</th>
                        <th>Nom de la partie</th>
                        <th>Mouvements Joueur 1</th>
                        <th>Mouvements Joueur 2</th>
                        <th>Gagnant</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $games = Game::getGames();
                    foreach($games as $game){
                        echo ('<tr>
                        <td>'.$game['id_game'].'</td>
                        <td>'.$game['game_name'].'</td>
                        <td>'.$game['moves_player1'].'</td>
                        <td>'.$game['moves_player2'].'</td>
                        <td>'.$game['winner'].'</td>
                        </tr>');
                    }
                    ?>
                </tbody>
             </table>
            
  
        </div>
      
       
    </div>
    
    



</main>

<?php $content = ob_get_clean(); ?>


<?php require_once ('View/layout.php')?>
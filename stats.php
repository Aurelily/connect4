<?php $title="Welcome" ?>
<?php session_start(); ?>
<?php require_once('Model/User.php');?>
<?php require_once('Controller/userController.php');?>
<?php require_once('Model/Game.php');?>
<?php require_once('Controller/gameController.php');?>





<?php ob_start();?>

<main>
    <div class="formContainer">

    <form class="formClassement" action ="" method="POST">
        <label for="game_name">Nom de la partie :</label>
        <input type="text" name="game_name" placeholder="Nom de la partie"/>
        <button type="submit" name="submit_game" >Créer une nouvelle partie</button>
    </form> 

    </div>
    <div class="statContainer">
         <div class="winnersStats">
             <h1>Classement :</h1>
             <table>
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
            <h1>Parties jouées :</h1>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
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
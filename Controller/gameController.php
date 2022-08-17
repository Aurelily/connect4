<?php
require_once 'Model/Game.php';
require_once 'Model/User.php';


/*-------------------------------
          CREATE GAME
--------------------------------*/

if (isset($_POST['submit_game'])){

        $game_name = htmlspecialchars($_POST['game_name']);
        //Contrôle du formulaire
        if (empty($game_name)) { array_push($_SESSION['errors'], "Un nom de partie est obligatoire"); }
        //check if game_name exists
        $chkGameExists = Game::chkGameExists($game_name);
        if ( gettype($chkGameExists) == "array" ) {array_push($_SESSION['errors'], "Ce nom existe déjà"); }

         // Finally, register game if there are no errors in the form
        if ( count($_SESSION['errors']) == 0) 
        {
                Game::createGame($game_name);
                $_SESSION['game_name'] = $game_name;
                $_SESSION['inGame'] = true;
                header('location: ./gameScreen.php');
        }
 
}

/*---------------------------------------
SAUVER LA PARTIE
----------------------------------------*/

if (isset($_POST['submit_save_game'])){

        $moveP1 = $_POST['movesP1'];
        $moveP2 = $_POST['movesP2'];
        $winner = $_POST['winner'];
        $game_name = $_SESSION['game_name'];
        $login = $_SESSION['login'];
 
        Game::updateGameInfo($moveP1, $moveP2, $winner, $game_name);


        //Si le gagnant est le joueur 1, j'update la colonne winner avec le login de l'utilisateur connecté, j'update le nombre de partie gagnée du user connecté. Sinon je laisse joueur 2 dans la colonne winner
        
        if($winner == "Joueur 1"){
                User::updateUserWinGames($login);
                Game::updateGameInfo($moveP1, $moveP2, $login, $game_name);
        }else{
                Game::updateGameInfo($moveP1, $moveP2, $winner, $game_name);
        }
        

        $_SESSION['inGame'] = false; 
        header('location: ./stats.php');
    
    
}
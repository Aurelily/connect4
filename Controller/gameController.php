<?php
require_once 'Model/Game.php';


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

/*-------------------------------
          SELECT GAME INFOS
--------------------------------*/

if (isset($_POST['submit_save_game'])){
 
        $gameInfos = Game::getGameInfos($game_name);
        $_SESSION['game_info'] = $gameInfos;
        /*  $_SESSION['inGame'] = true; */
        header('location: ./stats.php');
    
    
}
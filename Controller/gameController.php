<?php
require_once 'Model/Game.php';


/*-------------------------------
          CREATE GAME
--------------------------------*/

if (isset($_POST['submit_game'])){
 
        Game::createGame();
        $_SESSION['inGame'] = true;
        header('location: ./gameScreen.php');
    
    
}
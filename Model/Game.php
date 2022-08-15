<?php

require_once 'Model/Model.php';

Class Game extends Model {
    public function __construct()
    {
        
    }

// Fonction : créer une partie
//----------------------------
    public static function createGame($game_name){
        $userId = $_SESSION['id'];
       
        $params = array($userId, $game_name, 0, 0, "" );
        $sql = "INSERT INTO games (id_game, id_player1, game_name, moves_player1, moves_player2, winner) VALUES (NULL, ?, ?, ?, ?, ?)";

        $create = self::requestExecute($sql, $params);

        return $create; 
    }

// Fonction : checker si le nom de la partie existe déjà
//---------------------------------------------------------

    public static function chkGameExists($game_name)
    {
        $params = array($game_name);
        $sql = "SELECT * FROM `games` 
                        WHERE `game_name` LIKE ?";

        $checkQuery = self::requestExecute($sql,$params);
        $infos = $checkQuery->fetch(PDO::FETCH_ASSOC);
        $count = $checkQuery->rowCount();

        if ($count > 0)
        {
            return $infos;
        }
        else
        {
            return false;
        }
        
    }


// Fonction : Obtenir toutes les infos d'une partie via son nom
//----------------------------------------------------------------

    public static function getGameInfos($game_name){
        $params = array($game_name);
        $sql = "SELECT * FROM `games` WHERE `game_name` LIKE ?";
        $selectQuery = self::requestExecute($sql, $params);
        $infos = $selectQuery->fetchAll(PDO::FETCH_ASSOC);

        return $infos;
    }

// Fonction : Obtenir toutes les infos de toutes les parties
//----------------------------------------------------------------

public static function getGames(){
    $sql = "SELECT id_game, game_name, moves_player1, moves_player2, winner FROM games ORDER BY id_game DESC";
    $selectQuery = self::requestExecute($sql);
    $infos = $selectQuery->fetchAll(PDO::FETCH_ASSOC);
    return $infos;
}

// Fonction : Mettre à jour / sauver les infos d'une partie via son nom
//------------------------------------------------------------------
    
    public static function updateGameInfo($moveP1, $moveP2, $winner, $game_name){
        $params = array(
            ':moves_player1' => $moveP1,
            ':moves_player2'=> $moveP2,
            ':winner' => $winner,
            ':game_name' => $game_name);
        $sql = "UPDATE games SET
        moves_player1 = :moves_player1,
        moves_player2 = :moves_player2,
        winner = :winner
        WHERE game_name = :game_name";
        self::requestExecute($sql, $params);
    }
}
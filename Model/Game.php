<?php

require_once 'Model/Model.php';

Class Game extends Model {
    public function __construct()
    {
        
    }

    public static function createGame($game_name){
        $userId = $_SESSION['id'];
       
        $params = array($userId, $game_name, 0, 0, "" );
        $sql = "INSERT INTO games (id_game, id_player1, game_name, moves_player1, moves_player2, winner) VALUES (NULL, ?, ?, ?, ?, ?)";

        $create = self::requestExecute($sql, $params);

        return $create; 
    }

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


// Obtenir toutes les infos d'une partie via son nom
    public static function getGameInfos($game_name){
        $params = array($game_name);
        $sql = "SELECT * FROM `games` WHERE `game_name` LIKE ?";
        $selectQuery = self::requestExecute($sql, $params);
        $infos = $selectQuery->fetchAll(PDO::FETCH_ASSOC);

        return $infos;
    }

// Mettre à jour les infos d'une partie via son nom
    
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
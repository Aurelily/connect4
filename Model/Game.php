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



    public static function getGameInfos($game_name){
        $params = array($game_name);
        $sql = "SELECT * FROM `games` WHERE `game_name` LIKE ?";
        $selectQuery = self::requestExecute($sql, $params);
        $infos = $selectQuery->fetchAll(PDO::FETCH_ASSOC);

        return $infos;
    }
    
/*     public static function updateGameInfo($game_name){
        $params = array($game_name, $winner);
        $sql = "UPDATE game2 SET win_loose = ? WHERE game_name = ?";
        self::requestExecute($sql, $params);
    } */
}
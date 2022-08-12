<?php
/*
CREATE GAME
----------------
- Le joueur connecté crée la partie
- Une partie va sauvegarder :
    l'id de la partie
    l'id du joueur connecté qui crée la partie (joueur 1)
    Nb de moves joueur 1
    Nb de moves joueur 2
    l'id du joueur qui a gagné
 */

require_once 'Model/Model.php';

Class Game extends Model {
    public function __construct()
    {
        
    }

    public static function createGame($game_name){
        $userId = $_SESSION['id'];
       


        $params = array($userId, 0, 0, 0,$game_name );
        $sql = "INSERT INTO game2 (id_game, id_player1, nb_moves_p1, nb_moves_p2, win_loose, game_name) VALUES (NULL, ?, ?, ?, ?, ?)";

        $create = self::requestExecute($sql, $params);

        return $create; 
    }

    public static function chkGameExists($game_name)
    {
        $params = array($game_name);
        $sql = "SELECT * FROM `game2` 
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


    public static function selectGameInfo($id_game){
        $params = array($id_game);
        $sql = "SELECT * FROM `game2` WHERE `id_game` = ?";

        $selectQuery = self::requestExecute($sql, $params);

        return $selectQuery;
    }
    

}
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

    public static function createGame(){
        $userId = $_SESSION['id'];


        $params = array($userId, 0, 0, 0);
        $sql = "INSERT INTO game2 (id_game, id_player1, nb_moves_p1, nb_moves_p2, id_winner) VALUES (NULL, ?, ?, ?, ?)";

        $create = self::requestExecute($sql, $params);

        return $create;
    }

}
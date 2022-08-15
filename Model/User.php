<?php 

require_once 'Model/Model.php';

abstract class User extends Model 
{

    public function __construct() {}

// Fonction : Enregistrer un USER (Creator)
//------------------------------------------
    public static function register($login, $password)
    { 
        $params = array($login, password_hash($password, PASSWORD_DEFAULT));

        $sql = 'INSERT INTO creators (id_creator, login, password, win_games)
                VALUES (NULL, ?, ?, 0)';

        $register = self::requestExecute($sql, $params);

        return $register;
    }

// Fonction : Checker si le login existe déjà en BDD
//----------------------------------------------------
    public static function chkExists($login)
    {
        $params = array($login);

        $sql = "SELECT * FROM `creators` 
                        WHERE `login` LIKE ?";

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

// Fonction : Obtenir toutes les infos d'un user via son login
//--------------------------------------------------------------
    public static function getAllInfs($login)
    {
        $params = array($login);
        $sql = "SELECT * FROM `creators` WHERE `login` = ?";
        $selectQuery = self::requestExecute($sql, $params);
        return $selectQuery;
    }

// Fonction : Obtenir tout le tableau de user trié de façon décroissante par parties gagnées
//--------------------------------------------------------------
public static function getAllUsers()
{

    $sql = "SELECT login, win_games FROM creators ORDER BY win_games DESC";
    $selectQuery = self::requestExecute($sql);
    $infos = $selectQuery->fetchAll(PDO::FETCH_ASSOC);
    return $infos;
}


// Fonction : Incrémenter de 1 les parties gagnées du creator dans la BDD
//--------------------------------------------------------------------
    
    public static function updateUserWinGames($login){

        $params = array($login);

        $sql = "UPDATE creators SET win_games = win_games + 1 WHERE login = ?";

        self::requestExecute($sql, $params);
    }

}


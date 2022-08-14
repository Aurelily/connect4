<?php 

require_once 'Model/Model.php';

abstract class User extends Model 
{

    public function __construct() {}

// Register User
    public static function register($login, $password)
    { 
        $params = array($login, password_hash($password, PASSWORD_DEFAULT));

        $sql = 'INSERT INTO creators (id_creator, login, password, win_games)
                VALUES (NULL, ?, ?, 0)';

        $register = self::requestExecute($sql, $params);

        return $register;
    }

// Check if login exist
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

// Obtenir toutes les infos d'un user via son id
    public static function getAllInfs($id)
    {
        $params = array($id);

        $sql = "SELECT * FROM `creators` WHERE `id_creator` = ?";
        
        $selectQuery = self::requestExecute($sql, $params);
        
        return $selectQuery;
    }

    

}
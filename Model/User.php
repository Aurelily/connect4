<?php 

require_once 'Model/Model.php';

abstract class User extends Model 
{

    public function __construct() {}


    public static function register($login, $password)
    { 
        $params = array($login, password_hash($password, PASSWORD_DEFAULT));

        $sql = 'INSERT INTO creators (id_creator, login, password, win_games)
                VALUES (NULL, ?, ?, 0)';

        $register = self::requestExecute($sql, $params);

        return $register;
    }

    
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


    public static function getAllInfs($login)
    {
        $params = array($login);

        $sql = "SELECT * FROM `creators` WHERE `login` = ?";
        
        $selectQuery = self::requestExecute($sql, $params);
        
        return $selectQuery;
    }

    

}
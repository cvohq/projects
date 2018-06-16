<?php
namespace Classes;

use \PDO as PDO;

class Mysql {
    private static $db_dev;
    private static $pdo;
    
    /**
     * 
     * @return type
     */
    public static function getConnection() {
        if (!self::$pdo) {
            self::connect_db();
        }
        
        return self::$pdo;
    }

    private static function get_config()
    {
        //Connection configuration
        $dbConfig = \Classes\Config::getConfig('db');
        $mysqlConfig = $dbConfig['mysql']['dev'];
        static::$db_dev = array(
            'dbname'   => $mysqlConfig['dbname'],
            'host'     => $mysqlConfig['host'],
            'user'     => $mysqlConfig['user'],
            'password' => $mysqlConfig['password']
        );
     
    }
    
    public static function connect_db()
    {
        static::get_config();
        
        try {
            static::$pdo = new PDO("mysql:host=" . static::$db_dev['host'] . ";dbname=" . static::$db_dev['dbname'],static::$db_dev['user'], static::$db_dev['password']);
            static::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
        } catch (PDOException $ex) {
            die("Error: Could not connect. " . $ex->getMessage());
        }
    }
    
    public static function disconnect_db()
    {
        static::$pdo = NULL;
    }

}

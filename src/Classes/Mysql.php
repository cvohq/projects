<?php
namespace Classes;

class Mysql {
    private static $db_dev;
    
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
            $pdo = new \PDO("mysql:host=" . static::$db_dev['host'] . ";dbname=" . static::$db_dev['dbname'],static::$db_dev['user'], static::$db_dev['password']);
            
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            echo 'Connect successfully. Host info: '. $pdo->getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));
        } catch (PDOException $ex) {
            die("Error: Could no connect. " . $ex->getMessage());
        }
       

        unset($pdo);
    }
}

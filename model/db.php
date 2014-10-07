<?php

class db {
    private static $userName = 'root';
    private static $password = '';
    private static $hostName = 'localhost';
    private static $dbName = 'attic';
    
    private static $con = null;
    
    public static function getConnection() {
        if(null == self::$con) {
            return self::connect();
        }
    }
    
    public static function connect() {
        if(null == self::$con) {
            self::$con = new mysqli(self::$hostName, self::$userName, self::$password, self::$dbName);
            
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                return false;
            }
        }
        
        return self::$con;
    }
    
    public static function disconnect() {
        self::$con = null;
    }
}
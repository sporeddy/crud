<?php

class db {
    private static $userName = 'b72323648176ba';
    private static $password = 'e777638e';
    private static $hostName = 'us-cdbr-iron-east-01.cleardb.net';
    private static $dbName = 'heroku_dc748be90326082';
    
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

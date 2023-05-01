<?php

class Database
{
    private static $stmt;
    public static function connect(){
        $servername='localhost';
        $dbname='thecoffeehouse';
        $dsn= "mysql:host=$servername;dbname=$dbname;charset=utf-8;";
        $username='root';
        $password='';

        try {
            self::$stmt =  new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
            self::$stmt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // if(self::$stmt) echo "Connect successfull";
        }catch (PDOException $e){
            die($e->getMessage());
        }
        return self::$stmt;
    }
}
<?php


class Conexion
{
    const DB_SERVER = "localhost";
    const DB_USER = "root";
    const DB_PASS = "root";
    const DB_NAME = "protectora_animales";
    //$dsn = 'mysql:host=localhost;dbname=protectora_animales;port=8889';
    const DSN = "mysql:host=" . self::DB_SERVER . ";dbname=" . self::DB_NAME . ";";


    protected function setConnection() {
        try {
           $pdo = new PDO(self::DSN, self::DB_USER, self::DB_PASS);
            return $pdo;
        }
        catch (Exception $e) {
            exit($e->getMessage());
        }
}

}
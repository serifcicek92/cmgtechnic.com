<?php 
class DataBase{
    protected $db;

    public function __construct()
    {
        try {
            //code...
            $host ="localhost";
            $database = "cmgtechnic";
            $userName = "root";
            $passWord = "";

            // $userName = "serifcicek";
            // $passWord = "ks6tgnMydtchJX9";

            // $this->db = new PDO("mysql:host=$host;dbname=$database;charset=utf8",$userName,$passWord); 
            $this->db = new PDO("mysql:host=$host;dbname=$database",$userName,$passWord,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8 COLLATE utf8_turkish_ci")); 
            // $this->db->exec("SET NAMES 'utf8'");
            // $this->db->exec("SET CHARACTER SET utf8");
            // $this->db->exec("SET CHARACTER_SET_CONNECTION=utf8");
            // $this->db->exec("SET SQL_MODE = ''");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
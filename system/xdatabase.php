<?php 
class DataBase{
    protected $db;

    public function __construct()
    {
        try {
            //code...
            $host ="localhost";
            $database = "usvagste_agsteknikdb";

            // $userName = "serifcicek";
            // $passWord = "rW+4J2Ub9SUe";

            $userName = "usvagste_serifcicek";
            $passWord = "rW+4J2Ub9SUe";

            $this->db = new PDO("mysql:host=$host;dbname=$database;charset=utf8",$userName,$passWord); 
            $this->db->exec("SET NAMES 'utf8'");
            $this->db->exec("SET CHARACTER SET utf8");
            $this->db->exec("SET CHARACTER_SET_CONNECTION=utf8");
            $this->db->exec("SET SQL_MODE = ''");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
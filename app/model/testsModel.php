<?php
class tests extends Model{
    public function getTest()
    {

        echo '<br>';
        try {
            return $this->db->query("SELECT * from aracozellikleri")-> fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            print_r($th->errorInfo);
            echo "error";
        }
    }
}
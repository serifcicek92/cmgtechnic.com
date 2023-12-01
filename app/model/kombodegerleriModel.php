<?php 
class KomboDegerleri extends Model
{
    public function getKomboDegerlerByAdi($komboadi)
    {
        try {
            $statement = $this->db->prepare("call sel_kombodegerleriByAdi(:adi)");
            $statement->bindValue(':adi',$komboadi);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            print_r($th->errorInfo);
            echo "error";
        }
    }
}
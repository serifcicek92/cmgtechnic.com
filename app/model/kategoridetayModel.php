<?php

class KategoriDetay extends Model{

    public function getKategoriDetaylariByMenuId($lid)

    {

        try {

            $statement = $this->db->prepare("call sel_kategoridetay(:lid)");

            $statement->bindValue(':lid',$lid);

            $statement->execute();

            return $statement->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $th) {

            print_r($th->errorInfo);

            echo "error";

        }

    }



    public function inKategoriDetay($values = [])

    {

        try {

                $ar = array_values(Application::$app->menuler->getMenuler($values["menuref"]));

                $folder = $_SERVER['DOCUMENT_ROOT'].BASEURL."/assets/images/".$ar[0]["link"];

            if (!file_exists($folder)) {
                mkdir($folder);

            }

            $tmpName = $values[0]["img"]["tmp_name"][0];

            $fileName = $folder."/".$values[0]["img"]["name"][0];



            if ($fileName!="" && $tmpName!="") {

                move_uploaded_file($tmpName,$fileName);

            }



            // var_dump($values);

            // echo $values[0]["img"]["name"][0];

            // exit;



            $statement = $this->db->prepare("call in_kategoridetay(@id,:menuid,:baslik,:altbaslik,:detay,:link,:linkbaslik,:resimlink,:ekleyenid,:kategoritipi)");

            $statement->bindValue(":menuid",$values["menuref"]);

            $statement->bindValue(":baslik",$values["baslik"]);

            $statement->bindValue(":altbaslik",$values["detayaltbaslik"]);

            $statement->bindValue(":detay",$values["detayaciklama"]);

            $statement->bindValue(":link","");

            $statement->bindValue(":linkbaslik","");

            $statement->bindValue(":resimlink",$values[0]["img"]["name"][0]);

            $statement->bindValue(":ekleyenid",1);

            $statement->bindValue(":kategoritipi",$values["kategoritip"]);

            $statement->execute();

            $result = $this->db->prepare("select @id");

            $result->execute();

            $result->fetchAll(PDO::FETCH_OBJ);

            return $result;

        } catch (\Exception $th) {
            
            echo "hata";
            print_r( $th->getMessage());

        }

    }

    public function upKategoriDetay($values = [])

    {

        try {

                $ar = array_values(Application::$app->menuler->getMenuler($values["menuref"]));

                $folder = $_SERVER['DOCUMENT_ROOT'].BASEURL."/assets/images/".$ar[0]["link"];

            if (!file_exists($folder)) {

                mkdir($folder);

            }

            $tmpName = $values[0]["img"]["tmp_name"][0];

            $fileName = $folder."/".$values[0]["img"]["name"][0];



            if ($fileName!="" && $tmpName!="") {

                move_uploaded_file($tmpName,$fileName);

            }



            // var_dump($values);

            // echo $values[0]["img"]["name"][0];

            // exit;



            $statement = $this->db->prepare("call up_kategoridetay(:id,:menuid,:baslik,:altbaslik,:detay,:link,:linkbaslik,:resimlink,:ekleyenid,:kategoritipi)");

            $statement->bindValue(":id",$values["detayid"]);

            $statement->bindValue(":menuid",$values["menuref"]);

            $statement->bindValue(":baslik",$values["baslik"]);

            $statement->bindValue(":altbaslik",$values["detayaltbaslik"]);

            $statement->bindValue(":detay",$values["detayaciklama"]);

            $statement->bindValue(":link","");

            $statement->bindValue(":linkbaslik","");

            $statement->bindValue(":resimlink",$values[0]["img"]["name"][0]);

            $statement->bindValue(":ekleyenid",1);

            $statement->bindValue(":kategoritipi",$values["kategoritip"]);

            $statement->execute();

        } catch (\Throwable $th) {

            //throw $th;

            return false;

        }

    }

    public function delKategoriDetay($id)

    {

        try {

            $statement = $this->db->prepare("CALL del_kategoridetaylari(:id,:guncelleyenid)");

            $statement->bindValue(":id",$id);

            $statement->bindValue(":guncelleyenid",1);

            $statement->execute();

        } catch (\Throwable $th) {

            //throw $th;

            return false;

        }

    }



    public function getKategoriDetayByLocation($location)

    {

        

    }

}
<?php 

class User extends Model

{

    public $userId = "";

    public $email = "";

    public $firstName = "";

    public $lastName = "";

    public $status = "";



    public $password="";

    public $mailonaylink;

    public $remembertoken;







    public function login($params = [])

    {

        $status = $this->db->prepare("call sel_users(null,:email,null)");

        $status->bindValue(':email',$params["email"]);

        // $status->bindValue(':password',password_hash($params["password"],PASSWORD_DEFAULT));

        $status->execute();

        $result = $status->fetch(PDO::FETCH_ASSOC);

        $status->closeCursor();



        if ($result && password_verify(md5($params["password"]),$result["password"])) {

            $this->userId = $result["id"];

            $this->email = $result["email"];

            $this->firstName = $result["firstname"];

            $this->lastName = $result["lastname"];

            

            if (isset($params["remember"]) && $params["remember"]=="on") 

            {

                $this->db->prepare("DELETE FROM userremembers where userid = $this->userId")->execute();

                $this->remembertoken = bin2hex(openssl_random_pseudo_bytes(32));

                $remember = $this->db->prepare("INSERT INTO userremembers set userid = :userid, remembertoken = :remembertoken,expiretime = :expiretime, userbrowser=:userbrowser");

                $remember->execute(array(

                    "userid" => $this->userId,

                    "remembertoken" => $this->remembertoken,

                    "expiretime" => time()+604800,

                    "userbrowser" => md5($_SERVER["HTTP_USER_AGENT"])

                ));



                setcookie("REMEMBERAGS",$this->remembertoken,time()+604801,'/');

            }

            return $this;

        }

        else {



            return false;

        }



    }



    public function getUserRoles()

    {

        

    }



    public function createUsers($params = [])

    {

        try {

                    

                if ($params["sifre"] == $params["sifretekrar"]) {

                    $this->firstName = explode(' ',$params["adsoyad"]);

                    $this->lastName = $this->firstName[sizeof($this->firstName)-1];

                    $this->firstName = $this->firstName[0];

                    $this->email = $params["email"];

                    $this->status = 1;//0 deaktif 1 mail gitti 2 onaylandı

                    $this->password = password_hash(md5($params["sifre"]),PASSWORD_DEFAULT);

                    $this->mailonaylink = md5(rand(1,100000));

                    $status = $this->db->prepare("call in_users(@lid,:lemail,:lfirstname,:llastname,:lstatus,:lpassword,:lmailonaylink)");

                    $status->bindValue(':lemail',$this->email);

                    $status->bindValue(':lfirstname',$this->firstName);

                    $status->bindValue(':llastname',$this->lastName);

                    $status->bindValue(':lstatus',$this->status);

                    $status->bindValue(':lpassword',$this->password);

                    $status->bindValue(':lmailonaylink',$this->mailonaylink);

                    $status->execute();

                    $result = $this->db->query("select @lid as userId")->fetchObject();

                    $this->userId = $result->userId;

                    if ($result) {

                        $mail = Application::$app->functions->sendMail(

                        $params["email"],'Uyelik Kayit','<a href="http://agsteknik.com/mailonay/'.$this->mailonaylink.'">Mailinizi onaylamak için lütfen tıklayınız</a>','');

                    return true;

                }

            }

            return false;



        } catch (Exception $e) {

            //SQLSTATE[45000]: <>: 1644 Kullanıcı Zaten Mevcut

            echo str_replace("<>:","",str_replace("SQLSTATE[45000]:","",$e->getMessage()));

            return false;

        }

    }



    public function mailOnay($mailonaylink)

    {

        $status = $this->db->prepare("call maildogrula(:ldogrulamakodu)");

        $status->bindValue(':ldogrulamakodu',$mailonaylink);

        $status->execute();

        $result = $status->fetchAll(PDO::FETCH_ASSOC);

        if (!$result) {

            return false;

        }

        return true;

    }



    public function getUserList($userid = null,$email = null)

    {

       

        $status = $this->db->prepare("call sel_users_list(:id,:mail)");

        $status->bindValue(":id",$userid,($userid==null ? PDO::PARAM_NULL : PDO::PARAM_INT));

        $status->bindValue(":mail",$email,($email == null ? PDO::PARAM_NULL : PDO::PARAM_STR));

        $status->execute();

        $result = $status->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    }



    public function upUsers($user)  

    {   

        $status = $this->db->prepare("call up_users(:id,:lfirstname,:llastname,:lstatus,:lpassword)");

        $status->bindValue(":id",$user["id"]);

        $status->bindValue(":lfirstname",$user["firstname"] ?? null);

        $status->bindValue(":llastname",$user["lastname"] ?? null);

        $status->bindValue(":lstatus",$user["status"] ?? null);

        $status->bindValue(":lpassword",$user["password"] ?? null);

        $status->execute();

        $result = $status->fetchObject();

        $status->closeCursor();

        if ($user["status"]!=null && $user["status"] != "" && $user["status"]=="3") 

        {

            $mail = Application::$app->functions->sendMail(

                $this->getUserList($user["id"])[0]["email"],'Uyelik Onayi',"<p>Hoşgeldiniz... Üyeliğiniz Onaylanmıştır.</p><br>".'<a href="http://agsteknik.com">AGS Teknik</a>','');

        }

        

        if ($result->ROW_COUNT>0) {

            return true;

        }

        return false;



    }



    public function getUserRemembers($cooktoken,$browser)

    {

        $time = time();



        return $this->db->query("SELECT * FROM userremembers where remembertoken ='{$cooktoken}' and userbrowser = '$browser' and expiretime > $time")->fetch(PDO::FETCH_ASSOC);

    }

}
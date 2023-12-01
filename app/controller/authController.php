<?php

class Auth extends Controller

{

    public function index()

    {

        $this->view('login', []);

    }



    public function login()

    {

        $user = Application::$app->user;



        

        if($this->checkLogin())

        {

            exit;

        }
        
        if (isset($_POST) && $user->login($_POST)) {


            header(Application::$app->functions->HTTPStatus(201));

            $_SESSION["AGSLOGIN"]["firstname"] = $user->firstName;

            $_SESSION["AGSLOGIN"]["USERID"] = $user->userId;

            $_SESSION["AGSLOGIN"]["SESSION"] = "ACTIVE";

            echo "<b>Giriş Başarılı Anasayfaya Yönlendiriliyorsunuz...!</b>";

        }

        else {

            header(Application::$app->functions->HTTPStatus(400));

        }

    }

    public function checkLogin()

    {

        $user = Application::$app->user;

        

        if (!isset($_SESSION["AGSLOGIN"]) || $_SESSION["AGSLOGIN"]["SESSION"] != "ACTIVE") {

            if (isset($_COOKIE["REMEMBERAGS"]) && $_COOKIE["REMEMBERAGS"] != 'false') {

                $cooktoken = $_COOKIE["REMEMBERAGS"];

                $browser = md5($_SERVER['HTTP_USER_AGENT']);

                $result = $user->getUserRemembers($cooktoken,$browser);

                if ($result) {

                    $cookieUser = $result["userid"];

                    $checkUser = $user->getUserList($cookieUser, null);

                    

                    if ($checkUser) {

                        $user->userId = $checkUser[0]["id"];

                        $user->email = $checkUser[0]["email"];

                        $user->firstName = $checkUser[0]["firstname"];

                        $user->lastName = $checkUser[0]["lastname"];

                        $_SESSION["AGSLOGIN"]["firstname"] = $user->firstName;

                        $_SESSION["AGSLOGIN"]["SESSION"] = "ACTIVE";

                        $_SESSION["AGSLOGIN"]["USERID"] = $user->userId;

                        

                        return true;

                    }

                    else

                    {

                        setcookie("REMEMBERAGS",'false',time()-3600,'/');

                        return false;

                        //header('Location:'.SITEADRESS.'login');

                    }

                }

                else

                {

                    setcookie("REMEMBERAGS",'false',time()-3600,'/');

                    //header('Location:'.SITEADRESS.'login');

                    return false;



                }

            }

            else 

            {

                setcookie("REMEMBERAGS",'false',time()-3600,'/');

                //header('Location:'.SITEADRESS.'login');

                return false;

            }

        }

        else 

        {

            return true;

        }

    }

    public function logout()

    {

        $_SESSION["AGSLOGIN"]=null;

        session_destroy();

        setcookie("REMEMBERAGS",'false',time()-3600,'/');

        header('Location:'.SITEADRESS.'login');

        exit;

    }

    public function registerindex()

    {

        $this->view('register', []);

    }



    public function register()

    {

        $params = $_POST;

        if (Application::$app->user->createUsers($params)) {

            header(Application::$app->functions->HTTPStatus(201));

            echo "Lütfen mailinize gelen linkten üyeliğinizi onaylayınız.<br>Üyelik talebiniz sisteme başrılı bir şekilde kayıtedilmiştir.<br>Anasayfaya yönlendirileceksiniz";

        }

        else {

            header(Application::$app->functions->HTTPStatus(404));

        }

    }



    public function mailonay($onayKod)

    {

        if (Application::$app->user->mailOnay($onayKod)) {

            $this->viewContent('

                 <div class="container my-5">

                    <div class="row  align-items-center">

                        <div class="col-md-12 col-lg-7 text-center text-lg-left">

                            Mail adresiniz başarılı bir şekilde doğrulandı.<br>Üyeliğiniz onaylanınca tarafınıza mail ile bilgilendirileceksiniz.<br>

                            <a href="' . SITEADRESS . '">Anasayfaya dön</a>

                        </div>

                    </div>

                 </div>

                 ');

        }

        else {

            $this->viewContent('

                 <div class="container my-5">

                    <div class="row  align-items-center">

                        <div class="col-md-12 col-lg-7 text-center text-lg-left">

                            Mail Onaylamada hata <br>

                            <a href="' . SITEADRESS . '">Anasayfaya dön</a>

                        </div>

                    </div>

                 </div>

                 ');

        }

    }



    public function updateUser()

    {

        $params = $_POST;



        if (Application::$app->user->upUsers($params)) {

            header(Application::$app->functions->HTTPStatus(201));

        }

        else {

            header(Application::$app->functions->HTTPStatus(400));

        }



    }







}


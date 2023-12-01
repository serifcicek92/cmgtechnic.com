<?php 

class Admin extends Controller

{

    public function __construct()

    {



    }

    public function index()

    {

        // $carModel = $this->model('admin');

        // $cars = $carModel->getAll();

        $this->viewAdmin('home',array());

    }

    public function kategoridetay()

    {

        $this->viewAdmin('kategoridetay',array());

    }





    public function savedetay(){

        try{



            $values =  $_POST;

            array_push($values,$_FILES);

            // var_dump($values);
            // exit;

            if ($_POST["detayid"] && $_POST["detayid"]!="") {
                Application::$app->kategoriDetay->upKategoriDetay($values);

                header(Application::$app->functions->HTTPStatus(200));

            }else {
                Application::$app->kategoriDetay->inKategoriDetay($values);
                header(Application::$app->functions->HTTPStatus(201));

            }

        }catch(Exception $e){

            header(Application::$app->functions->HTTPStatus(400));

        }

        $this->viewAdmin('kategoridetay',array());

    }



    public function deleteDetay($id){

        try {

            Application::$app->kategoriDetay->delKategoriDetay($id);

            header(Application::$app->functions->HTTPStatus(200));

        } catch (\Throwable $th) {

            header(Application::$app->functions->HTTPStatus(400));

        }

        $this->viewAdmin('kategoridetay',array());

    }



    public function kullanicilarIndex()

    {

        $kullanicilarList = Application::$app->user->getUserList(null,null);



        $this->viewAdmin('kullanicilar',$kullanicilarList);

    }

}
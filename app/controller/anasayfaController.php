<?php 
class Anasayfa extends Controller
{
    public function __construct()
    {

    }
    public function index()
    {
        $carModel = $this->model('anasayfas');
        $cars = $carModel->getAll();
        $this->view('anasayfa',['cars'=>$cars]);
    }

    public function test($name=null){
        echo 'test'.$name;
    }

    public function post(){
        print_r($_POST);
    }
}
<?php 
class Test extends Controller
{
    public function __construct()
    {

    }
    public function index()
    {
        // $carModel =$this->model('tests');
        $cars = array('araba'=>'audi','model'=>'a4','YIL'=>'2021');
        $this->make('test',$cars)->view('test',$cars);
    }

    public function post(){
        print_r($_POST);
    }
}
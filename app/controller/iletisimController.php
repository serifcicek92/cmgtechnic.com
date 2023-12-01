<?php 
class Iletisim extends Controller
{
    public function __construct()
    {

    }
    public function index()
    {
        $this->view('iletisim');
    }


    public function post(){
        print_r($_POST);
    }
}
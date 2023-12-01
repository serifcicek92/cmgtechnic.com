<?php

class KategoriDetaylari extends Controller
{
    public function __construct()
    {

    }
    public function index($page)
    {
        $menuler = Application::$app->menuler->getMenuler();
        $menuler = array_filter($menuler, function ($val) use ($page) {
            
            if (sizeof(explode('/',$val['link']))>1 &&
                explode('/',$val['link'])[1] == $page) 
                {
                    //var_dump(explode('/',$val['link']));
                    return $val;
                }
        });
        $menu = reset($menuler);

        $kategoridetaylari = Application::$app->kategoriDetay->getKategoriDetaylariByMenuId($menu["ID"]);

        // var_dump($menu);
        // exit;
        $this->view('kategoridetaylari', array('page' => $page,'menu'=>$menu,'kategoridetaylari'=>$kategoridetaylari));
    }

    public function test($name = null)
    {
        echo 'test' . $name;
    }

    public function post()
    {
        print_r($_POST);
    }
}
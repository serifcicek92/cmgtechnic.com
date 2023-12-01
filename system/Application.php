<?php
include INCLUDEPATH.'/app/controller/anasayfaController.php';
include INCLUDEPATH.'/app/controller/iletisimController.php';
include INCLUDEPATH.'/app/controller/kategoridetaylariController.php';
include INCLUDEPATH.'/app/controller/adminController.php';
include INCLUDEPATH.'/app/controller/authController.php';
include INCLUDEPATH.'/app/model/menulerModel.php';
include INCLUDEPATH.'/app/model/kategoridetayModel.php';
include INCLUDEPATH.'/app/model/kombodegerleriModel.php';
include INCLUDEPATH.'/app/model/userModel.php';

class Application
{
    //cotrollers
    public static Application $app;
    public KategoriDetaylari $kategoridetaylari;
    public Anasayfa $anasayfa;
    public Iletisim $iletisim;
    public Admin $admin;
    public Auth $auth;
    
    //models
    public Menuler $menuler;
    public KategoriDetay $kategoriDetay;
    public KomboDegerleri $komboDegerleri;
    public User $user;

    public Functions $functions;
    public function __construct()
    {
        //controls
        self::$app = $this;
        $this->anasayfa = new Anasayfa();
        $this->iletisim = new Iletisim();
        $this->kategoridetaylari = new KategoriDetaylari();
        $this->admin = new Admin();
        $this->auth = new Auth();
               
        //models
        $this->menuler = new Menuler();
        $this->kategoriDetay= new KategoriDetay();
        $this->komboDegerleri = new KomboDegerleri();
        $this->user = new User();


        $this->functions = new Functions();
    }
}
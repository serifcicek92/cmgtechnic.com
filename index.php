<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors',1);
ob_start();
session_start();
// set_include_path('/home/usvagste/public_html');
// set_include_path('/var/www/vhosts/cmgtechnic.com/httpdocs');
set_include_path('C:\Projeler\repositories\cmgtechnic.com');
require 'const.php';
require 'system/functions.php';
require __DIR__.'/system/database.php';
require __DIR__.'/system/route.php';
require __DIR__.'/system/controller.php';
require __DIR__.'/system/model.php';
require __DIR__.'/system/Application.php';

// Route::run('/',function(){
//     echo 'hi world';
// });

$app = new Application();

$parseUrl = Route::parseUrl();

Route::run('/','anasayfa@index');
Route::run('/anasayfa','anasayfa@index');
Route::run('/iletisim','iletisim@index');
Route::run('/test','/test@index');
Route::run('/test','/test@post','post');
Route::run('/elektrik-santralleri/{url}','kategoridetaylari@index');
Route::run('/gemi-makinalari/{url}','kategoridetaylari@index');
Route::run('/servis/{url}','kategoridetaylari@index');
Route::run('/turbosarj/{url}','kategoridetaylari@index');
Route::run('/login','auth@index');
Route::run('/user','auth@login','post');
Route::run('/user/logout','auth@logout');
Route::run('/user/guncelle','auth@updateUser','post');
Route::run('/register','auth@registerindex');
Route::run('/register','auth@register','post');
Route::run('/mailonay/{val}','auth@mailonay');




Route::run('/admin','admin@index');
Route::run('/admin/anasayfa','admin@index');
Route::run('/admin/kullanicilar','admin@kullanicilarIndex');
Route::run('/admin/kategoridetay','admin@kategoridetay');
Route::run('/admin/kategoridetay','admin@savedetay','post');
Route::run('/admin/kategoridetay/{id}','admin@deleteDetay');
ob_end_flush();
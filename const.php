<?php
// bu kısmı değiştir
// $base_url = "/agsteknik";
$base_url = "";
$server="localhost";
$dbname="agsteknik";
$dbuser="root";
$dbpassword="";
$charset="utf8";
define("THEMANAME","rappo");
//define('SITEADRESS','http://localhost:8888/agsteknik/');
// define('SITEADRESS','http://127.0.0.1:8989/');
define('SITEADRESS','http://127.0.0.1:8989/');
// bu kısmı değiştir#
define('BASEURL', $base_url);
define('INCLUDEPATH',get_include_path());
// $_SESSION["base_url"]=BASEURL;
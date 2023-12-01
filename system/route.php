<?php
class Route{
    public static function parseUrl(){

        $dirname = dirname($_SERVER["SCRIPT_NAME"]);
        $dirname = ($dirname=="/" ? "" : $dirname);
        $basename = basename($_SERVER["SCRIPT_NAME"]);
        $requestUri = str_replace([$dirname,$basename],"",$_SERVER["REQUEST_URI"]);
        $requestUri = (str_starts_with($requestUri,'/') ? $requestUri : "/".$requestUri);
        // echo "$dirname<br>$basename<br>$requestUri<br>".$_SERVER["REQUEST_URI"];
		// exit;
        return $requestUri;
    }
    public static function run($url,$callback,$method='get'){
        $method = explode('|',strtoupper($method));
   
        if (in_array($_SERVER['REQUEST_METHOD'],$method)) {
            $patterns =[
                '{url}'=>'([0-9a-zA-Z-]+)',
                '{id}'=>'([0-9]+)',
                '{val}' => '([0-9a-zA-Z-]+)'
            ];
            

            $url = str_replace(array_keys($patterns),array_values($patterns),$url);
            $requestUri = self::parseUrl();        

            // echo "url=$url<br>requerturl=$requestUri";
			// exit;


            if (preg_match('@^'.$url.'$@',$requestUri,$parameters)){
                                
                unset($parameters[0]);
                //print_r($parameters);
                if(is_callable($callback))//bir fonksiyonsa
                {
                    call_user_func_array($callback,$parameters);
                }
                
                $controller = explode('@',$callback);
                $className = explode('/',$controller[0]);
                $className = end($className);

                $controllerFile = INCLUDEPATH.'/app/controller/'.strtolower($controller[0]).'Controller.php';
                // echo $controllerFile;
                // exit;
                
                if (file_exists($controllerFile)) {
                    // echo $controllerFile;
                    // var_dump($controller);
                    //require $controllerFile;
                    call_user_func_array([Application::$app->$className,$controller[1]],$parameters);
                }
            }
        }
    }
}
<?php 
Class Controller
{
    public function view($name, $data = [])
    {
        // extract($data);
        $viewContent = $this->renderOnlyView($name,$data);
        $layoutFile = INCLUDEPATH.'/app/view/thema/'.THEMANAME.'/layouts/mainLayout.php';
        ob_start();
        include_once $layoutFile;
        $layoutContent = ob_get_clean();
        echo str_replace('{{Content}}',$viewContent,$layoutContent);
    }
    public function viewContent($content)
    {
        // extract($data);
        $viewContent = $content;
        $layoutFile = INCLUDEPATH.'/app/view/thema/'.THEMANAME.'/layouts/mainLayout.php';
        ob_start();
        include_once $layoutFile;
        $layoutContent = ob_get_clean();

        echo str_replace('{{Content}}',$viewContent,$layoutContent);
    }
    public function model($name){
        $modelFile = INCLUDEPATH.'/app/model/'.strtolower($name).'Model.php';

        if (file_exists($modelFile)) { 
            require($modelFile);
            return new $name;
        }else{
            
        }
    }

    protected function renderOnlyView($name,$params):string
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        $viewFile = INCLUDEPATH.'/app/view/thema/'.THEMANAME.'/'.strtolower($name).'.php';
        ob_start();
        require $viewFile;
        return  ob_get_clean();
    }

    public static function make(string $view, array $params=[]):static 
    {
        return new static($view,$params);
    }

    public function viewAdmin($name,$data = [])
    {
        foreach ($data as $key => $value) {
            $$key = $value;
        }
        $viewFile = INCLUDEPATH.'/app/view/thema/admin/'.strtolower($name).'.php';
        ob_start();
        include_once $viewFile;
        $viewContent = ob_get_clean();
        $layoutFile = INCLUDEPATH.'/app/view/thema/admin/layouts/mainLayout.php';
        ob_start();
        include_once $layoutFile;
        $layoutContent = ob_get_clean();
        echo str_replace('{{Content}}',$viewContent,$layoutContent);
        
    }
}
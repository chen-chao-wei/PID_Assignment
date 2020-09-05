<?php
class App
{
    public function __construct()
    {
        $url = $this->parseUrl();

        
        $controllerName = "{$url[0]}Controller";
        if (!file_exists("controllers/$controllerName.php"))
            $controllerName = "homeController";
        require_once "controllers/$controllerName.php";
        $controller = new $controllerName;
        //var_dump($controller);
        (isset($url[1]))?$methodName = $url[1]:$methodName = "mall";
        
        if (!method_exists($controller, $methodName))
            $methodName = "mall";
        unset($url[0]);
        unset($url[1]);
        $params = $url ? array_values($url) : array();
        call_user_func_array(array($controller, $methodName), $params);
    }
    public function parseUrl()
    {
        if (isset($_GET["url"])) {
            $url = rtrim($_GET["url"], "/");
            $url = explode("/", $url);
            return $url;
        }else{
            $url = "HomeController/mall/";
            $url = explode("/", $url);
            return $url;
        }
        
    }
}

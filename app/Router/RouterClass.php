<?php

namespace App\Router;

use Routes\Routes;

class RouterClass{

    private $route;

    public function __construct()
    {
        $route = new Routes();
        $this->route = $route->load();
    }

    public function load()
    {
        $router = explode('?', $this->getRouter())[0] != '/' ? explode('/',explode('?', $this->getRouter())[0])[1] : explode('?', $this->getRouter())[0];
        foreach($this->route[$this->getMethod()][$router] as $controller => $method){
            try {
                $controllerFormat = ucfirst($controller);
                $controllerNamespace = "App\\Controllers\\{$controllerFormat}";

                if(!class_exists($controllerNamespace)){
                    var_dump("O controller {$controllerFormat} não existe");
                    throw new \Exception("O controller {$controller} não existe");
                }

                $controllerInstance = new $controllerNamespace();

                if(!method_exists($controllerInstance, $method)){
                    var_dump("O metódo {$method} não existe no controller {$controllerFormat}");
                    throw new \Exception("O metódo {$method} não existe no controller {$controller}");
                }
                $controllerInstance->$method((object) $_REQUEST);

            } catch (\Throwable $th) {
                var_dump($th);die;
            }    
        }

    }

    private function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    private function getRouter()
    {
        return $_SERVER['REQUEST_URI'];
    }

}
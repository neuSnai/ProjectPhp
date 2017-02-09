<?php
defined('SYS_PATH') or die("Access Denied");
class Core{
    private $route;
    private static $instance;
    private function __construct(){
        $this->route=new Router;
    }
    //获取实体
    public static function getInstance(){
        if (isset(self::$instance))
            return self::$instance;
        else{
            self::$instance=new self();
            return self::$instance;
        }
    }
    //路由解析
    public function routeParse(){
        $this->route->checkProtocol();
        $resolvedUri=$this->route->getResolvedUri();
        return $resolvedUri;
    }
    public function distribute($resolvedUri){
        $controller=ucfirst($resolvedUri['controller']);
        $method=$resolvedUri['method'];
        if(file_exists(CONTROLLER.$controller.'.php')){
            require_once CONTROLLER.$controller.'.php';

                if (class_exists($controller)) {
                    $controller = new $controller();
                }
                else{
                    throw new RuntimeException("class $controller not found!");
                }
        }
        else{
            throw new RuntimeException("controller $controller not found!");
        }
        if (method_exists($controller,$method)){
            $controller->$method();
        }
        else{
            throw new RuntimeException("method $method not found!");
        }

    }

}



?>
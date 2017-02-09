<?php
/*
 * 路由规则的配置
 */
defined('SYS_PATH') or die("Access Denied");
class Router{
    private $resolvedUri;
    public function __construct()
    {
        $this->config=Config::getInstance()->config;
    }

/*
 * 检查设置的路由协议
 */
    public function checkProtocol(){
        $protocol=$this->config['uri_protocol'];
        switch ($protocol){
            case "PATH_INFO":
                $this->pathInfoParse();
                break;
            case "REQUEST":
                $this->requestParse();
                break;
            default:
                $this->pathInfoParse();
        }
    }
    /*
     * PATH_INFO规则解析
     */
    public function pathInfoParse(){
        //parse_url() 必须在前面加上域名才会成功
        $uri = parse_url('http://dummy'.$_SERVER['REQUEST_URI']);
        if (strpos($uri['path'], $_SERVER['SCRIPT_NAME']) === 0)
        {
            $uri = (string) substr($uri['path'], strlen($_SERVER['SCRIPT_NAME']));
        }
        elseif (strpos($uri['path'], dirname($_SERVER['SCRIPT_NAME'])) === 0)
        {
            $uri = (string) substr($uri['path'], strlen(dirname($_SERVER['SCRIPT_NAME'])));
        }
        $uriArr=explode('/',$uri);
        $this->resolvedUri['controller']=$uriArr[1];
        $this->resolvedUri['method']=$uriArr[2];
        require_once SYS_PATH.'library/Uri.php';
       $cache=Cache::getInstance();
        $cache::$uri['segments']=$uriArr;
        $cache::$uri['host']=$_SERVER['HTTP_HOST'];
        $cache::$uri['requestUri']=$_SERVER['REQUEST_URI'];
    }
    public function requestParse(){
        $this->resolvedUri['controller']=$_GET['c'];
        $this->resolvedUri['method']=$_GET['m'];
    }

    public function getResolvedUri(){
        $resolvedUri=$this->resolvedUri;
        if(!trim($resolvedUri['controller'])){
            if($homePage=Config::getInstance()->config['home_page']){
                $arr=explode('/',$homePage);
                $resolvedUri['controller']=$arr[0];
                $resolvedUri['method']=$arr[1];
            }
            else{
                throw new RuntimeException("controller is empty!");
            }
        }
        return $resolvedUri;
    }
   
    
}
?>

<?php
class Cache{
    private static $instance;
    private $common;
    public static $uri;
    private function __construct(){

    }
    public static function getInstance(){
        if (!self::$instance){
            self::$instance=new self;
            return self::$instance;
        }
        else
            return self::$instance;
    }
}
?>

<?php
class Config{
    private static $instance;
    public $config;
    public $dbConf;
    private function __construct(){
        require_once CONF."config.php";
        require_once CONF.'database.php';
        $this->dbConf=$dbConf;
        $this->config=$config;
    }
    public static function getInstance(){
        if (isset(self::$instance))
            return self::$instance;
        else
            return self::$instance=new self;
    }
}
?>

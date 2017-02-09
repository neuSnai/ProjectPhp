<?php
define('CONF','../config/config.php');
define('SYS_PATH',getcwd().'/system/');
class funcDefine{
    private $config;
    public function __construct()
    {
        require_once CONF;
        $this->config=$config;
    }
}
new funcDefine();
?>

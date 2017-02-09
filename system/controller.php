<?php
defined("SYS_PATH") or die("Access Denied");
class Pro_Controller{
    //加载器
    public $load;
    private static $instance;
    /*
     *向controller中动态添加属性一定要在controller实例化之后。
     */
    public function __construct()
    {
        self::$instance=$this;

        require_once SYS_PATH."Loader.php";
        $this->load=new Loader();
        $this->load->init();
    }

    public static function get_instance(){
        if(isset(self::$instance)){
            return self::$instance;
        }
        else
            return new self;
    }
}
?>
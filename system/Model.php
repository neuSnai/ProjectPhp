<?php
class Pro_Model{
    protected $db;
    public function __construct()
    {
        //数据库类
        $this->db=new db();
    }
    //魔术方法__get,当请求model中不存在的资源的时候会去controller中寻找
    public function __get($name)
    {
        return getInstance()->$name;
    }
}
?>

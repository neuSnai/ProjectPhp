<?php
/*
 * 这里定义的是一些全局函数
 */
defined('SYS_PATH') or die("Access Denied");
/*
 * getInstance是controller父类的方法，用来获取controller实体
 */
function getInstance(){
    return Pro_Controller::get_instance();
}
function base_url(){
    $config=Config::getInstance()->config;
    return $config['base_url'];
}
?>

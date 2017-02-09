<?php
defined("SYS_PATH") or die('Access Denied');
/*
 * 配置项目的根路径例如 http://127.0.0.1/App
 * 配置之后就可以在系统中调用base_url()函数，返回值是$config['base_url'].'index.php/'
 */
$config=array();
$config['base_url'] = 'http://127.0.0.1/project_ex/';
/*
 * 配置uri解析方式，可以设置为PATH_INFO或者REQUEST，如果为REQUEST
 * 那么?c=控制器名称，?m=方法
 */
$config['uri_protocol']="PATH_INFO";
/*
 * 设置默认主页，例如$config['home_page']='Index/welcome/'
 */
$config['home_page']='Index/login';
?>
<?php
header("Content-type: text/html; charset=utf-8");
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2016/6/6
 * Time: 18:44
 */
/*
 * 在这里用户可以定义一些常量
 */
define('IS_POST',strtolower($_SERVER['REQUEST_METHOD']) == 'post');

/*
 * 系统常量，如果用户要更改app文件结构，请根据情况修改一下路径
 */
define('SYS_PATH',getcwd().'/system/');
define('ROOT_PATH',getcwd().'/');
define('APP_PATH',ROOT_PATH.'application/');
//配置文件路径
define('CONF',ROOT_PATH.'config/');
//controller,model,view路径
define('CONTROLLER',APP_PATH.'controller/');
define('MODEL',APP_PATH.'model/');
define('VIEW',APP_PATH.'view/');
/*
 * 加载配置文件类
 */
require_once SYS_PATH."Config.php";
/*
 * 加载路由解析类
 */
require_once SYS_PATH.'Router.php';
/*
 * 加载控制器类
 */
require_once SYS_PATH.'Controller.php';
/*
 * 加载全局函数
 */
require_once  SYS_PATH."functions.php";
/*
 * 加载数据库配置
 */
require_once SYS_PATH.'database.php';
/*
 * 加载Model
 */
require_once SYS_PATH.'Model.php';
/*
 * 加载缓存
 */
require_once  SYS_PATH.'Cache.php';
/*
 * 加载错误&异常处理类
 */
require_once SYS_PATH.'ErrorHandler.php';
new ErrorHandler();
/*
 * 加载核心控制类
 */
require SYS_PATH."Core.php";
$core=Core::getInstance();
$resolvedUri=$core->routeParse();
$core->distribute($resolvedUri);

?>
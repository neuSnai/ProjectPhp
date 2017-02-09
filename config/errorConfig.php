<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/16
 * Time: 22:41
 */
/*
 *选择模式，$errorDisplayModel='development';是开发模式，不会阻拦系统弹出错误
 *$errorDisplayModel='production'是产品模式，错误只会以日志的形式记录，日志的路径可以通过设置errorLogUrl来设置;
 * 在development模式下 错误也会以日志形式记录
 */
$errorDisplayModel='development';
/*
 * $errorLogUrl='' 设置production模式下错误日志的路径以项目所在文件夹为起点,以'/'结尾
 * 例如$errorLogUrl='MyProject/log/errorLog/'
 */
$errorLogUrl=ROOT_PATH.'log/';
/*

/*
 *$timeZone='' 设置时区
 */
$timeZone='PRC';

define('ERROR_DISPLAY_MODEL',$errorDisplayModel);
define('ERROR_LOG_URL',$errorLogUrl);
define('TIME_ZONE',$timeZone);
?>
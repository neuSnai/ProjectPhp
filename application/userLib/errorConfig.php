<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/3/16
 * Time: 22:41
 */
/*
 *选择模式，$errorDisplayModel='development';是开发模式，不会阻拦系统弹出错误
 *  * $errorDisplayModel='production'是产品模式，错误会以日志的形式记录，日志的路径可以通过设置errorLogUrl来设置;
 */
$errorDisplayModel='development';
/*
 * $errorLogUrl='' 设置production模式下错误日志的路径以项目所在文件夹为起点,以'/'结尾
 * 例如$errorLogUrl='MyProject/log/errorLog/'
 */
$errorLogUrl='medical/log/';
/*
 * $debugLogUrl='' 以日志的形式记录开发时的错误，或者调试信息。设置debugLog的路径
 * 例如$errorLogUrl='MyProject/log/debugLog/'
 */
$debugLogUrl='medical/log/';
/*
 *$timeZone='' 设置时区
 */
$timeZone='PRC';
define('ERROR_DISPLAY_MODEL',$errorDisplayModel);
define('ERROR_LOG_URL',$errorLogUrl);
define('DEBUG_LOG_URL',$debugLogUrl);
define('TIME_ZONE',$timeZone);
?>
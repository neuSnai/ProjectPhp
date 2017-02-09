<?php
require_once SYS_PATH.'database/DbInterface.php';
switch (Config::getInstance()->dbConf['driver']){
    case 'mysqli':
        require_once SYS_PATH.'database/MysqliDriver.php';
        require_once SYS_PATH.'database/MysqliResultSet.php';
        class db extends MysqliDriver{};
        break;
    default:
        throw new RuntimeException("check your database driver");
}
?>

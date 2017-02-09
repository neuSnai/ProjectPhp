<?php
//REAL_PATH是项目的本地地址，用来上传文件用，如果要更改app名字 直接改appname就行
$appname='medical/';
define('REAL_PATH',$_SERVER['DOCUMENT_ROOT'].$appname);
class UserConfig{
    public function getRealPath(){
        return REAL_PATH;
    }
}
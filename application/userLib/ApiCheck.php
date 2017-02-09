<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * 通过sha1算法校验api接口的调用者是否合法
 * 注意 这里只对接口访问权限加密，敏感数据如密码请另外加密
 */
class ApiCheck{
    //设置key值
    private $key='medical';
    private $data=null;
    public function check(){
        $receivedData=$_POST['request'];
        $data=json_decode($receivedData,true);
        if(is_null($data['token'])||!isset($data['token'])){
            echo "Access Denied_1!";
            die();
        }
        $token=$data['token'];
        unset($data['token']);
        $str='';
        foreach($data as $item=>$value){
            $str=$str.$value;
        }
        $str=$str.$this->key;
        $localToken=sha1($str);
        if(strtoupper($localToken)!=strtoupper($token)){
            echo "Access Denied_2!";
            die();
        }
        else
            $this->data=$data;
        return $this->data;

    }
}
?>
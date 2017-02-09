<?php
//这个类中保存一些自定义的辅助函数，使用前先加载
class HelperFunctions{
    function randStr($length){
        $randStr='';
        $preStr='1,2,3,4,5,6,7,8,9,a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z';
        $preStr=explode(",",$preStr);
        for($i=0;$i<$length;$i++){
            $randNum=mt_rand(0,34);
            $randStr=$randStr.$preStr[$randNum];
        }
        return $randStr;
    }
    function returnJson($status,$mes,$data){
        //返回json数据，中文不会被转换为unicode
        return stripcslashes(json_encode(array('status'=>$status,'mes'=>$mes,'data'=>$data),JSON_UNESCAPED_UNICODE));
    }
    //检查传入的参数是否有null或者空字符串 或者参数数量不够 返回值是数组
    // 缺值时status=0 missing保存数值为空的参数名 当数量不够时不会统计缺失项 missing为1
    function paraCheck(array $para,$num){
        $status=true;
        $missing=null;
        //var_dump($para);
        do {
            if(count($para)!=$num){
                $status=false;
                $missing=1;
                break;
            }
            $missing = null;
            foreach ($para as $key => $value) {
                if(is_array($value)){
                    if(!$value['name']){
                        $status=false;
                        $missing[]=$key;
                    }
                }
                else{
                    if (!trim($value)) {
                        $status = false;
                        $missing[] = $key;
                    }
                }
            }
        }
        while(0);
        return array('status'=>$status,'missing'=>$missing);

    }
}
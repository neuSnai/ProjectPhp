<?php
class ErrorHandler{
    private $errorDisplayModel=ERROR_DISPLAY_MODEL;
    public function __construct()
    {
        $this->errorLaunch();
        $this->exceptionLaunch();
    }

    public function error_handler($errno,$errstr,$errfile,$errline){
        if($errno==2)
            $errno='Warn';
        if($errno==8) {
            $errno = 'Notice';
        }
        date_default_timezone_set(TIME_ZONE);
        $dateTime=date('Y-m-d H:i:s',time());
        $errMes='错误级别：'.$errno."|".'错误信息:'.$errstr.'|'.'所在文件:'.$errfile.'|'.'错误行数:'.$errline.'日期:'.$dateTime."\n";
        error_log($errMes,3,ERROR_LOG_URL.'ErrorLog.log');
        switch($this->errorDisplayModel){
            case 'development':
                $avoidDisplay=false;
                break;
            case 'production':
                $avoidDisplay=true;
                break;
            default:
                $avoidDisplay=false;
                break;
        }
        return $avoidDisplay;
    }
    public function exceptionHandler(Exception $exception){
        //echo $exception->xdebug_message;
        $Pro=getInstance();
        $Pro->load->view('error/exception',
            array('message'=>$exception->getMessage(),
                'line'=>$exception->getLine(),
                'file'=>$exception->getFile()
            ));
    }
    public function errorLaunch(){
        set_error_handler(array($this,"error_handler"));
    }
    public function exceptionLaunch(){
       // set_exception_handler(array($this,"exceptionHandler"));
    }
}
?>
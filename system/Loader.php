<?php
class Loader{
    private $Pro;
    public function __construct()
    {
        $this->Pro=getInstance();
    }
    /*
     * 加载model
     *其中name可以是array，或者字符串
     */
    public function model($name,$construct=null){
        if(is_array($name)){
            foreach($name as $item){
                $this->model($item);
            }
        }
       $this->load($name,'model',$construct);
    }
    public function lib($name,$construct=null){
        if(is_array($name)){
            foreach($name as $item){
                $this->lib($item);
            }
        }

        $this->load($name,'lib',$construct);
    }
    public function userLib($name,$construct=null){
        if(is_array($name)){
            foreach($name as $item){
                $this->lib($item);
            }
        }
        $this->load($name,'userLib',$construct);
    }

    public function view($path,$vars=null){
        $path=pathinfo($path);
        $dir=VIEW.$path['dirname'].'/';
        $name=$path['filename'];
        $type=isset($path['extension'])?$path['extension']:"php";
        $path=$dir.$name.'.'.$type;
        if(file_exists($path)){
            if(is_array($vars)&&count($vars)>0)
                extract($vars);
            include_once $path;
        }
        else
            throw new RuntimeException("file $name.$type not found in $path!" );
    }
    public function load($name,$type,$construct=null){
        //如果controller中已经加载同名资源则抛出异常
        if(isset($this->Pro->$name))
            throw new RuntimeException("the $type name '$name' you use is already used by another resource!");
        //如果目标文件夹没有指定文件，抛出异常
        do {

            if ($type=='lib'){
                if (file_exists(trim(SYS_PATH.'library/'.$name.'.php')))
                    require_once SYS_PATH.'library/'.$name .'.php';
                else
                    throw new RuntimeException(" $type $name not found in $type directory ");
                break;
            }
            if (file_exists(APP_PATH .$type.'/'.$name .'.php'))
                require_once APP_PATH .$type.'/'.$name .'.php';
            else
                throw new RuntimeException(" $type $name not found in $type directory ");

        }while(0);
        if ($construct)
            $this->Pro->$name=new $name($construct);
        else
            $this->Pro->$name=new $name();

    }

    //加载器初始化
    public function init(){
       $this->_autoload();
    }
    //加载autoload的类
    private function _autoload(){
        require_once CONF.'autoload.php';
        if (count($autoload['model'])>0) {
            $this->model($autoload['model']);
        }
        if (count($autoload['lib'])>0) {
            $this->lib($autoload['lib']);
        }
        if (count($autoload['userLib]'])>0) {
            $this->userLib($autoload['userLib]']);
        }
    }

}
?>

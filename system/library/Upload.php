<?php
//一个简单的单文件表单上传处理类 构造函数传入的是表单提交的file数组
class SimpleUpload{
    private $name;
    private $type;
    private $size;
    private $tmp_name;
    private $error;
    private $url;
    //实际地址
    private $path=null;
    private $newName;
    private $fileType;
    public function __construct($file)
    {
        $this->name=$file['name'];
        $this->type=$file['type'];
        $this->size=$file['size'];
        $this->tmp_name=$file['tmp_name'];
        $this->error=$file['error'];
    }
    public function setUrl($url){
        $this->url=$url;
    }
    public function getPath(){
        return $this->path;
    }
    public function getNewName(){
        return $this->newName;
    }
    public function upload(){
        if($this->error){
            return false;
        }
        $this->fileType=explode('.',$this->name)[1];
        $this->newName=date("YmdHis",time()).'.'.$this->fileType;
        if(move_uploaded_file($this->tmp_name,$this->url.$this->newName)) {
            $this->path=$this->url.$this->newName;
            return true;
        }
        else
            return false;
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @return mixed
     */
    public function getTmpName()
    {
        return $this->tmp_name;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

}
?>
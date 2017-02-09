<?php
class MysqliDriver implements DbInterface{
    private $queryString;
    private $select;
    private $from;
    private $where;
    private $join;
    private $orderBy;
    private $limit;
    private $conn;
    private $result;
    public function __construct()
    {
       // require CONF."database.php";
        $dbConf=Config::getInstance()->dbConf;
        $conn=new mysqli($dbConf['host'],$dbConf['username'],$dbConf['password'],$dbConf['database'],3306);
        if (!$conn->connect_errno)
            $this->conn=$conn;
        else
            throw new RuntimeException("database connect error: ".$conn->connect_error);
    }

    public function select($select='*'){
        if (is_string($select)) {
            $select = mysqli_real_escape_string($this->conn, $select);
            if (!trim($this->select))
                $this->select = $select;
            else
                $this->select=$this->select.','.$select;
        }
        elseif (is_array($select)){
            foreach ($select as $item){
                $this->select($item);
            }
        }
    }

    public function from($from){
        $this->from=mysqli_real_escape_string($this->conn,$from);
    }

    public function where($key,$value=null){
        //如果是以key-value方式调用
        if ($value){
            //如果key是以‘=’结尾(包括!=,<=,>=)则直接拼接key,value
            if (substr($key,-1,1)=='='){
                $where=$key.is_string($value)?"'$value'":$value;
            }
            //如果不是的话用=拼接
            else{
               // $where=$key.'='.$a=is_string($value)?"'$value'":$value;
                $where=$key.'='.$str=is_string($value)?"'$value'":$value;
            }
        }
        elseif ((is_string($key))){
            $where=$key;
        }
        if(!trim($this->where)){
            $this->where=$where;
        }
        else
            $this->where=$this."AND".$key;
    }

    public function join($table,$on,$type='inner'){
        switch ($type){
            case 'inner':
                $join='inner join '.$table.' on '.$on;
                break;
            case 'left':
                $join='left join '.$table.' on '.$on;
                break;
            case 'right':
                $join='right join '.$table.' on '.$on;
                break;
            case 'outer':
                $join='outer join '.$table.' on '.$on;
                break;
            default:
                $join='inner join '.$table.' on '.$on;
        }
        if (trim($this->join))
            $this->join=$this->join." ".mysqli_real_escape_string($this->conn,$join);
        else
            $this->join=mysqli_real_escape_string($this->conn,$join);
    }

    public function orderBy($orderBy,$direction){
        $this->orderBy=mysqli_real_escape_string($this->conn,$orderBy." ".$direction);
    }

    public function limit($start,$offset){
        $this->limit="$start".','."$offset";
    }
    public function get(){
        $this->assemble();
        return $this->query($this->queryString);
    }

    //原生查询
    //queryType是true时返回结果集类，否则返回Mysqli::query的查询结果,一般select时type为true
    public function query($queryString, $queryType=true){
        $this->result=$this->conn->query($queryString);
        $result=null;
        if($queryType) {
            $result = new MysqliResultSet($this->conn, $this->result);
        }
        else{
            $result=$this->result;
        }
        if ($this->conn->errno)
            throw new Exception("database error:".$this->conn->error);
        foreach ($this as $key=>$value){
            unset($this->$key);
        }
        return $result;
    }
    public function getQueryStr(){
        if ($this->queryString)
            return $this->queryString;
        else{
            $this->assemble();
            return $this->queryString;
        }
    }
    private function assemble(){
        echo $this->conn->error;
        $queryString="select ".$this->select." "."from ".$this->from." ";
        if (trim($this->join))
            $queryString.=$this->join." ";
        if(trim($this->where))
            $queryString=$queryString."where ".$this->where." ";
        if (trim($this->orderBy))
            $queryString.="order by ".$this->orderBy." ";
        if (trim($this->limit))
            $queryString.="limit ".$this->limit;
        $this->queryString=$queryString;
    }
    public function getConn(){
        return $this->conn;
    }
    public function insert($table,array $item){
        foreach ($item as $key=>$value){
            $item[$key]=is_string($value)?"'$value'":$value;
        }
        $column=implode(",",array_keys($item));
        $value=implode(",",$item);
        $queryString="insert into $table (".$column." ) values (".$value." )";
        $this->queryString=$queryString;
        return $this->query($queryString,false);
    }
    public function update($table,array $item,$where){
        $str='';
        foreach ($item as $key=>$value){
            $str.="$key=".(is_string($value)?"'$value'":$value).',';
        }
        $str=substr($str,0,-1);
        $queryString="update $table set $str ";
        if ($where)
            $queryString.=" where ".$where;
        $this->queryString=$queryString;
        return $this->query($queryString,false);
    }
    public function delete($table,$where){
        $queryString="delete from $table ";
        if ($where)
            $queryString.="where ".$where;
        $this->queryString=$queryString;
        return $this->query($queryString,false);
    }
}
?>

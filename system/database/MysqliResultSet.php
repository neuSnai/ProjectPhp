<?php
class MysqliResultSet{
    private $result;
    private $conn;
    public function __construct($conn,$result)
    {
        $this->conn=$conn;
        $this->result=$result;
    }
    public function result_array($type='BOTH'){
        switch ($type) {
            case 'BOTH':
                $type=MYSQLI_BOTH;
                break;
            case 'ASSOC':
                $type=MYSQLI_ASSOC;
                break;
            case 'NUM':
                $type=MYSQLI_NUM;
                break;
            default:
                $type=MYSQLI_BOTH;
        }
        $row=array();
        while($item=$this->result->fetch_array($type)){
            $row[]=$item;
        }
    }
    public function result_obj(){
        //echo $this->conn->error();
        $row=array();
        while($item=$this->result->fetch_object()){
            $row[]=$item;
        }
        return $row;
    }
    public function row_array($type="BOTH"){
        switch ($type) {
            case 'BOTH':
                $type=MYSQLI_BOTH;
                break;
            case 'ASSOC':
                $type=MYSQLI_ASSOC;
                break;
            case 'NUM':
                $type=MYSQLI_NUM;
                break;
            default:
                $type=MYSQLI_BOTH;
        }
        return $this->result->fetch_array($type);
    }
    public function row_obj(){
        return $this->result->fetch_object();
    }
    public function affected_rows(){
        return $this->result->affected_rows();
    }
    public function num_rows(){
        return $this->result->num_rows;
    }
  
}
?>

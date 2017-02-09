<?php
class Admin extends Pro_Model{

    public function check($username,$password){
        $this->db->select();
        $this->db->from("admin");
        $this->db->where('username',$username);
        $query=$this->db->get();
        if($query->num_rows()==0)
        {
            $message='用户不存在';
            $status=0;
        }
        else{
            $result=$query->row_obj();
            if($result->password==$password)
            {
                $status=1;
                $message='';
            }
                else
                {
                    $message="密码错误";
                    $status=0;
                }
            }
        return array('status'=>$status,'message'=>$message);
    }

}
?>
<?php
class UserModel extends Pro_Model{
    public function getAllUsers(){
        $this->db->select();
        $this->db->from('user as u');
        $this->db->join('grade as g','u.id=g.user_id');
        $this->db->where('u.is_del=10');
        $this->db->where('u.id',$id);
        $this->db->orderBy('g.submitDate','desc');
        $result=$this->db->get();
        return $result->result_obj();
    }
}
?>
